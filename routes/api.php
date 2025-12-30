<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/user', function(Request $request){
    return response()->json([
            'success' => true,
            'user' => $request->user(),
        ]);
})->middleware('auth:sanctum');

Route::post('/register', RegisterController::class)->name('register');
Route::post('/login', LoginController::class)->name('login');
