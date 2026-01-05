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
