<?php

namespace App\Http\Controllers\Sistemas;

use App\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    
    public function index()
    {
        $roles=Role::all();               
        return view("sistemas.roles.index", [
            'roles'   =>  $roles            
        ]);
    }

    
    public function create()
    {
        //
    }

    
    public function store(Request $request)
    {
        //
    }

    
    public function show(Role $role)
    {
        //
    }

    
    public function edit(Role $role)
    {
        //
    }

    
    public function update(Request $request, Role $role)
    {
        //
    }

    
    public function destroy(Role $role)
    {
        //
    }
}
