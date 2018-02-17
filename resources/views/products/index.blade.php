@extends('layouts.app')
@section('body-class','profile-page')
@section('content')
<div class="header header-filter" style="background-image: url('/img/home.jpg');"></div>

<div class="main main-raised">
  <div class="profile-content">
    <div class="container">
      <div class="row">
        <div class="profile">
          <div class="name">
            @if (session('notitication'))
            <br>
            <div class="alert alert-success">
              {{ session('notitication') }}
            </div>
            @endif
            <h3 class="title">{{ $product->name }}</h3>
            <h6>{{ $product->category_nam }}</h6>
          </div>
        </div>
      </div>
      @if(!isset($_GET))
      {{ back() }}
      @endif
      @if(isset($_GET))
      <div class="row">
        <div class="col-md-3">
          <div class="text-center">
            <a href="{{ URL::previous() }}" class="btn btn-primary btn-round" >
              <i class="material-icons">add</i> Regresar
            </a>
          </div>
        </div>
        <div class="col-md-9 text-right">
          <form class="form-inline" action="{{ url('/search') }}" method="get">
            <input class="form-control" id="search" type="text" name="query" placeholder="¿Qué producto necesitas?">
            <button class="btn btn-primary btn-just-icon" type="submit">
              <i class="material-icons">search</i>
            </button>
          </form>
        </div>
      </div>
      @endif
      <div class="row">
          <div class="col-md-6 ">
            <div class="profile-tabs">
              <div class="nav-align-center">
                <div class="tab-content gallery">
                  <div class="tab-pane active" id="studio">
                    <div class="row">
                      <div class="col-md-5">
                        @foreach ( $imagesLeft as $imglegt)
                        <img src="{{ $imglegt->url }}" class="img-rounded"  height="200"/>
                        @endforeach
                      </div>

                      <div class="col-md-5">
                        @foreach ( $imagesRight as $img)
                        <img src="{{ $img->url }}" class="img-rounded" />
                        @endforeach
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- End Profile Tabs -->
          </div>
        <div class="col-md-4 text-left ">
            <div class="description text-center">
              <p>Nombre comerical: <b> {{ $product->tradename }} </b></p>
            </div>
            <div class="description text-center">
              <p>Presentacion: <b> {{ $product->presentation }} </b></p>
              </div>
            <div class="description text-center">
              <p>Consentracion : <b> {{ $product->concentration }} </b></p>
              </div>
            <div class="description text-center">
              <p>Precio :$ <b> {{ $product->price }} </b></p>
            </div>

            @if( $product->laboratory_id != null )
            <div class="description text-center">
              <p>Labororio : <b> {{ $product->laboratory->name }} </b></p>
            </div>
            @endif
        </div>

      </div>
</div>
  </div>
</div>
@include('includes.footer');
@endsection
