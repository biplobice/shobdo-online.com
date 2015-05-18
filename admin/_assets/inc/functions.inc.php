<?php
/*ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(-1);*/

//date_default_timezone_set('America/New_York');

// Check if the admin logged in
function checkAdminSession() {
	global $_SESSION, $USERS;
	if(!isset($_SESSION['admin_logged_in']) || !array_key_exists($_SESSION['admin_logged_in'], $USERS)) {
		header("Location: login.php");
		exit;
	}
}

// Protect user input data
function secure($string) { 
	$string = strip_tags($string); 
	$string = htmlspecialchars($string); 
	$string = trim($string); 
	$string = stripslashes($string); 
	//$string = mysql_real_escape_string($string); 
return $string; 

}  
	
// Select Option Dropdown
function print_dropdown($query, $con, $selected=null){
    $queried = mysql_query($query, $con);
    $menu = '';
    while ($result = mysql_fetch_array($queried)) {
		 // assign a selected value 
        $select = $result['id'] == $selected ? ' selected' : null;

        $menu .= '
      <option value="' . $result['id'] . '"'.$select.'>' . $result['name'] . '</option>';
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
    echo $msg;
}


// display error or success messages
function displayMessages() {
	if(isset($_SESSION['success']) && !empty($_SESSION['success'])) {
		echo '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button>'. $_SESSION['success'] .'</div>';
		unset( $_SESSION['success']);
	}
	if(isset($_SESSION['info']) && !empty($_SESSION['info'])) {
		echo '<div class="alert alert-info"><button type="button" class="close" data-dismiss="alert">&times;</button>'. $_SESSION['info'] .'</div>';
		unset( $_SESSION['info']);
	}
	if(isset($_SESSION['warning']) && !empty($_SESSION['warning'])) {
		echo '<div class="alert alert-warning"><button type="button" class="close" data-dismiss="alert">&times;</button>'. $_SESSION['warning'] .'</div>';
		unset( $_SESSION['warning']);
	}
	if(isset($_SESSION['error']) && !empty($_SESSION['error'])) {
		echo '<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert">&times;</button>'. $_SESSION['error'] .'</div>';
		unset( $_SESSION['error']);
	}
}


	
// send mail	
function sendmail($to, $subject, $message, $from) {
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $headers .= 'From: ' . $from . "\r\n";
    $headers .= 'Reply-To: ' .$from . "\r\n";
    $headers .= 'X-Mailer: PHP/' . phpversion();
    if(mail($to, $subject, $message, $headers)){
        return 1;
    } 
    return 0;
}


/********************************
 **** Shobdo-Online fucntions ***
 ********************************/	
 	
// Display xml for shobdo-online admin panel
	function displayXml($xml) {
		// superAdmin authority
		$disabled  = ($_SESSION['admin_logged_in'] == "superAdmin")? "" : "disabled";
	
		$xml_data = simplexml_load_file($xml);
		$item = 0;
		foreach($xml_data->singlepost as $singlepost) {
			echo "<tr>";
			echo "<td><a href='#'>". $item."</a></td>";
			echo "<td><a href='#'><img src='../".$singlepost->thumbUrl."' class='thumb'></a></td>";
			echo "<td>".$singlepost->mediaTitle."</td>";
			echo "<td>".$singlepost->itemUrl."</td>";
			echo "<td class='text-center'><a class='btn btn-success btn-xs' href='view.php?id=$item' title='View'><span class='glyphicon glyphicon-zoom-in'></span> </a> <a class='btn btn-info btn-xs' href='edit.php?id=$item' title='Edit'><span class='glyphicon glyphicon-edit'></span> </a> <a $disabled href='delete.php?id=$item' class='btn btn-danger btn-xs' title='Delete' onclick=\"return confirm('Are you sure you want to delete?');\"><span class='glyphicon glyphicon-trash'></span> </a></td>";
			echo "</tr>";
			$item++;
		}
	}

// SimpleXML :
// Add another item to the end
    function fnSimpleXMLAddElement2End($xml, $data) {	
		$xml_data = new SimpleXMLElement($xml,null,true);
		$node = $xml_data->addChild("singlepost");
		$node->addChild("mediaTitle", $data['mediaTitle']);
		$node->addChild("mediaUrl", $data['mediaUrl']);
		$node->addChild("mediaSource", $data['mediaSource']);
		$node->addChild("thumbUrl", $data['thumbUrl']);
		$node->addChild("shortDescription", $data['shortDescription']);
		$qry = $xml_data->saveXML($xml);
		if(!$qry) {
			return FALSE;
		}
		return TRUE; 
    }
// SimpleXML :
// Edit xml
    function fnSimpleXMLEditElement($xml, $data, $item) {
		$xml_data = new SimpleXMLElement($xml,null,true);
		$xml_data->singlepost[$item]->mediaTitle = $data['mediaTitle'];
		$xml_data->singlepost[$item]->mediaUrl = $data['mediaUrl'];
		$xml_data->singlepost[$item]->mediaSource = $data['mediaSource'];
		$xml_data->singlepost[$item]->thumbUrl = $data['thumbUrl'];
		$xml_data->singlepost[$item]->shortDescription = $data['shortDescription'];
		$qry = $xml_data->asXML($xml);
		if(!$qry) {
			return FALSE;
		}
		return TRUE; 		
    }	
	
/**
 * Image resize
 * @param int $width
 * @param int $height
 */
	function uploadImageResized($width, $height){
		/* Get original image x y*/
		list($w, $h) = getimagesize($_FILES['image']['tmp_name']);
		/* calculate new image size with ratio */
		$ratio = max($width/$w, $height/$h);
		$h = ceil($height / $ratio);
		$x = ($w - $width / $ratio) / 2;
		$w = ceil($width / $ratio);
		/* new file name */
		$path = 'res/images/'.$_SESSION['type'].'/'.$_FILES['image']['name'];
		/* read binary data from image file */
		$imgString = file_get_contents($_FILES['image']['tmp_name']);
		/* create image from string */
		$image = imagecreatefromstring($imgString);
		$tmp = imagecreatetruecolor($width, $height);
		imagecopyresampled($tmp, $image,
		0, 0,
		$x, 0,
		$width, $height,
		$w, $h);
		$dir = "../";
		/* Save image */
		switch ($_FILES['image']['type']) {
			case 'image/jpeg':
				imagejpeg($tmp, $dir.$path, 100);
				break;
			case 'image/png':
				imagepng($tmp, $dir.$path, 0);
				break;
			case 'image/gif':
				imagegif($tmp, $dir.$path);
				break;
			default:
				exit;
				break;
		}
		return $path;
		/* cleanup memory */
		imagedestroy($image);
		imagedestroy($tmp);
	}	
	
?>