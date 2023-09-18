<?php

namespace App\Http\Controllers;

use App\Models\Secretariaregional;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SecretariaregionalController extends Controller
{
    
    public function index()
    {
        $secretariaregionals=Secretariaregional::all();
        return view("patologia.secretariaregional.index", [
            'secretariaregionals'   =>  $secretariaregionals
        ]);
    }

    
    public function create()
    {
        return view('patologia.secretariaregional.create');
    }

    
    public function store(Request $request)
    {
        $request->validate(
            ['codigo_regional'=>'required',
             'nom_secretaria_regional'=>'required']
        );

        $secretariaregional = Secretariaregional::create($request->all());
        return redirect()->route('patologia.secretariaregional.index')->with('mensaje','Se creó exitosamente');
    }

    
    public function show(Secretariaregional $secretariaregional)
    {
        //
    }

    
    public function edit($id)
    {           
        $secretariaregional=Secretariaregional::find($id);
        //echo $secretariaregional;
        //$secretariaregional=Secretariaregional::all();  
        //dd($secretariaregional);   
        //$valor=Secretariaregional::where('codigo_regional',$secretariaregional)->first();
        //dd($valor);
        //return view("patologia.secretariaregional.edit", [
        //    'secretariaregional'   =>  $secretariaregional
        //]);
        //$valor1=Secretariaregional::where('$secretariaregional.id==id')
        return view('patologia.secretariaregional.edit',compact('secretariaregional'));
        //return($secretariaregional);
        //echo $data;
        //print($data);
    }

    
    public function update(Request $request, $id)
    {
        Secretariaregional::find($id)->update($request->all());
        //echo $request;
        return redirect()->route('patologia.secretariaregional.index')->with('mensaje','Se actualizó exitosamente');
        //$request->validate(
          //  ['codigo_regional'=>'required',
          //   'nom_secretaria_regional'=>'required']
        //);
        //$secretariaregional->update($request->all());
        //return redirect()->route('patologia.secretariaregional.edit',$secretariaregional)->with('mensaje','Se actualizaron los datos');
    }

    
    public function destroy($id)
    {

        //$secretariaregional->delete(); 
        Secretariaregional::destroy($id);
        return redirect()->route('patologia.secretariaregional.index')->with('mensaje','borrado');
    }
}
