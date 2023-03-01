@extends('t_navbar')
{{-- <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Create Assignment</title>
    <!-- CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
      .container {
            max-width: 600px;
        }
    </style>
</head>
<body>
    <div class="container">
        <form action="{{ url('create_assignment') }}" method="POST">
            @csrf
            @if ($errors->any())
            <div class="alert alert-danger" role="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            @if (Session::has('success'))
            <div class="alert alert-success text-center">
                <p>{{ Session::get('success') }}</p>
            </div>
            @endif

            <div class="form-group">
            Assignment Id<input type="text" name="id" id="">
        </div>
            <div class="form-group">
            t_id<input type="text" name="t_id" id="">
        </div>
            <div class="form-group">
            d_id<input type="text" name="d_id" id="">
        </div>
            <div class="form-group">
              Assignment Name <input type="text" name="assignment_name" id="" class="form-control" >
            </div>
            
            <div class="form-group">
                Semester <input type="text" name="semester" id="" class="form-control" >
              </div>
             
              Submission Date  <input type="date" name="submission_d_t" id="">

            




            <table class="table table-bordered" id="dynamicAddRemove">
                <tr>
                    <th>Question</th>
                    <th>Marks</th>
                    <th>Action</th>
                </tr>
                <tr>
                             
                    <td><button type="button" name="add" id="dynamic-ar" class="btn btn-outline-primary">Add Subject</button></td>
                </tr>
            </table>
            <button type="submit" class="btn btn-outline-success btn-block">Save</button>
        </form>
    </div>
</body>
<!-- JavaScript -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript">
    var i = 0;
    $("#dynamic-ar").click(function () {
        ++i;
        $("#dynamicAddRemove").append('<tr><td><input type="text" name="addMoreInputFields[' + i +
            '][subject]" placeholder="Enter subject" class="form-control" /> </td><td><button type="button" class="btn btn-outline-danger remove-input-field">Delete</button></td></tr>'
            );
    });
    $(document).on('click', '.remove-input-field', function () {
        $(this).parents('tr').remove();
    });
</script>
</html>
 --}}



 {{-- <html>
    <head>
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <title>Laravel 5.8 - DataTables Server Side Processing using Ajax</title>
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    </head>
    <body>
     <div class="container">    
        <br />
        <h3 align="center">Dynamically Add / Remove input fields in Laravel 5.8 using Ajax jQuery</h3>
        <br />
      <div class="table-responsive">
                   <form method="post" id="dynamic_form">
                    <span id="result"></span>
                    <table class="table table-bordered table-striped" id="user_table">
                  <thead>
                   <tr>
                       <th width="35%">First Name</th>
                       <th width="35%">Last Name</th>
                       <th width="30%">Action</th>
                   </tr>
                  </thead>
                  <tbody>
   
                  </tbody>
                  <tfoot>
                   <tr>
                                   <td colspan="2" align="right">&nbsp;</td>
                                   <td>
                     @csrf
                     <input type="submit" name="save" id="save" class="btn btn-primary" value="Save" />
                    </td>
                   </tr>
                  </tfoot>
              </table>
                   </form>
      </div>
     </div>
    </body>
   </html>
   
   <script>
   $(document).ready(function(){
   
    var count = 1;
   
    dynamic_field(count);
   
    function dynamic_field(number)
    {
     html = '<tr>';
           html += '<td><input type="text" name="first_name[]" class="form-control" /></td>';
           html += '<td><input type="text" name="last_name[]" class="form-control" /></td>';
           if(number > 1)
           {
               html += '<td><button type="button" name="remove" id="" class="btn btn-danger remove">Remove</button></td></tr>';
               $('tbody').append(html);
           }
           else
           {   
               html += '<td><button type="button" name="add" id="add" class="btn btn-success">Add</button></td></tr>';
               $('tbody').html(html);
           }
    }
   
    $(document).on('click', '#add', function(){
     count++;
     dynamic_field(count);
    });
   
    $(document).on('click', '.remove', function(){
     count--;
     $(this).closest("tr").remove();
    });
   
    $('#dynamic_form').on('submit', function(event){
           event.preventDefault();
           $.ajax({
               url:'{{ route("create_assignment") }}',
               method:'post',
               data:$(this).serialize(),
               dataType:'json',
               beforeSend:function(){
                   $('#save').attr('disabled','disabled');
               },
               success:function(data)
               {
                   if(data.error)
                   {
                       var error_html = '';
                       for(var count = 0; count < data.error.length; count++)
                       {
                           error_html += '<p>'+data.error[count]+'</p>';
                       }
                       $('#result').html('<div class="alert alert-danger">'+error_html+'</div>');
                   }
                   else
                   {
                       dynamic_field(1);
                       $('#result').html('<div class="alert alert-success">'+data.success+'</div>');
                   }
                   $('#save').attr('disabled', false);
               }
           })
    });
   
   });
   </script> --}}





   <!DOCTYPE html>

   <html>
   
   <head>
   
       <title>Add/remove multiple input fields dynamically with Jquery Laravel 5.8</title>
   
       <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
   
       <script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
   
   </head>
   
   <body>
   
      
   
   <div class="container">
   

      
   
       <form action="{{ route('create_assignment') }}" method="POST">
   
           @csrf
   
      
   
           @if ($errors->any())
   
               <div class="alert alert-danger">
   
                   <ul>
   
                       @foreach ($errors->all() as $error)
   
                           <li>{{ $error }}</li>
   
                       @endforeach
   
                   </ul>
   
               </div>
   
           @endif
   
           <div class="form-group">
            Assignment Id<input type="text" name="id" id="">
        </div>
            <div class="form-group">
            t_id<input type="text" name="t_id" id="">
        </div>
            <div class="form-group">
            d_id<input type="text" name="d_id" id="">
        </div>
            <div class="form-group">
              Assignment Name <input type="text" name="assignment_name" id="" class="form-control" >
            </div>
            
            <div class="form-group">
                Semester <input type="text" name="semester" id="" class="form-control" >
              </div>
             
              Submission Date  <input type="date" name="submission_d_t" id="">
   
           @if (Session::has('success'))
   
               <div class="alert alert-success text-center">
   
                   <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
   
                   <p>{{ Session::get('success') }}</p>
   
               </div>
   
           @endif
   
      
   
           <table class="table table-bordered" id="dynamicTable">  
   
               <tr>
   
                   <th>Question</th>
   
                   <th>Mark</th>
   
                   <th>Action</th>
   
               </tr>
   
               <tr>  
   
                   <td><input type="text" name="addmore[0][name]" placeholder="Enter The Question" class="form-control" /></td>  
   
                   <td><input type="text" name="addmore[0][qty]" placeholder="Enter Marks" class="form-control" /></td>  
   
   
                   <td><button type="button" name="add" id="add" class="btn btn-success">Add More</button></td>  
   
               </tr>  
   
           </table> 
   
       
   
           <button type="submit" class="btn btn-success">Save</button>
   
       </form>
   
   </div>
   
      
   
   <script type="text/javascript">
   
      
   
       var i = 0;
   
          
   
       $("#add").click(function(){
   
      
   
           ++i;
   
      
   
           $("#dynamicTable").append('<tr><td><input type="text" name="addmore['+i+'][name]" placeholder="Enter The Question" class="form-control" /></td><td><input type="text" name="addmore['+i+'][qty]" placeholder="Enter Marks" class="form-control" /></td><td><button type="button" class="btn btn-danger remove-tr">Remove</button></td></tr>');
   
       });
   
      
   
       $(document).on('click', '.remove-tr', function(){  
   
            $(this).parents('tr').remove();
   
       });  
   
      
   
   </script>
   
     
   
   </body>
   
   </html>