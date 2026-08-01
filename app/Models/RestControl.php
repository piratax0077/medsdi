<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RestControl extends Model
{
    protected $guarded = [];

    protected $casts = [
        'verify_medications' => 'boolean',
        'verify_location' => 'boolean',
        'requested_at' => 'datetime',
        'accepted_at' => 'datetime',
        'last_reminder_at' => 'datetime',
        'next_reminder_at' => 'datetime',
        'ends_at' => 'datetime',
    ];

    public function patient() { return $this->belongsTo(Paciente::class, 'patient_id'); }
    public function professional() { return $this->belongsTo(Profesional::class, 'professional_id'); }
    public function license() { return $this->belongsTo(Licencia::class, 'license_id'); }
    public function checkins() { return $this->hasMany(RestControlCheckin::class)->latest('captured_at'); }
}
