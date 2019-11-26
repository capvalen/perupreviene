@extends('plantilla')

@section('seccion')

<h1>Nuevo curso</h1>

@if (session('mensaje'))
<div class="alert alert-success">{{session('mensaje')}} puedes <a href="{{route('index')}}">volver aquí</a> para visualizarlo</div>
@endif

<div class="card col-md-6">
  <div class="card-body">
    <p class="card-text">Rellene los campos por favor:</p>
    <form action="{{route('curso.crear')}}" method="POST">
    @csrf
    <div class="form-row">
      <div class="input-group">
        <input class="form-control my-2 @error('titulo') is-invalid @enderror" type="text" name="titulo" placeholder="Título del curso" value='{{old('titulo')}}' autocomplete="off">
        @error('dni')
        <div class="invalid-feedback"> {{ $message }} </div>
        @enderror
      </div>
      
    <button class="btn btn-outline-success btn-block mt-2" type="submit">Guardar</button>
    </form>

  </div>
</div>

@endsection