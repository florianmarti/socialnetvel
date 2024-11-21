<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use DragonCode\Support\Facades\Filesystem\File;
use Illuminate\Http\Request;

class PostController extends Controller
{
    //este metodo se va a ejecutar un momento antes de el siguiente metodo y verificara si el usuario esta autentificado
    public function __construct(){
        $this->middleware('auth')->except(['show', 'index']);
    }
       
     

    public function index(User $user){
$posts = Post::where('user_id', $user->id)->paginate(8);

        //auth verifica si el usuario esta verificado
         
        return view('dashboard',[
            'user' => $user,
            'posts'=> $posts
             
        ]);
    }
    public function create(){
       return view('posts.create');
    }

     

    //Diferencia entre "create" y "store" es que store nos permite almacenar en DB
    public function store(Request $request){
       $this->validate($request, [
        'titulo' =>     'required|max:255',
        'descripcion' => 'required',  
        'imagen' =>    'required',
         
       ]);

    //    Post::create([
    //     'titulo' => $request -> titulo,
    //     'descripcion' => $request -> descripcion,
    //     'imagen' => $request -> imagen,
    //     'user_id' => auth()->user()->id
    //    ]);
       //Otra forma de crear registros creando una instancia de Post con $post

       $post = new Post;

       $post -> titulo = $request -> titulo;
       $post -> descripcion = $request -> descripcion;
       $post -> imagen = $request -> imagen;
       $post -> user_id = auth()->user()->id;
       $post -> save();

    // $request = user()->posts()-> create([
    //     'titulo' => $request -> titulo,
    //     'descripcion' => $request -> descripcion,
    //     'imagen' => $request -> imagen,
        
    // ])
    // Crear el post
    // auth()->user()->posts()->create([
    //     'titulo' => $request->titulo,
    //     'descripcion' => $request->descripcion,
    //     'imagen' => $request->imagen,
    // ]);




       return redirect()->route('posts.index', auth()->user()->username);
    }
    public function show(User $user, Post $post){
        return view('posts.show', [
            'post' => $post,
            'user' => $user
        ] );
    }
    public function destroy(Post $post)
{
    $this->authorize('delete', $post);

    // Eliminar todos los comentarios asociados al post
    $post->comentarios()->delete();

    // Luego, eliminar el post
    $post->delete();

    //Eliminar Imagen
        $imagen_path = public_path('uploads/' . $post->imagen);

        if(File::exists($imagen_path)) {
            unlink($imagen_path);
         
            
        }


    return redirect()->route('posts.index', auth()->user()->username);
}
}
