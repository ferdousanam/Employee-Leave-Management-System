<section class="content-section clear">
<div class="left-sidebar clear">
	<div class="samesidebar">
		<h2>Side Menu</h2>
		<ul>
			<li><i class="fa fa-cog" aria-hidden="true"></i><a href="dashboard.php">Dashboard</a></li>
			<?php if (Session::get('employee_id') == 0) { ?>
			<li><i class="fa fa-address-book-o" aria-hidden="true"></i><a href="employeeadd.php">Add Employee</a></li>
			<li><i class="fa fa-address-book-o" aria-hidden="true"></i><a href="employee.php">Manage Employee</a></li>
			<?php } ?>
			<?php 
				$supervisorCheck = $employee->checkSupervisor(Session::get('employee_id'));
		      	if ($supervisorCheck == 1 || Session::get('employee_id') == 0) {
		     ?>
		      		<li><i class="fa fa-address-card" aria-hidden="true"></i><a href="manageleave.php">Leave Requests</a></li>
		    <?php
	    	 	 }
			 ?>
			<li><i class="fa fa-envelope-open"></i><a href="managemyleave.php">My Applications</a></li>
		</ul>
	</div>
	<div class="samesidebar">
		<h2>User Menu</h2>
		<ul>
			<li><i class="fa fa-user-o" aria-hidden="true"></i><a href="myprofile.php">View Profile</a></li>
			<li><i class="fa fa-pencil-square-o" aria-hidden="true"></i><a href="editprofile.php?id=<?= Session::get('employee_id') ?>">Edit Profile</a></li>
		</ul>
	</div>
</div>