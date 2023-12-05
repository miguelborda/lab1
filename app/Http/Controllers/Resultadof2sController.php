<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Resultadof2s;
use App\Models\Diagnostico;
use App\Models\Detallef2s;
use App\Models\Paciente;
use Illuminate\Validation\Rule;
use App\Models\Formulario2;
use App\Models\Area;
use App\Models\Secretariaregional;
use App\Models\Distrito;
use App\Models\Establecimiento;
use App\Models\Sector;

use Barryvdh\DomPDF\Facade\Pdf;
use Dompdf\Dompdf;
use Dompdf\Options;

class Resultadof2sController extends Controller
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
        $resultadof2s = Resultadof2s::where('estado', true)->get();
        return view("patologia.resultadof2s.index", [
            'resultadof2s'   =>  $resultadof2s
        ]);
    }

    public function index2()
    {
        $infors = Detallef2s::where('estado', true)->get();

        return view("patologia.resultadof2s.index2", [
            'infors' => $infors
        ]);
    }    
    
    public function pdf($id)
    {        
        $infor = Detallef2s::find($id);        
        $ci = $infor->ci;
        $numexam = $infor->num_examen;                
        $paciente = Paciente::where('ci', $ci)->first();        
        $diagnosticos = Resultadof2s::where('num_examen', $numexam)     // Obtener los diagnósticos relacionados
            ->pluck('codigo_diagnostico');        
        $diagnosticosInfo = Diagnostico::whereIn('codigo_diagnostico', $diagnosticos)->get();   // Obtener la información detallada de los diagnósticos        
        $formulario2s = Formulario2::where('num_solicitud', $infor->num_solicitud_id)->first();     // Obtener la información del formulario1s relacionada        
        
        //$secretaria = Secretariaregional::where('id', $formulario2s->secretaria_regional_id)->first();     // Obtener la información del formulario1s relacionada        
        //$establecimiento = Establecimiento::where('id', $formulario2s->establecimiento_id)->first();     // Obtener la información del formulario1s relacionada        
        $distrito = Distrito::where('id', $formulario2s->distrito_id)->first();     // Obtener la información del formulario1s relacionada                
        $sector = Sector::where('id', $formulario2s->sector_id)->first();     // Obtener la información del formulario1s relacionada        
        $area = Area::where('id', $formulario2s->area_id)->first();     // Obtener la información del formulario1s relacionada        
        
        $pdf = Pdf::loadView('patologia.resultadof2s.pdf', compact('infor','paciente','diagnosticosInfo','formulario2s','sector','distrito','area'));
        return $pdf->stream();
    }

    public function create()
    {           
        return view('patologia.resultadof2s.create');
    }

    public function store(Request $request)
    {
        $user = auth()->user(); 
        if($request->codigo_d){
            $pos=0;
            foreach ($request->codigo_d as $medicamento) {
                $entrada=new Resultadof2s();
                $entrada->num_examen =$request->num_examen;
                $entrada->fecha_resultado =$request->fecha_resultado;//cantidad
                $entrada->codigo_diagnostico =$request->codigo_d[$pos];//cantidad
                $entrada->ci_id =$request->ci;//fecha vencimiento
                $entrada->creatoruser_id = $user->id;
                $entrada->save();
                $pos++;
            }
            //return route('patologia.resultadof2s.create');
            $detallef2s = Detallef2s::where('num_examen', $request->input('num_examen'))->first();
            if ($detallef2s) {
                // Actualizar 'fecha_resultado' si existe el registro
                $detallef2s->update([
                    'fecha_resultado' => $request->input('fecha_resultado'),                
                ]);
            } else {
                $detallef2s->update([
                    'fecha_resultado' => $request->input('fecha_resultado'),                
                ]);
            }
            
            $numeroinforme = $detallef2s->num_examen;
            return redirect()->route('patologia.resultadof2s.index2')->with('mensaje',"Se creó exitosamente el informe del examen: $numeroinforme    ");
            //return 'Se Registró exitosamente';
        }
        else {
            return 'error';
        }         
    }          

    public function show(Resultadof2s $resultadof2s)
    {
        //$resultadof2s = Resultadof2s::where('estado', true)->get();
        //return view("patologia.resultadof2s.show", [
        //    'resultadof2s'   =>  $resultadof2s
        //]);
    }
    
    public function edit(Resultadof2s $resultadof2, $id)
    {
        $resultadof2s = Formulario2::find($id);
        return view('patologia.formulario2.edit',compact('formulario2s'));
    }
     
    public function buscardatosf2(Request $request)
    {
        $resultado= Detallef2s::where('num_examen', $request->dato)->first();
        if(isset($resultado) ){
            $paciente = Paciente::where('ci', $resultado->ci)->first();
            return response()->json($paciente);
        }else{
            return response()->json('no_existe');
        }
       // $resultadof2s=Formulario2::find($id);
      //  return view('patologia.formulario2.edit',compact('formulario2s'));
    }
    public function buscardiagnostico(Request $request)
    {
        $resultado= Diagnostico::where('codigo_diagnostico', $request->dato)->first();
        return response()->json($resultado);
        
       // $resultadof2s=Formulario2::find($id);
      //  return view('patologia.formulario2.edit',compact('formulario2s'));
    }

}
