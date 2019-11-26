function abrirModal(id){
  var d = new Date();

  $('#txtIdCurso').val(id);
  $('#fechaInicio').val(d.getFullYear() +'-'+ d.getMonth()+ '-' + d.getDate() );
  $('#fechaFin').val(d.getFullYear() +'-'+ d.getMonth()+ '-' + d.getDate() );
  $('#modalUnirCurso').modal('show');
}