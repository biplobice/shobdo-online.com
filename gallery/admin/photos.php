<?php
	require '../inc/config.inc.php';
	require '../inc/functions.inc.php';
	
	if(isset($_POST['addcategory'])) {
		$category = protect($_POST['category']);
		$result = mysql_query("INSERT INTO gallery_category (category_name) VALUES ('$category')");
		if($result) {
			$msg = $category." album added successfully";
		} else {
			$msg = "Something Wrong! Please, try again.";
		}
		echo $msg.mysql_error();
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Panel</title>

    <!-- Bootstrap -->
    <!--<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">-->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/admin_style.css" rel="stylesheet" type="text/css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
    <!-- Wrap all page content here -->
    <div id="wrap">  
<div class="container">
    <nav class="navbar navbar-default" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span><span
                    class="icon-bar"></span><span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Shobdo-Online.com</a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span
                    class="glyphicon glyphicon-user"></span>Admin <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="#"><span class="glyphicon glyphicon-user"></span>Profile</a></li>
                        <li><a href="#"><span class="glyphicon glyphicon-cog"></span>Settings</a></li>
                        <li class="divider"></li>
                        <li><a href="#"><span class="glyphicon glyphicon-off"></span>Logout</a></li>
                    </ul>
                </li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </nav>
</div>



<div class="container">
    <div class="row">
        <div class="col-sm-3 col-md-3">
            <div class="panel-group" id="accordion">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne"><span class="glyphicon glyphicon-folder-close">
                            </span> Main Menu</a>
                        </h4>
                    </div>
                    <div id="collapseOne" class="panel-collapse collapse in">
                        <div class="panel-body">
                            <table class="table">
                                <tr>
                                    <td>
                                        <span class="glyphicon glyphicon-pencil text-primary"></span> <a href="#">Submenu </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span class="glyphicon glyphicon-flash text-success"></span> <a href="#">Submenu</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span class="glyphicon glyphicon-file text-info"></span> <a href="#">Submenu</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span class="glyphicon glyphicon-comment text-success"></span> <a href="#">Submenu</a>
                                        <span class="badge">42</span>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="col-sm-9 col-md-9">
<?php	
	// Initialization
	$output = "";
	$counter = 0;
	$cid = (int)(@$_GET['cid']);
	
	if(empty($cid)) {
?>
                <form role="form" method="post">
                <div class="row">
                  <div class="form-group col-sm-6">
                    <input type="text" class="form-control" placeholder="Type New Album Name Here" name="category">
                  </div>
                </div>
                  <button type="submit"  name="addcategory" class="btn btn-success">Add Album</button>
                </form>


                <div class="clearfix">&nbsp;</div>

                                
                <div class="panel panel-default">
                    <div class="panel-heading">
                    	<h3>Photo Albums</h3>
                    </div>
                    
                    <!--<div class="panel-body">-->
                        <table class="table table-responsive table-striped table-condensed table-hover">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Thumb</th>
                                <th>Album Name</th>
                                <th>Photos</th>
                                <th class="text-center">Action</th>
                            </tr>
                           </thead>
                           <tbody>
<?php                           		
		$result = mysql_query("SELECT c.category_id,c.category_name,COUNT(photo_id), p.photo_filename
						FROM gallery_category as c
						LEFT JOIN gallery_photos as p ON p.photo_category = c.category_id
						GROUP BY c.category_id");	
		while ($row = mysql_fetch_array($result)) {
			echo "<tr>";
			echo "<td>".$row[0]."</td>";
			echo "<td><img class='thumb-xs' src ='../".$images_dir.$row[3]."'></td>";
			echo "<td><a href='photos.php?cid=".$row[0]."'>".$row[1]."</a></td>";
			echo "<td>".$row[2]."</td>";
			echo "<td class='text-center'><a class='btn btn-success btn-xs' href='#'><span class='glyphicon glyphicon-zoom-in'></span> </a> <a class='btn btn-info btn-xs' href='#'><span class='glyphicon glyphicon-edit'></span> </a> <a href='' class='btn btn-danger btn-xs' onclick=\"return confirm('Are you sure you want to delete?');\"><span class='glyphicon glyphicon-trash'></span> </a></td>";
			echo "</tr>";
		}
		mysql_free_result( $result );	
	} else {
		echo "<div class='row'><a href= 'add_photos.php' class= 'btn btn-success'>Add Photo </a></div>";
		echo "<div class='clearfix'>&nbsp;</div>";
		$result = mysql_query( "SELECT photo_id,photo_caption,photo_filename FROM gallery_photos WHERE photo_category='".addslashes($cid)."'" );
		while( $row = mysql_fetch_array( $result ) ) {
		   $output .= "<div class='col-xs-3 col-sm-2 thumb'>";
			 $output .= "<a class='fancybox thumbnail' href='../".$images_dir.$row[2]."' rel='gallery'>";
				$output .= "<img class='img-responsive' src='../".$images_dir.$row[2]."' alt='".$row[1]."'>";
			 $output .= "</a>";
		   $output .= "</div>";
		}
		echo $output;
		mysql_free_result( $result );	
	}
?>

                           </tbody>
                       </table>
                    <!--</div>
                    <div class="panel-footer">
     
                    </div>-->
                </div>                          
            </div>
        </div>
    </div>
</div>
    </div>

    <div id="footer">
      <div class="container">
        <p class="text-muted text-center">Place sticky footer content here.</p>
      </div>
    </div>


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>-->
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../js/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/scripts.js"></script>
  </body>
</html>