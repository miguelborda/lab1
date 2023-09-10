<?php

namespace App\Http\Controllers;

use App\Models\Paciente;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PacienteController extends Controller
{
    
    public function index()
    {
        $pacientes=Paciente::all();
        return view("patologia.pacientes.index", [
            'pacientes'   =>  $pacientes
        ]);
    }

    
    public function create()
    {
        //
    }

    
    public function store(Request $request)
    {
        //
    }

    
    public function show(Paciente $paciente)
    {
        //
    }

    
    public function edit(Paciente $paciente)
    {
        //
    }

    
    public function update(Request $request, Paciente $paciente)
    {
        //
    }

    
    public function destroy(Paciente $paciente)
    {
        //
    }
}
