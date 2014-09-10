<?php
require_once("constants.php");
$con = mysql_connect(HOST, USERNAME, PASSWORD);
if(!$con)die("Database connection failed".mysql_error());
	   
$dataselect = mysql_select_db(DBNAME,$con);
mysql_query('SET CHARACTER SET utf8');
mysql_query("SET SESSION collation_connection ='utf8_general_ci'");
if(!$dataselect)die("Database namelist not selected".mysql_error()); /* else echo "database connected successfully";*/
?>