<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\ImageManager;  


class ImagenController extends Controller
{
    public function store(Request $request)
    {
        $imagen = $request->file('file');

        $nombreImagen = Str::uuid() . "." . $imagen->extension();  


        $manager = new ImageManager(); // No es necesario especificar el driver

        $imagenServidor = $manager->make($imagen);
        $imagenServidor->resize(1000, 1000);

        $imagenPath = public_path('uploads') . '/' . $nombreImagen;

        $imagenServidor->save($imagenPath);

        return response()->json(['imagen' => $nombreImagen]);
    }
}