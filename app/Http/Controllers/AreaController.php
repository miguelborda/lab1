<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AreaController extends Controller
{
    
    public function index()
    {
        $areas=Area::all();
        return view("patologia.areas.index", [
            'areas'   =>  $areas
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

    
    public function show(Area $area)
    {
        //
    }

    
    public function edit(Area $area)
    {
        //
    }

    
    public function update(Request $request, Area $area)
    {
        //
    }

    
    public function destroy(Area $area)
    {
        //
    }
}
