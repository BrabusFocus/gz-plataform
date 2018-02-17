@extends('layouts.app')
@section('page-title',config('app.name').'-Registro')
@section('body-class','signup-page')
@section('content')
<div class="header header-filter" style="background-image:  url('img/home.jpg'); background-size: cover; background-position: top center;">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="card card-signup">
          @if ($errors->any())
          <div class="alert alert-danger">
            <ul>
              @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
          @endif
          <form class="form" method="POST" action="{{ route('register') }}">
            {{ csrf_field() }}
            <!-- REcibir valor de rol   -->
            <input id="rol" type="hidden" class="form-control" name="rol" value="2">
            <div class="header header-danger text-center">
              <h4>Registro</h4>
              <div class="social-line">
                <a href="#pablo" class="btn btn-simple btn-just-icon">
                  <i class="fa fa-facebook-square"></i>
                </a>
                <a href="#pablo" class="btn btn-simple btn-just-icon">
                  <i class="fa fa-twitter"></i>
                </a>
                <a href="#pablo" class="btn btn-simple btn-just-icon">
                  <i class="fa fa-google-plus"></i>
                </a>
              </div>
            </div>
            <p class="text-divider">Completa tus datos</p>
            <div class="content">
              <div class="row">
                <div class="col-md-4">
                  <div class="input-group">
                    <span class="input-group-addon">
                      <i class="material-icons">face</i>
                    </span>
                    <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Nombre Completo"  autofocus>
                    @if ($errors->has('name'))
                    <span class="help-block">
                      <strong>{{ $errors->first('name') }}</strong>
                    </span>
                    @endif
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="input-group">
                    <span class="input-group-addon">
                      <i class="material-icons">fingerprint</i>
                    </span>
                    <input id="surnames" type="text" class="form-control" name="surnames" value="{{ old('surnames') }}" placeholder="Apellidos"  required>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="input-group">
                    <span class="input-group-addon">
                      <div class="checkbox">
                        <label>
                          <input type="checkbox"  value="0" name="gender">
                          Femenino
                        </label>
                        <label>
                          <input type="checkbox"  value="1" name="gender">
                          Masculino
                        </label>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-4">
                    <div class="input-group">
                      <span class="input-group-addon">
                        <i class="material-icons"></i>
                      </span>
                      <input id="nit" type="text" class="form-control" name="nit" value="{{ old('nit') }}" placeholder="NIT">
                    </div>

                  </div>
                  <div class="col-md-4">

                    <div class="input-group">
                      <span class="input-group-addon">
                        <i class="material-icons">unique</i>
                      </span>
                      <input id="dui" type="text" class="form-control" name="dui" value="{{ old('dui') }}" placeholder="DUI" maxlength="10">
                    </div>
                  </div>
                  <div class="col-md-4">

                    <div class="input-group">
                      <span class="input-group-addon">
                        <i class="material-icons">unique</i>
                      </span>
                      <input id="nrm" type="text" class="form-control" name="nrm" value="{{ old('nrm') }}" placeholder="NRM"  required>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-4">
                    <div class="input-group">
                      <span class="input-group-addon">
                        <i class="material-icons">book</i>
                      </span>
                      <input id="specialty" type="text" class="form-control" name="specialty" value="{{ old('specialty') }}" placeholder="Especialidad"  required>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="input-group">
                      <span class="input-group-addon">
                        <i class="material-icons">email</i>
                      </span>
                      <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Correo Electronico...">
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="input-group">
                      <span class="input-group-addon">
                        <i class="material-icons">phone</i>
                      </span>
                      <input id="phone" type="phone" class="form-control" name="phone" value="{{ old('phone') }}" placeholder="Telefono">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-4">
                    <div class="input-group">
                      <span class="input-group-addon">
                        <i class="material-icons">phone</i>
                      </span>
                      <input id="celphone" type="celphone" class="form-control" name="celphone" value="{{ old('celphone') }}" placeholder="Celular">
                    </div>
                  </div>
                  <div class="col-md-8">
                    <div class="input-group">
                      <span class="input-group-addon">
                        <i class="material-icons">class</i>
                      </span>
                      <input id="address" type="text" class="form-control" name="address" value="{{ old('address') }}" placeholder="Dirección">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-4">
                    <div class="input-group">
                      <span class="input-group-addon">
                        <i class="material-icons">face</i>
                      </span>
                      <input id="name" type="text" class="form-control" name="username" value="{{ old('username') }}" placeholder="Username"  autofocus>
                      @if ($errors->has('username'))
                      <span class="help-block">
                        <strong>{{ $errors->first('username') }}</strong>
                      </span>
                      @endif
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="input-group">
                      <span class="input-group-addon">
                        <i class="material-icons">lock_outline</i>
                      </span>
                      <input id="password" type="password" class="form-control" name="password" placeholder="Password..." required>
                      @if ($errors->has('password'))
                      <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                      </span>
                      @endif
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="input-group">
                      <span class="input-group-addon">
                        <i class="material-icons">lock_outline</i>
                      </span>
                      <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirmar Contraseña..." required>
                      @if ($errors->has('password'))
                      <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                      </span>
                      @endif
                    </div>
                  </div>
                </div>

                <!-- If you want to add a checkbox to this form, uncomment this code -->

                <div class="checkbox">
                  <label>
                    <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                    Recordar Sesión
                  </label>
                </div>
                <div class="checkbox">
                  <label>
                    <input type="checkbox" name="term" {{ old('termino') ? 'checked' : '' }} required >
                    Acepto terminos y condiciones.
                  </label>
                </div>
              </div>
              <div class="footer text-center">
                <button type="submit" class="btn btn-simple btn-danger btn-lg">Ingresar</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    @include('includes.footer');
  </div>
  @endsection
  @section('scripts')
    <script src="{{ asset('js/material-kit.js') }}" ></script>

  @endsection
