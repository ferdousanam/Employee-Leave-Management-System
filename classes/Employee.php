<?php
	$filepath = realpath(dirname(__FILE__));
	include_once($filepath.'/../lib/Database.php');
	//include_once ($filepath.'/../helpers/Format.php');
?>

<?php 

/**
* Employee Class
*/
class Employee
{
	private $db;
	//private $fm;

	public function __construct(){

		$this->db = new Database();
		//$this->fm = new Format();
	}

	public function employeeAdd($data)
	{
		$first_name 				= mysqli_real_escape_string($this->db->link, $data['first_name']);
		$last_name  				= mysqli_real_escape_string($this->db->link, $data['last_name']);
		$cell_phone 				= mysqli_real_escape_string($this->db->link, $data['cell_phone']);
		$home_phone 				= mysqli_real_escape_string($this->db->link, $data['home_phone']);
		$email 						= mysqli_real_escape_string($this->db->link, $data['email']);
		$emergency_contact_name	 	= mysqli_real_escape_string($this->db->link, $data['emergency_contact_name']);
		$emergency_contact_number 	= mysqli_real_escape_string($this->db->link, $data['emergency_contact_number']);
		$current_address 			= mysqli_real_escape_string($this->db->link, $data['current_address']);
		$permanent_address 			= mysqli_real_escape_string($this->db->link, $data['permanent_address']);
		$dob 						= mysqli_real_escape_string($this->db->link, $data['dob']);
		$blood_group 				= mysqli_real_escape_string($this->db->link, $data['blood_group']);
		$gender 					= mysqli_real_escape_string($this->db->link, $data['gender']);
		$supervisor_id 				= mysqli_real_escape_string($this->db->link, $data['supervisor_id']);

	    if ($first_name == "" || $last_name == "" || $cell_phone == "" || $email == "" || $current_address == "" || $dob == "" || $gender == "") {
	    	$MSG = "<span class='success'> Field can't be empty. </span>";
			return $MSG;
	    }
	    else {
	    	$query = "INSERT INTO employee(first_name, last_name, cell_phone, home_phone, email, emergency_contact_name, emergency_contact_number, current_address, permanent_address, dob, blood_group, gender, supervisor_id) VALUES ('$first_name', '$last_name', '$cell_phone', '$home_phone', '$email', '$emergency_contact_name', '$emergency_contact_number', '$current_address', '$permanent_address', '$dob', '$blood_group', '$gender', '$supervisor_id')
	    	";
	    	$employeeInsert = $this->db->insert($query);
			if ($employeeInsert) {
				$MSG = "<span class='success'> Employee Added Successfully. </span>";
				return $MSG;
			}
			else {
				$MSG = "<span class='error'> Employee Not Added. </span>";
				return $MSG;
			}
	    }

	}

	public function employeeUpdate($data, $id){
		$first_name 				= mysqli_real_escape_string($this->db->link, $data['first_name']);
		$last_name  				= mysqli_real_escape_string($this->db->link, $data['last_name']);
		$cell_phone 				= mysqli_real_escape_string($this->db->link, $data['cell_phone']);
		$home_phone 				= mysqli_real_escape_string($this->db->link, $data['home_phone']);
		$email 						= mysqli_real_escape_string($this->db->link, $data['email']);
		$emergency_contact_name	 	= mysqli_real_escape_string($this->db->link, $data['emergency_contact_name']);
		$emergency_contact_number 	= mysqli_real_escape_string($this->db->link, $data['emergency_contact_number']);
		$current_address 			= mysqli_real_escape_string($this->db->link, $data['current_address']);
		$permanent_address 			= mysqli_real_escape_string($this->db->link, $data['permanent_address']);
		$dob 						= mysqli_real_escape_string($this->db->link, $data['dob']);
		$blood_group 				= mysqli_real_escape_string($this->db->link, $data['blood_group']);
		$gender 					= mysqli_real_escape_string($this->db->link, $data['gender']);
		$supervisor_id 				= mysqli_real_escape_string($this->db->link, $data['supervisor_id']);

		if ($first_name == "" || $last_name == "" || $cell_phone == "" || $email == "" || $current_address == "" || $dob == "" || $gender == "") {
	    	$MSG = "<span class='success'> Field can't be empty. </span>";
			return $MSG;
	    }
		else {
		    	$query = "UPDATE employee
		    	SET
		    	first_name						 = '$first_name', 
		    	last_name      					 = '$last_name', 
		    	cell_phone   					 = '$cell_phone', 
		    	home_phone        				 = '$home_phone', 
		    	email        					 = '$email', 
		    	emergency_contact_name        	 = '$emergency_contact_name',
		    	emergency_contact_number         = '$emergency_contact_number',
		    	current_address        			 = '$current_address',
		    	permanent_address        		 = '$permanent_address',
		    	dob        						 = '$dob',
		    	blood_group        				 = '$blood_group',
		    	gender        					 = '$gender',
		    	supervisor_id        			 = '$supervisor_id'
		    	WHERE id				 		 = '$id'
		    	";
		    	$updated_row = $this->db->update($query);
				if ($updated_row) {
					$MSG = "<span class='success'> Employee Updated Successfully. </span>";
					return $MSG;
				}
				else {
					$MSG = "<span class='error'> Employee Not Updated. </span>";
					return $MSG;
				}
			}
		}

    public function getAllEmployee()
	{
		$query = "SELECT * FROM employee";
		$result = $this->db->select($query);
		return $result;
	}

	public function getByEmployeeId($id){
		$query = "SELECT * FROM employee WHERE id='$id'";
		$result = $this->db->select($query);
		return $result;
	}

	public function checkSupervisor($supervisor_id)
	{
		$query = "SELECT * 
			FROM employee 
			WHERE supervisor_id = '$supervisor_id'";
			$result = $this->db->select($query);
			if ($result != false) {
				return 1;
			}
			else {
				return 0;
			}
	}
	public function getSupervisor($supervisor_id)
	{
		$query = "SELECT * 
			FROM employee 
			WHERE id = '$supervisor_id'";
			$result = $this->db->select($query);
			return $result;
	}

	public function getAllSupervisor()
	{
		$query = "SELECT * 
			FROM tbl_supervisors NATURAL JOIN employee
			";
			$result = $this->db->select($query);
			return $result;
	}

	public function getAllSupervisorNo()
	{
		$query = "SELECT id, first_name, last_name 
			FROM employee 
			WHERE id IN 
			(SELECT supervisor_id AS s FROM employee GROUP BY supervisor_id)
			ORDER BY first_name ASC";
			$result = $this->db->select($query);
			return $result;
	}
}

?>