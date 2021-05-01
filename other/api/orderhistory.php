<?php

use \Firebase\JWT\JWT;

require __DIR__ . './../../vendor/autoload.php';
include_once("./getToken.php");
include_once './../../classes/order.php';

$order = new order();

$json = file_get_contents('php://input');
$info = json_decode($json, true);
$userID = $info["userID"];

$getOrderHistory = $order->getOrderHistory($userID);
if ($getOrderHistory) {
  $orderHistory = $getOrderHistory->fetch_object();
  $result = ["orderHistory" => $orderHistory];
  echo json_encode($result);
} else {
  echo 'NOT_FOUND_ORDER_HISTORY';
}
