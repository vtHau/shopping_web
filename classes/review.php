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
		$productID = $this->fm->validation(mysqli_real_escape_string($this->db->link, $productID));
		$query = "SELECT tbl_review.reviewID , tbl_review.comment , tbl_review.timeReview , tbl_review.star , tbl_user.userImage , tbl_user.userFullName  FROM tbl_review , tbl_user WHERE productID = '$productID' AND tbl_review.status = 1 AND tbl_review.userID = tbl_user.userID";
		$result = $this->db->select($query);
		return $result;
	}

	public function getAllReview()
	{
		$query = "SELECT * FROM tbl_review , tbl_user WHERE tbl_review.userID = tbl_user.userID";
		$result = $this->db->select($query);
		return $result;
	}

	public function getReivewNotConfirm()
	{
		$query = "SELECT * FROM tbl_review , tbl_user WHERE  tbl_review.status = 0 AND tbl_review.userID = tbl_user.userID";
		$result = $this->db->select($query);
		if ($result) {
			return $result;
		}
		return false;
	}

	public function getStar($productID)
	{
		$productID = $this->fm->validation(mysqli_real_escape_string($this->db->link, $productID));
		$query = "SELECT AVG(star) totalStar FROM tbl_review WHERE productID = '$productID' AND status = 1";
		$result = $this->db->select($query);
		return $result;
	}

	public function getMyStar($productID)
	{
		$productID = $this->fm->validation(mysqli_real_escape_string($this->db->link, $productID));
		$userID = $this->getUserID();
		$query = "SELECT star FROM tbl_review WHERE productID = '$productID' AND tbl_review.status = 1 AND tbl_review.userID = '$userID'";
		$result = $this->db->select($query);
		return $result;
	}

	public function getComment($productID)
	{
		$productID = $this->fm->validation(mysqli_real_escape_string($this->db->link, $productID));
		$userID = $this->getUserID();
		$query = "SELECT * FROM tbl_review , tbl_user WHERE productID = '$productID'  AND tbl_review.userID = tbl_user.userID AND tbl_review.userID = '$userID'";

		$result = $this->db->select($query);
		return $result;
	}

	public function getReviewByUser($userID, $productID)
	{
		$userID = $this->fm->validation(mysqli_real_escape_string($this->db->link, $userID));
		$productID = $this->fm->validation(mysqli_real_escape_string($this->db->link, $productID));

		$query = "SELECT tbl_review.reviewID , tbl_review.comment , tbl_review.timeReview , tbl_review.star , tbl_user.userImage , tbl_user.userFullName , tbl_review.status
					 FROM tbl_review , tbl_user WHERE productID = '$productID'  AND tbl_review.userID = tbl_user.userID AND tbl_review.userID = '$userID'";
		$result = $this->db->select($query);
		return $result;
	}

	public function getCountReview($productID)
	{
		$productID = $this->fm->validation(mysqli_real_escape_string($this->db->link, $productID));
		$query = "SELECT count(reviewID) countReview FROM tbl_review WHERE productID = '$productID' AND status = 1";
		$result = $this->db->select($query);
		return $result;
	}

	public function insertReview($productID, $star, $comment)
	{
		$productID = $this->fm->validation(mysqli_real_escape_string($this->db->link, $productID));
		$star = $this->fm->validation(mysqli_real_escape_string($this->db->link, $star));
		$comment = $this->fm->validation(mysqli_real_escape_string($this->db->link, $comment));

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

	public function newYourReview($userID, $productID, $star, $comment)
	{
		$productID = $this->fm->validation(mysqli_real_escape_string($this->db->link, $productID));
		$star = $this->fm->validation(mysqli_real_escape_string($this->db->link, $star));
		$comment = $this->fm->validation(mysqli_real_escape_string($this->db->link, $comment));

		$query = "INSERT INTO tbl_review(userID, productID, comment, star) VALUES('$userID', '$productID', '$comment', '$star')";
		$result = $this->db->insert($query);
		if ($result) {
			return true;
		}
		return false;
	}

	public function updateReview($productID, $star, $comment)
	{
		$productID = $this->fm->validation(mysqli_real_escape_string($this->db->link, $productID));
		$star = $this->fm->validation(mysqli_real_escape_string($this->db->link, $star));
		$comment = $this->fm->validation(mysqli_real_escape_string($this->db->link, $comment));

		$userID = session_id();
		if (Session::isUserLogin()) {
			$userID = Session::get("userID");
		}

		$query = "UPDATE tbl_review SET comment = '$comment' , star = '$star'  WHERE userID = '$userID' AND productID = '$productID'";
		$result = $this->db->update($query);
		if ($result) {
			Session::set("updateComment", 0);
		}
		return $result;
	}

	public function updateYourReview($userID, $productID, $star, $comment)
	{
		$userID = $this->fm->validation(mysqli_real_escape_string($this->db->link, $userID));
		$productID = $this->fm->validation(mysqli_real_escape_string($this->db->link, $productID));
		$star = $this->fm->validation(mysqli_real_escape_string($this->db->link, $star));
		$comment = $this->fm->validation(mysqli_real_escape_string($this->db->link, $comment));
		$query = "UPDATE tbl_review SET comment = '$comment' , star = '$star'  WHERE userID = '$userID' AND productID = '$productID'";

		$result = $this->db->update($query);

		if ($result) {
			return true;
		}
		return false;
	}

	public function deleteReview($productID)
	{
		$productID = $this->fm->validation(mysqli_real_escape_string($this->db->link, $productID));
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

	public function deleteYourReview($userID, $productID)
	{
		$userID = $this->fm->validation(mysqli_real_escape_string($this->db->link, $userID));
		$productID = $this->fm->validation(mysqli_real_escape_string($this->db->link, $productID));

		$query = "DELETE FROM tbl_review WHERE productID = '$productID' AND userID = '$userID'";
		$result = 	$this->db->delete($query);
		if ($result) {
			return true;
		}
		return false;
	}

	public function deleteReviewID($reviewID)
	{
		$reviewID = $this->fm->validation(mysqli_real_escape_string($this->db->link, $reviewID));
		$query = "DELETE FROM tbl_review WHERE reviewID = '$reviewID'";
		$result = 	$this->db->delete($query);
		if ($result) {
			return true;
		}
		return false;
	}

	public function confirmReview($reviewID)
	{
		$reviewID = $this->fm->validation(mysqli_real_escape_string($this->db->link, $reviewID));
		$query = "UPDATE tbl_review SET status = 1 WHERE reviewID = '$reviewID'";
		$result = $this->db->update($query);
		if ($result) {
			return true;
		}
		return false;
	}
}
?>