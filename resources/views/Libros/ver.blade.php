@extends('layouts.main')

@section('title', 'Lista de Libros')

@section('content')
    @if (session('success'))
        <div class="alert alert-success" id="message">
            {{ session('success') }}
        </div>
    @elseif (session('update'))
        <div class="alert alert-info" id="message">
            {{ session('update') }}
        </div>
    @elseif (session('delete'))
        <div class="alert alert-danger" id="message">
            {{ session('delete') }}
        </div>
    @endif

    <div class="mb-4">
        <a href="{{ route('libros.index') }}">
            <button type="button" class="btn btn-secondary">
                Regresar
            </button>
        </a>
    </div>
    
    <!-- Tabla mejorada con DataTables -->
    <table id="librosTable" class="table table-striped table-bordered table-hover" style="width:100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre del libro</th>
                <th>Cantidad</th>
                <th>Acciones</th> 
            </tr>
        </thead>
        <tbody>
            @foreach ($libros as $libro)
            <tr>
                <td>{{ $libro->id }}</td>
                <td>{{ $libro->name }}</td>
                <td>{{ $libro->cantidad }}</td>
                <td>
                    <!-- Botón para editar el libro -->
                    <a href="{{ route('libros.edit', $libro->id) }}" class="btn btn-warning btn-sm">Actualizar</a>
                    <!-- Botón para mostrar detalles del libro -->
                    <a href="{{ route('libros.show', $libro->id) }}" class="btn btn-info btn-sm">Mostrar</a>
                    <!-- Botón para eliminar  -->
                    <form action="{{ route('libros.destroy', $libro->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de que deseas eliminar este libro?');">Eliminar</button>
                    </form>                    
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <script>
    document.addEventListener("DOMContentLoaded", function() {
        const message = document.getElementById('message');
        if (message) {
            setTimeout(function() {
                message.style.display = 'none';
            }, 3000);
        }
    });
    </script>

      
@endsection

