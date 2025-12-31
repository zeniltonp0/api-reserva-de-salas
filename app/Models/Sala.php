<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Sala extends Model
{
    /** @use HasFactory<\Database\Factories\SalaFactory> */
    use HasFactory;

    public function agendamentos(): HasMany {
        return $this->hasMany(Agendamento::class);
    }
}
