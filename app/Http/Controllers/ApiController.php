<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class ApiController extends Controller
{
    public function index() 
    {
        $posts = Post::all();

        return response()->json($posts);//Laravel serializa directamente
    }

    public function store(Request $request) 
    {
        dd($request->email);
    }

    public function update(Request $request) 
    {
        $post = Post::find($request->id);

        $post->save();

        return response()->json($post);
        dd($request->email);
    }

    public function destroy (Request $request) 
    {
        $post = Post::destroy($request->id);
    }
}
