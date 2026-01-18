<?php

namespace App\Http\Controllers\Admin\Sala;

use App\Http\Controllers\Controller;
use App\Http\Resources\SalaResource;
use App\Models\Sala;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;

class DeactivateController extends Controller
{
    use AuthorizesRequests;

    public function __invoke(Request $request, Sala $sala)
    {
        $this->authorize('deactivate', $sala);

        $sala->update(['ativa' => false]);

        return SalaResource::make($sala)
            ->additional(['message' => 'Sala desativada com sucesso!']);
    }
}
