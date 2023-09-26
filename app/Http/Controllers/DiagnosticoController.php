<?php

namespace App\Http\Controllers;

use App\Models\Diagnostico;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DiagnosticoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
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
        $user = auth()->user();       
        $diagnostico = Diagnostico::create(array_merge($request->all(), ['userid_creator' => $user->id],['username_creator' => $user->email]));
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
        $hoy = date('Y-m-d H:i:s');
        $diagnostico = request()->except(['_token','_method']);
        $user = auth()->user();        
        Diagnostico::where('id', $id)->update(array_merge($diagnostico, ['userid_lastupdated' => $user->id],['username_lastupdated' => $user->email],['updated_at' => $hoy]));   
        return redirect()->route('patologia.diagnosticos.index')->with('mensaje', 'Se actualizó exitosamente');
    }   


    public function destroy($id)
    {
        Diagnostico::destroy($id);
        return redirect()->route('patologia.diagnosticos.index')->with('mensaje','borrado');
    }
}
