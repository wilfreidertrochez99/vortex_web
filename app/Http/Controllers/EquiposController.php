<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Equipo;
use App\Models\Proveedor;
use App\Models\Area;

class EquiposController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $equipos = Equipo::all();
        
        $totalEquipos = Equipo::count();
        
        $disponibles = Equipo::where('estado', 'Disponible')->count();

        return view('equipos.index', compact('equipos','totalEquipos','disponibles'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $proveedores = Proveedor::all(['id_proveedor','nombre']);
        $areas = Area::all(['id_area','nombre']);
        return view('equipos.create', compact('proveedores','areas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $request->validate([
            'categoria' => 'required|max:100',
            'marca' => 'required|max:100',
            'modelo' => 'required|max:100',
            'activo_fijo' => 'required|numeric|unique:equipos,activo_fijo',
            'serial' => 'required|max:100|unique:equipos,serial',
            'estado' => 'required|max:50',
            'usuario_asignado' => 'nullable|max:100',
            'id_area' => 'required',
            'id_proveedor' => 'required'
        ]);

        Equipo::create($request->except('_token'));
        
        return redirect()->route('equipos.index')
        ->with('success', 'Equipo Registrado exitosamente.');

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
    public function edit(Equipo $equipo)
    {
       $proveedores = Proveedor::all(['id_proveedor', 'nombre']);
       $areas = Area::all(['id_area', 'nombre']);
       return view('equipos.edit',compact('equipo','proveedores','areas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Equipo $equipo)
    {
        $request->validate([
            'categoria' => 'required|max:100',
            'marca' => 'required|max:100',
            'modelo' => 'required|max:100',
            'serial' => 'required|max:100|unique:equipos,serial,' . $equipo->codigo . ',codigo',
            'activo_fijo' => 'required|numeric|unique:equipos,activo_fijo,' . $equipo->codigo . ',codigo',
            'estado' => 'required|max:50',
            'usuario_asignado' => 'nullable|max:100',
            'id_area' => 'required',
            'id_proveedor' => 'required'
        ]);

        $equipo->update($request->all());

        return redirect()->route('equipos.index')
        ->with('success', 'Equipo Actualizado Exitosamente.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Equipo $equipo)
    {
        $equipo->delete();

        return redirect()->route('equipos.index')
        ->with('success', 'Equipo Eliminado Exitosamente');
    }
}
