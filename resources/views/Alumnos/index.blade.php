@extends('components.layouts.app_alumnos')

@section('content')
<div class="card shadow mt-4">
  <div class="card-header bg-rose text-white d-flex justify-content-between align-items-center">
    <h2 class="mb-0">Lista de Alumnos</h2>
    <a href="{{ route('alumnos.create') }}" class="btn btn-rose">
      ➕ Agregar Alumno
    </a>
  </div>

  <div class="card-body">
    @if ($alumnos->count() > 0)
    <table class="table table-bordered table-hover align-middle">
      <thead>
        <tr>
          <th>ID</th>
          <th>Código</th>
          <th>Nombre</th>
          <th>Correo</th>
          <th>Acciones</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($alumnos as $alumno)
        <tr>
          <td>{{ $alumno->id }}</td>
          <td>{{ $alumno->codigo }}</td>
          <td>{{ $alumno->nombre }}</td>
          <td>{{ $alumno->correo }}</td>
          <td>
            <a href="{{ route('alumnos.show', $alumno->id) }}" class="btn btn-rose btn-sm">Ver</a>
            <a href="{{ route('alumnos.edit', $alumno->id) }}" class="btn btn-rose-dark btn-sm">Editar</a>

            <form action="{{ route('alumnos.destroy', $alumno->id) }}" method="POST" style="display:inline;">
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-outline-rose btn-sm">Eliminar</button>
            </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
    @else
      <p class="text-center text-muted">No hay alumnos registrados aún 🥹</p>
    @endif
  </div>
</div>
@endsection