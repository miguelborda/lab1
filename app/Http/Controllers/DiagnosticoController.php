<?php

namespace App\Http\Controllers;

use App\Models\Diagnostico;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DiagnosticoController extends Controller
{

    public function index()
    {
        $diagnosticos=Diagnostico::all();
        return view("patologia.diagnosticos.index", [
            'diagnosticos'   =>  $diagnosticos
        ]);
    }


    public function create()
    {
        //
        return view('patologia.diagnosticos.create');
    }


    public function store(Request $request)
    {
        $request->validate(
            ['codigo_diagnostico'=>'required',
             'descripcion_diagnostico'=>'required']
        ); 

        $diagnostico = Diagnostico::create($request->all());
        return redirect()->route('patologia.diagnosticos.index')->with('mensaje','Se creó exitosamente');
    }    

    
    public function show(Diagnostico $diagnosticos)
    {
        //
    }


    public function edit($id)
    {
        //
        /*$diagnostico = Diagnostico::where('codigo_diagnostico', $codigo_diagnostico)->first();
        return view('patologia.diagnosticos.edit', compact('diagnostico'));*/
        
        $diagnostico=Diagnostico::find($id);
        return view('patologia.diagnosticos.edit',compact('diagnostico'));
    }    

    public function update(Request $request, $id)
    {
        $diagnostico = request()->except(['_token','_method']);
        Diagnostico::where('id','=',$id)->update($diagnostico);
        return redirect()->route('patologia.diagnosticos.index')->with('mensaje', 'Se actualizó exitosamente');
    }   


    public function destroy($id)
    {
        Diagnostico::destroy($id);
        return redirect()->route('patologia.diagnosticos.index')->with('mensaje','borrado');
    }
}
