<?php

 if(isset ($_POST["send"]))
 {
    $upload_name=$_FILES["upload"]["name"];
    $upload_type=$_FILES["upload"]["type"];
    $upload_size=$_FILES["upload"]["size"];
    $upload_temp=$_FILES["upload"]["tmp_name"];

	$name=$_POST["name"];
    $mail_from=$_POST["mail_from"];
    $phone=$_POST["phone"];	
    $message=$_POST["message"];

	
	$email_to = "info@shobdo-online.com";
	$email_subject = "Message From Shobdo-Online.com Site";


    if($name==""||$mail_from==""||$message=="")
    {
        echo '<font style="font-family:Verdana, Arial; font-size:11px; color:#F3363F; font-weight:bold">Please fill all fields</font>';
    }
    else
    {
    $fp = fopen($upload_temp, "rb");
    $file = fread($fp, $upload_size);

    $file = chunk_split(base64_encode($file));
    $num = md5(time());

        //Normal headers

    $headers  = "From: ".$name."<".$mail_from.">\r\n";
       $headers  .= "MIME-Version: 1.0\r\n";
       $headers  .= "Content-Type: multipart/mixed; ";
       $headers  .= "boundary=".$num."\r\n";
       $headers  .= "--$num\r\n";

        // This two steps to help avoid spam

    $headers .= "Message-ID: <".gettimeofday()." TheSystem@".$_SERVER['SERVER_NAME'].">\r\n";
    $headers .= "X-Mailer: PHP v".phpversion()."\r\n";

        // With message

    $headers .= "Content-Type: text/html; charset=iso-8859-1\r\n";
       $headers .= "Content-Transfer-Encoding: 8bit\r\n";
       $headers .= "".$message."\n";
       $headers .= "--".$num."\n";

        // Attachment headers

    $headers  .= "Content-Type:".$upload_type." ";
       $headers  .= "name=\"".$upload_name."\"r\n";
       $headers  .= "Content-Transfer-Encoding: base64\r\n";
       $headers  .= "Content-Disposition: attachment; ";
       $headers  .= "filename=\"".$upload_name."\"\r\n\n";
       $headers  .= "".$file."\r\n";
       $headers  .= "--".$num."--";



    // SEND MAIL

       @mail($email_to, $email_subject, $message, $headers);


     fclose($fp);
include "include/header.php";
include "include/leftbar.php";
    echo '<h3>Thank you for contacting us. We will be in touch with you very soon. <br /></h3>';
include "include/rightbar.php";
include "include/footer.php";	
 }
 }

?>
<!--
<form id="attach" name="attach" method="post" action="<?php /*echo $_SERVER["PHP_SELF"];*/ ?>" enctype="multipart/form-data">
                <table>
                    <tr>
                        <td>To</td><td>:</td><td><input type="text" name="to" id="to"></td>
                    </tr>
                    <tr>
                        <td>Subject</td><td>:</td><td><input type="text" name="subject" id="subject"></td>
                    </tr>
                    <tr>
                        <td>Message</td><td>:</td><td><input type="text" name="msg" id="msg"></td>
                    </tr>
                    <tr>
                        <td>Attachment<span class="imp">*</span></td><td>:</td><td><input type="file" name="upload" id="upload"></td>
                    </tr>
                    <tr>
                        <td></td><td></td><td><input type="submit" value="Submit" id="send" name="send"></td>
                    </tr>
                </table>
                </form>-->