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

  case "GET_YOUR_REVIEW":
    $productID = $product["productID"];
    $userID = $product["userID"];
    $getUserReview = $review->getReviewByUser($userID, $productID);
    if ($getUserReview) {
      while ($row = $getUserReview->fetch_object()) {
        $result[] = $row;
      };
      echo json_encode($result);
    } else {
      echo "NOT_FOUND_YOUR_REVIEW";
    }

    break;
  case "NEW_YOUR_REVIEW":
    $productID = $product["productID"];
    $userID = $product["userID"];
    $comment = $product["comment"];
    $star = $product["star"];

    $newInsert = $review->newYourReview($userID, $productID, $star, $comment);
    if ($newInsert) {
      echo "NEW_YOUR_REVIEW_SUCCESS";
    } else {
      echo "NEW_YOUR_REVIEW_FAIL";
    }
    break;
  case "UPDATE_YOUR_REVIEW":
    $productID = $product["productID"];
    $userID = $product["userID"];
    $comment = $product["comment"];
    $star = $product["star"];

    $updateReview = $review->updateYourReview($userID, $productID, $star, $comment);
    if ($updateReview) {
      echo "UPDATE_YOUR_REVIEW_SUCCESS";
    } else {
      echo "UPDATE_YOUR_REVIEW_FAIL";
    }
    break;
  case "DELETE_YOUR_REVIEW":
    $productID = $product["productID"];
    $userID = $product["userID"];
    $deleteReview = $review->deleteYourReview($userID, $productID);
    if ($deleteReview) {
      echo 'DELETE_YOUR_REVIEW_SUCCESS';
    } else {
      echo 'DELETE_YOUR_REVIEW_FAIL';
    }
    break;

  default:
    # code...
    break;
}
