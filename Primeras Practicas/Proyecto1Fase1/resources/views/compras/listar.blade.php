@extends('layouts.app')

@section('body')
<div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Ingresos <small>Lista de ingresos</small></h3>
              </div>

            
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                
                  <div class="x_content">
                    <p class="text-muted font-13 m-b-30">
                      Ingresos registradas en el sistema
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
                        
                        @foreach($compras as $compra)
                        <tr>
                          <td>{{$compra->id}}</td>
                          <td>{{$compra->num_comprobante}}</td>
                          <td>{{$compra->impuesto}} %</td>
                          <td>$ {{$compra->total_compra}}</td>
                          <td>{{$compra->fecha_hora}}</td>
                          <td>
                            <a href="{{ route('compras.show', ['id' => $compra->id])}}" class="btn btn-round btn-primary">Ver</a>
                             <a href="{{ route('compras.destroy', ['id' => $compra->id]) }}" onclick="event.preventDefault(); 
                                                          document.getElementById('eliminar_compra').submit();" class="btn btn-round btn-danger">Borrar</a>
                               <form id="eliminar_compra" action="{{ route('compras.destroy', ['id' => $compra->id]) }}" method="POST" style="display:none">
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
