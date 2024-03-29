<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StorePostRequest;
use Intervention\Image\Facades\Image;
use Intervention\Image\ImageManager;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('post.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('post.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePostRequest $request)
    {
        $url = 'default.png';
        if($request->file('imagen')) {
            $url = Storage::put('public/posts',$request->file('imagen'));

            $manager = new Image();

            $image = $manager::make(Storage::get($url))
                ->widen(600)
                ->limitColors(255)
                ->encode();

            Storage::put($url, (string)$image);
        }
        $post = new Post;

        $post->imagen = $url;
        $post->titulo = $request->titulo;
        $post->descripcion = $request->descripcion;

        $post->save();

        return redirect()->route('post.index')->with(['mensaje' => "Post Creado Correctamente"]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //dd($id);
        $post = Post::find($id);
        return view('post.edit',['post' => $post]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post = Post::find($id);
        if($request->file('imagen')) {
            $post->imagen = Storage::put('public/posts',$request->file('imagen'));

            $manager = new Image();

            $image = $manager::make(Storage::get($post->imagen))
                ->widen(600)
                ->limitColors(255)
                ->encode();

            Storage::put($post->imagen, (string)$image);
        } 

        $post->titulo = $request->titulo;
        $post->descripcion = $request->descripcion;
        
        $post->save();

        return redirect()->route('post.index')->with(['mensaje' => 'El Post se editó correctamente']);
      
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Post::destroy($id);

        return redirect()->route('post.index')->with(['mensaje' => 'El Post se eliminó correctamente']);
    }
}
