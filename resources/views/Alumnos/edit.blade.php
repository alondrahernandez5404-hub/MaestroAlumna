@extends('components.layouts.app_alumnos')

@section('content')
<div class="card shadow">
  <div class="card-header bg-warning text-dark">
    <h2>Editar Alumno</h2>
  </div>

  <div class="card-body">
    <form action="{{ route('alumnos.update', $alumno->id) }}" method="POST">
      @csrf
      @method('PUT')

      <div class="mb-3">
        <label class="form-label">Código</label>
        <input type="text" name="codigo" class="form-control" value="{{ $alumno->codigo }}" required>
        @error('campo') 
  <div class="text-danger small">{{ $message }}</div> 
@enderror

      </div>

      <div class="mb-3">
        <label class="form-label">Nombre</label>
        <input type="text" name="nombre" class="form-control" value="{{ $alumno->nombre }}" required>
        @error('campo') 
  <div class="text-danger small">{{ $message }}</div> 
@enderror

      </div>

      <div class="mb-3">
        <label class="form-label">Correo</label>
        <input type="email" name="correo" class="form-control" value="{{ $alumno->correo }}" required>
        @error('campo') 
  <div class="text-danger small">{{ $message }}</div> 
@enderror

      </div>

      <div class="mb-3">
        <label class="form-label">Fecha de nacimiento</label>
        <input type="date" name="fecha_nacimiento" class="form-control" value="{{ $alumno->fecha_nacimiento }}">
        @error('campo') 
  <div class="text-danger small">{{ $message }}</div> 
@enderror

      </div>

      <div class="mb-3">
        <label class="form-label">Sexo</label>
        <select name="sexo" class="form-select">
          <option value="">Seleccione...</option>
          <option value="Femenino" {{ $alumno->sexo == 'Femenino' ? 'selected' : '' }}>Femenino</option>
          <option value="Masculino" {{ $alumno->sexo == 'Masculino' ? 'selected' : '' }}>Masculino</option>
        </select>
      </div>

      <div class="mb-3">
        <label class="form-label">Carrera</label>
        <input type="text" name="carrera" class="form-control" value="{{ $alumno->carrera }}">
        @error('campo') 
  <div class="text-danger small">{{ $message }}</div> 
@enderror

      </div>

      <div class="text-end">
        <a href="{{ route('alumnos.index') }}" class="btn btn-secondary">Cancelar</a>
        <button type="submit" class="btn btn-primary">Actualizar</button>
      </div>
    </form>
  </div>
</div>
@endsection