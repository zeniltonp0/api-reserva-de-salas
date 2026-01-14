<?php

namespace App\Http\Controllers\Admin\Sala;

use App\Http\Controllers\Controller;
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

        Sala::create([
            'tipo_sala_id' => $request->tipo_sala_id,
            'predio_id' => $request->predio_id,
            'nome' => $request->nome,
            'capacidade' => $request->capacidade,
            'andar' => $request->andar,
            'ativa' => $request->ativa,
        ]);

        return response()->json([
            'message' => 'Sala cadastrada com sucesso!',
        ]);
    }
}
