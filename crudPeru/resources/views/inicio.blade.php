@extends('plantilla')

@section('seccion')
<h1>Control administrativo</h1>
<div class=" d-none"> {{-- d-flex flex-row-reverse --}}
  <a href='{{route('nuevoEmpleado')}}' class="btn btn-secondary mb-3" role="button">Crear nuevo cliente</a>
</div>

<h3>Últimos clientes registrados:</h3>

@if(session('borrado'))
<div class="alert alert-danger">{{session('borrado')}}</div>
@endif
@if(session('mensaje'))
<div class="alert alert-success">{{session('mensaje')}}</div>
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
      <td>{{ $loop->index+1 /* $cliente->id */}}</td>
      <td>{{$cliente->dni}}</td>
      <td>{{ucfirst($cliente->apellidos)}}</td>
      <td>{{ucfirst($cliente->nombres)}}</td>
      {{-- <td><img src="subidas/{{$cliente->foto}}" alt=""></td> --}}
      <td>
        <button type="button" class="btn btn-outline-success" onclick="abrirModal({{$cliente->id}})" ><i class="icofont-id"></i> </button>
        <a class="btn btn-outline-primary d-inline" href='{{route('clientes.editar', $cliente)}}'><i class="icofont-edit"></i></a>
        <form class="d-inline" action="{{route('clientes.eliminar', $cliente)}}" method="POST">
          @csrf
          @method('DELETE')
          <button class="btn btn-outline-danger" type="submit"><i class="icofont-trash"></i></button>
        </form>
      </td>
    </tr>  
    @endforeach
  </tbody>
</table>



@endsection

@section('aparte')
<form action="nuevoClienteCurso" method="post">
    @csrf
  <!-- Modal -->
  <div class="modal fade" id="modalUnirCurso" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Asignación de curso</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p>
            Seleccione el curso que desea agregar al cliente
          </p>
          <select name="idCursos" class="form-control">
            @foreach($cursos as $curso)
            <option value="{{$curso->id}}">{{$curso->titulo}}</option>
            @endforeach
          </select>
          <input type="text" name="idCliente" class="d-none" id="txtIdCurso">
          <label for="">Fecha de emisión:</label>
          <input type="date" name="fechaInicio" id="fechaInicio" class="form-control">
          <label for="">Fecha de expiración:</label>
          <input type="date" name="fechaFin" id="fechaFin" class="form-control">
          <label for="">Código:</label>
          <input type="text" name="codigo" id="" class="form-control">
          
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-outline-primary"><i class="icofont-label"></i> Crear credencial</button>
        </div>
      </div>
    </div>
  </div>
  </form>
@endsection