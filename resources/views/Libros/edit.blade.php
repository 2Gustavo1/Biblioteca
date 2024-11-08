@extends('layouts.main')

@section('title', 'Actualizar Libro')

@section('content')
    <h1 class="professional-title">Actualizar libro</h1>
    <!-- Formulario para actualizar un libro -->
    <form action="{{ route('libros.update', $libro->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label for="name" class="form-label">Nombre del libro</label>
        <input type="text" id="name" name="name" class="form-control" value="{{ old('name', $libro->name) }}" required>
    </div>

    <div class="mb-3">
        <label for="cantidad" class="form-label">Cantidad</label>
        <input type="number" id="cantidad" name="cantidad" class="form-control" value="{{ old('cantidad', $libro->cantidad) }}" required min="1">
    </div>

    <div class="d-flex justify-content-end mt-4">
        <a href="{{ route('libros.ver') }}" class="btn btn-secondary me-2">Regresar</a>
        <button type="submit" class="btn btn-success">Actualizar</button>
    </div>
</form>

@endsection



