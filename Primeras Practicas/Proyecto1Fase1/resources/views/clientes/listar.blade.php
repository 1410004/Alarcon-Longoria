@extends('layouts.app')

@section('body')
<div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Clientes <small>Lista de clientes</small></h3>
              </div>

            
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                
                  <div class="x_content">
                    <p class="text-muted font-13 m-b-30">
                      Clientes registrados en el sistema
                    </p>
                    <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>ID</th>
                          <th>Nombre completo</th>
                          <th>Telefono</th>
                          <th>Correo electronico</th>
                          <th style="width:25%">Opciones</th>
                        </tr>
                      </thead>

                      <tbody>
                        
                        @foreach($clientes as $cliente)
                        <tr>
                          <td>{{$cliente->id}}</td>
                          <td>{{$cliente->nombre}} {{$cliente->apellidos}}</td>
                          <td>{{$cliente->telefono}}</td>
                          <td>{{$cliente->email}}</td>
                          <td>
                            <a href="{{ route('clientes.show', ['id' => $cliente->id])}}" class="btn btn-round btn-primary">Ver</a>
                            <a href="{{ route('clientes.edit', ['id' => $cliente->id])}}" class="btn btn-round btn-success">Editar</a>
                             <a href="{{ route('clientes.destroy', ['id' => $cliente->id]) }}" onclick="event.preventDefault(); 
                                                          document.getElementById('eliminar_cliente').submit();" class="btn btn-round btn-danger">Borrar</a>
                               <form id="eliminar_cliente" action="{{ route('clientes.destroy', ['id' => $cliente->id]) }}" method="POST" style="display:none">
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
