<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;

class controlador extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){

        $clientes = App\Cliente::all();

        return view('inicio', compact('clientes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function equipo($nombre = null){
        $clan = ['Carlos', 'Alex', 'Ronald'];
        return view('equipo', compact('clan', 'nombre'));
    }
    public function crearCliente(Request $requerimiento){
        //Muestra todas los clientes que vienen del formulario:
        //return $requerimiento->all();

        $requerimiento ->validate([
            'dni' => 'required|unique:clientes,dni',
            'nombres' => 'required',
            'apellidos' => 'required'
        ]);

        $clienteNuevo =  new App\Cliente;
        $clienteNuevo -> nombres = $requerimiento->nombres;
        $clienteNuevo -> apellidos = $requerimiento->apellidos;
        $clienteNuevo -> dni = $requerimiento->dni;

        $clienteNuevo -> save();

        return back()->with('mensaje', 'El cliente ' . $requerimiento->apellidos. ' ' .$requerimiento->nombres.' se registró exitósamente' );

    }
    public function editarCliente($id){
        $cliente = App\Cliente::findOrFail($id);
        return view('clientes.editar', compact('cliente'));
        
    }
    public function updateCliente(Request $requerimiento, $id){

        $requerimiento ->validate([
            'dni' => 'required|unique:clientes,dni',
            'nombres' => 'required',
            'apellidos' => 'required'
        ]);
        $clienteActualizar = App\Cliente::findOrFail($id);
        $clienteActualizar -> nombres = $requerimiento->nombres;
        $clienteActualizar -> apellidos = $requerimiento->apellidos;
        $clienteActualizar -> dni = $requerimiento->dni;

        $clienteActualizar -> save();

        return back()->with('mensaje', 'El cliente ' . $requerimiento->apellidos. ' ' .$requerimiento->nombres.' se actualizó exitósamente' );
    }
    public function deleteCliente($id){
        $clienteEliminar = App\Cliente::findOrFail($id);
        $clienteEliminar->delete();
        return back()->with('borrado', 'El cliente ha sido borrado' );
    }
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
