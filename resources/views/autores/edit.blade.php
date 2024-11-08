@extends('layouts.main')

@section('title', 'Editar Autor')

@section('content')
    <h1 class="professional-title">Actualizar Autor</h1>
    <!-- Formulario para editar autor -->
    <form action="{{ route('autores.update', $autor) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label for="name" class="form-label">Nombre del Autor:</label>
        <input type="text" name="name" class="form-control" id="name" value="{{ old('name', $autor->name) }}" required>
    </div>
    <!-- Campo de selección de libro -->
    <div class="mb-3">
        <label for="libro_id" class="form-label">Nombre del Libro:</label>
        <select name="libro_id" class="form-control" id="libro_id">
            <option value="">Seleccione un libro</option>
            @foreach ($libros as $libro)
                <option value="{{ $libro->id }}" {{ (old('libro_id', $autor->libro_id) == $libro->id) ? 'selected' : '' }}>
                    ID:{{ $libro->id }} - {{ $libro->name }}
                </option>
            @endforeach
        </select>
    </div>
    <div class="d-flex justify-content-end mt-4">
        <a href="{{ route('autores.ver') }}" class="btn btn-secondary me-2">Regresar</a>
        <button type="submit" class="btn btn-success">Actualizar</button>
    </div>
</form>
@endsection

