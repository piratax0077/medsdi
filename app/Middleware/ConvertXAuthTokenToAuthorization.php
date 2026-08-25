<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
class ConvertXAuthTokenToAuthorization
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // Cordova mantiene compatibilidad con X-Auth-Token, pero Sanctum ya sabe
        // autenticar Bearer tokens. Convertimos el header sin consultar la BD aquí;
        // así evitamos resolver el mismo token dos veces por petición.
        if ($request->hasHeader('X-Auth-Token') && !$request->bearerToken()) {
            $token = trim((string) $request->header('X-Auth-Token'));

            if ($token !== '') {
                $request->headers->set('Authorization', 'Bearer ' . $token);
            }
        }

        return $next($request);
    }
}