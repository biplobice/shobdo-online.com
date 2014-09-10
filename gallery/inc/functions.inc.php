<?php
// Check user Logged
function check_user_logged(){ 
     global $_SESSION, $USERS; 
     if (!isset($_SESSION["logged"])) { 
          header("Location: login.php"); 
		  	/*print "<script>self.location='login.php'</script>";*/
			exit;
     }; 
};

// Check Logged
function check_logged(){ 
     global $_SESSION, $USERS; 
     if (!isset($_SESSION["logged"]) ||!array_key_exists($_SESSION["logged"], $USERS)) { 
          header("Location: login.php"); 
		  	/*print "<script>self.location='login.php'</script>";*/
			exit;
     }; 
};

// Protect user input data
function protect($string) {
	$string = trim(strip_tags(addslashes($string)));
	return $string;
}

// Select Option Dropdown
function print_dropdown($query, $con, $selected=null){
    $queried = mysql_query($query, $con);
    $menu = '';
    while ($result = mysql_fetch_row($queried)) {
		 // assign a selected value 
        $select = $result[0] == $selected ? ' selected' : null;

        $menu .= '
      <option value="' . $result[0] . '"'.$select.'>' . $result[1] . '</option>';
    }
    return $menu;
}

//Upload image
function uploadImage($image, $destination) {
    $allowedExts = array("gif", "jpeg", "jpg", "png");

    $filename = explode(".", $_FILES[$image]["name"]);

    $extension = end($filename);

    if ((($_FILES[$image]["type"] == "image/gif")
    || ($_FILES[$image]["type"] == "image/jpeg")
    || ($_FILES[$image]["type"] == "image/jpg")
    || ($_FILES[$image]["type"] == "image/pjpeg")
    || ($_FILES[$image]["type"] == "image/x-png")
    || ($_FILES[$image]["type"] == "image/png"))
    && ($_FILES[$image]["size"] < 5120000)
    && in_array($extension, $allowedExts))
    {
        if($_FILES["file"]["error"] > 0) {
            echo "Return Code: ".$_FILES[$image]["error"]."<br/>";
        } else {
            $msg  = "Upload : ".$_FILES[$image]["name"]."<br/>";
            $msg .= "Type: ".$_FILES[$image]["type"]."<br/>";
            $msg .= "Size: ".($_FILES[$image]["size"]/1024)." KB<br/>";

            if (file_exists($destination)) {
                $msg = $_FILES[$image]["name"]." already exists.";
            } else {
                move_uploaded_file($_FILES[$image]["tmp_name"], $destination);
                $msg .= "Stored in: ".$destination."<br/>";
            }
        }
    } else {
        $msg = "Invalid file.";
    }
    //echo $msg;
}
?>