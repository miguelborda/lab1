<?php

namespace App\Http\Controllers;

use App\Models\Paciente;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon; // Asegúrate de importar Carbon
use Illuminate\Validation\Rule;



class PacienteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /*public function calcularEdad(Request $request)
    {
        $fechaNacimiento = $request->input('fecha_nacimiento');
        
        if ($fechaNacimiento) {
            $fechaNacimiento = Carbon::parse($fechaNacimiento);
            $edad = $fechaNacimiento->age;
        } else {
            $edad = null;
        }

        return response()->json(['edad' => $edad]);
    }*/

    public function index()
    {
        $ayer=('2009-10-11');
        $hoy=date('Y-m-d');        
        $actuals=abs(strtotime($ayer)-strtotime($hoy));  
        
        $pacientes = Paciente::all();
        //$pacientes=Paciente::where('estado', true)->get();
        return view("patologia.pacientes.index", [
            'pacientes'   =>  $pacientes,            
            'hoy' => $hoy
        ]);             
    }

    public function pdf()
    {
        $hoy=date('Y-m-d');        
        $pacientes = Paciente::where('estado', true)->orderBy('apellido', 'asc')->get();
        $pdf = Pdf::loadView('patologia.pacientes.pdf', compact('pacientes','hoy'));
        return $pdf->stream();
        //return $pdf->download('invoice.pdf');  --> para descargar pdf
    }
    
    public function create()
    {
        return view('patologia.pacientes.create');
    }        
    
    public function store(Request $request, Paciente $paciente)
    { 
        $request->validate(
            [
                'ci' => 'required|regex:/^[0-9]{5,10}[a-zA-Z0-9-]*$/',
                    Rule::unique('pacientes')->ignore($paciente->id),
                    'regex:/^[0-9]{5,10}[a-zA-Z0-9-]*$/',                
                'nombre' => 'required|regex:/^[a-zA-Z\s]+$/',
                'apellido' => 'required|regex:/^[a-zA-Z\s]+$/',
                'fecha_nacimiento' => 'required|date',
            ], 
            [
                'apellido.regex' => 'Solo se permite letras',
                'nombre.regex' => 'Solo se permite letras',
                'fecha_nacimiento.date' => 'Fecha de nacimiento debe ser una fecha válida.',

            ]
            
        ); 
        $user = auth()->user();
        $hoy=date('Y-m-d'); 
        
        $datosPaciente = $request->all();

        if (!empty($datosPaciente['fecha_nacimiento'])) {
            $fechaNacimiento = $datosPaciente['fecha_nacimiento'];
            $edad = date_diff(date_create($fechaNacimiento), date_create($hoy))->y;
    
            // Agrega la edad al array de datos del paciente
            $datosPaciente['edad'] = $edad;
        }
    
        // Crea el registro del paciente y asocia la ID del usuario
        $paciente = Paciente::create(array_merge($datosPaciente, ['creatoruser_id' => $user->id]));
        //$paciente = Paciente::create($request->all());
        $nombrePaciente = $paciente->nombre;
        $apellidoPaciente = $paciente->apellido;
        return redirect()->route('patologia.pacientes.index')->with('mensaje',"Se creó exitosamente el paciente: $nombrePaciente, $apellidoPaciente");    
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
        Paciente::where('id', $id)->update(array_merge($paciente, ['updateduser_id' => $user->id],['updated_at' => $hoy]));           
        return redirect()->route('patologia.pacientes.index')->with('mensaje', 'Se actualizó exitosamente');
    }       
        
    public function destroy($id)
    {
        $hoy = date('Y-m-d H:i:s');
        $user = auth()->user();    
        $paciente = Paciente::find($id);
        if (!$paciente) {
            return redirect()->route('patologia.pacientes.index')->with('mensaje', 'No se encontró el paciente');
        }
        $paciente->estado = FALSE; // Cambia el estado a inactivo
        $paciente->updateduser_id = $user->id;
        $paciente->updated_at = $hoy;
        $paciente->descripcion = 'Desactivó_el_Estado';
        $paciente->save();
        return redirect()->route('patologia.pacientes.index')->with('mensaje', 'El paciente se marcó como Inactivo');
    }

    public function habilitar($id)
    {
        $hoy = date('Y-m-d H:i:s');
        $user = auth()->user();                
        $paciente = Paciente::find($id);
        if (!$paciente) {
            return redirect()->route('patologia.pacientes.index')->with('mensaje', 'No se encontró el paciente');
        }
        $paciente->estado = TRUE; // Cambia el estado a ACTIVO
        $paciente->updateduser_id = $user->id;
        $paciente->updated_at = $hoy;
        $paciente->descripcion = 'Activó_el_Estado';
        $paciente->save();
        return redirect()->route('patologia.pacientes.index')->with('mensaje', 'El paciente se marcó como Activo');
    }
}