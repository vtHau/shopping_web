<?php

use \Firebase\JWT\JWT;

require __DIR__ . './../../vendor/autoload.php';
include_once("./getToken.php");
include_once './../../classes/user.php';

$user = new user();

$json = file_get_contents('php://input');
$userInfo = json_decode($json, true);

$updatePassword = $user->updatePassword($userInfo);
if ($updatePassword) {
  echo "UPDATE_PASSWORD_SUCCESS";
} else {
  echo "UPDATE_PASSWORD_FAIL";
}
