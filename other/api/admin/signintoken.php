
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

$token = $signin["token"];
$key = "TrungHau";
try {
  $decoded = JWT::decode($token, $key, array('HS256'));
  if ($decoded->expire < time()) {
    echo json_encode('TOKEN_INVALID');
  } else {
    $email = $decoded->email;

    $getAdminInfo = $admin->getAdminInfo($email);

    if ($getAdminInfo) {
      $jwt = getToken($decoded->email);
      $info = $getAdminInfo->fetch_object();
      $result = ["token" => $jwt, "adminInfo" => $info];
      echo json_encode($result);
    } else {
      echo json_encode('TOKEN_INVALID');
    }
  }
} catch (Exception $e) {
  echo  json_encode('TOKEN_INVALID');
}
