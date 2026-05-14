<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;

class UsuariosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $usuarios = Usuario::all();
        return view('usuarios.index',compact('usuarios'));
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('usuarios.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $request->validate([
        'nombre' => 'required|max:100',
        'apellido' => 'required|max:100',
        'contacto' => 'nullable|max:20',
        'email' => 'required|email|unique:usuarios,email',
        'password' => 'required|min:8',
        'rol' => 'required'

    ]);

    Usuario::create([

        'nombre' => $request->nombre,
        'apellido' => $request->apellido,
        'contacto' => $request->contacto,
        'email' => $request->email,
        'password' => bcrypt($request->password),
        'fecha_registro' => now(),
        'rol' => $request->rol
    ]);

    return redirect()->route('usuarios.index')
        ->with('success', 'Usuario registrado correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Usuario $usuario)
    {
        return view('usuarios.edit', compact('usuario'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Usuario $usuario)
    {
        $request->validate([
        'nombre' => 'required|max:100',
        'apellido' => 'required|max:100',
        'contacto' => 'nullable|max:100',
        'email' => 'required|max:100|unique:usuarios,email,' . $usuario->id_usuario . ',id_usuario',
        'rol' => 'required|max:50'
    ]);

    $usuario->update($request->all());

    return redirect()->route('usuarios.index')
    ->with('success', 'Usuario Actualizado Exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Usuario $usuario)
    {
        $usuario->delete();

        return redirect()->route('usuarios.index')
        ->with('success', 'Usuario Eliminado Exitosamente');
    }
}
