@extends('components.layouts.app_alumnos')

@section('content')
<div class="container">
    <h1>Agregar Alumno</h1>

    <form action="{{ route('alumnos.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Código:</label>
            <input type="text" name="codigo" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Nombre:</label>
            <input type="text" name="nombre" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Correo:</label>
            <input type="email" name="correo" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Fecha de nacimiento:</label>
            <input type="date" name="fecha_nacimiento" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Sexo:</label>
            <select name="sexo" class="form-control" required>
                <option value="M">Masculino</option>
                <option value="F">Femenino</option>
            </select>
        </div>
        <div class="mb-3">
            <label>Carrera:</label>
            <input type="text" name="carrera" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-success">Guardar</button>
        <a href="{{ route('alumnos.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
