<?php include_once "inc/header.php"; ?>

<?php
if (!Session::get("userBlock")) {
  header("Location: index.php");
}
?>

<div class="breadcrumb-area mt-30">
  <div class="container">
    <div class="breadcrumb">
      <ul class="d-flex align-items-center">
        <li><a href="index.php">Trang chủ</a></li>
        <li class="active"><a href="userblock.php">Khóa tài khoản</a></li>
      </ul>
    </div>
  </div>
</div>
<div class="error404-area ptb-60 ptb-sm-60">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="error-wrapper text-center">
          <div class="error-text">
            <h3>Tài khoản <b><?php echo Session::get("userFullName") ?></b> đã bị khóa, vui lòng liên hệ quản trị để hỗ trợ</h3>
          </div>
          <div class="error-button">
            <a href="index.php">Về trang chủ</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php include_once "inc/footer.php"; ?>
<script type="text/javascript">
  document.title = "Khóa tài khoản";
</script>