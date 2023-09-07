<?php

namespace App\Http\Controllers;

use App\Models\Establecimiento;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EstablecimientoController extends Controller
{
    
    public function index()
    {
        $establecimientos=Establecimiento::all();
        return view("patologia.establecimientos.index", [
            'establecimientos'   =>  $establecimientos
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

    
    public function show(Establecimiento $establecimiento)
    {
        //
    }

    
    public function edit(Establecimiento $establecimiento)
    {
        //
    }

    
    public function update(Request $request, Establecimiento $establecimiento)
    {
        //
    }

    
    public function destroy(Establecimiento $establecimiento)
    {
        //
    }
}
