<?php

namespace App\Http\Controllers\Admin\Sala;

use App\Http\Controllers\Controller;
use App\Http\Resources\SalaResource;
use App\Models\Sala;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function __invoke(Request $request)
    {
        $request->validate([
            'tipo_sala_id' => 'required',
            'predio_id' => 'required',
            'nome' => 'required|string',
            'capacidade' => 'required|integer',
            'andar' => 'required|integer',
            'ativa' => 'required',
        ]);

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
