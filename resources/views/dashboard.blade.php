@extends('layouts.main')

@section('title', 'Lista de Libros')

@section('content')
    <h1 class="text-center mb-4 display-6">Biblioteca virtual</h1>

    <!-- Botón estilo Bootstrap -->
    <div class="mb-4">
        <a href="{{ route('libros.create') }}">
            <button type="button" class="btn btn-primary">
                Agregar nuevo libro
            </button>
        </a>
    </div>

    <div class="mb-4">
        <a href="{{ route('autores.create') }}">
            <button type="button" class="btn btn-primary">
                Agregar nuevo Autor
            </button>
        </a>
    </div>

    <div class="mb-4">
        <a href="{{ route('libros.ver') }}">
            <button type="button" class="btn btn-primary">
                Ver libros
            </button>
        </a>
    </div>
    
    <div class="mb-4">
        <a href="{{ route('autores.ver') }}">
            <button type="button" class="btn btn-primary">
                Ver autores
            </button>
        </a>
    </div>
      
@endsection

