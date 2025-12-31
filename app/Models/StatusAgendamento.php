<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class StatusAgendamento extends Model
{
    /** @use HasFactory<\Database\Factories\StatusAgendamentoFactory> */
    use HasFactory;

    public function agendamentos(): HasMany {
        return $this->hasMany(Agendamento::class);
    }
}
