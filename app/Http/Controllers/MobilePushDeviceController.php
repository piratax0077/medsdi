<?php

namespace App\Http\Controllers;

use App\Models\MobilePushDevice;
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
        $device = MobilePushDevice::updateOrCreate(
            ['token_hash' => $tokenHash],
            [
                'user_id' => $request->user()->id,
                'fcm_token' => $data['token'],
                'platform' => $data['platform'] ?? 'android',
                'device_uuid' => $data['device_uuid'] ?? null,
                'enabled' => true,
                'last_seen_at' => now(),
            ]
        );

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
