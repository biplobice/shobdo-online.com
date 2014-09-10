<?php
include "inc/init.php";
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>RoundFlat Administrator Login</title>

    <!-- Bootstrap -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/admin_style.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>

  	<div class="container">
    	<div class="row">
    		<div class="col-sm-6 col-md-4 col-md-offset-4 signin">
           	<h3 class="text-center">Sign in to continue...</h3>
            	<div class="well">
                <img class="img-circle center-block" src="https://lh5.googleusercontent.com/-b0-k99FZlyE/AAAAAAAAAAI/AAAAAAAAAAA/eu7opA4byxI/photo.jpg?sz=120" alt="">
                <form class="form-signin" action="login_verify.php" method="post" autocomplete="off">
                	<input type="text" class="form-control input-lg" name="username" placeholder="Username" required autofocus>
                  <input type="password" class="form-control input-lg" name="password" placeholder="Password" required>
                  <button class="btn btn-lg btn-primary btn-block" type="submit" name="submit"> Sign In </button>
                  <label class="checkbox pull-left">
                  	<input type="checkbox" value="remember-me"> Remember Me
                  </label>
                  <a href="../admin/forgot.php" class="pull-right need-help">Forgot Password? </a><span class="clearfix"></span>
                </form>
              </div> <!-- /.account-wall -->
              Don't have an account? <a href="register.php" class="text-center new-account">Create now</a>
           </div>
        </div> <!-- /.row -->
    </div><!-- /.container -->

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../js/bootstrap.min.js"></script>
  </body>
</html>