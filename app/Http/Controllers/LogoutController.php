<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LogoutController extends Controller
{
    public function store(){
        //Cerrar sesion
        auth()->logout();
        //Redirige a login para que vuelva a iniciar sesion
        
        return redirect()->route('login');
    }
}
