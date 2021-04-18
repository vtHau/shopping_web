<?php

use \Firebase\JWT\JWT;

require __DIR__ . './../../vendor/autoload.php';

function getToken($email, $key = 'TrungHau')
{
  $token = [
    "email" => $email,
    "iat" => time(),
    "expire" => time() + 86400 * 2 //2 days
  ];

  return $jwt = JWT::encode($token, $key);
}
