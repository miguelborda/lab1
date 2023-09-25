<?php

namespace App\Http\Controllers;

use App\Models\Paciente;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PacienteController extends Controller
{
    
    public function index()
    {
        $ayer=('2009-10-11');
        $hoy=date('Y-m-d');        
        $actuals=abs(strtotime($ayer)-strtotime($hoy));  
        
        $pacientes=Paciente::all();
        return view("patologia.pacientes.index", [
            'pacientes'   =>  $pacientes,            
            'hoy' => $hoy

        ]);      
        
        
        
    }
    
    public function create()
    {
        return view('patologia.pacientes.create');
    }        
    
    public function store(Request $request)
    {
        $request->validate(
            ['ci_paciente'=>'required',
             'nombre_paciente'=>'required',
             'apellido_paciente'=>'required']
        ); 
        $paciente = Paciente::create($request->all());
        return redirect()->route('patologia.paciente.index')->with('mensaje','Se creó exitosamente');
    }       
    
    public function show(Paciente $paciente)
    {
        //
    }
    
    public function edit($id)
    {       
        $paciente=Paciente::find($id);
        return view('patologia.pacientes.edit',compact('paciente'));
    }          

    public function update(Request $request, $id)
    {
        $paciente = request()->except(['_token','_method']);
        Paciente::where('id','=',$id)->update($paciente);
        return redirect()->route('patologia.paciente.index')->with('mensaje', 'Se actualizó exitosamente');
    }       
    
    public function destroy($id)
    {
        Paciente::destroy($id);
        return redirect()->route('patologia.paciente.index')->with('mensaje','Borrado con éxito');
    }
}