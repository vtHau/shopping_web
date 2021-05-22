
<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");

use \Firebase\JWT\JWT;

require __DIR__ . './../../../vendor/autoload.php';
include_once("./../getToken.php");
include_once './../../../classes/login.php';
$admin = new adminLogin();
$key = "TrungHau";
$json = file_get_contents('php://input');
$signin = json_decode($json, true);
$email = $signin['email'];
$password = md5($signin['password']);

$signinAdmin = $admin->signinRequest($email, $password);
if ($signinAdmin) {
  $JWT = getToken($email);
  $info = $signinAdmin->fetch_object();
  $result = ["token" => $JWT, "adminInfo" => $info];
  echo json_encode($result);
} else {
  echo "SINGIN_FAIL";
}
