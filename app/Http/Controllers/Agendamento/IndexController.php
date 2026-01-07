<?php

namespace App\Http\Controllers\Agendamento;

use App\Models\Agendamento;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\Agendamento\AgendamentoResource;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class IndexController extends Controller
{
    use AuthorizesRequests;
    public function index()
    {
        $user = Auth::user();

        $query = $user->agendamentos()->with('sala')->latest();

        return AgendamentoResource::collection($query->paginate(5));
    }

    public function show(Agendamento $agendamento)
    {
        $this->authorize('view', $agendamento);

        return AgendamentoResource::make($agendamento);
    }
}
