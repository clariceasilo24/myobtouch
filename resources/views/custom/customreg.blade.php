<!DOCTYPE html>
<html lang = "en">
<head>
	<meta charset="UTF-8">
	<title>Custom Registration</title>

	<!-- Special version of Bootstrap that only affects content wrapped in .bootstrap-iso -->
<link rel="stylesheet" href="https://formden.com/static/cdn/bootstrap-iso.css" /> 

<!--Font Awesome (added because you use icons in your prepend/append)-->
<link rel="stylesheet" href="https://formden.com/static/cdn/font-awesome/4.4.0/css/font-awesome.min.css" />

<!-- Inline CSS based on choices in "Settings" tab -->
<style>.bootstrap-iso .formden_header h2, .bootstrap-iso .formden_header p, .bootstrap-iso form{font-family: Arial, Helvetica, sans-serif; color: black}.bootstrap-iso form button, .bootstrap-iso form button:hover{color: #ffffff !important;} .bootstrap-iso .btn-custom{background: #937dac} .bootstrap-iso .btn-custom:hover{background: #7f6998;}.bootstrap-iso .form-control:focus { border-color: #937dac;  -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075), 0 0 8px rgba(147, 125, 172, 0.6); box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075), 0 0 8px rgba(147, 125, 172, 0.6);} .asteriskField{color: red;}</style>

</head>
<body>

	<!-- HTML Form (wrapped in a .bootstrap-iso div) -->
<div class="bootstrap-iso">
 <div class="container-fluid">
  <div class="row">
   <div class="col-md-6 col-sm-6 col-xs-12">
    <form method="post">

     <div class="form-group ">
      <label class="control-label requiredField" for="fname">
       First Name
       <span class="asteriskField">
        *
       </span>
      </label>
      <input class="form-control" id="fname" name="fname" type="text"/>
     </div>

     <div class="form-group ">
      <label class="control-label requiredField" for="mname">
       Middle Name
       <span class="asteriskField">
        *
       </span>
      </label>
      <input class="form-control" id="mname" name="mname" type="text"/>
     </div>

     <div class="form-group ">
      <label class="control-label requiredField" for="name2">
       Last Name
       <span class="asteriskField">
        *
       </span>
      </label>
      <input class="form-control" id="name2" name="name2" type="text"/>
     </div>

     <div class="form-group ">
      <label class="control-label requiredField">
       Account Type
       <span class="asteriskField">
        *
       </span>
      </label>
      <div class="">
       <div class="radio">
        <label class="radio">
         <input name="radio" type="radio" value="Admin"/>
         Admin
        </label>
       </div>
       <div class="radio">
        <label class="radio">
         <input name="radio" type="radio" value="Secretary"/>
         Secretary
        </label>
       </div>
       <div class="radio">
        <label class="radio">
         <input name="radio" type="radio" value="Patient"/>
         Patient
        </label>
       </div>
      </div>
     </div>

     <div class="form-group ">
      <label class="control-label requiredField" for="email">
       Email
       <span class="asteriskField">
        *
       </span>
      </label>
      <input class="form-control" id="email" name="email" type="text"/>
     </div>


     <div class="form-group ">
      <label class="control-label requiredField" for="password">
       Password
       <span class="asteriskField">
        *
       </span>
      </label>
      <input class="form-control" id="password" name="password" type="password"/>
     </div>


     <div class="form-group ">
      <label class="control-label requiredField" for="date">
       Date
       <span class="asteriskField">
        *
       </span>
      </label>
      <div class="input-group">
       <div class="input-group-addon">
        <i class="fa fa-calendar">
        </i>
       </div>
       <input class="form-control" id="date" name="date" placeholder="MM/DD/YYYY" type="text"/>
      </div>
     </div>


     <div class="form-group">
      <div>
       <button class="btn btn-custom " name="submit" type="submit">
        Submit
       </button>
      </div>
     </div>
    </form>
   </div>
  </div>
 </div>
</div>


<!-- Extra JavaScript/CSS added manually in "Settings" tab -->
<!-- Include jQuery -->
<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>

<!-- Include Date Range Picker -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>

<script>
    $(document).ready(function(){
        var date_input=$('input[name="date"]'); //our date input has the name "date"
        var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
        date_input.datepicker({
            format: 'mm/dd/yyyy',
            container: container,
            todayHighlight: true,
            autoclose: true,
        })
    })
</script>

</body>
</html>