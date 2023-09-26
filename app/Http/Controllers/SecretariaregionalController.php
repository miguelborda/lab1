<?php

namespace App\Http\Controllers;

use App\Models\Secretariaregional;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SecretariaregionalController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $secretariaregionals=Secretariaregional::all();

        return view("patologia.secretariaregional.index", [
            'secretariaregionals'   =>  $secretariaregionals
        ]);
    }


    public function create()
    {
        return view('patologia.secretariaregional.create');
    }


    public function store(Request $request)
    {
        $request->validate(
            ['codigo_regional'=>'required',
             'nom_secretaria_regional'=>'required']
        );
        $user = auth()->user();       
        $secretariaregional = Secretariaregional::create(array_merge($request->all(), ['userid_creator' => $user->id],['username_creator' => $user->email]));        
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
        Secretariaregional::where('id', $id)->update(array_merge($secretariaregional, ['userid_lastupdated' => $user->id],['username_lastupdated' => $user->email],['updated_at' => $hoy]));        
        return redirect()->route('patologia.secretariaregional.index')->with('mensaje', 'Se actualizó exitosamente');
    }



    public function destroy($id)
    {

        //$secretariaregional->delete();
        Secretariaregional::destroy($id);
        return redirect()->route('patologia.secretariaregional.index')->with('mensaje','borrado');
    }
}
