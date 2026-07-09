<?php

namespace App\Services\Mensajeria\Drivers;

use App\Services\Mensajeria\Contracts\MensajeriaDriverInterface;
use Twilio\Rest\Client;
use Twilio\Exceptions\TwilioException;

class TwilioMensajeriaDriver implements MensajeriaDriverInterface
{
    public function enviarWhatsapp(string $telefono, string $mensaje, array $metadata = []): array
    {
        $sid = config('mensajeria.twilio.sid');
        $token = config('mensajeria.twilio.token');
        $from = config('mensajeria.twilio.from');

        if (empty($sid) || empty($token) || empty($from)) {
            return [
                'estado' => 0,
                'msj' => 'Twilio no configurado',
                'driver' => 'twilio',
                'sid' => null,
            ];
        }

        $to = $this->normalizarTelefono($telefono);

        if (!$to) {
            return [
                'estado' => 0,
                'msj' => 'Número inválido: ' . $telefono,
                'driver' => 'twilio',
                'sid' => null,
            ];
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
                'msj' => 'WhatsApp enviado correctamente',
                'driver' => 'twilio',
                'sid' => $message->sid,
            ];

        } catch (TwilioException $e) {
            return [
                'estado' => 0,
                'msj' => 'Error Twilio: ' . $e->getMessage(),
                'driver' => 'twilio',
                'sid' => null,
            ];
        } catch (\Exception $e) {
            return [
                'estado' => 0,
                'msj' => 'Error inesperado: ' . $e->getMessage(),
                'driver' => 'twilio',
                'sid' => null,
            ];
        }
    }

    private function normalizarTelefono(string $telefono): ?string
    {
        $numero = preg_replace('/[^0-9]/', '', $telefono);

        if (empty($numero) || $numero === '569') {
            return null;
        }

        if (strpos($numero, '56') === 0 && strlen($numero) === 11) {
            return '+' . $numero;
        }

        if (strpos($numero, '9') === 0 && strlen($numero) === 9) {
            return '+56' . $numero;
        }

        if (strlen($numero) === 8) {
            return '+569' . $numero;
        }

        return null;
    }
}
