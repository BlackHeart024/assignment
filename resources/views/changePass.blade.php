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
    <title>Change Password</title>
</head>
<body>
<br>
		<br>
		<br>
        @if(session('status'))
        <div class="alert alert-success alert-dismissible">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
		{{session('status')}}
        </div>
		@elseif(session('pass'))
        <div class="alert alert-success alert-dismissible">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
		{{session('pass')}}
        </div>
@endif
    <div class="container-fluid mt-lg-5  mt-5">
        <div class="col-lg-6 container-fluid mt-5">
            <div class="card bg-white mb-3 shadow p-3 rounded h-10  mt-5">
                <form action="{{route('changePassAction',['id'=>$data->id])}}" method="POST">
                    {{ csrf_field()}}
                    <h5 class='text-center'>Change The Password</h5>
                    <div class="form-group row mt-3">
                        <label for="oldpassword" class="col-sm col-form-label">Old Password:</label>
                        <input type="password" id="oldpassword" name="oldpassword" class="col-sm mr-3" required>
                    </div>
                    <div class="form-group row mt-3">
                        <label for="newpassword" class="col-sm col-form-label">New Password:</label>
                        <input type="password" id="newpassword" name="newpassword" class="col-sm mr-3" required>
                        <span style="color: red;">@error('newpassword'){{$message}}@enderror</span>
                    </div>
                    <div class="form-group row mt-3">
                        <label for="confirmpassword" class="col-sm col-form-label">Confirm Password:</label>
                        <input type="password" id="confirmpassword" name="confirmpassword" class="col-sm mr-3" required>
                        <span style="color: red;">@error('confirmpassword'){{$message}}@enderror</span>
                    </div>
                    <button type="submit" class='form-control btn btn-success'>SUBMIT</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>