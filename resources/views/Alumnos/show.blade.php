@extends('components.layouts.app_alumnos')

@section('content')
<div class="card shadow mt-4">
  <div class="card-header bg-rose text-white">
    <h2>Detalles del Alumno</h2>
  </div>

  <div class="card-body">
    <p><strong>Código:</strong> {{ $alumno->codigo }}</p>
    <p><strong>Nombre:</strong> {{ $alumno->nombre }}</p>
    <p><strong>Correo:</strong> {{ $alumno->correo }}</p>
    <p><strong>Fecha de Nacimiento:</strong> {{ $alumno->fecha_nacimiento }}</p>
    <p><strong>Sexo:</strong> {{ $alumno->sexo }}</p>
    <p><strong>Carrera:</strong> {{ $alumno->carrera }}</p>

    <div class="text-end mt-4">
      <a href="{{ route('alumnos.index') }}" class="btn btn-secondary">⬅ Volver</a>
      <a href="{{ route('alumnos.edit', $alumno->id) }}" class="btn btn-rose-dark">Editar 💫</a>
    </div>
  </div>
</div>
@endsection