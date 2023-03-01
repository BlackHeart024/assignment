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
	<title>registation_Page</title>
</head>
<body>
	<div class="container-fluid">
		<center>
			<div class="mb-3 mt-3">
				<h3 class="blurb" style="color:#58bff6"><i class="fas fa-user-graduate"></i> Lets Create An Account </h3>
			</div>
		</center>


		<form class="signup-form" method="POST" action="{{url('studentreg')}}">
			{{ csrf_field()}}
			<div class="col">
				<div class="row">
						<label for="signup-name" class="col-sm-4">Full Name</label>
						<input id="signup-name" class="col-sm-4 ml-5" type="text" name="name" value="{{old('name')}}" />
					<span class="text-danger">
						@error('name')
						{{$message}}
						@enderror
					</span>
				</div>

				<div class="row mt-2">
						<label for="signup-email" class="col-sm-4">Email Address</label>
						<input id="signup-email" class="col-sm-4 ml-5" type="email" name="email" autocomplete="off" value="{{old('email')}}" />
					<span class="text-danger">
						@error('email')
						{{$message}}
						@enderror
					</span>

				</div>
				<div class="row mt-2">
					<label for="address" class="col-sm-4">Address</label>
					<textarea id="address" class="col-sm-4 ml-5" type="text" name="address"></textarea>
				</div>

				<div class="row mt-2">
					<label for="Select semester" class="col-sm-4">Select Semester</label>
					<select class="col-sm-4 ml-5" name="class">
						<option value="1" selected>1st</option>
						<option value="2">2nd</option>
						<option value="3">3rd</option>
						<option value="4">4th</option>
						<option value="5">5th</option>
						<option value="6">6th</option>
					</select>
				</div>

				<div class="row mt-2">
					<label for="Select department" class="col-sm-4">Select Department</label>
					<select class="col-sm-4 ml-5" name="department">
						@foreach($department as $c)
						<option value="{{$c->d_id}}">{{$c->d_name}}</option>
						@endforeach
					</select>
				</div>
				<div class="row mt-2">
						<label for="roll-no" class="col-sm-4">Roll-No</label>
						<input id="roll-no" type="number" name="rollno" placeholder="Enter Your Class Roll-No" class="col-sm-4 ml-5" value="{{old('rollno')}}" />
					<span class="text-danger">
						@error('rollno')
						{{$message}}
						@enderror
					</span>


				</div>
				<div class="row mt-2">
					<label for="Date Of Birth" class="col-sm-4">Date Of Birth</label>
					<input id="dob" type="date" name="dob" class="col-sm-4 ml-5" value="{{old('dob')}}" />
				</div>
				<div class="row mt-2">
					<label for="Select department" class="col-sm-4">Gender</label>
					<div class="col-sm-6 ml-5">
						<input type="radio" id="male" name="gender" value="M">
						 <label for="male">MALE </label>
						<input type="radio" id="female" name="gender" value="F">
						 <label for="female">FEMALE </label>
						<input type="radio" id="others" name="gender" value="O">
						 <label for="others">OTHERS</label>
					</div>

				</div>
				<div class="row mt-2">
						<label for="signup-pw" class="col-sm-4">Password</label>
						<input id="signup-pw" type="password" name="password" autocomplete="off" class="col-sm-4 ml-5" />
					<span class="text-danger">
						@error('password')
						{{$message}}
						@enderror
					</span>
				</div>
				<div>
					<div class="row mt-2">
						<label for="signup-cpw" class="col-sm-4">Confirm Password</label>
						<input id="signup-cpw" type="password" name="confirmpassword" autocomplete="off" class="col-sm-4 ml-5" />

					</div>
					<span class="text-danger">
						@error('confirmpassword')
						{{$message}}
						@enderror
					</span>
				</div>

				<div class="mt-2 mb-3">
					<center>
					<button class="btn btn-secondary btn-sm-3"><a href="{{url('go')}}" class="nav-link"><i class="fas fa-angle-left"></i> 
					  Back </a></button>
					  
						<button class="btn btn-secondary btn-sm-3">Sign Up</button>
					</center>
				</div>
			</div>
		</form>
	</div>
</body>

</html>