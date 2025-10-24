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
  
  input[type="checkbox"] {
    width: 16px;
    height: 16px;
    margin: 0;
    vertical-align: middle;
    cursor: pointer;
  }

  #selectAll {
    transform: scale(0.8);
    margin-right: 5px;
  }
</style>

{{-- SweetAlert2 --}}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

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

{{-- Seleccionar todo y eliminar múltiple --}}
<script>
  const selectAll = document.getElementById('selectAll');
  const checkboxes = document.querySelectorAll('.checkboxAlumno');
  const deleteForm = document.getElementById('deleteForm');
  const selectedIdsInput = document.getElementById('selectedIds');

  selectAll.addEventListener('change', function() {
    checkboxes.forEach(cb => cb.checked = selectAll.checked);
  });

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
        this.submit();
      }
    });
  });
</script>
@endsection
