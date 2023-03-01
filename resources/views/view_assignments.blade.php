<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
    <table class="table">
   
        <thead>
            <tr>
                <th>Assignment Name</th>
                <th>Semester</th> 
                <th>Last Date</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
           @foreach($assignments as $assignment)
            <tr>
                <td scope="row">{{$assignment->assignment_name}}</td>
                <td>
                    @if($assignment->semester=="1")
                    1st Semester
                    @elseif($assignment->semester=="2")
                    2nd Semester
                    @elseif($assignment->semester=="3")
                    3rd Semester
                    @elseif($assignment->semester=="4")
                    4th Semester
                    @elseif($assignment->semester=="5")
                    5th Semester
                    @elseif($assignment->semester=="6")
                    6th Semester
                    @elseif($assignment->semester=="7")
                    7th Semester
                    @elseif($assignment->semester=="8")
                    8th Semester

                    @endif
                </td>
                <td>{{$assignment->submission_d_t}}</td>
        <td>
            <button class="badge badge-primary">
                View Submissions
            </button>
            <button class="badge badge-primary">
               Read More
            </button>
            <button class="badge badge-primary">
                Delete Assignment
            </button>
            <td>
            </tr>
            @endforeach
        </tbody>
    </table>
        
    </body>
</html>