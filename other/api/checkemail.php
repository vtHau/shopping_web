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

if ($emailExist) {
  echo "EMAIL_EXIST";
} else {
  echo "EMAIL_NOT_EXIST";
}
