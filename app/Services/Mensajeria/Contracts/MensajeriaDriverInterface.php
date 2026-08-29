<?php

namespace App\Services\Mensajeria\Contracts;

interface MensajeriaDriverInterface
{
    public function enviarWhatsapp(string $telefono, string $mensaje, array $metadata = []): array;
    public function enviarSms(string $telefono, string $mensaje, array $metadata = []): array;
}
