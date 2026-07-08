<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserSession extends Model
{
    use HasFactory;

    protected $table = 'user_sessions';

    protected $fillable = [
        'id_usuario',
        'session_id',
        'ip_address',
        'user_agent',
        'last_activity',
    ];

    protected $casts = [
        'last_activity' => 'datetime',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * Relación con User
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'id_usuario');
    }

    /**
     * Obtener sesiones activas de un usuario
     */
    public static function activeSessions($userId)
    {
        return self::where('id_usuario', $userId)->get();
    }

    /**
     * Limpiar sesiones expiradas
     */
    public static function cleanupExpired()
    {
        // Eliminar sesiones con más de 24 horas sin actividad
        self::where('last_activity', '<', now()->subHours(24))->delete();
    }
}
