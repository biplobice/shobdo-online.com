<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Login | Shobdo-Online.com</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="_assets/css/admin.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
  	<nav class="navbar navbar-default" role="navigation">
    	<div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
            	<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                	<span class="sr-only">Toggle Navigation</span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
               </button>
               <a class="navbar-brand" href="dashboard.php">Shobdo-Online.com | Admin Panel</a>
            </div>
            
            <!-- Collect the nav links -->
            <div class="collapse navbar-collapse" id="myNavbar">
            	<ul class="nav navbar-nav navbar-right">
                <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span
                    class="glyphicon glyphicon-user"></span> <?php echo $_SESSION['admin_logged_in'] ?> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="logout.php"><span class="glyphicon glyphicon-off"></span> Logout</a></li>
                    </ul>
                </li>
              </ul>
            </div>
        </div>
    </nav>


<div class="container">
    <div class="row">
        <div class="col-md-3">
            <ul class="nav nav-pills nav-stacked well">
                <li><a href="dashboard.php?type=top-banner"><i class="fa fa-home fa-fw"></i>Top Banner</a></li>
                <li><a href="dashboard.php?type=top-right-news"><i class="fa fa-list-alt fa-fw"></i>Top Right News</a></li>
                <li><a href="dashboard.php?type=home-news"><i class="fa fa-file-o fa-fw"></i>Home News</a></li>
                <li><a href="dashboard.php?type=desher-khobor"><i class="fa fa-bar-chart-o fa-fw"></i>Desher Khobor</a></li>
                <li><a href="dashboard.php?type=bidesher-khobor"><i class="fa fa-table fa-fw"></i>Bidesher Khobor</a></li>
                <li><a href="dashboard.php?type=japan-community"><i class="fa fa-tasks fa-fw"></i>Japan Comm..</a></li>
                <li><a href="dashboard.php?type=bangla-natok"><i class="fa fa-calendar fa-fw"></i>Bangla Natok</a></li>
                <li><a href="dashboard.php?type=bangla-cinema"><i class="fa fa-book fa-fw"></i>Bangla Cinema</a></li>
                <li><a href="dashboard.php?type=bangla-gaan"><i class="fa fa-pencil fa-fw"></i>Bangla Gaan</a></li>
                <li><a href="dashboard.php?type=bangla-uponnas"><i class="fa fa-cogs fa-fw"></i>Bangla Uponnas</a></li>
                <li><a href="dashboard.php?type=bangla-radio"><i class="fa fa-cogs fa-fw"></i>Bangla Radio</a></li>
                <li><a href="dashboard.php?type=bangla-fashion"><i class="fa fa-cogs fa-fw"></i>Bangla Fashion</a></li>
                <li><a href="upload.php"><i class="fa fa-cogs fa-fw"></i>Upload Image</a></li>
            </ul>
        </div>
        <div class="col-md-9">
