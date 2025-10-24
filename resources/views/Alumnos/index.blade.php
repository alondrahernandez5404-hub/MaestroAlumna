@extends('components.layouts.app_alumnos')

@if (session('success'))
  <div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
@endif

@section('content')
<div class="card">
  <div class="card-header">
    <h2>Lista de Alumnos</h2>
  </div>
  <div class="card-body">
    <a href="{{ route('alumnos.create') }}" class="btn btn-primary mb-3">Agregar Alumno</a>
    <table class="table table-striped table-bordered">
      <thead class="table-dark">
        <tr>
          <th>ID</th>
          <th>Código</th>
          <th>Nombre</th>
          <th>Correo</th>
          <th>Fecha Nac.</th>
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
            <a href="{{ route('alumnos.show', $alumno->id) }}" class="btn btn-info btn-sm">Ver</a>
            <a href="{{ route('alumnos.edit', $alumno->id) }}" class="btn btn-warning btn-sm">Editar</a>
            <form action="{{ route('alumnos.destroy', $alumno->id) }}" method="POST" class="d-inline">
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Eliminar alumno?')">Eliminar</button>
            </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
@endsection


