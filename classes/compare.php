<?php
$filepath = realpath(dirname(__FILE__));
include_once($filepath . '/../lib/database.php');
include_once($filepath . '/../helpers/format.php');
?>

<?php

class compare
{
	private $db;
	private $fm;

	public function __construct()
	{
		$this->db = Database::getInstance();
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

	public function getCompare()
	{
		$userID = $this->getUserID();

		$query = "SELECT * FROM tbl_compare WHERE userID = '$userID'  ORDER BY compareID DESC  LIMIT 3 ";
		$result = $this->db->select($query);
		return $result;
	}

	public function inserCompare($productID)
	{
		$productID = $this->fm->validation(mysqli_real_escape_string($this->db->link, $productID));

		$query = "SELECT * FROM tbl_product WHERE productID = '$productID' ";
		$result = $this->db->select($query)->fetch_assoc();

		$productName = $result['productName'];
		$productPrice = $result['productPrice'];
		$productImage = $result['productImage'];
		$productDesc = $result['productDesc'];

		$userID = $this->getUserID();

		$queryInsert = "INSERT INTO tbl_compare(userID, productID, productName, productPrice, productImage, productDesc) VALUES('$userID', '$productID', '$productName','$productPrice', '$productImage', '$productDesc') ";
		$resultInsert = $this->db->insert($queryInsert);

		if ($resultInsert) {
			header('Location:compare.php');
		} else {
			$msg = "Thất bại";
			return $msg;
		}
	}


	public function getCountWishlist()
	{
		$userID = $this->getUserID();

		$query = "SELECT COUNT(productID) AS countWishlist FROM tbl_wishlist WHERE userID = '$userID'";
		$result = $this->db->select($query)->fetch_assoc();
		return $result;
	}

	public function deleteCompare($compareID)
	{
		$compareID = $this->fm->validation(mysqli_real_escape_string($this->db->link, $compareID));

		$query = "DELETE FROM tbl_compare WHERE compareID = '$compareID'";
		$result = $this->db->delete($query);

		if ($result) {
			header('Location:compare.php');
		} else {
			$msg = "<span class='error'>Thất bại</span>";
			return $msg;
		}
	}
}
?>