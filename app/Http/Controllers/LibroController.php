<?php

namespace App\Http\Controllers;

use App\Models\Libro;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LibroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Obtener todos los libros de la base de datos
        $libros = Libro::all();

        // Retornar la vista con los libros
        return view('dashboard', compact('libros'));
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

          // Retornar la vista con los libros
          return view('libros.create');
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         // Validación de los datos del formulario
         $validated = $request->validate([
            'name' => 'required|string|max:255',
            'cantidad' => 'required|integer',
        ]);

        // Crear el libro en la base de datos
        Libro::create([
            'name' => $validated['name'],
            'cantidad' => $validated['cantidad'],
        ]);

        // Redirigir de vuelta al dashboard con un mensaje de éxito
        return redirect()->route('libros.index')->with('success', 'Libro creado exitosamente.');   
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $libro = Libro::findOrFail($id);
        return view('libros.show', compact('libro'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Libro $libro)
    {
        // Retornar la vista con los libros
        $libros = \App\Models\Libro::all();
        return view('libros.edit', compact('libro'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
    // Validar los datos
        $request->validate([
            'name' => 'required|string|max:255',
            'cantidad' => 'required|integer|min:1',
        ]);

    // Encontrar el libro y actualizarlo
        $libro = Libro::findOrFail($id); // Asegúrate de que el libro existe
        $libro->update($request->all()); // Actualiza el libro

    // Redirigir a la lista de libros
        return redirect()->route('libros.index')->with('success', 'Libro actualizado con éxito.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
    // Buscar el libro por ID y asegurarse de que exista
        $libro = Libro::findOrFail($id);
    // Eliminar el libro
        $libro->delete();
    // Redirigir a la lista de libros con un mensaje de éxito
        return redirect()->route('libros.index')->with('success', 'Libro eliminado con éxito.');
    }
    
    public function ver(Libro $libro)
    {
        // Retornar la vista con los libros
        $libros = Libro::all();                          
        // Pasar la variable a la vista             
        return view('libros.ver', compact('libros'));
    }

}