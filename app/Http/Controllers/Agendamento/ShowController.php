<?php

namespace App\Http\Controllers\Agendamento;

use App\Models\Agendamento;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\Agendamento\AgendamentoResource;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class ShowController extends Controller
{
    use AuthorizesRequests;
    
    public function __invoke(Agendamento $agendamento)
    {
        $this->authorize('view', $agendamento);

        return AgendamentoResource::make($agendamento);
    }
}
