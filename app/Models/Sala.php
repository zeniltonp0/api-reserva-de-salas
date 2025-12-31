<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Sala extends Model
{
    /** @use HasFactory<\Database\Factories\SalaFactory> */
    use HasFactory;

    public function agendamentos(): HasMany {
        return $this->hasMany(Agendamento::class);
    }

    public function tipoSala(): BelongsTo {
        return $this->belongsTo(TipoSala::class);
    }

    public function predio(): BelongsTo {
        return $this->belongsTo(Predio::class);
    }

    public function equipamentos(){
        return $this->belongsToMany(Equipamento::class, 'equipamento_sala')
                    ->withPivot('quantidade', 'ativo')
                    ->withTimestamps();
    }
}
