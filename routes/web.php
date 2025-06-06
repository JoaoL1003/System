<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
Route::post('/login', [AuthenticatedSessionController::class, 'store']);

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', function () {
    return view('auth.login');
})->middleware(['auth', 'verified'])->name('login');

Route::middleware('auth')->group(function () {
    Route::get('/colaboradores/create', function () {
        return view('auth.colaboradores.create');
    })->name('colaboradores.create');
});


require __DIR__.'/auth.php';
