<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class AgendaUpdated implements ShouldBroadcast
{
    use InteractsWithSockets, SerializesModels;

    public $tipo;   // create | update | delete
    public $evento; // datos del evento

    public function __construct($tipo, $evento)
    {
        $this->tipo = $tipo;
        $this->evento = $evento;
    }

    public function broadcastOn()
    {
        // Canal público
        return new Channel('agenda-channel');
    }

    public function broadcastAs()
    {
        return 'AgendaUpdated';
    }
}
