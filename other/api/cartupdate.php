<?php

use \Firebase\JWT\JWT;

require __DIR__ . './../../vendor/autoload.php';
include_once("./getToken.php");
include_once './../../classes/cart.php';
$cart = new cart();
$json = file_get_contents('php://input');
$update = json_decode($json, true);
$type =  $update["type"];
$cartID =  $update["cartID"];

switch ($type) {
  case 'UPDATE_QUANTITY':
    $productQuantity =  $update["quantity"];
    $updateCart = $cart->updateCartQuantity($cartID, $productQuantity);
    if ($updateCart) {
      echo "UPDATE_CART_SUCCESS";
    } else {
      echo "UPDATE_CART_FAIL";
    }
    break;

  case "DELETE_CART":
    $deleteCart = $cart->deleteCartByID($cartID);
    if ($deleteCart) {
      echo "DELETE_CART_SUCCESS";
    } else {
      echo "DELETE_CART_FAIL";
    }
    break;
  default:
    # code...
    break;
}

// $updateInfo = $user->updateInfoUser($userInfo);
// if ($updateInfo) {
//   echo "UPDATE_INFO_SUCCESS";
// } else {
//   echo "UPDATE_INFO_FAIL";
// }
