@extends('layouts.app')
@section('page-title','Bienvenido a '.config('app.name'))
@section('body-class','landing-page')
@section('styles')
<style>
.team .row .col-md-4{
  margin-bottom: 5em;
}
.team .row {
  display: -webkit-box;
  display: -webkit-flex;
  display: -ms-flexbox;
  display: flex;
  flex-wrap: wrap;
}
.team .row > [class*='col-']{
  display: flex;
  flex-direction: column;
}
.tt-query {
  -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
  -moz-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
  box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
}

.tt-hint {
  color: #999
}

.tt-menu {    /* used to be tt-dropdown-menu in older versions */
  width: 220px;
  margin-top: 4px;
  padding: 4px 0;
  background-color: #fff;
  border: 1px solid #ccc;
  border: 1px solid rgba(0, 0, 0, 0.2);
  -webkit-border-radius: 4px;
  -moz-border-radius: 4px;
  border-radius: 4px;
  -webkit-box-shadow: 0 5px 10px rgba(0,0,0,.2);
  -moz-box-shadow: 0 5px 10px rgba(0,0,0,.2);
  box-shadow: 0 5px 10px rgba(0,0,0,.2);
}

.tt-suggestion {
  padding: 3px 20px;
  line-height: 24px;
}

.tt-suggestion.tt-cursor,.tt-suggestion:hover {
  color: #fff;
  background-color: #0097cf;

}

.tt-suggestion p {
  margin: 0;
}
</style>
@endsection

@section('content')
<div class="header header-filter" style="background-image: url('img/home.jpg');">

  <div class="container">
    <div class="row">
      <div class="col-md-12 text-center">
        <h1 class="logo cursive">Bienvenido a {{ config('app.name') }}</h1>
        <h4>Realice busquedas de los medicamentos que necesite.</h4>
        <br />
        <a href="#" class="btn btn-danger btn-raised btn-lg">
          <i class="fa fa-play"></i> ¿ Cómo funciona?
        </a>
      </div>
    </div>
  </div>
</div>

<div class="main main-raised">
  <div class="container">
    <div class="section text-center section-landing">
      <div class="row">
        <div class="col-md-8 col-md-offset-2">
          <h2 class="title">¿Porqué {{ config('app.name') }} ?</h2>
          <h5 class="description">Porque es un nuevo canal para dar a conocer tus productos a nuevos clientes. Además Puedes visualizar de manera completa las búsquedas de productos (medicamentos) efectuadas por tus nuevos clientes. Por ejemplo dar respuesta a estas interrogantes . Qué medicamentos son mas demandados,Donde y en que lugar, Porqué motivo (precio,calidad,marca etc)?.</h5>
        </div>
      </div>

      <div class="features">
        <div class="row">
          <div class="col-md-4">
            <div class="info">
              <div class="icon icon-primary">
                <i class="material-icons">chat</i>
              </div>
              <h4 class="info-title">Herramienta Estrategica</h4>
              <p>Acceso a información de las busquedas generales.
              </p>
            </div>
          </div>
          <div class="col-md-4">
            <div class="info">
              <div class="icon icon-primary">
                <i class="material-icons">chat</i>
              </div>
              <h4 class="info-title">Aclaramos tus dudas</h4>
              <p>Respodemos rapidamente tus dudas via chat, en nuestra plataforma
                no estas solo, se cuenta con personal calificado para sulucionar tus inquietudes.
              </p>
            </div>
          </div>
          <div class="col-md-4">
            <div class="info">
              <div class="icon icon-success">
                <i class="material-icons">verified_user</i>
              </div>
              <h4 class="info-title">Nuevo mercado de ventas.</h4>
              <p>Através de nuestro servicio, tu empresa farmaceutica pondra a dispocion de nuevos clientes el catalogo de productos, permitiendoles ver precios y farmacia mas cercana.</p>
              </div>
            </div>
            <div class="col-md-4">
              <div class="info">
                <div class="icon icon-danger">
                  <i class="material-icons">fingerprint</i>
                </div>
                <h4 class="info-title">Información Privada</h4>
                <p>Tu Información no se comparte con terceros.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="section text-center">
            <h2 class="title">¿Qué producto necesitas?</h2>
            <form class="form-inline" action="{{ url('/search') }}" method="get">
              <input class="form-control" id="search" type="text" name="query" placeholder="¿Qué necesitas?">
              <button class="btn btn-primary btn-just-icon" type="submit">
                <i class="material-icons">search</i>
              </button>
            </form>

            <div class="team">
              <div class="row">

              </div>
            </div>

          </div>
        </div>

      </div>

      <div class="section landing-section">
        <div class="row">
          <div class="col-md-8 col-md-offset-2">
            <h2 class="text-center title">¿Aún no te has registrado?</h2>
            <h4 class="text-center description">Registrate.</h4>
            <form class="contact-form" method="get" action="/register">

              <div class="row">
                <div class="col-md-6">
                  <div class="form-group label-floating">
                    <label class="control-label">Nombre</label>
                    <input type="email" class="form-control">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group label-floating">
                    <label class="control-label">Correo Eléctronico</label>
                    <input type="email" class="form-control">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-4 col-md-offset-4 text-center">
                  <button class="btn btn-primary btn-raised">
                    Inicar Registro
                  </button>
                </div>
              </div>
            </form>
          </div>
        </div>

      </div>
    </div>

  </div>
  @include('includes.footer')
  @endsection
  @section('scripts')
  <script src="{{ asset('js/typeahead.bundle.min.js') }}"></script>
  	<script src="{{ asset('js/material-kit.js') }}" ></script>
  <script>
  $(function () {
      // constructs the suggestion engine (motor de  sugerencia Bloodhound)
      var products = new Bloodhound({
        datumTokenizer: Bloodhound.tokenizers.whitespace,
        queryTokenizer: Bloodhound.tokenizers.whitespace,
        // Definir arreglo
        prefetch:'{{ url("/products/json") }}',
      });
      // Inicializar typeahead sobre nuestro input de busqueda
      $('#search').typeahead({
        hint: true,
        highlight: true,
        minLength: 1
      },
      {
        name: 'products',
        source: products
      });
    });
    </script>
  @endsection
