@extends('components.layouts.app_alumnos')

@section('content')
<div class="container mt-4">
  <div class="card shadow">
    <div class="card-header bg-info text-white">
      <h2>Detalles del Alumno</h2>
    </div>

    <div class="card-body">
      <p><strong>No.:</strong> {{ $alumno->id }}</p>
      <p><strong>Código:</strong> {{ $alumno->codigo }}</p>
      <p><strong>Nombre:</strong> {{ $alumno->nombre }}</p>
      <p><strong>Correo:</strong> {{ $alumno->correo }}</p>
      <p><strong>Fecha de nacimiento:</strong> {{ $alumno->fecha_nacimiento }}</p>
      <p><strong>Sexo:</strong> {{ $alumno->sexo }}</p>
      <p><strong>Carrera:</strong> {{ $alumno->carrera }}</p>
    </div>

    <div class="card-footer text-end">
      <a href="{{ route('alumnos.index') }}" class="btn btn-secondary">Regresar</a>
      <button id="btnEditar" class="btn btn-warning text-dark">Editar Alumno</button>
    </div>
  </div>
</div>

{{-- SweetAlert2 --}}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
  document.getElementById('btnEditar').addEventListener('click', function () {
    Swal.fire({
      title: 'Verificación requerida',
      input: 'password',
      inputLabel: 'Introduce la contraseña para editar',
      inputPlaceholder: 'Contraseña...',
      showCancelButton: true,
      confirmButtonText: 'Verificar',
      cancelButtonText: 'Cancelar',
      inputValidator: (value) => {
        if (!value) {
          return 'Debes ingresar una contraseña';
        }
      }
    }).then((result) => {
      if (result.isConfirmed) {
        const password = result.value;

        if (password === '123') {
          //  Redirige al formulario de edición
          window.location.href = "{{ route('alumnos.edit', $alumno->id) }}";
        } else {
          //  Contraseña incorrecta
          Swal.fire({
            icon: 'error',
            title: 'Contraseña incorrecta',
            text: 'Has sido redirigido a la lista de alumnos.',
            confirmButtonText: 'Aceptar'
          }).then(() => {
            window.location.href = "{{ route('alumnos.index') }}";
          });
        }
      }
    });
  });
</script>
@endsection
