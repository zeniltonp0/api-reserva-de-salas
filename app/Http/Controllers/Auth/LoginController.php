<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    public function __invoke(Request $request)
    {
        $data = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        if(!Auth::attempt($data)){
            throw ValidationException::withMessages([
                'email' => __('auth.failed')
            ]);
        }

        
        $user = User::where('email', $request->email)->firstOrFail();
        
        $abilities = $user->role === 'admin'
        ? ['admin:all']
        : ['agendamento:solicitar', 'agendamento:view', 'agendamento:cancelar'];

       $token = $user->createToken('auth_token', $abilities)->plainTextToken;

       return response()->json([
           'access_token' => $token,
       ]);
       
    }
}
