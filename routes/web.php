<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Sistemas\UserController;
use App\Http\Controllers\Sistemas\PersonaController;
use App\Http\Controllers\Sistemas\RoleController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DiagnosticoController;
use App\Http\Controllers\AreaController;
use App\Http\Controllers\DistritoController;
use App\Http\Controllers\EstablecimientoController;
use App\Http\Controllers\MunicipioController;
use App\Http\Controllers\SecretariaregionalController;
use App\Http\Controllers\SectorController;
use App\Http\Controllers\PacienteController;
use App\Http\Controllers\Formulario1Controller;
use App\Http\Controllers\Detallef1sController;
use App\Http\Controllers\Resultadof1sController;

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

    Route::get('/Personas', [PersonaController::class, 'index'])
    ->name('sistemas.personas.index');    

    Route::get('/Roles', [RoleController::class, 'index'])
    ->name('sistemas.roles.index');
});

Route::middleware($middlewares)->group(function()
{
    Route::get('Diagnosticos/pdf', [DiagnosticoController::class, 'pdf'])->name('patologia.diagnosticos.pdf');     
    Route::resource('/Diagnosticos', DiagnosticoController::class)->names('patologia.diagnosticos');
});

Route::middleware($middlewares)->group(function()
{   
    Route::get('Areas/pdf', [AreaController::class, 'pdf'])->name('patologia.areas.pdf');     
    Route::resource('/Areas', AreaController::class)->names('patologia.areas');    
});

Route::middleware($middlewares)->group(function()
{
    Route::get('Distritos/pdf', [DistritoController::class, 'pdf'])->name('patologia.distritos.pdf');     
    Route::resource('/Distritos', DistritoController::class)->names('patologia.distritos');
});

Route::middleware($middlewares)->group(function()
{
    Route::get('Establecimientos/pdf', [EstablecimientoController::class, 'pdf'])->name('patologia.establecimientos.pdf');     
    Route::resource('/Establecimientos', EstablecimientoController::class)->names('patologia.establecimientos');
});

Route::middleware($middlewares)->group(function()
{
    Route::get('Municipios/pdf', [MunicipioController::class, 'pdf'])->name('patologia.municipios.pdf');     
    Route::resource('/Municipios', MunicipioController::class)->names('patologia.municipios');
});

Route::middleware($middlewares)->group(function()
{
    Route::get('Secretariaregional/pdf', [SecretariaregionalController::class, 'pdf'])->name('patologia.secretariaregional.pdf');     
    Route::resource('/Secretariaregional', SecretariaregionalController::class)->names('patologia.secretariaregional');
});

Route::middleware($middlewares)->group(function()
{
    Route::get('Sector/pdf', [SectorController::class, 'pdf'])->name('patologia.sector.pdf');     
    Route::resource('/Sector', SectorController::class)->names('patologia.sector');
});

Route::middleware($middlewares)->group(function()
{   
    Route::get('Pacientes/pdf', [PacienteController::class, 'pdf'])->name('patologia.paciente.pdf');      
    Route::resource('/Pacientes', PacienteController::class)->names('patologia.paciente');
    //Route::post('/calcular-edad', 'PacienteController@calcularEdad');

});

Route::middleware($middlewares)->group(function()
{
    Route::get('Formulario1s/pdf', [Formulario1Controller::class, 'pdf'])->name('patologia.formulario1.pdf');      
    Route::resource('/Formulario1s', Formulario1Controller::class)->names('patologia.formulario1');    
});
Route::middleware($middlewares)->group(function()
{
    Route::get('Detallef1s/pdf', [Detallef1sController::class, 'pdf'])->name('patologia.detallef1s.pdf');      
    Route::resource('/Detallef1s', Detallef1sController::class)->names('patologia.detallef1s');    
});
Route::middleware($middlewares)->group(function()
{
    Route::get('Resultadof1s/pdf', [Resultadof1sController::class, 'pdf'])->name('patologia.resultadof1s.pdf');      
    Route::resource('/Resultadof1s', Resultadof1sController::class)->names('patologia.resultadof1s');    
});

