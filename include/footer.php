   </div><!-- end of main content -->


<!--Facebook Like SDK -->
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<!--End Facebook Like SDK -->
<!--Right Side Like Button-->
<div style="right:0; margin: 0 auto; position: fixed;">
<div class="fb-like" data-href="http://www.facebook.com/pages/Shobdo-Online/601363023228485" data-width="450" data-layout="box_count" data-show-faces="false" data-send="true"></div>
</div>
<!--End Right Side Like Button-->
    <div id="footer"><!-- inizia footer -->
        <div class="left">
            <p><a href="privacy-policy.php">Privacy Policy</a> | <a href="about-us.php">About us</a> | <a href="contact-us.php">Contact us</a> | Copyright shobdo-online.com ©2013</p>
        </div>
        <div class="right">

<div class="fb-like" data-href="http://www.facebook.com/pages/Shobdo-Online/601363023228485" data-width="450" data-layout="button_count" data-show-faces="false" data-send="true"></div>
        </div>
    </div><!-- End of footer -->
</div><!-- end of main_container -->
<script type="text/javascript" charset="utf-8">
  $(document).ready(function(){
    $("a[rel^='popUp']").prettyPhoto();
  });
</script>
<div class="fixed_scroll">
  <span class="scroll_title">&nbsp;&nbsp;শিরোনাম:</span>
<marquee behavior="scroll" direction="left" scrollamount="3" scrolldelay="30" truespeed onmouseover="this.stop();" onmouseout="this.start();">
<?php
error_reporting(0);
$page = file_get_contents('http://www.sorejominbarta.com/');
$doc = new DOMDocument();
$doc->loadHTML($page);
$divs = $doc->getElementsByTagName('marquee');
foreach($divs as $div) {
	echo $div->nodeValue;
}
?>
</marquee>
</div>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-52102087-4', 'auto');
  ga('send', 'pageview');

</script>
</body>
</html>