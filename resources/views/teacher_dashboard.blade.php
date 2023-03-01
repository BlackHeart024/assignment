
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
	<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.1/dist/jquery.slim.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
	<link href="https://fonts.googleapis.com/css?family=Josefin+Sans&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
	<title>dashboard</title>
</head>

<body>
	<br>
	<div class="container-fluid mt-5">
		@if(session('assign'))
		<div class="alert alert-success alert-dismissible">
			<button type="button" class="btn-close" data-bs-dismiss="alert"></button>
			{{session('assign')}}
		</div>
		@endif
		
	</div>
	<h1>Teacher's Dashboard</h1>
	<div class="container mt-3 text-white text-center text-capitalize">
		<a class="p-1 btn btn-outline-success btn-sm btn-block mt-1 font-weight-bold mb-2" href="{{url('create_assignment')}}"> Create Assignment</a>
	  </div>
	<div class="container mt-3 text-white text-center text-capitalize">
		<a class="p-1 btn btn-outline-success btn-sm btn-block mt-1 font-weight-bold mb-2" href="{{url('teacher_logout')}}"> Log Out</a>
	  </div>
</body>

</html>