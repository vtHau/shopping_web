<?php

use \Firebase\JWT\JWT;

require __DIR__ . './../../vendor/autoload.php';
include_once("./getToken.php");
include_once './../../classes/order.php';

$order = new order();

$json = file_get_contents('php://input');
$info = json_decode($json, true);
$type = $info["type"];

switch ($type) {
	case 'GET_ORDER':
		$userID = $info["userID"];

		$getOrderHistory = $order->getOrderHistory($userID);
		if ($getOrderHistory) {
		  while ($row = $getOrderHistory->fetch_object()) {
		    $result[] = $row;
		  }
		  echo json_encode($result);
		} else {
		  echo 'NOT_FOUND_ORDER_HISTORY';
		}
		break;

	case "INSERT_ORDER" :
		$userID = $info["userID"];

		$insertOrder = $order->insertOrderUser($userID);
		if($insertOrder) {
			echo "INSERT_ORDER_SUCCESS";
		} else {
			echo "INSERT_ORDER_FAIL";
		}

		break;
	
	default:
		# code...
		break;
}


