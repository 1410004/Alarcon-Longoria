@extends('layouts.app')

@section('body')
<div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Proveedores </h3>
              </div>

            
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                
                  <div class="x_content">
                    <p class="text-muted font-13 m-b-30">
                        Informacion del proveedor
                    </p>
                    <hr>
                    <h5>Nombre: {{$proveedor->nombre}}</h5>
                    <hr>
                    <h5>Apellidos: {{$proveedor->apellidos}}</h5>
                    <hr>
                    <h5>Tipo de documento: {{$proveedor->tipo_documento}}</h5>
                    <hr>
                    <h5>Numero de documento: {{$proveedor->num_documento}}</h5>
                    <hr>
                    <h5>Direccion: {{$proveedor->direccion}}</h5>
                    <hr>
                    <h5>Telefono: {{$proveedor->telefono}}</h5>
                    
                    <hr>
                    <h5>Correo electronico: {{$proveedor->email}}</h5>
                    
                    <hr>
                    <h5>Contacto: {{$proveedor->contacto}}</h5>
                    
                    <hr>
                    <h5>Telefono de contacto: {{$proveedor->telefono_contacto}}</h5>
                    
                    
                  </div>
                </div>
              </div>

             

          

            
            </div>
          </div>

@endsection