<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class HoraMedicaUpdated implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $horaMedica;
    public $tipo; // 'create', 'update', 'delete'

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($horaMedica, $tipo = 'update')
    {
        $this->horaMedica = $horaMedica;
        $this->tipo = $tipo;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        // Canal específico para el profesional de esta hora médica
        $id_profesional = $this->horaMedica->id_profesional ?? 3;

        if ($id_profesional) {
            return new Channel('horas-medicas.' . $id_profesional);
        }

        // Fallback al canal general si no hay id_profesional
        return new Channel('horas-medicas');
    }

    /**
     * Nombre del evento que escuchará el frontend
     */
    public function broadcastAs()
    {
        return 'HoraMedicaUpdated';
    }

    /**
     * Datos que se enviarán al frontend
     */
    public function broadcastWith()
    {
        return [
            'hora' => [
                'id' => $this->horaMedica->id ?? null,
                'id_profesional' => $this->horaMedica->id_profesional ?? null,
                'id_paciente' => $this->horaMedica->id_paciente ?? null,
                'fecha' => $this->horaMedica->fecha ?? null,
                'hora_inicio' => $this->horaMedica->hora_inicio ?? null,
                'estado' => $this->horaMedica->estado ?? null,
            ],
            'tipo' => $this->tipo,
            'timestamp' => now()->toDateTimeString(),
        ];
    }
}
