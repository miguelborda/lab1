<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Resultadof3cito;
use App\Models\Diagnostico;
use App\Models\Detallef3cito;
use App\Models\Paciente;
use Illuminate\Validation\Rule;
use App\Models\Formulario3cito;
use App\Models\Area;
use App\Models\Secretariaregional;
use App\Models\Distrito;
use App\Models\Establecimiento;
use App\Models\Sector;
use App\Models\Servicio;
use App\Models\Medico;

use Barryvdh\DomPDF\Facade\Pdf;
use Dompdf\Dompdf;
use Dompdf\Options;

class Resultadof3citoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function obtenerDatos(Request $request)
    {        
        $datos = Paciente::where('ci', $request->ci)->get();
        $datos2 = Diagnostico::where('codigo_diagnostico', $request->dato)->get();     
        return response()->json($datos,$datos2);
    }

    public function index()
    {        
        $resultadof3citos = Resultadof3cito::where('estado', true)->get();
        return view("patologia.resultadof3citos.index", [
            'resultadof3citos'   =>  $resultadof3citos
        ]);
    }

    public function index2()
    {
        $infors = Detallef3cito::where('estado', true)->get();

        return view("patologia.resultadof3citos.index2", [
            'infors' => $infors
        ]);
    }    
    
    public function pdf($id)
    {        
        $infor = Detallef3cito::find($id);        
        $ci = $infor->ci;
        $numexam = $infor->num_examen;                
        $paciente = Paciente::where('ci', $ci)->first();              
        $resultado = Resultadof3cito::where('num_examen', $numexam)->first();              
        
        $formulario3citos = Formulario3cito::where('num_solicitud', $infor->num_solicitud_id)->first();     // Obtener la información del formulario1s relacionada        
        
        //$secretaria = Secretariaregional::where('id', $formulario3citos->secretaria_regional_id)->first();     // Obtener la información del formulario1s relacionada        
        //$establecimiento = Establecimiento::where('id', $formulario3citos->establecimiento_id)->first();     // Obtener la información del formulario1s relacionada        
        $distrito = Distrito::where('id', $formulario3citos->distrito_id)->first();     // Obtener la información del formulario1s relacionada                
        $sector = Sector::where('id', $formulario3citos->sector_id)->first();     // Obtener la información del formulario1s relacionada        
        $area = Area::where('id', $formulario3citos->area_id)->first();     // Obtener la información del formulario1s relacionada        
        
        $pdf = Pdf::loadView('patologia.resultadof3citos.pdf', compact('infor','paciente','formulario3citos','sector','distrito','area','resultado'));
        return $pdf->stream();
    }

    public function create()
    {           
        $servicios = Servicio::where('estado', true)->orderBy('nombre_servicio', 'asc')->pluck('nombre_servicio','id');
        //$medicos = Medico::where('estado', true)->orderBy('nombre', 'asc')->pluck('nombre','id');  
        $medicos = Medico::where('estado', true)
            ->orderBy('nombre', 'asc')
            ->selectRaw("CONCAT(nombre, ', ', apellido) AS nombre_completo, id")
            ->pluck('nombre_completo', 'id');     
        return view('patologia.resultadof3citos.create', compact('servicios','medicos'));
        
    }

    public function store(Request $request)
    {
        $messages = [
            'num_examen.exists' => 'El número de examen no está registrado.',
            'num_examen.required' => 'El número de examen es obligatorio.',
            'fecha_resultado.required' => 'La fecha de resultado es obligatoria.',          
        ];    
        $request->validate([
            'num_examen' => ['required',Rule::exists('detallef3citos', 'num_examen'),
            ],            
            'fecha_resultado' => 'required',            
        ], $messages);            
        
        $user = auth()->user(); 
        
        $resultadof3citos = Resultadof3cito::create(array_merge($request->all(), ['creatoruser_id' => $user->id]));        
        return redirect()->route('patologia.resultadof3citos.index')->with('mensaje','Se creó exitosamente');
    }          

    public function show(Resultadof3cito $resultadof3citos)
    {
        //$resultadof3citos = Resultadof3cito::where('estado', true)->get();
        //return view("patologia.resultadof3citos.show", [
        //    'resultadof3citos'   =>  $resultadof3citos
        //]);
    }
    
    public function edit(Resultadof3cito $resultadof3cito, $id)
    {
        $resultadof3citos = Formulario3cito::find($id);
        return view('patologia.formulario3cito.edit',compact('formulario3citos'));
    }
     
    public function buscardatosf3(Request $request)
    {
        $resultado= Detallef3cito::where('num_examen', $request->dato)->first();
        if(isset($resultado) ){
            $paciente = Paciente::where('ci', $resultado->ci)->first();
            return response()->json($paciente);
        }else{
            return response()->json('no_existe');
        }
       // $resultadof3citos=Formulario3cito::find($id);
      //  return view('patologia.formulariocito.edit',compact('formulariocitos'));
    }
    public function buscardiagnostico(Request $request)
    {
        $resultado= Diagnostico::where('codigo_diagnostico', $request->dato)->first();
        return response()->json($resultado);
        
       // $resultadof2s=Formulario3cito::find($id);
      //  return view('patologia.formulario3cito.edit',compact('formulariocitos'));
    }
}
