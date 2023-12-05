<?php

namespace App\Http\Controllers;

use App\Models\Distrito;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;


class DistritoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $distritos = Distrito::all();
        //$distritos=Distrito::where('estado', true)->get();
        return view("patologia.distritos.index", [
            'distritos'   =>  $distritos
        ]);
    }       
    
    public function pdf()
    {
        $distritos = Distrito::where('estado', true)->orderby('nombre_distrito','asc')->get();
        $pdf = Pdf::loadView('patologia.distritos.pdf', compact('distritos'));
        return $pdf->stream();
        //return $pdf->download('invoice.pdf');  --> para descargar pdf
    }

    public function create()
    {
        return view('patologia.distritos.create');
    }    
    
    public function store(Request $request)
    {
        $request->validate(
            [//'codigo_distrito'=>'required',
             'nombre_distrito'=>'required']
        ); 
        $user = auth()->user();       
        $distrito = Distrito::create(array_merge($request->all(), ['creatoruser_id' => $user->id]));
        return redirect()->route('patologia.distritos.index')->with('mensaje','Se creó exitosamente');
    }
    
    public function show(Distrito $distrito)
    {
        //
    }
        
    public function edit($id)
    {       
        $distrito=Distrito::find($id);
        return view('patologia.distritos.edit',compact('distrito'));
    }    
        
    public function update(Request $request, $id)
    {
        $hoy = date('Y-m-d H:i:s');
        $distrito = request()->except(['_token','_method']);
        $user = auth()->user();        
        Distrito::where('id', $id)->update(array_merge($distrito, ['updateduser_id' => $user->id],['updated_at' => $hoy]));           
        return redirect()->route('patologia.distritos.index')->with('mensaje', 'Se actualizó exitosamente');
    }       
    
    public function destroy($id)
    {
        $hoy = date('Y-m-d H:i:s');
        $user = auth()->user();    
        $distrito = Distrito::find($id);
        if (!$distrito) {
            return redirect()->route('patologia.distritos.index')->with('mensaje', 'No se encontró el distrito');
        }
        $distrito->estado = FALSE; // Cambia el estado a inactivo
        $distrito->save();
        return redirect()->route('patologia.distritos.index')->with('mensaje', 'El distrito se marcó como Inactivo');
    }

    public function habilitar($id)
    {
        $hoy = date('Y-m-d H:i:s');
        $user = auth()->user();                
        $distrito = Distrito::find($id);
        if (!$distrito) {
            return redirect()->route('patologia.distritos.index')->with('mensaje', 'No se encontró el Distrito');
        }
        $distrito->estado = TRUE; // Cambia el estado a ACTIVO
        $distrito->updateduser_id = $user->id;
        $distrito->updated_at = $hoy;
        $distrito->save();
        return redirect()->route('patologia.distritos.index')->with('mensaje', 'El distrito se marcó como Activo');
    }
}


