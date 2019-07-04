<?php include 'inc/header.php'; ?>
<?php include 'plugins/leftsidebar.php'; ?>

<div class="content float-left">
	<h2>View Employee Details</h2>
	<form>
	<?php 
		if (!isset($_GET['id']) || $_GET['id'] == NULL) {
	        echo "<script>window.location = '404.php'; </script>";
	    }else {
	        $id = preg_replace('/[^a-zA-Z0-9_]/', '', $_GET['id']);
	    }
		$getEmp = $employee->getByEmployeeId($id);

		if ($getEmp) {
			while ($result= $getEmp->fetch_assoc()) {
	?>
		<div class="add-employee-row">
			<div class="add-employee-col">
				<img src="<?= $base_url ?>images/def-profile.jpg">
			</div>
			<div class="add-employee-col">
				<h2>First Name</h2>
				<input type="text" name="first_name" value="<?= $result['first_name'] ?>" readonly="readonly">
			</div>
			<div class="add-employee-col">
				<h2>Last Name</h2>
				<input type="text" name="last_name"  value="<?= $result['last_name'] ?>" readonly="readonly">
			</div><br>
			<div class="add-employee-col">
				<h2>Cell Phone Number</h2>
				<input type="text" name="cell_phone" value="<?= $result['cell_phone'] ?>" readonly="readonly">
			</div>
			<div class="add-employee-col">
				<h2>Home Phone Number</h2>
				<input type="text" name="home_phone" value="<?= $result['home_phone'] ?>" readonly="readonly">
			</div>
		</div>
		<div class="add-employee-row">
			<div class="add-employee-col">
				<h2>Personal Email</h2>
				<input type="text" name="email" value="<?= $result['email'] ?>" readonly="readonly">
			</div>
			<div class="add-employee-col">
				<h2>Emergency Contact Name</h2>
				<input type="text" name="emergency_contact_name" value="<?= $result['emergency_contact_name'] ?>" readonly="readonly">
			</div>
			<div class="add-employee-col">
				<h2>Emergency Contact Number</h2>
				<input type="text" name="emergency_contact_number" value="<?= $result['emergency_contact_number'] ?>" readonly="readonly">
			</div>
		</div>
		<div class="add-employee-row clear">
			<div class="add-employee-col">
				<h2>Current Address</h2>
				<textarea name="current_address" readonly="readonly"><?= $result['current_address'] ?></textarea>
			</div>
		</div>
		<div class="add-employee-row clear">
			<div class="add-employee-col">
				<h2>Permanent Address</h2>
				<textarea name="permanent_address" readonly="readonly"><?= $result['permanent_address'] ?></textarea>
			</div>
		</div>
		<div class="add-employee-row clear">
			<div class="add-employee-col">
				<h2>Date of Birth</h2>
				<input type="text" name="dob" value="<?= $result['dob'] ?>" readonly="readonly">
			</div>
			<div class="add-employee-col">
				<h2>Blood Group</h2>
				<input type="text" name="blood_group" value="<?= $result['blood_group'] ?>" readonly="readonly">
			</div>
			<div class="add-employee-col">
				<h2>Gender</h2>
				<p>
					<?php if ($result['gender'] == '1') {echo ' Male ';} ?><br>
					<?php if ($result['gender'] == '2') {echo ' Female ';} ?>
				</p>
			</div>
		</div>
		<div class="add-employee-row clear">
			<div class="add-employee-col">
				<h2>Supervisor</h2>
				<p>
	                <?php
	                    $getSupervisor = $employee->getByEmployeeId($result['supervisor_id']);
	                        if ($getSupervisor) {
	                          $i=0;
	                          while ($result1 = $getSupervisor->fetch_assoc()) {
	                            $i++;
	                            echo $result1['first_name'] . " " . $result1['last_name'];
	                ?>
	                <?php } } ?>
            	</p>
			</div>
		</div>
		<div class="add-employee-row clear">
			<div class="add-employee-col">
				<a href="<?= $base_url ?>editprofile.php?id=<?= $result['id'] ?>">Edit Profile</a>
			</div>
		</div>
		<?php } } ?>
	</form>
</div>


<?php include 'inc/footer.php'; ?>