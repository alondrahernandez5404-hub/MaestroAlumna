@extends('components.layouts.app_alumnos')

@section('content')
<div class="container">
    <h1>Detalles del Alumno</h1>

    <ul>
        <li><strong>ID:</strong> {{ $alumno->id }}</li>
        <li><strong>Código:</strong> {{ $alumno->codigo }}</li>
        <li><strong>Nombre:</strong> {{ $alumno->nombre }}</li>
        <li><strong>Correo:</strong> {{ $alumno->correo }}</li>
        <li><strong>Fecha de nacimiento:</strong> {{ $alumno->fecha_nacimiento }}</li>
        <li><strong>Sexo:</strong> {{ $alumno->sexo }}</li>
        <li><strong>Carrera:</strong> {{ $alumno->carrera }}</li>
    </ul>

    <a href="{{ route('alumnos.index') }}" class="btn btn-secondary">Volver</a>
</div>
@endsection
