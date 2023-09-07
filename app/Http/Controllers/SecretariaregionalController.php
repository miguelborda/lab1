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
        //
    }

        public function store(Request $request)
    {
        //
    }

    
    public function show(Secretariaregional $secretariaregional)
    {
        //
    }

    
    public function edit(Secretariaregional $secretariaregional)
    {
        //
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
