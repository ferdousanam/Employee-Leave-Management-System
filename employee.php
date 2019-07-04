<?php include 'inc/header.php'; ?>

<?php include 'plugins/leftsidebar.php'; ?>
<div class="main-content tableview">
	<table id="tablelist">
	  <thead>
	  <tr class="active">
	    <th><input type="checkbox" name="checked_id"></th>
	    <th>ID</th>
	    <th>First Name</th>
	    <th>Last Name</th>
	    <th>Job Title</th>
	    <th>Employment Status</th>
	    <th>Sub Unit</th>
	    <th>Supervisor</th>
	  </tr>
	  </thead>
	  <tfoot>

	  </tfoot>
	  <tbody>
	  <?php 
	    $getEmployee = $employee->getAllEmployee();
	    if ($getEmployee) {
	      $i = 0;
	      while ($result = $getEmployee->fetch_assoc()) {
	        $i++;
	   ?>
	  <tr onclick="window.document.location='profileview.php?id=<?= $result['id'] ?>';">
	  	<td><input type="checkbox" name=""></td>
	  	<td><?php echo $result['id']; ?></td>
	    <td><?php echo $result['first_name']; ?></td>
	    <td><?php echo $result['last_name']; ?></td>
	    <td><?php echo $result['job_title']; ?></td>
	    <td><?php echo $result['employment_status']; ?></td>
	    <td><?php echo $result['sub_unit']; ?></td>
	    <td>
		    <?php 
		    	$getSupervisor = $employee->getSupervisor($result['supervisor_id']);
			    if ($getSupervisor) {
			      $i = 0;
			      while ($result = $getSupervisor->fetch_assoc()) {
			        $i++;
			        echo $result['first_name'] . " " . $result['last_name'];
				    }
				}
	    	 ?>
	    </td>
	    
	  </tr>
	  <?php
	      }
	    }
	  ?>
	  </tbody>
	</table>
</div>
<?php include 'inc/footer.php'; ?>