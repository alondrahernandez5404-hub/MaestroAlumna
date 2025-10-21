<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AlumnoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         $alumnos = \App\Models\Alumno::all();
    return view('alumnos.index', compact('alumnos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
         return view('alumnos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
        'codigo' => 'required',
        'nombre' => 'required',
        'correo' => 'required|email|unique:alumnos,correo',
        'fecha_nacimiento' => 'required|date',
        'sexo' => 'required|in:M,F',
        'carrera' => 'required',
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
         return view('alumnos.show', compact('alumno'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('alumnos.edit', compact('alumno'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
         $request->validate([
        'codigo' => 'required',
        'nombre' => 'required',
        'correo' => 'required|email|unique:alumnos,correo,' . $alumno->id,
        'fecha_nacimiento' => 'required|date',
        'sexo' => 'required|in:M,F',
        'carrera' => 'required',
    ]);

    $alumno->update($request->all());

    return redirect()->route('alumnos.index')->with('success', 'Alumno actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
         $alumno->delete();
    return redirect()->route('alumnos.index')->with('success', 'Alumno eliminado correctamente');
    }
}
