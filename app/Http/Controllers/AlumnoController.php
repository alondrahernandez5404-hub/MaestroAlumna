<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use Illuminate\Http\Request;

class AlumnoController extends Controller
{
    public function index()
    {
        $alumnos = Alumno::all();
        return view('alumnos.index', compact('alumnos'));
    }

    public function create()
    {
        return view('alumnos.create');
    }

    public function store(Request $request)
{
    $request->validate([
        'codigo' => 'required|max:10|unique:alumnos,codigo',
        'nombre' => 'required|string|max:100',
        'correo' => 'required|email|unique:alumnos,correo',
        'fecha_nacimiento' => 'nullable|date',
        'sexo' => 'nullable|in:Femenino,Masculino',
        'carrera' => 'nullable|string|max:100',
    ]);
    $request->validate([
    'codigo' => 'required',
    'nombre' => 'required',
    'correo' => 'required|email',
    'fecha_nacimiento' => 'required|date|before_or_equal:' . now()->subYears(4)->toDateString(),
]);


    Alumno::create($request->all());

    return redirect()->route('alumnos.index')->with('success', 'Alumno agregado correctamente.');
}


    public function show(Alumno $alumno)
    {
        return view('alumnos.show', compact('alumno'));
    }

    public function edit(Alumno $alumno)
    {
        return view('alumnos.edit', compact('alumno'));
    }

    public function update(Request $request, Alumno $alumno)
{
    $request->validate([
        'codigo' => 'required|max:10|unique:alumnos,codigo,' . $alumno->id,
        'nombre' => 'required|string|max:100',
        'correo' => 'required|email|unique:alumnos,correo,' . $alumno->id,
        'fecha_nacimiento' => 'nullable|date',
        'sexo' => 'nullable|in:Femenino,Masculino',
        'carrera' => 'nullable|string|max:100',
    ]);

    $alumno->update($request->all());

    return redirect()->route('alumnos.index')->with('success', 'Alumno actualizado correctamente.');
}

    public function destroy(Alumno $alumno)
    {
        $alumno->delete();
        return redirect()->route('alumnos.index')->with('success', 'Alumno eliminado correctamente');
    }

   public function deleteMultiple(Request $request)
{
    $ids = $request->ids;

    if (!$ids) {
        return redirect()->route('alumnos.index')->with('error', 'No seleccionaste ningún alumno.');
    }

    if (is_string($ids)) {
        $ids = explode(',', $ids);
    }

    Alumno::whereIn('id', $ids)->delete();


    return redirect()->route('alumnos.index')->with('success', 'Alumno(s) eliminado(s) correctamente.');
}

}