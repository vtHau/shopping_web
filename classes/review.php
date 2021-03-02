<?php
$filepath = realpath(dirname(__FILE__));
include_once($filepath . '/../lib/database.php');
include_once($filepath . '/../helpers/format.php');
?>

<?php

class review
{
	private $db;
	private $fm;
	private $toast;

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

	public function getReview($productID)
	{
		$query = "SELECT * FROM tbl_review , tbl_customer WHERE productID = '$productID' AND tbl_review.status = 1 AND tbl_review.userID = tbl_customer.userID";
		$result = $this->db->select($query);
		return $result;
	}

	public function getStar($productID)
	{
		$query = "SELECT AVG(star) totalStar FROM tbl_review WHERE productID = '$productID' AND status = 1";
		$result = $this->db->select($query);
		return $result;
	}

	public function getMyStar($productID)
	{
		$userID = $this->getUserID();
		$query = "SELECT star FROM tbl_review WHERE productID = '$productID' AND tbl_review.status = 1 AND tbl_review.userID = '$userID'";
		$result = $this->db->select($query);
		return $result;
	}

	public function getComment($productID)
	{
		$userID = $this->getUserID();
		$query = "SELECT * FROM tbl_review , tbl_customer WHERE productID = '$productID' AND tbl_review.status = 1 AND tbl_review.userID = tbl_customer.userID AND tbl_review.userID = '$userID'";
		$result = $this->db->select($query);
		return $result;
	}

	public function getCountReview($productID)
	{
		$query = "SELECT count(reviewID) countReview FROM tbl_review WHERE productID = '$productID' AND status = 1";
		$result = $this->db->select($query);
		return $result;
	}

	public function insertReview($productID, $star, $comment)
	{
		$userID = session_id();
		if (Session::isUserLogin()) {
			$userID = Session::get("userID");
		}

		$query = "INSERT INTO tbl_review(userID, productID, comment, star, status) VALUES('$userID', '$productID', '$comment', '$star', 1)";
		$result = $this->db->insert($query);
		return $result;
	}

	public function updateReview($productID, $star, $comment)
	{
		$userID = session_id();
		if (Session::isUserLogin()) {
			$userID = Session::get("userID");
		}

		$query = "UPDATE tbl_review SET comment = '$comment' , star = '$star' WHERE userID = '$userID' AND productID = '$productID'";
		$result = $this->db->update($query);
		if ($result) {
			Session::set("updateComment", 0);
		}
		return $result;
	}

	public function deleteReview($productID)
	{
		$userID = session_id();
		if (Session::isUserLogin()) {
			$userID = Session::get("userID");
		}

		$query = "DELETE FROM tbl_review WHERE productID = '$productID' AND userID = '$userID'";
		$result = 	$this->db->delete($query);
		return $result;
	}
}
?>