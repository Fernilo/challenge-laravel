@extends('layouts.principal')

@section('principal')
    <form method="post" action="{{ route('contacto.send') }}"enctype="multipart/form-data">
    @csrf
        <input type="hidden" name="usuario_id" value=1>
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre Completo</label>
            <input type="text" name="nombre" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="correo" class="form-label">Correo</label>
            <input type="file" name="correo" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="mensaje" class="form-label">Mensaje</label>
            <textarea class="form-control" name="mensaje" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>
@endsection