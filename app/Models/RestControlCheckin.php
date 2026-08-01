<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RestControlCheckin extends Model
{
    protected $guarded = [];

    protected $casts = [
        'inside_radius' => 'boolean',
        'captured_at' => 'datetime',
        'consent_given_at' => 'datetime',
    ];

    public function control() { return $this->belongsTo(RestControl::class, 'rest_control_id'); }
}
