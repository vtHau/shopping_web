<?php

use \Firebase\JWT\JWT;

require __DIR__ . './../../vendor/autoload.php';

include_once("./getToken.php");

include_once './../../classes/user.php';
$user = new user();

$key = "TrungHau";
$json = file_get_contents('php://input');

$dataLogin = json_decode($json, true);
$email = $dataLogin['email'];
$password = md5($dataLogin['password']);


$checkLogin = $user->loginInMobile($email, $password);
if ($checkLogin) {
  $JWT = getToken($email);
  $info = $checkLogin->fetch_object();

  $result = ["token" => $JWT, "userInfo" => $info];

  echo json_encode($result);
} else {
  echo "LOGIN_FAIL";
}
