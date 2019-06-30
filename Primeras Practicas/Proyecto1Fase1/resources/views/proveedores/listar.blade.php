@extends('layouts.app')

@section('body')
<div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Proveedores <small>Lista de proveedores</small></h3>
              </div>

            
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                
                  <div class="x_content">
                    <p class="text-muted font-13 m-b-30">
                      Proveedores registrados en el sistema
                    </p>
                    <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>ID</th>
                          <th>Nombre completo</th>
                          <th>Telefono</th>
                          <th>Contacto</th>
                          <th>Telefono de Contacto</th>

                          <th style="width:25%">Opciones</th>
                        </tr>
                      </thead>

                      <tbody>
                        
                        @foreach($proveedores as $proveedor)
                        <tr>
                          <td>{{$proveedor->id}}</td>
                          <td>{{$proveedor->nombre}} {{$proveedor->apellidos}}</td>
                          <td>{{$proveedor->telefono}}</td>
                          <td>{{$proveedor->contacto}}</td>
                          <td>{{$proveedor->telefono_contacto}}</td>
                          <td>
                            <a href="{{ route('proveedores.show', ['id' => $proveedor->id])}}" class="btn btn-round btn-primary">Ver</a>
                            <a href="{{ route('proveedores.edit', ['id' => $proveedor->id])}}" class="btn btn-round btn-success">Editar</a>
                             <a href="{{ route('proveedores.destroy', ['id' => $proveedor->id]) }}" onclick="event.preventDefault(); 
                                                          document.getElementById('eliminar_proveedor').submit();" class="btn btn-round btn-danger">Borrar</a>
                               <form id="eliminar_proveedor" action="{{ route('proveedores.destroy', ['id' => $proveedor->id]) }}" method="POST" style="display:none">
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
