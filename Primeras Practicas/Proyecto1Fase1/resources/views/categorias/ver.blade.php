@extends('layouts.app')

@section('body')
<div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Categorias </h3>
              </div>

            
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                
                  <div class="x_content">
                    <p class="text-muted font-13 m-b-30">
                        Informacion de categoria
                    </p>
                    <hr>
                    <h5>Nombre: {{$categoria->nombre}}</h5>
                    <hr>
                    <h5>Descripcion: {{$categoria->descripcion}}</h5>
                    
                    
                  </div>
                </div>
              </div>

             

          

            
            </div>
          </div>

@endsection