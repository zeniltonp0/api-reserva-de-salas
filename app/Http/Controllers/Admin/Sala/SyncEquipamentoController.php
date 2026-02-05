<?php

namespace App\Http\Controllers\Admin\Sala;

use App\Http\Controllers\Controller;
use App\Http\Resources\SalaResource;
use App\Models\Sala;
use Illuminate\Http\Request;

class SyncEquipamentoController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, Sala $sala)
    {
        $request->validate([
            'equipamentos' => 'required|array',
            'equipamentos.*.id' => 'required|exists:equipamentos,id',
            'equipamentos.*.quantidade' => 'required|integer|min:1',
            'equipamentos.*.ativo' => 'boolean'
        ]);

        $dadosParaSync = [];
        foreach ($request->equipamentos as $item) {
            $dadosParaSync[$item['id']] = [
            'quantidade' => $item['quantidade'],
            'ativo' => $item['ativo'] ?? true
        ];
}

        $sala->equipamentos()->sync($dadosParaSync);

        return SalaResource::make($sala->load('equipamentos'))
            ->additional(['message' => 'Inventário da sala atualizado com sucesso!']);
    }
}
