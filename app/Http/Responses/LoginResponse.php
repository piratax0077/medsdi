<?php

namespace App\Http\Responses;

use App\Models\LoginApprovalChallenge;
use App\Services\FirebaseCloudMessaging;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Laravel\Fortify\Contracts\LoginResponse as LoginResponseContract;

class LoginResponse implements LoginResponseContract
{
    public function toResponse($request)
    {
        $user = $request->user();

        if ($user && $user->mobile_two_factor_enabled) {
            $challenge = LoginApprovalChallenge::create([
                'id' => (string) Str::uuid(),
                'user_id' => $user->id,
                'ip_address' => $request->ip(),
                'user_agent' => $request->userAgent(),
                'expires_at' => now()->addMinutes(5),
            ]);
            try {
                app(FirebaseCloudMessaging::class)->sendLoginApproval($challenge);
            } catch (\Throwable $exception) {
                Log::warning('El desafío fue creado, pero no se pudo iniciar la notificación push.', [
                    'challenge_id' => $challenge->id,
                    'message' => $exception->getMessage(),
                ]);
            }
            $request->session()->put(['mobile_2fa_challenge' => $challenge->id, 'mobile_2fa_user' => $user->id]);
            Auth::logout();
            $request->session()->migrate(true);
            return redirect()->route('mobile-2fa.challenge');
        }

        return redirect()->intended(config('fortify.home'));
    }
}
