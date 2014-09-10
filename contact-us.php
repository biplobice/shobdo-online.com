<?php
include "include/header.php";
include "include/leftbar.php";
?>

<div class="page_title">. : : Contact Us : : .</div>

<!--  <div class="contact_form">
    <div class="form_row">
      <label class="contact"><strong>Name:</strong></label>
      <input type="text" class="contact_input" />
    </div>
    <div class="form_row">
      <label class="contact"><strong>Email:</strong></label>
      <input type="text" class="contact_input" />
    </div>
    <div class="form_row">
      <label class="contact"><strong>Phone:</strong></label>
      <input type="text" class="contact_input" />
    </div>
    <div class="form_row">
      <label class="contact"><strong>Company:</strong></label>
      <input type="text" class="contact_input" />
    </div>
    <div class="form_row">
      <label class="contact"><strong>Message:</strong></label>
      <textarea class="contact_textarea" ></textarea>
    </div>
    <div class="form_row"> <a href="#" class="contact">send</a> </div>
  </div>
-->
<div id="stylized" class="myform">
<form name="contactform" method="post" action="include/send_form_email.php">
<table width="500px">
<tr>
 <td valign="top">
  <label for="first_name">First Name *</label>
 </td>
 <td valign="top">
  <input  type="text" name="first_name" maxlength="50" size="30">
 </td>
</tr>
<tr>
 <td valign="top"">
  <label for="last_name">Last Name *</label>
 </td>
 <td valign="top">
  <input  type="text" name="last_name" maxlength="50" size="30">
 </td>
</tr>
<tr>
 <td valign="top">
  <label for="email">Email Address *</label>
 </td>
 <td valign="top">
  <input  type="text" name="email" maxlength="80" size="30">
 </td>
</tr>
<tr>
 <td valign="top">
  <label for="telephone">Telephone Number</label>
 </td>
 <td valign="top">
  <input  type="text" name="telephone" maxlength="30" size="30">
 </td>
</tr>
<tr>
 <td valign="top">
  <label for="comments">Comments *</label>
 </td>
 <td valign="top">
  <textarea  name="comments" maxlength="1000" cols="25" rows="6"></textarea>
 </td>
</tr>
<tr>
 <td colspan="2" style="text-align:right">
  <button type="submit" value="Submit" style="margin-top:15px;">Submit</button>
 </td>
</tr>
</table>
</form>

</div>





<?php
include "include/rightbar.php";
include "include/footer.php";
?>
