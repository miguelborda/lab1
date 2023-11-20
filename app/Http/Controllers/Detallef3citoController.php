<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Detallef3cito;
use App\Models\Formulario3cito;
use Barryvdh\DomPDF\Facade\Pdf;

class Detallef3citoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $detallef3citos = Detallef3cito::where('estado', true)->get();
        return view("patologia.detallef3citos.index", [
            'detallef3citos'   =>  $detallef3citos
        ]);
    }
    
    /*public function pdf()
    {
        $formulario3citos=Formulario3cito::all();
        $pdf = Pdf::loadView('patologia.formulario3cito.pdf', compact('formulario3citos'));
        return $pdf->stream();
        //return $pdf->download('invoice.pdf');  --> para descargar pdf
    }*/
    
    public function create()
    {       
        //$areas = Area::where('estado', true)->orderBy('nombre_area', 'asc')->pluck('nombre_area', 'nombre_area');
        
        return view('patologia.detallef3citos.create');
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
        $detallef3citos = Detallef3cito::create(array_merge($request->all(), ['userid_creator' => $user->id],['username_creator' => $user->email]));                
        //return redirect()->route('patologia.detallef3citos.index')->with('mensaje','Se creó exitosamente');
    }
    
    public function show(Detallef3cito $detallef3citos)
    {
        //
    }
    
    public function edit(Detallef3cito $detallef3citos, $id)
    {
        $detallef3citos = Detallef3cito::find($id);
        return view('patologia.detallef3citos.edit',compact('detallef3citos'));
    }
    
    public function update(Request $request, Detallef3cito $detallef3citos, $id)
    {
        $hoy = date('Y-m-d H:i:s');
        $detallef1s = request()->except(['_token', '_method']);          
        $user = auth()->user();        
        Detallef3cito::where('id', $id)->update(array_merge($detallef3citos, ['userid_lastupdated' => $user->id],['username_lastupdated' => $user->email],['updated_at' => $hoy]));   
        return redirect()->route('patologia.detallef3citos.index')->with('mensaje', 'Se actualizó exitosamente');
    }
    
    public function destroy(Detallef3cito $detallef3citos, $id)
    {
        $detallef3citos = Detallef3cito::find($id);
        if (!$detallef3citos) {
            return redirect()->route('patologia.detallef3citos.index')->with('mensaje', 'No se encontró el area');
        }
        $detallef3citos->estado = FALSE; // Cambia el estado a inactivo
        $detallef3citos->save();
        return redirect()->route('patologia.detallef3citos.index')->with('mensaje', 'El registro se marcó como inactivo');
    }
}
