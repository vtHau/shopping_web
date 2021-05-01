<?php
$filepath = realpath(dirname(__FILE__));
include_once($filepath . '/../lib/database.php');
include_once($filepath . '/../helpers/format.php');
?>

<?php

class cart
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

	public function getCart()
	{
		$userID = session_id();
		if (Session::isUserLogin()) {
			$userID = Session::get("userID");
		}

		$query = "SELECT * FROM tbl_cart WHERE userID = '$userID'";
		$result = $this->db->select($query);
		return $result;
	}

	public function getCartByID($userID)
	{
		$query =
			"SELECT tbl_product.*, tbl_cart.* ,  tbl_category.catName, tbl_brand.brandName 
			 FROM tbl_product INNER JOIN tbl_category ON tbl_product.productCategory = tbl_category.catID
			 INNER JOIN tbl_brand ON tbl_product.productBrand = tbl_brand.brandID INNER JOIN tbl_cart ON  tbl_cart.productID = tbl_product.productID  
			   WHERE tbl_cart.userID = '$userID'";
		$result = $this->db->select($query);
		return $result;
	}

	public function getCountCart()
	{
		$userID = $this->getUserID();

		$query = "SELECT COUNT(productID) AS countCart FROM tbl_cart WHERE userID = '$userID'";
		$result = $this->db->select($query)->fetch_assoc();
		return $result;
	}

	public function insertCart($productID, $productQuantity)
	{
		$productQuantity = $this->fm->validation($productQuantity);
		$productQuantity = mysqli_real_escape_string($this->db->link, $productQuantity);
		$productID = mysqli_real_escape_string($this->db->link, $productID);

		$query = "SELECT * FROM tbl_product WHERE productID = '$productID' ";
		$result = $this->db->select($query)->fetch_assoc();

		$productName = $result['productName'];
		$productPrice = $result['productPrice'];
		$productImage = $result['productImage'];

		$userID = session_id();
		if (Session::isUserLogin()) {
			$userID = Session::get("userID");
		}

		$queryInsert = "INSERT INTO tbl_cart(userID, productID, productName, productPrice, productQuantity, productImage) VALUES('$userID', '$productID', '$productName','$productPrice','$productQuantity','$productImage' ) ";
		$resultInsert = $this->db->insert($queryInsert);

		if ($resultInsert) {
			header('Location:cart.php');
		} else {
			$msg = "them that bai";
			return $msg;
		}


		// if ($result['product_remain'] > $quantity) {

		// 	$query_insert = "INSERT INTO tbl_cart(productId,productName,quantity,sId,price,image) VALUES('$id','$productName','$quantity','$sId','$price','$image' ) ";
		// 	$insert_cart = $this->db->insert($query_insert);
		// 	if ($result) {
		// 		header('Location:cart.php');
		// 	} else {
		// 		header('Location:404.php');
		// 	}
		// } else {
		// 	$msg = "<span class='erorr'> Số lượng " . $quantity . " bạn đặt quá số lượng chúng tôi chỉ còn " . $result['product_remain'] . " cái</span> ";
		// 	return $msg;
		// }
	}

	public function updateCartQuantity($cartID, $productQuantity)
	{
		$cartID = mysqli_real_escape_string($this->db->link, $cartID);
		$productQuantity = mysqli_real_escape_string($this->db->link, $productQuantity);

		$query = "UPDATE tbl_cart SET productQuantity = '$productQuantity' WHERE cartID = '$cartID'";
		$result = $this->db->update($query);

		if ($result) {
			return true;
		} else {
			return false;
		}
	}


	public function updateQuantityCart($cartID, $productQuantity)
	{
		$cartID = mysqli_real_escape_string($this->db->link, $cartID);
		$productQuantity = mysqli_real_escape_string($this->db->link, $productQuantity);

		$query = "UPDATE tbl_cart SET productQuantity = '$productQuantity' WHERE cartID = '$cartID'";
		$result = $this->db->update($query);

		if ($result) {
			header("Location: cart.php");
		} else {
			$msg = "<span class='erorr'>  bạn đặt quá số lượng chúng tôi chỉ còn  </span> ";
			return $msg;
		}

		// $query_product = "SELECT * FROM tbl_product WHERE productId = '$proId' ";
		// $result_product = $this->db->select($query_product)->fetch_assoc();

		// if ($quantity < $result_product['product_remain']) {
		// 	$query = "UPDATE tbl_cart SET

		// 		quantity = '$quantity'

		// 		WHERE cartId = '$cartId'";

		// 	$result = $this->db->update($query);
		// 	if ($result) {
		// 		header('Location:cart.php');
		// 	} else {
		// 		$msg = "<span class='erorr'> Product Quantity Update NOT Succesfully</span> ";
		// 		return $msg;
		// 	}
		// } else {
		// 	$msg = "<span class='erorr'> Số lượng " . $quantity . " bạn đặt quá số lượng chúng tôi chỉ còn " . $result_product['product_remain'] . " cái</span> ";
		// 	return $msg;
		// }
	}

	public function deleteCartByID($cartID)
	{
		$cartID = mysqli_real_escape_string($this->db->link, $cartID);
		$query = "DELETE FROM tbl_cart WHERE cartID = '$cartID'";
		$result = $this->db->delete($query);
		if ($result) {
			return true;
		} else {
			return false;
		}
	}

	public function deleteCart($cartID)
	{
		$cartID = mysqli_real_escape_string($this->db->link, $cartID);
		$query = "DELETE FROM tbl_cart WHERE cartID = '$cartID'";
		$result = $this->db->delete($query);
		if ($result) {
			header('Location:cart.php');
		} else {
			$msg = "<span class='error'>Sản phẩm đã được xóa</span>";
			return $msg;
		}
	}

	public function deleteAllCart()
	{
		$userID = session_id();
		if (Session::isUserLogin()) {
			$userID = Session::get("userID");
		}

		$query = "DELETE FROM tbl_cart WHERE userID = '$userID'";
		$result = $this->db->delete($query);

		if ($result) {
			header('Location: orderdetails.php');
		} else {
			$msg = "<span class='error'>Sản phẩm đã được xóa</span>";
			return $msg;
		}
	}

	public function check_cart()
	{
		$sId = session_id();
		$query = "SELECT * FROM tbl_cart WHERE sId = '$sId' ";
		$result = $this->db->select($query);
		return $result;
	}
	public function check_order($customer_id)
	{
		$sId = session_id();
		$query = "SELECT * FROM tbl_order WHERE customer_id = '$customer_id' ";
		$result = $this->db->select($query);
		return $result;
	}
	public function del_all_data_cart()
	{
		$sId = session_id();
		$query = "DELETE FROM tbl_cart WHERE sId = '$sId' ";
		$result = $this->db->select($query);
		return $result;
	}
	public function del_compare($customer_id)
	{
		$sId = session_id();
		$query = "DELETE FROM tbl_compare WHERE customer_id = '$customer_id'";
		$result = $this->db->delete($query);
		return $result;
	}
	public function insertOrder($customer_id)
	{
		$sId = session_id();
		$query = "SELECT * FROM tbl_cart WHERE sId = '$sId'";
		$get_product = $this->db->select($query);
		if ($get_product) {
			while ($result = $get_product->fetch_assoc()) {
				$productid = $result['productId'];
				$productName = $result['productName'];
				$quantity = $result['quantity'];
				$price = $result['price'] * $quantity;
				$image = $result['image'];
				$customer_id = $customer_id;
				$query_order = "INSERT INTO tbl_order(productId,productName,quantity,price,image,customer_id) VALUES('$productid','$productName','$quantity','$price','$image','$customer_id')";
				$insert_order = $this->db->insert($query_order);
			}
		}
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