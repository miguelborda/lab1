<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;


class AreaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $areas = Area::all();
        return view("patologia.areas.index", [
            'areas' => $areas
        ]);
    }
    
    public function pdf()
    {
        $areas = Area::where('estado', true)->orderBy('id', 'asc')->get();
            $pdf = Pdf::loadView('patologia.areas.pdf', compact('areas'));
        return $pdf->stream();
        //return $pdf->download('invoice.pdf');  --> para descargar pdf
    }

    public function create()
    {
        return view('patologia.areas.create');
    }    
        
    public function store(Request $request)
    {
        $request->validate(
            [//'codigo_area'=>'required',
             'nombre_area'=>'required']
        ); 
        $user = auth()->user();       
        $area = Area::create(array_merge($request->all(), ['creatoruser_id' => $user->id]));                
        return redirect()->route('patologia.areas.index')->with('mensaje','Se creó exitosamente');
    }       
    
    public function show(Area $area)
    {
        //
    }
            
    public function edit($id)
    {       
        $area=Area::find($id);
        return view('patologia.areas.edit',compact('area'));
    }    
    
    public function update(Request $request, $id)
    {   
        $hoy = date('Y-m-d H:i:s');
        $area = request()->except(['_token', '_method']);          
        $user = auth()->user();        
        Area::where('id', $id)->update(array_merge($area, ['updateduser_id' => $user->id],['updated_at' => $hoy]));   
        return redirect()->route('patologia.areas.index')->with('mensaje', 'Se actualizó exitosamente');
    }   
    
    
    public function destroy($id)
    {
        $hoy = date('Y-m-d H:i:s');
        $user = auth()->user();        
        $area = Area::find($id);
        if (!$area) {
            return redirect()->route('patologia.areas.index')->with('mensaje', 'No se encontró el area');
        }
        $area->estado = FALSE; // Cambia el estado a INACTIVO
        $area->updateduser_id = $user->id;
        $area->updated_at = $hoy;
        $area->save();
        return redirect()->route('patologia.areas.index')->with('mensaje', 'El area se marcó como inactivo');
    }
   
    public function habilitar($id)
    {
        $hoy = date('Y-m-d H:i:s');
        $user = auth()->user();                
        $area = Area::find($id);
        if (!$area) {
            return redirect()->route('patologia.areas.index')->with('mensaje', 'No se encontró el area');
        }
        $area->estado = TRUE; // Cambia el estado a ACTIVO
        $area->updateduser_id = $user->id;
        $area->updated_at = $hoy;
        $area->save();
        return redirect()->route('patologia.areas.index')->with('mensaje', 'El area se marcó como inactivo');
    }
} 