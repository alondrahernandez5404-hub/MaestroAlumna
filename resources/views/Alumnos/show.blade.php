@extends('components.layouts.app_alumnos')

@section('content')
  <h1>Detalles del Alumno</h1>

  <p><strong>ID:</strong> {{ $alumno->id }}</p>
  <p><strong>Código:</strong> {{ $alumno->codigo }}</p>
  <p><strong>Nombre:</strong> {{ $alumno->nombre }}</p>
  <p><strong>Correo:</strong> {{ $alumno->correo }}</p>
  <p><strong>Fecha de Nacimiento:</strong> {{ $alumno->fecha_nacimiento }}</p>
  <p><strong>Sexo:</strong> {{ $alumno->sexo }}</p>
  <p><strong>Carrera:</strong> {{ $alumno->carrera }}</p>

  <a href="{{ route('alumnos.index') }}">Volver a la lista</a>
@endsection

