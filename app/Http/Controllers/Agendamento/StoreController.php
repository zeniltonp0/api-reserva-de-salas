<?php

namespace App\Http\Controllers\Agendamento;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use App\Http\Requests\Agendamento\StoreAgendamentoRequest;
use Illuminate\Support\Facades\Auth;

class StoreController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(StoreAgendamentoRequest $request)
    {
        $user = Auth::user();

        $user->agendamentos()->create([
            'sala_id' => $request->sala_id,
            'inicio' => $request->inicio,
            'fim' => $request->fim,
            'motivo' => $request->motivo,
            'status_id' => 1
        ]);

        return response()->json([
            'message' => 'Agendamento criado com sucesso!',
            'data' => $request->inicio,
        ], 201);
    }
}
