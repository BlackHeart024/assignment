@extends('t_navbar')
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
    <h2>Assignment: {{ $assignmentDetails->assignment_name }}</h2>
  <table class="table">
    <thead>
      <tr>
        <th>Roll No.</th>
        <th>Stund Name</th>
        <th>Samester</th>
        <th>Question</th>
        <th>Answer</th>
        <th>Submitted On</th>
      </tr>
    </thead>
    <tbody>
        @if(!empty($submittedAns))
            @foreach($submittedAns as $key => $ansData)
                <tr>
                    <td>{{ $ansData->roll_no }}</td>
                    <td>{{ $ansData->name }}</td>
                    <td>{{ $ansData->semester }}</td>
                    <td>{{ $ansData->question }}</td>
                    <td>
                        @if($ansData->question_id == 0)
                            <a target="_blank" href="{{asset('pdf/'.$ansData->answers)}}">{{ $ansData->answers }} </a>
                        @else
                            {{ $ansData->answers }}
                        @endif
                        
                    </td>
                    <td>{{ date('d M, Y h:i:s a', strtotime($ansData->created_at)) }}</td>
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="4"> Not any Student Submitted Assignment </td>
            </tr>
        @endif
    </tbody>
  </table>
    </div>
</body>
</html>