<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LoginApprovalChallenge extends Model
{
    public $incrementing = false;
    protected $keyType = 'string';
    protected $guarded = [];
    protected $casts = ['expires_at' => 'datetime', 'decided_at' => 'datetime'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function isPending()
    {
        return $this->status === 'pending' && $this->expires_at->isFuture();
    }
}
