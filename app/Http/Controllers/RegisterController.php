<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    //
   public function index () {
        return view('auth/register');
    }

    public function store(Request $request) {
         
        //Validacion
        $this->validate($request,[
        'name' =>     'required|min:5|max:30',
        'username' => 'required|unique:users|min:3|max:20',  
        'email' =>    'required|unique:users|email|max:60',
        'password' => 'required|confirmed|min:6'
        ]);
 //Crear registro una vez que los datos se validan
        User::create([
            'name'=> $request->name,
            'username'=>Str::slug ($request->username),
            'email'=> $request->email,
            'password'=>Hash::make ($request->password)//Hashea Password

        ]);
        //Autenticar un usuario

        auth()->attempt($request->only('email', 'password'));
 //Redireccionar 

 return redirect()->route('posts.index', auth()->user()->username);

    }
}
