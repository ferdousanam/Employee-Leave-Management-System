<?php 
	$filepath = realpath(dirname(__FILE__));
	include_once($filepath.'/../lib/Session.php');
	Session::init();
	include_once($filepath.'/../classes/Employee.php');
	include_once($filepath.'/../classes/Application.php');
	$employee = new Employee();
	$app 	  = new Application();
 ?>