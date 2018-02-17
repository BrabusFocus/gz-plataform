@extends('layouts.app-admin')
@section('page-title','Sucursal')
@section('content')
@section('navbar-name','Sucursal')
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header" data-background-color="purple">
        <h4 class="title">Sucursal</h4>
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
        <form action="{{ url('/admin/branch') }}" method="POST">
           {{ csrf_field() }}
           <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
          <div class="row">
            <div class="col-md-5">
              <div class="form-group label-floating">
                <label class="control-label">Nombre</label>
                <input type="text"  name="name" value="{{ old('name') }}" class="form-control" >
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group label-floating">
                <label class="control-label">Telefono</label>
                <input type="tel"  name="phone" value="{{ old('phone') }}" class="form-control">
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group label-floating">
                  <label class="control-label">Horario de Atencion</label>
                    <select class=" form-control" name="category_id">
                          <option value="0">General</option>

                    </select>
                </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label>Direccion</label>
                <div class="form-group label-floating">
                  <textarea  name="desription" class="form-control" rows="5">{{ old('desription') }}</textarea>
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
