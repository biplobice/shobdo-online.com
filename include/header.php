<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="keywords" content="Shobdo-Online.com, Shobdo Online, Shobdo-online, entertainment, music, bd music, natok, bangladesh, bangladesh songs, bangla songs, bd songs, bd music, movies, bd natok, bangla natok, bangladeshi natok, bd cinema, bangladeshi cinema, bangla cinema, japan, portal, bangla portal, bangladeshi portdal, japan based bangla portal" />
  <meta name="description" content="entertainment, music, bd music, natok, bangladesh, bangladesh songs, bangla songs, bd songs, bd music, movies," />
<title>শব্দ অনলাইন ডট কম । প্রবাসে আমার বাংলা</title>
<link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico" />
<link rel="stylesheet" type="text/css" href="css/style.css" />
<link rel="stylesheet" type="text/css" href="css/skin.css" />
<!--<link rel="stylesheet" type="text/css" href="css/tabbar.css" />-->

<script type="text/javascript" src="js/jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="js/boxOver.js"></script>
<script type="text/javascript" src="js/easySlider1.7.js"></script>
<script type="text/javascript" src="js/ddaccordion.js"></script>
<script type="text/javascript" src="js/jquery.jcarousel.min.js"></script>
<script type="text/javascript" src="js/tytabs.jquery.min.js"></script>
    <script type="text/javascript">

$(document).ready(function() {	
	//Execute the slideShow, set 4 seconds for each images
	slideShow(5000);
});

function slideShow(speed) {
	//append a LI item to the UL list for displaying caption
	$('ul.slideshow').append('<li id="slideshow-caption" class="caption"><div class="slideshow-caption-container"><h3></h3><p></p></div></li>');

	//Set the opacity of all images to 0
	$('ul.slideshow li').css({opacity: 0.0});
	
	//Get the first image and display it (set it to full opacity)
	$('ul.slideshow li:first').css({opacity: 1.0}).addClass('show');
	
	//Get the caption of the first image from REL attribute and display it
	$('#slideshow-caption h3').html($('ul.slideshow li.show').find('img').attr('title'));
	$('#slideshow-caption p').html($('ul.slideshow li.show').find('img').attr('alt'));
		
	//Display the caption
	$('#slideshow-caption').css({opacity: 1.0, bottom:0});
	
	//Call the gallery function to run the slideshow	
	var timer = setInterval('gallery()',speed);
	
	//pause the slideshow on mouse over
	$('ul.slideshow').hover(
		function () {
			clearInterval(timer);	
		}, 	
		function () {
			timer = setInterval('gallery()',speed);			
		}
	);
}

function gallery() {
	//if no IMGs have the show class, grab the first image
	var current = ($('ul.slideshow li.show')?  $('ul.slideshow li.show') : $('#ul.slideshow li:first'));
	
	//trying to avoid speed issue
	if(current.queue('fx').length == 0) {	
	
		//Get next image, if it reached the end of the slideshow, rotate it back to the first image
		var next = ((current.next().length) ? ((current.next().attr('id') == 'slideshow-caption')? $('ul.slideshow li:first') :current.next()) : $('ul.slideshow li:first'));
			
		//Get next image caption
		var title = next.find('img').attr('title');	
		var desc = next.find('img').attr('alt');	
	
		//Set the fade in effect for the next image, show class has higher z-index
		next.css({opacity: 0.0}).addClass('show').animate({opacity: 1.0}, 1000);
		
		//Hide the caption first, and then set and display the caption
		$('#slideshow-caption').slideToggle(300, function () { 
			$('#slideshow-caption h3').html(title); 
			$('#slideshow-caption p').html(desc); 
			$('#slideshow-caption').slideToggle(500); 
		});		
	
		//Hide the current image
		current.animate({opacity: 0.0}, 1000).removeClass('show');

	}

}

