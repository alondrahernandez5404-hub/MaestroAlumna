@extends('components.layouts.app_alumnos')

@section('content')
<div class="card shadow">
  <div class="card-header bg-pink-500 text-white d-flex justify-content-between align-items-center">
    <h2>Lista de Alumnos</h2>

    <div>
      <a href="{{ route('alumnos.create') }}" class="btn btn-success me-2">+ Agregar Alumno</a>

      {{-- Botón eliminar múltiple --}}
      <form id="deleteForm" action="{{ route('alumnos.deleteMultiple') }}" method="POST" class="d-inline">
        @csrf
        @method('DELETE')
        <input type="hidden" name="ids" id="selectedIds">
        <button type="submit" id="deleteSelectedBtn" class="btn btn-danger" disabled>- Eliminar Alumno</button>
      </form>
    </div>
  </div>

  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-striped align-middle">
        <thead>
          <tr>
            <th><input type="checkbox" id="selectAll"></th>
            <th>No.</th>
            <th>Código</th>
            <th>Nombre</th>
            <th>Correo</th>
          </tr>
        </thead>

        <tbody>
          @foreach($alumnos as $alumno)
          <tr>
            <td><input type="checkbox" class="alumno-checkbox" value="{{ $alumno->id }}"></td>
            <td>
              <a href="{{ route('alumnos.show', $alumno->id) }}" class="text-decoration-none text-dark">
                {{ $alumno->id }}
              </a>
            </td>
            <td>
              <a href="{{ route('alumnos.show', $alumno->id) }}" class="text-decoration-none text-dark">
                {{ $alumno->codigo }}
              </a>
            </td>
            <td>
              <a href="{{ route('alumnos.show', $alumno->id) }}" class="text-decoration-none text-dark">
                {{ $alumno->nombre }}
              </a>
            </td>
            <td>
              <a href="{{ route('alumnos.show', $alumno->id) }}" class="text-decoration-none text-dark">
                {{ $alumno->correo }}
              </a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>

{{-- Script para habilitar/deshabilitar el botón --}}
<script>
  const selectAll = document.getElementById('selectAll');
  const checkboxes = document.querySelectorAll('.alumno-checkbox');
  const deleteBtn = document.getElementById('deleteSelectedBtn');
  const selectedIdsInput = document.getElementById('selectedIds');

  selectAll.addEventListener('change', () => {
    checkboxes.forEach(cb => cb.checked = selectAll.checked);
    toggleDeleteButton();
  });

  checkboxes.forEach(cb => {
    cb.addEventListener('change', toggleDeleteButton);
  });

  function toggleDeleteButton() {
    const selected = Array.from(checkboxes).filter(cb => cb.checked).map(cb => cb.value);
    deleteBtn.disabled = selected.length === 0;
    selectedIdsInput.value = selected.join(',');
  }
</script>
@endsection
