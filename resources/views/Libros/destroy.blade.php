@extends('layouts.main')

@section('title', 'Eliminar Libro')

@section('content')
    <h1 class="professional-title">Eliminar Libro</h1>

    <div class="alert alert-warning">
        <strong>¿Estás seguro de que deseas eliminar el libro "{{ $libro->name }}"?</strong>
    </div>

    <form action="{{ route('libros.destroy', $libro->id) }}" method="POST">
        @csrf
        @method('DELETE') <!-- Método DELETE para eliminar el recurso -->

        <div class="d-flex justify-content-end mt-4">
            <a href="{{ route('libros.index') }}" class="btn btn-secondary me-2">Cancelar</a>
            <button type="submit" class="btn btn-danger">Eliminar</button>
        </div>
    </form>
@endsection
