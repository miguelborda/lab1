<?php

namespace App\Http\Controllers;

use App\Models\Distrito;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DistritoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $distritos=Distrito::where('estado', true)->get();
        return view("patologia.distritos.index", [
            'distritos'   =>  $distritos
        ]);
    }       
    
    public function create()
    {
        return view('patologia.distritos.create');
    }    
    
    public function store(Request $request)
    {
        $request->validate(
            ['codigo_distrito'=>'required',
             'nombre_distrito'=>'required']
        ); 
        $user = auth()->user();       
        $distrito = Distrito::create(array_merge($request->all(), ['userid_creator' => $user->id],['username_creator' => $user->email]));
        return redirect()->route('patologia.distritos.index')->with('mensaje','Se creó exitosamente');
    }
    
    public function show(Distrito $distrito)
    {
        //
    }
        
    public function edit($id)
    {       
        $distrito=Distrito::find($id);
        return view('patologia.distritos.edit',compact('distrito'));
    }    
        
    public function update(Request $request, $id)
    {
        $hoy = date('Y-m-d H:i:s');
        $distrito = request()->except(['_token','_method']);
        $user = auth()->user();        
        Distrito::where('id', $id)->update(array_merge($distrito, ['userid_lastupdated' => $user->id],['username_lastupdated' => $user->email],['updated_at' => $hoy]));           
        return redirect()->route('patologia.distritos.index')->with('mensaje', 'Se actualizó exitosamente');
    }       
    
    public function destroy($id)
    {
        $distrito = Distrito::find($id);
        if (!$distrito) {
            return redirect()->route('patologia.distritos.index')->with('mensaje', 'No se encontró el distrito');
        }
        $distrito->estado = FALSE; // Cambia el estado a inactivo
        $distrito->save();
        return redirect()->route('patologia.distritos.index')->with('mensaje', 'El distrito se marcó como inactivo');
    }
}


