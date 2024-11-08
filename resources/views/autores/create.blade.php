@extends('layouts.main')

@section('title', 'Crear Autor')

@section('content')
    <h2>Crear un nuevo Autor</h2>

    <form action="{{ route('autores.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Nombre del Autor:</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>

        <!-- Campo (<select>) donde el usuario puede elegir un libro sin autor asignado -->
        <div class="form-group">
            <label for="libro_id">Nombre del Libro:</label>
            <select name="libro_id" id="libro_id" class="form-control" required>
                <option value="">Seleccione un libro</option>
                @foreach ($libros as $libro)
                    <option value="{{ $libro->id }}">ID:{{ $libro->id }} - {{ $libro->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="d-flex justify-content-end mt-4">
            <a href="{{ route('libros.index') }}" class="btn btn-secondary me-2">
                Regresar
            </a>
            <button type="submit" class="btn btn-success">
                Guardar
            </button>  
        </div>
    </form>
@endsection
