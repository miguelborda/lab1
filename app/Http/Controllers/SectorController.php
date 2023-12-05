<?php

namespace App\Http\Controllers;

use App\Models\Sector;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;


class SectorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $sectors = Sector::all();
        return view("patologia.sector.index", [
            'sectors'   =>  $sectors
        ]);
    }   
    public function pdf()
    {        
        $sectors = Sector::where('estado', true)->orderby('nombre_sector','asc')->get();
        $pdf = Pdf::loadView('patologia.sector.pdf', compact('sectors'));
        return $pdf->stream();
        //return $pdf->download('invoice.pdf');  --> para descargar pdf
    }     
    
    public function create()
    {
        return view('patologia.sector.create');
    }    
    
    public function store(Request $request)
    {
        $request->validate(
            [//'codigo_sector'=>'required',
             'nombre_sector'=>'required']
        ); 
        $user = auth()->user();       
        $sector = Sector::create(array_merge($request->all(), ['creatoruser_id' => $user->id]));                
        return redirect()->route('patologia.sector.index')->with('mensaje','Se creó exitosamente');
    }       
    
    public function show(Sector $sector)
    {
        //
    }
    
    public function edit($id)
    {       
        $sector=Sector::find($id);
        return view('patologia.sector.edit',compact('sector'));
    }    
    
    public function update(Request $request, $id)
    {
        $hoy = date('Y-m-d H:i:s');
        $sector = request()->except(['_token','_method']);
        $user = auth()->user();        
        Sector::where('id', $id)->update(array_merge($sector, ['updateduser_id' => $user->id],['updated_at' => $hoy]));           
        return redirect()->route('patologia.sector.index')->with('mensaje', 'Se actualizó exitosamente');
    }   
        
    public function destroy($id)
    {
        $hoy = date('Y-m-d H:i:s');
        $user = auth()->user();    
        $sector = Sector::find($id);
        if (!$sector) {
            return redirect()->route('patologia.sector.index')->with('mensaje', 'No se encontró el sector');
        }
        $sector->estado = FALSE; // Cambia el estado a inactivo
        $sector->updateduser_id = $user->id;
        $sector->updated_at = $hoy;
        $sector->descripcion = 'Desactivó_el_Estado';
        $sector->save();
        return redirect()->route('patologia.sector.index')->with('mensaje', 'El sector se marcó como Inactivo');
    }

    public function habilitar($id)
    {
        $hoy = date('Y-m-d H:i:s');
        $user = auth()->user();                
        $sector = Sector::find($id);
        if (!$sector) {
            return redirect()->route('patologia.sector.index')->with('mensaje', 'No se encontró el sector');
        }
        $sector->estado = TRUE; // Cambia el estado a ACTIVO
        $sector->updateduser_id = $user->id;
        $sector->updated_at = $hoy;
        $sector->descripcion = 'Activó_el_Estado';
        $sector->save();
        return redirect()->route('patologia.sector.index')->with('mensaje', 'El sector se marcó como Activo');
    }
}