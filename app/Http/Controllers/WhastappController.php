<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Twilio\TwiML\MessagingResponse;

class WhatsappController extends Controller
{
    public function webhook(Request $request)
    {
        \Log::info('Mensaje recibido', $request->all());

        $twiml = new MessagingResponse();

        $twiml->message("Hola 👋, recibimos tu mensaje correctamente.");

        return response($twiml, 200)
            ->header('Content-Type', 'text/xml');
    }
}
