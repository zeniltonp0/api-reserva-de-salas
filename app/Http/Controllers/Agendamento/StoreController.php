<?php

namespace App\Http\Controllers\Agendamento;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\Agendamento\AgendamentoResource;
use App\Http\Requests\Agendamento\StoreAgendamentoRequest;
use App\Models\User;
use App\Notifications\SolicitacaoAgendamento;
use Illuminate\Support\Facades\Notification;

class StoreController extends Controller
{
    public function __invoke(StoreAgendamentoRequest $request)
    {
        if (!$request->user()->tokenCan('agendamento:solicitar')) {
            return response()->json([
                'message' => 'Você não tem permissão para solicitar um agendamento'
            ], 403);
        }

        $user = Auth::user();

        $agendamento = $user->agendamentos()->create([
            'sala_id' => $request->sala_id,
            'inicio' => $request->inicio,
            'fim' => $request->fim,
            'motivo' => $request->motivo,
            'status_id' => 1
        ]);

        $admin = User::where('role', 'admin')->get();

        Notification::send($admin, new SolicitacaoAgendamento($agendamento));

        return AgendamentoResource::make($agendamento);
    }
}
