@extends('layouts.app')
@section('body-class','profile-page')
@section('content')
<div class="header header-filter" style="background-image: url('/img/home.jpg');"></div>

<div class="main main-raised">
  <div class="profile-content">
    <div class="container">
      <div class="row">
        <div class="profile">
          <div class="avatar">
            <img src="{{ $product->featured_image_url }}" alt="Circle Image" class="img-circle img-responsive img-raised">
          </div>
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
      <div class="row text-right">
        <div class="col-md-m2 ">
          <div class="description text-center">
            <p>Nombre comerical: <b> {{ $product->tradename }} </b></p>
          </div>
        </div>
        <div class="col-md-m2 ">
          <div class="description text-center">
            <p>Presentacion: <b> {{ $product->presentation }} </b></p>
          </div>
          <div class="description text-center">
            <p>Consentracion : <b> {{ $product->concentration }} </b></p>
          </div>
        </div>
        <div class="col-md-m2 ">
          <div class="description text-center">
            <p>Precio :$ <b> {{ $product->price }} </b></p>
          </div>
        </div>
      </div>
      @if( auth()->check() )

      <div class="text-center">
        <a href="{{ url('/') }}" class="btn btn-primary btn-round" >
          <i class="material-icons">add</i> Regresar
        </a>
      </div>
      @endif
      <div class="row">
        <div class="col-md-6 col-md-offset-3">
          <div class="profile-tabs">
            <div class="nav-align-center">
              <div class="tab-content gallery">
                <div class="tab-pane active" id="studio">
                  <div class="row">
                    <div class="col-md-6">
                      @foreach ( $imagesLeft as $imglegt)
                      <img src="{{ $imglegt->url }}" class="img-rounded" />
                      @endforeach
                    </div>

                    <div class="col-md-6">
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
      </div>

    </div>
  </div>
</div>
@include('includes.footer');
@endsection
