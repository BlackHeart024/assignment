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
	<title>View-Question</title>
</head>

<body>

	<input type="hidden" value="{{$n=$data->count()}}">
	@if(!empty($n))
	<nav class=" text-white font-weight-bold fixed-top shadow " style="background-color: seagreen;z-index: 0;">
	<div class="container-fluid">
		<div class="row mt-3">
			<a href="{{url('dashboard')}}" class="col-sm-3 mr-5"> <button type="button" class="btn btn-outline-light text-dark btn-sm" style="height: 30px;"><i class="fas fa-chevron-left"></i> Back</button></a>
			<p class="col-sm-6 ml-5">QUESTIONS</p>
			<a href="{{url('logout')}}" class="col"> <button type="button" class="btn btn-outline-light text-dark btn-sm ">Log Out </button></a>
		</div></div>
	</nav>

	<!-- ------------------------------------ -->
	
	<br>
	<br>
	<div class="container-fluid mt-5">
		<form action="{{route('submitAns',['stu_id' => $id1,'ass_id'=>$id])}}" method="POST" enctype="multipart/form-data">	
		@csrf
		<input type="hidden" value="{{$id1}}" name="student_id">
			<table>
				@foreach($data as $key => $question)
				@if(!empty($question))
				@if($question->a_id == $id)
				
<input type="hidden" value="{{$k=0}}" name="question_no[]">
				<tr>
					<div class="row mt-3">
						<input type="hidden" name="q_id[]" value="{{$question->q_id}}">
						<h5 class="col-10"><i class="fas fa-pen-nib"></i> {{$question->question}}</h5>
						<h5 class="col">Marks: {{$question->marks_contain}}</h5>
					</div>

					<div class="mt-3">
						<textarea name="answer[]" id="" cols="130" rows="3" placeholder="Write Your Answer Here."></textarea>
					</div>
				</tr>
				<input type="hidden" value="{{$k= $k+1}}" >
				@endif
				@endif
				@endforeach
			</table>
			<div class="form-group row mt-3">
				<label for="myfile" class="col-sm-6 col-form-label">Add Attachment</label>
				<div class="col-sm-6">
					<input type="file" accept="application/pdf" id="pdffile" name="pdffile" class="form-control">
				</div>
			</div>
			<center>
				<button type="submit" class='form-control btn btn-success col-3 rounded shadow'>Submit</button>
			</center>
			
		</form>
	</div>
	@else
	<div class="container-fluid mt-5">
		<div class="alert alert-success" role="alert">
			<h4 class="alert-heading">Oops! <i class="far fa-grimace"></i></h4>
			<p>
			<h5>Your assignment doesn't has any question yet. <br> Your teacher might be a littele busy. <br> Please wailt for a while <i class="far fa-grin-beam"></i></h5>
			</p>
			<hr>
			<p class="mb-0">
				<a href="{{url('dashboard')}}" class=""> <button type="button" class="ml-3 btn btn-outline-light text-success btn-sm-4 "><i class="fas fa-chevron-left"></i> Back </button></a>
				<a href="{{url('logout')}}" class=""> <button type="button" class="ml-3 btn btn-outline-light text-success btn-sm-4 ">Log Out </button></a>
			</p>
		</div>
	@endif
	</div>
</body>

</html>