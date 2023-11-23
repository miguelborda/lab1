<?php

namespace App\Http\Controllers;

use App\Models\Establecimiento;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class EstablecimientoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $establecimientos = Establecimiento::all();
        //$establecimientos=Establecimiento::where('estado', true)->get();
        return view("patologia.establecimientos.index", [
            'establecimientos'   =>  $establecimientos
        ]);
    }    
    public function pdf()
    {
        $establecimientos = Establecimiento::where('estado', true)->orderby('nombre_establecimiento','asc')->get();
        $pdf = Pdf::loadView('patologia.establecimientos.pdf', compact('establecimientos'));
        return $pdf->stream();
        //return $pdf->download('invoice.pdf');  --> para descargar pdf
    } 
    
    public function create()
    {
        return view('patologia.establecimientos.create');
    }    
        
    public function store(Request $request)
    {
        $request->validate(
            [//'codigo_establecimiento'=>'required',
             'nombre_establecimiento'=>'required']
        ); 
        $user = auth()->user();       
        $establecimiento = Establecimiento::create(array_merge($request->all(), ['creatoruser_id' => $user->id]));
        return redirect()->route('patologia.establecimientos.index')->with('mensaje','Se creó exitosamente');
    }       
    
    public function show(Establecimiento $establecimiento)
    {
        //
    }   
    
    public function edit($id)
    {       
        $establecimiento=Establecimiento::find($id);
        return view('patologia.establecimientos.edit',compact('establecimiento'));
    }    
    
    public function update(Request $request, $id)
    {
        $hoy = date('Y-m-d H:i:s');
        $establecimiento = request()->except(['_token','_method']);
        $user = auth()->user();        
        Establecimiento::where('id', $id)->update(array_merge($establecimiento, ['updateduser_id' => $user->id],['updated_at' => $hoy]));           
        return redirect()->route('patologia.establecimientos.index')->with('mensaje', 'Se actualizó exitosamente');
    }      
    
    public function destroy($id)
    {
        $hoy = date('Y-m-d H:i:s');
        $user = auth()->user();    
        $establecimiento = Establecimiento::find($id);
        if (!$establecimiento) {
            return redirect()->route('patologia.establecimientos.index')->with('mensaje', 'No se encontró el establecimiento');
        }
        $establecimiento->estado = FALSE; // Cambia el estado a inactivo
        $establecimiento->updateduser_id = $user->id;
        $establecimiento->updated_at = $hoy;
        $establecimiento->descripcion = 'Desactivó_el_Estado';
        $establecimiento->save();
        return redirect()->route('patologia.establecimientos.index')->with('mensaje', 'El establecimiento se marcó como inactivo');
    }
    
    public function habilitar($id)
    {
        $hoy = date('Y-m-d H:i:s');
        $user = auth()->user();                
        $establecimiento = Establecimiento::find($id);
        if (!$establecimiento) {
            return redirect()->route('patologia.establecimientos.index')->with('mensaje', 'No se encontró el establecimiento');
        }
        $establecimiento->estado = TRUE; // Cambia el estado a ACTIVO
        $establecimiento->updateduser_id = $user->id;
        $establecimiento->updated_at = $hoy;
        $establecimiento->descripcion = 'Activó_el_Estado';
        $establecimiento->save();
        return redirect()->route('patologia.establecimientos.index')->with('mensaje', 'El establecimiento se marcó como inactivo');
    }
}
