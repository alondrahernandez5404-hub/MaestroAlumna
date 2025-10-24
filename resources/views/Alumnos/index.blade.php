@extends('components.layouts.app_alumnos')

@section('content')
<div class="card shadow">
  <div class="card-header d-flex justify-content-between align-items-center bg-pink-200">
    <h2 class="text-dark fw-bold">Lista de Alumnos</h2>
    <div>
      <a href="{{ route('alumnos.create') }}" class="btn btn-success me-2">+ Agregar Alumno</a>
      <form action="{{ route('alumnos.deleteMultiple') }}" method="POST" style="display:inline;" id="deleteForm">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">- Eliminar Alumno</button>
      </form>
    </div>
  </div>

  <div class="card-body">
    <form id="selectForm">
      <table class="table table-hover align-middle">
        <thead class="table-warning">
          <tr>
            <th><input type="checkbox" id="selectAll"></th>
            <th>No.</th>
            <th>Código</th>
            <th>Nombre</th>
            <th>Correo</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($alumnos as $alumno)
          <tr onclick="window.location='{{ route('alumnos.show', $alumno->id) }}'" style="cursor:pointer;">
            <td onclick="event.stopPropagation();">
              <input type="checkbox" name="ids[]" value="{{ $alumno->id }}">
            </td>
            <td>{{ $alumno->id }}</td>
            <td>{{ $alumno->codigo }}</td>
            <td>{{ $alumno->nombre }}</td>
            <td>{{ $alumno->correo }}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </form>
  </div>
</div>

<script>
  // ✅ "Seleccionar todo"
  document.getElementById('selectAll').addEventListener('change', function() {
    const checkboxes = document.querySelectorAll('input[name="ids[]"]');
    checkboxes.forEach(ch => ch.checked = this.checked);
  });

  // ✅ Confirmación al eliminar
  document.getElementById('deleteForm').addEventListener('submit', function(event) {
    if (!confirm('¿Seguro que deseas eliminar los alumnos seleccionados?')) {
      event.preventDefault();
    }
  });
</script>
@endsection
