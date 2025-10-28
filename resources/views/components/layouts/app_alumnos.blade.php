<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>CRUD-ALUMNOS</title>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Bootstrap JS Bundle (opcional, para componentes como modales) -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</head>

<link rel="stylesheet" href="{{ asset('css/app.css') }}">

<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
    <div class="container">
      <a class="navbar-brand" href="{{ route('alumnos.index') }}">CRUD-ALUMNOS</a>
      <div class="collapse navbar-collapse">
      <ul class="navbar-nav ms-auto">
  <li class="nav-item">
    <a class="nav-link" href="{{ route('alumnos.index') }}">Lista de Alumnos</a>
  </li>
</ul>

      </div>
    </div>
  </nav>

  <div class="container">
    @if(session('success'))
      <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @yield('content')
  </div>
</body>

</html>
