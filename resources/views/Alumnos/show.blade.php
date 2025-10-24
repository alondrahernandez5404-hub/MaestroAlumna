@extends('components.layouts.app_alumnos')

@section('content')
<div class="card shadow-lg border-0">
  <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
    <h2 class="mb-0">Detalles del Alumno</h2>
    <a href="{{ route('alumnos.index') }}" class="btn btn-light btn-sm">← Volver</a>
  </div>

  <div class="card-body bg-light">
    <table class="table table-bordered table-hover bg-white rounded">
      <tbody>
        <tr>
          <th class="bg-secondary text-white" style="width: 200px;">Código</th>
          <td>{{ $alumno->codigo }}</td>
        </tr>
        <tr>
          <th class="bg-secondary text-white">Nombre</th>
          <td>{{ $alumno->nombre }}</td>
        </tr>
        <tr>
          <th class="bg-secondary text-white">Correo</th>
          <td>{{ $alumno->correo }}</td>
        </tr>
        <tr>
          <th class="bg-secondary text-white">Fecha de nacimiento</th>
          <td>{{ $alumno->fecha_nacimiento ?? 'No especificada' }}</td>
        </tr>
        <tr>
          <th class="bg-secondary text-white">Sexo</th>
          <td>{{ $alumno->sexo ?? 'No especificado' }}</td>
        </tr>
        <tr>
          <th class="bg-secondary text-white">Carrera</th>
          <td>{{ $alumno->carrera ?? 'No especificada' }}</td>
        </tr>
      </tbody>
    </table>

    <div class="text-end mt-4">
      <a href="{{ route('alumnos.edit', $alumno->id) }}" class="btn btn-warning">
        ✏️ Editar Alumno
      </a>
    </div>
  </div>
</div>
@endsection

