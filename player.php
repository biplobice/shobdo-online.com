<?php

session_start();

$itemId = $_GET['id']-1;

$pageTitle = $_SESSION['page_title'];
$mediaTitle = $_SESSION['items'][$itemId]['mediaTitle'];
$mediaUrl = $_SESSION['items'][$itemId]['mediaUrl'];
$thumbUrl = $_SESSION['items'][$itemId]['thumbUrl'];


include "include/header.php";
include "include/leftbar.php";
include "lib/AutoEmbed.class.php";
/*	
	//For All Video Sharing Sites
	$AE = new AutoEmbed();
	$url = $_GET['id'];

	// load the embed source from a remote url
	if (!$AE->parseUrl($url)) {
		// No embeddable video found (or supported)
	}
	$AE->setParam('autoplay','true');
	echo "<div class='video'>";
		echo $AE->getEmbedCode();
	echo "</div>";
*/



/*	get_youtube_embed returns embed code for a youtube video given its id.*/


function get_youtube_id($url)
{
    if (strpos( $url,"v=") !== false)
    {
        return substr($url, strpos($url, "v=") + 2, 11);
    }
    elseif(strpos( $url,"v/") !== false)
    {
        return substr($url, strpos($url, "v/") + 2, 11);
    }	
    elseif(strpos( $url,"embed/") !== false)
    {
        return substr($url, strpos($url, "embed/") + 6, 11);
    }
	else
	return $url;
}


$video_id = get_youtube_id($mediaUrl);

/* 
	 * Retrieve the video ID from a YouTube video URL
	 * @param $ytURL The full YouTube URL from which the ID will be extracted
	 * @return $ytvID The YouTube video ID string

	function getYTid($ytURL) {
 
		$ytvIDlen = 11;	// This is the length of YouTube's video IDs
 
		// The ID string starts after "v=", which is usually right after 
		// "youtube.com/watch?" in the URL
		$idStarts = strpos($ytURL, "?v=");
 
		// In case the "v=" is NOT right after the "?" (not likely, but I like to keep my 
		// bases covered), it will be after an "&":
		if($idStarts === FALSE)
			$idStarts = strpos($ytURL, "&v=");
		// If still FALSE, URL doesn't have a vid ID
		if($idStarts === FALSE)
			die("YouTube video ID not found. Please double-check your URL.");
 
		// Offset the start location to match the beginning of the ID string
		$idStarts +=3;
 
		// Get the ID string and return it
		$ytvID = substr($ytURL, $idStarts, $ytvIDlen);
 
		return $ytvID;
 
	}


$video_id = getYTid($_GET['id']);
	 */


function get_youtube_embed($youtube_video_id, $autoplay=false)
{
	$embed_code = "";
 
	if($autoplay)
		$embed_code = '<embed src="http://www.youtube.com/v/'.$youtube_video_id.'&rel=1&autoplay=1" pluginspage="http://adobe.com/go/getflashplayer" type="application/x-shockwave-flash" quality="high" width="560" height="315" bgcolor="#ffffff" loop="false" allowfullscreen="true"></embed>';
	else
		$embed_code = '<embed src="http://www.youtube.com/v/'.$youtube_video_id.'&rel=1" pluginspage="http://adobe.com/go/getflashplayer" type="application/x-shockwave-flash" quality="high" width="560" height="315" bgcolor="#ffffff" loop="false" allowfullscreen="true"></embed>';
	return $embed_code;
}
echo "<div class='page_title'>".$pageTitle."</div>";
echo "<div class='box'>";
echo "<h2 style='font-size: 20px; text-align: left;'><img src=".$thumbUrl." class='vdo'>".$mediaTitle. "</h2>";
echo "<div class='video'>";
echo get_youtube_embed($video_id, false);
echo "</div>";
echo "</div>";


include "include/rightbar.php";
include "include/footer.php";
//session_unset();
//session_destroy();
?>