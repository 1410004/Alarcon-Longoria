@extends('layouts.app')

@section('body')
<div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Ingresos </h3>
              </div>

            
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                
                  <div class="x_content">
                    <p class="text-muted font-13 m-b-30">
                        Informacion de ingreso
                    </p>
                    <hr>
                    <h5>Proveedor: {{$compra->nombre_del_proveedor}} {{$compra->apellidos_del_proveedor}}</h5>
                    <hr>
                    <h5>Comprador: {{$compra->nombre_de_usuario}} {{$compra->apellidos_de_usuario}}</h5>
                    <hr>
                    <h5>Tipo de documento: {{$compra->tipo_comprobante}}</h5>
                    <hr>
                    <h5>Serie de documento: {{$compra->serie_comprobante}}</h5>
                    <hr>
                    <h5>Numero de documento: {{$compra->num_comprobante}}</h5>
                    <hr>
                    <h5>Fecha y hora: {{$compra->fecha_hora}}</h5>
                    <hr>
                    <h5>Articulo: {{$compra->articulo}}</h5>
                    <hr>
                    <h5>Cantidad: {{$compra->cantidad}}</h5>
                    <hr>
                    <h5>Precio de compra: $ {{$compra->precio_compra}}</h5>
                    <hr>
                    <h5>Impuesto: {{$compra->impuesto}} %</h5>
                    <hr>
                    <h5>Total: $ {{$compra->total_compra}}</h5>
                    
                    
                  </div>
                </div>
              </div>

             

          

            
            </div>
          </div>

@endsection