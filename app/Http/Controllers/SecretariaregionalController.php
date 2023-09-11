<?php

namespace App\Http\Controllers;

use App\Models\Secretariaregional;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SecretariaregionalController extends Controller
{
    
    public function index()
    {
        $secretariaregionals=Secretariaregional::all();
        return view("patologia.secretariaregional.index", [
            'secretariaregionals'   =>  $secretariaregionals
        ]);
    }

    
    public function create()
    {
        return view('patologia.secretariaregional.create');
    }

    
    public function store(Request $request)
    {
        $request->validate(
            ['codigo_regional'=>'required',
             'nom_secretaria_regional'=>'required']
        );

        $secretariaregional = Secretariaregional::create($request->all());
        return redirect()->route('patologia.secretariaregional.edit', $secretariaregional);
    }

    
    public function show(Secretariaregional $secretariaregional)
    {
        //
    }

    
    public function edit(Secretariaregional $secretariaregional)
    {
        
        return view('patologia.secretariaregional.edit');
    }

    
    public function update(Request $request, Secretariaregional $secretariaregional)
    {
        //
    }

    
    public function destroy(Secretariaregional $secretariaregional)
    {
        //
    }
}
