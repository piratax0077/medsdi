<?php

namespace App\Http\Controllers;

use App\Models\EmergencyAlert;
use App\Models\EmergencyDoctorLink;
use App\Models\Paciente;
use App\Models\Profesional;
use App\Models\UsersDevices;
use App\Services\FirebaseCloudMessaging;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmergencyDoctorController extends Controller
{
    public function overview(Request $request)
    {
        $user = $request->user();

        if ($user->hasRole('Profesional')) {
            $links = EmergencyDoctorLink::where('professional_user_id', $user->id)
                ->whereIn('status', ['pending', 'active'])
                ->latest()->get();

            $patients = Paciente::whereIn('id_usuario', $links->pluck('patient_user_id'))
                ->get()->keyBy('id_usuario');

            return response()->json([
                'role' => 'professional',
                'links' => $links->map(function ($link) use ($patients) {
                    $patient = $patients->get($link->patient_user_id);
                    return [
                        'id' => $link->id,
                        'status' => $link->status,
                        'patient' => $patient ? trim($patient->nombres.' '.$patient->apellido_uno) : 'Paciente',
                        'phone' => $link->status === 'active' && $patient ? $patient->telefono_uno : null,
                    ];
                })->values(),
            ]);
        }

        abort_unless($user->hasRole('Paciente'), 403);
        $link = EmergencyDoctorLink::where('patient_user_id', $user->id)
            ->whereIn('status', ['pending', 'active'])->latest()->first();

        return response()->json([
            'role' => 'patient',
            'link' => $link ? $this->patientLinkPayload($link) : null,
        ]);
    }

    public function searchProfessionals(Request $request)
    {
        abort_unless($request->user()->hasRole('Paciente'), 403);
        $query = trim((string) $request->query('q', ''));
        abort_if(mb_strlen($query) < 3, 422, 'Ingresa al menos tres caracteres.');

        return response()->json(Profesional::query()
            ->whereNotNull('id_usuario')
            ->where(function ($builder) use ($query) {
                $builder->where('nombre', 'like', '%'.$query.'%')
                    ->orWhere('apellido_uno', 'like', '%'.$query.'%')
                    ->orWhere('email', 'like', '%'.$query.'%');
            })
            ->limit(15)->get()->map(function ($professional) {
                return [
                    'id' => $professional->id,
                    'name' => trim($professional->nombre.' '.$professional->apellido_uno),
                    'specialty' => optional($professional->Especialidad)->nombre ?: 'Profesional de salud',
                    'photo' => $professional->foto_perfil
                        ? asset('storage/'.$professional->foto_perfil)
                        : null,
                ];
            })->values());
    }

    public function requestLink(Request $request)
    {
        abort_unless($request->user()->hasRole('Paciente'), 403);
        $data = $request->validate(['professional_id' => 'required|integer|exists:profesionales,id']);
        $professional = Profesional::findOrFail($data['professional_id']);
        abort_if(!$professional->id_usuario, 422, 'El profesional no posee una cuenta activa.');

        $link = DB::transaction(function () use ($request, $professional) {
            EmergencyDoctorLink::where('patient_user_id', $request->user()->id)
                ->whereIn('status', ['pending', 'active'])
                ->update(['status' => 'revoked', 'revoked_at' => now()]);

            return EmergencyDoctorLink::updateOrCreate(
                [
                    'patient_user_id' => $request->user()->id,
                    'professional_user_id' => $professional->id_usuario,
                ],
                ['status' => 'pending', 'accepted_at' => null, 'revoked_at' => null]
            );
        });

        return response()->json(['link' => $this->patientLinkPayload($link)], 201);
    }

    public function decide(Request $request, EmergencyDoctorLink $link)
    {
        abort_unless((int) $link->professional_user_id === (int) $request->user()->id, 404);
        abort_unless($link->status === 'pending', 409, 'La solicitud ya fue procesada.');
        $data = $request->validate(['decision' => 'required|in:accept,reject']);

        $link->update([
            'status' => $data['decision'] === 'accept' ? 'active' : 'rejected',
            'accepted_at' => $data['decision'] === 'accept' ? now() : null,
        ]);

        return response()->json(['status' => $link->status]);
    }

    public function revoke(Request $request, EmergencyDoctorLink $link)
    {
        abort_unless((int) $link->patient_user_id === (int) $request->user()->id, 404);
        $link->update(['status' => 'revoked', 'revoked_at' => now()]);
        return response()->json(['status' => 'revoked']);
    }

    public function alert(Request $request, FirebaseCloudMessaging $fcm)
    {
        abort_unless($request->user()->hasRole('Paciente'), 403);
        $data = $request->validate([
            'latitude' => 'nullable|numeric|between:-90,90',
            'longitude' => 'nullable|numeric|between:-180,180',
        ]);

        $link = EmergencyDoctorLink::where('patient_user_id', $request->user()->id)
            ->where('status', 'active')->latest()->firstOrFail();

        $alert = EmergencyAlert::create([
            'emergency_doctor_link_id' => $link->id,
            'patient_user_id' => $link->patient_user_id,
            'professional_user_id' => $link->professional_user_id,
            'latitude' => $data['latitude'] ?? null,
            'longitude' => $data['longitude'] ?? null,
        ]);

        $patient = Paciente::where('id_usuario', $request->user()->id)->first();
        $sent = $fcm->sendEmergencyAlert($alert, $patient);

        return response()->json([
            'alert_id' => $alert->id,
            'notification_sent' => $sent > 0,
            'doctor' => $this->patientLinkPayload($link)['professional'],
        ], 201);
    }

    private function patientLinkPayload(EmergencyDoctorLink $link)
    {
        $professional = Profesional::where('id_usuario', $link->professional_user_id)->first();
        return [
            'id' => $link->id,
            'status' => $link->status,
            'professional' => $professional ? [
                'name' => trim($professional->nombre.' '.$professional->apellido_uno),
                'phone' => $link->status === 'active'
                    ? ($professional->telefono_uno ?: $professional->telefono ?? null)
                    : null,
                'specialty' => optional($professional->Especialidad)->nombre ?: 'Profesional de salud',
            ] : null,
        ];
    }

    public function deviceAccess(Request $request)
    {
        $data = $request->validate([
            'uuid' => ['required', 'string', 'max:255'],
            'emergency_token' => ['required', 'string'],
        ]);

        $device = UsersDevices::where('uuid', $data['uuid'])
            ->where('emergency_token', $data['emergency_token'])
            ->where('estado', 1)
            ->orderByDesc('id')
            ->first();

        if (!$device) {
            return response()->json([
                'estado' => 0,
                'mensaje' => 'Dispositivo no autorizado.'
            ], 401);
        }

        $link = EmergencyDoctorLink::where(
                'patient_user_id',
                $device->id_user
            )
            ->where('status', 'active')
            ->latest()
            ->first();

        if (!$link) {
            return response()->json([
                'estado' => 1,
                'link' => null,
                'mensaje' => 'No existe profesional de emergencia asociado.'
            ]);
        }

        return response()->json([
            'estado' => 1,
            'link' => $this->patientLinkPayload($link)
        ]);
    }
}
