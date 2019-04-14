  <?php 
  
  // Start user session
  session_start();
  if(isset($_SESSION['user_name'])){

  // get the user id
  $idUser = $_SESSION['idUser'];

  // include header file
  include '../include/header.php';
  ?>
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="init.php">Dashboard</a>
          </li>
          <li class="breadcrumb-item active">Profile</li>
        </ol>

        <nav>
          <div class="nav nav-tabs" id="nav-tab" role="tablist">
            <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-home" aria-selected="true">Profile</a>

          <?php
          if($_SESSION['role']=="Admin"):
           ?>

            <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-contact" aria-selected="false">Update Profile</a>
            <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Change Password</a>
            <?php 
            endif;
            ?>
          </div>
        </nav>

        <div class="tab-content" id="nav-tabContent">
          <div class="tab-pane fade show active" id="nav-profile" role="tabpanel" aria-labelledby="nav-home-tab">
            <div class="table-responsive">
              <div class="container">
              <br>          
              <!-- Tab panes -->
              <div class="tab-content">                            
                <div class="row">
                  <div class="col-xs-12 col-sm-6 col-md-3">                    
                    <div class="form-group">
                      <h4>Profile Details</h4>
                      <hr class="colorgraph">
                      <div class="text-center">
                        <img src="../files/avatar.png" class="avatar img-circle img-thumbnail" alt="avatar">
                        <h6>Upload a different photo...</h6>
                        <input type="file" class="text-center center-block file-upload">
                      </div></hr><br>                
                    </div>
                  </div>
                  <div class="col-xs-12 col-sm-6 col-md-9">
                    <div class="form-group">
                      <h4>Profile Details</h4>
                      <hr class="colorgraph">
                      <div class="row">
                          <div class="col-md-2">
                              <strong>Fullname</strong>
                          </div>
                          <div class="col-md-6" id="viewFullName">
                              <div ></div>
                          </div>
                      </div>
                      <div class="row">
                          <div class="col-md-2">
                              <strong>E-mail</strong>
                          </div>
                          <div class="col-md-6" id="viewEmail">
                              <p></p>
                          </div>
                      </div>
                      <div class="row">
                          <div class="col-md-2">
                              <strong>Username</strong>
                          </div>
                          <div class="col-md-6" id="viewUsername">
                              <p></p>
                          </div>
                      </div>
                      <div class="row">
                          <div class="col-md-2">
                              <strong>Role</strong>
                          </div>
                          <div class="col-md-6" id="viewRole">
                              <p></p>
                          </div>
                      </div> 
                    </div>
                  </div>
                </div>
                <hr class="colorgraph">                                             
              </div>  
            </div>
          </div>
        </div>

          <div class="tab-pane fade show" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
            <div class="table-responsive">
              <div class="container">
                <form id="frmEditUserInf">
                  <br>
                  <h4>Update Information</h4>
                  <hr class="colorgraph">

                  <div id="alert_edit_error_message" class="alert alert-danger collapse" role="alert">
                    <i class="fa fa-exclamation-triangle"></i>
                    <strong>Alert!</strong> Please check in on some of the fields below.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                     </button>
                  </div>

                  <div id="alert_edit_sucess_message" class="alert alert-success collapse" role="alert">                  
                     User information successfully updated!
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>



                  <p class="text-danger"><i>* Required</i></p>
                    <div class="row">
                      <div class="col-xs-12 col-sm-6 col-md-6">
                        <input type="text" hidden="" id="idUser" name="idUser">
                        <div class="form-group">
                          <strong>Full Name <i class="text-danger">*</i></strong>
                           <input type="text" class="form-control" id="fullname" name="fullname" maxlength="50" placeholder="Please enter your full Name *">
                          <div id="fullname_error_message" class="text-danger"></div>
                        </div>
                      </div>
                      <div class="col-xs-12 col-sm-6 col-md-6">
                        <div class="form-group">
                          <strong>E-mail <i class="text-danger">*</i></strong>
                            <input type="text" class="form-control" id="email" name="email" maxlength="30" placeholder="Please enter your e-mail *">
                          <div id="email_error_message" class="text-danger"></div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-xs-12 col-sm-6 col-md-6">
                        <div class="form-group">
                          <strong>Username <i class="text-danger">*</i></strong>
                          <input type="text" name="username" id="username" class="form-control input-lg" placeholder="Please enter your username *">
                        <div id="username_error_message" class="text-danger"></div>
                        </div>
                      </div>
                      <div class="col-xs-12 col-sm-6 col-md-6">
                        <div class="form-group">
                          <strong>Role <i class="text-danger">*</i></strong>
                          <select name="role" id="role" class="form-control">
                            <option value="" hidden>Please select user role *</option>
                            <option>Admin</option>
                            <option>User</option>
                          </select>
                          <div id="role_error_message" class="text-danger"></div>
                        </div>
                      </div>
                    </div>
                  <hr class="colorgraph">
                  <div class="text-center">
                    <button type="button" id="btnCancel"  class="btn btn-danger">Cancel</button>
                    <button type="button" id="btnUpdateProfile" class="btn btn-primary">Update</button>
                  </div>
                </form>            
              </div><br><br>
            </div>
          </div>

          <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
            <div class="table-responsive">
              <div class="container">
                <form id="frmEditUserPassword">
                  <br>
                  <h4>Update Password</h4>
                  <hr class="colorgraph">
                  <div id="alert_password_error_message" class="alert alert-danger collapse" role="alert">
                    <i class="fa fa-exclamation-triangle"></i>
                    <strong>Alert!</strong> Please check in on some of the fields below.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                     </button>
                  </div>
                  <div id="alert_password_sucess_message" class="alert alert-success collapse" role="alert">                  
                     User password successfuly updated!
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <p class="text-danger"><i>* Required</i></p>
                    <div class="row">
                      <div class="col-xs-12 col-sm-12 col-md-6">
                        <input type="text" hidden="" id="id_User" name="idUser">
                        <div class="form-group">
                          <strong>Current Password <i class="text-danger">*</i></strong>
                          <input type="password" name="current_password" id="current_password" class="form-control input-lg" placeholder="Please enter your current password *">
                          <div id="current_password_error_message" class="text-danger"></div>
                        </div>
                        <div class="form-group">
                          <strong>New Password <i class="text-danger">*</i></strong>
                          <input type="password" name="password" id="password" class="form-control input-lg" placeholder="Please enter your new password *">
                          <div id="password_error_message" class="text-danger"></div>
                        </div>
                        <div class="form-group">
                          <strong>Confirm Password <i class="text-danger">*</i></strong>
                          <input type="password" name="password_confirmation" id="password_confirmation" class="form-control input-lg" placeholder="Please confirm your password *">
                          <div id="password_confirmation_error_message" class="text-danger"></div>
                        </div>
                      </div>
                    </div>
                  <hr class="colorgraph">
                  <div>
                    <button type="button" id="btnEditPasswordCancel"  class="btn btn-danger">Cancel</button>
                    <button type="button" id="btnEditUserPassword" class="btn btn-primary">Update</button>
                  </div>
                </form>            
              </div><br><br>
            </div>
          </div>
        </div>

<?php

  }else{
    header("location:../index.php");
  }
  
  // include footer file
  include '../include/footer.php';

