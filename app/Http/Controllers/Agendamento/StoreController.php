<?php

namespace App\Http\Controllers\Agendamento;

use App\Models\Agendamento;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\StatusAgendamento;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\Agendamento\AgendamentoResource;
use App\Http\Requests\Agendamento\StoreAgendamentoRequest;

class StoreController extends Controller
{
    public function __invoke(StoreAgendamentoRequest $request)
    {
        $user = Auth::user();

        

        $conflito = Agendamento::where('sala_id', $request->sala_id)
            ->whereIn('status_id', [1, 2])
            ->where(function ($query) use ($request){
                $query->where('inicio', '<', $request->fim)
                    ->where('fim', '>', $request->inicio);
            })->exists();

        if($conflito){
            return response()->json([
                'message' => 'Já existe um agendamento nesse horário.'
            ], 422);
        }

        $agendamento = $user->agendamentos()->create([
            'sala_id' => $request->sala_id,
            'inicio' => $request->inicio,
            'fim' => $request->fim,
            'motivo' => $request->motivo,
            'status_id' => 1
        ]);

        return AgendamentoResource::make($agendamento);
    }
}
