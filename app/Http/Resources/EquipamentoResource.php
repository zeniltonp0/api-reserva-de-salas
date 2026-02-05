<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EquipamentoResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
        'id' => $this->id,
        'nome' => $this->nome,
        'descricao' => $this->descricao,
        'marca' => $this->marca,
        'quantidade' => $this->whenPivotLoaded('equipamento_sala', function () {
            return $this->pivot->quantidade;
        }),
        'ativo' => $this->whenPivotLoaded('equipamento_sala', function () {
            return (bool) $this->pivot->ativo;
        }),
    ];
    }
}
