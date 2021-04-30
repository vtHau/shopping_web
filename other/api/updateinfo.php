<?php

use \Firebase\JWT\JWT;

require __DIR__ . './../../vendor/autoload.php';
include_once("./getToken.php");
include_once './../../classes/user.php';

$user = new user();

$json = file_get_contents('php://input');
$userInfo = json_decode($json, true);

$updateInfo = $user->updateInfoUser($userInfo);
if ($updateInfo) {
  echo "UPDATE_INFO_SUCCESS";
} else {
  echo "UPDATE_INFO_FAIL";
}
