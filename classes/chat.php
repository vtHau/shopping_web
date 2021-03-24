<?php
$filepath = realpath(dirname(__FILE__));
include_once($filepath . '/../lib/database.php');
include_once($filepath . '/../helpers/format.php');
?>

<?php

class chat
{
	private $db;
	private $fm;

	public function __construct()
	{
		$this->db = new Database();
		$this->fm = new Format();
	}

	public function getUserID()
	{
		$userID = session_id();
		if (Session::isUserLogin()) {
			$userID = Session::get("userID");
		}
		return $userID;
	}

	public function getChat()
	{
		$userID = Session::get("userID");
		$userImage = Session::get("userImage");
		$userFullName = Session::get("userFullName");

		$query = "SELECT * FROM tbl_chat WHERE fromID =  '$userID' AND toID = 'admin'  OR fromID = 'admin' AND toID = '$userID'";
		$result = $this->db->select($query);
		return $result;
	}

	public function getChatInAdmin($userID)
	{
		$adminID = Session::get("adminID");

		$query = "SELECT * FROM tbl_chat
						 	WHERE fromID =  '$adminID' AND toID = '$userID'
							OR fromID = '$userID' 	AND toID = '$adminID'
						";

		$result = $this->db->select($query);
		return $result;
	}

	public function insertChat($message)
	{
		$userID = Session::get("userID");

		if ($message == "") {
			$alert = "<span class='error'>Fiedls must be not empty</span>";
			return $alert;
		} else {
			$query = "INSERT INTO tbl_chat(fromID , toID , message ) VALUES( '$userID' , 'admin' , '$message' ) ";
			$result = $this->db->insert($query);

			return $result;
		}
	}

	public function insertChatInAdmin($userID, $message)
	{
		$adminID = Session::get("adminID");

		if ($message == "") {
			$alert = "<span class='error'>Fiedls must be not empty</span>";
			return $alert;
		} else {
			$query = "INSERT INTO tbl_chat(fromID , toID , message ) VALUES( '$adminID' , '$userID' , '$message' ) ";
			$result = $this->db->insert($query);

			return $result;
		}
	}

	public function deleteBrand($ID)
	{
		$query = "DELETE FROM tbl_brand WHERE brandID = '$ID'";
		$result = $this->db->delete($query);
		if ($result) {
			$alert = "<span class='success'>Brand Deleted Successfully</span>";
			return $alert;
		} else {
			$alert = "<span class='success'>Brand Deleted Not Success</span>";
			return $alert;
		}
	}
}
?>