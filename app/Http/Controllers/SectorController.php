<?php

namespace App\Http\Controllers;

use App\Models\Sector;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SectorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $sectors=Sector::all();
        return view("patologia.sector.index", [
            'sectors'   =>  $sectors
        ]);
    }        
    
    public function create()
    {
        return view('patologia.sector.create');
    }    
    
    public function store(Request $request)
    {
        $request->validate(
            ['codigo_sector'=>'required',
             'nombre_sector'=>'required']
        ); 
        $user = auth()->user();       
        $sector = Sector::create(array_merge($request->all(), ['userid_creator' => $user->id],['username_creator' => $user->email]));                
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
        Sector::where('id', $id)->update(array_merge($sector, ['userid_lastupdated' => $user->id],['username_lastupdated' => $user->email],['updated_at' => $hoy]));           
        return redirect()->route('patologia.sector.index')->with('mensaje', 'Se actualizó exitosamente');
    }   
    
    public function destroy($id)
    {
        Sector::destroy($id);
        return redirect()->route('patologia.sector.index')->with('mensaje','Borrado con éxito');
    }
}