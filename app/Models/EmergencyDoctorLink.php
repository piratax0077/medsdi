<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmergencyDoctorLink extends Model
{
    protected $guarded = [];
    protected $casts = [
        'accepted_at' => 'datetime',
        'revoked_at' => 'datetime',
    ];
}
