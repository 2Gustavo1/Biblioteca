@extends('layouts.main')

@section('title', 'Detalles del Autor')

@section('content')
    <div class="mb-4">
        <a href="{{ route('autores.ver') }}">
            <button type="button" class="btn btn-secondary">
                Regresar 
            </button>
        </a>
    </div>
    
    <h1>Detalles del Autor</h1>
    <ul>
        <li><strong>ID:</strong> {{ $autor->id }}</li>
        <li><strong>Nombre del Autor:</strong> {{ $autor->name }}</li>
        <li><strong>ID del Libro:</strong> {{ $autor->libro_id }}</li> 
        <li><strong>Libro:</strong> {{ $autor ->libro->name }}</li>
    </ul>
@endsection