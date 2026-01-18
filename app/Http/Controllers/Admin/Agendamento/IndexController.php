<?php

namespace App\Http\Controllers\Admin\Agendamento;

use App\Http\Controllers\Controller;
use App\Http\Resources\AgendamentoResource;
use App\Models\Agendamento;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke(Request $request)
    {
        if (!$request->user()->tokenCan('admin:all')) {
            return response()->json([
                'message' => 'Você não tem permissão para isso.'
            ], 403);
        }

        $agendamentos = Agendamento::with(['user', 'sala'])->paginate(10);

        return AgendamentoResource::collection($agendamentos);
    }
}
