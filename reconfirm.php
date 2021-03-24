<?php include_once "inc/header.php"; ?>

<?php
if (!isset($_SESSION["userCode"])) {
  header("Location: index.php");
}
?>
</div>

<div class="breadcrumb-area mt-30">
  <div class="container">
    <div class="breadcrumb">
      <ul class="d-flex align-items-center">
        <li><a href="index.php">Trang chủ</a></li>
        <li class="active"><a href="reconfirm.php">Kiểm tra Email</a></li>
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
            <p>Chúng tôi đã gửi lại Email xác nhận vào Email bạn đã đăng ký, vui lòng kiểm tra lại để kích hoạt tài khoản.</p>
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