<?php

namespace App\Http\Controllers;

use App\Models\Paciente;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PacienteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

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

        $user = auth()->user();

        // Crea el registro del paciente y asocia la ID del usuario
        $paciente = Paciente::create(array_merge($request->all(), ['userid_creator' => $user->id],['username_creator' => $user->email]));
        //$paciente = Paciente::create($request->all());
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
        $hoy = date('Y-m-d H:i:s');
        $paciente = request()->except(['_token','_method']);
        $user = auth()->user();        
        Paciente::where('id', $id)->update(array_merge($paciente, ['userid_lastupdated' => $user->id],['username_lastupdated' => $user->email],['updated_at' => $hoy]));           
        return redirect()->route('patologia.paciente.index')->with('mensaje', 'Se actualizó exitosamente');
    }       
    
    public function destroy($id)
    {
        Paciente::destroy($id);
        return redirect()->route('patologia.paciente.index')->with('mensaje','Borrado con éxito');
    }
}