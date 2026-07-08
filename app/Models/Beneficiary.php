<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Beneficiary extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'rut', 'name', 'email', 'phone', 'enabled'];

    protected $casts = ['enabled' => 'boolean'];

    public function bonuses()
    {
        return $this->hasMany(Bonus::class);
    }
}
