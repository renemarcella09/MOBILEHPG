<?php 
session_start();
if(!isset($_SESSION['login_user'])){
    header("Location:../index.php");
}
include 'header.php';
include '../conn.inc';
include 'session.php'; 
?>
<div class="card">
  <div class="card-body">
      

<div class="row">
    <div class="col">
        <b>User Page</b>
    </div>
    <div class="col-lg-3">
         <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal" style="float:right;"><i class="fa fa-plus"></i> Add User</button>


         <!-- The Modal -->
<div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">USER MANAGEMENT</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        Complete Name
        <input type="text" name="" class="form-control" id="completename">
        Username
        <input type="text" name="" class="form-control" id="username">
        Password
        <input type="password" name="" class="form-control" id="password">
        Role
        <select class="form-control" id="role">
            <option>Staff</option>
            <option>Administrator</option>
        </select>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="saveData()">Save Record</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>

      </div>

    </div>
  </div>
</div>

    </div>
</div>
<hr style="margin-top:2px;">

<body onload="viewData()">
<table class="table table-bordered table-sm" id="myTable">
    <thead>
        <th>#</th>
        <th>Name</th>
        <th>Username</th>
        <th>Password</th>
        <th>Role</th>
        <th></th>
    </thead>
    <tbody>
        
    </tbody>
</table>
</body>


  </div>
</div>
<?php 
include 'footer.php';
?>
<script type="text/javascript">
    function viewData(){
         $.ajax({
            type: "GET",
            url: "user_process.php",
            success: function(data){
               // alert(data);
                $('tbody').html(data);
                $('#myTable').DataTable();
            }
        });
    }

    function saveData(){
        var completename=$('#completename').val();
        var username=$('#username').val();
        var password=$('#password').val();
        var role=$('#role').val();

        $.ajax({
            type:"POST",
            url:"user_process.php?page=add",
            data:"completename="+completename+"&username="+username+"&password="+password+"&role="+role,
            success: function(data){
               // alert(data);
                Swal.fire({
                    title: "Successfully Saved",
                    icon: "success",
                    showConfirmButton: false,
                    timer: 1500,
                  }).then(function(){
                    location.reload();
                  });
            }
        });
    }
    function deleteData(iduseraccounts){
        var iduseraccounts=iduseraccounts;
        $.ajax({
            type:"POST",
            url:"user_process.php?page=del",
            data:"iduseraccounts="+iduseraccounts,
            success: function(data){
                Swal.fire({
                    title: "Successfully Deleted",
                    icon: "error",
                    showConfirmButton: false,
                    timer: 1500,
                  }).then(function(){
                    location.reload();
                  });
               
            }
        });
    }

     function updateData(iduseraccounts){
        var iduseraccounts=iduseraccounts;
        var completename=$('#completename-'+iduseraccounts).val();
        var username=$('#username-'+iduseraccounts).val();
        var password=$('#password-'+iduseraccounts).val();
        var role=$('#role-'+iduseraccounts).val();

        $.ajax({
            type:"POST",
            url:"user_process.php?page=edit",
            data:"completename="+completename+"&username="+username+"&password="+password+"&role="+role+"&iduseraccounts="+iduseraccounts,
            success: function(data){
                alert(data);
                location.reload();
            }
        });
    }
</script>