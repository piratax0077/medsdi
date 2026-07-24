<?php

namespace App\Services;

use App\Models\MobilePushDevice;
use Firebase\JWT\JWT;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;
use RuntimeException;

class FirebaseCloudMessaging
{
    private $client;
    private $credentials;

    public function __construct(Client $client)
    {
        $this->client = $client;
        $path = config('services.firebase.credentials');

        if (!$path || !is_file($path)) {
            throw new RuntimeException('No se encontró la credencial de Firebase.');
        }

        $this->credentials = json_decode(file_get_contents($path), true);
        if (
            empty($this->credentials['project_id']) ||
            empty($this->credentials['client_email']) ||
            empty($this->credentials['private_key'])
        ) {
            throw new RuntimeException('La credencial de Firebase no es válida.');
        }
    }

    public function sendLoginApproval($challenge)
    {
        $devices = MobilePushDevice::where('user_id', $challenge->user_id)
            ->where('enabled', true)
            ->get();

        foreach ($devices as $device) {
            $this->sendToDevice($device, [
                'message' => [
                    'token' => $device->fcm_token,
                    'notification' => [
                        'title' => 'Nuevo acceso a MED-SDI',
                        'body' => 'Tienes una solicitud de acceso pendiente de aprobación.',
                    ],
                    'data' => [
                        'type' => 'login_approval',
                        'challenge_id' => (string) $challenge->id,
                        'target_user_id' => (string) $challenge->user_id,
                        'notification_foreground' => 'true',
                        'notification_title' => 'Nuevo acceso a MED-SDI',
                        'notification_body' => 'Tienes una solicitud de acceso pendiente de aprobación.',
                        'notification_android_channel_id' => 'medsdi_security',
                        'notification_android_sound' => 'default',
                    ],
                    'android' => [
                        'priority' => 'high',
                        'notification' => [
                            'channel_id' => 'medsdi_security',
                            'icon' => 'ic_stat_medsdi',
                            'sound' => 'default',
                            'color' => '#1450BD',
                        ],
                    ],
                ],
            ]);
        }
    }

    public function sendAuthorizationRequest($authorization)
    {
        $devices = MobilePushDevice::where('user_id', $authorization->id_user_recept)
            ->where('enabled', true)
            ->get();
        $sentDevices = 0;

        $messageData = json_decode($authorization->msg, true) ?: [];
        $isPrescriptionBook = (int) $authorization->tipo === 12
            && ($messageData['evento'] ?? '') === 'Apertura de talonarios';
        $isBonusPurchase = (int) $authorization->tipo === 13;
        $isInformedConsent = (int) $authorization->tipo === 4;

        if ($isPrescriptionBook) {
            $title = 'Autoriza la apertura de tus talonarios';
            $body = 'Tienes una solicitud de apertura de recetarios y licencias pendiente en MED-SDI.';
        } elseif ($isBonusPurchase) {
            $title = 'Autoriza la compra de tu bono';
            $body = 'Tienes una solicitud de compra de bono pendiente en MED-SDI.';
        } elseif ($isInformedConsent) {
            $title = 'Consentimiento informado pendiente';
            $consentName = trim((string) ($messageData['nombre_consentimiento'] ?? ''));
            $body = $consentName !== ''
                ? 'Tienes pendiente autorizar el consentimiento '.$consentName.' en MED-SDI.'
                : 'Tienes un consentimiento informado pendiente de autorización en MED-SDI.';
        } else {
            $title = 'Nueva solicitud de autorización';
            $body = 'Tienes una solicitud pendiente de aprobación en MED-SDI.';
        }

        foreach ($devices as $device) {
            if ($this->sendToDevice($device, [
                'message' => [
                    'token' => $device->fcm_token,
                    'notification' => [
                        'title' => $title,
                        'body' => $body,
                    ],
                    'data' => [
                        'type' => 'authorization_request',
                        'authorization_id' => (string) $authorization->id,
                        'authorization_type' => (string) $authorization->tipo,
                        'target_user_id' => (string) $authorization->id_user_recept,
                        'notification_foreground' => 'true',
                        'notification_title' => $title,
                        'notification_body' => $body,
                        'notification_android_channel_id' => 'medsdi_security',
                        'notification_android_sound' => 'default',
                    ],
                    'android' => [
                        'priority' => 'high',
                        'notification' => [
                            'channel_id' => 'medsdi_security',
                            'icon' => 'ic_stat_medsdi',
                            'sound' => 'default',
                            'color' => '#1450BD',
                        ],
                    ],
                ],
            ])) {
                $sentDevices++;
            }
        }

        return $sentDevices;
    }

    private function sendToDevice(MobilePushDevice $device, array $payload)
    {
        $projectId = $this->credentials['project_id'];

        try {
            $this->client->post(
                "https://fcm.googleapis.com/v1/projects/{$projectId}/messages:send",
                [
                    'headers' => [
                        'Authorization' => 'Bearer '.$this->accessToken(),
                        'Accept' => 'application/json',
                    ],
                    'json' => $payload,
                    'timeout' => 8,
                ]
            );

            return true;
        } catch (RequestException $exception) {
            $body = $exception->hasResponse()
                ? (string) $exception->getResponse()->getBody()
                : $exception->getMessage();

            if (strpos($body, 'UNREGISTERED') !== false || strpos($body, 'INVALID_ARGUMENT') !== false) {
                $device->update(['enabled' => false]);
            }

            Log::warning('No fue posible enviar una notificación FCM.', [
                'device_id' => $device->id,
                'response' => $body,
            ]);

            return false;
        }
    }

    private function accessToken()
    {
        $cacheKey = 'firebase_fcm_access_token_'.$this->credentials['project_id'];

        return Cache::remember($cacheKey, now()->addMinutes(50), function () {
            $now = time();
            $assertion = JWT::encode([
                'iss' => $this->credentials['client_email'],
                'scope' => 'https://www.googleapis.com/auth/firebase.messaging',
                'aud' => 'https://oauth2.googleapis.com/token',
                'iat' => $now,
                'exp' => $now + 3600,
            ], $this->credentials['private_key'], 'RS256');

            $response = $this->client->post('https://oauth2.googleapis.com/token', [
                'form_params' => [
                    'grant_type' => 'urn:ietf:params:oauth:grant-type:jwt-bearer',
                    'assertion' => $assertion,
                ],
                'timeout' => 8,
            ]);

            $body = json_decode((string) $response->getBody(), true);
            if (empty($body['access_token'])) {
                throw new RuntimeException('Firebase no entregó un token OAuth.');
            }

            return $body['access_token'];
        });
    }
}
