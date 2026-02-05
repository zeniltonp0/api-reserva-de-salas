<?php

namespace App\Http\Controllers\Admin\Equipamento;

use App\Http\Controllers\Controller;
use App\Http\Resources\EquipamentoResource;
use App\Models\Equipamento;
use Illuminate\Http\Request;

class DestroyController extends Controller
{
    public function __invoke(Request $request, Equipamento $equipamento)
    {
        if (!$request->user()->tokenCan('admin:all')) {
            return response()->json([
                'message' => 'Você não tem permissão para isso.'
            ], 403);
        }
        
        if ($equipamento->salas()->exists()) {
            return response()->json([
                'message' => 'Não é possível excluir este equipamento pois ele está vinculado a uma ou mais salas.',
                'count' => $equipamento->salas()->count()
            ], 422);
        }

        $equipamento->delete();

        return EquipamentoResource::make($equipamento)
            ->additional(['message' => 'Equipamento excluído com sucesso!']);

    }
}
