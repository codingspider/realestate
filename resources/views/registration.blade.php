@extends('frontend.layoutother')

@section('content')

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
     <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Registration Form</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/dcalendar.picker.css" rel="stylesheet">
<style type="text/css">
#deceased{
    background-color:#FFF3F5;
    padding-top:10px;
    margin-bottom:10px;
}
.remove_field{
    float:right;    
    cursor:pointer;
    position : absolute;
}
.remove_field:hover{
    text-decoration:none;
}
</style>

  </head>
  <body>
<div class="panel panel-primary" style="margin:20px;">
    <div class="panel-heading">
            <h3 class="panel-title">Registration Form</h3>
    </div>

<div class="container">
<br></br>
<!-- /resources/views/post/create.blade.php -->
@if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
@endif


@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<!-- Create Post Form -->
<form method="POST" action="{{ URL::to('registration/process')}}">
  {{ csrf_field() }} 

<div class="form-group">
    <div class="col-md-12 col-sm-12">
    <div class="form-group col-md-4 col-sm-4">
            <label for="name">Name* </label>
            <input type="text" class="form-control input-sm" name="name" placeholder="">
        </div>
        <div class="form-group col-md-4 col-sm-4">
            <label for="email">Email*</label>
            <input type="email" class="form-control input-sm" name="email"  placeholder="">
        </div>
        <div class="form-group col-md-4 col-sm-4">
            <label for="phone">Phone*</label>
            <input type="phone" class="form-control input-sm" name="phone"  placeholder="">
        </div>

        <div class="form-group col-md-4 col-sm-4">
            <label for="password">Password*</label>
            <input type="password" class="form-control input-sm" name="password" placeholder="">
        </div>

    
         <div class="form-group col-md-4 col-sm-4">
            <label for="city">Confirm Password*</label>
            <input type="password" class="form-control input-sm" name="confirm_password" placeholder="">
        </div>

         <div class="form-group col-md-4 col-sm-4">
            <label for="exampleFormControlSelect1">User Type</label>
            <select class="form-control" name="user_type" id="exampleFormControlSelect1">
              <option value="selected">Select One----</option>  
              <option value="1">Agent</option>
              <option value="2">Individual Seller</option>
              <option value="3">Buyer</option>
              <option value="4">Developer</option>
              <option value="5">Land Owner</option>
            </select>
          </div>

</div>
</div>



<div class="col-md-12 col-sm-12">
    <div class="form-group col-md-3 col-sm-3 pull-right" >
            <input type="submit" class="btn btn-primary" value="Register Now"/>
    </div>
</div>
</form>
</div>
</body>
<style>
    /*!Don't remove this!
 * jQuery DCalendar and DCalendar Picker plugin styles
 * 
 * Author: Dionlee Uy
 * Email: dionleeuy@gmail.com
 *
 * Date: Mon Mar 2 2013
 */
.calendar {
    position: relative;
    font-family: 'Century Gothic','Segoe UI', Calibri, Arial;
    font-size: 12px;
    border-collapse: collapse;
    margin: 0; padding: 0;
    z-index: 4;
    border:1px solid rgba(0,0,0,0.08);
    width: 250px;
    color: #000;
    text-align: center;
    background-color: #FFF;
}
.calendar th,
.calendar td {
    text-align: center;
    -webki-ttransition: all 0.3s ease;
    -moz-transition: all 0.3s ease;
    transition: all 0.3s ease;
}
.calendar th:first-child,
.calendar td:first-child {
    margin-left: 5px;
}
.calendar span {
    padding: 6px 4px; 
    display: block;
}
.calendar .month {
    padding: 15px;
}

.calendar .pMDate, .calendar .nMDate { color: #AAA; }
.calendar .date, .calendar .pMDate, .calendar .nMDate, .calendar .month { cursor: pointer; }
.calendar .date:hover, .calendar .pMDate:hover, .calendar .nMDate:hover, .calendar .month:hover { background-color: #E2E2E2; }
.calendar .date:active, .calendar .pMDate:active, .calendar .nMDate:active, .calendar .month:active { background-color: #22A7F0; color: #FFF; }
.calendar .selected {
    background-color: #22A7F0 !important;
    color: #FFF !important;
}

.calendar tr:first-child th {
    background-color: #FFF;
    padding: 4px;
    padding-top: 8px;
    font-size: 14px;
}
.calendar tr:first-child th { cursor: pointer; color:#000; }
.calendar tr:first-child th:hover { color:#22A7F0; }
.calendar tr:first-child th:active { color: #22A7F0; }
.calendar thead tr:nth-child(2) th { color: #555; padding: 8px 3px; }
.calendar #prev, .calendar #next {
    font-family: 'Times New Roman';
    font-size: 20px;
    padding: 0;
}
.calendar #today {
    text-align: center; cursor: pointer;
    color: #22A7F0; padding: 10px 6px;
}
.calendar #today:hover { color: #80A7DD; }
.calendar #today:active { color: #000; }
.calendar #currDay { color:#22A7F0; }
.datepicker {
    background: #ffffff url('https://cdn4.iconfinder.com/data/icons/small-n-flat/24/calendar-128.png') no-repeat right top;
    background-size: 30px 30px;;
}
</style>
</html>

@endsection