<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Equipo Perú Prevenir</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="{{ asset('icofont.min.css') }}">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-3">
  <a class="navbar-brand" href="{{route('index')}}">
    Equipo Perú Prevenir
  </a>
  <div class="collapse navbar-collapse">
    <ul class="navbar-nav">
        <li class="nav-item ">
          <a class="nav-link @if(Route::currentRouteName()=='index') active @endif" href="{{ route('index') }}">Inicio</span></a>
        </li>
        <li class="nav-item d-none">
          <a class="nav-link" href="{{ route('equipo') }}">Equipo</a>
        </li>
        <li class="nav-item @if(Route::currentRouteName()=='nuevoEmpleado') active @endif">
          <a href="{{route('nuevoEmpleado')}}" class="nav-link">Crear empleado</a>
        </li>
        <li class="nav-item @if(Route::currentRouteName()=='cursoCrear') active @endif">
          <a href="{{route('cursoCrear')}}" class="nav-link">Crear Curso</a>
        </li>
        <li class="nav-item ">
          <a href="{{route('logout')}}" class="nav-link">Salir</a>
        </li>
      </ul>
  </div>
</nav>
  <div class="container">
    @yield('seccion')
  </div>

@yield('aparte')

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="{{asset('js/anatsunamun.js')}}"></script>
</body>
</html>