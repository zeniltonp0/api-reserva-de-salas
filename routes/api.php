<?php

use App\Http\Controllers\Admin\AgendamentoController;
use App\Http\Controllers\Agendamento\CancelController;
use App\Http\Controllers\Agendamento\IndexController;
use App\Http\Controllers\Agendamento\ShowController;
use App\Http\Controllers\Agendamento\StoreController;
use App\Http\Controllers\Admin\Sala;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Http\Request;
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

Route::middleware('auth:sanctum')->group(function(){
    Route::post('/agendamentos', StoreController::class)->name('agendamentos.store');
    Route::get('/agendamentos', IndexController::class)->name('agendamentos.index');
    Route::get('/agendamentos/{agendamento}', ShowController::class)->name('agendamentos.show');
    Route::patch('/agendamentos/{agendamento}/cancel', CancelController::class)->name('agendamentos.cancel');
    Route::post('/salas', Sala\StoreController::class)->name('salas.store');
    Route::get('/salas', Sala\IndexController::class)->name('salas.index');
});

Route::middleware('signed')->group(function(){
    Route::get('admin/agendamentos/{agendamento}/aprovar', [AgendamentoController::class, 'aprovar'])->name('admin.agendamento.aprovar');
    Route::get('admin/agendamentos/{agendamento}/recusar', [AgendamentoController::class, 'recusar'])->name('admin.agendamento.recusar');
});