?>

<script>
$(function() {
  
  var error_fullname = false;
  var error_email = false;
  var error_username = false;
  var error_role = false;
  var error_current_password = false;
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
  $("#current_password").focusout(function() {
    check_current_password();
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

function check_role() {
    if($.trim( $('#role').val() ) == ''){
      $("#role_error_message").html("Please choose a role!");
      $("#role").addClass("is-invalid");
      error_role = true;
      }else{
      $("#role_error_message").hide();
      $("#role").removeClass("is-invalid");
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

   function check_current_password() {

    var password_length = $("#current_password").val().length;

    if( $.trim( $('#current_password').val() ) == '' ){
      $("#current_password_error_message").html("Input is blank!");
      $("#current_password_error_message").show();
      $("#current_password").addClass("is-invalid");
      error_current_password = true;
    }else if(password_length < 8) {
      $("#current_password_error_message").html("At least 8 characters!");
      $("#current_password_error_message").show();
      error_current_password = true;
      $("#current_password").addClass("is-invalid");
    } else {
      $.ajax({
        type:"POST",
        data: { current_password : $('#current_password').val()},
        url:"../process/users/check_password.php",
        success:function(r){
        //alert(r);
        if(r==1){
          $("#current_password_error_message").hide();
          $("#current_password").removeClass("is-invalid");
        }else{
          $("#current_password_error_message").html("Invalid password. Please try again.");
          $("#current_password_error_message").show();
          $("#current_password").addClass("is-invalid");
          error_current_password = true;      
          }
        }
      });
    } 
  } 

$('#btnUpdateProfile').click(function(){

  error_fullname = false;
  error_email = false;
  error_username = false;  
  error_role = false;

        
  check_fullname();        
  check_email();
  check_username();
  check_role();

   
 if(error_fullname == false && error_email == false && error_username == false && error_role == false) {          

    data=$('#frmEditUserInf').serialize();
    $.ajax({
      type:"POST",
      data:data,
      url:"../process/users/updateUser.php",
      success:function(r){
      //alert(data);
      if(r==1){
        $("#alert_edit_sucess_message").show();
        $("#alert_edit_error_message").hide();
        setTimeout(function(){
          location.reload();
        }, 500);        
    }else{
        $("#alert_edit_sucess_message").hide();
        $("#alert_edit_error_message").show();
        }
      }
    });
    return false; 
  }else{
    $("#alert_edit_sucess_message").hide();
    $("#alert_edit_error_message").show();
     return false; 
    }
  });

$('#btnEditUserPassword').click(function(){


  error_password = false;
  error_password_confirmation = false;
  error_current_password = false;
        
  check_current_password();
  check_password();
  check_password_confirmation();

  
 if(error_password == false && error_password_confirmation == false && error_current_password == false) {          

    data=$('#frmEditUserPassword').serialize();
    $.ajax({
      type:"POST",
      data:data,
      url:"../process/users/updateUserPassword.php",
      success:function(r){

      if(r==1){
        $("#alert_password_sucess_message").show();
        $("#alert_password_error_message").hide();
        setTimeout(function(){
          location.reload();
        }, 500);
    }else{
        $("#alert_password_sucess_message").hide();
        $("#alert_password_error_message").show();
        }
      }
    });
    return false; 
  }else{
    $("#alert_password_sucess_message").hide();
    $("#alert_password_error_message").show();
     return false; 
    }
  });

  $('#btnCancel').click(function(){
    cancelUpdate();

  });
  $('#btnEditPasswordCancel').click(function(){
    cancelUpdate();

  });

  //cancel updating user information
  function cancelUpdate(){

  var r =  confirm("Are you sure want to cancel updating your information?");

  if (r == true) {

    location.reload();

    } else {
      $("#alert_edit_error_message").hide();
    }

  }
  
});

  var idUser ="<?php echo $idUser; ?>";
  addUser(idUser);

  function addUser(idUser){
    $.ajax({
      type:"POST",
      data:"idUser=" + idUser,
      url:"../process/users/getUserData.php",
      success:function(r){
        //alert(r);
        data=jQuery.parseJSON(r);
        // Profile Information
        $('#idUser').val(data['id_user']);
        $('#viewFullName').text(data['name']);  
        $('#viewEmail').text(data['email']);
        $('#viewUsername').text(data['username']);
        $('#viewRole').text(data['role']);
        // Editing information
        $('#id_User').val(data['id_user']); 
        $('#idUser').val(data['id_user']);
        $('#fullname').val(data['name']);  
        $('#email').val(data['email']);
        $('#username').val(data['username']);
        $('#role').val(data['role']);     
      }
    });
  }
</script>