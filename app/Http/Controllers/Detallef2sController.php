<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Detallef2s;
use App\Models\Formulario2;
use Barryvdh\DomPDF\Facade\Pdf;

class Detallef2sController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $detallef2s = Detallef2s::where('estado', true)->get();
        return view("patologia.detallef2s.index", [
            'detallef2s'   =>  $detallef2s
        ]);
    }
    
    /*public function pdf()
    {
        $formulario2s=Formulario2::all();
        $pdf = Pdf::loadView('patologia.formulario2.pdf', compact('formulario2s'));
        return $pdf->stream();
        //return $pdf->download('invoice.pdf');  --> para descargar pdf
    }*/
    
    public function create()
    {       
        //$areas = Area::where('estado', true)->orderBy('nombre_area', 'asc')->pluck('nombre_area', 'nombre_area');
        
        return view('patologia.detallef2s.create');
    }
    
    public function store(Request $request)
    {
        $request->validate(
            ['num_examen'=>'required',
             'nombre'=>'required',
             'edad'=>'required',                          
            ]
        ); 
        $user = auth()->user();                           
        $detallef2s = Detallef2s::create(array_merge($request->all(), ['userid_creator' => $user->id],['username_creator' => $user->email]));                
        //return redirect()->route('patologia.detallef2s.index')->with('mensaje','Se creó exitosamente');
    }
    
    public function show(Detallef2s $detallef2s)
    {
        //
    }
    
    public function edit(Detallef2s $detallef2s, $id)
    {
        $detallef2s = Detallef2s::find($id);
        return view('patologia.detallef2s.edit',compact('detallef2s'));
    }
    
    public function update(Request $request, Detallef2s $detallef2s, $id)
    {
        $hoy = date('Y-m-d H:i:s');
        $detallef2s = request()->except(['_token', '_method']);          
        $user = auth()->user();        
        Detallef2s::where('id', $id)->update(array_merge($detallef2s, ['userid_lastupdated' => $user->id],['username_lastupdated' => $user->email],['updated_at' => $hoy]));   
        return redirect()->route('patologia.detallef2s.index')->with('mensaje', 'Se actualizó exitosamente');
    }
    
    public function destroy(Detallef2s $detallef2s, $id)
    {
        $detallef2s = Detallef2s::find($id);
        if (!$detallef2s) {
            return redirect()->route('patologia.detallef2s.index')->with('mensaje', 'No se encontró el area');
        }
        $detallef2s->estado = FALSE; // Cambia el estado a inactivo
        $detallef2s->save();
        return redirect()->route('patologia.detallef2s.index')->with('mensaje', 'El registro se marcó como inactivo');
    }
}
