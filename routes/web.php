<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Sistemas\UserController;
use App\Http\Controllers\DiagnosticoController;



$middlewares[] = 'auth';

Route::get('/', function () {
    return view('home');
})->middleware('auth');

Route::get('/register', [RegisterController::class, 'create'])
    ->middleware('guest')
    ->name('register.index');

Route::post('/register', [RegisterController::class, 'store'])
    ->name('register.store');



Route::get('/login', [SessionsController::class, 'create'])
    ->middleware('guest')
    ->name('login.index');

Route::post('/login', [SessionsController::class, 'store'])
    ->name('login.store');

Route::get('/logout', [SessionsController::class, 'destroy'])
    ->middleware('auth')
    ->name('login.destroy');


Route::get('/admin', [AdminController::class, 'index'])
    ->middleware('auth.admin')
    ->name('admin.index');


Route::middleware($middlewares)->group(function()
{
    Route::get('/Usuarios', [UserController::class, 'index'])
    ->name('sistemas.usuarios.index');    
});

Route::get('/Edit', [DiagnosticoController::class, 'edit'])->name('Diagnostico.edit');

Route::get('/diagnostico', [DiagnosticoController::class, 'index'])->name('diagnostico.index');
    
Route::get('/diagnosticocrear', [DiagnosticoController::class, 'create'])->name('Diagnostico.create');


    