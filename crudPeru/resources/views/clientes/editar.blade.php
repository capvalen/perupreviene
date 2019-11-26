@extends('plantilla')

@section('seccion')
<style>
.custom-file-input ~ .custom-file-label::after {
    content: "Buscar archivo";
}
</style>

<h1>Editar el cliente </h1>

@if (session('mensaje'))
<div class="alert alert-success">{{session('mensaje')}} puedes <a href="{{route('index')}}">volver aquí</a> para visualizarlo</div>
@endif

<form action="{{route('clientes.actualizar', $cliente->id)}}" method="POST">
  @method('PUT')
    @csrf
    <div class="form-row">
      <div class="input-group">
        <input class="form-control my-2 @error('dni') is-invalid @enderror" type="text" name="dni" placeholder="D.N.I.." value='{{old( 'dni', $cliente->dni)}}' autocomplete="off">
        @error('dni')
        <div class="invalid-feedback"> {{ $message }} </div>
        @enderror
      </div>
      <input class="form-control my-2 @error('apellidos') is-invalid @enderror" type="text" name="apellidos" placeholder="Apellidos y Nombres" value='{{old('apellidos', $cliente->apellidos)}}' autocomplete="off">
      @error('apellidos')
        <div class="invalid-feedback"> {{ $message }} </div>
        @enderror
      <input class="form-control my-2 @error('nombres') is-invalid @enderror" type="text" name="nombres" placeholder="Nombres" value='{{ old( 'nombres' , $cliente->nombres) }}' autocomplete="off">
      @error('nombres')
        <div class="invalid-feedback"> {{ $message }} </div>
        @enderror
    </div>

    

    <button class="btn btn-outline-warning  my-2" type="submit"><i class="icofont-save"></i> Actualizar datos</button>

@if (session('borrado'))
<div class="alert alert-success">{{session('borrado')}} </div>
@endif

</form>
@if($cliente->foto!='')
  <form action="{{route('eliminarFoto', $cliente->id)}}" method="post">
    @csrf
      <div class="media">
        <img src="{{url('subidas/'.$cliente->foto)}}" class="mr-3" height="150px">
        <div class="media-body">
          <h5 class="mt-0">Foto del empleado</h5>
          <button type="submit" class="btn btn-outline-danger"><i class="icofont-close"></i> Eliminar foto</button>
        </div>
      </div>
  </form>
@else
@if (session('fotoSubida'))
<div class="alert alert-success">{{session('fotoSubida')}} </div>
@endif
  <form action="{{route('nuevaFoto', $cliente->id)}}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="input-group">
      <div class="custom-file">
        <input type="file" class="custom-file-input" id="inputGroupFile04" name="foto" aria-describedby="inputGroupFileAddon04">
        <label class="custom-file-label" for="inputGroupFile04">Escoger</label>
      </div>
      <div class="input-group-append">
        <button class="btn btn-outline-secondary" type="submit" id="inputGroupFileAddon04">Subir</button>
      </div>
    </div>
  </form>
  @endif
<h3 class="my-3">Cursos asignados:</h3>
<table class="table table-hover">
  <thead class="">
    <tr>
      <th>#</th>
      <th>Curso</th>
      <th>Emisión</th>
      <th>Vencimiento</th>
      <th>Código</th>
      <th>@</th>
    </tr>
  </thead>
  <tbody>
    @if(count($cursos)>0)
    @foreach ($cursos as $curso)
    <tr>
      <td>{{$loop->index+1}}</td>
      <td><a href="{{route('carnet', ['id'=> $cliente->id, 'num'=> $curso->id] )}}">{{$curso->titulo}}</a></td>
      <td>{{$curso->pivot->emitido}}</td>
      <td>{{$curso->pivot->vencimiento}}</td>
      <td>{{$curso->pivot->codigo}}</td>
      <td><button class="btn btn-danger btn-sm"><i class="icofont-close"></i></button></td>
    </tr>
   
    @endforeach
    @else
    <tr>
        <td colspan="6">Aún no se asignó ningún curso</td>
      </tr>
    @endif
    
  </tbody>
</table>

@endsection