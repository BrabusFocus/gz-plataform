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

        </div>
      </div>
    </div>
    @include('includes.footer');
  </div>
  @endsection
  @section('scripts')
    <script src="{{ asset('js/material-kit.js') }}" ></script>

  @endsection
