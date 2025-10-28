@extends('components.layouts.app_alumnos')

@section('content')
<div class="container mt-4">

  <div class="d-flex justify-content-between align-items-center mb-3">
    <h2>Lista de Alumnos</h2>
    <div>
      <a href="{{ route('alumnos.create') }}" class="btn btn-success">+ Agregar Alumno</a>
      <form id="deleteForm" action="{{ route('alumnos.deleteMultiple') }}" method="POST" class="d-inline">
        @csrf
        @method('DELETE')
        <input type="hidden" name="ids" id="selectedIds">
        <button type="submit" class="btn btn-danger">- Eliminar Alumno</button>
      </form>
    </div>
  </div>

  <table class="table table-bordered table-hover">
    <thead class="table-dark">
      <tr>
        <th><input type="checkbox" id="selectAll"> Seleccionar todo</th>
        <th>No.</th>
        <th>Código</th>
        <th>Nombre</th>
        <th>Correo</th>
      </tr>
    </thead>
    <tbody>
      @foreach($alumnos as $alumno)
      <tr>
        <td><input type="checkbox" class="checkboxAlumno" value="{{ $alumno->id }}"></td>
        <td><a href="{{ route('alumnos.show', $alumno->id) }}">{{ $alumno->id }}</a></td>
        <td><a href="{{ route('alumnos.show', $alumno->id) }}">{{ $alumno->codigo }}</a></td>
        <td><a href="{{ route('alumnos.show', $alumno->id) }}">{{ $alumno->nombre }}</a></td>
        <td><a href="{{ route('alumnos.show', $alumno->id) }}">{{ $alumno->correo }}</a></td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>

<style>
  /* Checkboxes más pequeños y discretos */
  input[type="checkbox"] {
    width: 16px;
    height: 16px;
    margin: 0;
    vertical-align: middle;
    cursor: pointer;
  }

  /* Checkbox de seleccionar todo más discreto */
  #selectAll {
    transform: scale(0.8);
    margin-right: 5px;
  }
</style>

{{-- SweetAlert2 --}}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

{{-- Mensajes de éxito o error --}}
@if(session('success'))
<script>
  Swal.fire({
    icon: 'success',
    title: '¡Éxito!',
    text: "{{ session('success') }}",
    timer: 2500,
    timerProgressBar: true,
    showConfirmButton: false
  });
</script>
@endif

@if(session('error'))
<script>
  Swal.fire({
    icon: 'error',
    title: 'Oops...',
    text: "{{ session('error') }}",
    timer: 2500,
    timerProgressBar: true,
    showConfirmButton: false
  });
</script>
@endif

{{-- Seleccionar todo y eliminar múltiple con contraseña --}}
<script>
  const selectAll = document.getElementById('selectAll');
  const checkboxes = document.querySelectorAll('.checkboxAlumno');
  const deleteForm = document.getElementById('deleteForm');
  const selectedIdsInput = document.getElementById('selectedIds');

  // Seleccionar todo
  selectAll.addEventListener('change', function() {
    checkboxes.forEach(cb => cb.checked = selectAll.checked);
  });

  // Al intentar eliminar
  deleteForm.addEventListener('submit', function(e) {
    e.preventDefault();
    const selectedIds = Array.from(checkboxes)
      .filter(cb => cb.checked)
      .map(cb => cb.value);

    if (selectedIds.length === 0) {
      Swal.fire({
        icon: 'warning',
        title: 'Atención',
        text: 'Debes seleccionar al menos un alumno para eliminar',
      });
      return;
    }

    selectedIdsInput.value = selectedIds.join(',');

    // Paso 1: pedimos la contraseña
    Swal.fire({
      title: 'Confirmar acción',
      input: 'password',
      inputLabel: 'Ingresa la contraseña para continuar',
      inputPlaceholder: 'Contraseña...',
      inputAttributes: {
        autocapitalize: 'off',
        autocorrect: 'off'
      },
      showCancelButton: true,
      confirmButtonText: 'Verificar',
      cancelButtonText: 'Cancelar',
      inputValidator: (value) => {
        if (!value) {
          return 'Debes ingresar una contraseña';
        }
      }
    }).then((passwordResult) => {
      if (passwordResult.isConfirmed) {
        const password = passwordResult.value;

        // Paso 2: verificamos la contraseña
        if (password === '123') {
          // Paso 3: confirmación final antes de eliminar
          Swal.fire({
            title: '¿Seguro que deseas eliminar los alumnos seleccionados?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Sí, eliminar',
            cancelButtonText: 'Cancelar'
          }).then((result) => {
            if (result.isConfirmed) {
              deleteForm.submit();
            }
          });
        } else {
          // Contraseña incorrecta: redirigimos
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
