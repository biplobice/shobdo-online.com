<?php
session_start();
$itemId = $_GET['id']-1;

$pageTitle = $_SESSION['page_title'];
$mediaTitle = $_SESSION['items'][$itemId]['mediaTitle'];
$mediaUrl = $_SESSION['items'][$itemId]['mediaUrl'];
$thumbUrl = $_SESSION['items'][$itemId]['thumbUrl'];



copy($mediaUrl,"settings.xml");
?>





<script type="text/javascript" src="mp3player/swfobject.js"></script>

<body bgcolor="#000000" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0" scroll="yes">
<table width="100%"  height="100%">
  <tr>
    <td align="center">
	
	<div id="flashcontent">
		<strong>You need to upgrade your Flash Player to version 9 or later.</strong>
	</div>
	
	<script type="text/javascript">
		
		var so = new SWFObject("mp3player/Mp3 Player.swf", "sotester", "480", "323", "9", "#000000");
		so.addParam("allowFullScreen", "true");
		so.write("flashcontent");
		
	</script>
		</td>
  </tr>
</table>

</body>





<!--<object type="application/x-shockwave-flash" data="http://flash-mp3-player.net/medias/player_mp3_multi.swf" width="400" height="400">
    <param name="movie" value="http://flash-mp3-player.net/medias/player_mp3_multi.swf" />
    <param name="bgcolor" value="#ffffff" />
    <param name="FlashVars" value="mp3=4.mp3|4.mp3|4.mp3|4.mp3|4.mp3|4.mp3&amp;title=Music 1|Music 2|Music 3|Music 4|Music 5&amp;width=400&amp;height=400&showvolume=1" />
</object>-->

<!--<object type="application/x-shockwave-flash" data="res/mp3player.swf" width="540" height="200" id="dewplayer" name="dewplayer">
<param name="wmode" value="transparent" />
<param name="movie" value="res/mp3player.swf" />
<param name="flashvars" value="showtime=true&autoreplay=true&xml=playlist.xml" />
</object>
-->
