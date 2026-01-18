<?php

namespace App\Http\Controllers\Admin\Agendamento;

use App\Models\Agendamento;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\AgendamentoResource;

class AprovacaoController extends Controller
{
    public function __invoke(Request $request, Agendamento $agendamento)
    {
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
}
