@extends('layouts.app')
@section('page-title',config('app.name').'-Registro')
@section('body-class','signup-page')
@section('content')
<div class="header header-filter" style="background-image:  url('img/home.jpg'); background-size: cover; background-position: top center;">
  <div class="container">
    <div class="row text-center">
      <div class="col-md-4">
        <div class="card card-signup">
          <div class="card">
            <h3 class="card-header">Básico</h3>
            <div class="card-block">
              <h4 class="card-title">Free</h4>
              <p class="card-text">Acceso a  la aplicacion movil y web</p>
              <p class="card-text">Realizar busquedas por nombre comercial</p>
              <a href="{{ url('/home') }}" class="btn btn-success">Obtener</a>
            </div>
            <div class="card-footer text-muted">
              <h6 class="title">$ 0.0</h6>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card card-signup">
          <div class="card">
            <h3 class="card-header">Premium</h3>
            <div class="card-block">
              <h4 class="card-title"></h4>
              <p class="card-text">Acceso a plataforma y aplicacion movil</p>
              <p class="card-text">Busquedas con filtros por componentes,nombre comercial, nombre generico y laboratorio)</p>
              <p class="card-text">Lista de favoritos</p>
              <a href="{{ url('/register') }}" class="btn btn-success">Obtener</a>
            </div>
            <div class="card-footer text-muted">
              <h6 class="title">$ 2.99</h6>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card card-signup">
          <div class="card">
            <h3 class="card-header">Empresarial</h3>
            <div class="card-block">
              <h4 class="card-title">Anunciante</h4>
              <p class="card-text">Acceso a la plataforma.</p>
              <p class="card-text">Promocinar catalogo de productos</p>
              <p class="card-text">Estadisticas de busquedas en tiempo real,</p>
              <p class="card-text">donde y en que lugar. </p>
              <a href="{{ url('/register') }}" class="btn btn-success">Obtener</a>
            </div>
            <div class="card-footer text-muted">
            <h6 class="title">$ 35.99</h6>
            </div>
          </div>
        </div>
      </div>

    </div>
    @include('includes.footer');
  </div>
</div>
@endsection
@section('scripts')
<script src="{{ asset('js/material-kit.js') }}" ></script>

@endsection