</script>



	<script type="text/javascript">
	//Banner Slider
		$(window).load(function(){	
			$("#slider").show().easySlider({
				auto: false, 
				continuous: true,
				numeric: false,
				controlsShow: false
			});
		});	

	//Tab Bar
		$(document).ready(function(){
			$("#tabsholder").tytabs({
									tabinit:"1",
									fadespeed:"fast"
									});
		});

	//To Open External Link On New Tab	
		$(document).ready(function(){
		  $("#main_container a[href^='http://']").attr('target', '_blank');
		});
		
	//Back To Top
	$(function() {
		$(window).scroll(function() {
			if($(this).scrollTop() != 0) {
				$('#toTop').fadeIn();	
			} else {
				$('#toTop').fadeOut();
			}
		});
	 
		$('#toTop').click(function() {
			$('body,html').animate({scrollTop:0},800);
		});	
	});
	
	//Expandable menu
	ddaccordion.init({
	headerclass: "submenuheader", //Shared CSS class name of headers group
	contentclass: "submenu", //Shared CSS class name of contents group
	revealtype: "click", //Reveal content when user clicks or onmouseover the header? Valid value: "click", "clickgo", or "mouseover"
	mouseoverdelay: 200, //if revealtype="mouseover", set delay in milliseconds before header expands onMouseover
	collapseprev: true, //Collapse previous content (so only one open at any time)? true/false 
	defaultexpanded: [1], //index of content(s) open by default [index1, index2, etc] [] denotes no content
	onemustopen: false, //Specify whether at least one header should be open always (so never all headers closed)
	animatedefault: false, //Should contents open by default be animated into view?
	persiststate: true, //persist state of opened contents within browser session?
	toggleclass: ["", ""], //Two CSS classes to be applied to the header when it's collapsed and expanded, respectively ["class1", "class2"]
	togglehtml: ["suffix",/* "<img src='img/plus.gif' class='statusicon' />", "<img src='img/minus.gif' class='statusicon' />"*/], //Additional HTML added to the header when it's collapsed and expanded, respectively  ["position", "html1", "html2"] (see docs)
	animatespeed: "fast", //speed of animation: integer in milliseconds (ie: 200), or keywords "fast", "normal", or "slow"
	oninit:function(headers, expandedindices){ //custom code to run when headers have initalized
		//do nothing
/*		for (var i=0; i<expandedindices.length; i++){
		  var expandedindex=expandedindices[i] //index of current expanded header index within array
		  headers[expandedindex].style.backgroundColor='black'
		  headers[expandedindex].style.color='white'
		  alert (expandedindex)
		}*/
	},
	onopenclose:function(header, index, state, isuseractivated){ //custom code to run whenever a header is opened or closed
		//do nothing
/*		 if (state=="block" && isuseractivated==false){ //if header is expanded as a result of the user clicking on it (versus expanded by default when page loads)
		  header.style.backgroundColor="black" //change that header's background color to black
		  header.style.color="white"
		 }*/

	}
})
	//Disable Time Link
	$(document).ready(function() {
	$('#time a').removeAttr('href');
	});

	</script>
    
   	
<link href="css/screen.css" rel="stylesheet" type="text/css" media="screen" />	

		<!--<script src="js/jquery-1.6.1.min.js" type="text/javascript"></script>-->
		<!--script src="js/jquery.lint.js" type="text/javascript" charset="utf-8"></script-->
		<link rel="stylesheet" href="css/prettyPhoto.css" type="text/css" media="screen" title="prettyPhoto main stylesheet" charset="utf-8" />
		<script src="js/jquery.prettyPhoto.js" type="text/javascript" charset="utf-8"></script>
		<script src="js/jquery.fancybox-media.js" type="text/javascript" charset="utf-8"></script>

</head>
<body>
<div id="toTop">^ Back to Top</div>
<div id="main_container">
	<div class="top_bar">           
    		<div class="contactadbox">
            <a href="biggapon_din.php" class="contactad">
            <img src="img/contact_for_ad.gif" margin="0", padding="0" style="vertical-align:middle" />
             <h4 class='contactad'>info@shobdo-online.com</h4></a>
			</div>
            

