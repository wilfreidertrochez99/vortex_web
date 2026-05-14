<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proveedor;

class ProveedoresController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $proveedores = Proveedor::all();
        return view('proveedores.index', compact('proveedores'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
         return view('proveedores.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $request->validate([
            'nombre' => 'required|max:100',
            'nit' => 'required|max:50|unique:proveedores,nit',
            'direccion' => 'required|max:150',
            'ciudad' => 'required|max:100',
            'telefono' => 'required|max:50'

    ]);

    Proveedor::create($request->all());

    return redirect()->route('proveedores.index')
        ->with('success', 'Proveedor Registrado Exitosamente.');
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
    public function edit(Proveedor $proveedor)
    {
         return view('proveedores.edit', compact('proveedor'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Proveedor $proveedor)
    {
         $request->validate([
            'nombre' => 'required|max:100',
            'nit' => 'required|max:50|unique:proveedores,nit,' . $proveedor->id_proveedor . ',id_proveedor',
            'direccion' => 'required|max:150',
            'ciudad' => 'required|max:100',
            'telefono' => 'required|max:50'
    ]);

    $proveedor->update($request->all());

    return redirect()->route('proveedores.index')
        ->with('success', 'Proveedor Actualizado Exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Proveedor $proveedor)
    {
         $proveedor->delete();

    return redirect()->route('proveedores.index')
        ->with('success', 'Proveedor Eliminado Exitosamente.');
    }
}
