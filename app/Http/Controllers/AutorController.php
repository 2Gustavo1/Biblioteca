<?php

namespace App\Http\Controllers;

use App\Models\autor;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AutorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Obtener todos los libros de la base de datos
        $autores = Autor::all();

        // Retornar la vista con los libros
        return view('dashboard', compact('autores'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Obtener los libros que no tienen autor asignado (libro_id es null)
        $libros = \App\Models\Libro::whereDoesntHave('autor')->get();
        return view('autores.create', compact('libros'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'libro_id' => 'required|exists:libros,id',  // Verifica que libro_id sea obligatorio
        ]);
    
        \App\Models\Autor::create([
            'name' => $request->name,
            'libro_id' => $request->libro_id,  // Incluye libro_id en la creación del autor
        ]);
    
        return redirect()->route('autores.index')->with('success', 'Autor creado exitosamente.');
    }
    

    /**
     * Display the specified resource.
     */
    
    public function show(Autor $autor,$id)
    {
        $autor = autor::findOrFail($id);
        return view('autores.show', compact('autor'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Autor $autor,$id)
    {
        $libros = \App\Models\Libro::all(); // Obtener todos los libros
        $autor = Autor::findOrFail($id);  // Obtén el autor
        return view('autores.edit', compact('autor', 'libros'));  // Pasa los datos a la vista
    }
 
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Autor $autor,$id)
    {
    // Validación de datos
        $request->validate([
            'name' => 'required|string|max:255',
            'libro_id' => 'nullable|exists:libros,id',  // Si se proporciona libro_id, debe existir en la tabla libros
        ]);
    // Actualizar el autor con los nuevos datos
        $autor = Autor::findOrFail($id); 
        $autor->update($request->all()); // Actualiza el autor
        
    // Redirigir al listado de autores con un mensaje de éxito
        return redirect()->route('autores.ver')->with('success', 'Autor actualizado correctamente.');
    }

    


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Autor $autor,$id)
    {
        $autor = autor::findOrFail($id);
        $autor->delete();
        return redirect()->route('autores.ver')->with('success', 'Autor eliminado correctamente.');
    }

    public function ver(Autor $autor)
    {
        // Retornar la vista con los autores
        $autores = autor::with('libro')->get();                         
        // Pasar la variable a la vista             
        return view('autores.ver', compact('autores'));
    }
}
