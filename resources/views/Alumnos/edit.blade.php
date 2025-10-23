@extends('components.layouts.app_alumnos')

@section('content')
<div class="container">
    <h1>Editar Alumno</h1>

    <form action="{{ route('alumnos.update', $alumno->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label>Código:</label>
            <input type="text" name="codigo" value="{{ $alumno->codigo }}" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Nombre:</label>
            <input type="text" name="nombre" value="{{ $alumno->nombre }}" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Correo:</label>
            <input type="email" name="correo" value="{{ $alumno->correo }}" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Fecha de nacimiento:</label>
            <input type="date" name="fecha_nacimiento" value="{{ $alumno->fecha_nacimiento }}" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Sexo:</label>
            <select name="sexo" class="form-control" required>
                <option value="M" {{ $alumno->sexo == 'M' ? 'selected' : '' }}>Masculino</option>
                <option value="F" {{ $alumno->sexo == 'F' ? 'selected' : '' }}>Femenino</option>
            </select>
        </div>
        <div class="mb-3">
            <label>Carrera:</label>
            <input type="text" name="carrera" value="{{ $alumno->carrera }}" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-success">Actualizar</button>
        <a href="{{ route('alumnos.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
