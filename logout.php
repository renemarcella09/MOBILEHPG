<?php 
session_start();
	include 'connection.php';
	mysqli_query($conn,"insert into user_logs (username,status,petsa) values ('".$_SESSION["USERNAME"]."','OUT',now())");
	session_destroy();
    unset($_SESSION['login_user']);
	header("Location:index.php");
?>