@extends('navbar')
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
		@if(session('assign1'))
		<div class="alert alert-success alert-dismissible">
			<button type="button" class="btn-close" data-bs-dismiss="alert"></button>
			{{session('assign1')}}
		</div>
		@endif
		<table>
			<input type="hidden" value="{{ $n = $data2->count()}}">
			@while($n>=0)
			@if(!empty($data2[$n]))
			@if($data2[$n]->submission_d_t >= $todayDate)
			<tr>
				<div class="row mt-3">
					<div class="col-12">
						<div class="card rounded shadow bg-info">
							<div class="card-header row">
								<div class="col-sm-10"><i class="far fa-newspaper"></i> {{$data2[$n]->assignment_name}}</div>
								<div class="ml-auto col-sm"><a href="{{route('viewQuestion',['id'=>$data2[$n]->id])}}" class=""><button type="button" class="btn btn-outline-light shadow text-dark col-sm">View Datails <i class='fas fa-book-reader'></i></button></a></div>
							</div>
							<div class="card-body">Assignment Due On: {{$data2[$n]->submission_d_t}}</div>
						</div>
					</div>
				</div>
				</tr>

				@endif
				@endif
				</tr>
			<input type="hidden" value="{{$n--}}">
			@endwhile
		</table>
	</div>
</body>

</html>