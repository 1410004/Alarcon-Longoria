<?php

namespace App\Http\Controllers;

use App\Cliente;
use App\Detalle_venta;
use App\Articulo;
use App\Ventas;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;


class VentasController extends Controller
{
    public function index()
    {
        //funcion que permite mostrar la vista de lista de ventas, se pasa como parametro una variable que contiene los ventas
        $ventas = Ventas::get();
        return view("ventas.listar",compact("ventas"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      //funcion que retorna la vista de crear una venta
      //instacia de clientes
      
        $clientes = Cliente::get();
      //instacia de articulos
        $articulos = Articulo::where("inventario",">=",1)->get();
        
        return view("ventas.crear",compact("clientes","articulos"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      // funcion que permite almacer la informacion de la venta realizada
      
      
      //se busca el articulo que se ha seleccionado para la venta a realizar
      $articulo = Articulo::find($request->id_articulo);
      //objeto date para poder obtener la fecha y hora actual del sistema
      $fecha_hora = date("Y-m-d H:i:s");
      
      //instancia del modelo venta
      $venta = new Ventas;
      $venta->id_cliente = $request->id_cliente;
      $venta->id_usuario = Auth::user()->id;
      $venta->tipo_comprobante = $request->tipo_comprobante;
      $venta->serie_comprobante = $request->serie_comprobante;
      $venta->num_comprobante = $request->num_comprobante;
      $venta->fecha_hora = $fecha_hora;
      $venta->impuesto = $request->impuesto;
      $venta->estado = 0;
      $venta->total_venta = ($articulo->precio_venta * $request->cantidad) + (($articulo->precio_venta * $request->cantidad * $request->impuesto) / 100);
      $venta->save();
      //instancia de detalle de venta para asignar articulo vendido y en que venta
      $detalle_venta = new Detalle_venta;
      $detalle_venta->id_venta = $venta->id;
      $detalle_venta->id_articulo = $request->id_articulo;
      $detalle_venta->cantidad = $request->cantidad;
      $detalle_venta->precio_venta = $articulo->precio_venta;
      $detalle_venta->descuento = 0;
      $detalle_venta->save();
      
      //se actuliza el inventario del articulo vendido
      $actual = $articulo->inventario;
      $articulo->inventario = $actual - $request->cantidad;
      $articulo->update();
      return redirect()->route('ventas.list'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //funcion que retorna la vista de ver venta con la informacion del venta seleccionado
        $venta = Ventas::join("detalle_ventas","detalle_ventas.id_venta","=","ventas.id")->join("articulos","detalle_ventas.id_articulo","=","articulos.id")
          ->join("clientes","clientes.id","=","ventas.id_cliente")->join("users","ventas.id_usuario","=","users.id")->select("ventas.*","articulos.nombre as articulo","detalle_ventas.cantidad","detalle_ventas.precio_venta",
          "clientes.nombre as nombre_del_cliente","clientes.apellidos as apellidos_del_cliente","users.nombre as nombre_de_usuario","users.apellidos as apellidos_de_usuario")->where("ventas.id","=",$id)->first();
      return view("ventas.ver",compact("venta"));
    }

   

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //funcion que recibe de parametro el id del venta a borrar
      
    //se busca el venta por el id
        $venta = Ventas::find($id);
      //se borra el venta
        $venta->delete();
      //se direcciona a la vista de listar venta
        return redirect()->route('ventas.list'); 
    }
  
    
    public function inventarioActual(Request $request)
    {
      //funcion que retorna la cantidad en inventario de un articulo seleccionado en la vista de crear venta
      
      // se realiza la busqueda del articulo por el id que envia una funcion ajax en la vista
        $articulo = Articulo::find($request->id);
        
        $cantidad = $articulo->inventario;

          //se retorna la cantidad del articulo
        return response()->json(['cantidad'=>$cantidad]);
    }
}
