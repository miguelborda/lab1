<?php

namespace App\Http\Controllers;

use App\Models\Secretariaregional;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;


class SecretariaregionalController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $secretariaregionals = Secretariaregional::all();
        //$secretariaregionals = Secretariaregional::where('estado', true)->get();

        return view("patologia.secretariaregional.index", [
            'secretariaregionals'   =>  $secretariaregionals
        ]);
    }
    public function pdf()
    {
        $secretariaregionals = Secretariaregional::where('estado', true)->get();
        //$secretariaregionals = Secretariaregional::all();
        $pdf = Pdf::loadView('patologia.secretariaregional.pdf', compact('secretariaregionals'));
        return $pdf->stream();
        //return $pdf->download('invoice.pdf');  --> para descargar pdf
    }   

    public function create()
    {
        return view('patologia.secretariaregional.create');
    }


    public function store(Request $request)
    {
        $request->validate(
            [//'codigo_regional'=>'required',
             'nom_secretaria_regional'=>'required']
        );
        $user = auth()->user();       
        $secretariaregional = Secretariaregional::create(array_merge($request->all(), ['creatoruser_id' => $user->id]));        
        return redirect()->route('patologia.secretariaregional.index')->with('mensaje','Se creó exitosamente');
    }


    public function show(Secretariaregional $secretariaregional)
    {
        //
    }


    public function edit($id)
    {
        $secretariaregional=Secretariaregional::find($id);

        return view('patologia.secretariaregional.edit',compact('secretariaregional'));

    }   

    public function update(Request $request, $id)
    {
        $hoy = date('Y-m-d H:i:s');
        $secretariaregional = request()->except(['_token','_method']);
        $user = auth()->user();        
        Secretariaregional::where('id', $id)->update(array_merge($secretariaregional, ['updateduser_id' => $user->id],['updated_at' => $hoy]));        
        return redirect()->route('patologia.secretariaregional.index')->with('mensaje', 'Se actualizó exitosamente');
    }
    
    public function destroy($id)
    {
        $hoy = date('Y-m-d H:i:s');
        $user = auth()->user();    
        $secretariaregional = Secretariaregional::find($id);
        if (!$secretariaregional) {
            return redirect()->route('patologia.secretariaregional.index')->with('mensaje', 'No se encontró el secretariaregional');
        }
        $secretariaregional->estado = FALSE; // Cambia el estado a inactivo
        $secretariaregional->updateduser_id = $user->id;
        $secretariaregional->updated_at = $hoy;
        $secretariaregional->descripcion = 'Desactivó_el_Estado';
        $secretariaregional->save();
        return redirect()->route('patologia.secretariaregional.index')->with('mensaje', 'El secretariaregional se marcó como inactivo');
    }

    public function habilitar($id)
    {
        $hoy = date('Y-m-d H:i:s');
        $user = auth()->user();                
        $secretariaregional = Secretariaregional::find($id);
        if (!$secretariaregional) {
            return redirect()->route('patologia.secretariaregional.index')->with('mensaje', 'No se encontró el secretariaregional');
        }
        $secretariaregional->estado = TRUE; // Cambia el estado a ACTIVO
        $secretariaregional->updateduser_id = $user->id;
        $secretariaregional->updated_at = $hoy;
        $secretariaregional->descripcion = 'Activó_el_Estado';
        $secretariaregional->save();
        return redirect()->route('patologia.secretariaregional.index')->with('mensaje', 'La Secretaria Regional se marcó como inactivo');
    }

}
