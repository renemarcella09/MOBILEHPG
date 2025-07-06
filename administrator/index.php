<?php 
session_start();
if(!isset($_SESSION['login_user'])){
    header("Location:../index.php");
}
include 'header.php';
include '../conn.inc';
include 'session.php'; 
?>
<br>
 <!-- Main content -->
    <section class="content">

	<div class="container-fluid">
	
	<div class="row">
		<div class="col-lg-3 col-6">
	            <!-- small box -->
	            <div class="small-box bg-info">
	              <div class="inner">
	                <h3>
					<?php 
						$result=mysqli_query($conn,"SELECT iduseraccounts FROM `useraccounts`");
						$count=mysqli_num_rows($result);
						echo number_format($count);
					?>
					</h3>

	                <p>User</p>
	              </div>
	              <div class="icon">
	                <i class="ion ion-bag"></i>
	              </div>
	              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
	            </div>
				<div class="small-box bg-info">
	              <div class="inner">
	                <h3>
					<?php 
						$result=mysqli_query($conn,"SELECT Vinid FROM `vin`");
						$count=mysqli_num_rows($result);
						echo number_format($count);
					?>
					</h3>

	                <p>Alarm List</p>
	              </div>
	              <div class="icon">
	                <i class="ion ion-bag"></i>
	              </div>
	              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
	            </div>
	          </div>

          </div>
	</div>



	

</section>
    <!-- /.content -->
<?php include 'footer.php'; ?>