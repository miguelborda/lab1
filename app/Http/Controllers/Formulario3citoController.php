<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Formulario3cito;
use App\Models\Detallef3cito;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Municipio; 
use App\Models\Secretariaregional;
use App\Models\Distrito;
use App\Models\Area;
use App\Models\Establecimiento;
use App\Models\Sector;
use App\Models\Paciente;
use App\Models\Servicio;
use App\Models\Medico;
use Illuminate\Validation\Rule;

class Formulario3citoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $formulario3citos = Formulario3cito::with('municipio','distrito','area','establecimiento')->where('estado', true)->get();     

        //$municipios=Municipio::where('estado', true)->get();

        return view("patologia.formulario3cito.index", [
            'formulario3citos' => $formulario3citos,
          //  'municipios' => $municipios

        ]);
    }

    /*public function index()
    {
        $formulario3citos=Formulario3cito::where('estado', true)->get();
        return view("patologia.formulario3cito.index", [
            'formulario3citos'   =>  $formulario3citos
        ]);
    }*/
    
    public function pdf()
    {
        $formulario3citos=Formulario3cito::all();
        $pdf = Pdf::loadView('patologia.formulario3cito.pdf', compact('formulario3citos'));
        return $pdf->stream();
        //return $pdf->download('invoice.pdf');  --> para descargar pdf
    }
    
    public function create()
    {        
        $municipios = Municipio::where('estado', true)->orderBy('nombre_municipio', 'asc')->pluck('nombre_municipio','id');
        $secretariaregionals = Secretariaregional::where('estado', true)->orderBy('nom_secretaria_regional', 'asc')->pluck('nom_secretaria_regional','id');
        $distritos = Distrito::where('estado', true)->orderBy('nombre_distrito', 'asc')->pluck('nombre_distrito','id');
        $areas = Area::where('estado', true)->orderBy('nombre_area', 'asc')->pluck('nombre_area','id');
        $establecimientos = Establecimiento::where('estado', true)->orderBy('nombre_establecimiento', 'asc')->pluck('nombre_establecimiento','id');
        $sectors = Sector::where('estado', true)->orderBy('nombre_sector', 'asc')->pluck('nombre_sector','id');       
        return view('patologia.formulario3cito.create', compact('municipios','secretariaregionals','distritos','areas','establecimientos','sectors'));
    }
    
    public function store(Request $request, Formulario3cito $formularios, Detallef3cito $detalle)
    {
        $request->validate(
            [
             'num_solicitud' => ['required', 'string', 'max:255', Rule::unique('formulario3citos')->ignore($formularios->id)],
             'fecha_solicitud'=>'required',
             //'secretaria_regional_id'=>'required',             
             'distrito_id'=>'required',
             'area_id'=>'required',             
             'establecimiento_id'=>'required',
             //'sector_id'=>'required',
             'municipio_id'=>'required',       
             //'num_examen' => ['required', 'string', 'max:255', Rule::unique('detallef3citos')->ignore($detalle->id)],                   
            ]
        ); 
        
        $user = auth()->user();       
        // dd(array_merge($request->all()));        

        $formulario3citos = Formulario3cito::create([
            'num_solicitud' => $request->input('num_solicitud'),
            'fecha_solicitud' => $request->input('fecha_solicitud'),
            //'secretaria_regional_id' => $request->input('secretaria_regional_id'),
            'distrito_id' => $request->input('distrito_id'),
            'area_id' => $request->input('area_id'),
            'establecimiento_id' => $request->input('establecimiento_id'),
            //'sector_id' => $request->input('sector_id'),
            'municipio_id' => $request->input('municipio_id'),
            'creatoruser_id' => $user->id,            
        ]);
        
        $num_informef1 = $formulario3citos->id;
        $num_informef1 = $formulario3citos->num_solicitud;
        
        for ($i = 0; $i < count($request->num_examen); $i++) {
            $detallef3citos = Detallef3cito::create([
                'num_solicitud_id' => $request->input('num_solicitud'),
                'num_examen' => $request->num_examen[$i],                
                'ci' => $request->ci[$i],
                'creatoruser_id' => $user->id,
            ]);
            $hoy=date('Y-m-d');                 
            
            $fechaNacimiento = $request->fecha_nacimiento[$i];
            
            $edad = date_diff(date_create($fechaNacimiento), date_create($hoy))->y;             
        
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

        return redirect()->route('patologia.formulario3cito.index')->with('mensaje','Se creó exitosamente');
    }
    
    public function show(Formulario3cito $formulario3cito)
    {
        //
    }
    
    public function edit(Formulario3cito $formulario3cito, $id)
    {
        $formulario3citos=Formulario3cito::find($id);
        return view('patologia.formulario3cito.edit',compact('formulario3citos'));
    }
    
    public function update(Request $request, Formulario3cito $formulario3cito)
    {
        $hoy = date('Y-m-d H:i:s');
        $formulario3citos = request()->except(['_token', '_method']);          
        $user = auth()->user();        
        Formulario3cito::where('id', $id)->update(array_merge($formulario3citos, ['userid_lastupdated' => $user->id],['username_lastupdated' => $user->email],['updated_at' => $hoy]));   
        return redirect()->route('patologia.formulario3cito.index')->with('mensaje', 'Se actualizó exitosamente');
    }
    
    public function destroy(Formulario3cito $formulario3cito, $id)
    {
        $formulario3citos=Formulario3cito::find($id);
        if (!$formulario3citos) {
            return redirect()->route('patologia.formulario3cito.index')->with('mensaje', 'No se encontró el area');
        }
        $formulario3citos->estado = FALSE; // Cambia el estado a inactivo
        $formulario3citos->save();
        return redirect()->route('patologia.formulario3citos.index')->with('mensaje', 'El area se marcó como inactivo');
    }
}
