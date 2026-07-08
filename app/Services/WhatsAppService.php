<?php

namespace App\Services;

use Twilio\Rest\Client;
use Twilio\Exceptions\TwilioException;

class WhatsAppService
{
    /**
     * Envía un mensaje de WhatsApp usando Twilio.
     *
     * @param  string  $telefono  Número destino (ej: "56912345678" o "+56912345678")
     * @param  string  $mensaje   Texto del mensaje
     * @return array   ['estado' => 1|0, 'msj' => string, 'sid' => string|null]
     */
    public static function enviar(string $telefono, string $mensaje): array
    {
        $sid   = config('services.twilio.sid');
        $token = config('services.twilio.token');
        $from  = config('services.twilio.from_whatsapp');

        if (empty($sid) || empty($token) || empty($from)) {
            return ['estado' => 0, 'msj' => 'Twilio no configurado', 'sid' => null];
        }

        // Normalizar número chileno
        $to = self::normalizarTelefono($telefono);
        if (!$to) {
            return ['estado' => 0, 'msj' => 'Número de teléfono inválido: ' . $telefono, 'sid' => null];
        }

        try {
            $client = new Client($sid, $token);

            $message = $client->messages->create(
                'whatsapp:' . $to,
                [
                    'from' => $from,
                    'body' => $mensaje,
                ]
            );

            return [
                'estado' => 1,
                'msj'    => 'WhatsApp enviado correctamente',
                'sid'    => $message->sid,
            ];

        } catch (TwilioException $e) {
            return [
                'estado' => 0,
                'msj'    => 'Error Twilio: ' . $e->getMessage(),
                'sid'    => null,
            ];
        } catch (\Exception $e) {
            return [
                'estado' => 0,
                'msj'    => 'Error inesperado: ' . $e->getMessage(),
                'sid'    => null,
            ];
        }
    }

    /**
     * Normaliza un número telefónico al formato E.164 chileno (+56XXXXXXXXX).
     * Retorna null si no se puede normalizar.
     */
    private static function normalizarTelefono(string $telefono): ?string
    {
        // Quitar todo lo que no sea dígito
        $numero = preg_replace('/[^0-9]/', '', $telefono);

        if (empty($numero) || $numero === '569') {
            return null;
        }

        // Si empieza con 56 y tiene 11 dígitos → ya está con prefijo
        if (str_starts_with($numero, '56') && strlen($numero) === 11) {
            return '+' . $numero;
        }

        // Si empieza con 9 y tiene 9 dígitos → agregar 56
        if (str_starts_with($numero, '9') && strlen($numero) === 9) {
            return '+56' . $numero;
        }

        // Si tiene 8 dígitos (sin el 9 inicial)
        if (strlen($numero) === 8) {
            return '+569' . $numero;
        }

        return null;
    }
}
