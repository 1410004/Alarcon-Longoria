@extends('layouts.app')

@section('body')
<div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Editar proveedor</h3>
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
                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="POST" action="{{ route('proveedores.update', ['proveedor'=>$proveedor->id]) }}" >
                      {{ method_field('PUT') }}
                          {!! csrf_field() !!}
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Nombre
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="nombre" required class="form-control col-md-7 col-xs-12" value="{{$proveedor->nombre}}">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Apellidos
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="apellidos" required class="form-control col-md-7 col-xs-12" value="{{$proveedor->apellidos}}">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Tipo de documento
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="tipo_documento" required class="form-control col-md-7 col-xs-12" value="{{$proveedor->tipo_documento}}">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Numero de documento
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="num_documento" required class="form-control col-md-7 col-xs-12" value="{{$proveedor->num_documento}}">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Direccion
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="direccion" required class="form-control col-md-7 col-xs-12" value="{{$proveedor->direccion}}">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Telefono
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="telefono" required class="form-control col-md-7 col-xs-12" value="{{$proveedor->telefono}}">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">E-mail
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="email" name="email" required class="form-control col-md-7 col-xs-12" value="{{$proveedor->email}}">
                        </div>
                      </div>
                       <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Contacto
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="contacto" required class="form-control col-md-7 col-xs-12" value="{{$proveedor->contacto}}">
                        </div>
                      </div>
                       <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Telefono del contacto
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="telefono_contacto" required class="form-control col-md-7 col-xs-12" value="{{$proveedor->telefono_contacto}}">
                        </div>
                      </div>
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          
                          <button type="submit" class="btn btn-success">Editar</button>
                        </div>
                      </div>

                    </form>
                  </div>
                </div>
              </div>
            </div>

          
          </div>
@endsection
