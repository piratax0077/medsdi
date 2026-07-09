<?php

namespace App\Services\Mensajeria\Drivers;

use App\Services\Mensajeria\Contracts\MensajeriaDriverInterface;
use Illuminate\Support\Facades\Log;

class LogMensajeriaDriver implements MensajeriaDriverInterface
{
    public function enviarWhatsapp(string $telefono, string $mensaje, array $metadata = []): array
    {
        Log::info('WhatsApp simulado', [
            'telefono' => $telefono,
            'mensaje' => $mensaje,
            'metadata' => $metadata,
        ]);

        return [
            'estado' => 1,
            'msj' => 'Mensaje registrado en log',
            'driver' => 'log',
            'sid' => null,
        ];
    }
}
