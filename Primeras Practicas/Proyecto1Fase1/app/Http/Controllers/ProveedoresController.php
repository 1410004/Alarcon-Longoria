<?php

namespace App\Http\Controllers;

use App\Proveedores;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;

class ProveedoresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //funcion que permite mostrar la vista de lista de proveedores, se pasa como parametro una variable que contiene los proveedores
        $proveedores = Proveedores::get();
        return view("proveedores.listar",compact("proveedores"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //funcion que retorna la vista de crear un proveedores
        return view("proveedores.crear");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      //instancia de nuevo Proveedores
        $proveedor = new Proveedores;
      //se pasan los datos que llegan del formulario al objeto cliente
        $proveedor->nombre = $request->nombre;
      $proveedor->apellidos = $request->apellidos;
      $proveedor->tipo_documento = $request->tipo_documento;
      $proveedor->num_documento = $request->num_documento;
      $proveedor->direccion = $request->direccion;
      $proveedor->telefono = $request->telefono;
      $proveedor->email = $request->email;
      $proveedor->contacto = $request->contacto;
      $proveedor->telefono_contacto = $request->telefono_contacto;
      //se guarda el Proveedores
      $proveedor->save();
      //se redirige a la vista de lista de Proveedores
      return redirect()->route('proveedores.list');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //funcion que retorna la vista de ver proveedor con la informacion del proveedor seleccionado
        $proveedor = Proveedores::find($id);
        return view("proveedores.ver",compact("proveedor"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Proveedores $proveedor)
    {
        //funcion que recibe el proveedor a editar, y lo retorna a la vista correspondiente
        return view("proveedores.editar",compact("proveedor"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Proveedores $proveedor)
    {
        //funcion que recibe como parametro el proveedor a modificar
      
        $proveedor->nombre = Input::get("nombre");
      $proveedor->apellidos = Input::get("apellidos");
      $proveedor->tipo_documento = Input::get("tipo_documento");
      $proveedor->num_documento = Input::get("num_documento");
      $proveedor->direccion = Input::get("direccion");
      $proveedor->telefono = Input::get("telefono");
      $proveedor->email = Input::get("email");
       $proveedor->contacto = Input::get("contacto");
      $proveedor->telefono_contacto = Input::get("telefono_contacto");
      //se actualizar el proveedor
      $proveedor->update();
      //se redirige a la vista de lista de proveedor
      return redirect()->route('proveedores.list');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //funcion que recibe de parametro el id del proveedor a borrar
      
    //se busca el proveedor por el id
        $proveedor = Proveedores::find($id);
      //se borra el proveedor
        $proveedor->delete();
      //se direcciona a la vista de listar proveedor
        return redirect()->route('proveedores.list'); 
    }
}
