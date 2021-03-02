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

	public function getAllReview()
	{
		$query = "SELECT * FROM tbl_review , tbl_customer WHERE tbl_review.userID = tbl_customer.userID";
		$result = $this->db->select($query);
		return $result;
	}

	public function getReivewNotConfirm()
	{
		$query = "SELECT * FROM tbl_review , tbl_customer WHERE  tbl_review.status = 0 AND tbl_review.userID = tbl_customer.userID";
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
		$query = "SELECT * FROM tbl_review , tbl_customer WHERE productID = '$productID'  AND tbl_review.userID = tbl_customer.userID AND tbl_review.userID = '$userID'";
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

		$query = "INSERT INTO tbl_review(userID, productID, comment, star) VALUES('$userID', '$productID', '$comment', '$star')";
		$result = $this->db->insert($query);
		if ($result) {
			Session::set("insertReview", 0);
		}
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
		if ($result) {
			Session::set("deleteReview", 0);
		}
		return $result;
	}

	public function deleteReviewID($reviewID)
	{
		$query = "DELETE FROM tbl_review WHERE reviewID = '$reviewID'";
		$result = 	$this->db->delete($query);
		return $result;
	}

	public function confirmReview($reviewID)
	{
		$query = "UPDATE tbl_review SET status = 1 WHERE reviewID = '$reviewID'";
		$result = $this->db->update($query);
		return $result;
	}
}
?>