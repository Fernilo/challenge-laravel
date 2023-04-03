@extends('layouts.principal')

@section('principal')
    <form method="post" action="/post"enctype="multipart/form-data">
    @csrf
        <input type="hidden" name="usuario_id" value=1>
        <div class="mb-3">
            <label for="titulo" class="form-label">Título</label>
            <input type="text" name="titulo" class="form-control">
            @error('titulo')
                <small class="text-danger">{{$message}}</small>
            @enderror
        </div>
        <div class="mb-3">
            <label for="imagen" class="form-label">Imagen</label>
            <input type="file" name="imagen" class="form-control">
        </div>
        <div class="mb-3">
            <label for="descripcion" class="form-label">Descripcon</label>
            <textarea class="form-control" name="descripcion"></textarea>
            @error('descripcion')
                <small class="text-danger">{{$message}}</small>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
@endsection