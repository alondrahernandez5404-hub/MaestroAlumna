@extends('components.layouts.app_alumnos')

@section('content')
<div class="container">
    <h1>Alumnos</h1>
    <a href="{{ route('alumnos.create') }}" class="btn btn-primary">Agregar Alumno</a>
    
    <table class="table mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Código</th>
                <th>Nombre</th>
                <th>Correo</th>
                <th>Fecha Nacimiento</th>
                <th>Sexo</th>
                <th>Carrera</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($alumnos as $alumno)
            <tr>
                <td>{{ $alumno->id }}</td>
                <td>{{ $alumno->codigo }}</td>
                <td>{{ $alumno->nombre }}</td>
                <td>{{ $alumno->correo }}</td>
                <td>{{ $alumno->fecha_nacimiento }}</td>
                <td>{{ $alumno->sexo }}</td>
                <td>{{ $alumno->carrera }}</td>
                <td>
                    <a href="{{ route('alumnos.edit', $alumno->id) }}" class="btn btn-sm btn-warning">Editar</a>
                    <form action="{{ route('alumnos.destroy', $alumno->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
