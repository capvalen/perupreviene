<?php

Route::get('/', 'controlador@index')->name('index');

Route::get('/nuevocliente', function () { return view('nuevoempleado'); })->name('nuevoEmpleado');

Route::get('/equipo/{nombre?}', 'controlador@equipo')->name('equipo');

Route::post('/crearCliente', 'controlador@crearCliente')->name('cliente.crear');

Route::get('/editarCliente/{id}', 'controlador@editarCliente')->name('clientes.editar');

Route::put('/editarCliente/{id}', 'controlador@updateCliente')->name('clientes.actualizar');

Route::delete('eliminarCliente/{id}', 'controlador@deleteCliente')->name('clientes.eliminar');