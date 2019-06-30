@extends('layouts.app')

@section('body')
<div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Ventas </h3>
              </div>

            
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                
                  <div class="x_content">
                    <p class="text-muted font-13 m-b-30">
                        Informacion de venta
                    </p>
                    <hr>
                    <h5>Cliente: {{$venta->nombre_del_cliente}} {{$venta->apellidos_del_cliente}}</h5>
                    <hr>
                    <h5>Vendedor: {{$venta->nombre_de_usuario}} {{$venta->apellidos_de_usuario}}</h5>
                    <hr>
                    <h5>Tipo de documento: {{$venta->tipo_comprobante}}</h5>
                    <hr>
                    <h5>Serie de documento: {{$venta->serie_comprobante}}</h5>
                    <hr>
                    <h5>Numero de documento: {{$venta->num_comprobante}}</h5>
                    <hr>
                    <h5>Fecha y hora: {{$venta->fecha_hora}}</h5>
                    <hr>
                    <h5>Articulo: {{$venta->articulo}}</h5>
                    <hr>
                    <h5>Cantidad: {{$venta->cantidad}}</h5>
                    <hr>
                    <h5>Precio de venta: $ {{$venta->precio_venta}}</h5>
                    <hr>
                    <h5>Impuesto: {{$venta->impuesto}} %</h5>
                    <hr>
                    <h5>Total: $ {{$venta->total_venta}}</h5>
                    
                    
                  </div>
                </div>
              </div>

             

          

            
            </div>
          </div>

@endsection