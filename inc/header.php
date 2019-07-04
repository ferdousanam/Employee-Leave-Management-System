<!DOCTYPE html>
<html>
<head>
	<title>Employee Management System</title>
	<link rel="icon" type="image/x-icon" href="ico/favicon.ico">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<link rel="stylesheet" type="text/css" href="css/profile.css">
	<link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
</head>
<body>

<?php 
	$filepath = realpath(dirname(__FILE__));
	include_once($filepath.'/../config/sitedetails.php');
	include_once($filepath.'/../lib/Session.php');
	Session::init();
	Session::checkSession();

	//Classes are included here
	include_once($filepath.'/../classes/Employee.php');
	include_once($filepath.'/../classes/Application.php');
	$employee = new Employee();
	$app 	  = new Application();
 ?>

<?php
	if (isset($_GET['loginId'])) {
		Session::destroy();
	}
?>
<div class="template">
<div class="header">
	<i class="fa fa-handshake-o fa-2x" aria-hidden="true"></i>Employee Management System
</div>

<div class="main-menu clear">
	<ul>
		<li><a href="dashboard.php">Dashboard</a></li>
		<li><a href="employee.php">Manage Employee</a></li>
		<li>Other</li>
	</ul>
<div class="main-menu-right float-right">
	<ul>
		<li><a href="myprofile.php"><?php echo "Hy, " . Session::get('first_name') . " " . Session::get('last_name'); ?></a></li>
		<li><a href="?loginId=<?php Session::get('login'); ?>">Logout</a></li>
	</ul>
</div>
</div>