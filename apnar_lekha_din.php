<?php
include "include/header.php";
include "include/leftbar.php";
?>

<div class="page_title">. : : আপনার লেখা দিন : : .</div>

<div id="stylized" class="myform">

<form id="form1" id="form1" action="emailAttachment.php" method="POST"  enctype="multipart/form-data">

    <label>Name
        <span class="small">Add your name</span>
    </label>
<input type="text" name="name" id="name">
    <label>Email
        <span class="small">Enter a Valid Email</span>
    </label>
<input type="text" name="mail_from" id="mail_from">
    <label>Phone
        <span class="small">Add a Phone Number</span>
    </label>
<input type="text" name="phone" id="phone">

<br />
<br />
<br />


    <label>Message
        <span class="small">Type Your Message</span>
    </label>
<textarea name="message" id="message" rows="6" cols="25"></textarea><br />
<br />
<br />

    <label>Attachment
        <span class="small">Attach Your File Here</span>
    </label>
 <input type="file" name="upload" id="upload">

    <button type="submit" value="Send" id="send" name="send" style="margin:15px 50px 0 0; float:right;">Submit</button>
<div class="spacer"></div>

</form>

</div> <!-- end of form class -->

</body>
</html>


<?php
include "include/rightbar.php";
include "include/footer.php";
?>
