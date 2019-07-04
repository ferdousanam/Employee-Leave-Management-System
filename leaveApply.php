<?php include 'inc/header.php'; ?>

<?php include 'plugins/leftsidebar.php'; ?>

<?php    
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
        $addApplication  = $app->applicationAdd($_POST);
    }
    if (isset($addApplication)) {
    	echo $addApplication;
    }
 ?>

<?php 	
	$getEmp = $employee->getByEmployeeId(Session::get('employee_id'));			
?>

<div class="main-content">
<form action="" method="POST">
	<div class="level">
		<div class="col-1 col-1-text float-left">Employee Name: </div>
		<div class="col-2"><input type="text" name="employeeName" readonly="readonly" value="<?php 
			if ($getEmp) {
			while ($result= $getEmp->fetch_assoc()) {
					echo $result['first_name'] ." " . $result['last_name'];
				}
			}
		 ?>"></div>
	</div>
	<div class="level">
		<div class="col-1 col-1-text float-left">Subject: </div>
		<div class="col-2"><input type="text" name="app_subject""></div>
	</div>
	<div class="level">
		<div class="col-1 col-1-text float-left">Application Body: </div>
		<div class="col-2"><textarea name="app_body"></textarea></div>
	</div>
	<div class="level">
		<div class="col-1 col-1-text float-left"></div>
		<div class="col-2"><input type="submit" name="submit" value="Apply"></div>
	</div>
</form>
</div>


<?php include 'inc/footer.php'; ?>