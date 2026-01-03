<?php

namespace App\Http\Controllers\Agendamento;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class StoreController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $request->validate([
            'sala_id' => ['required', Rule::exists('salas', 'id')],
            'inicio' => ['required', 'date', 'after:now'],
            'fim' => ['required', 'date', 'after:inicio'],
            'motivo' => ['string', 'min:5', 'max:255']
        ]);

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
