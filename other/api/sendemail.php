<?php

use \Firebase\JWT\JWT;

require __DIR__ . './../../vendor/autoload.php';
include_once("./getToken.php");
include_once './../../classes/email.php';
$email = new email();

$key = "TrungHau";
$json = file_get_contents('php://input');

$dataSignUp = json_decode($json, true);
$userEmail = $dataSignUp["email"];
$userCode = $dataSignUp["code"];


$sendCode = $email->sendCode($userEmail, $userCode);

if ($sendCode) {
  echo "SEND_EMAIL_SUCCESS";
} else {
  echo "SEND_EMAIL_FAIL";
}
