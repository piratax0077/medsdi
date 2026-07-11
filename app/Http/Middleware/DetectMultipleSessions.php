<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\UserSession;

class DetectMultipleSessions
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
        if (!config('app.detect_multiple_sessions', true)) {
            return $next($request);
        }

        if (Auth::check()) {
            $user_id = Auth::id();
            $current_session = session()->getId();
            $current_ip = $request->ip();
            $current_user_agent = $request->userAgent();

            // Buscar sesiones previas del mismo usuario
            $old_sessions = UserSession::where('id_usuario', $user_id)
                ->where('session_id', '!=', $current_session)
                ->get();

            if ($old_sessions->count() > 0) {
                // Verificar si hay sesión desde otra IP o otro dispositivo (User-Agent diferente)
                $other_device_sessions = $old_sessions->filter(function($session) use ($current_ip, $current_user_agent) {
                    // Considerar como "otro dispositivo" si la IP es diferente O el User-Agent es diferente
                    return $session->ip_address !== $current_ip || $session->user_agent !== $current_user_agent;
                });

                if ($other_device_sessions->count() > 0) {
                    // Notificar que sesión fue cerrada
                    session()->flash('warning', '⚠️ Tu sesión anterior fue cerrada porque iniciaste sesión en otro dispositivo/ubicación.');

                    // Obtener los session_ids de las sesiones antiguas para eliminarlas
                    $old_session_ids = $old_sessions->pluck('session_id')->toArray();

                    // Eliminar las sesiones reales de Laravel (tabla sessions)
                    DB::table('sessions')->whereIn('id', $old_session_ids)->delete();

                    // Eliminar también de user_sessions
                    $old_sessions->each->delete();
                }
            }

            // Registrar/actualizar sesión actual
            UserSession::updateOrCreate(
                ['session_id' => $current_session],
                [
                    'id_usuario' => $user_id,
                    'ip_address' => $current_ip,
                    'user_agent' => $current_user_agent,
                    'last_activity' => now()
                ]
            );

            // Limpiar sesiones expiradas
            UserSession::cleanupExpired();
        } else {
            // Si no hay usuario autenticado, limpiar sesión en la BD
            $session_id = session()->getId();
            UserSession::where('session_id', $session_id)->delete();
        }

        return $next($request);
    }
}
