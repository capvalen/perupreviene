<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
use File;
use Auth;

class controlador extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        return view ('carnet.escoger');
    }

    public function panel(){

        //Obtiene todos los registros desde cliente
        //$clientes = App\Cliente::all();
        $clientes = App\Cliente::orderBy('apellidos', 'asc')->get();

        $cursos = App\Curso::orderBy('titulo', 'asc')->get();

        return view('inicio', compact('clientes', 'cursos'));
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

        if($requerimiento->hasFile('foto')){
            $archivo = $requerimiento->file('foto');
            $extension = $archivo -> getClientOriginalExtension();
            $nombArchivo = time().'.'.$extension;
            $archivo->move('subidas/', $nombArchivo);
            $clienteNuevo -> foto = $nombArchivo;
        }else{
            $clienteNuevo -> foto = '';
        }

        
        $clienteNuevo -> nombres = $requerimiento->nombres;
        $clienteNuevo -> apellidos = $requerimiento->apellidos;
        $clienteNuevo -> dni = $requerimiento->dni;

        $clienteNuevo -> save();

        return back()->with('mensaje', 'El cliente ' . $requerimiento->apellidos. ' ' .$requerimiento->nombres.' se registró exitósamente' );

    }
    public function editarCliente($id){
        $cliente = App\Cliente::findOrFail($id);
        
        return view('clientes.editar', compact('cliente'), [  'cursos'=> $cliente->cursos] ); //compact('cliente'));
        
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
    public function nuevoCurso(){
        return view('cursos.crear');
    }
    public function crearCurso(Request $requerimiento){
        $requerimiento -> validate([
            'titulo'=>'required'
        ]);

        $cursoCrear = new App\Curso;
        $cursoCrear->titulo = $requerimiento->titulo;
        $cursoCrear->save();

        return back()->with('mensaje', 'Curso creado con éxito');
    }

    public function prueba(){
        
        
        /* $curso = App\Curso::findOrFail(3);

        //Agrega un cliente nuevo a un curso, guiado por el ID.
        //$curso->clientes()->attach(1);

        return $curso->clientes; */


        $cliente = App\Cliente::findOrFail(6);

        //$cliente->cursos()->sync(2);

        return view('demo', ['cursos'=> $cliente->cursos] );
    }
    public function eliminarFoto($id){
        $cliente = App\Cliente::findOrFail($id);
        $nombreArchivo = $cliente -> foto;
        $cliente -> foto = '';
        File::delete('subidas/'. $nombreArchivo );
        
        $cliente->save();
        return back()->with('borrado', 'Foto eliminada');
    }
    public function nuevaFoto(Request $requerimiento, $id){
        $cliente = App\Cliente::findOrFail($id);

        if($requerimiento->hasFile('foto')){
            $archivo = $requerimiento->file('foto');
            $extension = $archivo -> getClientOriginalExtension();
            $nombArchivo = time().'.'.$extension;
            $archivo->move('subidas/', $nombArchivo);
            $cliente -> foto = $nombArchivo;
        }else{
            $cliente -> foto = '';
        }

        $cliente -> save();

        return back()->with('fotoSubida', 'Foto actualizada con éxito');
    }
    public function nuevoClienteCurso(Request $requisito){
        $cliente = App\Cliente::findOrFail($requisito->idCliente);
        $cliente->cursos()->attach($requisito->idCursos, ['emitido' => $requisito->fechaInicio, 'vencimiento'=>$requisito->fechaFin, 'codigo'=>$requisito->codigo ]);

        return back()->with('mensaje', 'Asociado correctamente');
        //return $requisito;
    }

    public function carnet($id = null, $num = null){
        //return 'hola '.$id." - ".$num;
        if($id == null){
            return view ('carnet.escoger');
        }else if($num == null){
            
            $cursos = App\Cliente::findOrFail($id)->cursos()->get();
            //return "ir a cursos con el ". $id;
            return view ('carnet.cursos', compact('cursos', 'id'));
        }else{
            //$cliente = App\Cliente::findOrFail($id)->cursos()->where('id', 1);
            $cliente = App\Cliente::findOrFail($id)->get()->first();
            $curso = App\Cliente::findOrFail($id)->cursos()->where('cursos.id', $num)->get()->first();


            return view ('carnet.mostrar', compact('cliente', 'curso'));
            //return $cliente;
            //return $cursos;
        }

    }
    public function buscarDniFront(Request $requisito){
        $cliente = App\Cliente::where('dni', $requisito->dni)->get();
        //return $cliente->count();
        if( count($cliente)>=1 ){
            return redirect()->route('carnet', $cliente->first()->id);
            //return $cliente->first()->id;
        }else{
            return back()->with('noHay', 'No se encontraró el D.N.I. que proporcionó ');
        }
        
    }
    public function login(){
        return view("login");
    }
    public function iniciar(Request $requisito){
        $credenciales = $requisito->validate([
            'email'=>'required',
            'password'=>'required'
        ]);
        //return $credenciales;

        if (\Auth::attempt(['email' => request('email'), 'password' => request('password')])) {
            //return redirect()->intended('¿?'));
            //return "logueado";
            return redirect()->route("panel");
        }else{
            //return 'campos incorrectos';
            return back()->withInput()->with('mensaje', 'Los campos ingresados no coinciden');
        }
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
