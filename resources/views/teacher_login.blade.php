<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
	<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.1/dist/jquery.slim.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
	<link href="https://fonts.googleapis.com/css?family=Josefin+Sans&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
	<title>Teacher Login</title>
	
	<style>
		body {
			background-image: url('asset/img/login.gif');
			background-repeat: no-repeat;
			background-attachment: fixed;
			background-size: 100% 100%;
		}
	</style>
</head>

<body class="body">
	<br><br>
	<div class="mt-5">
		<div class="card rounded shadow container-fluid col-sm-4 bg-light mt-5" style="width: 300px;">
		<center>
					<div class="mt-3 mb-3">
						<img src="{{asset('asset/img/logo.jpg')}}" alt="Log-In Here" width="100" height="100">
					</div>
				</center>
				@if(session('mail'))
	<div class="alert alert-info alert-dismissible">
		<button type="button" class="btn-close" data-bs-dismiss="alert"></button>
		{{session('mail')}}
	</div>
	@endif
	@if(session('pass'))
	<div class="alert alert-info alert-dismissible">
		<button type="button" class="btn-close" data-bs-dismiss="alert"></button>
		{{session('pass')}}
	</div>
	@endif
	@if(session('status'))
	<div class="alert alert-info alert-dismissible">
		<button type="button" class="btn-close" data-bs-dismiss="alert"></button>
		{{session('status')}}
	</div>
	@endif
			<form class="signup-form" method="POST" action="{{url('teacher_login')}}">
				{{ csrf_field()}}
			
				<div class="form-item">
					<div class="form-group row">
						<label for="email" class="col"><i class="fab fa-google"></i> Email</label>
						<input type="email" name="Email" id="email" class="rounded mr-3" value="{{old('Email')}}" style="width: 190px;" />
					</div>
					<span class="text-danger">
						@error('Email')
						{{$message}}
						@enderror
					</span>
				</div>
				<div class="form-item">
					<div class="form-group row">
						<label for="Password" class="col"> <i class="fas fa-user-shield"></i> Password</label>
						<input type="password" name="Password" id="password" class="rounded mr-3" style="width: 160px;" />
					</div>
					<span class="text-danger">
						@error('Password')
						{{$message}}
						@enderror
					</span>
				</div>
				<div class="form-item">
					<div class="row">
						<p class="pull-left col"><a href="{{route('t_Register')}}"><small><i class="fas fa-user-plus"></i> Register</small></a></p>
						<button style="height:30px;" type="submit" class="btn btn-outline-primary ml-5 mr-3 col-sm-4"> <i class="fas fa-user-cog"></i> Log In</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</body>

</html>