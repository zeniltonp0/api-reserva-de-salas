<?php

namespace App\Http\Controllers\Agendamento;

use App\Http\Controllers\Controller;
use App\Models\Agendamento;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;

class CancelController extends Controller
{
    use AuthorizesRequests;

    public function __invoke(Agendamento $agendamento)
    {
        $this->authorize('cancel', $agendamento);

        if($agendamento->status_id === 3){
            return response()->json([
                'message' => 'Este agendamento já foi cancelado'
            ], 400);
        }

        $agendamento->update([
            'status_id' => 3
        ]);

        return response()->json([
            'message' => 'Agendamento cancelado com sucesso'
        ], 200);
    }
}
