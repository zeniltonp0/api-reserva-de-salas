<?php

namespace App\Http\Controllers\Admin\Sala;

use App\Models\Sala;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Sala\UpdateSalaRequest;
use App\Http\Resources\SalaResource;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class UpdateController extends Controller
{
    use AuthorizesRequests;

    public function __invoke(UpdateSalaRequest $request, Sala $sala)
    {
        if (!$request->user()->tokenCan('admin:all')) {
            return response()->json(['message' => 'Você não tem permissão para isso.'], 403);
        }

        $this->authorize('update', $sala);

        $estaDesativando = $request->has('ativa') && $request->ativa == false;

        $sala->update([
            'nome' => $request->nome,
            'capacidade' => $request->capacidade,
            'ativa' => $request->ativa
        ]);

        if ($estaDesativando) {
            $agendamentosAfetados = $sala->agendamentos()
                ->whereIn('status_id', [1, 2])
                ->where('inicio', '>', now())
                ->get();

            foreach ($agendamentosAfetados as $agendamento) {
                $agendamento->update(['status_id' => 3]);
            }
        }

        return SalaResource::make($sala)
            ->additional(['message' => 'Sala atualizada com sucesso!']);
    }
}
