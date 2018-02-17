@extends('layouts.app-admin')
@section('page-title','Productos')
@section('content')
@section('navbar-name','Productos')
@section('state4','active')
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header" data-background-color="purple">
        <h4 class="title">Productos</h4>
        <p class="category">Listado de Productos</p>
      </div>
      <div class="text-center">
        <a href="{{ url('admin/products/create') }}" class="btn btn-success btn-fill btn-round">Nuevo Producto</a>
      </div>
      <div class="card-content table-responsive">
        <table class="table">
          <thead class="text-primary">
            <th>Nombre</th>
            <th>Nombre Comercial</th>
            <th>Presentacion</th>
            <th>Consentracion</th>
            <th>Precio</th>
            <th colspan="2">Acciones</th>
          </thead>
          <tbody>
            
            @foreach ($products as $row)
            <tr>
              <td>{{ $row->name }}</td>
              <td>{{ $row->tradename }}</td>
              <td>{{ $row->presentation }}</td>
              <td>{{ $row->concentration }}</td>
              <td>$ {{ $row->price }}</td>

              <td>
                <td class="td-actions text-right">
                  <form action="{{ url('/admin/products/'.$row->id) }}" method="post">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <a href="{{ url('/admin/products/show/  '.$row->id) }}" type="button" rel="tooltip" title="Ver Producto" class="btn btn-info btn-simple btn-xs" data-toggle="modal" data-target="#modalAddToCart">
                      <i class="fa fa-info"></i>
                    </a>
                    <a href="{{ url('/admin/products/'.$row->id.'/images') }}" type="button" rel="tooltip" title="Imágenes  del Producto" class="btn btn-warning btn-simple btn-xs">
                                  <i class="fa fa-image"></i>
                              </a>
                    <a href="{{ url('/admin/products/'.$row->id.'/edit') }}" type="button" rel="tooltip" title="Editar Producto" class="btn btn-success btn-simple btn-xs">
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
        <div class="text-center">
          {{ $products->links() }}
        </div>
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
        <h4 class="modal-title" id="myModalLabel">Informacion del producto </h4>
        <hr>
      </div>
        <div class="modal-body">
          <div class="card-content table-responsive">
            <table class="table">
              <thead class="text-info">
                <th>Laboratorio</th>
                <th>Componentes</th>
                <th>Categoria</th>
              </thead>
              <tbody>
                @if(isset($product))
                @foreach ($product as $row)
                <tr>
                  <td>{{ $row->name }}</td>
                  <td>{{ $row->concentration }}</td>
                  <td>{{ !isset($row->category->name) ?: $row->category->name }}</td>
                </tr>
                @endforeach
                @endif
              </tbody>
            </table>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default btn-simple" data-dismiss="modal">Cancelar</button>
          <button type="submit" class="btn btn-info btn-simple">Añadir</button>
        </div>

    </div>
  </div>
</div>
<!-- Modal Core -->
<div class="modal fade" id="modalAdd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Informacion del producto </h4>
        <hr>
      </div>
        <div class="modal-body">
          <div class="card-content table-responsive">
            <table class="table">
              <thead class="text-info">
                <th>Laboratorio</th>
                <th>Componentes</th>
                <th>Categoria</th>
                <th>Consentacion</th>
                <th colspan="2">Acciones</th>
              </thead>
              <tbody>
                @foreach ($products as $row)
                <tr>
                  <td>{{ $row->name }}</td>
                  <td>{{ $row->tradename }}</td>
                  <td>{{ $row->presentation }}</td>
                  <td>{{ $row->concentration }}</td>
                  <td>
                    <td class="td-actions text-right">
                      <form action="{{ url('/admin/products/'.$row->id) }}" method="post">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <a href="{{ url('/products/'.$row->id) }}" type="button" rel="tooltip" title="Ver Producto" class="btn btn-info btn-simple btn-xs" data-toggle="modal" data-target="#modalAddToCart">
                          <i class="fa fa-info"></i>
                        </a>
                        <a href="{{ url('/admin/products/'.$row->id.'/edit') }}" type="button" rel="tooltip" title="Editar Producto" class="btn btn-success btn-simple btn-xs">
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
        <div class="modal-footer">
          <button type="button" class="btn btn-default btn-simple" data-dismiss="modal">Cancelar</button>
          <button type="submit" class="btn btn-info btn-simple">Añadir</button>
        </div>

    </div>
  </div>
</div>
@endsection
