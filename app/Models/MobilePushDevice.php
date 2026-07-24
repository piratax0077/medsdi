<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MobilePushDevice extends Model
{
    protected $guarded = [];
    protected $casts = [
        'enabled' => 'boolean',
        'last_seen_at' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
