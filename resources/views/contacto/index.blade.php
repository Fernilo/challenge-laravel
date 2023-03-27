@extends('layouts.principal')

@section('principal')
    <form method="post" action="{{ route('contacto.send') }}">
    @csrf
        <input type="hidden" name="usuario_id" value=1>
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre Completo</label>
            <input type="text" name="nombre" class="form-control">
            @error('nombre')
                <p><strong>{{$message}}</strong></p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="correo" class="form-label">Correo</label>
            <input type="text" name="correo" class="form-control">
            @error('correo')
                <p><strong>{{$message}}</strong></p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="mensaje" class="form-label">Mensaje</label>
            <textarea class="form-control" name="mensaje"></textarea>
            @error('mensaje')
                <p><strong>{{$message}}</strong></p>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>
    @if (session('info'))
        <script>
            alert('{{session("info")}}')
        </script>
    @endif
@endsection