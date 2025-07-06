<?php 
include '../conn.inc';
$page=isset($_GET['page'])?$_GET['page']:'';

	if($page=='add'){
		$completename=$_POST['completename'];
		$username=$_POST['username'];
		$password=$_POST['password'];
		$role=$_POST['role'];

		$sql="INSERT INTO useraccounts (completename,username,password,role) Values ('$completename','$username','$password','$role')";
		$result=mysqli_query($conn,$sql);
		if($result){
			echo "Save Successfully.";
		}else{
			echo "Error ".mysqli_error($conn);
		}


	}else if($page=='edit'){
		$completename=$_POST['completename'];
		$username=$_POST['username'];
		$password=$_POST['password'];
		$role=$_POST['role'];
		$iduseraccounts=$_POST['iduseraccounts'];

		$sql="UPDATE useraccounts SET completename='$completename',username='$username',password='$password',role='$role' where iduseraccounts='$iduseraccounts'";
		$result=mysqli_query($conn,$sql);
		if($result){
			echo "Updated Successfully.";
		}else{
			echo "Error ".mysqli_error($conn);
		}

	}else if($page=='del'){
		$iduseraccounts=$_POST['iduseraccounts'];
		$sql="DELETE FROM useraccounts where iduseraccounts='$iduseraccounts'";
		$result=mysqli_query($conn,$sql);
		if($result){
			echo "Delete Successfully.";
		}else{
			echo "Error ".mysqli_error($conn);
		}
	}else{
		$cnt=1;
		$sql="SELECT * FROM useraccounts";
		$result=mysqli_query($conn,$sql);
		while($row=mysqli_fetch_assoc($result)){
			?>
			<tr>
				<td width="1%" style="white-space:nowrap;"><?php echo $cnt++; ?></td>
				<td><?php echo $row["completename"];?></td>
				<td><?php echo $row["username"];?></td>
				<td><?php echo $row["password"];?></td>
				<td><?php echo $row["role"];?></td>
				<td width="1%" style="white-space:nowrap;">
					<a href="" class="btn btn-sm btn-success" data-toggle="modal" data-target="#myModal-<?php echo $row["iduseraccounts"];?>"><i class="fa fa-edit" ></i> </a>

					<div class="modal" id="myModal-<?php echo $row["iduseraccounts"];?>">
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
					        <input type="text" name="" class="form-control" id="completename-<?php echo $row["iduseraccounts"];?>" value="<?php echo $row["completename"];?>">
					        Username
					        <input type="text" name="" class="form-control" id="username-<?php echo $row["iduseraccounts"];?>" value="<?php echo $row["username"];?>">
					        Password
					        <input type="password" name="" class="form-control" id="password-<?php echo $row["iduseraccounts"];?>" value="<?php echo $row["password"];?>">
					        Role
					        <select class="form-control" id="role-<?php echo $row["iduseraccounts"];?>">
					        	<option><?php echo $row["role"];?></option>
					            <option>Staff</option>
					            <option>Administrator</option>
					        </select>
					      </div>

					      <!-- Modal footer -->
					      <div class="modal-footer">
					        <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="updateData(<?php echo $row["iduseraccounts"];?>)">Save Record</button>
					        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>

					      </div>

					    </div>
					  </div>
					</div>



					<button class="btn btn-sm btn-danger" onclick="deleteData(<?php echo $row["iduseraccounts"];?>)"><i class="fa fa-trash" ></i> </button>
				</td>
			</tr>
			<?php
		}
		}
?>