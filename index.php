<?php
include "include/header.php";
include "include/leftbar.php";
?>
<div class="home_news">
  <?php
      $xml=simplexml_load_file("res/xmlfiles/home-news.xml");
      foreach ($xml->singlepost as $singlepost) {
          echo "<a href='$singlepost->mediaUrl' target='_blank'><img src='$singlepost->thumbUrl' alt='$singlepost->mediaTitle' title= '$singlepost->mediaTitle' width='$singlepost->mediaSource' height='$singlepost->shortDescription'></a></li>";
      }
  ?>

</div>
    <div class="clr"></div>

<div class="live_tv">
    <div class="page_title">বাংলাদেশী লাইভ টেলিভিশন</div>
    <p>
        <ul id="six" style="clear: both;text-align: center; margin: -10px 0 -10px 0;">
            <li><a href="tv.php?id=btvworld.html" target="_blank"><img src="res/images/live-tv/btv.jpg"/></a> </li>
            <li><a href="tv.php?id=atnbangla.html" target="_blank"><img src="res/images/live-tv/atn_bangla.jpg"/> </a></li>
            <li><a href="tv.php?id=banglavision.html" target="_blank"><img src="res/images/live-tv/bangla_vision.jpg"/> </a></li>
             <li><a href="tv.php?id=http://www.123bangla.com/boishakhi-television" target="_blank"><img src="res/images/live-tv/boishakhi_tv.jpg"/> </a></li>
             <li><a href="tv.php?id=channeli.html" target="_blank"><img src="res/images/live-tv/chanel_i.jpg"/> </a></li>
             <li><a href="tv.php?id=channel9bd.html" target="_blank"><img src="res/images/live-tv/channel9.jpg"/> </a></li>
             <li><a href="tv.php?id=channel24.html" target="_blank"><img src="res/images/live-tv/channel24.jpg"/> </a></li>
             <li><a href="tv.php?id=http://www.123bangla.com/desh-tv" target="_blank"><img src="res/images/live-tv/desh_tv.jpg"/> </a></li>
             <li><a href="tv.php?id=http://www.zzcast.com/channel.php?u=Digatv#content" target="_blank"><img src="res/images/live-tv/diganta.jpg"/> </a></li>
             <li><a href="tv.php?id=ekattortv.html" target="_blank"><img src="res/images/live-tv/ekattor.jpg"/> </a></li>
             <li><a href="tv.php?id=ekushey-tv.html" target="_blank"><img src="res/images/live-tv/ekushe.jpg"/> </a></li>
             <li><a href="tv.php?id=http://www.123bangla.com/gazi-television" target="_blank"><img src="res/images/live-tv/gazi_tv.jpg"/> </a></li>
             <li><a href="tv.php?id=http://www.zzcast.com/channel.php?u=maasrapo#content" target="_blank"><img src="res/images/live-tv/massranga.jpg"/> </a></li>
             <li><a href="tv.php?id=mohonatv.html" target="_blank"><img src="res/images/live-tv/mohona_tv.jpg"/> </a></li>
             <li><a href="tv.php?id=ntv.html" target="_blank"><img src="res/images/live-tv/n_tv.jpg"/> </a></li>
             <li><a href="tv.php?id=rtv.html" target="_blank"><img src="res/images/live-tv/r_tv.jpg"/> </a></li>
             <li><a href="tv.php?id=somoynews.html" target="_blank"><img src="res/images/live-tv/shomoy_tv.jpg"/> </a></li>
             <li><a href="tv.php?id=mytv.html" target="_blank"><img src="res/images/live-tv/my_tv.jpg"/> </a></li>
             <li><a href="tv.php?id=satv.html" target="_blank"><img src="res/images/live-tv/SATV.jpg"/> </a></li>
             <li><a href="tv.php?id=ntveurope.html" target="_blank"><img src="res/images/live-tv/ntvuk.jpg"/> </a></li>
             <li><a href="tv.php?id=channelieurope.html" target="_blank"><img src="res/images/live-tv/channel _europe.jpg"/> </a></li>
             <li><a href="tv.php?id=channel9uk.html" target="_blank"><img src="res/images/live-tv/Channel9_uk.jpg"/> </a></li>
             <li><a href="tv.php?id=channel16.html" target="_blank"><img src="res/images/live-tv/Channel16.jpg"/> </a></li>
             <li><a href="tv.php?id=banglatvuk.html" target="_blank"><img src="res/images/live-tv/bangla_tv_uk.jpg"/> </a></li>
        </ul>

    </p>
</div>

<?php
include "include/rightbar.php";
include "include/footer.php";
?>