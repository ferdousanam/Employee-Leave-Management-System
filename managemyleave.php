<?php include 'inc/header.php'; ?>

<?php include 'plugins/leftsidebar.php'; ?>
<div class="main-content tableview">
	<div class="btn-default apply-btn">
		<a href="<?= $base_url; ?>leaveApply.php">Apply for Leave</a>
	</div>
	<table id="tablelist">
	  <thead>
	  <tr class="active">
	    <th><input type="checkbox" name="checked_id"></th>
	    <th>ID</th>
	    <th>Employee Name</th>
	    <th>Job Title</th>
	    <th>Application Subject</th>
	    <th>Status</th>
	    <th>Action</th>
	  </tr>
	  </thead>
	  <tfoot>

	  </tfoot>
	  <tbody>
	  <?php 
	  	$emId = Session::get("employee_id");
	  	echo "Employee ID: " . $emId;
	    $getApp = $app->getApplicationsByEmployee($emId);
	    if ($getApp) {
	      $i = 0;
	      while ($result = $getApp->fetch_assoc()) {
	        $i++;
	   ?>
	  <tr>
	  	<td><input type="checkbox" name=""></td>
	  	<td><a href="leaveApp.php?appid=<?= $result['id'] ?>"><?php echo $result['id']; ?></a></td>
	    <td><?= $result['first_name'], " ", $result['last_name'] ?></td>
	    <td>Job Title</td>
	    <td><?= $result['app_subject'] ?></td>
	    <td>
	    	<?php 
	    		if ($result['app_approval'] == 0) {
	    			echo "Pending";
	    		}
	    		elseif ($result['app_approval'] == 1) {
	    			echo "Approved";
	    		}
	    		else {
	    			echo "Rejected";
	    		}
	    	 ?>
	    </td>
	    <td>
	    <?php 
	    	if ($result['app_approval'] == 0) {
	     ?>
	    <a class="btn btn-default" href="leaveAppEdit.php?appid=<?php echo $result['id']; ?>">Edit</a> <a class="btn btn-danger" onclick="return confirm('Are you sure to delete the data!')" href="?appDelete=<?php echo $result['id']; ?>">Delete</a></td>
	    <?php }
	    	else {
	    		echo "Closed";
	    	}
	     ?>
	  </tr>
	  <?php
	      }
	    }
	  ?>
	  </tbody>
	</table>
</div>
<?php include 'inc/footer.php'; ?>