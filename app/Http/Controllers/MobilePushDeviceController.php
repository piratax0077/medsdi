<?php

namespace App\Http\Controllers;

use App\Models\MobilePushDevice;
use App\Models\UsersDevices;
use Illuminate\Http\Request;

class MobilePushDeviceController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'token' => 'required|string|max:4096',
            'platform' => 'nullable|in:android,ios',
            'device_uuid' => 'nullable|string|max:255',
        ]);

        $tokenHash = hash('sha256', $data['token']);

        // Un teléfono solo debe recibir notificaciones de la cuenta que
        // mantiene la sesión actual. Deshabilita asociaciones anteriores
        // del mismo UUID para evitar avisos cruzados entre usuarios.
        $userIds = collect([$request->user()->id]);

        if (!empty($data['device_uuid'])) {
            $userIds = $userIds->merge(
                UsersDevices::where('uuid', $data['device_uuid'])
                    ->where('estado', 1)
                    ->pluck('id_user')
            );
        }

        $device = null;
        foreach ($userIds->filter()->unique() as $userId) {
            $registeredDevice = MobilePushDevice::updateOrCreate(
                [
                    'user_id' => $userId,
                    'token_hash' => $tokenHash,
                ],
                [
                    'fcm_token' => $data['token'],
                    'platform' => $data['platform'] ?? 'android',
                    'device_uuid' => $data['device_uuid'] ?? null,
                    'enabled' => true,
                    'last_seen_at' => now(),
                ]
            );

            if ((int) $userId === (int) $request->user()->id) {
                $device = $registeredDevice;
            }
        }

        return response()->json(['registered' => true, 'device_id' => $device->id]);
    }

    public function destroy(Request $request)
    {
        $data = $request->validate(['token' => 'required|string|max:4096']);
        MobilePushDevice::where('user_id', $request->user()->id)
            ->where('token_hash', hash('sha256', $data['token']))
            ->update(['enabled' => false]);

        return response()->json(['registered' => false]);
    }
}
