@extends('layouts.app')

@section('body')
<div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Clientes </h3>
              </div>

            
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                
                  <div class="x_content">
                    <p class="text-muted font-13 m-b-30">
                        Informacion del cliente
                    </p>
                    <hr>
                    <h5>Nombre: {{$cliente->nombre}}</h5>
                    <hr>
                    <h5>Apellidos: {{$cliente->apellidos}}</h5>
                    <hr>
                    <h5>Tipo de documento: {{$cliente->tipo_documento}}</h5>
                    <hr>
                    <h5>Numero de documento: {{$cliente->num_documento}}</h5>
                    <hr>
                    <h5>Direccion: {{$cliente->direccion}}</h5>
                    <hr>
                    <h5>Telefono: {{$cliente->telefono}}</h5>
                    
                    <hr>
                    <h5>Correo electronico: {{$cliente->email}}</h5>
                    
                    
                  </div>
                </div>
              </div>

             

          

            
            </div>
          </div>

@endsection