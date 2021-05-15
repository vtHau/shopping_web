<?php
$filepath = realpath(dirname(__FILE__));
include_once($filepath . '/../lib/database.php');
include_once($filepath . '/../helpers/format.php');
?>

<?php

class order
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

	public function getOrderInUser()
	{
		$userID = session_id();
		if (Session::isUserLogin()) {
			$userID = Session::get("userID");
		}

		$query = "SELECT * FROM tbl_order WHERE userID = '$userID' AND statusOrder <> 4";
		$result = $this->db->select($query);
		return $result;
	}

	public function getOrderHistory($userID)
	{
		$query = "SELECT * FROM tbl_order WHERE userID = '$userID' AND statusOrder <> 4";
		$result = $this->db->select($query);
		return $result;
	}

	public function getOrderInAdmin()
	{
		$query = "SELECT * FROM tbl_order , tbl_user WHERE tbl_order.userID = tbl_user.userID";
		$result = $this->db->select($query);
		return $result;
	}

	public function insertOrder()
	{
		$userID = session_id();
		if (Session::isUserLogin()) {
			$userID = Session::get("userID");
		}

		$query = "SELECT * FROM tbl_cart WHERE userID = '$userID'";
		$getCart = $this->db->select($query);

		if ($getCart) {
			while ($result = $getCart->fetch_assoc()) {
				$productID = $result['productID'];
				$productName = $result['productName'];
				$productQuantity = $result['productQuantity'];
				$productPrice = $result['productPrice'] * $productQuantity;
				$productImage = $result['productImage'];

				$queryOrder = "INSERT INTO tbl_order(userID, productID, productName, productQuantity, productPrice, productImage) VALUES('$userID','$productID','$productName','$productQuantity','$productPrice','$productImage')";
				$inserOrder = $this->db->insert($queryOrder);
			}
		}

		if ($inserOrder) {
			return true;
		}

		return false;
	}


	public function insertOrderUser($userID)
	{
		$query = "SELECT * FROM tbl_cart WHERE userID = '$userID'";
		$getCart = $this->db->select($query);

		if ($getCart) {
			while ($result = $getCart->fetch_assoc()) {
				$productID = $result['productID'];
				$productName = $result['productName'];
				$productQuantity = $result['productQuantity'];
				$productPrice = $result['productPrice'] * $productQuantity;
				$productImage = $result['productImage'];

				$queryOrder = "INSERT INTO tbl_order(userID, productID, productName, productQuantity, productPrice, productImage) VALUES('$userID','$productID','$productName','$productQuantity','$productPrice','$productImage')";
				$inserOrder = $this->db->insert($queryOrder);
			}
		}

		if ($inserOrder) {
			$query = "DELETE FROM tbl_cart WHERE userID = '$userID'";
			$resultDelete = $this->db->delete($query);
			if ($resultDelete) {
				return true;
			}
			return false;
		}

		return false;
	}

	public function deleteOrderInUser($orderID)
	{
		$orderID = mysqli_real_escape_string($this->db->link, $orderID);
		$query = "UPDATE tbl_order SET statusOrder = 4 WHERE orderID = '$orderID'";

		$result = $this->db->update($query);

		if ($result) {
			header('Location:orderdetails.php');
		} else {
			$msg = "<span class='error'>Sản phẩm đã được xóa</span>";
			return $msg;
		}
	}

	public function deleteOrderInAdmin($orderID)
	{
		$orderID = mysqli_real_escape_string($this->db->link, $orderID);
		$query = "DELETE FROM tbl_order WHERE orderID = '$orderID'";

		$result = $this->db->delete($query);

		if ($result) {
			header('Location:orderlist.php');
		} else {
			$msg = "<span class='error'>Sản phẩm đã được xóa</span>";
			return $msg;
		}
	}

	public function confirmOrder($orderID)
	{
		$orderID = mysqli_real_escape_string($this->db->link, $orderID);
		$query = "UPDATE tbl_order SET statusOrder = 1 WHERE orderID = '$orderID'";

		$result = $this->db->update($query);

		if ($result) {
			header('Location:orderlist.php');
		} else {
			$msg = "<span class='error'>Sản phẩm đã được xóa</span>";
			return $msg;
		}
	}

	public function transportOrder($orderID)
	{
		$orderID = mysqli_real_escape_string($this->db->link, $orderID);
		$query = "UPDATE tbl_order SET statusOrder = 2 WHERE orderID = '$orderID'";

		$result = $this->db->update($query);

		if ($result) {
			header('Location:orderlist.php');
		} else {
			$msg = "<span class='error'>Sản phẩm đã được xóa</span>";
			return $msg;
		}
	}

	public function receivedOrderInUser($orderID)
	{
		$orderID = mysqli_real_escape_string($this->db->link, $orderID);
		$query = "UPDATE tbl_order SET statusOrder = 3 WHERE orderID = '$orderID'";

		$result = $this->db->update($query);

		if ($result) {
			header('Location:orderdetails.php');
		} else {
			$msg = "<span class='error'>Sản phẩm đã được xóa</span>";
			return $msg;
		}
	}
}
?>