@extends('components.layouts.app_alumnos')

@section('content')
  <h1>Editar Alumno</h1>

  @if ($errors->any())
    <div style="color:red; margin-bottom: 15px;">
      <ul>
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  <form action="{{ route('alumnos.update', $alumno->id) }}" method="POST">
    @csrf
    @method('PUT')
    <p>
      <label>Código:</label><br>
      <input type="text" name="codigo" value="{{ old('codigo', $alumno->codigo) }}">
    </p>
    <p>
      <label>Nombre:</label><br>
      <input type="text" name="nombre" value="{{ old('nombre', $alumno->nombre) }}">
    </p>
    <p>
      <label>Correo:</label><br>
      <input type="email" name="correo" value="{{ old('correo', $alumno->correo) }}">
    </p>
    <p>
      <label>Fecha de Nacimiento:</label><br>
      <input type="date" name="fecha_nacimiento" value="{{ old('fecha_nacimiento', $alumno->fecha_nacimiento) }}">
    </p>
    <p>
      <label>Sexo:</label><br>
      <select name="sexo">
        <option value="M" {{ $alumno->sexo=='M' ? 'selected' : '' }}>Masculino</option>
        <option value="F" {{ $alumno->sexo=='F' ? 'selected' : '' }}>Femenino</option>
      </select>
    </p>
    <p>
      <label>Carrera:</label><br>
      <input type="text" name="carrera" value="{{ old('carrera', $alumno->carrera) }}">
    </p>
    <button type="submit" class="btn">Actualizar</button>
    <a href="{{ route('alumnos.index') }}" class="btn" style="background-color: gray;">Cancelar</a>
  </form>
@endsection

