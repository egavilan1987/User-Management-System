<?php 
  
  require_once "classes/connection.php";
  $obj= new Connect();
  $connection=$obj->connection();

  $sql = "SELECT * FROM users WHERE user_role = 'Admin'";

  $result = mysqli_query($connection,$sql);

  $validate = 0;

  if(mysqli_num_rows($result) > 0){

    $validate = 1;
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

  <title>EGM - Login</title>

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
      <div class="card-header">Sign In</div>
      <div class="card-body">
        <form id="frmLogin">
          <div id="alert_error_message" class="alert alert-danger collapse" role="alert">
            <i class="fa fa-exclamation-triangle"></i>
             The username or password is incorrect
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="form-group">
            <strong>Username</strong>
            <input type="text" name="username" id="username" class="form-control input-lg" placeholder="Username">
            <div id="username_error_message" class="text-danger"></div>
          </div>
          <div class="form-group">
            <strong>Password</strong>
            <input type="password" name="password" id="password" class="form-control input-lg" placeholder="Password">
            <div id="password_error_message" class="text-danger"></div>
          </div>
          <div class="text-center">
            <button type="button" id="btnLogin" class="btn btn-primary btn-block">Login</button>
              <?php  if(!$validate): ?>
              <br>
              <a href="register.php" class="text-center new-account">Create an account </a>
              <?php endif; ?>
          </div>
        </form>
        <br>
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

  var error_username = false;
  var error_password = false;

  $("#username").focusout(function() {
      check_username();
    });
  $("#password").focusout(function() {
      check_password();
  });

function check_username() {        
   
    if( $.trim( $('#username').val() ) == '' ){

      $("#username_error_message").html("Input is blank!");
      $("#username_error_message").show();
      error_username = true;
      $("#username").addClass("is-invalid");
      } else{
      $("#username_error_message").hide();
      $("#username").removeClass("is-invalid");
    }
  }

function check_password() {    
    
    if( $.trim( $('#password').val() ) == '' ){
      $("#password_error_message").html("Input is blank!");
      $("#password_error_message").show();
      $("#password").addClass("is-invalid");
        error_password = true;
    } else {
      $("#password_error_message").hide();
      $("#password").removeClass("is-invalid");
    }  
  }

function login(){

  error_username = false;
  error_password = false;

  check_username();
  check_password();
    
  if(error_username == false && error_password == false) {
         
    $("#alert_error_message").hide();
    data=$('#frmLogin').serialize();
    $.ajax({
      type:"POST",
      data:data,
      url:"process/regLogin/login.php",
      success:function(r){
      if(r==1){                
        window.location="view/init.php";
        $('#frmLogin')[0].reset();                
        }else{
          $("#alert_error_message").show();
          $("#username").addClass("is-invalid");
          $("#password").addClass("is-invalid");
          }
        }
      });
    }else{
      $("#alert_error_message").show();
      $("#username").addClass("is-invalid");
      $("#password").addClass("is-invalid");
    }
  }

  $('#btnLogin').click(function(){
    login();
  });

  $(document).keypress(function(e) {
    if(e.which == 13) {
      login();
    }
  });

});

</script>                      
</script>     