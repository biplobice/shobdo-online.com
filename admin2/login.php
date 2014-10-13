<?php
session_start();
require '_assets/inc/admin_info.php';
require '_assets/inc/functions.inc.php';

$username = "";
$password = "";

// If the user has submitted the form
if(isset($_POST['submit'])) {
	//protect the posted value then store them to variables
	$username = secure($_POST['username']);
	$password = secure($_POST['password']);
	
	//check if submitted username exists in $USERS array
	if(!array_key_exists($username, $USERS)) {
		$_SESSION['error'] = "The username you supplied doesn't exist!";
	} else {
		// check if username & passowrd match
		if($USERS[$username] != $password) {
			$_SESSION['error'] = "Password doesn't match";
		} else {
			$_SESSION['admin_logged_in'] = $username;
			$_SESSION['success'] = "Logged in Successfyully";
			header("location:dashboard.php");
		}
	}
}
?>

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
  	<div class="container">
    	<div class="row">
    		<div class="col-sm-6 col-md-4 col-md-offset-4 signin">
           	<h3 class="text-center">Please, login to continue</h3>
            	<div class="well">
                <img class="img-circle center-block" src="https://lh5.googleusercontent.com/-b0-k99FZlyE/AAAAAAAAAAI/AAAAAAAAAAA/eu7opA4byxI/photo.jpg?sz=120" alt="">
                
                <form role="form" method="post" autocomplete="off">
                  <div class="form-group">
                    <label for="loginInputEmail1">Username</label>
                    <input type="text" class="form-control input-lg" name="username" value="<?php echo $username; ?>" placeholder="Username" required>
                  </div>
                  <div class="form-group">
                    <label for="loginInputPassword1">Password</label>
                    <input type="password" class="form-control input-lg" name="password" placeholder="Password" required>
                  </div>
                  <?php displayMessages() ?>
                  <button class="btn btn-lg btn-primary btn-block" type="submit" name="submit"> Login </button>
                </form>                
                
              </div> <!-- /.account-wall -->
              <!--<a href="register.php" class="text-center new-account">Create an account</a>-->
           </div>
        </div> <!-- /.row -->
    </div><!-- /.container -->

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
  </body>
</html>