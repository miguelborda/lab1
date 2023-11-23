<?php

namespace App\Http\Controllers;

use App\Models\Diagnostico;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Validation\Rule;


class DiagnosticoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $diagnosticos = Diagnostico::all();
        return view("patologia.diagnosticos.index", [
            'diagnosticos'   =>  $diagnosticos
        ]);
    }
    
    public function pdf()
    {
        $diagnosticos = Diagnostico::where('estado', true)->get();        
        $pdf = Pdf::loadView('patologia.diagnosticos.pdf', compact('diagnosticos'));
        return $pdf->stream();
        //return $pdf->download('invoice.pdf');  --> para descargar pdf
    }

    public function create()
    {
        //
        return view('patologia.diagnosticos.create');
    }
    public function store(Request $request, Diagnostico $diagnostico)
    {
        $request->validate(
            ['codigo_diagnostico' => ['required', 'string', 'max:255', Rule::unique('diagnosticos')->ignore($diagnostico->id)],
            //'codigo_diagnostico' => 'required', 
            'descripcion_diagnostico'=>'required']
        ); 
        $user = auth()->user();       
        $diagnostico = Diagnostico::create(array_merge($request->all(), ['creatoruser_id' => $user->id],['updateduser_id' => $user->id]));
        return redirect()->route('patologia.diagnosticos.index')->with('mensaje','Se creó exitosamente');
    }  

    public function show(Diagnostico $diagnosticos)
    {
        //
    }

    public function edit($id)
    {        
        $diagnostico=Diagnostico::find($id);
        return view('patologia.diagnosticos.edit',compact('diagnostico'));
    }    

    public function update(Request $request, $id)
    {        
        $hoy = date('Y-m-d H:i:s');
        $diagnostico = request()->except(['_token','_method']);
        $user = auth()->user();        
        Diagnostico::where('id', $id)->update(array_merge($diagnostico, ['updateduser_id' => $user->id],['updated_at' => $hoy]));   
        return redirect()->route('patologia.diagnosticos.index')->with('mensaje', 'Se actualizó exitosamente');
    }   
    
    public function destroy($id)
    {
        $hoy = date('Y-m-d H:i:s');
        $user = auth()->user();    
        $diagnostico = Diagnostico::find($id);
        if (!$diagnostico) {
            return redirect()->route('patologia.diagnosticos.index')->with('mensaje', 'No se encontró el diagnostico');
        }
        $diagnostico->estado = FALSE; // Cambia el estado a DESACTIVAR
        $diagnostico->updateduser_id = $user->id;
        $diagnostico->updated_at = $hoy;
        $diagnostico->save();
        return redirect()->route('patologia.diagnosticos.index')->with('mensaje', 'El diagnostico se marcó como inactivo');
    }
    
    public function habilitar($id)
    {
        $hoy = date('Y-m-d H:i:s');
        $user = auth()->user();                
        $diagnostico = Diagnostico::find($id);
        if (!$diagnostico) {
            return redirect()->route('patologia.diagnosticos.index')->with('mensaje', 'No se encontró el area');
        }
        $diagnostico->estado = TRUE; // Cambia el estado a ACTIVAR
        $diagnostico->updateduser_id = $user->id;
        $diagnostico->updated_at = $hoy;
        $diagnostico->save();
        return redirect()->route('patologia.diagnosticos.index')->with('mensaje', 'El area se marcó como inactivo');
    }
}
