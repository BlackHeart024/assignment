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
    <title>Submitted-Assignments</title>
</head>
<body>
<br>
	<div class="container-fluid mt-5">
        <input type="hidden" value="{{$n = $data3->count();}}">
        <table>
@while($n>=0)
@if(!empty($data3[$n]))
<input type="hidden" value="{{$j = $data2->count();}}">
    @while($j>=0)
    @if(!empty($data2[$j]))
        @if($data3[$n]->a_id == $data2[$j]->id)
        <tr>
        <div class="row mt-3">
					<div class="col-12">
						<div class="card rounded shadow bg-success text-light">
							<div class="card-header row">
								<div class="col-sm-10"><i class="far fa-newspaper"></i> {{$data2[$j]->assignment_name}}</div>
								<div class="ml-auto col-sm"><button type="button" class="btn btn-outline-light shadow text-info col-sm" data-toggle="modal" data-target="#myModal1"><i class="fas fa-check"></i> Score</button></a></div>
							</div>
							<div class="card-body">Assignment Submitted on: {{$data3[$n]->created_at}}</div>
						</div>
					</div>
				</div>
                  <!-- The Modal -->
  <div class="modal fade" id="myModal1">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Marks Obtain <i class="fas fa-check"></i></h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
            <input type="hidden" value="{{$k = $data3[$n]->marks_obtain}}">
          @if(!empty($k))
          Score : $k
          @else
          This Assignment Has not checked yet.
          @endif
        </div>
        
      </div>
    </div>
  </div>
                
        @endif
    @endif 
<input type="hidden" value=" {{$j--}}">
    @endwhile
@endif 

</tr>
<input type="hidden" value=" {{$n--}}">
@endwhile 
</table>
</div>
</body>
</html>