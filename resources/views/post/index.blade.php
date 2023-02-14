@extends('layouts.principal')

@section('principal')
    <h1>Listado de posts</h1>
    <a class="btn btn-success mb-3" href="{{route('post.create')}}">Nuevo Posts</a class="btn btn-primary">
    @if(session('mensaje'))
        <div class="alert-success p-3 mb-3">
            <p>{{session('mensaje')}}</p>
        </div>
    @endif
    
    <div class="row row-cols-1 row-cols-md-3 g-4">
        @foreach ($posts as $key => $post)
        <div class="col">
            <div class="card h-100">    
                <img class="card-img-top img-fluid" src="{{Storage::url($post->imagen)}}" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">{{$post->titulo}}</h5>
                    <p class="card-text">{{ $post->descripcion }}</p>
                    <a href="{{ route('post.edit',[$post->id]) }}" class="btn btn-primary">Editar</a>
                    <a id="" class="btn btn-danger boton-eliminar">Eliminar</a>
                    <form action="/post/{{$post->id}}" id="form-{{$key}}" method="post">
                    @method('delete')
                    @csrf
                        <input type="hidden" name="_method" value="DELETE">
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <div class="position-relative mt-5">
        <div class="position-absolute top-50 start-50 translate-middle">
            {{ $posts->links() }}
        </div>
    </div>
@endsection