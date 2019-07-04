<!DOCTYPE html>
<html>
<head>
  <title>Employee Management System</title>
  <link rel="icon" type="image/x-icon" href="ico/favicon.ico">
  <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>

<div class="template">
<div class="header">
  Employee Management System
</div>

<?php
  include_once('lib/Includes.php');
  include_once('classes/AdminLogin.php');
    
  $admin_login = new AdminLogin();
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $admin_username = $_POST['username'];
    $admin_password = $_POST['password'];

    $loginCheck = $admin_login->adminLogin($admin_username, $admin_password);
    if ($loginCheck == 0) {
      $loginCheck = $admin_login->employeeLogin($admin_username, $admin_password);
    }
  }

 ?>

<div class="login div-center">
	<h1 class="center">User Login</h1>
	<div class="error-message center" style="text-align: center; color: red; font-size: 18px;">
	<?php
      if (isset($loginCheck)) {
        echo $loginCheck;
      }
     ?>
     </div>
	<form method="post">
		<input type="text" name="username" placeholder="Username" required="required" /><br>
	    <input type="password" name="password" placeholder="Password" required="required" /><br>
	    <center><input type="submit" name="save" value="Login"></center>
	</form>
</div>

<?php include 'inc/footer.php'; ?>