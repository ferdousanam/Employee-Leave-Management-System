<?php
	$filepath = realpath(dirname(__FILE__));
	include_once($filepath.'/../lib/Session.php');
	include_once($filepath.'/../lib/Database.php');
	//include_once ($filepath.'/../helpers/Format.php');
?>

<?php 

/**
* Employee Class
*/
class Application
{
	private $db;
	//private $fm;

	public function __construct(){

		$this->db = new Database();
		//$this->fm = new Format();
	}

	public function applicationAdd($data){
		$app_subject	= mysqli_real_escape_string($this->db->link, $data['app_subject']);
		$app_body		= mysqli_real_escape_string($this->db->link, $data['app_body']);
		$employee_id	= Session::get('employee_id');

	    if ($app_subject == "" || $app_body == "") {
	    	$MSG = "<span class='success'> Field can't be empty. </span>";
			return $MSG;
	    }
	    else {
		    	$query = "INSERT INTO tlb_leave_applications(employee_id, app_subject, app_body, app_approval) VALUES ('$employee_id', '$app_subject', '$app_body', '0')";
		    	$applicationInsert = $this->db->insert($query);
				if ($applicationInsert) {
					$MSG = "<span class='success'> Application Added Successfully. </span>";
					return $MSG;
				}
				else {
					$MSG = "<span class='error'> Application Not Added. </span>";
					return $MSG;
				}
			}
	}

    public function getAllApplications()
	{
		$query = "SELECT * FROM tlb_leave_applications NATURAL JOIN employee";
		$result = $this->db->select($query);
		return $result;
	}
	public function getApplicationsBySupervisor($supervisor_id)
	{
		if ($supervisor_id == 0) {
			$query = "SELECT * FROM tlb_leave_applications JOIN employee
						ON tlb_leave_applications.employee_id = employee.id";
		}
		else {
			$query = "SELECT * FROM tlb_leave_applications JOIN employee
						ON tlb_leave_applications.employee_id = employee.id
						WHERE employee.supervisor_id = '$supervisor_id'";
		}
		$result = $this->db->select($query);
		return $result;
	}
	public function getApplicationsByEmployee($employee_id)
	{
		if ($employee_id == 0) {
			$query = "SELECT tlb_leave_applications.id, first_name, last_name, app_subject, app_approval FROM 
					tlb_leave_applications JOIN employee
					ON tlb_leave_applications.employee_id = employee.id";
		}
		else {
			$query = "SELECT tlb_leave_applications.id, first_name, last_name, app_subject, app_approval FROM 
					tlb_leave_applications JOIN employee
					ON tlb_leave_applications.employee_id = employee.id
					WHERE tlb_leave_applications.employee_id = '$employee_id'";
		}
		$result = $this->db->select($query);
		return $result;
	}
	public function getApplicationsById($id)
	{
		$query = "SELECT * FROM 
					tlb_leave_applications JOIN employee
					ON tlb_leave_applications.employee_id = employee.id
					WHERE tlb_leave_applications.id = '$id'";
		$result = $this->db->select($query);
		return $result;
	}

	public function applicationUpdate($data, $id){
		$app_subject	= mysqli_real_escape_string($this->db->link, $data['app_subject']);
		$app_body		= mysqli_real_escape_string($this->db->link, $data['app_body']);
		$app_approval	= mysqli_real_escape_string($this->db->link, $data['app_approval']);

	    if ($app_subject == "" || $app_body == "" || $app_approval == "") {
	    	$MSG = "<span class='success'> Field can't be empty. </span>";
			return $MSG;
	    }
	    else {
		    	$query = "UPDATE tlb_leave_applications
		    	SET
		    	app_subject 	= '$app_subject', 
		    	app_body    	= '$app_body', 
		    	app_approval    = '$app_approval'
		    	WHERE id = '$id'
		    	";
		    	$updated_row = $this->db->update($query);
				if ($updated_row) {
					$MSG = "<span class='success'> Application Updated Successfully. </span>";
					return $MSG;
				}
				else {
					$MSG = "<span class='error'> Application Not Updated. </span>";
					return $MSG;
				}
			}
	}

	public function applicationEdit($data, $id){
		$app_subject	= mysqli_real_escape_string($this->db->link, $data['app_subject']);
		$app_body		= mysqli_real_escape_string($this->db->link, $data['app_body']);

	    if ($app_subject == "" || $app_body == "") {
	    	$MSG = "<span class='success'> Field can't be empty. </span>";
			return $MSG;
	    }
	    else {
		    	$query = "UPDATE tlb_leave_applications
		    	SET
		    	app_subject 	= '$app_subject', 
		    	app_body    	= '$app_body'
		    	WHERE id = '$id'
		    	";
		    	$updated_row = $this->db->update($query);
				if ($updated_row) {
					$MSG = "<span class='success'> Application Updated Successfully. </span>";
					return $MSG;
				}
				else {
					$MSG = "<span class='error'> Application Not Updated. </span>";
					return $MSG;
				}
			}
	}

}

?>