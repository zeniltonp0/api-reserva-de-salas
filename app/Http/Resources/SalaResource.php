<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SalaResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'tipo_sala_id' => $this->tipoSala->nome,
            'predio_id' => $this->predio->nome,
            'nome' => $this->nome,
            'capacidade' => $this->capacidade,
            'andar' => $this->andar,
            'ativa' => $this->ativa,
        ];
    }
}
