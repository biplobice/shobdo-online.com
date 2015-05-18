<?php

session_start();

$itemId = $_GET['id']-1;

$pageTitle = $_SESSION['page_title'];
$mediaTitle = $_SESSION['items'][$itemId]['mediaTitle'];
$mediaUrl = $_SESSION['items'][$itemId]['mediaUrl'];
$thumbUrl = $_SESSION['items'][$itemId]['thumbUrl'];



echo "<iframe src='http://docs.google.com/gview?url=".$mediaUrl."&embedded=true' style='width:100%; height:100%;' frameborder='0'></iframe>";



?>