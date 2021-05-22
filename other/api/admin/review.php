<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");

include_once './../../../classes/review.php';
$review = new review();

$json = file_get_contents('php://input');
$info = json_decode($json, true);
$type =  $info["type"];
?>

<?php
switch ($type) {
  case "GET_REVIEW_NOT_CONFIRM":
    $getReview = $review->getReivewNotConfirm();
    if ($getReview) {
      while ($row = $getReview->fetch_object()) {
        $result[] = $row;
      };
      echo json_encode($result);
    } else {
      echo "NOT_FOUND_REVIEW";
    }
    break;

  case "CONFIRM_REVIEW":
    $reviewID = $info["reviewID"];
    $confirmReview = $review->confirmReview($reviewID);

    if ($confirmReview) {
      $getReview = $review->getReivewNotConfirm();
      if ($getReview) {
        while ($row = $getReview->fetch_object()) {
          $result[] = $row;
        };
        echo json_encode($result);
      }
    } else {
      echo "CONFIRM_REVIEW_FAIL";
    }
    break;

  case "DELETE_REVIEW":
    $reviewID = $info["reviewID"];
    $deleteReview = $review->deleteReviewID($reviewID);

    if ($deleteReview) {
      $getReview = $review->getReivewNotConfirm();
      if ($getReview) {
        while ($row = $getReview->fetch_object()) {
          $result[] = $row;
        };
        echo json_encode($result);
      }
    } else {
      echo "DELETE_REVIEW_FAIL";
    }
    break;

  default:
    # code...
    break;
}
?>

