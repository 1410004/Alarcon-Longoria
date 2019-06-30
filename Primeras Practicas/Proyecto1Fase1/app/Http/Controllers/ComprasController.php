<?php

namespace App\Http\Controllers;

use App\Ingresos;
use App\Detalle_ingreso;
use App\Articulo;
use App\Proveedores;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;


class ComprasController extends Controller
{
     public function index()
    {
        //funcion que permite mostrar la vista de lista de compras, se pasa como parametro una variable que contiene los compras
        $compras = Ingresos::get();
        return view("compras.listar",compact("compras"));
    }

  
    public function create()
    {    //funcion que retorna la vista de crear un ingreso
      //instacia de proveedores
        $proveedores = Proveedores::get();
      //instancia de articulos
        $articulos = Articulo::get();
    
        return view("compras.crear",compact("proveedores","articulos"));
    }
  
   public function store(Request $request)
    {
      // funcion que permite almacer la informacion de la compra realizada
      
      
      //se busca el articulo que se ha seleccionado para la compra a realizar
      $articulo = Articulo::find($request->id_articulo);
      //objeto date para poder obtener la fecha y hora actual del sistema
      $fecha_hora = date("Y-m-d H:i:s");
      
      //instancia del modelo compra
      $compra = new Ingresos;
      $compra->id_proveedor = $request->id_proveedor;
      $compra->id_usuario = Auth::user()->id;
      $compra->tipo_comprobante = $request->tipo_comprobante;
      $compra->serie_comprobante = $request->serie_comprobante;
      $compra->num_comprobante = $request->num_comprobante;
      $compra->fecha_hora = $fecha_hora;
      $compra->impuesto = $request->impuesto;
      $compra->estado = 0;
      $compra->total_compra = ($articulo->precio_venta * $request->cantidad) + (($articulo->precio_venta * $request->cantidad * $request->impuesto) / 100);
      $compra->save();
      //instancia de detalle de compra para asignar articulo comprado y en que compra
      $detalle_compra = new Detalle_ingreso;
      $detalle_compra->id_ingreso = $compra->id;
      $detalle_compra->id_articulo = $request->id_articulo;
      $detalle_compra->cantidad = $request->cantidad;
      $detalle_compra->precio_compra = $articulo->precio_venta;
      $detalle_compra->save();
      
      //se actuliza el inventario del articulo comprado
      $actual = $articulo->inventario;
      $articulo->inventario = $actual + $request->cantidad;
      $articulo->update();
      return redirect()->route('compras.list'); 
   }
  
    public function show($id)
    {
        //funcion que retorna la vista de ver compra con la informacion de compra seleccionada
        $compra = Ingresos::join("detalle_ingresos","detalle_ingresos.id_ingreso","=","ingresos.id")->join("articulos","detalle_ingresos.id_articulo","=","articulos.id")
          ->join("proveedores","proveedores.id","=","ingresos.id_proveedor")->join("users","ingresos.id_usuario","=","users.id")->select("ingresos.*","articulos.nombre as articulo","detalle_ingresos.cantidad","detalle_ingresos.precio_compra",
          "proveedores.nombre as nombre_del_proveedor","proveedores.apellidos as apellidos_del_proveedor","users.nombre as nombre_de_usuario","users.apellidos as apellidos_de_usuario")->where("ingresos.id","=",$id)->first();
      return view("compras.ver",compact("compra"));
    }

   public function destroy($id)
    {
        //funcion que recibe de parametro el id del ingreso a borrar
      
    //se busca el ingreso por el id
        $compra = Ingresos::find($id);
      //se borra el ingreso
        $compra->delete();
      //se direcciona a la vista de listar ingreso
        return redirect()->route('compras.list'); 
    }
  
  
}
