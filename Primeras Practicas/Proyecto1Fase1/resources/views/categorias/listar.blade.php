@extends('layouts.app')

@section('body')
<div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Categorias <small>Lista de categorias</small></h3>
              </div>

            
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                
                  <div class="x_content">
                    <p class="text-muted font-13 m-b-30">
                      Categorias registradas en el sistema
                    </p>
                    <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>ID</th>
                          <th>Nombre</th>
                          <th style="width:25%">Opciones</th>
                        </tr>
                      </thead>

                      <tbody>
                        
                        @foreach($categorias as $categoria)
                        <tr>
                          <td>{{$categoria->id}}</td>
                          <td>{{$categoria->nombre}} </td>
                          <td>
                            <a href="{{ route('categorias.show', ['id' => $categoria->id])}}" class="btn btn-round btn-primary">Ver</a>
                            <a href="{{ route('categorias.edit', ['id' => $categoria->id])}}" class="btn btn-round btn-success">Editar</a>
                             <a href="{{ route('categorias.destroy', ['id' => $categoria->id]) }}" onclick="event.preventDefault(); 
                                                          document.getElementById('eliminar_categoria').submit();" class="btn btn-round btn-danger">Borrar</a>
                               <form id="eliminar_categoria" action="{{ route('categorias.destroy', ['id' => $categoria->id]) }}" method="POST" style="display:none">
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
