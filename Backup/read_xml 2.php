<?php
    $startPage = $_GET['page'];
    $perPage = 5;
    $currentRecord = 0;
    //$xml = new SimpleXMLElement('xmlfile.xml', 0, true);
	
	$doc = new DOMDocument(); 
	$doc->load( "res/xmlfiles/bangla-natok.xml" ); 
	
	echo "<ul class='gallery'>";
	$nodes = $doc->getElementsByTagName( "singlepost" );

      foreach( $nodes as $node )
        {
         $currentRecord += 1;
         if($currentRecord > ($startPage * $perPage) && $currentRecord <= ($startPage * $perPage + $perPage)){

        $titles = $node->getElementsByTagName( "mediaTitle" ); 
		  $mediaTitle = $titles->item(0)->nodeValue; 
		   
		  $urls = $node->getElementsByTagName( "mediaUrl" ); 
		  $mediaUrl = $urls->item(0)->nodeValue; 
		  
		  $urls = $node->getElementsByTagName( "thumbUrl" ); 
		  $thumbUrl = $urls->item(0)->nodeValue;    
		  
		  echo "<li><a href='player.php?$mediaUrl' title='$currentRecord'><img src='$thumbUrl'/></a></li>";

        }
        }
	echo "</ul>";	
//and the pagination:

echo "<div class='Pagination'>";
echo "<ul class='pagination'>";
//echo "<li><a href='bangla-natok.php?page=0' class='first'>First</a></li>";
//echo "<li><a href='bangla-natok.php?page=$i-1' class='previous'>Previous</a></li>";
        for ($i = 0; $i <= ($currentRecord / $perPage); $i++) {
           echo "<li><a href='bangla-natok.php?page=".$i."'>".($page = $i+1)."</a></li>";
        } 
//echo "<li><a href='#' class='next'>Next</a></li>";
//echo "<li><a href='bangla-natok.php?page=0' class='last'>Last</a></li>";		
echo "</ul>";
echo "</div>";


?>