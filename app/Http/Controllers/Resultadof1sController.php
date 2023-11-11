<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Resultadof1s;
use App\Models\Diagnostico;
use App\Models\Detallef1s;
use App\Models\Paciente;

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

        // Devolver los datos como respuesta JSON
        return response()->json($datos);
    }

    public function index()
    {
        //$resultadof1s = Resultadof1s::all();
        $resultadof1s = Resultadof1s::where('estado', true)->get();
        return view("patologia.resultadof1s.index", [
            'resultadof1s'   =>  $resultadof1s
        ]);
    }
    
    /*public function pdf()
    {
        $formulario1s=Formulario1::all();
        $pdf = Pdf::loadView('patologia.formulario1.pdf', compact('formulario1s'));
        return $pdf->stream();
        //return $pdf->download('invoice.pdf');  --> para descargar pdf
    }*/
    
    public function create()
    {   
        /*$detalles = Detallef1s::where('estado',true);

        $sectors = Sector::where('estado', true)->orderBy('nombre_sector', 'asc')->pluck('nombre_sector', 'nombre_sector');       */
        return view('patologia.resultadof1s.create');

        //return view('patologia.resultadof1s.create', compact('municipios','secretariaregionals','distritos','areas','establecimientos','sectors'));
    }
    public function store(Request $request)
    {
        $request->validate(
            ['num_examen'=>'required',             
             'fecha_resultado'=>'required',             
             //   'num_solicitud'=>'required',
             //'ci'=>'required',             
            ]
        ); 
        
        $user = auth()->user();       
        // dd(array_merge($request->all()));
        

        //$formulario1s = Formulario1::create(array_merge($request->all(), ['userid_creator' => $user->id], ['username_creator' => $user->email])); 
        // Obtiene la ID del modelo Formulario1 recién creado
        $resultadof1s = Resultadof1s::create([
            'num_examen' => $request->input('num_examen'),
            'fecha_resultado' => $request->input('fecha_resultado'),            
            'creatoruser_id' => $user->id,            
        ]);        
        //$num_informef1 = $formulario1s->id;
       /* $num_informef1 = $formulario1s->num_solicitud;
        
        for ($i=0;$i<count($request->num_examen);$i++){
            
             $detallef1s = Detallef1s::create ([
             //'num_solicitud' => $request->input('num_solicitud'),
             'nombre' => $request->nombre[$i],
             'edad' => $request->edad[$i],
             'num_examen' => $request->num_examen[$i],
             'direccion' => $request->direccion[$i],
             'num_informef1' => $num_informef1,
             'userid_creator' => $user->id,             
         ]);*/
         //dd($detallef1s);        
        
            //$detallef1s = Detallef1s::create(array_merge($request->num_examen[$i], $request->nombre[$i], $request->edad[$i], $request->direccion[$i],$request->$num_informef1[$i],['num_informef1' => $num_informef1, 'userid_creator' => $user->id], ['username_creator' => $user->email]));
            return redirect()->route('patologia.resultadof1s.index')->with('mensaje','Se creó exitosamente');

        }
        



    
      /* 

    public function show(Formulario1 $formulario1)
    {
        //
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
    }
    
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

}
