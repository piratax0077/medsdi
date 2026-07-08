<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Professional extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'rut', 'name', 'specialty', 'registry_number', 'institution', 'enabled',
    ];

    protected $casts = ['enabled' => 'boolean'];

    public function bonuses()
    {
        return $this->hasMany(Bonus::class);
    }
}
