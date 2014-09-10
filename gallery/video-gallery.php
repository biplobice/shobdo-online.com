<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Video Gallery</title>

    <!-- Bootstrap -->
    <!--<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">-->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" type="text/css" href="fancybox/jquery.fancybox.css?v=2.1.5" media="screen" />

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
  <body>
  
    <!-- Fixed navbar -->
    <div class="navbar navbar-default navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <a class="navbar-brand" href="http://shobdo-online.com">Shobdo-Online.com</a>
        </div>
        <div class="pull-right time hidden-xs">
            <a href="http://www.timeanddate.com/worldclock/" title="Click here to see world clock"><script src="http://mithu.me/date.php"></script></a>
        </div><!--/.nav-collapse -->
      </div>
    </div>


    <!-- Begin page content -->
  	<div class="container" id="wrapper">
    	<div class="row">
	    	<div class="col-xs-12">
            	<h1 class="page-header"><a href="photo-gallery.php">Video Gallery</a> </h1>
           </div>
           <div id="ytVideoGallery"></div>
       </div> <!-- /.row -->
    <div id="footer">
        <p class="text-muted text-center">Copyright shobdo-online.com ©2013</p>
    </div>
    </div> <!-- /.container -->


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <!--<script src="js/bootstrap.min.js"></script>-->
	<script type="text/javascript" src="fancybox/jquery.fancybox.js?v=2.1.5"></script>
	<script type="text/javascript" src="fancybox/helpers/jquery.fancybox-media.js"></script>
    <script src="js/scripts.js"></script>
	<script type="text/javascript" src="js/yt-video-gallery.js"></script>
<script type="text/javascript">
$(function() {
	$('#ytVideoGallery').ytVideoGallery({
		feedUrl: 'https://gdata.youtube.com/feeds/api/users/LjLSMGCxK6HKaz0SGAhfQQ/uploads',
		playerOptions: {
			rel: '0',
			wmode: 'opaque'
		},
		playerWidth: 595,
		playerHeight: 363
	});
});
</script>    
  </body>
</html>