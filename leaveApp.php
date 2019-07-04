<?php include 'inc/header.php'; ?>

<?php include 'plugins/leftsidebar.php'; ?>

<?php
    if (!isset($_GET['appid']) || $_GET['appid'] == NULL) {
        echo "<script>window.location = 'manageleave.php'; </script>";
    }else {
        $id = preg_replace('/[^-a-zA-Z0-9]/', '', $_GET['appid']);
    }
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
        $updateApplication  = $app->applicationUpdate($_POST, $id);
    }
 ?>

<?php 
	
	$getAp = $app->getApplicationsById($id);

	if ($getAp) {
		while ($result= $getAp->fetch_assoc()) {
?>

<div class="main-content">
<form action="" method="POST">
	<div class="level">
		<div class="col-1 col-1-text float-left">Employee Name: </div>
		<div class="col-2"><input type="text" name="employeeName" readonly="readonly" value="<?= $result['first_name'], " ", $result['last_name'] ?>"></div>
	</div>
	<div class="level">
		<div class="col-1 col-1-text float-left">Subject: </div>
		<div class="col-2"><input type="text" name="app_subject" readonly="readonly" value="<?= $result['app_subject'] ?>"></div>
	</div>
	<div class="level">
		<div class="col-1 col-1-text float-left">Application Body: </div>
		<div class="col-2"><textarea name="app_body" readonly="readonly"><?= $result['app_body'] ?></textarea></div>
	</div>
	<div class="level">
		<div class="col-1 col-1-text float-left">Approval: </div>
		<div class="col-2">
			<input type="radio" name="app_approval" value="0" <?php if ($result['app_approval'] == '0') {echo ' checked ';} ?> > Later <br>
			<input type="radio" name="app_approval" value="1" <?php if ($result['app_approval'] == '1') {echo ' checked ';} ?> > Approve <br>
			<input type="radio" name="app_approval" value="2" <?php if ($result['app_approval'] == '2') {echo ' checked ';} ?> > Reject
		</div>
	</div>
	<div class="level">
		<div class="col-1 col-1-text float-left"></div>
		<div class="col-2"><input type="submit" name="submit" value="Submit"></div>
	</div>
</form>
</div>

<?php 
	}
}
 ?>
<?php include 'inc/footer.php'; ?>