@extends('components.layouts.app_alumnos')

@section('content')
<div class="card shadow">
  <div class="card-header bg-light-pink text-dark">
    <h2>Detalles del Alumno</h2>
  </div>

  <div class="card-body">
    <p><strong>Código:</strong> {{ $alumno->codigo }}</p>
    <p><strong>Nombre:</strong> {{ $alumno->nombre }}</p>
    <p><strong>Correo:</strong> {{ $alumno->correo }}</p>
    <p><strong>Fecha de Nacimiento:</strong> {{ $alumno->fecha_nacimiento }}</p>
    <p><strong>Sexo:</strong> {{ $alumno->sexo }}</p>
    <p><strong>Carrera:</strong> {{ $alumno->carrera }}</p>

    <hr>

    <div class="d-flex justify-content-between">
      <a href="{{ route('alumnos.index') }}" class="btn btn-secondary">Volver</a>
      <button class="btn btn-primary" onclick="pedirContrasena()">Editar</button>
    </div>
  </div>
</div>

<script>
function pedirContrasena() {
  const pass = prompt("Introduce la contraseña para editar:");
  if (pass === "123") {
    window.location.href = "{{ route('alumnos.edit', $alumno->id) }}";
  } else if (pass !== null) {
    alert("Contraseña incorrecta. Serás redirigido al inicio.");
    window.location.href = "{{ route('alumnos.index') }}";
  }
}
</script>
@endsection
