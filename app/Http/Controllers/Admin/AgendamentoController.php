<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\AgendamentoResource;
use App\Models\Agendamento;
use Illuminate\Http\Request;

class AgendamentoController extends Controller
{
    public function aprovar(Agendamento $agendamento, Request $request){

        if (!$request->hasValidSignature() && (!$request->user() || !$request->user()->tokenCan('admin:all'))) {
            return response()->json(['message' => 'Ação não autorizada.'], 403);
        }

        $agendamento->update([
            'status_id' => 2
        ]);

        $agendamento->load('sala');

        return AgendamentoResource::make($agendamento)
            ->additional(['message' => 'Agendamento aprovado.']);
    }

    public function recusar(Agendamento $agendamento, Request $request){

        if (!$request->hasValidSignature() && (!$request->user() || !$request->user()->tokenCan('admin:all'))) {
            return response()->json(['message' => 'Ação não autorizada.'], 403);
        }

        $agendamento->update([
            'status_id' => 3
        ]);

        $agendamento->load('sala');

        return AgendamentoResource::make($agendamento)
            ->additional(['message' => 'Agendamento recusado.']);
    }
}
