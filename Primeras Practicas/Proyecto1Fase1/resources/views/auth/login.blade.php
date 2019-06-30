@extends('layouts.login')

@section('content')
  
<form action="{{ route('login') }}" method="post">
      {!! csrf_field() !!}
    <h1>Iniciar Sesion</h1>
    <div>
      <input type="text" name="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="Correo electronico" required="" />
      @if  ($errors->has('email'))
          <span class="invalid-feedback" role="alert">
              <strong>{{ $errors->first('email') }}</strong>
          </span>
          @endif
    </div>
    <div>
      <input type="password" name="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="Contraseña" required="" />
      @if  ($errors->has('password'))
          <span class="invalid-feedback" role="alert">
              <strong>{{ $errors->first('password') }}</strong>
          </span>
          @endif
    </div>
    <div>
      <center>
      
        <button type="submit" class="btn btn-default submit"> Acceder</button>
        </center>
    </div>

    <div class="clearfix"></div>
  </form>

@endsection
