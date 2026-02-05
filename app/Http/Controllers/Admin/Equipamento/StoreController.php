<?php

namespace App\Http\Controllers\Admin\Equipamento;

use App\Http\Controllers\Controller;
use App\Http\Resources\EquipamentoResource;
use App\Models\Equipamento;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function __invoke(Request $request)
    {
        if (!$request->user()->tokenCan('admin:all')) {
            return response()->json([
                'message' => 'Você não tem permissão para isso.'
            ], 403);
        }

        $data = $request->validate([
            'nome' => ['required', 'string', 'max: 255', 'min:3'],
            'marca' => ['required', 'string', 'max: 255', 'min:2'],
            'descricao' => ['string', 'max:255', 'min:3']
        ]);

        $equipamento = Equipamento::create($data);

        return EquipamentoResource::make($equipamento)
            ->additional(['message' => 'Novo tipo de equipamento criado com sucesso!']);
    }
}
