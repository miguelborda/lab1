<?php

namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Detallef1s;
use App\Models\Formulario1;
use Barryvdh\DomPDF\Facade\Pdf;


class Detallef1sController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $detallef1s = Detallef1s::where('estado', true)->get();
        return view("patologia.detallef1s.index", [
            'detallef1s'   =>  $detallef1s
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
        //$areas = Area::where('estado', true)->orderBy('nombre_area', 'asc')->pluck('nombre_area', 'nombre_area');
        
        return view('patologia.detallef1s.create');
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
        $detallef1s = Detallef1s::create(array_merge($request->all(), ['userid_creator' => $user->id],['username_creator' => $user->email]));                
        //return redirect()->route('patologia.detallef1s.index')->with('mensaje','Se creó exitosamente');
    }
    
    public function show(Detallef1s $detallef1s)
    {
        //
    }
    
    public function edit(Detallef1s $detallef1s, $id)
    {
        $detallef1s = Detallef1s::find($id);
        return view('patologia.detallef1s.edit',compact('detallef1s'));
    }
    
    public function update(Request $request, Detallef1s $detallef1s, $id)
    {
        $hoy = date('Y-m-d H:i:s');
        $detallef1s = request()->except(['_token', '_method']);          
        $user = auth()->user();        
        Detallef1s::where('id', $id)->update(array_merge($detallef1s, ['userid_lastupdated' => $user->id],['username_lastupdated' => $user->email],['updated_at' => $hoy]));   
        return redirect()->route('patologia.detallef1s.index')->with('mensaje', 'Se actualizó exitosamente');
    }
    
    public function destroy(Detallef1s $detallef1s, $id)
    {
        $detallef1s = Detallef1s::find($id);
        if (!$detallef1s) {
            return redirect()->route('patologia.detallef1s.index')->with('mensaje', 'No se encontró el area');
        }
        $detallef1s->estado = FALSE; // Cambia el estado a inactivo
        $detallef1s->save();
        return redirect()->route('patologia.detallef1s.index')->with('mensaje', 'El registro se marcó como inactivo');
    }
}
