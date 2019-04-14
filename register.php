<?php 
  
  require_once "classes/connection.php";

  $obj= new Connect();
  $connection=$obj->connection();

  $sql = "SELECT * FROM users WHERE user_role = 'Admin'";

  $result=mysqli_query($connection,$sql);

  $validate=0;

  if(mysqli_num_rows($result) > 0){
    header("location:index.php");
  } 

 ?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>EGM - Register</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">

  <!-- Tab icon image-->
  <link rel="icon" href="./files/invoice.JPG">
</head>

<body class="bg-dark">

  <div class="container">
    <div class="card card-login mx-auto mt-5">
      <div class="card-header">Register an Account</div>
      <div class="card-body">
        <form id="frmUserRegister">
          <span class="text-danger">* All fields are required.</span>
          <br><br>
          <div id="alert_error_message" class="alert alert-danger collapse" role="alert">
            <i class="fa fa-exclamation-triangle"></i>
            <strong>Alert!</strong> Please check in on some of the fields below.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div id="alert_sucess_message" class="alert alert-success collapse" role="alert">                  
              New user successfuly registered!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="form-group">
            <strong>Full Name <i class="text-danger">*</i></strong>
            <input type="text" class="form-control" id="fullname" name="fullname" maxlength="50" placeholder="Please enter your full Name *">
            <div id="fullname_error_message" class="text-danger"></div>
          </div>
          <div class="form-group">
            <strong>E-mail <i class="text-danger">*</i></strong>
            <input type="text" class="form-control" id="email" name="email" maxlength="30" placeholder="Please enter your e-mail *">
            <div id="email_error_message" class="text-danger"></div>
          </div>
          <div class="form-group">
            <strong>Username <i class="text-danger">*</i></strong>
            <input type="text" name="username" id="username" class="form-control input-lg" placeholder="Please enter your username *">
            <div id="username_error_message" class="text-danger"></div>
          </div>
          <div class="form-group">
            <strong>Password <i class="text-danger">*</i></strong>
            <input type="password" name="password" id="password" class="form-control input-lg" placeholder="Please enter your password *">
            <div id="password_error_message" class="text-danger"></div>
          </div>
          <div class="form-group">
            <strong>Confirm Password <i class="text-danger">*</i></strong>
              <input type="password" name="password_confirmation" id="password_confirmation" class="form-control input-lg" placeholder="Please confirm your password *">
              <div id="password_confirmation_error_message" class="text-danger"></div>
          </div>
          <button type="button" id="btnRegisterUser" class="btn btn-primary btn-block">Register</button>
        </form>
        <div class="text-center">
          <br>
          <a href="index.php" class="text-center ">Login Page </a>
        </div>
      </div>
    </div>
  </div>
  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

</body>

</html>


<script>
$(function() {

  var error_fullname = false;
  var error_email = false;
  var error_username = false;
  var error_role = false;
  var error_password = false;
  var error_password_confirmation = false;


  $("#fullname").focusout(function() {
      check_fullname();
    });
  $("#email").focusout(function() {
    check_email();
  });
  $("#username").focusout(function() {
      check_username();
    });
  $("#role").focusout(function() {
      check_role();
    });
  $("#password").focusout(function() {
      check_password();
  });
  $("#password_confirmation").focusout(function() {
      check_password_confirmation();
  });


function check_fullname() {
        
    var fullname_length = $("#fullname").val().length;
    
    if( $.trim( $('#fullname').val() ) == '' ){
      $("#fullname_error_message").html("Input is blank!");
      $("#fullname_error_message").show();
      error_fullname = true;
      $("#fullname").addClass("is-invalid");
      }else if(fullname_length < 5 || fullname_length > 50) {
      $("#fullname_error_message").html("Should be between 5-50 characters");
      $("#fullname_error_message").show();
      error_fullname = true;
      $("#fullname").addClass("is-invalid");
      }else{
      $("#fullname_error_message").hide();
      $("#fullname").removeClass("is-invalid");
    }
  }

function check_email() {
    
    var pattern = new RegExp(/^[+a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/i);
    var email_length = $("#email").val().length;
    
    if( $.trim( $('#email').val() ) == '' ){
      $("#email_error_message").html("Input is blank!");
      $("#email_error_message").show();
      error_email = true;
      $("#email").addClass("is-invalid");
      }else if(!(pattern.test($("#email").val()))) {
      $("#email_error_message").html("Invalid email address");
      $("#email_error_message").show();
      error_email = true;
      $("#email").addClass("is-invalid");
      } else {
      $("#email_error_message").hide();
      $("#email").removeClass("is-invalid");
      }  
  }

function check_username() {
        
    var fullname_length = $("#username").val().length;
    
    if( $.trim( $('#username').val() ) == '' ){
      $("#username_error_message").html("Input is blank!");
      $("#username_error_message").show();
      error_fullname = true;
      $("#username").addClass("is-invalid");
      }else if(fullname_length < 5 || fullname_length > 50) {
      $("#username_error_message").html("Should be between 5-30 characters");
      $("#username_error_message").show();
      error_fullname = true;
      $("#username").addClass("is-invalid");
      }else{
      $("#username_error_message").hide();
      $("#username").removeClass("is-invalid");
    }
  }

function check_password() {
    
    var password_length = $("#password").val().length;    
    
    if( $.trim( $('#password').val() ) == '' ){
      $("#password_error_message").html("Input is blank!");
      $("#password_error_message").show();
      $("#password").addClass("is-invalid");
        error_password_confirmation = true;
    }else if(password_length < 8) {
      $("#password_error_message").html("At least 8 characters!");
      $("#password_error_message").show();
      error_password = true;
      $("#password").addClass("is-invalid");
    } else {
      $("#password_error_message").hide();
      $("#password").removeClass("is-invalid");
    }  
  }

function check_password_confirmation() {
    
    var password = $("#password").val();
    var password_confirmation = $("#password_confirmation").val();
    
      if( $.trim( $('#password_confirmation').val() ) == '' ){
        $("#password_confirmation_error_message").html("Input is blank!");
        $("#password_confirmation_error_message").show();
        $("#password_confirmation").addClass("is-invalid");
        error_password_confirmation = true;
      }else if(password !=  password_confirmation) {
        $("#password_confirmation_error_message").html("Passwords don't match");
        $("#password_confirmation_error_message").show();
      error_password_confirmation = true;
        $("#password_confirmation").addClass("is-invalid");
      } else {
        $("#password_confirmation_error_message").hide();
        $("#password_confirmation").removeClass("is-invalid");
         }
      }

$('#btnRegisterUser').click(function(){

        error_fullname = false;
        error_username = false;
        error_email = false;
        error_employee = false;
        error_role = false;
        error_password = false;
        error_password_confirmation = false;

        
        check_fullname();        
        check_email();
        check_username();
        check_password();
        check_password_confirmation();


 if(error_fullname == false && error_email == false && error_username == false && error_password == false && error_password_confirmation == false) {          
    data=$('#frmUserRegister').serialize();
    $.ajax({
      type:"POST",
      data:data,
      url:"./process/regLogin/registerUser.php",
      success:function(r){
      if(r==1){
        $("#alert_sucess_message").show();
        $("#alert_error_message").hide();
        $('#frmUserRegister')[0].reset();
    }else{
        $("#alert_sucess_message").hide();
        $("#alert_error_message").show();
        }
      }
    });
    return false; 
  }else{
    $("#alert_sucess_message").hide();
    $("#alert_error_message").show();
     return false; 
    }
  });

  
});

</script>
