@extends('layouts.app-admin')
@section('page-title','Categorias')
@section('content')
@section('navbar-name','Categorias')
@section('state2','active')
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header" data-background-color="purple">
        <h4 class="title">Categoria</h4>
        <p class="category">Listado de Categorias</p>
      </div>
      <div class="text-center">
        <a href="{{ url('admin/categories/create') }}" class="btn btn-success btn-fill btn-round">Nueva Categoria</a>
      </div>
      <div class="card-content table-responsive">
        <table class="table">
          <thead class="text-primary">
            <th>Nombre</th>

            <th>Descripcion</th>
            <th colspan="2">Acciones hola</th>
          </thead>
          <tbody>

            @foreach ($categories as $row)
            <tr>
              <td>{{ $row->name }}</td>

              <td>{{ $row->description }}</td>
              <td>
                <td class="td-actions text-right">
                  <form action="{{ url('/admin/categories/'.$row->id) }}" method="post">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <a href="{{ url('/admin/categories/'.$row->id) }}" type="button" rel="tooltip" title="Ver Categoria" class="btn btn-info btn-simple btn-xs" target="_blank">
                      <i class="fa fa-info"></i>
                    </a>
                    <a href="{{ url('/admin/categories/'.$row->id.'/edit') }}" type="button" rel="tooltip" title="Editar Categoria" class="btn btn-success btn-simple btn-xs">
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
          {{ $categories->links() }}
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
