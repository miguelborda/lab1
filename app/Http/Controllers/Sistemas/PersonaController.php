<?php

namespace App\Http\Controllers\Sistemas;

use App\Models\Persona;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PersonaController extends Controller
{
    
    public function index()
    {
        $personas=Persona::all();
        
        $ayer=('2009-10-11');
        $hoy=date('Y-m-d');
        
        $actuals=abs(strtotime($ayer)-strtotime($hoy));
        
        return view("sistemas.personas.index", [
            'personas'   =>  $personas,
            'actuals' => $actuals,
            'hoy' => $hoy,
            'ayer' => $ayer
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

    
    public function show(Persona $persona)
    {
        //
    }

    
    public function edit(Persona $persona)
    {
        //
    }

    
    public function update(Request $request, Persona $persona)
    {
        //
    }

    
    public function destroy(Persona $persona)
    {
        //
    }
}
