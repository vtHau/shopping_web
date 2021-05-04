<?php

use \Firebase\JWT\JWT;

require __DIR__ . './../../vendor/autoload.php';
include_once("./getToken.php");
include_once './../../classes/review.php';
$review = new review();
$json = file_get_contents('php://input');
$product = json_decode($json, true);
$type =  $product["type"];

switch ($type) {
  case "GET_REVIEW":
    $productID = $product["productID"];

    $getReview = $review->getReview($productID);
    if ($getReview) {
      while ($row = $getReview->fetch_object()) {
        $result[] = $row;
      };
      echo json_encode($result);
    } else {
      echo "NOT_FOUND_REVIEW";
    }
    break;

  default:
    # code...
    break;
}
