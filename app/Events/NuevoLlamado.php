<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class NuevoLlamado implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $llamado;
    public $idTelevisor;

    public function __construct($llamado, $idTelevisor)
    {
        $this->llamado = $llamado;
        $this->idTelevisor = $idTelevisor;
    }

    public function broadcastOn()
    {
        return new Channel('llamados.' . $this->idTelevisor);
    }
}
