<?php

namespace App\Http\Controllers;

use App\Models\Formulario1;
use App\Models\Detallef1s;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Municipio; 
use App\Models\Secretariaregional;
use App\Models\Distrito;
use App\Models\Area;
use App\Models\Establecimiento;
use App\Models\Sector;



class Formulario1Controller extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $formulario1s = Formulario1::with('municipio','distrito','area','secretariaregional')->where('estado', true)->get();     

        //$municipios=Municipio::where('estado', true)->get();

        return view("patologia.formulario1.index", [
            'formulario1s' => $formulario1s,
          //  'municipios' => $municipios

        ]);
    }

    /*public function index()
    {
        $formulario1s=Formulario1::where('estado', true)->get();
        return view("patologia.formulario1.index", [
            'formulario1s'   =>  $formulario1s
        ]);
    }*/
    
    public function pdf()
    {
        $formulario1s=Formulario1::all();
        $pdf = Pdf::loadView('patologia.formulario1.pdf', compact('formulario1s'));
        return $pdf->stream();
        //return $pdf->download('invoice.pdf');  --> para descargar pdf
    }
    
    public function create()
    {
        /*$municipios = Municipio::where('estado', true)->orderBy('nombre_municipio', 'asc')->pluck('nombre_municipio', 'nombre_municipio');
        $secretariaregionals = Secretariaregional::where('estado', true)->orderBy('nom_secretaria_regional', 'asc')->pluck('nom_secretaria_regional', 'nom_secretaria_regional');
        $distritos = Distrito::where('estado', true)->orderBy('nombre_distrito', 'asc')->pluck('nombre_distrito', 'nombre_distrito');
        $areas = Area::where('estado', true)->orderBy('nombre_area', 'asc')->pluck('nombre_area', 'nombre_area');
        $establecimientos = Establecimiento::where('estado', true)->orderBy('nombre_establecimiento', 'asc')->pluck('nombre_establecimiento', 'nombre_establecimiento');
        $sectors = Sector::where('estado', true)->orderBy('nombre_sector', 'asc')->pluck('nombre_sector', 'nombre_sector');       */
        $municipios = Municipio::where('estado', true)->orderBy('nombre_municipio', 'asc')->pluck('nombre_municipio','id');
        $secretariaregionals = Secretariaregional::where('estado', true)->orderBy('nom_secretaria_regional', 'asc')->pluck('nom_secretaria_regional','id');
        $distritos = Distrito::where('estado', true)->orderBy('nombre_distrito', 'asc')->pluck('nombre_distrito','id');
        $areas = Area::where('estado', true)->orderBy('nombre_area', 'asc')->pluck('nombre_area','id');
        $establecimientos = Establecimiento::where('estado', true)->orderBy('nombre_establecimiento', 'asc')->pluck('nombre_establecimiento','id');
        $sectors = Sector::where('estado', true)->orderBy('nombre_sector', 'asc')->pluck('nombre_sector','id');       
        return view('patologia.formulario1.create', compact('municipios','secretariaregionals','distritos','areas','establecimientos','sectors'));
    }
    
    public function store(Request $request)
    {
        $request->validate(
            ['num_solicitud'=>'required',
             'fecha_solicitud'=>'required',
             'secretaria_regional_id'=>'required',             
             'distrito_id'=>'required',
             'area_id'=>'required',             
             'establecimiento_id'=>'required',
             'sector_id'=>'required',
             'municipio_id'=>'required',
             //'nombre'=>'required',
             //'edad'=>'required',
             //'num_examen'=>'required',
            ]
        ); 
        
        $user = auth()->user();       
        // dd(array_merge($request->all()));
        

        //$formulario1s = Formulario1::create(array_merge($request->all(), ['userid_creator' => $user->id], ['username_creator' => $user->email])); 
        // Obtiene la ID del modelo Formulario1 recién creado
        $formulario1s = Formulario1::create([
            'num_solicitud' => $request->input('num_solicitud'),
            'fecha_solicitud' => $request->input('fecha_solicitud'),
            'secretaria_regional_id' => $request->input('secretaria_regional_id'),
            'distrito_id' => $request->input('distrito_id'),
            'area_id' => $request->input('area_id'),
            'establecimiento_id' => $request->input('establecimiento_id'),
            'sector_id' => $request->input('sector_id'),
            'municipio_id' => $request->input('municipio_id'),
            'creatoruser_id' => $user->id,            
        ]);


        
        //$num_informef1 = $formulario1s->id;
        /*$num_informef1 = $formulario1s->num_solicitud;
        
        for ($i=0;$i<count($request->num_examen);$i++){
            
             $detallef1s = Detallef1s::create ([
             //'num_solicitud' => $request->input('num_solicitud'),
             'nombre' => $request->nombre[$i],
             'edad' => $request->edad[$i],
             'num_examen' => $request->num_examen[$i],
             'direccion' => $request->direccion[$i],
             'num_informef1' => $num_informef1,
             'userid_creator' => $user->id,             
         ]);
         //dd($detallef1s);        
        
            //$detallef1s = Detallef1s::create(array_merge($request->num_examen[$i], $request->nombre[$i], $request->edad[$i], $request->direccion[$i],$request->$num_informef1[$i],['num_informef1' => $num_informef1, 'userid_creator' => $user->id], ['username_creator' => $user->email]));
        }*/
        



        return redirect()->route('patologia.formulario1.index')->with('mensaje','Se creó exitosamente');
    }
    
    public function show(Formulario1 $formulario1)
    {
        //
    }
    
    public function edit(Formulario1 $formulario1, $id)
    {
        $formulario1s=Formulario1::find($id);
        return view('patologia.formulario1.edit',compact('formulario1s'));
    }
    
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
    }
}
