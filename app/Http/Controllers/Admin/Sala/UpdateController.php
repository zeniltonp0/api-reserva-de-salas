<?php

namespace App\Http\Controllers\Admin\Sala;

use App\Models\Sala;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\SalaResource;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class UpdateController extends Controller
{
    use AuthorizesRequests;

    public function __invoke(Request $request, Sala $sala)
    {
        if (!$request->user()->tokenCan('admin:all')) {
            return response()->json(['message' => 'Você não tem permissão para isso.'], 403);
        }

        $data = $request->validate([
            'nome' => ['sometimes', 'string', 'min:3', 'max:255'],
            'capacidade' => ['sometimes', 'integer', 'min:1'],
            'ativa' => ['sometimes', 'boolean'],
        ]);

        $sala->update($data);

        return SalaResource::make($sala)
            ->additional(['message' => 'Sala atualizada com sucesso!']);
    }
}
