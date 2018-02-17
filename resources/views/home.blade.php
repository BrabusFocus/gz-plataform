@extends('layouts.app')
@section('body-class','product-page')
@section('content')
<div class="header header-filter" style="background-image:  url('img/home.jpg');">
</div>

<div class="main main-raised">
  <div class="container">
    <div class="section">
      <h2 class="title">Bievenido {{ auth()->user()->name }}</h2>
      @if (session('notitication'))
      <div class="alert alert-success">
        {{ session('notitication') }}
      </div>
      @endif
      <ul class="nav nav-pills nav-pills-danger" role="tablist">
        <!--
        color-classes: "nav-pills-primary", "nav-pills-info", "nav-pills-success", "nav-pills-warning","nav-pills-danger"
      -->
      <li class="nav-item active">
        <a class="nav-link" href="#dashboard-1" role="tab" data-toggle="tab">
          <i class="material-icons">search</i>
          Buscar
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link active" href="#schedule-1" role="tab" data-toggle="tab">
          <i class="material-icons">favorite</i>
          Favoritos
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#tasks-1" role="tab" data-toggle="tab">
          <i class="material-icons">list</i>
          Tareas
        </a>
      </li>
    </ul>
    <div class="tab-content tab-space">
      <div class="tab-pane active" id="dashboard-1">
        <div class="row">
          <div class="col-md-8">
            <div class="form-group">
              <form class="navbar-form  navbar-left  pull-rigth" action="{{ url('/home') }}" method="GET">
                <div class="form-group">
                  <input class="form-control mr-sm-2" type="text"  id='search'  name='query' placeholder="Buscar">
                </div>
                <div class="form-group">
                  <b>Filtrar</b>
                  <select class="form-control" id="optionSelect" name="option">
                    <option value="0">General</option>
                    <option value="1">Nombre Comerical</option>
                    <option value="2">componentes</option>
                    <option value="3">Laboratorio</option>

                  </select>

                </div>
              </form>
            </div>
            <table  id="table-data" class="table ">
              <thead class="thead-inverse">
                <tr>
                  <th>#</th>
                  <th >Nombre Generico</th>
                  <th >Nombre Comercial</th>
                  <th >Precio</th>
                  <th >Componentes</th>
                  <th colspan="2">Accion</th>
                </tr>
              </thead>
              <tbody id="datos">
                @foreach($products as $key => $row )
                <tr>
                  <td scope="row">{{ ($key+1) }}</td>
                  <td scope="row">{{ $row->name }}</td>
                  <td scope="row">{{ $row->tradename }}</td>
                  <td scope="row">{{ $row->price }}</td>
                  <td scope="row">{{ $row->components }}</td>
                  <td><a href="#" type="button" rel="tooltip" title="Añadir a Favoritos" class="btn btn-info btn-simple btn-xs">
                    <i class="fa fa-plus"></i>
                  </a></td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <div class="tab-pane" id="schedule-1">
        <h4>En desarrollo...</h4>
      </div>
      <div class="tab-pane" id="tasks-1">
        <div class="row">
          <div class="col-md-8">
            <h4>En desarrollo...</h4>
          </div>
        </div>

      </div>
    </div>

  </div>
</div>
</div>
@include('includes.footer');
@endsection
@section('scripts')
<script src="{{ asset('js/jquery-3.3.1.min.js') }}"  type="text/javascript" ></script>
<script>
$(document).ready(function(){
  $('#search').keyup(function(){
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
    var op = $('#optionSelect option:selected').val();

    var value = $(this).val();
    if (value === ''){
      $.getJSON('/home/json/'+op+'/'+'test', function(data){
        var count = data.length;
        var datos = "";
        for (i = 0; i < count; i++){
          datos += "<tr>";
          datos += "<td>"+(i+1)+"</td>";
          datos += "<td>"+data[i].name+"</td>";
          datos += "<td>"+ data[i].tradename+"</td>";
          datos += "<td>"+data[i].price+"</td>";
          datos += "<td>"+data[i].components+"</td>";
          datos += '<td>';
          datos += '<span value ="'+data[i].user_id +'" class="glyphicon glyphicon-eye-open detalle"></span>';
          datos += "</td>";
          datos += '<td>'
          datos += '<a href="{{ url('/admin/products/show/data[i].user_id+') }}" </a>';
          datos += "</td>";
          datos += "</tr>";
        }
        $('#table-data tbody').html(datos);

      });
    } else {
      var op = $('#optionSelect option:selected').val();
      $.getJSON('/home/json/'+op+'/'+value, function(data){
        var count = data.length;
        var datos = "";
        for (i = 0; i < count; i++){
          datos += "<tr>";
          datos += "<td>"+(i+1)+"</td>";
          datos += "<td>"+data[i].name+"</td>";
          datos += "<td>"+ data[i].tradename+"</td>";
          datos += "<td>"+data[i].price+"</td>";
          datos += "<td>"+data[i].components+"</td>";
          datos += '<td>';
          datos += '<span value ="'+data[i].user_id +'" class="glyphicon glyphicon-eye-open detalle"></span>';
          datos += "</td>";
          datos += '<td>'
          datos += '<a href="{{ url('/admin/products/show/data[i].user_id+') }}" </a>';
          datos += "</td>";
          datos += "</tr>";
        }
        $('#table-data tbody').html(datos);
        });
    }
  });
});
</script>
@endsection
