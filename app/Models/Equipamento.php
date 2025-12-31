<?php

namespace App\Models;

use App\Models\Sala;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Equipamento extends Model
{
    /** @use HasFactory<\Database\Factories\EquipamentoFactory> */
    use HasFactory;

    public function salas(): BelongsToMany
{
    return $this->belongsToMany(Sala::class, 'equipamento_sala')
                ->withPivot('quantidade')
                ->withTimestamps();
}
}
