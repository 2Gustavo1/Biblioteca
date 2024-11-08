@extends('layouts.main')

@section('title', 'Eliminar Autor')

@section('content')
    <div class="container mt-4">
        <h1>Eliminar Autor</h1>

        <div class="alert alert-warning">
            <strong>Advertencia:</strong> ¿Estás seguro de que deseas eliminar al autor "{{ $autor->name }}"?
            Esta acción no se puede deshacer.
        </div>

        <form action="{{ route('autores.destroy', $autor->id) }}" method="POST">
            @csrf
            @method('DELETE')

            <div class="mb-3">
                <button type="submit" class="btn btn-danger">Eliminar</button>
                <a href="{{ route('autores.ver') }}" class="btn btn-secondary">Cancelar</a>
            </div>
        </form>
    </div>
@endsection
