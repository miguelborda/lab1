<?php

namespace App\Http\Controllers;

use App\Models\Municipio;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MunicipioController extends Controller
{
    
    public function index()
    {
        $municipios=Municipio::all();
        return view("patologia.municipios.index", [
            'municipios'   =>  $municipios
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

    
    public function show(Municipio $municipio)
    {
        //
    }

    
    public function edit(Municipio $municipio)
    {
        //
    }

    
    public function update(Request $request, Municipio $municipio)
    {
        //
    }

    
    public function destroy(Municipio $municipio)
    {
        //
    }
}
