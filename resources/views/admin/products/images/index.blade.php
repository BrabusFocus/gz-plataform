@extends('layouts.app-admin')
@section('page-title','Sucursales')
@section('content')
@section('navbar-name','Sucursales')
@section('state3','active')
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header" data-background-color="purple">
        <h4 class="title">Producto</h4>
        <p class="category">Listado de Imagenes</p>
      </div>
      <div class="card-content">

        @if($images)
        <div class="row">
          <div class="col-md-6">
            <div class="alert alert-info">
                <button type="button" aria-hidden="true" class="close">×</button>
                <span>
                    <b> Informacion - </b> </span>
            </div>
          </div>
        </div>
        @endif
        <form class="" action="" method="post" enctype="multipart/form-data">
          <div class="row">
            {{ csrf_field() }}
            <div class="col-md-4">
              <a  href="{{ url('admin/products') }}"class="btn btn-default btn-fill btn-round">Regresar al listado de productos</a>
           </div>
            <div class="col-md-5">
              <button type="submit" class="btn btn-success btn-fill btn-round">Añadir nueva imagen</button>
            </div>
          </div>
          <div class="row">
            <div class="col-md-4">
              <input type="file" name="photo" value="" required>
            </div>
          </div>
        </form>
        <div class="row">
          @foreach ($images as $image)
          <div class="col-md-4">
            <div class="panel panel-default">
              <div class="panel-body">
                <img src="{{ $image->url }}" alt="" width="250">
                <form class="" action="" method="post">
                  {{ csrf_field() }}
                  {{ method_field('DELETE') }}
                  <input type="hidden" name="image_id" value="{{ $image->id }}">
                  @if ( $image->featured )
                  <button type="button" class="btn btn-info btn-fab btn-fab-mini btn-round" rel="tooltip" title="Imagen destacada actualmente" name="button"><i class="material-icons">favorite</i></button>
                  @else
                  <a href=" {{ url('/admin/products/'.$product->id.'/images/select/'.$image->id) }}" class="btn btn-primary btn-fab btn-fab-mini btn-round"  name="button"><i class="material-icons">favorite</i></a>
                  @endif
                  <button type="submit" class="btn btn-danger btn-round">Eliminar imgen</button>
                </form>
              </div>
            </div>
          </div>
          @endforeach
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
