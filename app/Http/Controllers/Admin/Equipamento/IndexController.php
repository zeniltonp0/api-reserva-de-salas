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
        if (!$request->user()->tokenCan('admin:all')) {
            return response()->json([
                'message' => 'Você não tem permissão para isso.'
            ], 403);
        }
        
        $query = Equipamento::query();

        if($request->has('nome')) {
            $query->where('nome', 'like', '%' . $request->nome . '%');
        }

        $query->orderBy('nome', 'asc');

        return EquipamentoResource::collection($query->paginate(10));
    }
}
