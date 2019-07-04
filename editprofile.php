<?php include 'inc/header.php'; ?>
<?php include 'plugins/leftsidebar.php'; ?>

<div class="content float-left">
	<h2>View Employee Details</h2>
	<form action="" method="POST">
	<?php 	    
	    if (!isset($_GET['id']) || $_GET['id'] == NULL) {
	        echo "<script>window.location = 'employee.php'; </script>";
	    }else {
	        $id = preg_replace('/[^a-zA-Z0-9_]/', '', $_GET['id']);
	    }

	    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
	        $updateEmployee  = $employee->employeeUpdate($_POST, $id);
	    }

	    if (isset($updateEmployee)) {
	        echo $updateEmployee;
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
				<input type="text" name="first_name" value="<?= $result['first_name'] ?>">
			</div>
			<div class="add-employee-col">
				<h2>Last Name</h2>
				<input type="text" name="last_name"  value="<?= $result['last_name'] ?>">
			</div><br>
			<div class="add-employee-col">
				<h2>Cell Phone Number</h2>
				<input type="text" name="cell_phone" value="<?= $result['cell_phone'] ?>">
			</div>
			<div class="add-employee-col">
				<h2>Home Phone Number</h2>
				<input type="text" name="home_phone" value="<?= $result['home_phone'] ?>">
			</div>
		</div>
		<div class="add-employee-row">
			<div class="add-employee-col">
				<h2>Personal Email</h2>
				<input type="text" name="email" value="<?= $result['email'] ?>">
			</div>
			<div class="add-employee-col">
				<h2>Emergency Contact Name</h2>
				<input type="text" name="emergency_contact_name" value="<?= $result['emergency_contact_name'] ?>">
			</div>
			<div class="add-employee-col">
				<h2>Emergency Contact Number</h2>
				<input type="text" name="emergency_contact_number" value="<?= $result['emergency_contact_number'] ?>">
			</div>
		</div>
		<div class="add-employee-row clear">
			<div class="add-employee-col">
				<h2>Current Address</h2>
				<textarea name="current_address"><?= $result['current_address'] ?></textarea>
			</div>
		</div>
		<div class="add-employee-row clear">
			<div class="add-employee-col">
				<h2>Permanent Address</h2>
				<textarea name="permanent_address"><?= $result['permanent_address'] ?></textarea>
			</div>
		</div>
		<div class="add-employee-row clear">
			<div class="add-employee-col">
				<h2>Date of Birth</h2>
				<input type="text" name="dob" value="<?= $result['dob'] ?>">
			</div>
			<div class="add-employee-col">
				<h2>Blood Group</h2>
				<input type="text" name="blood_group" value="<?= $result['blood_group'] ?>">
			</div>
			<div class="add-employee-col">
				<h2>Gender</h2>
				<input type="radio" name="gender" value="0" <?php if ($result['gender'] == '0') {echo ' checked ';} ?> > Male <br>
				<input type="radio" name="gender" value="1" <?php if ($result['gender'] == '1') {echo ' checked ';} ?> > Female
			</div>
		</div>
		<div class="add-employee-row clear">
			<div class="add-employee-col">
				<h2>Supervisor</h2>
				<select id="select" name="supervisor_id">
                <option>Select Supervisor</option>
                <?php
                    $getSupervisor = $employee->getAllSupervisor();
                        if ($getSupervisor) {
                          $i=0;
                          while ($result1 = $getSupervisor->fetch_assoc()) {
                            $i++;
                ?>
                <option
                  <?php
                      if ($result1['employee_id'] == $result['supervisor_id']) { ?>
                        selected = "selected"
                  <?php } ?>
                        value="<?php echo $result1['employee_id']; ?>"><?= $result1['first_name'] . " " . $result1['last_name'] ?></option>
                <?php } } ?>
            </select>
			</div>
			<div class="add-employee-col">
				
			</div>
		</div>
		<div class="add-employee-row clear">
			<div class="add-employee-col">
				<input type="submit" name="submit" value="Edit Employee">
			</div>
		</div>
		<?php } } ?>
	</form>
</div>


<?php include 'inc/footer.php'; ?>