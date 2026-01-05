<?php

use App\Http\Controllers\Agendamento\IndexController;
use App\Http\Controllers\Agendamento\StoreController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
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
Route::post('/logout', LogoutController::class)->name('logout')->middleware('auth:sanctum');

Route::post('/agendamentos', StoreController::class)->name('agendamentos.store')->middleware('auth:sanctum');
Route::get('/agendamentos', [IndexController::class, 'index'])->name('agendamentos.index')->middleware('auth:sanctum');
Route::get('/agendamentos/{agendamento}', [IndexController::class, 'show'])->name('agendamentos.show')->middleware('auth:sanctum');