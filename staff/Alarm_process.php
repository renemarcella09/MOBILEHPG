<?php 
include '../conn.inc';
$page=isset($_GET['page'])?$_GET['page']:'';

	if($page=='add'){
		$engine=$_POST['engine'];
		$chassis=$_POST['chassis'];
		$type=$_POST['type'];
		$Rname=$_POST['Rname'];
        $Address=$_POST['Address'];

		$sql="INSERT INTO vin (engine,chassis,type,Rname,Address) Values ('$engine','$chassis','$type','$Rname','$Address')";
		$result=mysqli_query($conn,$sql);
		if($result){
			echo "Save Successfully.";
		}else{
			echo "Error ".mysqli_error($conn);
		}


	}else if($page=='edit'){
		$engine=$_POST['engine'];
		$chassis=$_POST['chassis'];
		$type=$_POST['type'];
		$Rname=$_POST['Rname'];
        $Address=$_POST['Address'];
		$Vinid=$_POST['Vinid'];

		$sql="UPDATE vin SET engine='$engine',chassis='$chassis',type='$type',Rname='$Rname',Address='$Address' where Vinid='$Vinid'";
		$result=mysqli_query($conn,$sql);
		if($result){
			echo "Updated Successfully.";
		}else{
			echo "Error ".mysqli_error($conn);
		}

	}else if($page=='del'){
		$Vinid=$_POST['Vinid'];
		$sql="DELETE FROM vin where Vinid='$Vinid'";
		$result=mysqli_query($conn,$sql);
		if($result){
			echo "Delete Successfully.";
		}else{
			echo "Error ".mysqli_error($conn);
		}
	}else{
		$cnt=1;
		$sql="SELECT * FROM vin";
		$result=mysqli_query($conn,$sql);
		while($row=mysqli_fetch_assoc($result)){
			?>
			<tr>
				<td width="1%" style="white-space:nowrap;"><?php echo $cnt++; ?></td>
				<td><?php echo $row["engine"];?></td>
				<td><?php echo $row["chassis"];?></td>
				<td><?php echo $row["type"];?></td>
				<td><?php echo $row["Rname"];?></td>
                <td><?php echo $row["Address"];?></td>
				<td width="1%" style="white-space:nowrap;">
					
					<div class="modal" id="myModal-<?php echo $row["Vinid"];?>">
					  <div class="modal-dialog">
					    <div class="modal-content">

					      <!-- Modal Header -->
					      <div class="modal-header">
					        <h4 class="modal-title">Alarm MANAGEMENT</h4>
					        <button type="button" class="close" data-dismiss="modal">&times;</button>
					      </div>

					      <!-- Modal body -->
					      <div class="modal-body">

					        engine
					        <input type="text" name="" class="form-control" id="engine-<?php echo $row["Vinid"];?>" value="<?php echo $row["engine"];?>">
					        chassis
					        <input type="text" name="" class="form-control" id="chassis-<?php echo $row["Vinid"];?>" value="<?php echo $row["chassis"];?>">
					        type
					        <input type="text" name="" class="form-control" id="type-<?php echo $row["Vinid"];?>" value="<?php echo $row["type"];?>">
					        Rname
					        <input type="text" name="" class="form-control" id="Rname-<?php echo $row["Vinid"];?>" value="<?php echo $row["Rname"];?>">
                            Address
                            <input type="text" name="" class="form-control" id="Address-<?php echo $row["Vinid"];?>" value="<?php echo $row["Address"];?>">
					      </div>

					      <!-- Modal footer -->
					      <div class="modal-footer">
					        <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="updateData(<?php echo $row["Vinid"];?>)">Save Record</button>
					        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>

					      </div>

					    </div>
					  </div>
					</div>



					
				</td>
			</tr>
			<?php
		}
		}
?>