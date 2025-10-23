@extends('components.layouts.app_alumnos')

@section('content')
 <div class="card shadow">
  <div class="card-header bg-info text-white">
    <h2>Detalles del Alumno</h2>
  </div>
 <div class="card-body">
    <table class="table table-bordered">
      <tr>
        <th>ID:</th>
        <td>{{ $alumno->id }}</td>
      </tr>
      <tr>
        <th>Código:</th>
        <td>{{ $alumno->codigo }}</td>
      </tr>
      <tr>
        <th>Nombre:</th>
        <td>{{ $alumno->nombre }}</td>
      </tr>
      <tr>
        <th>Correo:</th>
        <td>{{ $alumno->correo }}</td>
      </tr>
      <tr>
        <th>Fecha de nacimiento:</th>
        <td>{{ $alumno->fecha_nacimiento }}</td>
      </tr>
      <tr>
        <th>Sexo:</th>
        <td>{{ $alumno->sexo }}</td>
      </tr>
      <tr>
        <th>Carrera:</th>
        <td>{{ $alumno->carrera }}</td>
      </tr>
    </table>

    <div class="text-end">
      <a href="{{ route('alumnos.index') }}" class="btn btn-secondary">Regresar</a>
      <a href="{{ route('alumnos.edit', $alumno->id) }}" class="btn btn-warning">Editar</a>
    </div>
  </div>
</div>
@endsection
