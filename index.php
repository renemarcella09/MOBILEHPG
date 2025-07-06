<?php 
session_start();
include 'conn.inc'; 
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>MOBILEHPG</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
</head>
<body class="hold-transition login-page" style="background-color: white;margin-top: 30px">
<div class="login-box">
  <div class="login-logo">
    <img src="dist/img/hpglogo.png" width="300">
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Sign in to start your session</p>
<?php 
	
	if(isset($_POST["submit"])){
					if(empty($_POST["username"]) || empty($_POST["password"])) { ?>
            <div class="alert alert-danger">
              <strong>Warning!</strong> <?php echo "Login is invalid!"; ?>.
            </div>
						<?php
					}else {
						$username=strip_tags($_POST["username"]);
						$password=strip_tags($_POST["password"]);
						
						$query="SELECT username,completename,role FROM useraccounts WHERE username='".$username."' and password='".$password."' limit 1";
						$result=mysqli_query($conn,$query);
						$rows=mysqli_fetch_assoc($result);
						$cnt=mysqli_num_rows($result);

						if($cnt==1) {
							
							$_SESSION['login_user']=$username;
							$_SESSION["USERNAME"]=$username;
							$_SESSION["ROLE"]=$rows["role"];
              $_SESSION["NAME"]=$rows["completename"];

              if($_SESSION["ROLE"]=='Administrator'){
                ?>
                <script>
                  window.location.href='administrator/index.php';
                </script>
                <?php
              }else{
                 ?>
                <script>
                  window.location.href='staff/index.php';
                </script>
                <?php
              }

							 
						}else{
							?>
                  <div class="alert alert-danger">
  				          <strong>Warning!</strong> <?php echo "Login is invalid!".mysqli_error($conn); ?>.
				          </div>
							<?php
						}
					}

				}

?>
      <form action="index.php" method="post">
        <div class="input-group mb-3">
          <input type="text" name="username" class="form-control" placeholder="Username">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="password" class="form-control" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col">
            <button type="submit" name="submit" class="btn btn-secondary btn-block"><i class="fa fa-sign-in-alt"> </i> Login</button>
          </div>
          
          <!-- /.col -->

        </div>

      </form>
    </div>

    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->
<div class="col"></div>
        <div class="col"></div>
        <div class="col"></div>



<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>

</body>
</html>
