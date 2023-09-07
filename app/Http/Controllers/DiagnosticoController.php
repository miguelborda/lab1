<?php

namespace App\Http\Controllers;

use App\Models\Diagnostico;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DiagnosticoController extends Controller
{
    
    public function index()
    {
        $diagnosticos=Diagnostico::all();
        return view("patologia.diagnosticos.index", [
            'diagnosticos'   =>  $diagnosticos
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

    
    public function show(Diagnosticos $diagnosticos)
    {
        //
    }

    
    public function edit(Diagnosticos $diagnosticos)
    {
        //
    }

    
    public function update(Request $request, Diagnosticos $diagnosticos)
    {
        //
    }

    
    public function destroy(Diagnosticos $diagnosticos)
    {
        //
    }
}
