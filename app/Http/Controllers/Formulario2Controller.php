<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Formulario2;
use App\Models\Detallef2s;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Municipio; 
use App\Models\Secretariaregional;
use App\Models\Distrito;
use App\Models\Area;
use App\Models\Establecimiento;
use App\Models\Sector;
use App\Models\Paciente;
use Illuminate\Validation\Rule;

class Formulario2Controller extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $formulario2s = Formulario2::with('municipio','distrito','area','secretariaregional')->where('estado', true)->get();     

        //$municipios=Municipio::where('estado', true)->get();

        return view("patologia.formulario2.index", [
            'formulario2s' => $formulario2s,
          //  'municipios' => $municipios

        ]);
    }

    /*public function index()
    {
        $formulario2s=Formulario1::where('estado', true)->get();
        return view("patologia.formulario2.index", [
            'formulario2s'   =>  $formulario2s
        ]);
    }*/
    
    public function pdf()
    {
        $formulario2s=Formulario2::all();
        $pdf = Pdf::loadView('patologia.formulario2.pdf', compact('formulario2s'));
        return $pdf->stream();
        //return $pdf->download('invoice.pdf');  --> para descargar pdf
    }
    
    public function create()
    {        
        //$municipios = Municipio::where('estado', true)->orderBy('nombre_municipio', 'asc')->pluck('nombre_municipio','id');
        //$secretariaregionals = Secretariaregional::where('estado', true)->orderBy('nom_secretaria_regional', 'asc')->pluck('nom_secretaria_regional','id');
        $distritos = Distrito::where('estado', true)->orderBy('nombre_distrito', 'asc')->pluck('nombre_distrito','id');
        $areas = Area::where('estado', true)->orderBy('nombre_area', 'asc')->pluck('nombre_area','id');
        //$establecimientos = Establecimiento::where('estado', true)->orderBy('nombre_establecimiento', 'asc')->pluck('nombre_establecimiento','id');
        $sectors = Sector::where('estado', true)->orderBy('nombre_sector', 'asc')->pluck('nombre_sector','id');       
        return view('patologia.formulario2.create', compact('distritos','areas','sectors'));
    }
    
    public function store(Request $request, Formulario2 $formularios, Detallef2s $detalle)
    {
        $request->validate(
            [
             'num_solicitud' => ['required', 'string', 'max:255', Rule::unique('formulario2s')->ignore($formularios->id)],
             'fecha_solicitud'=>'required',             
             'distrito_id'=>'required',
             'area_id'=>'required',             
             'sector_id'=>'required',
             //'establecimiento_id'=>'required',
             //'secretaria_regional_id'=>'required',             
             //'municipio_id'=>'required',       
             //'num_examen' => ['required', 'string', 'max:255', Rule::unique('detallef1s')->ignore($detalle->id)],                   
            ]
        ); 
        
        $user = auth()->user();       
        // dd(array_merge($request->all()));        

        $formulario2s = Formulario2::create([
            'num_solicitud' => $request->input('num_solicitud'),
            'fecha_solicitud' => $request->input('fecha_solicitud'),
            //'secretaria_regional_id' => $request->input('secretaria_regional_id'),
            'distrito_id' => $request->input('distrito_id'),
            'area_id' => $request->input('area_id'),
            //'establecimiento_id' => $request->input('establecimiento_id'),
            'sector_id' => $request->input('sector_id'),
            //'municipio_id' => $request->input('municipio_id'),
            'creatoruser_id' => $user->id,            
        ]);
        
        $num_informef2 = $formulario2s->id;
        $num_informef2 = $formulario2s->num_solicitud;
        
        for ($i = 0; $i < count($request->num_examen); $i++) {
            $detallef2s = Detallef2s::create([
                'num_solicitud_id' => $request->input('num_solicitud'),
                'num_examen' => $request->num_examen[$i],                
                'ci' => $request->ci[$i],
                'creatoruser_id' => $user->id,
            ]);
            $hoy=date('Y-m-d');     
            //$fechaNacimiento=$hoy;            
            
            // Verificar si se proporcionó la fecha de nacimiento
            
            $fechaNacimiento = $request->fecha_nacimiento[$i];
            
            $edad = date_diff(date_create($fechaNacimiento), date_create($hoy))->y;          
            
            // Verificar si se proporcionó la fecha de nacimiento
            /*if (!empty($request->fecha_nacimiento[$i])) {
                $fechaNacimiento = $request->fecha_nacimiento[$i];
                //$hoy = strtotime('today');
                $edad = date_diff(date_create($fechaNacimiento), date_create($hoy))->y;

                //$edad = floor(($hoy - $fechaNacimiento) / 31556926); // 31556926 segundos en un año
            } else {
                $edad = $request->edad[$i-1];
            }*/
        
            $pacientes = Paciente::create([
                'ci' => $request->ci[$i],
                'nombre' => $request->nombre[$i],
                'apellido' => $request->apellido[$i],
                'creatoruser_id' => $user->id,                
                'fecha_nacimiento' => $fechaNacimiento,                
                'edad' => $edad, // Usamos la edad calculada o la proporcionada
            ]);
            $edad = '';          

        }           

        return redirect()->route('patologia.formulario2.index')->with('mensaje','Se creó exitosamente');
    }
    
    public function show(Formulario2 $formulario2)
    {
        //
    }
    
    public function edit(Formulario2 $formulario2, $id)
    {
        $formulario2s=Formulario2::find($id);
        return view('patologia.formulario2.edit',compact('formulario2s'));

        /*$distritos = Distrito::where('estado', true)->orderBy('nombre_distrito', 'asc')->pluck('nombre_distrito','id');
        $areas = Area::where('estado', true)->orderBy('nombre_area', 'asc')->pluck('nombre_area','id');
        //$establecimientos = Establecimiento::where('estado', true)->orderBy('nombre_establecimiento', 'asc')->pluck('nombre_establecimiento','id');
        $sectors = Sector::where('estado', true)->orderBy('nombre_sector', 'asc')->pluck('nombre_sector','id');       
        return view('patologia.formulario2.edit', compact('distritos','areas','sectors'));
        */
    }
    
    public function update(Request $request, Formulario2 $formulario2)
    {
        $hoy = date('Y-m-d H:i:s');
        $formulario2s = request()->except(['_token', '_method']);          
        $user = auth()->user();        
        Formulario2::where('id', $id)->update(array_merge($formulario2s, ['userid_lastupdated' => $user->id],['username_lastupdated' => $user->email],['updated_at' => $hoy]));   
        return redirect()->route('patologia.formulario2.index')->with('mensaje', 'Se actualizó exitosamente');
    }
    
    public function destroy(Formulario2 $formulario2, $id)
    {
        $formulario2s=Formulario2::find($id);
        if (!$formulario2s) {
            return redirect()->route('patologia.formulario2.index')->with('mensaje', 'No se encontró el area');
        }
        $formulario2s->estado = FALSE; // Cambia el estado a inactivo
        $formulario2s->save();
        return redirect()->route('patologia.formulario2s.index')->with('mensaje', 'El area se marcó como inactivo');
    }
}
