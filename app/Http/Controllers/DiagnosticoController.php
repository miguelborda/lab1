<?php

namespace App\Http\Controllers;

use App\Models\Diagnostico;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DiagnosticoController extends Controller
{
    
    public function index()
    {
        //        
        return "index diagnostico";
    }   
    public function create()
    {
        //
        return "crear";       
    }    
    public function store(Request $request)
    {
        //
    }    
    public function show(Diagnostico $diagnostico)
    {
        //
    }    
    public function edit(Diagnostico $diagnostico)
    {
        //
        return "aqui se actualiza";
    }    
    public function update(Request $request, Diagnostico $diagnostico)
    {
        //
    }    
    public function destroy(Diagnostico $diagnostico)
    {
        //
    }
}
