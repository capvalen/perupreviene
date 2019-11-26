@extends ('carnet.plantilla')

@section('contenedor')
<p>Ud. tiene los siguientes cursos ya aprobados:</p>
<table class="table table-hover">
  <thead class="">
    <tr>
      <th>#</th>
      <th>Nombre de curso</th>
    </tr>
  </thead>
  <tbody>
    @foreach($cursos as $item)
    <tr>
      <td>{{$loop->index+1}}</td>
      <td><a href="{{route('carnet', ['id'=>$id, 'num'=>$item->id ])}}">{{$item->titulo}}</a></td>
    </tr>
  </tbody>
  @endforeach
 
</table>
@endsection