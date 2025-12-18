<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AgentController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/agents/create', [AgentController::class, 'create']);
Route::post('/agents', [AgentController::class, 'store']);

Route::get('/agents', [AgentController::class, 'index']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/agents', [AgentController::class, 'index']);
    Route::get('/agents/create', [AgentController::class, 'create']);
    Route::post('/agents', [AgentController::class, 'store']);
    Route::get('/agents/{id}/edit', [AgentController::class, 'edit']);
    Route::put('/agents/{id}', [AgentController::class, 'update']);
    Route::delete('/agents/{id}', [AgentController::class, 'destroy']);

});

Route::delete('/agents/{id}', [AgentController::class, 'destroy']);

Route::get('/agents/{id}/edit', [AgentController::class, 'edit']);
Route::put('/agents/{id}', [AgentController::class, 'update']);

require __DIR__.'/auth.php';
