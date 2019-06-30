@extends('layouts.app')

@section('body')
<div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Articulos <small>Lista de articulos</small></h3>
              </div>

            
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                
                  <div class="x_content">
                    <p class="text-muted font-13 m-b-30">
                      Articulos registrados en el sistema
                    </p>
                    <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>Codigo</th>
                          <th>Nombre</th>
                          <th>Precio de Venta</th>
                          <th>Inventario</th>
                          <th style="width:25%">Opciones</th>
                        </tr>
                      </thead>

                      <tbody>
                        
                        @foreach($articulos as $articulo)
                        <tr>
                          <td>{{$articulo->codigo}}</td>
                          <td>{{$articulo->nombre}}</td>
                          <td>$ {{$articulo->precio_venta}}</td>
                          <td>{{$articulo->inventario}}</td>
                          <td>
                            <a href="{{ route('articulos.show', ['id' => $articulo->id])}}" class="btn btn-round btn-primary">Ver</a>
                            <a href="{{ route('articulos.edit', ['id' => $articulo->id])}}" class="btn btn-round btn-success">Editar</a>
                             <a href="{{ route('articulos.destroy', ['id' => $articulo->id]) }}" onclick="event.preventDefault(); 
                                                          document.getElementById('eliminar_articulo').submit();" class="btn btn-round btn-danger">Borrar</a>
                               <form id="eliminar_articulo" action="{{ route('articulos.destroy', ['id' => $articulo->id]) }}" method="POST" style="display:none">
                            {{ method_field('DELETE') }}
                            {!! csrf_field() !!}
                          </form>
                          </td>
                         
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>

             

          

            
            </div>
          </div>
@endsection
