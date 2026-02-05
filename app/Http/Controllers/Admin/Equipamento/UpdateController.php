<?php

namespace App\Http\Controllers\Admin\Equipamento;

use App\Http\Controllers\Controller;
use App\Http\Resources\EquipamentoResource;
use App\Models\Equipamento;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UpdateController extends Controller
{
    public function __invoke(Request $request, Equipamento $equipamento)
    {
        if (!$request->user()->tokenCan('admin:all')) {
            return response()->json([
                'message' => 'Você não tem permissão para isso.'
            ], 403);
        }

        $data = $request->validate([
            'nome' => [
                'required',
                'string',
                Rule::unique('equipamentos', 'nome')->ignore($equipamento->id),
                'max:255'
            ]
        ]);

        $equipamento->update($data);

        return EquipamentoResource::make($equipamento)
            ->additional(['message' => 'Equipamento atualizado com sucesso!']);
    }
}
