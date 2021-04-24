<?php

use \Firebase\JWT\JWT;

require __DIR__ . './../../vendor/autoload.php';
include_once("./getToken.php");
include_once './../../classes/user.php';
$user = new user();

$key = "TrungHau";
$json = file_get_contents('php://input');

$dataSignUp = json_decode($json, true);
$emailExist = $user->emailExist($dataSignUp);

if (!$emailExist) {
  $signUp = $user->insertUserInMobile($dataSignUp);
  if ($signUp) {
    echo "SIGNUP_SUCCESS";
  } else {
    echo "SIGNUP_FAIL";
  }
} else {
  echo "EMAIL_EXIST";
}
