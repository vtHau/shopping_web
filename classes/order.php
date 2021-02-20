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

	public function deleteOrderInUser($orderID)
	{
		$orderID = mysqli_real_escape_string($this->db->link, $orderID);
		$query = "UPDATE tbl_order SET statusOrder = 4 WHERE orderID = '$orderID'";

		$result = $this->db->delete($query);

		if ($result) {
			header('Location:orderdetails.php');
		} else {
			$msg = "<span class='error'>Sản phẩm đã được xóa</span>";
			return $msg;
		}
	}

	public function receivedOrderInUser($orderID)
	{
		$orderID = mysqli_real_escape_string($this->db->link, $orderID);
		$query = "UPDATE tbl_order SET statusOrder = 3 WHERE orderID = '$orderID'";

		$result = $this->db->delete($query);

		if ($result) {
			header('Location:orderdetails.php');
		} else {
			$msg = "<span class='error'>Sản phẩm đã được xóa</span>";
			return $msg;
		}
	}

	public function getCountCart()
	{
		$userID = $this->getUserID();

		$query = "SELECT COUNT(productID) AS countCart FROM tbl_cart WHERE userID = '$userID'";
		$result = $this->db->select($query)->fetch_assoc();
		return $result;
	}


	public function getAmountPrice($customer_id)
	{
		$query = "SELECT price FROM tbl_order WHERE customer_id = '$customer_id' ";
		$get_price = $this->db->select($query);
		return $get_price;
	}
	public function get_cart_ordered($customer_id)
	{
		$query = "SELECT * FROM tbl_order WHERE customer_id = '$customer_id' ";
		$get_cart_ordered = $this->db->select($query);
		return $get_cart_ordered;
	}
	public function get_inbox_cart()
	{
		$query = "SELECT * FROM tbl_order ";
		$get_inbox_cart = $this->db->select($query);
		return $get_inbox_cart;
	}

	public function shifted($id, $proid, $qty, $time, $price)
	{
		$id = mysqli_real_escape_string($this->db->link, $id);
		$proid = mysqli_real_escape_string($this->db->link, $proid);
		$qty = mysqli_real_escape_string($this->db->link, $qty);
		$time = mysqli_real_escape_string($this->db->link, $time);
		$price = mysqli_real_escape_string($this->db->link, $price);

		$query_select = "SELECT * FROM tbl_product WHERE productId='$proid'";
		$get_select = $this->db->select($query_select);

		if ($get_select) {
			while ($result = $get_select->fetch_assoc()) {
				$soluong_new = $result['product_remain'] - $qty;
				$qty_soldout = $result['product_soldout'] + $qty;

				$query_soluong = "UPDATE tbl_product SET

					product_remain = '$soluong_new',product_soldout = '$qty_soldout' WHERE productId = '$proid'";
				$result = $this->db->update($query_soluong);
			}
		}

		$query = "UPDATE tbl_order SET

			status = '1'

			WHERE id = '$id' AND date_order = '$time' AND price = '$price' ";


		$result = $this->db->update($query);
		if ($result) {
			$msg = "<span class='success'> Update Order Succesfully</span> ";
			return $msg;
		} else {
			$msg = "<span class='erorr'> Update Order NOT Succesfully</span> ";
			return $msg;
		}
	}
	public function del_shifted($id, $time, $price)
	{
		$id = mysqli_real_escape_string($this->db->link, $id);
		$time = mysqli_real_escape_string($this->db->link, $time);
		$price = mysqli_real_escape_string($this->db->link, $price);
		$query = "DELETE FROM tbl_order 
					  WHERE id = '$id' AND date_order = '$time' AND price = '$price' ";

		$result = $this->db->update($query);
		if ($result) {
			$msg = "<span class='success'> DELETE Order Succesfully</span> ";
			return $msg;
		} else {
			$msg = "<span class='erorr'> DELETE Order NOT Succesfully</span> ";
			return $msg;
		}
	}
	public function shifted_confirm($id, $time, $price)
	{
		$id = mysqli_real_escape_string($this->db->link, $id);
		$time = mysqli_real_escape_string($this->db->link, $time);
		$price = mysqli_real_escape_string($this->db->link, $price);
		$query = "UPDATE tbl_order SET

			status = '2'

			WHERE customer_id = '$id' AND date_order = '$time' AND price = '$price' ";

		$result = $this->db->update($query);
		return $result;
	}
}
?>