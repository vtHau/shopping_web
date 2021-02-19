<?php
$filepath = realpath(dirname(__FILE__));
include_once($filepath . '/../lib/database.php');
include_once($filepath . '/../helpers/format.php');
?>

<?php
class user
{
	private $db;
	private $fm;

	public function __construct()
	{
		$this->db = new Database();
		$this->fm = new Format();
	}

	public function loginCustomer($data)
	{
		$username = mysqli_real_escape_string($this->db->link, $data["username"]);
		$password = mysqli_real_escape_string($this->db->link, $data["password"]);

		if ($username == "" || $password == "") {
			$alert = "<span class='error'>Vui long hoan thanh cac truong</span>";
			return $alert;
		} else {
			$password = md5($password);
			$check = "SELECT * FROM tbl_customer WHERE username = '$username' AND password = '$password'";
			$resultCheck = $this->db->select($check);

			if ($resultCheck) {
				$value = $resultCheck->fetch_assoc();
				Session::set("userLogin", true);
				Session::set("userID",  $value["userID"]);
				Session::set("username",  $value["username"]);
				Session::set("userFullName",  $value["userFullName"]);
				Session::set("userImage",  $value["userImage"]);
				header("Location: index.php");
			} else {
				$alert = "<span class='error'>username hoac mat khau khong hop le</span>";
				return $alert;
			}
		}
	}

	public function insertCustomer($data)
	{
		$name = mysqli_real_escape_string($this->db->link, $data["name"]);
		$city = mysqli_real_escape_string($this->db->link, $data["city"]);
		$zipcode = mysqli_real_escape_string($this->db->link, $data["zipcode"]);
		$username = mysqli_real_escape_string($this->db->link, $data["username"]);
		$address = mysqli_real_escape_string($this->db->link, $data["address"]);
		$country = mysqli_real_escape_string($this->db->link, $data["country"]);
		$phone = mysqli_real_escape_string($this->db->link, $data["phone"]);
		$password = mysqli_real_escape_string($this->db->link, $data["password"]);
		$password = md5($password);

		if ($name == '' || $city == "" || $zipcode == "" || $username == "" || $address == "" || $country == "" || $phone == "" || $password == "") {
			$alert = "<span class='error'>Fiedls must be not empty</span>";
			return $alert;
		} else {
			$checkusername = "SELECT * FROM  tbl_customer WHERE username = '$username' LIMIT 1";
			$resultCheck = $this->db->select($checkusername);
			if ($resultCheck) {
				$alert = "<span class='error'>Dia chi username khong hop le</span>";
				return $alert;
			} else {
				$query = "INSERT INTO tbl_customer(name, address, city, country,zipcode, phone, username, password) VALUES('$name','$address', '$city', '$country', '$zipcode', '$phone', '$username', '$password')";
				$result = $this->db->insert($query);
				if ($result) {
					$alert = "<span class='error'>Them nguoi dung thanh cong</span>";
					return $alert;
				} else {
					$alert = "<span class='error'>Them nguoi dung khong thanh cong</span>";
					return $alert;
				}
			}
		}
	}



	public function getCustomer($ID)
	{
		$query = "SELECT * FROM tbl_customer WHERE userID = '$ID'";
		$result = $this->db->select($query);
		return $result;
	}

	public function updateCustomer($data, $ID)
	{
		$name = mysqli_real_escape_string($this->db->link, $data["name"]);
		// $city = mysqli_real_escape_string($this->db->link, $data["city"]);
		$zipcode = mysqli_real_escape_string($this->db->link, $data["zipcode"]);
		$username = mysqli_real_escape_string($this->db->link, $data["username"]);
		$address = mysqli_real_escape_string($this->db->link, $data["address"]);
		$phone = mysqli_real_escape_string($this->db->link, $data["phone"]);
		// $password = mysqli_real_escape_string($this->db->link, $data["password"]);
		// $password = md5($password);

		if ($name == ''  || $zipcode == "" || $username == "" || $address == "" || $phone == "") {
			$alert = "<span class='error'>Fiedls must be not empty</span>";
			return $alert;
		} else {
			$query = "UPDATE tbl_customer SET name = '$name', address = '$address', zipcode = '$zipcode', phone = '$phone', username = '$username'";
			$result = $this->db->update($query);
			if ($result) {
				$alert = "<span class='error'>Cap nhap thong tin thanh cong</span>";
				return $alert;
			} else {
				$alert = "<span class='error'>Cap nhap thong tin khong thanh cong</span>";
				return $alert;
			}
		}
	}
}
