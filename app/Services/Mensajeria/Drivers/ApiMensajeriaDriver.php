<?php

namespace App\Services\Mensajeria\Drivers;

use App\Services\Mensajeria\Contracts\MensajeriaDriverInterface;
use Illuminate\Support\Facades\Http;

class ApiMensajeriaDriver implements MensajeriaDriverInterface
{
    public function enviarWhatsapp(string $telefono, string $mensaje, array $metadata = []): array
    {
        $url = config('mensajeria.api.url');
        $token = config('mensajeria.api.token');

        if (empty($url) || empty($token)) {
            return [
                'estado' => 0,
                'msj' => 'API de mensajería no configurada',
                'driver' => 'api',
                'sid' => null,
            ];
        }

        try {
            $response = Http::withToken($token)->post(rtrim($url, '/') . '/api/whatsapp/enviar', [
                'telefono' => $telefono,
                'mensaje' => $mensaje,
                'metadata' => $metadata,
            ]);

            if (!$response->successful()) {
                return [
                    'estado' => 0,
                    'msj' => 'Error API mensajería: ' . $response->body(),
                    'driver' => 'api',
                    'sid' => null,
                ];
            }

            return [
                'estado' => 1,
                'msj' => 'Mensaje enviado mediante API externa',
                'driver' => 'api',
                'sid' => $response->json('sid'),
                'respuesta' => $response->json(),
            ];

        } catch (\Exception $e) {
            return [
                'estado' => 0,
                'msj' => 'Error API mensajería: ' . $e->getMessage(),
                'driver' => 'api',
                'sid' => null,
            ];
        }
    }
}
