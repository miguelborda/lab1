<?php

namespace App\Http\Controllers;

use App\Models\Formulario1;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Formulario1Controller extends Controller
{
    
    public function index()
    {
        $formulario1s=Formulario1::all();
        return view("patologia.formulario1.index", [
            'formulario1s'   =>  $formulario1s
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

    
    public function show(Formulario1 $formulario1)
    {
        //
    }

    
    public function edit(Formulario1 $formulario1)
    {
        //
    }

    
    public function update(Request $request, Formulario1 $formulario1)
    {
        //
    }

    
    public function destroy(Formulario1 $formulario1)
    {
        //
    }
}
