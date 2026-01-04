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
        /** @var Agendamento $this */
        return [
            'message' => 'Agendamento criado com sucesso!',
            'inicio' => $request->inicio,
            'fim' => $request->fim,
            'sala' => $request->sala_id,
            'motivo' => $request->motivo,
        ];
    }
}
