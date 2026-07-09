<?php

namespace App\Services\Mensajeria;

use App\Services\Mensajeria\Drivers\LogMensajeriaDriver;
use App\Services\Mensajeria\Drivers\TwilioMensajeriaDriver;
use App\Services\Mensajeria\Drivers\ApiMensajeriaDriver;

class MensajeriaService
{
    public function enviarWhatsapp(string $telefono, string $mensaje, array $metadata = []): array
    {
        return $this->driver()->enviarWhatsapp($telefono, $mensaje, $metadata);
    }

    private function driver()
    {
        $driver = config('mensajeria.driver', 'log');

        switch ($driver) {
            case 'twilio':
                return new TwilioMensajeriaDriver();

            case 'api':
                return new ApiMensajeriaDriver();

            case 'log':
            default:
                return new LogMensajeriaDriver();
        }
    }
}
