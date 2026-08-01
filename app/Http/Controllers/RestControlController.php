<?php

namespace App\Http\Controllers;

use App\Models\Licencia;
use App\Models\Paciente;
use App\Models\Profesional;
use App\Models\RestControl;
use App\Models\RestControlCheckin;
use App\Services\FirebaseCloudMessaging;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class RestControlController extends Controller
{
    public function overview(Request $request)
    {
        $user = $request->user();
        if ($user->hasRole('Profesional')) {
            $professional = Profesional::where('id_usuario', $user->id)->firstOrFail();
            return response()->json([
                'role' => 'professional',
                'controls' => RestControl::with(['patient', 'license', 'checkins'])
                    ->where('professional_id', $professional->id)->latest()->limit(30)->get()
                    ->map(fn ($control) => $this->payload($control))->values(),
            ]);
        }

        abort_unless($user->hasRole('Paciente'), 403);
        return response()->json([
            'role' => 'patient',
            'controls' => RestControl::with(['professional', 'license', 'checkins'])
                ->where('patient_user_id', $user->id)
                ->whereIn('status', ['pending_acceptance', 'active'])
                ->latest()->get()->map(fn ($control) => $this->payload($control))->values(),
        ]);
    }

    public function patients(Request $request)
    {
        abort_unless($request->user()->hasRole('Profesional'), 403);
        $professional = Profesional::where('id_usuario', $request->user()->id)->firstOrFail();
        $query = trim((string) $request->query('q', ''));

        $licenses = Licencia::with(['Paciente.Direccion.Ciudad'])
            ->where('id_profesional', $professional->id)
            ->where('estado', 1)
            ->when($query !== '', function ($builder) use ($query) {
                $builder->whereHas('Paciente', function ($patient) use ($query) {
                    $patient->where('nombres', 'like', '%'.$query.'%')
                        ->orWhere('apellido_uno', 'like', '%'.$query.'%')
                        ->orWhere('rut', 'like', '%'.$query.'%');
                });
            })->latest('fecha_inicio')->limit(30)->get();

        return response()->json($licenses->filter(fn ($license) => $license->Paciente && $license->Paciente->id_usuario)
            ->map(function ($license) {
                return [
                    'license_id' => $license->id,
                    'patient_id' => $license->Paciente->id,
                    'name' => trim($license->Paciente->nombres.' '.$license->Paciente->apellido_uno.' '.$license->Paciente->apellido_dos),
                    'rut' => $license->Paciente->rut,
                    'starts_at' => $license->fecha_inicio,
                    'ends_at' => $license->fecha_termino,
                    'address' => $this->patientAddress($license->Paciente),
                    'active_now' => (!$license->fecha_inicio || $license->fecha_inicio <= now()->toDateString())
                        && (!$license->fecha_termino || $license->fecha_termino >= now()->toDateString()),
                ];
            })->values());
    }

    public function store(Request $request, FirebaseCloudMessaging $fcm)
    {
        abort_unless($request->user()->hasRole('Profesional'), 403);
        $data = $request->validate([
            'license_id' => 'required|integer|exists:licencia,id',
            'radius_km' => 'required|numeric|min:0.1|max:100',
            'frequency_hours' => 'required|integer|min:1|max:24',
            'verify_medications' => 'required|boolean',
            'verify_location' => 'required|boolean',
            'base_address' => 'nullable|string|max:1000',
            'notes' => 'nullable|string|max:2000',
        ]);
        $professional = Profesional::where('id_usuario', $request->user()->id)->firstOrFail();
        $license = Licencia::where('id', $data['license_id'])
            ->where('id_profesional', $professional->id)->where('estado', 1)->firstOrFail();
        abort_if(
            ($license->fecha_inicio && $license->fecha_inicio > now()->toDateString())
            || ($license->fecha_termino && $license->fecha_termino < now()->toDateString()),
            422,
            'La licencia seleccionada no se encuentra vigente.'
        );
        $patient = Paciente::findOrFail($license->id_paciente);
        abort_if(!$patient->id_usuario, 422, 'El paciente no tiene una cuenta móvil activa.');

        $control = RestControl::updateOrCreate(
            ['license_id' => $license->id, 'professional_id' => $professional->id],
            [
                'professional_user_id' => $request->user()->id,
                'patient_user_id' => $patient->id_usuario,
                'patient_id' => $patient->id,
                'status' => 'pending_acceptance',
                'radius_km' => $data['radius_km'],
                'frequency_hours' => $data['frequency_hours'],
                'verify_medications' => $data['verify_medications'],
                'verify_location' => $data['verify_location'],
                'base_address' => $data['base_address'] ?? null,
                'notes' => $data['notes'] ?? null,
                'requested_at' => now(),
                'accepted_at' => null,
                'last_reminder_at' => null,
                'next_reminder_at' => null,
                'ends_at' => $license->fecha_termino ? $license->fecha_termino.' 23:59:59' : null,
            ]
        );

        $control->load(['patient', 'professional', 'license', 'checkins']);
        $sent = $fcm->sendRestControlRequest($control, $patient);
        return response()->json(['control' => $this->payload($control), 'notification_sent' => $sent > 0], 201);
    }

    public function decide(Request $request, RestControl $control)
    {
        abort_unless((int) $control->patient_user_id === (int) $request->user()->id, 404);
        abort_unless($control->status === 'pending_acceptance', 409, 'La solicitud ya fue procesada.');
        $data = $request->validate([
            'decision' => 'required|in:accept,reject',
            'latitude' => 'nullable|numeric|between:-90,90',
            'longitude' => 'nullable|numeric|between:-180,180',
        ]);
        if ($data['decision'] === 'accept' && $control->verify_location
            && (!isset($data['latitude']) || !isset($data['longitude']))) {
            abort(422, 'Debes compartir tu ubicación para establecer el lugar de reposo.');
        }
        $control->update([
            'status' => $data['decision'] === 'accept' ? 'active' : 'rejected',
            'accepted_at' => $data['decision'] === 'accept' ? now() : null,
            'next_reminder_at' => $data['decision'] === 'accept'
                ? now()->addHours($control->frequency_hours) : null,
            'base_latitude' => $data['decision'] === 'accept' ? ($data['latitude'] ?? null) : null,
            'base_longitude' => $data['decision'] === 'accept' ? ($data['longitude'] ?? null) : null,
        ]);
        return response()->json(['control' => $this->payload($control->fresh())]);
    }

    public function checkin(Request $request, RestControl $control)
    {
        abort_unless((int) $control->patient_user_id === (int) $request->user()->id, 404);
        abort_unless($control->status === 'active', 409, 'El control de reposo no está activo.');
        $data = $request->validate([
            'latitude' => 'nullable|numeric|between:-90,90',
            'longitude' => 'nullable|numeric|between:-180,180',
            'accuracy_meters' => 'nullable|numeric|min:0|max:10000',
            'photo' => 'nullable|string|max:8388608',
            'consent' => 'accepted',
        ]);
        abort_if($control->verify_location && (!isset($data['latitude']) || !isset($data['longitude'])), 422, 'La ubicación es obligatoria.');
        abort_if($control->verify_medications && empty($data['photo']), 422, 'La fotografía solicitada es obligatoria.');

        $distance = null;
        $inside = null;
        if ($control->verify_location && $control->base_latitude !== null) {
            $distance = $this->distanceKm($control->base_latitude, $control->base_longitude, $data['latitude'], $data['longitude']);
            $inside = $distance <= (float) $control->radius_km;
        }

        $photoPath = null;
        if (!empty($data['photo'])) {
            abort_unless(preg_match('/^data:image\/(jpeg|jpg|png);base64,(.+)$/s', $data['photo'], $matches), 422, 'Formato de fotografía inválido.');
            $binary = base64_decode($matches[2], true);
            abort_if($binary === false || strlen($binary) > 5 * 1024 * 1024, 422, 'La fotografía supera el tamaño permitido.');
            $photoPath = 'rest-controls/'.$control->id.'/'.uniqid('checkin_', true).'.jpg';
            Storage::disk('local')->put($photoPath, $binary);
        }

        $checkin = RestControlCheckin::create([
            'rest_control_id' => $control->id,
            'patient_user_id' => $request->user()->id,
            'latitude' => $data['latitude'] ?? null,
            'longitude' => $data['longitude'] ?? null,
            'accuracy_meters' => $data['accuracy_meters'] ?? null,
            'distance_km' => $distance,
            'inside_radius' => $inside,
            'photo_path' => $photoPath,
            'status' => $inside === false ? 'outside_radius' : 'submitted',
            'consent_given_at' => now(),
            'captured_at' => now(),
        ]);
        return response()->json(['checkin' => $checkin], 201);
    }

    private function payload(RestControl $control): array
    {
        return [
            'id' => $control->id,
            'status' => $control->status,
            'patient' => optional($control->patient)->nombres ? trim($control->patient->nombres.' '.$control->patient->apellido_uno) : null,
            'professional' => optional($control->professional)->nombre
                ? trim(collect([
                    $control->professional->nombre,
                    $control->professional->apellido_uno ?: $control->professional->apellido,
                    $control->professional->apellido_dos,
                ])->filter()->implode(' '))
                : null,
            'license_id' => $control->license_id,
            'starts_at' => optional($control->license)->fecha_inicio,
            'ends_at' => $control->ends_at,
            'radius_km' => $control->radius_km,
            'frequency_hours' => $control->frequency_hours,
            'verify_medications' => $control->verify_medications,
            'verify_location' => $control->verify_location,
            'base_address' => $control->base_address,
            'notes' => $control->notes,
            'last_reminder_at' => optional($control->last_reminder_at)->toIso8601String(),
            'next_reminder_at' => optional($control->next_reminder_at)->toIso8601String(),
            'checkins' => $control->relationLoaded('checkins') ? $control->checkins : [],
        ];
    }

    private function patientAddress(Paciente $patient): ?string
    {
        $address = $patient->Direccion;
        if (!$address) return null;

        return collect([
            trim((string) $address->direccion),
            trim((string) $address->numero_dir),
            optional($address->Ciudad)->nombre,
        ])->filter()->implode(' ');
    }

    private function distanceKm($lat1, $lon1, $lat2, $lon2): float
    {
        $earth = 6371;
        $dLat = deg2rad($lat2 - $lat1);
        $dLon = deg2rad($lon2 - $lon1);
        $a = sin($dLat / 2) ** 2 + cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * sin($dLon / 2) ** 2;
        return round($earth * 2 * atan2(sqrt($a), sqrt(1 - $a)), 3);
    }
}
