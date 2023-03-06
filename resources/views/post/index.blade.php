@extends('layouts.principal')

@section('principal')
    <h1>Listado de posts</h1>
    <a class="btn btn-success mb-3" href="{{route('post.create')}}">Nuevo Posts</a class="btn btn-primary">
    @if(session('mensaje'))
        <div class="alert-success p-3 mb-3">
            <p>{{session('mensaje')}}</p>
        </div>
    @endif
    
    @livewire('buscador')
    
@endsection