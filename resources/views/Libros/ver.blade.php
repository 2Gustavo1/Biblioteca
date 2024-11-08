@extends('layouts.main')

@section('title', 'Lista de Libros')

@section('content')
    @if (session('success'))
        <div class="alert alert-success" id="success-message">
            {{session ('success') }}
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
        // Espera a que el DOM esté completamente cargado
        document.addEventListener("DOMContentLoaded", function() {
            // Obtiene el mensaje
            const successMessage = document.getElementById('success-message');
            
            // Verifica si el mensaje existe
            if (successMessage) {
                // Oculta el mensaje después de 5 segundos
                setTimeout(function() {
                    successMessage.style.display = 'none';
                }, 3000); // Cambia 5000 por el número de milisegundos que desees
            }
        });
    </script>
      
@endsection

