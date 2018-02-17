@extends('layouts.app')
@section('page-title',config('app.name').' de Sesión')
@section('body-class','signup-page')
@section('content')
<div class="header header-filter" style="background-image:  url('img/home.jpg'); background-size: cover; background-position: top center;">
			<div class="container">
				<div class="row">
					<div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
						<div class="card card-signup">
							<form class="form" method="POST" action="{{ route('login') }}">
                {{ csrf_field() }}
								<div class="header header-danger text-center">
									<h4>Inicio de Sesion</h4>
									<div class="social-line">
										<a href="#pablo" class="btn btn-simple btn-just-icon">
											<i class="fa fa-facebook-square"></i>
										</a>
										<a href="#pablo" class="btn btn-simple btn-just-icon">
											<i class="fa fa-twitter"></i>
										</a>
										<a href="#pablo" class="btn btn-simple btn-just-icon">
											<i class="fa fa-google-plus"></i>
										</a>
									</div>
								</div>
								<p class="text-divider">Ingresa tus datos</p>
								<div class="content">
									<div class="input-group">
										<span class="input-group-addon">
											<i class="material-icons">fingerprint</i>
										</span>
                    <input id="username" type="text" class="form-control" name="username" value="{{ old('username') }}" placeholder="Username...">
									</div>

									<div class="input-group">
										<span class="input-group-addon">
											<i class="material-icons">lock_outline</i>
										</span>
                    <input id="password" type="password" class="form-control" name="password" placeholder="Password..." required>

									</div>

									<!-- If you want to add a checkbox to this form, uncomment this code -->

									<div class="checkbox">
										<label>
                      <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
											Recordar Sesión
										</label>
									</div>
								</div>
								<div class="footer text-center">
									<button type="submit" class="btn btn-simple btn-danger btn-lg">Ingresar</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>

			@include('includes.footer');

</div>

@endsection
