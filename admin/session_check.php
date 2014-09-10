<?php
session_start();
if( !(($_SESSION['name']) and ($_SESSION['name'] == 'admin' ))) {
	print "<script>";
	print "self.location='login.php'";
	print "</script>";
	exit;
}
?>