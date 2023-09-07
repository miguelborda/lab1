<?php

namespace App\Http\Controllers;

use App\Models\Sector;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SectorController extends Controller
{
    
    public function index()
    {
        $sectors=Sector::all();
        return view("patologia.sector.index", [
            'sectors'   =>  $sectors
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

    
    public function show(Sector $sector)
    {
        //
    }

    
    public function edit(Sector $sector)
    {
        //
    }

    
    public function update(Request $request, Sector $sector)
    {
        //
    }

    
    public function destroy(Sector $sector)
    {
        //
    }
}
