
<?php 

require_once "../../classes/connection.php";

      $c=new Connect();
      $connection=$c->connection();

      $sql="SELECT id_user,
                  user_fullname,
                  user_email,
                  user_name,
                  user_role,
                  created_date
                  FROM users";
      $result=mysqli_query($connection,$sql);

?>

  <!-- DataUsers Card-->
  <div class="card mb-3">
 


    <div class="card-header">
        <i class="fa fa-table"></i> Users
        <a href="addUser.php" class="btn btn-success float-right btn-sm" role="button"><span class="fa fa-user-plus"></span> Add New User</a> 
    </div>

        




    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-hover table-condensed table-bordered" id="dataTable">
          <thead class="p-3 mb-2 bg-danger text-white font-weight-bold">
            <tr>
              <td>No.</td>
              <td>Full Name</td>
              <td>E-mail</td>
              <td>User</td>
              <td>Role</td>
              <td>Created</td>
              <td>Actions</td>
            </tr>
          </thead>
          <tfoot class="p-3 mb-2 bg-secondary text-white font-weight-bold">
            <tr>
              <td>No.</td>
              <td>Full Name</td>
              <td>E-mail</td>
              <td>User</td>
              <td>Role</td>
              <td>Created</td>
              <td>Actions</td>
            </tr>
          </tfoot>
          <tbody >
            <?php 
            while ($row=mysqli_fetch_row($result)) {
              ?>
              <tr >
                <td class="text-center"><?php echo $row[0] ?></td>
                <td class="text-center""><?php echo $row[1] ?></td>
                <td class="text-center""><?php echo $row[2] ?></td>
                <td class="text-center""><?php echo $row[3] ?></td>
                <td class="text-center""><?php echo $row[4] ?></td>
                <td class="text-center""><?php echo $row[5] ?></td>
                <td class="text-center"">
                  <span class="btn btn-primary btn-xs" data-toggle="modal" data-target="#modalView" data-toggle="tooltip" data-placement="bottom" title="View" onclick="addUser('<?php echo $row[0]; ?>')">
                    <span class="fa fas fa-eye"></span>
                  </span>
                      <a class="btn btn-success btn-xs" data-toggle="tooltip" data-placement="bottom" title="Edit" href="editUser.php?idUser=<?php echo $row[0]; ?>">
                        <span  class="fas fa-edit"></span>
                      </a>
                  <span class="btn btn-danger btn-xs data-toggle="tooltip" data-placement="bottom" title="Delete"" onclick="deleteData('<?php echo $row[0]; ?>')">
                    <span class="fa fa-trash"></span>
                  </span>
                </td>
              </tr>
              <?php 
            }
            ?>
          </tbody>
        </table>
      </div>
    </div>
  </div> 
<script type="text/javascript">
  $(document).ready(function() {
    $('#dataTable').DataTable();
  } );
</script>

