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
    $stages = 3;

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