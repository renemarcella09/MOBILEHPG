<?php 
include '../conn.inc';

$user_check=$_SESSION["USERNAME"];

$query="select * from useraccounts where username='".$user_check."'";

$ses_sql=mysqli_query($conn,$query);
$row=mysqli_fetch_assoc($ses_sql);

$login_session=$row["username"];

if($login_session == null){
    header("Location:../index.php");
}

?>