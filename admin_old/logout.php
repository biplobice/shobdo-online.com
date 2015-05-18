<?php
session_start();
echo $_SESSION['name']. "Logout Successfully";
session_start();
$_SESSION = array();
setcookie(session_name(), "", time()-3600);
session_destroy();
header("Location:login.php");
		print "<script>";
		print "self.location='login.php';";
		print "</script>";
?>