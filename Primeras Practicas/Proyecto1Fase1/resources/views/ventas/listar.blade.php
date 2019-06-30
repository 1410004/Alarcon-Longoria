@extends('layouts.app')

@section('body')
<div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Ventas <small>Lista de ventas</small></h3>
              </div>

            
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                
                  <div class="x_content">
                    <p class="text-muted font-13 m-b-30">
                      Ventas registradas en el sistema
                    </p>
                    <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>ID</th>
                          <th>Numero comprobante</th>
                          <th>Impuesto</th>
                          <th>Total</th>
                          <th>Fecha y hora</th>
                          <th style="width:25%">Opciones</th>
                        </tr>
                      </thead>

                      <tbody>
                        
                        @foreach($ventas as $venta)
                        <tr>
                          <td>{{$venta->id}}</td>
                          <td>{{$venta->num_comprobante}}</td>
                          <td>{{$venta->impuesto}} %</td>
                          <td>$ {{$venta->total_venta}}</td>
                          <td>{{$venta->fecha_hora}}</td>
                          <td>
                            <a href="{{ route('ventas.show', ['id' => $venta->id])}}" class="btn btn-round btn-primary">Ver</a>
                             <a href="{{ route('ventas.destroy', ['id' => $venta->id]) }}" onclick="event.preventDefault(); 
                                                          document.getElementById('eliminar_venta').submit();" class="btn btn-round btn-danger">Borrar</a>
                               <form id="eliminar_venta" action="{{ route('ventas.destroy', ['id' => $venta->id]) }}" method="POST" style="display:none">
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
