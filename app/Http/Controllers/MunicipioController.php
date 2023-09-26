<?php

namespace App\Http\Controllers;

use App\Models\Municipio;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MunicipioController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $municipios=Municipio::all();
        return view("patologia.municipios.index", [
            'municipios'   =>  $municipios
        ]);
    }
        
    public function create()
    {
        return view('patologia.municipios.create');
    }        
    
    public function store(Request $request)
    {
        $request->validate(
            ['codigo_municipio'=>'required',
             'nombre_municipio'=>'required']
        ); 
        $user = auth()->user();        
        $municipio = Municipio::create(array_merge($request->all(), ['userid_creator' => $user->id],['username_creator' => $user->email]));        
        return redirect()->route('patologia.municipios.index')->with('mensaje','Se creó exitosamente');
    }       
    
    public function show(Municipio $municipio)
    {
        //
    }
    
    public function edit($id)
    {       
        $municipio=Municipio::find($id);
        return view('patologia.municipios.edit',compact('municipio'));
    }    
    
    public function update(Request $request, $id)
    {
        $hoy = date('Y-m-d H:i:s');
        $municipio = request()->except(['_token','_method']);
        $user = auth()->user();        
        Municipio::where('id', $id)->update(array_merge($municipio, ['userid_lastupdated' => $user->id],['username_lastupdated' => $user->email],['updated_at' => $hoy]));           
        return redirect()->route('patologia.municipios.index')->with('mensaje', 'Se actualizó exitosamente');
    }   
        
    public function destroy($id)
    {
        Municipio::destroy($id);
        return redirect()->route('patologia.municipios.index')->with('mensaje','Borrado con éxito');
    }
}
