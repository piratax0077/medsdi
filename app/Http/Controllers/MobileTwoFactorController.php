<?php

namespace App\Http\Controllers;

use App\Models\LoginApprovalChallenge;
use App\Models\UsersDevices;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class MobileTwoFactorController extends Controller
{
    public function updateSettings(Request $request)
    {
        $data = $request->validate(['enabled' => 'required|boolean']);

        if ($data['enabled'] && !$request->user()->tokens()->where('name', 'mobile-app')->exists()) {
            return response()->json([
                'message' => 'Inicia sesión en la aplicación móvil antes de activar esta opción.',
            ], 422);
        }

        $request->user()->forceFill(['mobile_two_factor_enabled' => $data['enabled']])->save();

        if (!$data['enabled']) {
            LoginApprovalChallenge::where('user_id', $request->user()->id)
                ->where('status', 'pending')->update(['status' => 'expired']);
        }

        return response()->json(['enabled' => (bool) $data['enabled']]);
    }

    public function pending(Request $request)
    {
        abort_unless(
            $request->user()->hasAnyRole(['Profesional', 'Paciente']),
            403,
            'Esta acción requiere un perfil Profesional o Paciente.'
        );

        LoginApprovalChallenge::where('user_id', $request->user()->id)
            ->where('status', 'pending')->where('expires_at', '<=', now())
            ->update(['status' => 'expired']);

        return response()->json(LoginApprovalChallenge::where('user_id', $request->user()->id)
            ->where('status', 'pending')->where('expires_at', '>', now())
            ->latest()->get()->map(function ($challenge) {
                return [
                    'id' => $challenge->id,
                    'ip_address' => $challenge->ip_address,
                    'location' => $this->challengeLocation($challenge),
                    'device' => Str::limit($challenge->user_agent ?: 'Dispositivo desconocido', 120),
                    'requested_at' => $challenge->created_at->toIso8601String(),
                    'expires_at' => $challenge->expires_at->toIso8601String(),
                ];
            }));
    }

    private function challengeLocation(LoginApprovalChallenge $challenge)
    {
        if (in_array($challenge->ip_address, ['127.0.0.1', '::1'], true)) {
            return 'Este equipo · red local';
        }

        $parts = array_filter([
            $challenge->location_city,
            $challenge->location_country,
        ]);

        return !empty($parts)
            ? implode(', ', $parts)
            : 'Ubicación aproximada no disponible';
    }

    public function decide(Request $request, LoginApprovalChallenge $challenge)
    {
        abort_unless(
            $request->user()->hasAnyRole(['Profesional', 'Paciente']),
            403,
            'Esta acción requiere un perfil Profesional o Paciente.'
        );

        $data = $request->validate([
            'decision' => 'required|in:approved,rejected',
            'auth_method' => 'required|in:device_pin,biometric',
            'credential' => ['required', 'string', 'regex:/^\d{4}$/'],
            'uuid' => 'required|string|max:255',
        ]);
        abort_unless((int) $challenge->user_id === (int) $request->user()->id, 404);

        if (!$challenge->isPending()) {
            return response()->json(['message' => 'El desafío ya fue resuelto o expiró.'], 409);
        }

        $device = UsersDevices::where('id_user', $request->user()->id)
            ->where('uuid', $data['uuid'])
            ->where('estado', 1)
            ->orderByDesc('id')
            ->first();

        if (!$device || !hash_equals((string) $device->password, $data['credential'])) {
            return response()->json([
                'message' => 'La clave SDI no es correcta o el dispositivo no está activo.',
                'errors' => ['credential' => ['La clave SDI no es correcta.']],
            ], 422);
        }

        $challenge->update(['status' => $data['decision'], 'decided_at' => now()]);

        return response()->json([
            'status' => $challenge->status,
            'auth_method' => $data['auth_method'],
        ]);
    }

    public function showWebChallenge(Request $request)
    {
        $challenge = LoginApprovalChallenge::findOrFail($request->session()->get('mobile_2fa_challenge'));
        abort_unless(hash_equals((string) $request->session()->get('mobile_2fa_user'), (string) $challenge->user_id), 403);
        return view('auth.mobile-approval-challenge', compact('challenge'));
    }

    public function checkWebChallenge(Request $request)
    {
        $challenge = LoginApprovalChallenge::findOrFail($request->session()->get('mobile_2fa_challenge'));
        abort_unless(hash_equals((string) $request->session()->get('mobile_2fa_user'), (string) $challenge->user_id), 403);

        if ($challenge->status === 'approved' && $challenge->expires_at->isFuture()) {
            Auth::loginUsingId($challenge->user_id);
            $request->session()->regenerate();
            $request->session()->forget(['mobile_2fa_challenge', 'mobile_2fa_user']);
            return response()->json(['status' => 'approved', 'redirect' => url(config('fortify.home', '/'))]);
        }

        if ($challenge->status === 'pending' && $challenge->expires_at->isPast()) {
            $challenge->update(['status' => 'expired']);
        }

        return response()->json(['status' => $challenge->fresh()->status]);
    }
}
