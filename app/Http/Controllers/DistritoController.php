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
        return view('patologia.distritos.create');
    }    
    
    public function store(Request $request)
    {
        $request->validate(
            ['codigo_distrito'=>'required',
             'nombre_distrito'=>'required']
        ); 
        $distrito = Distrito::create($request->all());
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
        $distrito = request()->except(['_token','_method']);
        Distrito::where('id','=',$id)->update($distrito);
        return redirect()->route('patologia.distritos.index')->with('mensaje', 'Se actualizó exitosamente');
    }   
    
    public function destroy($id)
    {
        Distrito::destroy($id);
        return redirect()->route('patologia.distritos.index')->with('mensaje','Borrado con éxito');
    }
}


