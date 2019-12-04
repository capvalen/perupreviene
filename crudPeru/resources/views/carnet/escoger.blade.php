@extends ('carnet.plantilla')

@section('contenedor')
<p class="text-center mt-4">Gracias por ingresar a nuestra web, por favor ingresa tu D.N.I. para que puedas acceder:</p>

@if(session('noHay'))
<div class="alert alert-danger role="alert">
  {{session('noHay')}}
</div>
@endif

<form action="buscarDniFront" method="post">
@csrf
<div class="col-6 mr-auto ml-auto d-flex flex-column ">
    <input type="text" name="dni" class="form-control my-3  ml-auto" autocomplete="off">
    <button class="btn btn-outline-secondary mr-auto ml-auto "><i class="icofont-search-1"></i> Buscar mis cursos</button>
</div>
</form>
<p><small><a href="{{route('login')}}"><i class="icofont-ssl-security"></i> Ingresar como administrador</a></small></p>
@endsection