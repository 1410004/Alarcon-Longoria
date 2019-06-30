@extends('layouts.app')

@section('body')
<div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Articulos </h3>
              </div>

            
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                
                  <div class="x_content">
                    <p class="text-muted font-13 m-b-30">
                        Informacion del articulo
                    </p>
                    <hr>
                    <h5>Codigo: {{$articulo->codigo}}</h5>
                    <hr>
                    <h5>Nombre: {{$articulo->nombre}}</h5>
                    <hr>
                    <h5>Precio de venta: $ {{$articulo->precio_venta}}</h5>
                    <hr>
                    <h5>Inventario: {{$articulo->inventario}}</h5>
                    <hr>
                    <h5>Descripcion: {{$articulo->descripcion}}</h5>
                    <hr>
                    <h5>Categoria: {{$articulo->categoria}}</h5>
                    
                    
                    
                  </div>
                </div>
              </div>

             

          

            
            </div>
          </div>

@endsection