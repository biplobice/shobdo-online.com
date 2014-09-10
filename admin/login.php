<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Shobdo-Online Admin Panel</title>
<!--<link rel="stylesheet" type="text/css" href="css/style.css" />-->
<style type="text/css">
#main_container { width: 600px; margin: 20px auto;}
.login_form {
	-moz-border-radius: 20px;
	-webkit-border-radius: 20px;
	background: -moz-linear-gradient(19% 75% 90deg, #d5d0d9, #ffffff);
	background: -webkit-gradient(linear, 0% 0%, 0% 100%, from(#ffffff), to(#d5d0d9));
	-moz-box-shadow: 0px -5px 300px #270644;
	-webkit-box-shadow: 0px -5px 300px #270644;
	width: 600px;
	height: 280px;
	float: left;
}
h3 { text-align: center; }
label {
	font: bold 12px/100% Arial, Helvetica, sans-serif;
	letter-spacing: 1px;
	text-transform: uppercase;
	line-height:30px;
}
form { text-align: center;}
input {
	width: 230px;
	font-size:16px;
}
p{ color: #FF0000; padding-left: 40px; }
</style>
</head>
<body>
<div id="main_container">

  <div class="login_form">
    <h3>Admin Panel Login</h3>
    <br />
    <br />
    <form id="form1" name="form1" method="post" action="login_verify.php">
        <label> <span>Username:</span>
          <input type="text" class="input_text" name="name" id="name">
        </label><br />
        <label> <span>Password:</span>
          <input type="password" class="input_text" name="password" id="password">
        </label>
        <p>
        <?php
            if (isset($_GET['msg'])){
                echo $_GET['msg'];
            }
			?>
		</p>
        <input type="submit" name="button" class="button green bigrounded"  id="button" value="Login" />
    </form>
  </div>
</div>
<!--End Main Container-->
</body>
</html>