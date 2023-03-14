<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Storage;

class ApiController extends Controller
{
    public function index() 
    {
        $posts = Post::all();

        return response()->json($posts);//Laravel serializa directamente
    }

    public function store(Request $request) 
    {
        $url = 'default.png';
        if($request->file('imagen')) {
            $url = Storage::put('public/posts',$request->file('imagen'));
        }
        $post = new Post;

        $post->imagen = $url;
        $post->titulo = $request->titulo;
        $post->descripcion = $request->descripcion;

        $post->save();
    }

    public function update(Request $request , $id) 
    {
        $post = Post::find($id);
        if($request->file('imagen')) {
            $post->imagen= Storage::put('public/posts',$request->file('imagen'));
        } 

        $post->titulo = $request->titulo;
        $post->descripcion = $request->descripcion;
        
        $post->save();
    }

    public function destroy ($id) 
    {
        $post = Post::destroy($id);
    }
}
