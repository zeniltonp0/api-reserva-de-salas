<?php

namespace App\Http\Controllers\Admin\Sala;

use App\Models\Sala;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\SalaResource;

class IndexController extends Controller
{
    public function __invoke(Request $request)
    {
        $query = Sala::with(['equipamentos', 'status']);

        $query->where('disponivel', true);

        if ($request->has('equipamentos') && is_array($request->equipamentos)) {
            $equipamentosSolicitados = $request->equipamentos;
            foreach ($equipamentosSolicitados as $id) {
                $query->whereHas('equipamentos', function ($q) use ($id) {
                    $q->where('equipamentos.id', $id)
                      ->where('equipamento_sala.ativo', true);
                });
            }
        }

        if ($request->has('capacidade_minima')) {
            $query->where('capacidade', '>=', $request->capacidade_minima);
        }

        if(!$request->user()?->tokenCan('admin:all')) {
            $query->where('ativa', true);
        }
        return SalaResource::collection($query->paginate(10));
    }
}
