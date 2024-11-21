<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Intervention\Image\ImageManager; 

class PerfilController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        return view('perfil.index');
    }
    public function store(Request $request)
{
    $request->request->add(['username' => Str::slug($request->username)]);

    // Validación
    $this->validate($request, [
        'username' => [
            'required',
            'unique:users,username,' . auth()->user()->id,
            'min:3',
            'max:20',
        ],
        'email' => [
            'required',
            'email',
            'max:60',
            'unique:users,email,' . auth()->user()->id,
        ] 
    ]);

   
      

    if ($request->imagen) {
        $imagen = $request->file('imagen');
        $nombreImagen = Str::uuid() . "." . $imagen->extension();

        $manager = new ImageManager();
        $imagenServidor = $manager->make($imagen)->resize(1000, 1000);

        $imagenPath = public_path('perfiles') . '/' . $nombreImagen;
        $imagenServidor->save($imagenPath);
    }

    // Guardar cambios
    $usuario = User::find(auth()->user()->id);
    $usuario->username = $request->username;
    $usuario->email = $request->email; 
    $usuario->imagen = $nombreImagen ?? auth()->user()->imagen ?? '';
    $usuario->save();

    // Redireccionar
    return redirect()->route('posts.index', $usuario->username)->with('mensaje', 'Perfil actualizado correctamente.');}


}
