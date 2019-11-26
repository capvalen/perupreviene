@extends ('carnet.plantilla')

@section('contenedor')
<style>
  @media print{
    html, body{background-color:white !important}
    #divCarnet {border: 1px solid #000}
    
  }
  #divTitulo{
    background-color: #fee68f;
    border: 2px solid #f1d360;
    color: #66540a;
  }
  #firma{
    opacity: 0.8;
  }
  .w-35 {
    width: 30%!important;
}
#divCarnet{
  background: url('{{url("images/path1048.png")}}') no-repeat; 
}
#divFoto{
  border: 2px solid #000;
  -webkit-box-shadow: 6px 6px 16px 1px rgba(0,0,0,1);
-moz-box-shadow: 6px 6px 16px 1px rgba(0,0,0,1);
box-shadow: 6px 6px 16px 1px rgba(0,0,0,1);

}
</style>

<p class="d-print-none">Gracias por acceder a nuestra plataforma acá tiene su carnet firmado:</p>

<div class="container-fluid" id="divCarnet">
  <div class="row mt-2 p-2">
    <div class="col-3">
      <img src="{{url('images/logoGrande.png')}}" class="img-fluid">
    </div>
    <div class="col-9 d-flex align-items-center justify-content-center" id="divTitulo">
      <h3 class="text-center ">
        {{$curso->titulo}}
      </h3>
    </div>
  </div>
  <div class="row" id="rowFondo">
    <div class="col-3">
      <div class=" my-2 d-flex align-items-center justify-content-center" id="">
        <div id="divFoto">
          <img src="{{url('subidas/' . $cliente->foto )}}" class="img-fluid">
        </div>
      </div>
    </div>
    <div class="col-9">
      <div class="card my-1 mr-2">
        <div class="card-body p-3">
          <div class="row">
            <div class="col-5"><h5>Nombre:</h5></div>
            <div class="col">{{$cliente->apellidos}} {{$cliente->nombres}}</div>
          </div>
          <div class="row">
            <div class="col-5"><h5>D.N.I.:</h5></div>
            <div class="col">{{$cliente->dni}}</div>
          </div>
          <div class="row">
            <div class="col-5"><h5>Emitido:</h5></div>
            <div class="col">{{$curso->pivot->emitido}}</div>
          </div>
          <div class="row">
            <div class="col-5"><h5>Vencimiento:</h5></div>
            <div class="col">{{$curso->pivot->vencimiento}}</div>
          </div>
          <div class="row">
            <div class="col-5"><h5>ID:</h5></div>
            <div class="col">{{$curso->pivot->codigo}}</div>
          </div>
         
        </div>
      </div>
      <div class="row d-flex align-items-center justify-content-center ">
          <img id="firma" src="{{url('images/firma.png')}}" class="img-fluid w-35">
        </div>
        <div class="row d-flex flex-row-reverse mr-1 mb-1">
          <small>eperuprevenir.edu.pe</small>
        </div>
    </div>
  </div>
</div>

@endsection