<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Sistemas\UserController;
use App\Http\Controllers\DiagnosticoController;
use App\Http\Controllers\AreaController;
use App\Http\Controllers\DistritoController;
use App\Http\Controllers\EstablecimientoController;
use App\Http\Controllers\MunicipioController;
use App\Http\Controllers\SecretariaregionalController;
use App\Http\Controllers\SectorController;



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

Route::middleware($middlewares)->group(function()
{
    Route::get('/Diagnosticos', [DiagnosticoController::class, 'index'])
    ->name('patologia.diagnosticos.index');    
});

Route::middleware($middlewares)->group(function()
{
    Route::get('/Areas', [AreaController::class, 'index'])
    ->name('patologia.areas.index');    
});

Route::middleware($middlewares)->group(function()
{
    Route::get('/Distritos', [DistritoController::class, 'index'])
    ->name('patologia.distritos.index');    
});

Route::middleware($middlewares)->group(function()
{
    Route::get('/Establecimientos', [EstablecimientoController::class, 'index'])
    ->name('patologia.establecimientos.index');    
});

Route::middleware($middlewares)->group(function()
{
    Route::get('/Municipios', [MunicipioController::class, 'index'])
    ->name('patologia.municipios.index');    
});

Route::middleware($middlewares)->group(function()
{
    Route::get('/Secretariaregional', [SecretariaregionalController::class, 'index'])
    ->name('patologia.secretariaregional.index');    
});

Route::middleware($middlewares)->group(function()
{
    Route::get('/Sectores', [SectorController::class, 'index'])
    ->name('patologia.sector.index');    
});



    