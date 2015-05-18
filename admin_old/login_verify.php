<?php
session_start();
if ( ( $_POST['name'] == "admin" ) and ( $_POST['password'] == "Smartmux1414" ) ) {
	$_SESSION['name'] = $_POST['name'];
	echo "<p style='color: green'>Login Successfull</p>";
	//header("Location:admin_panel.php");
	print "<script>";
	print " self.location='admin_panel.php'";
	print "</script>";	
} else {
	session_unset();
	$msg="Incorrect Login. Please, enter your correct  Username and Password";
	header ("Location: login.php?msg=$msg"); 
	print "<script>";
	print " self.location='login.php?msg=$msg';";
	print "</script>";
}
?>