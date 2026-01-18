<?php

namespace App\Http\Controllers\Admin\Sala;

use App\Models\Sala;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\SalaResource;

class IndexController extends Controller
{
    public function __invoke(Request $request)
    {
        $query = Sala::query();

        if(!$request->user()?->tokenCan('admin:all')) {
            $query->where('ativa', true);
        }

        $query->orderBy('nome', 'asc');

        return SalaResource::collection($query->paginate(10));
    }
}
