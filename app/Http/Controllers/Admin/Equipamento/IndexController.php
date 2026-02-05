<?php

namespace App\Http\Controllers\Admin\Equipamento;

use App\Http\Controllers\Controller;
use App\Http\Resources\EquipamentoResource;
use App\Models\Equipamento;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke(Request $request)
    {
        $query = Equipamento::query();

        if($request->has('nome')) {
            $query->where('nome', 'like', '%' . $request->nome . '%');
        }

        $query->orderBy('nome', 'asc');

        return EquipamentoResource::collection($query->paginate(10));
    }
}
