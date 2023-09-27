<?php

namespace App\Http\Controllers;

use App\Models\Establecimiento;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EstablecimientoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $establecimientos=Establecimiento::where('estado', true)->get();
        return view("patologia.establecimientos.index", [
            'establecimientos'   =>  $establecimientos
        ]);
    }    
       
    public function create()
    {
        return view('patologia.establecimientos.create');
    }    
        
    public function store(Request $request)
    {
        $request->validate(
            ['codigo_establecimiento'=>'required',
             'nombre_establecimiento'=>'required']
        ); 
        $user = auth()->user();       
        $establecimiento = Establecimiento::create(array_merge($request->all(), ['userid_creator' => $user->id],['username_creator' => $user->email]));
        return redirect()->route('patologia.establecimientos.index')->with('mensaje','Se creó exitosamente');
    }       
    
    public function show(Establecimiento $establecimiento)
    {
        //
    }   
    
    public function edit($id)
    {       
        $establecimiento=Establecimiento::find($id);
        return view('patologia.establecimientos.edit',compact('establecimiento'));
    }    
    
    public function update(Request $request, $id)
    {
        $hoy = date('Y-m-d H:i:s');
        $establecimiento = request()->except(['_token','_method']);
        $user = auth()->user();        
        Establecimiento::where('id', $id)->update(array_merge($establecimiento, ['userid_lastupdated' => $user->id],['username_lastupdated' => $user->email],['updated_at' => $hoy]));           
        return redirect()->route('patologia.establecimientos.index')->with('mensaje', 'Se actualizó exitosamente');
    }      
    
    public function destroy($id)
    {
        $establecimiento = Establecimiento::find($id);
        if (!$establecimiento) {
            return redirect()->route('patologia.establecimientos.index')->with('mensaje', 'No se encontró el establecimiento');
        }
        $establecimiento->estado = FALSE; // Cambia el estado a inactivo
        $establecimiento->save();
        return redirect()->route('patologia.establecimientos.index')->with('mensaje', 'El establecimiento se marcó como inactivo');
    }
}
