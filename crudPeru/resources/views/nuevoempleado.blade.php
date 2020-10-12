@extends('plantilla')

@section('seccion')

<h1>Nuevo empleado</h1>

@if (session('mensaje'))
<div class="alert alert-success">{{session('mensaje')}} puedes <a href="{{route('index')}}">volver aquí</a> para visualizarlo</div>
@endif

<div class="card col-md-6">
  <div class="card-body">
    <p class="card-text">Rellene los campos por favor:</p>
    <form action="{{route('cliente.crear')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-row">
      <div class="input-group">
        <input class="form-control my-2 @error('dni') is-invalid @enderror" type="text" name="dni" placeholder="D.N.I.." value='{{old('dni')}}' autocomplete="off">
        @error('dni')
         <div class="invalid-feedback"> {{ $message }} </div>
        @enderror
        </div>
        <input class="form-control my-2 @error('apellidos') is-invalid @enderror" type="text" name="apellidos" placeholder="Apellidos completos" value='{{old('apellidos')}}' autocomplete="off">
        @error('apellidos')
          <div class="invalid-feedback"> {{ $message }} </div>
        @enderror
        <input class="form-control my-2 @error('nombres') is-invalid @enderror" type="text" name="nombres" placeholder="Nombres" value='{{old('nombres')}}' autocomplete="off">
        @error('nombres')
          <div class="invalid-feedback"> {{ $message }} </div>
        @enderror
        <input type="file" name="foto" class="my-2">
    </div>
    <button class="btn btn-outline-success btn-block mt-2" type="submit">Guardar</button>
    </form>

  </div>
</div>

@endsection