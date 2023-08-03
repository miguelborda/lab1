<?php

namespace App\Http\Controllers\Sistemas;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index() {
    	$users=User::all();
        return view("sistemas.usuarios.index", [
            'users'   =>  $users
        ]);
    }
}
