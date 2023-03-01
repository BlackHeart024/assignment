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
    <title>profileupdate</title>
</head>

<body>
        <br>
        <br>
		<br>
        @if(session('status1'))
        <div class="alert alert-success alert-dismissible">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
		{{session('status1')}}
     
</div>
@endif
    <div class="container-fluid mt-lg-5 mt-3">
        <div class="col-lg-6 container-fluid mt-3">
            <div class="card bg-white mb-3 shadow p-3 rounded h-10 mt-3">
                <form action="{{route('makeChange',['id'=>$data->id])}}" method="POST">
                    {{ csrf_field()}}
                    <h5 class='text-center'>Update Your Details</h5>
                    <div class="form-group row mt-3">
                        <label for="name" class="col-sm col-form-label">Name:</label>
                        <input type="text" id="name" name="user_name" class="col-sm mr-3" value="{{$data->name}}" required>
                    </div>
                    <div class="form-group row">
                        <label for="email" class="col-sm col-form-label">Email:</label>
                        <input type="text" id="email" name="user_email" class="col-sm mr-3" value="{{$data->email}}" required>
                    </div>
                    <div class="form-group row mt-3">
                        <label for="roll_no" class="col-sm col-form-label">Roll No:</label>
                        <input type="text" id="roll_no" name="user_roll_no" class="col-sm mr-3" value="{{$data->	roll_no}}" required>
                    </div>
                    <div class="form-group row mt-3">
                        <label for="Subject" class="col-sm col-form-label">Subject:</label>
                        <select class="col-sm mr-3" name="department">
                            @foreach($data2 as $c)
                            @if($c->d_id == $data->d_id)
                            <option value="{{$c->d_id}}" selected>{{$c->d_name}}</option>
                            @else
                            <option value="{{$c->d_id}}">{{$c->d_name}}</option>
                            @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group row">
                        <label for="semester" class="col-sm col-form-label">Semester</label>
                        <input type="text" id="semester" name="semester" class="col-sm mr-3" value="{{$data->semester}}" required>
                    </div>
                    <div class="form-group row">
                        <label for="dateofbirth" class="col-sm col-form-label">Date Of Birth:</label>
                        <input type="date" id="dateofbirth" name="dateofbirth" class="col-sm mr-3" value="{{$data->dob}}" required>
                    </div>
                    <div class="row mt-2">
              <label for="Select department" class="col"> Gender</label>
              <div class="col-sm-6">

                 <label for="male">male</label>
                <input type="radio" id="male" name="gender" value="M" {{$data->gender =="M" ? "checked":""}} />

                 <label for="female">female</label>
                <input type="radio" id="female" name="gender" value="F" {{$data->gender =="F" ? "checked":""}} />

                 <label for="others">other</label>
                <input type="radio" id="others" name="gender" value="O" {{$data->gender =="O" ? "checked":""}} />
              </div>
            </div>

                    <div class="form-group row">
                        <label for="dateofbirth" class="col-sm col-form-label">Address:</label>
                        <input type="text" id="dateofbirth" name="address" class="col-sm mr-3" value="{{$data->Address}}" required>
                    </div>

                    <button type="submit" class='form-control btn btn-success'>Make Changes</button>


                </form>
            </div>
        </div>
    </div>
</body>

</html>