<!--    	<div class="top_search">
        	<div class="search_text"><a href="#">Advanced Search</a></div>
            <input type="text" class="search_input" name="search" />
            <input type="image" src="img/search.gif" class="search_bt"/>
        </div>-->
 
        <div class="time" align="right">
            <a href="http://www.timeanddate.com/worldclock/" title="Click here to see world clock"><script src="http://mithu.me/date.php"></script></a>
        </div> 
        
<!--        <div class="languages">
        	<div class="lang_text">Languages:</div>
             <a href="#" class="lang"><img src="img/en.gif" alt="" title="" border="0" /></a>
             <a href="#" class="lang"><img src="img/bd.gif" alt="" title="" border="0" /></a>       
        </div>-->    
    </div><!--End top_bar -->
    
	<div id="header">
        
        <div id="logo">
            <a href="index.php"><img src="img/logo.png" alt="" title="" border="0"/></a>
	    </div>

        <div class="top_banner_box">
        	<div class="top_divider"><img src="img/header_divider.png" alt="" title="" width="1" height="164" /></div>
        	<div class="top_banner">
                <div id="slider">           
                 <ul>  
                 <?php
					$xml=simplexml_load_file("res/xmlfiles/top-banner.xml");
			
					foreach ($xml->singlepost as $singlepost) {
						if (!empty($singlepost->mediaUrl)) {
							echo "<li><a href='$singlepost->mediaUrl'><img src='$singlepost->thumbUrl'></a></li>";	
						} else {
							echo "<li><img src='$singlepost->thumbUrl'></li>";	
}
						//echo "<li><a href='$singlepost->mediaUrl'><img src='$singlepost->thumbUrl'></a></li>";	
					}
				  ?>         	      
                  </ul> 
                </div><!--End Slider-->
            </div><!--End top_banner -->
            <div class="top_divider"><img src="img/header_divider.png" alt="" title="" width="1" height="164" /></div>
        	
        </div> <!-- end of top_banner_box-->
        
        <div class="bannerad">           
         	<?php
			echo "<ul class='slideshow'>";
				$xml=simplexml_load_file("res/xmlfiles/top-right-news.xml");
				//print_r($xml);
				$i = 0;
				foreach ($xml->singlepost as $singlepost) {
					//echo "<li><a href='$singlepost->mediaUrl' target='_blank'><img src='$singlepost->thumbUrl' title='$singlepost->mediaTitle' alt='$i'></a></li>";	
					echo "<li class='".($i == 0 ? 'show' : '')."'><a href='$singlepost->mediaUrl' target='_blank'><img src='$singlepost->thumbUrl' title='$singlepost->mediaTitle'></a></li>";						
					$i++;
					//echo $xml->singlepost[0]->mediaTitle;
				}
			echo "</ul>";
			?>

        </div><!--End of bannerad-->
        

    </div><!--End Header-->
    
   <div id="main_content"> 
            
<!--    <div class="crumb_navigation">
    Navigation: <span class="current"><a href="index.php"> Home</a></span>    
    </div> <!--End crumb_navigation --

        <div class="time" align="right" style="margin: -18px 10px 0 0; font-size: 14px;">
             <script type="text/javascript"src="http://books.alor-nishan.com/ramjan.php"></script>
        </div>   
        -->
        <nav>
            <ul class="fancyNav">
                <li id="home"><a href="index.php" class="homeIcon">হোম</a></li>
                <li id="dk"><a href="desher-khobor.php#dk">দেশের খবর</a></li>
                <li id="bk"><a href="bidesher-khobor.php#bk">বিদেশের খবর</a></li>
                <li id="jc"><a href="japan-community.php#jc">জাপান কমিউনিটি</a></li>
                <li id="ald"><a href="apnar_lekha_din.php#ald">আপনার লেখা দিন</a></li>
                <li id="b"><a href="binodon.php#b">বিনোদন</a></li>
                <li id="bd"><a href="biggapon_din.php#bd">বিজ্ঞাপন দিন</a></li>                
            </ul>
        </nav>