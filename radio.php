<?php
session_start();

$itemId = $_GET['id']-1;

$pageTitle = $_SESSION['page_title'];
$mediaTitle = $_SESSION['items'][$itemId]['mediaTitle'];
$mediaUrl = $_SESSION['items'][$itemId]['mediaUrl'];
$thumbUrl = $_SESSION['items'][$itemId]['thumbUrl'];


?>
<!--<div style=" margin: 0px auto; width: 400px;">-->
<script type="text/javascript" src="http://www.museter.com/mrp.js"></script>
<script type="text/javascript">
MRP.insert({
'url':"<?php Print($mediaUrl); ?>",
'codec':'mp3',
'volume':65,
'autoplay':true,
'buffering':5,
'title':'<?php echo $mediaTitle; ?>',
'welcome':'WELCOME TO...',
'bgcolor':'#FFFFFF',
'skin':'oldstereo',
'width':318,
'height':130
});

$('.message').delay(3000).fadeOut('slow',function() { $(this).remove(); });
</script>
<!-- ENDS: BEGINS: AUTO-GENERATED Museter CODE -->
<!-- unlimited SHOUTcast Hosting Museter.com plans start at $6.95 visit http://www.museter.com -->
<p id="info-message" style="color: green;"> Please Wait For 10-20 Seconds Radio is Loading..</p>
<script>
  setTimeout(function(){
    document.getElementById('info-message').style.display = 'none';
    /* or
    var item = document.getElementById('info-message')
    item.parentNode.removeChild(item); 
    */
  }, 15000);
</script>
<!--</div>-->