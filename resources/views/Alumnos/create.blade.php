@extends('components.layouts.app_alumnos')

@section('content')
<div class="card shadow">
  <div class="card-header bg-primary text-white">
    <h2>Agregar Alumno</h2>
  </div>

  <div class="card-body">
    <form action="{{ route('alumnos.store') }}" method="POST">
      @csrf

      <div class="mb-3">
        <label class="form-label">Código</label>
        <input type="text" name="codigo" class="form-control" required>
      </div>

      <div class="mb-3">
        <label class="form-label">Nombre</label>
        <input type="text" name="nombre" class="form-control" required>
      </div>

      <div class="mb-3">
        <label class="form-label">Correo</label>
        <input type="email" name="correo" class="form-control" required>
      </div>

      <div class="mb-3">
        <label class="form-label">Fecha de nacimiento</label>
        <input type="date" name="fecha_nacimiento" class="form-control">
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
        <input type="text" name="carrera" class="form-control">
      </div>

      <div class="text-end">
        <a href="{{ route('alumnos.index') }}" class="btn btn-secondary">Cancelar</a>
        <button type="submit" class="btn btn-success">Guardar</button>
      </div>
    </form>
  </div>
</div>
@endsection