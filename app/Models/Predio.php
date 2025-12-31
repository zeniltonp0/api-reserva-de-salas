<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Predio extends Model
{
    /** @use HasFactory<\Database\Factories\PredioFactory> */
    use HasFactory;

    public function salas(): HasMany {
        return $this->hasMany(Sala::class);
    }
}
