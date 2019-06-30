@extends('layouts.app')

@section('body')
 <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Registrar nuevo articulo</h3>
              </div>

           
            </div>
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2> <small>Complete el siguiente formulario</small></h2>
                   
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="POST" action="{{ route('articulos.store') }}" >
                          {!! csrf_field() !!}
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Codigo
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="codigo" required class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Nombre
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="nombre" required class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Categoria
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select name="id_categoria" class="form-control col-md-7 col-xs-12">
                            @foreach($categorias as $categoria)
                              <option value="{{$categoria->id}}">{{$categoria->nombre}}</option>
                            @endforeach
                          </select>

                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Precio de venta
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="number" name="precio_venta" required class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Inventario inicial
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="number" name="inventario" required class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Descripcion
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="descripcion" required class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          @if($categorias->isNotEmpty())
                          <button type="submit" class="btn btn-success">Guardar</button>
                          @else
                          <h5>No es posible registrar el articulo. Se requiere una categoria</h5>
                          @endif
                        </div>
                      </div>

                    </form>
                  </div>
                </div>
              </div>
            </div>

          
          </div>
@endsection