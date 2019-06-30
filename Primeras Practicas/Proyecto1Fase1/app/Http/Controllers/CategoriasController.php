<?php

namespace App\Http\Controllers;

use App\Categoria;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;


class CategoriasController extends Controller
{
   public function index()
    {
        //funcion que permite mostrar la vista de lista de categorias, se pasa como parametro una variable que contiene los categorias
        $categorias = Categoria::get();
        return view("categorias.listar",compact("categorias"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //funcion que retorna la vista de crear un cliente
        return view("categorias.crear");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      //instancia de nuevo categorias
        $categoria = new Categoria;
      //se pasan los datos que llegan del formulario al objeto $categoria
        $categoria->nombre = $request->nombre;
      $categoria->descripcion = $request->descripcion;
      
      //se guarda el $categoria
      $categoria->save();
      //se redirige a la vista de lista de $categorias
      return redirect()->route('categorias.list');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //funcion que retorna la vista de ver categorias con la informacion del categorias seleccionado
        $categoria = Categoria::find($id);
        return view("categorias.ver",compact("categoria"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Categoria $categoria)
    {
        //funcion que recibe el Categoria a editar, y lo retorna a la vista correspondiente
        return view("categorias.editar",compact("categoria"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Categoria $categoria)
    {
        //funcion que recibe como parametro el Categoria a modificar
      
        $categoria->nombre = Input::get("nombre");
      $categoria->descripcion = Input::get("descripcion");
      
      //se actualizar el Categoria
      $categoria->update();
      //se redirige a la vista de lista de Categorias
      return redirect()->route('categorias.list');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //funcion que recibe de parametro el id del $categoria a borrar
      
    //se busca el $categoria por el id
        $categoria = Categoria::find($id);
      //se borra el $categoria
        $categoria->delete();
      //se direcciona a la vista de listar $categoria
        return redirect()->route('categorias.list'); 
    }
}
