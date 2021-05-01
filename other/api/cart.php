<?php

use \Firebase\JWT\JWT;

require __DIR__ . './../../vendor/autoload.php';
include_once("./getToken.php");
include_once './../../classes/cart.php';

$cart = new cart();

$json = file_get_contents('php://input');
$info = json_decode($json, true);
$userID = $info["userID"];

$getCart = $cart->getCartByID($userID);
if ($getCart) {
  while ($row = $getCart->fetch_object()) {
    $result[] = $row;
  }
  echo json_encode($result);
} else {
  echo 'NOT_FOUND_CART';
}
