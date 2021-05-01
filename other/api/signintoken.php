<?php

use \Firebase\JWT\JWT;

require __DIR__ . './../../vendor/autoload.php';
include_once("./getToken.php");
include_once './../../classes/user.php';

$user = new user();

$json = file_get_contents('php://input');
$info = json_decode($json, true);
$userID = $info["userID"];

$key = "TrungHau";
try {
  $decoded = JWT::decode($token, $key, array('HS256'));
  if ($decoded->expire < time()) {
    echo 'TOKEN_INVALID';
  } else {
    $email = $decoded->email;

    $getUserInfo = $user->getUserInfo($email);
    if ($getUserInfo) {
      $jwt = getToken($decoded->email);
      $info = $getUserInfo->fetch_object();
      $result = ["token" => $jwt, "userInfo" => $info];
      echo json_encode($result);
    } else {
      echo 'TOKEN_INVALID';
    }
  }
} catch (Exception $e) {
  echo 'TOKEN_INVALID';
}
