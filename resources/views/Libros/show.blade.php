<!-- resources/views/libros/show.blade.php -->
@extends('layouts.main')

@section('title', 'Detalles del Libro')

@section('content')
    <div class="mb-4">
        <a href="{{ route('libros.index') }}">
            <button type="button" class="btn btn-secondary">
                Regresar 
            </button>
        </a>
    </div>
    <h1>Detalles del Libro</h1>
    <ul>
        <li><strong>ID:</strong> {{ $libro->id }}</li>
        <li><strong>Nombre del libro:</strong> {{ $libro->name }}</li>
        <li><strong>Cantidad:</strong> {{ $libro->cantidad }}</li>
        <!-- Agrega más detalles aquí si es necesario -->
    </ul>
@endsection
