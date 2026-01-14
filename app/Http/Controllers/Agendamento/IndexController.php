<?php

namespace App\Http\Controllers\Agendamento;

use App\Models\Agendamento;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\AgendamentoResource;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class IndexController extends Controller
{
    use AuthorizesRequests;
    public function __invoke()
    {
        $user = Auth::user();

        $query = $user->agendamentos()->with('sala')->latest();

        return AgendamentoResource::collection($query->paginate(5));
    }
}
