<?php

namespace App\Http\Controllers\Agendamento;

use App\Models\Agendamento;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Auth\Middleware\Authorize;
use App\Http\Resources\Agendamento\AgendamentoResource;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class IndexController extends Controller
{
    use AuthorizesRequests;
    public function index()
    {
        $user = Auth::user();

        return $user->agendamentos()->paginate(5);
    }

    public function show(Agendamento $agendamento)
    {
        $this->authorize('view', $agendamento);

        return AgendamentoResource::make($agendamento);
    }
}
