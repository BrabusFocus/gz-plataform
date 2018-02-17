@extends('layouts.app-admin')
@section('page-title','Sucursales')
@section('content')
@section('navbar-name','Sucursales')
@section('state3','active')
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header" data-background-color="purple">
        <h4 class="title">Sucursales</h4>
        <p class="category">Listado de Sucursales</p>
      </div>
      <div class="text-center">
        <a href="{{ url('admin/branch/create') }}" class="btn btn-success btn-fill btn-round">Nueva Sucursal</a>
      </div>
      <div class="card-content table-responsive">
        <table class="table">
          <thead class="text-primary">
            <th>Nombre</th>
            <th>Telefeno</th>
            <th>Direccion</th>
            <th colspan="2">Acciones</th>
          </thead>
          <tbody>
            @foreach ($branch as $row)
            <tr>
              <td>{{ $row->name }}</td>
              <td>{{ $row->phone }}</td>
              <td>{{ $row->desription }}</td>
              <td>
                <td class="td-actions text-right">
                      <form action="{{ url('/admin/branch/'.$row->id) }}" method="post">
                          {{ csrf_field() }}
                          {{ method_field('DELETE') }}
                          <a href="{{ url('/admin/branch/'.$row->id) }}" type="button" rel="tooltip" title="Asociar Sucursal-Categoria" class="btn btn-success btn-simple btn-xs"  data-toggle="modal" data-target="#modalAddToCart">
                            <i class="fa fa-plus"></i>
                          </a>
                          <a href="{{ url('/admin/branch/'.$row->id) }}" type="button" rel="tooltip" title="Ver Sucursal" class="btn btn-info btn-simple btn-xs" target="_blank">
                              <i class="fa fa-info"></i>
                          </a>
                          <a href="{{ url('/admin/branch/'.$row->id.'/edit') }}" type="button" rel="tooltip" title="Editar Sucursal" class="btn btn-success btn-simple btn-xs">
                              <i class="fa fa-edit"></i>
                          </a>
                          <button type="submit" rel="tooltip" title="Elminar" class="btn btn-danger btn-simple btn-xs">
                              <i class="fa fa-times"></i>
                          </button>
                      </form>
                  </td>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
<!-- Modal Core -->
<div class="modal fade" id="modalAddToCart" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Vincular Categoria</h4>
      </div>
      <form class="" action="{{ url('/admin/branch/associatte') }}" method="post">
        {{ csrf_field() }}
        <input type="hidden" name="branch_office_id" value="{{ !isset($row->id) ?: $row->id }}" >
        <div class="modal-body">
          <div class="col-md-6">
            <div class="form-group label-floating">
                <label class="control-label">Seleccione La categoria</label>
                  <select class=" form-control" name="category_id">
                        <option value="0">General</option>
                        @if(isset($categories))
                          @foreach ($categories as $row)
                              <option value="{{ $row->id }}">{{ $row->name }}</option>
                          @endforeach
                          @endif
                  </select>
              </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default btn-simple" data-dismiss="modal">Cancelar</button>
          <button type="submit" class="btn btn-info btn-simple">Añadir</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection
