@extends('plantilla')

@section('seccion')


@foreach ($cursos as $curso)

{{$curso->pivot->codigo}}
    
@endforeach

@endsection