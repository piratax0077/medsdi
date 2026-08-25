<?php

namespace App\Services;

use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Encryption\Encrypter;
use Illuminate\Support\Facades\Crypt;
use RuntimeException;

class LegacyPayloadDecrypter
{
    /**
     * Intenta descifrar primero con la APP_KEY actual.
     * Si falla, utiliza LEGACY_APP_KEY cuando esté configurada.
     */
    public function decrypt(mixed $payload, bool $unserialize = true): mixed
    {
        try {
            return Crypt::decrypt($payload, $unserialize);
        } catch (DecryptException $currentKeyException) {
            $legacyKey = $this->legacyKey();

            if ($legacyKey === null) {
                throw $currentKeyException;
            }

            return (new Encrypter($legacyKey, config('app.cipher')))
                ->decrypt($payload, $unserialize);
        }
    }

    /**
     * Obtiene y valida la clave histórica definida en config/app.php.
     */
    private function legacyKey(): ?string
    {
        $key = config('app.legacy_key');

        if (empty($key) || !is_string($key)) {
            return null;
        }

        if (str_starts_with($key, 'base64:')) {
            $decoded = base64_decode(substr($key, 7), true);

            if ($decoded === false) {
                throw new RuntimeException(
                    'LEGACY_APP_KEY no contiene un valor base64 válido.'
                );
            }

            $key = $decoded;
        }

        if (! Encrypter::supported($key, config('app.cipher'))) {
            throw new RuntimeException(
                'LEGACY_APP_KEY no es válida para el cifrado configurado.'
            );
        }

        return $key;
    }
}
