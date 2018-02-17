@extends('layouts.app-admin')
@section('page-name','Productos')
@section('content')
@section('navbar-name','Productos')
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header" data-background-color="red">
        <h4 class="title">Productos</h4>
        <p class="category">Complete el formulario siguiente</p>
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
        <form action="{{ url('/admin/products') }}" method="POST">
           {{ csrf_field() }}
          <div class="row">
            <div class="col-md-5">
              <div class="form-group label-floating">
                <label class="control-label">Nombre Generico</label>
                <input type="text" name="name"  value="{{ old('name') }}" class="form-control">
              </div>
            </div>
            <div class="col-md-5">
              <div class="form-group label-floating">
                <label class="control-label">Nombre Comercial</label>
                <input type="text" name="tradename"  value="{{ old('tradename') }}" class="form-control">
              </div>
            </div>
            <div class="col-md-2">
              <div class="form-group label-floating">
                <label class="control-label">Precio: $</label>
                <input type="number" name="price"  value="{{ old('price') }}" class="form-control" step="0.01" min="0">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-4">
              <div class="form-group label-floating">
                <label class="control-label">Presentacion</label>
                <input type="text" name="presentation"  value="{{ old('presentation') }}" class="form-control">
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group label-floating">
                <label class="control-label">Concentracion</label>
                <input type="text"  name="concentration"  value="{{ old('concentration') }}" class="form-control">
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group label-floating">
                <label class="control-label">Categoria</label>
                <select class=" form-control" name="category_id">
                  <option value="0">General</option>
                  @foreach ($categories as $row)
                  <option value="{{ old('category_id',$row->id) }}" >{{ $row->name }}</option>
                  @endforeach
                </select>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-8">
              <div class="form-group label-floating">
                <label class="control-label">Componentes</label>
                  <textarea  name="components" class="form-control" rows="4">{{ old('components') }}</textarea>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group label-floating">
                <label class="control-label">Laboratorio</label>
                <select class=" form-control" name="laboratory_id">
                  <option value="0">General</option>
                  @foreach ($laboratories as $row)
                  <option value="{{ old('laboratory_id',$row->id) }}" >{{ $row->name }}</option>
                  @endforeach
                </select>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-8">
              <div class="form-group label-floating">
                <label class="control-label">Descripción</label>
                  <textarea  name="description" class="form-control" rows="4">{{ old('description') }}</textarea>
              </div>
            </div>
          </div>
          <button type="submit" class="btn btn-dan ger pull-right">Guardar</button>
          <div class="clearfix"></div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
