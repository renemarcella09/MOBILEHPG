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
					//	$result=mysqli_query($conn,"SELECT studentid FROM `tblmasterlist`");
					//	$count=mysqli_num_rows($result);
					//	echo number_format($count);
					?>
					</h3>

	                <p>Student</p>
	              </div>
	              <div class="icon">
	                <i class="ion ion-bag"></i>
	              </div>
	              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
	            </div>
	          </div>

	        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>
				<?php 
					//	$result=mysqli_query($conn,"SELECT masterlistid FROM `tblcandidate`");
			//			$count=mysqli_num_rows($result);
			//			echo number_format($count);
					?>
				</h3>

                <p>Agency</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>


		<div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>44</h3>

                <p>User Registrations</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>

          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>65</h3>

                <p>Unique Visitors</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
	</div>



	

</section>
    <!-- /.content -->
<?php include 'footer.php'; ?>