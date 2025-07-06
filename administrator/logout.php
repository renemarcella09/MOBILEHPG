<?php 
	session_start();
	include 'conn.inc';
	session_destroy();
    unset($_SESSION['login_user']);
	header("Location:../index.php");
?>