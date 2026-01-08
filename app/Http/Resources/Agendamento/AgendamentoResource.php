<?php

namespace App\Http\Resources\Agendamento;

use App\Models\Agendamento;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AgendamentoResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'inicio' => $this->inicio,
            'fim' => $this->fim,
            'sala' => $this->sala->nome,
            'status' => $this->status->nome,
            'motivo' => $this->motivo,
        ];
    }
}
