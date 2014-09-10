<?php
if (isset($_POST['sometext']))
	{
	$myFile = "testFile.txt";
	$thetext=$_POST['sometext'];
	writemyfile($myFile,$thetext,"w");
	} else
	{
	$thetext="Enter text here";
	}
	
function readmyfile($thefile)
	{	
	$myfile=fopen($thefile,"r");
	$x = fread($myfile, filesize($thefile));
	fclose($myfile);
	return $x;
	}
		
function writemyfile($thefilename,$data,$mode)	
	{
	$myfile=fopen($thefilename,$mode);
	fwrite($myfile,$data);
	fclose($myfile);
	}	
?>
<html>
<head>
<title>Example of a form</title></head>
<form method="post" action="<?php echo $php_self ?>">
<input type="text" name="sometext" value="<?php echo $thetext ?>" >
<input type="submit" name="Submit" value="Click this button">
</form>
</html>

