<?php

namespace App\Http\Controllers\Admin\Sala;

use App\Http\Controllers\Controller;
use App\Http\Requests\Sala\StoreSalaRequest;
use App\Http\Resources\SalaResource;
use App\Models\Sala;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function __invoke(StoreSalaRequest $request)
    {
        if (!$request->user()->tokenCan('sala:gerenciar')) {
            return response()->json([
                'message' => 'Você não tem permissão para criar uma sala'
            ], 403);
        }

        $sala = Sala::create([
            'tipo_sala_id' => $request->tipo_sala_id,
            'predio_id' => $request->predio_id,
            'nome' => $request->nome,
            'capacidade' => $request->capacidade,
            'andar' => $request->andar,
            'ativa' => $request->ativa,
        ]);

        return SalaResource::make($sala);
    }
}
