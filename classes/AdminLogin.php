<?php
	$filepath = realpath(dirname(__FILE__));
	include_once($filepath.'/../lib/Session.php');
	Session::checkLogin();
	 include_once './lib/Database.php';
	//include_once '../helpers/Format.php';
/**
* Admin Login Class
*/
class AdminLogin
{
	private $db;
	private $fm;

	public function __construct()
	{
		$this->db = new Database();
		//$this->fm = new Format();
		
	}

	public function adminLogin($admin_username, $admin_password)
	{
		//$admin_username = $this->fm->validation($admin_username);
		//$admin_password = $this->fm->validation($admin_password);

		$admin_username = mysqli_real_escape_string($this->db->link, $admin_username);
		$admin_password = mysqli_real_escape_string($this->db->link, $admin_password);

		if (empty($admin_username) || empty($admin_password)) {
			$loginmsg = "Username or Parssword can't be empty";
			return $loginmsg;
		}
		else {
			$query = "SELECT * 
			FROM admin 
			WHERE username = '$admin_username' AND password = '$admin_password'";
			$result = $this->db->select($query);
			if ($result != false) {
				$value = $result->fetch_assoc();
				Session::set("login", true);
				Session::set("first_name", "Admin");
				Session::set("last_name", "");
				// Session::set("admin_id", $value['admin_id']);
				// Session::set("admin_username", $value['admin_username']);
				// Session::set("admin_name", $value['admin_name']);
				Session::set("employee_id", 0);
				header("Location:dashboard.php");
			}
			else {
				//$loginmsg = "Username or Password do not match!";
				return 0;
			}
		}

	}

	public function employeeLogin($employee_username, $employee_password)
	{
		//$admin_username = $this->fm->validation($admin_username);
		//$admin_password = $this->fm->validation($admin_password);

		$employee_username = mysqli_real_escape_string($this->db->link, $employee_username);
		$employee_password = mysqli_real_escape_string($this->db->link, $employee_password);

		if (empty($employee_username) || empty($employee_password)) {
			$loginmsg = "Username or Parssword can't be empty";
			return $loginmsg;
		}
		else {
			$query = "SELECT * 
			FROM employee 
			WHERE username = '$employee_username' AND password = '$employee_password'";
			$result = $this->db->select($query);
			if ($result != false) {
				$value = $result->fetch_assoc();
				Session::set("login", true);
				Session::set("employee_id", $value['id']);
				Session::set("first_name", $value['first_name']);
				Session::set("last_name", $value['last_name']);
				// Session::set("admin_name", $value['admin_name']);
				header("Location:dashboard.php");
			}
			else {
				$loginmsg = "Username or Password do not match!";
				return $loginmsg;
			}
		}

	}
}
?>