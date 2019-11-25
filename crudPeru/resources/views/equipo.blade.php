@extends('plantilla')

@section('seccion')
<h1>Todo el equipo:</h1>

@if(empty($nombre))
<ul>
  @foreach( $clan as $persona )
    <li>
      <a href="{{route('equipo', $persona)}}">{{$persona}}</a>
    </li>
  @endforeach
  </ul>
@else
  <h4>Hola: {{$nombre}}</h4>
  <a href="{{route('equipo')}}">Volver a ver al equipo</a>
@endif

@endsection