<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function __invoke(Request $request)
    {
        $data = $request->validate([
            'name'     => ['required', 'min:3', 'max:255'],
            'email'    => ['required', 'min:3', 'max:255', 'email', 'unique:users'],
            'password' => ['required', 'min:8', 'max:40'],
            'role' => ['required']
        ]);

        $user = User::create($data);
        return response()->json($user, 201);

        // Auth::login($user);

    }
}
