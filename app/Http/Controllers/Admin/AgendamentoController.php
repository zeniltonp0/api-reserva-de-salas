<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Agendamento;
use Illuminate\Http\Request;

class AgendamentoController extends Controller
{
    public function aprovar(Agendamento $agendamento){
        $agendamento->update([
            'status_id' => 2
        ]);

        return response()->json(['message' => 'Agendamento aprovado com sucesso!'], 200);
    }

    public function recusar(Agendamento $agendamento){
        $agendamento->update([
            'status_id' => 3
        ]);

        return response()->json(['message' => 'Agendamento recusado com sucesso!'], 200);
    }
}
