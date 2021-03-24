<?php
include_once "inc/header.php";

if ($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET["code"]) && $_GET["code"] == $_SESSION["userCode"]) {
  $confirm = false;

  if (isset($_SESSION["username"]) && isset($_SESSION["userCode"])) {
    $confirm = true;
    $userCodeGET = $_GET["code"];
    $userCodeSES =  $_SESSION["userCode"];

    if (($userCodeGET == $userCodeSES) && $confirm) {
      $username = $_SESSION["username"];
      $cus->activeUser($username);
    } else {
      $confirm = false;
    }
  }
} else {
  header("Location: index.php");
}
?>


</div>

<div class="breadcrumb-area mt-30">
  <div class="container">
    <div class="breadcrumb">
      <ul class="d-flex align-items-center">
        <li><a href="index.php">Trang chủ</a></li>
        <li class="active"><a href="confirmemail.php">Kích hoạt tài khoản</a></li>
      </ul>
    </div>
  </div>
  <!-- Container End -->
</div>
<!-- Breadcrumb End -->
<!-- Error 404 Area Start -->
<div class="error404-area ptb-60 ptb-sm-60">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="error-wrapper text-center">
          <div class="error-text">
            <p><?php
                if ($confirm) {
                  echo "Đang kích hoạt tài khoản, vui lòng chờ vài giây...";
                } else {
                  echo "Liên kết xác nhận đã hết hạn hoặc bị hỏng, vui lòng đăng nhập lại để gửi lại mã xác nhận.";
                }
                ?></p>
          </div>
          <div class="search-error">
            <form id="search-form" action="#">
              <input type="text" placeholder="Tìm kiếm">
              <button><i class="fa fa-search"></i></button>
            </form>
          </div>
          <div class="error-button">
            <a href="index.php">Về trang chủ</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Error 404 Area End -->
<?php include_once "inc/footer.php"; ?>

<?php
$getChat = $chat->getChat();
if ($getChat) {
  while ($result = $getChat->fetch_assoc()) {
    $isUser = false;
    if ($result["fromID"] == Session::get("userID")) {
      $isUser = true;
    }
?>
    <div class="box-mess <?php if ($isUser) echo "to-right"; ?>">
      <div class="box-image">
        <img src="avatar.png" alt="">
      </div>
      <div class="mess-content">
        <p><?php echo $result["message"] ?></p>
      </div>
    </div>
<?php
  }
}
?>