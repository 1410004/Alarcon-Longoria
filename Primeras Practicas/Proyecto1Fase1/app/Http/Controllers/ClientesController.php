<?php

namespace App\Http\Controllers;

use App\Cliente;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;

class ClientesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //funcion que permite mostrar la vista de lista de clientes, se pasa como parametro una variable que contiene los clientes
        $clientes = Cliente::get();
        return view("clientes.listar",compact("clientes"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //funcion que retorna la vista de crear un cliente
        return view("clientes.crear");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      //instancia de nuevo cliente
        $cliente = new Cliente;
      //se pasan los datos que llegan del formulario al objeto cliente
        $cliente->nombre = $request->nombre;
      $cliente->apellidos = $request->apellidos;
      $cliente->tipo_documento = $request->tipo_documento;
      $cliente->num_documento = $request->num_documento;
      $cliente->direccion = $request->direccion;
      $cliente->telefono = $request->telefono;
      $cliente->email = $request->email;
      //se guarda el cliente
      $cliente->save();
      //se redirige a la vista de lista de clientes
      return redirect()->route('clientes.list');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //funcion que retorna la vista de ver cliente con la informacion del cliente seleccionado
        $cliente = Cliente::find($id);
        return view("clientes.ver",compact("cliente"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Cliente $cliente)
    {
        //funcion que recibe el cliente a editar, y lo retorna a la vista correspondiente
        return view("clientes.editar",compact("cliente"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Cliente $cliente)
    {
        //funcion que recibe como parametro el cliente a modificar
      
        $cliente->nombre = Input::get("nombre");
      $cliente->apellidos = Input::get("apellidos");
      $cliente->tipo_documento = Input::get("tipo_documento");
      $cliente->num_documento = Input::get("num_documento");
      $cliente->direccion = Input::get("direccion");
      $cliente->telefono = Input::get("telefono");
      $cliente->email = Input::get("email");
      //se actualizar el cliente
      $cliente->update();
      //se redirige a la vista de lista de clientes
      return redirect()->route('clientes.list');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //funcion que recibe de parametro el id del cliente a borrar
      
    //se busca el cliente por el id
        $cliente = Cliente::find($id);
      //se borra el cliente
        $cliente->delete();
      //se direcciona a la vista de listar clientes
        return redirect()->route('clientes.list'); 
    }
}
