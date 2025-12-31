<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TipoSala extends Model
{
    /** @use HasFactory<\Database\Factories\TipoSalaFactory> */
    use HasFactory;

    public function salas(): HasMany {
        return $this->hasMany(Sala::class);
    }
}
