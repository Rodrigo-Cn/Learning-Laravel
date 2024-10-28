<?php

use App\Http\Controllers\TarefaController;
use Illuminate\Support\Facades\Route;

Route::get('/', [TarefaController::class, 'index']);
Route::get('/event/create', [TarefaController::class, 'eventcreate'])->middleware('auth');
Route::post('/event/create', [TarefaController::class, 'create'])->middleware('auth');
Route::get('/event/{id}', [TarefaController::class, 'detail'])->middleware('auth');
Route::get('/delete/{id}', [TarefaController::class, 'destroy'])->middleware('auth');
Route::get('/edit/{id}', [TarefaController::class, 'edit'])->middleware('auth');
Route::put('/edit/{id}', [TarefaController::class, 'editconfirm'])->middleware('auth');
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
