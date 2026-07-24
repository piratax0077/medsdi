<?php

namespace App\Services;

use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Encryption\Encrypter;
use Illuminate\Support\Facades\Crypt;

class LegacyPayloadDecrypter
{
    public function decrypt($payload, $unserialize = true)
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

    private function legacyKey()
    {
        $key = config('app.legacy_key');

        if (empty($key)) {
            return null;
        }

        if (strpos($key, 'base64:') === 0) {
            $key = base64_decode(substr($key, 7), true);
        }

        if ($key === false || !Encrypter::supported($key, config('app.cipher'))) {
            throw new \RuntimeException('LEGACY_APP_KEY no es válida para el cifrado configurado.');
        }

        return $key;
    }
}
