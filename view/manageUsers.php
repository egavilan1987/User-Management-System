<?php
  
  // Start user session
  session_start();
  if(isset($_SESSION['user_name'])){

  // include header file
  include '../include/header.php';

?>
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="init.php">Dashboard</a>
          </li>
          <li class="breadcrumb-item active">Manage Users</li>
        </ol>

        <div id="alert_sucess_message" class="alert alert-success collapse" role="alert">                  
            User has been deleted successfully!
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <!--load users table -->
        <div id="loadUsersTable"></div>          


        <!-- User Detail Modal -->
        <div class="modal fade" id="modalView" tabindex="-1" role="dialog" aria-labelledby="usersModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="usersModalLabel">User Information</h5>          
                  <form action="editUser.php" method="get">
                    <button class="btn btn-secondary btn-xs" type="submit"><i class="fa fa-pencil-square-o"></i> Edit</button>       
                  </form>
              </div>
              <div class="modal-body">
                <div class="modal-body">
                  <center>
                    <tr>
                      <Strong>
                        <td>Fullname:</td>
                      </Strong>
                      <div id="viewFullName"></div>
                    </tr>
                    <tr>
                      <Strong>
                        <td>E-mail:</td>
                      </Strong>
                      <div id="viewEmail"></div>
                    </tr>
                    <tr>
                      <Strong>
                        <td>Username:</td>
                      </Strong>
                      <div id="viewUsername"></div>
                    </tr>
                    <tr>
                      <Strong>
                        <td>Role:</td>
                      </Strong>
                      <div id="viewRole"></div>
                    </tr>
                    <tr>
                      <Strong>
                        <td>Created by:</td>
                       </Strong>
                      <div id="viewUserCreated">egavilan</div>
                    </tr>
                    <tr>
                      <Strong>
                        <td>Created Date:</td>
                      </Strong>
                      <div id="viewDateCreated"></div>
                    </tr>
                    <br><br>
                  </center>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!--End User Detail Modal -->
<?php

  }else{
    header("location:../index.php");
  }
  // include footer file
  include '../include/footer.php';

?>

<script type="text/javascript">
    $(document).ready(function(){
      $('#loadUsersTable').load('users/usersTable.php');
      $('#btnAddUsers').click(function(){

      if ( $.trim( $('#user').val() ) == '' ){
          alert("Input is blank!");
          $('#frmUsers')[0].reset();
          return false;
        }              

        data=$('#frmUsers').serialize();
        $.ajax({
          type:"POST",
          data:data,
          url:"../process/users/addUsers.php",
          success:function(r){
            if(r==1){
            $('#frmUsers')[0].reset();
            $('#loadUsersTable').load('users/usersTable.php');
            alertify.success("User successfuly added.");
          }else{
            alertify.error("Could not add the user to the list.");
            }
          }
        });
      });
    });

  function addUser(idUser){
    $.ajax({
      type:"POST",
      data:"idUser=" + idUser,
      url:"../process/users/getUserData.php",
      success:function(r){
        data=jQuery.parseJSON(r); 
        $('#idUser').val(data['id_user']);
        $('#viewFullName').text(data['name']);  
        $('#viewEmail').text(data['email']);
        $('#viewUsername').text(data['username']);
        $('#viewRole').text(data['role']);
        $('#viewUserCreated').text(data['user_created']);
        $('#viewDateCreated').text(data['created_date']);     
      }
    });
  }

  function deleteData(idUser){

  var r =  confirm("Are you sure want to delete this user?");

  if (r == true) {
    $.ajax({
    type:"POST",
    data:"idUser=" + idUser,
    url:"../process/users/deleteUser.php",
    success:function(r){
      if(r==1){
        $('#loadUsersTable').load("users/usersTable.php"); 
        $("#alert_sucess_message").show();       
        }else{
          alert("User could not be deleled.");
          }
        }
      });
    } else {
      $("#alert_sucess_message").hide();
    }
  }

</script>