@extends('plantilla')

@section('seccion')
<h1>Control administrativo</h1>
<div class="d-flex flex-row-reverse">
  <a href='{{route('nuevoEmpleado')}}' class="btn btn-secondary mb-3" role="button">Crear nuevo cliente</a>
</div>

<h3>Últimos clientes registrados:</h3>

@if(session('borrado'))
<div class="alert alert-danger">{{session('borrado')}}</div>
@endif

<table class="table table-hover">
  <thead>
    <tr>
      <th>N°</th>
      <th>D.N.I.</th>
      <th>Apellidos</th>
      <th>Nombres</th>
      <th>Acciones</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($clientes as $cliente)
    <tr>
      <td>{{$cliente->id}}</td>
      <td>{{$cliente->dni}}</td>
      <td>{{$cliente->apellidos}}</td>
      <td>{{$cliente->nombres}}</td>
      
      <td>
        <a class="btn btn-outline-primary" href='{{route('clientes.editar', $cliente)}}'>Editar</a>
        <form action="{{route('clientes.eliminar', $cliente)}}" method="POST">
          @csrf
          @method('DELETE')
          <button class="btn btn-outline-danger" type="submit">Eliminar</button>
        </form>
      </td>
    </tr>  
    @endforeach
  </tbody>
</table>

@endsection