<?php

namespace App\Http\Controllers;

use App\Models\Formulario1;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Municipio; // Asegúrate de importar el modelo


class Formulario1Controller extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $formulario1s=Formulario1::where('estado', true)->get();
        return view("patologia.formulario1.index", [
            'formulario1s'   =>  $formulario1s
        ]);
    }
    
    public function pdf()
    {
        $formulario1s=Formulario1::all();
        $pdf = Pdf::loadView('patologia.formulario1.pdf', compact('formulario1s'));
        return $pdf->stream();
        //return $pdf->download('invoice.pdf');  --> para descargar pdf
    }
    
    public function create()
    {
        $municipios = Municipio::orderBy('nombre_municipio', 'asc')->pluck('nombre_municipio', 'nombre_municipio');
        return view('patologia.formulario1.create', compact('municipios'));
    }
    
    public function store(Request $request)
    {
        $request->validate(
            ['num_solicitud'=>'required',
             'fecha_solicitud'=>'required',
             /*'secretaria_regional'=>'required',             
             'distrito'=>'required',
             'area'=>'required',
             'fecha_solicitud'=>'required',
             'establecimiento'=>'required',
             'sector'=>'required',*/
             'municipio'=>'required',
             'paciente'=>'required',
             'edad_paciente'=>'required',
            ]
        ); 
        $user = auth()->user();       
        $formulario1s=Formulario1::create(array_merge($request->all(), ['userid_creator' => $user->id],['username_creator' => $user->email]));                
        return redirect()->route('patologia.formulario1.index')->with('mensaje','Se creó exitosamente');
    }
    
    public function show(Formulario1 $formulario1)
    {
        //
    }
    
    public function edit(Formulario1 $formulario1)
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
    
    public function destroy(Formulario1 $formulario1)
    {
        $formulario1s=Formulario1::find($id);
        if (!$formulario1s) {
            return redirect()->route('patologia.formulario1s.index')->with('mensaje', 'No se encontró el area');
        }
        $formulario1s->estado = FALSE; // Cambia el estado a inactivo
        $formulario1s->save();
        return redirect()->route('patologia.formulario1s.index')->with('mensaje', 'El area se marcó como inactivo');
    }
}
