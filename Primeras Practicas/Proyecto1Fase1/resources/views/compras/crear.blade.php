@extends('layouts.app')

@section('body')
 <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Registrar nuevo ingreso</h3>
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
                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="POST" action="{{ route('compras.store') }}" >
                          {!! csrf_field() !!}
                      
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Proveedor
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select name="id_proveedor" class="form-control col-md-7 col-xs-12">
                            <option value="0">Seleccionar proveedor</option>
                            @foreach($proveedores as $proveedor)
                            <option value="{{$proveedor->id}}">{{$proveedor->nombre}} {{$proveedor->apellidos}}</option>
                            @endforeach
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Articulo
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select name="id_articulo" onchange="cambiarCantidad(this.value)" class="form-control col-md-7 col-xs-12">
                            <option value="0">Seleccionar articulo</option>
                            @foreach($articulos as $articulo)
                            <option value="{{$articulo->id}}">{{$articulo->nombre}}</option>
                            @endforeach
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Cantidad
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="number" name="cantidad" required class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Tipo de comprobante
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="tipo_comprobante" required class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Serie de comprobante
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="serie_comprobante" required class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Numero de comprobante
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="num_comprobante" required class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Impuesto (%)
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="number" name="impuesto" value="0" required class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          
                          @if($proveedores->isNotEmpty())
                            @if($articulos->isNotEmpty())
                            <button type="submit" class="btn btn-success">Guardar</button>
                            @else
                            <h5>No es posible registrar el ingreso. Se requiere un articulo</h5>
                            @endif
                          @else
                          <h5>No es posible registrar el ingreso. Se requiere un proveedor</h5>
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