@extends('layouts.principal')

@section('principal')
    <h1>Listado de posts</h1>
    <a class="btn btn-success mb-3" href="{{route('post.create')}}">Nuevo Posts</a class="btn btn-primary">
        @isset($mensaje)
            <p>{{$mensaje}}</p>
        @endisset($mensaje)
    
    <div class="row">
        @foreach ($posts as $post)
        <div class="col-md-3 mb-3">
            <div class="card" style="width: 100%">    
                <img class="card-img-top img-fluid" src="{{Storage::url($post->imagen)}}" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">{{$post->nombre}}</h5>
                    <p class="card-text">{{ $post->descripcion }}</p>
                    <a href="#" class="btn btn-primary">Editar</a>
                    <a href="#" class="btn btn-danger">Eliminar</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
@endsection