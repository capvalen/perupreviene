@extends('plantilla')

@section('seccion')
<h1>Eliminar cursos del cliente:</h1>
<h3>{{$cliente->apellidos}}</h3>

@if(session('borrado'))
<div class="alert alert-danger">{{session('borrado')}}</div>
@endif
@if(count($cursos)>0)
<p>Actualmente tiene inscrito estos cursos:</p>
<table class="table">
	<thead class="thead-dark">
		<tr>
			<th>#</th>
			<th>Nombre del curso</th>
			<th>@</th>
		</tr>
	</thead>
	<tbody>
		
		@foreach ($cursos as $curso)
		<tr>
			<td>{{$loop->iteration}}</td>
			<td>{{$curso->titulo}}</td>
			<td>
				<form class="d-inline" action="{{route('curso.eliminar', [$cliente->id , $curso->id])}}" method="POST">
					@csrf
          @method('DELETE')
				<button class="btn btn-outline-warning"><i class="icofont-ui-delete"></i></button>
				</form>
			</td>
		</tr>
		@endforeach
	</tbody>
	
</table>
@else
	<p>Este cliente no tiene ningún curso vigente actualmente, puedes borrar definitivamente al estudiante, haciendo click en el botón:</p>
	<form class="d-inline" action="{{route('clientes.eliminar', $cliente)}}" method="POST">
		@csrf
		@method('DELETE')
		<button class="btn btn-outline-danger" type="submit"><i class="icofont-trash"></i> Borrar cliente</button>
	</form>
@endif
@endsection