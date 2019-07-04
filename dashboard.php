<?php include 'inc/header.php'; ?>

<?php include 'plugins/leftsidebar.php'; ?>


<?php 
  	$emId = Session::get("employee_id");
    $getApp = $app->getApplicationsBySupervisor($emId);
    $reqCount = 0;
    if ($getApp) {
      $i = 0;
      while ($result = $getApp->fetch_assoc()) {
      	$reqCount++;
        $i++;
	    }
	}

	$getEmployee = $employee->getAllEmployee();
	    $empCount = 0;
	    if ($getEmployee) {
	      $i = 0;
	      while ($result = $getEmployee->fetch_assoc()) {
	      	$empCount++;
	        $i++;
	    }
	}

	$getMyApp = $app->getApplicationsByEmployee($emId);
		$myReqCount = 0;
	    if ($getMyApp) {
	      $i = 0;
	      while ($result = $getApp->fetch_assoc()) {
	      	$myReqCount++;
	        $i++;
	    }
	}
?>

<div class="main-content">
	<div class="dashboard-icons float-left">
		<a href="manageleave.php"><h2>Requests</h2>
		(<?= $reqCount ?>)</a>
	</div>
	<div class="dashboard-icons float-left">
		<a href="#">
		<h2>Employee</h2>
		(<?= $empCount ?>)
		</a>
	</div>
	<div class="dashboard-icons float-left">
		<a href="#"><h2>Self Req.</h2>
		(<?= $myReqCount ?>)</a>
	</div>
	<div class="dashboard-icons float-left">
		<a href="#"><h2>Requests</h2>
		(<?= $reqCount ?>)</a>
	</div>
</div>


<?php include 'inc/footer.php'; ?>