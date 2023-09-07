<?php

namespace App\Http\Controllers;

use App\Models\Distrito;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DistritoController extends Controller
{
    
    public function index()
    {
        $distritos=Distrito::all();
        return view("patologia.distritos.index", [
            'distritos'   =>  $distritos
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

    
    public function show(Distrito $distrito)
    {
        //
    }

    
    public function edit(Distrito $distrito)
    {
        //
    }

    
    public function update(Request $request, Distrito $distrito)
    {
        //
    }

    
    public function destroy(Distrito $distrito)
    {
        //
    }
}
