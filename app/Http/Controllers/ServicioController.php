<?php

namespace App\Http\Controllers;

use App\Models\Servicio;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class ServicioController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $servicios = Servicio::all();   
        return view("patologia.servicios.index", [
            'servicios' => $servicios
        ]);
    }
    
    public function pdf()
    {        
        $servicios = Servicio::where('estado', true)->orderby('nombre_servicio','asc')->get();
        $pdf = Pdf::loadView('patologia.servicios.pdf', compact('servicios'));
        return $pdf->stream();
        //return $pdf->download('invoice.pdf');  --> para descargar pdf
    }

    public function create()
    {
        return view('patologia.servicios.create');
    }    
        
    public function store(Request $request)
    {
        $request->validate(
            [
             'nombre_servicio'=>'required']
        ); 
        $user = auth()->user();       
        $servicios = Servicio::create(array_merge($request->all(), ['creatoruser_id' => $user->id]));                
        return redirect()->route('patologia.servicios.index')->with('mensaje','Se creó exitosamente');
    }       
    
    public function show(Servicio $servicio)
    {
        //
    }
            
    public function edit($id)
    {       
        $servicio = Servicio::find($id);
        return view('patologia.servicios.edit',compact('servicio'));
    }    
    
    public function update(Request $request, $id)
    {   
        $hoy = date('Y-m-d H:i:s');
        $servicio = request()->except(['_token', '_method']);          
        $user = auth()->user();        
        Servicio::where('id', $id)->update(array_merge($servicio, ['updateduser_id' => $user->id],['updated_at' => $hoy]));   
        return redirect()->route('patologia.servicios.index')->with('mensaje', 'Se actualizó exitosamente');
    }   
    
    
    public function destroy($id)
    {
        $hoy = date('Y-m-d H:i:s');
        $user = auth()->user();    
        $servicio = Servicio::find($id);
        if (!$servicio) {
            return redirect()->route('patologia.servicios.index')->with('mensaje', 'No se encontró el area');
        }
        $servicio->estado = FALSE; // Cambia el estado a inactivo
        $servicio->updateduser_id = $user->id;
        $servicio->updated_at = $hoy;
        $servicio->descripcion = 'Desactivó_el_Estado';
        $servicio->save();
        return redirect()->route('patologia.servicios.index')->with('mensaje', 'El area se marcó como inactivo');
    }

    public function habilitar($id)
    {
        $hoy = date('Y-m-d H:i:s');
        $user = auth()->user();                
        $servicio = Servicio::find($id);
        if (!$servicio) {
            return redirect()->route('patologia.servicios.index')->with('mensaje', 'No se encontró el servicio');
        }
        $servicio->estado = TRUE; // Cambia el estado a ACTIVO
        $servicio->updateduser_id = $user->id;
        $servicio->updated_at = $hoy;
        $servicio->descripcion = 'Activó_el_Estado';
        $servicio->save();
        return redirect()->route('patologia.servicios.index')->with('mensaje', 'El servicio se marcó como inactivo');
    }

}