<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Twilio\TwiML\MessagingResponse;
use Illuminate\Support\Facades\Log;

class WhatsappController extends Controller
{
    public function webhook(Request $request)
    {
        Log::info('WhatsApp entrante desde Twilio', [
            'from' => $request->input('From'),
            'to'   => $request->input('To'),
            'body' => $request->input('Body'),
            'sid'  => $request->input('MessageSid'),
        ]);

        $mensaje = 'Hola 👋 Hemos recibido correctamente tu mensaje en MedSDI.';

        $xml = '<?xml version="1.0" encoding="UTF-8"?>
            <Response>
                <Message>' . htmlspecialchars($mensaje, ENT_XML1, 'UTF-8') . '</Message>
            </Response>';

        return response($xml, 200)
            ->header('Content-Type', 'text/xml');
    }
}
