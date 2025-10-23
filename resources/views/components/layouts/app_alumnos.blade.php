<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>Mi-Alumnos</title>
</head>
<body>
  <div class="container">
    @if(session('success'))
      <div style="color:green">{{ session('success') }}</div>
    @endif
<nav>
    <a href="{{ route('alumnos.index') }}">Alumnos</a>
</nav>

    @yield('content')
  </div>
</body>
</html>
