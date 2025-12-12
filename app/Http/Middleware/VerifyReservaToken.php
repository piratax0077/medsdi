<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;

class VerifyReservaToken
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $token = $request->query('token');
        $ip = $request->ip();

        // Verificar si la IP está bloqueada
        $intentosKey = 'reserva_intentos_' . $ip;
        $intentos = Cache::get($intentosKey, 0);

        if ($intentos >= 5) {
            $this->logAcceso($ip, $token ?? 'bloqueado', false, $intentos);
            abort(403, 'Acceso bloqueado por múltiples intentos fallidos. Intente nuevamente en 1 hora.');
        }

        // Validar que se envió un token
        if (!$token) {
            $this->logAcceso($ip, 'Sin token', false, $intentos);
            Cache::put($intentosKey, $intentos + 1, now()->addHour());
            abort(403, 'Acceso no autorizado. Token requerido.');
        }

        // Obtener tokens válidos desde .env (separados por coma)
        $validTokens = explode(',', env('RESERVA_TOKENS', env('RESERVA_TOKEN', '')));
        $validTokens = array_map('trim', $validTokens);

        // Validar token
        if (!in_array($token, $validTokens)) {
            $intentos++;
            Cache::put($intentosKey, $intentos, now()->addHour());
            $this->logAcceso($ip, $token, false, $intentos);

            abort(403, 'Acceso no autorizado. Token inválido. (' . (5 - $intentos) . ' intentos restantes)');
        }

        // Token válido, registrar acceso exitoso
        $this->logAcceso($ip, $token, true, 0);

        // Limpiar intentos fallidos si el token es correcto
        Cache::forget($intentosKey);

        return $next($request);
    }

    /**
     * Registrar accesos al sistema de reservas
     */
    private function logAcceso($ip, $token, $exitoso, $intentos = 0)
    {
        $status = $exitoso ? 'ÉXITO' : 'FALLIDO';
        $tokenMasked = strlen($token) > 4 ? substr($token, 0, 4) . '****' : '****';

        Log::channel('stack')->info("Reserva Online - Acceso {$status}", [
            'ip' => $ip,
            'token' => $tokenMasked,
            'intentos_fallidos' => $intentos,
            'fecha' => Carbon::now()->toDateTimeString(),
            'user_agent' => request()->userAgent()
        ]);
    }
}

