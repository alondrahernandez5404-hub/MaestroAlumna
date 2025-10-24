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

      {{-- CÓDIGO --}}
      <div class="mb-3">
        <label class="form-label">Código</label>
        <input type="text" name="codigo" class="form-control" 
               value="{{ old('codigo', $alumno->codigo) }}" required>
        @error('codigo') 
          <div class="text-danger small">{{ $message }}</div> 
        @enderror
      </div>

      {{-- NOMBRE --}}
      <div class="mb-3">
        <label class="form-label">Nombre</label>
        <input type="text" name="nombre" class="form-control" 
               value="{{ old('nombre', $alumno->nombre) }}" required>
        @error('nombre') 
          <div class="text-danger small">{{ $message }}</div> 
        @enderror
      </div>

      {{-- CORREO --}}
      <div class="mb-3">
        <label class="form-label">Correo</label>
        <input type="email" name="correo" class="form-control" 
               value="{{ old('correo', $alumno->correo) }}" required>
        @error('correo') 
          <div class="text-danger small">{{ $message }}</div> 
        @enderror
      </div>

      {{-- FECHA NACIMIENTO --}}
      <div class="mb-3">
        <label class="form-label">Fecha de nacimiento</label>
        <input type="date" name="fecha_nacimiento" class="form-control" 
               value="{{ old('fecha_nacimiento', $alumno->fecha_nacimiento) }}">
        @error('fecha_nacimiento') 
          <div class="text-danger small">{{ $message }}</div> 
        @enderror
      </div>

      {{-- SEXO --}}
      <div class="mb-3">
        <label class="form-label">Sexo</label>
        <select name="sexo" class="form-select">
          <option value="">Seleccione...</option>
          <option value="Femenino" {{ old('sexo', $alumno->sexo) == 'Femenino' ? 'selected' : '' }}>Femenino</option>
          <option value="Masculino" {{ old('sexo', $alumno->sexo) == 'Masculino' ? 'selected' : '' }}>Masculino</option>
        </select>
        @error('sexo') 
          <div class="text-danger small">{{ $message }}</div> 
        @enderror
      </div>

      {{-- CARRERA --}}
      <div class="mb-3">
        <label class="form-label">Carrera</label>
        <input type="text" name="carrera" class="form-control" 
               value="{{ old('carrera', $alumno->carrera) }}">
        @error('carrera') 
          <div class="text-danger small">{{ $message }}</div> 
        @enderror
      </div>

      {{-- BOTONES --}}
      <div class="text-end">
        <a href="{{ route('alumnos.index') }}" class="btn btn-secondary">Cancelar</a>
        <button type="submit" class="btn btn-primary">Actualizar</button>
      </div>
    </form>
  </div>
</div>
@endsection
