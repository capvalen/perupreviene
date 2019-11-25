@extends('plantilla')

@section('seccion')

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
    <button class="btn btn-outline-warning btn-block mt-2" type="submit">Editar</button>
    </form>

@endsection