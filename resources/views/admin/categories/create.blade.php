@extends('layouts.app-admin')
@section('page-title','Categoría')
@section('content')
@section('navbar-name','Sucursal')
<div class="row">
  <div class="col-md-12 ">
    <div class="card">
      <div class="card-header" data-background-color="purple">
        <h4 class="title">Categoria</h4>
        <p class="category">Llene el fomulario siguiente</p>
      </div>
      <div class="card-content">
        @if ($errors->any())
        <div class="alert alert-danger">
          <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
        @endif
        <form action="{{ url('/admin/categories') }}" method="POST">
           {{ csrf_field() }}
          <div class="row">
            <div class="col-md-6">
              <div class="form-group label-floating">
                <label class="control-label">Nombre</label>
                <input type="text"  name="name" value="{{ old('name') }}" class="form-control" >
              </div>
            </div>
            <div class="col-md-6">
                <label class="control-label">Imagen</label>
                <input type="file"   name="image" >
            </div>
          </div>
            <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label>Descripcion</label>
                <div class="form-group label-floating">
                  <textarea  name="description" class="form-control" rows="3">{{ old('description') }}</textarea>
                </div>
              </div>
            </div>
          </div>
          <button type="submit" class="btn btn-success pull-right">Guardar</button>
          <div class="clearfix"></div>
        </form>
      </div>
    </div>
  </div>
</div>


@endsection
