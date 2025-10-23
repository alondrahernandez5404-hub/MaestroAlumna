@extends('components.layouts.app_alumnos')

@section('content')
  <h1>Agregar Alumno</h1>

  @if ($errors->any())
    <div style="color:red; margin-bottom: 15px;">
      <ul>
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  <form action="{{ route('alumnos.store') }}" method="POST">
    @csrf
    <p>
      <label>Código:</label><br>
      <input type="text" name="codigo" value="{{ old('codigo') }}">
    </p>
    <p>
      <label>Nombre:</label><br>
      <input type="text" name="nombre" value="{{ old('nombre') }}">
    </p>
    <p>
      <label>Correo:</label><br>
      <input type="email" name="correo" value="{{ old('correo') }}">
    </p>
    <p>
      <label>Fecha de Nacimiento:</label><br>
      <input type="date" name="fecha_nacimiento" value="{{ old('fecha_nacimiento') }}">
    </p>
    <p>
      <label>Sexo:</label><br>
      <select name="sexo">
        <option value="M" {{ old('sexo')=='M' ? 'selected' : '' }}>Masculino</option>
        <option value="F" {{ old('sexo')=='F' ? 'selected' : '' }}>Femenino</option>
      </select>
    </p>
    <p>
      <label>Carrera:</label><br>
      <input type="text" name="carrera" value="{{ old('carrera') }}">
    </p>
    <button type="submit" class="btn">Guardar</button>
    <a href="{{ route('alumnos.index') }}" class="btn" style="background-color: gray;">Cancelar</a>
  </form>
@endsection

