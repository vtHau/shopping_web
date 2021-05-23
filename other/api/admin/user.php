<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");

include_once './../../../classes/user.php';
$user = new user();

$json = file_get_contents('php://input');
$info = json_decode($json, true);
$type =  $info["type"];
?>

<?php
switch ($type) {
  case "GET_USER_NOT_CONFIRM":
    $getUser = $user->getUserNotConfirm();
    if ($getUser) {
      while ($row = $getUser->fetch_object()) {
        $result[] = $row;
      };
      echo json_encode($result);
    } else {
      echo json_encode("NOT_FOUND_USER");
    }
    break;

  case "CONFIRM_USER":
    $userID = $info["userID"];
    $activeUserExtension = $user->activeUserExtension($userID);

    if ($activeUserExtension) {
      $getUser = $user->getUserNotConfirm();
      if ($getUser) {
        while ($row = $getUser->fetch_object()) {
          $result[] = $row;
        };
        echo json_encode($result);
      } else {
        echo json_encode("NOT_FOUND_USER");
      }
    } else {
      echo json_encode("CONFIRM_USER_FAIL");
    }
    break;

  case "DELETE_USER":
    $userID = $info["userID"];
    $deleteUser = $user->deleteUserExtension($userID);

    if ($deleteUser) {
      $getUser = $user->getUserNotConfirm();
      if ($getUser) {
        while ($row = $getUser->fetch_object()) {
          $result[] = $row;
        };
        echo json_encode($result);
      } else {
        echo json_encode("NOT_FOUND_USER");
      }
    } else {
      echo json_encode("DELETE_USER_FAIL");
    }
    break;

  default:
    break;
}
?>

