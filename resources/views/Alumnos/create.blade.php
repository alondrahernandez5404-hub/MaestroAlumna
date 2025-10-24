@extends('components.layouts.app_alumnos')

@section('content')
<div class="card shadow mt-4">
  <div class="card-header bg-rose text-white">
    <h2>Agregar Alumno </h2>
  </div>

  <div class="card-body">
    <form action="{{ route('alumnos.store') }}" method="POST">
      @csrf

      <div class="mb-3">
        <label class="form-label">Código</label>
        <input type="text" name="codigo" class="form-control" placeholder="Ejemplo: A1234" required>
      </div>

      <div class="mb-3">
        <label class="form-label">Nombre</label>
        <input type="text" name="nombre" class="form-control" placeholder="Ejemplo: Alondra Hernández" required>
      </div>

      <div class="mb-3">
        <label class="form-label">Correo</label>
        <input type="email" name="correo" class="form-control" placeholder="Ejemplo: alondra@email.com" required>
      </div>

      <div class="mb-3">
        <label class="form-label">Fecha de Nacimiento</label>
        <input 
        type="date" 
        name="fecha_nacimiento" 
        class="form-control" 
        max="{{ date('Y-m-d', strtotime('-4 years')) }}"
        required
>

      </div>

      <div class="mb-3">
        <label class="form-label">Sexo</label>
        <select name="sexo" class="form-select">
          <option value="">Seleccione...</option>
          <option value="Femenino">Femenino</option>
          <option value="Masculino">Masculino</option>
        </select>
      </div>

      <div class="mb-3">
        <label class="form-label">Carrera</label>
        <input type="text" name="carrera" class="form-control" placeholder="Ejemplo: Ingeniería en Sistemas">
      </div>

      <div class="text-end">
        <a href="{{ route('alumnos.index') }}" class="btn btn-secondary">Cancelar</a>
        <button type="submit" class="btn btn-rose">Guardar 💾</button>
      </div>
    </form>
  </div>
</div>
@endsection
