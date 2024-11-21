<?php
     
     namespace App\Http\Controllers;
      
     use App\Models\Post;
     use Illuminate\Http\Request;
      
     class LikeController extends Controller
     {
         public function store(Request $request, Post $post)
         {
             //Almacenar los likes
             $post->likes()->create([
                 'user_id' => $request->user()->id
             ]);
      
             return back();
         }
         //Eliminar los likes
         public function destroy(Request $request, Post $post){
            $request->user()->likes()->where('post_id', $post->id)->delete();
            return back();
         }
     }