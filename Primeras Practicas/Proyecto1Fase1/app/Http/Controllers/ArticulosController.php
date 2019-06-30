<?php

namespace App\Http\Controllers;

use App\Articulo;
use App\Categoria;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;


class ArticulosController extends Controller
{
    public function index()
    {
        //funcion que permite mostrar la vista de lista de articulos, se pasa como parametro una variable que contiene los articulos
        $articulos = Articulo::get();
        return view("articulos.listar",compact("articulos"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorias = Categoria::get();
        //funcion que retorna la vista de crear un articulo
        return view("articulos.crear",compact("categorias"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      //instancia de nuevo articulos
        $articulo = new Articulo;
      //se pasan los datos que llegan del formulario al objeto articulos
        $articulo->codigo = $request->codigo;
      $articulo->nombre = $request->nombre;
      $articulo->precio_venta = $request->precio_venta;
      $articulo->inventario = $request->inventario;
      $articulo->descripcion = $request->descripcion;
      $articulo->id_categoria = $request->id_categoria;
      //se guarda el articulos
      $articulo->save();
      //se redirige a la vista de lista de articulos
      return redirect()->route('articulos.list');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //funcion que retorna la vista de ver articulo con la informacion del articulo seleccionado
        $articulo = Articulo::join("categorias","categorias.id","=","articulos.id_categoria")
          ->select("articulos.*","categorias.nombre as categoria")->where("articulos.id","=",$id)->first();
        return view("articulos.ver",compact("articulo"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Articulo $articulo)
    {
      $categorias = Categoria::get();
        //funcion que recibe el articulo a editar, y lo retorna a la vista correspondiente
        return view("articulos.editar",compact("articulo","categorias"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Articulo $articulo)
    {
        //funcion que recibe como parametro el articulo a modificar
      
       $articulo->codigo = Input::get("codigo");
      $articulo->nombre = Input::get("nombre");
      $articulo->precio_venta = Input::get("precio_venta");
      $articulo->inventario = Input::get("inventario");
      $articulo->descripcion = Input::get("descripcion");
      $articulo->id_categoria = Input::get("id_categoria");
      //se actualizar el articulo
      $articulo->update();
      //se redirige a la vista de lista de articulo
      return redirect()->route('articulos.list');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //funcion que recibe de parametro el id del articulos a borrar
      
    //se busca el articulos por el id
        $articulo = Articulo::find($id);
      //se borra el articulos
        $articulo->delete();
      //se direcciona a la vista de listar articulos
        return redirect()->route('articulos.list'); 
    }
}
