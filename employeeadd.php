<?php include 'inc/header.php'; ?>
<?php include 'plugins/leftsidebar.php'; ?>

<div class="content float-left">
	<h2>View Employee Details</h2>
	<form action="" method="POST">
	<?php 
		if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
        $employeeInsert  = $employee->employeeAdd($_POST);

        if ($employeeInsert) {
        	echo $employeeInsert;
        }
    }
	?>
		<div class="add-employee-row">
			<div class="add-employee-col">
				<img src="<?= $base_url ?>images/def-profile.jpg">
				<input type="file" name="profileImage" id="profileImage">
			</div>
			<div class="add-employee-col">
				<h2>First Name</h2>
				<input type="text" name="first_name" placeholder="First Name">
			</div>
			<div class="add-employee-col">
				<h2>Last Name</h2>
				<input type="text" name="last_name" placeholder="Last Name">
			</div><br>
			<div class="add-employee-col">
				<h2>Cell Phone Number</h2>
				<input type="text" name="cell_phone" placeholder="+880">
			</div>
			<div class="add-employee-col">
				<h2>Home Phone Number</h2>
				<input type="text" name="home_phone" placeholder="+880">
			</div>
		</div>
		<div class="add-employee-row">
			<div class="add-employee-col">
				<h2>Personal Email</h2>
				<input type="text" name="email" placeholder="@">
			</div>
			<div class="add-employee-col">
				<h2>Emergency Contact Name</h2>
				<input type="text" name="emergency_contact_name" placeholder="Emergency Contact Name">
			</div>
			<div class="add-employee-col">
				<h2>Emergency Contact Number</h2>
				<input type="text" name="emergency_contact_number" placeholder="Emergency Contact Number">
			</div>
		</div>
		<div class="add-employee-row clear">
			<div class="add-employee-col">
				<h2>Current Address</h2>
				<textarea name="current_address" placeholder="Current Address"></textarea>
			</div>
		</div>
		<div class="add-employee-row clear">
			<div class="add-employee-col">
				<h2>Permanent Address</h2>
				<textarea name="permanent_address" placeholder="Permanent Address"></textarea>
			</div>
		</div>
		<div class="add-employee-row clear">
			<div class="add-employee-col">
				<h2>Date of Birth</h2>
				<input type="text" name="dob" placeholder="YEAR-MONTH-DATE">
			</div>
			<div class="add-employee-col">
				<h2>Blood Group</h2>
				<input type="text" name="blood_group" placeholder="Blood Group">
			</div>
			<div class="add-employee-col">
				<h2>Gender</h2>
				<input type="radio" name="gender" value="0"> Male <br>
				<input type="radio" name="gender" value="1"> Female 
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
                <option value="<?php echo $result1['id']; ?>"><?= $result1['first_name'] . " " . $result1['last_name'] ?>
                </option>
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
	</form>
</div>


<?php include 'inc/footer.php'; ?>