<style type="text/css">

.paginate {
	clear: both;
	position: relative;
	font-size: 11px;
	text-align: center;
	padding-bottom: 20px;
}
.paginate a {
	display: inline-block;
	margin: 4px;
	padding: 6px 9px 5px 9px;
	text-decoration: none;
	color: #717171;
	font: bold 11px Arial, sans-serif;
	text-shadow: 0px 1px white;
	-webkit-border-radius: 3px;
	-moz-border-radius: 3px;
	border-radius: 3px;
	-webkit-box-shadow: 0px 1px 3px 0px rgba(0,0,0,0.35);
	-moz-box-shadow: 0px 1px 3px 0px rgba(0,0,0,0.35);
	box-shadow: 0px 1px 3px 0px rgba(0,0,0,0.35);
	background: #f9f9f9;
	background: -webkit-linear-gradient(top, #f9f9f9 0%, #e8e8e8 100%);
	background: -moz-linear-gradient(top, #f9f9f9 0%, #e8e8e8 100%);
	background: -o-linear-gradient(top, #f9f9f9 0%, #e8e8e8 100%);
	background: -ms-linear-gradient(top, #f9f9f9 0%, #e8e8e8 100%);
	background: linear-gradient(top, #f9f9f9 0%, #e8e8e8 100%);
 filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#f9f9f9', endColorstr='#e8e8e8', GradientType=0 );
}
.paginate a:hover, .paginate a:active {
	-webkit-box-shadow: 0px 1px 3px 0px rgba(0,0,0,0.55);
	-moz-box-shadow: 0px 1px 3px 0px rgba(0,0,0,0.55);
	box-shadow: 0px 1px 3px 0px rgba(0,0,0,0.55);
	background: #fff;
	background: -webkit-linear-gradient(top, #fff 0%, #e8e8e8 100%);
	background: -moz-linear-gradient(top, #fff 0%, #e8e8e8 100%);
	background: -o-linear-gradient(top, #fff 0%, #e8e8e8 100%);
	background: -ms-linear-gradient(top, #fff 0%, #e8e8e8 100%);
	background: linear-gradient(top, #fff 0%, #e8e8e8 100%);
 filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#fff', endColorstr='#e8e8e8', GradientType=0 );
}
.paginate span.current {
	margin: 4px;
	padding: 6px 9px 5px 9px;
	font-weight: bold;
	color: white;
	text-shadow: 0px 1px #3f789f;
	-webkit-box-shadow: 0px 1px 2px 0px rgba(0,0,0,0.8);
	-moz-box-shadow: 0px 1px 2px 0px rgba(0,0,0,0.8);
	box-shadow: 0px 1px 2px 0px rgba(0,0,0,0.8);
	background: #7cb9e5;
	background: -webkit-linear-gradient(top, #7cb9e5 0%, #57a1d8 100%);
	background: -moz-linear-gradient(top, #7cb9e5 0%, #57a1d8 100%);
	background: -o-linear-gradient(top, #7cb9e5 0%, #57a1d8 100%);
	background: -ms-linear-gradient(top, #7cb9e5 0%, #57a1d8 100%);
	background: linear-gradient(top, #7cb9e5 0%, #57a1d8 100%);
 filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#7cb9e5', endColorstr='#57a1d8', GradientType=0 )
}
.paginate span.disabled {
	padding: 6px 9px 5px 9px;
	margin: 4px;
	background-color: #F0F0F0 ;
	color: #D7D7D7;
	-webkit-border-radius: 3px;
	-moz-border-radius: 3px;
	border-radius: 3px;
}
</style>


<?php

	//For XML Data
	//$xml="res/xmlfiles/bangla-natok.xml";		
	//$targetpage = "bangla-natok.php"; 	
	$limit = 5; 
	
	//Start XML Processing
	$doc = new DOMDocument(); 
	$doc->load($xml); 

	$total_pages = $doc->getElementsByTagName("singlepost")->length; 
	
	$stages = 3;
	$page ="";
	if (isset($_GET['page'])) {
		$page = mysql_escape_string($_GET['page']);
	}
	if($page){
		$start = ($page - 1) * $limit; 
	}else{
		$start = 0;	
		}	
	
    // Get page data
/*	echo "<div class='mid_box_title'>";
	echo $total_pages.' Results';	
	echo "</div>";*/
	$itemId = 0;
	if (!isset( $_GET['page'])) $startPage = 0; else $startPage =  $_GET['page'] - 1;
	
	echo "<div class=''>";
	$nodes = $doc->getElementsByTagName( "singlepost" );
	
      foreach( $nodes as $node )
        { 
          $titles = $node->getElementsByTagName( "mediaTitle" ); 
		  $mediaTitle = $titles->item(0)->nodeValue; 
		   
		  $urls = $node->getElementsByTagName( "mediaUrl" ); 
		  $mediaUrl = $urls->item(0)->nodeValue; 
		  
		  $mediaSources = $node->getElementsByTagName( "mediaSource" ); 
		  $mediaSource = $mediaSources->item(0)->nodeValue;  

		  $shortDescriptions = $node->getElementsByTagName( "shortDescription" ); 
		  $shortDescription = $shortDescriptions->item(0)->nodeValue; 
		  
		  $urls = $node->getElementsByTagName( "thumbUrl" ); 
		  $thumbUrl = $urls->item(0)->nodeValue; 		    
		  
		  $items[] = array('mediaTitle' => $mediaTitle, 'mediaUrl' => $mediaUrl, 'mediaSource' => $mediaSource, 'shortDescription' => $shortDescription, 'thumbUrl' => $thumbUrl);
			
					
		  //Page Filtering
		  $itemId += 1;
		  if($itemId > ($startPage * $limit) && $itemId <= ($startPage * $limit + $limit)){  
		  
			echo "<div class='post'>";
				echo "<h2 class='title'><a href='$mediaUrl'>$mediaTitle</a></h2>";
				//echo "<p class='meta'>Posted by <a href='#'>Someone</a> on July 10, 2011	&nbsp;&bull;&nbsp; <a href='#' class='comments'>Comments (64)</a> &nbsp;&bull;&nbsp; <a href='#' class='permalink'>Full article</a></p>";
				echo "<p class='meta'>Source: $mediaSource</p>";
				echo "<div class='entry'>";
					echo "<p><img src='$thumbUrl' alt='' class='alignleft border' />$shortDescription </p>";
				echo "</div>";
				echo "<a href='$mediaUrl' class='details_btn' target='_blank'><img src='res/images/details.jpg' alt='Read More'></a>";
			echo "</div>";
				  
		  
		  	
			}		  
        }
		$_SESSION['items'] = $items; //Set Session Variables
	echo "</div>";	
	
	// Initial page num setup
	if ($page == 0){$page = 1;}
	$prev = $page - 1;	
	$next = $page + 1;							
	$lastpage = ceil($total_pages/$limit);		
	$LastPagem1 = $lastpage - 1;					
	
	
	$paginate = '';
	if($lastpage > 1)
	{	
		$paginate .= "<div class='paginate'>";
		// Previous
		if ($page > 1){
			$paginate.= "<a href='$targetpage?page=$prev'>previous</a>";
		}else{
			$paginate.= "<span class='disabled'>previous</span>";	}
			

		
		// Pages	
		if ($lastpage < 7 + ($stages * 2))	// Not enough pages to breaking it up
		{	
			for ($counter = 1; $counter <= $lastpage; $counter++)
			{
				if ($counter == $page){
					$paginate.= "<span class='current'>$counter</span>";
				}else{
					$paginate.= "<a href='$targetpage?page=$counter'>$counter</a>";}					
			}
		}
		elseif($lastpage > 5 + ($stages * 2))	// Enough pages to hide a few?
		{
			// Beginning only hide later pages
			if($page < 1 + ($stages * 2))		
			{
				for ($counter = 1; $counter < 4 + ($stages * 2); $counter++)
				{
					if ($counter == $page){
						$paginate.= "<span class='current'>$counter</span>";
					}else{
						$paginate.= "<a href='$targetpage?page=$counter'>$counter</a>";}					
				}
				$paginate.= "...";
				$paginate.= "<a href='$targetpage?page=$LastPagem1'>$LastPagem1</a>";
				$paginate.= "<a href='$targetpage?page=$lastpage'>$lastpage</a>";		
			}
			// Middle hide some front and some back
			elseif($lastpage - ($stages * 2) > $page && $page > ($stages * 2))
			{
				$paginate.= "<a href='$targetpage?page=1'>1</a>";
				$paginate.= "<a href='$targetpage?page=2'>2</a>";
				$paginate.= "...";
				for ($counter = $page - $stages; $counter <= $page + $stages; $counter++)
				{
					if ($counter == $page){
						$paginate.= "<span class='current'>$counter</span>";
					}else{
						$paginate.= "<a href='$targetpage?page=$counter'>$counter</a>";}					
				}
				$paginate.= "...";
				$paginate.= "<a href='$targetpage?page=$LastPagem1'>$LastPagem1</a>";
				$paginate.= "<a href='$targetpage?page=$lastpage'>$lastpage</a>";		
			}
			// End only hide early pages
			else
			{
				$paginate.= "<a href='$targetpage?page=1'>1</a>";
				$paginate.= "<a href='$targetpage?page=2'>2</a>";
				$paginate.= "...";
				for ($counter = $lastpage - (2 + ($stages * 2)); $counter <= $lastpage; $counter++)
				{
					if ($counter == $page){
						$paginate.= "<span class='current'>$counter</span>";
					}else{
						$paginate.= "<a href='$targetpage?page=$counter'>$counter</a>";}					
				}
			}
		}
					
				// Next
		if ($page < $counter - 1){ 
			$paginate.= "<a href='$targetpage?page=$next'>next</a>";
		}else{
			$paginate.= "<span class='disabled'>next</span>";
			}
			
		$paginate.= "</div>";		
	
	
}

 // pagination
 //echo "<div class='pagination'>";
 echo $paginate;
 //echo "</div>";
?>
