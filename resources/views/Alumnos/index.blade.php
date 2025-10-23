@extends('components.layouts.app_alumnos')

@section('content')
  <h1>Lista de Alumnos</h1>

  <a href="{{ route('alumnos.create') }}" class="btn">Agregar Alumno</a>

  <table style="width:100%; border-collapse: collapse; margin-top: 20px;">
    <thead>
      <tr style="background-color: #007bff; color: #fff;">
        <th style="padding: 8px; border: 1px solid #ddd;">ID</th>
        <th style="padding: 8px; border: 1px solid #ddd;">Código</th>
        <th style="padding: 8px; border: 1px solid #ddd;">Nombre</th>
        <th style="padding: 8px; border: 1px solid #ddd;">Correo</th>
        <th style="padding: 8px; border: 1px solid #ddd;">Acciones</th>
      </tr>
    </thead>
    <tbody>
      @foreach($alumnos as $alumno)
      <tr>
        <td style="padding: 8px; border: 1px solid #ddd;">{{ $alumno->id }}</td>
        <td style="padding: 8px; border: 1px solid #ddd;">{{ $alumno->codigo }}</td>
        <td style="padding: 8px; border: 1px solid #ddd;">{{ $alumno->nombre }}</td>
        <td style="padding: 8px; border: 1px solid #ddd;">{{ $alumno->correo }}</td>
        <td style="padding: 8px; border: 1px solid #ddd;">
          <a href="{{ route('alumnos.show', $alumno->id) }}" class="btn">Ver</a>
          <a href="{{ route('alumnos.edit', $alumno->id) }}" class="btn">Editar</a>
          <form action="{{ route('alumnos.destroy', $alumno->id) }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn" style="background-color: red;">Eliminar</button>
          </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
@endsection

