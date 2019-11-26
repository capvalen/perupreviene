<?php

Route::get('/', 'controlador@index')->name('index');

Route::get('/nuevocliente', function () { return view('nuevoempleado'); })->name('nuevoEmpleado');

Route::get('/equipo/{nombre?}', 'controlador@equipo')->name('equipo');

Route::post('/crearCliente', 'controlador@crearCliente')->name('cliente.crear');

Route::post('/eliminarFoto/{id}', 'controlador@eliminarFoto')->name('eliminarFoto');

Route::put('/nuevaFoto/{id}', 'controlador@nuevaFoto')->name('nuevaFoto');

Route::get('/editarCliente/{id}', 'controlador@editarCliente')->name('clientes.editar');

Route::put('/editarCliente/{id}', 'controlador@updateCliente')->name('clientes.actualizar');

Route::delete('eliminarCliente/{id}', 'controlador@deleteCliente')->name('clientes.eliminar');

Route::get('nuevoCurso', 'controlador@nuevoCurso')->name('cursoCrear');

Route::post('/crearCurso', 'controlador@crearCurso')->name('curso.crear');

Route::post('/nuevoClienteCurso', 'controlador@nuevoClienteCurso')->name('nuevoClienteCurso');

//Route::get('/carnet/{$idCliente}/curso/{$idCurso}', 'controlador@carnet')->name('carnet');
Route::get('/carnet/{id?}', 'controlador@carnet')->name('carnet');

Route::get('/carnet/{id?}/curso/{num?}', 'controlador@carnet')->name('carnet');

Route::post('buscarDniFront', 'controlador@buscarDniFront')->name('buscarDniFront');


/*Pruebas*/
Route::get('/prueba', 'controlador@prueba')->name('prueba');