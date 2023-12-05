<?php

namespace App\Http\Controllers;

use App\Models\Formulario1;
use App\Models\Municipio;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;


class MunicipioController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $municipios = Municipio::all();
        //$municipios=Municipio::where('estado', true)->get();
        return view("patologia.municipios.index", [
            'municipios'   =>  $municipios
        ]);
    }   
    public function pdf()
    {
        $municipios = Municipio::where('estado', true)->orderby('nombre_municipio','asc')->get();
        $pdf = Pdf::loadView('patologia.municipios.pdf', compact('municipios'));
        return $pdf->stream();
        //return $pdf->download('invoice.pdf');  --> para descargar pdf
    } 
        
    public function create()
    {
        return view('patologia.municipios.create');
    }        
    
    public function store(Request $request)
    {
        $request->validate(
            [//'codigo_municipio'=>'required',
             'nombre_municipio'=>'required']
        ); 
        $user = auth()->user();        
        $municipio = Municipio::create(array_merge($request->all(), ['creatoruser_id' => $user->id]));        
        return redirect()->route('patologia.municipios.index')->with('mensaje','Se creó exitosamente');
    }       
    
    public function show(Municipio $municipio)
    {
        //
    }
    
    public function edit($id)
    {       
        $municipio=Municipio::find($id);
        return view('patologia.municipios.edit',compact('municipio'));
    }    
    
    public function update(Request $request, $id)
    {
        $hoy = date('Y-m-d H:i:s');
        $municipio = request()->except(['_token','_method']);
        $user = auth()->user();        
        Municipio::where('id', $id)->update(array_merge($municipio, ['updateduser_id' => $user->id],['updated_at' => $hoy]));           
        return redirect()->route('patologia.municipios.index')->with('mensaje', 'Se actualizó exitosamente');
    }   
        
    public function destroy($id)
    {
        $hoy = date('Y-m-d H:i:s');
        $user = auth()->user();    
        $municipio = Municipio::find($id);
        if (!$municipio) {
            return redirect()->route('patologia.municipios.index')->with('mensaje', 'No se encontró el municipio');
        }
        $municipio->estado = FALSE; // Cambia el estado a inactivo
        $municipio->updateduser_id = $user->id;
        $municipio->updated_at = $hoy;
        $municipio->descripcion = 'Deactivó_el_Estado';
        $municipio->save();
        return redirect()->route('patologia.municipios.index')->with('mensaje', 'El municipio se marcó como Inactivo');
    }

    public function habilitar($id)
    {
        $hoy = date('Y-m-d H:i:s');
        $user = auth()->user();                
        $municipio = Municipio::find($id);
        if (!$municipio) {
            return redirect()->route('patologia.municipios.index')->with('mensaje', 'No se encontró el municipio');
        }
        $municipio->estado = TRUE; // Cambia el estado a ACTIVO
        $municipio->updateduser_id = $user->id;
        $municipio->updated_at = $hoy;
        $municipio->descripcion = 'Activó_el_Estado';
        $municipio->save();
        return redirect()->route('patologia.municipios.index')->with('mensaje', 'El municipio se marcó como Activo');
    }
}
