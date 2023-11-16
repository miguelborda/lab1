<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Resultadof1s;
use App\Models\Diagnostico;
use App\Models\Detallef1s;
use App\Models\Paciente;
use Illuminate\Validation\Rule;
use App\Models\Formulario1;
use App\Models\Area;

use Barryvdh\DomPDF\Facade\Pdf;
use Dompdf\Dompdf;
use Dompdf\Options;


//use Illuminate\Validation\Rules\Exists;


class Resultadof1sController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    // Controlador
    public function obtenerDatos(Request $request)
    {
        // Obtener datos del modelo según la CI
        $datos = Paciente::where('ci', $request->ci)->get();
        $datos2 = Diagnostico::where('codigo_diagnostico', $request->dato)->get();

        // Devolver los datos como respuesta JSON
        return response()->json($datos,$datos2);
    }

    public function index()
    {
        //$resultadof1s = Resultadof1s::all();
        $resultadof1s = Resultadof1s::where('estado', true)->get();
        return view("patologia.resultadof1s.index", [
            'resultadof1s'   =>  $resultadof1s
        ]);
    }
    public function index2()
    {
        $infors = Detallef1s::where('estado', true)->get();

        return view("patologia.resultadof1s.index2", [
            'infors' => $infors
        ]);
    }
    
    /*public function pdfresultados()
    {
        $formulario1s=Formulario1::all();
        $pdf = Pdf::loadView('patologia.formulario1.pdf', compact('formulario1s'));
        return $pdf->stream();
        //return $pdf->download('invoice.pdf');  --> para descargar pdf
    }*/

    public function pdf($id)
    {        
        $infor= Detallef1s::find($id);
        
        $ci = $infor->ci;
        $numexam = $infor->num_examen;

        // Obtén los datos de la tabla "pacientes" donde ci sea igual al ci del detallef1s
        $paciente = Paciente::where('ci', $ci)->first();
        $areas = Area::all();

        //$resultadof1s = Resultadof1s::where('estado', true)->get();

        //$resultados = Resultadof1s::where('num_examen', $numexam)->first();        
        //$detallef1s = Detallef1s::where('estado', true)->get();
        $pdf = Pdf::loadView('patologia.resultadof1s.pdf', compact('infor','paciente','areas'));
        return $pdf->stream();
        //return $pdf->download('invoice.pdf');  --> para descargar pdf
        //return view('patologia.resultadof1s.pdf',compact('infor'));

    }
    
    public function create()
    {   
        /*$detalles = Detallef1s::where('estado',true);
        $sectors = Sector::where('estado', true)->orderBy('nombre_sector', 'asc')->pluck('nombre_sector', 'nombre_sector');       */
        return view('patologia.resultadof1s.create');

        //return view('patologia.resultadof1s.create', compact('municipios','secretariaregionals','distritos','areas','establecimientos','sectors'));
    }
    public function store(Request $request)
    {
        $messages = [
            'num_examen.exists' => 'El número de examen no está registrado.',
            'num_examen.required' => 'El número de examen es obligatorio.',
            'fecha_resultado.required' => 'La fecha de resultado es obligatoria.',          
        ];    
        $request->validate([
            'num_examen' => [
                'required',
                Rule::exists('detallef1s', 'num_examen'),
            ],
            //dd('Validación ejecutada'),
            'fecha_resultado' => 'required',            
        ], $messages); 
             
        //dd('Validación ejecutada');
        $user = auth()->user();       
        // dd(array_merge($request->all()));        
        for ($i=0;$i<count($request->codigo_diagnostico);$i++){
            $resultadof1s = Resultadof1s::create([
            'num_examen' => $request->input('num_examen'),
            'fecha_resultado' => $request->input('fecha_resultado'),            
            'ci_id' => Detallef1s::where('num_examen', $request->input('num_examen'))->value('ci'), // Obtener el 'ci' de 'detallef1s'
            'creatoruser_id' => $user->id,   
            'codigo_diagnostico' => $request->codigo_diagnostico[$i],                     
            ]);  
        }
       // $fresultado = $request->input('fecha_resultado');
       $detallef1s = Detallef1s::where('num_examen', $request->input('num_examen'))->first();

        if ($detallef1s) {
            // Actualizar 'fecha_resultado' si existe el registro
            $detallef1s->update([
                'fecha_resultado' => $request->input('fecha_resultado'),                
            ]);
        } else {
            $detallef1s->update([
                'fecha_resultado' => $request->input('fecha_resultado'),                
            ]);
        }        
         //dd($detallef1s);                          
            return redirect()->route('patologia.resultadof1s.create')->with('mensaje', 'Se creó exitosamente');
    }          

    public function show(Resultadof1s $resultadof1s)
    {
        //$resultadof1s = Resultadof1s::where('estado', true)->get();
        //return view("patologia.resultadof1s.show", [
        //    'resultadof1s'   =>  $resultadof1s
        //]);
    }
    
    public function edit(Resultadof1s $resultadof1, $id)
    {
        $resultadof1s=Formulario1::find($id);
        return view('patologia.formulario1.edit',compact('formulario1s'));
    }
     /*
    public function update(Request $request, Formulario1 $formulario1)
    {
        $hoy = date('Y-m-d H:i:s');
        $formulario1s = request()->except(['_token', '_method']);          
        $user = auth()->user();        
        Formulario1::where('id', $id)->update(array_merge($formulario1s, ['userid_lastupdated' => $user->id],['username_lastupdated' => $user->email],['updated_at' => $hoy]));   
        return redirect()->route('patologia.formulario1.index')->with('mensaje', 'Se actualizó exitosamente');
    }*/
    /*
    public function destroy(Formulario1 $formulario1, $id)
    {
        $formulario1s=Formulario1::find($id);
        if (!$formulario1s) {
            return redirect()->route('patologia.formulario1.index')->with('mensaje', 'No se encontró el area');
        }
        $formulario1s->estado = FALSE; // Cambia el estado a inactivo
        $formulario1s->save();
        return redirect()->route('patologia.formulario1s.index')->with('mensaje', 'El area se marcó como inactivo');
    }*/
    public function buscardatos(Request $request)
    {
        $resultado= Detallef1s::where('num_examen', $request->dato)->first();
        if(isset($resultado) ){
            $paciente= Paciente::where('ci', $resultado->ci)->first();
            return response()->json($paciente);
        }else{
            return response()->json('no_existe');
        }
       // $resultadof1s=Formulario1::find($id);
      //  return view('patologia.formulario1.edit',compact('formulario1s'));
    }
    public function buscardiagnostico(Request $request)
    {
        $resultado= Diagnostico::where('codigo_diagnostico', $request->dato)->first();
        return response()->json($resultado);
        
       // $resultadof1s=Formulario1::find($id);
      //  return view('patologia.formulario1.edit',compact('formulario1s'));
    }


}
