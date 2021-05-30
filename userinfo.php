<?php include_once "inc/header.php"; ?>
<?php
Session::checkUserLogin();
?>
<?php
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["updateUser"])) {
  $updateUser = $cus->updateUser($_POST, $_FILES);
}
?>

<div class="breadcrumb-area mt-30">
  <div class="container">
    <div class="breadcrumb">
      <ul class="d-flex align-items-center">
        <li><a href="index.php">Trang chủ</a></li>
        <li class="active"><a href="userinfo.php">Thông tin tài khoản</a></li>
      </ul>
    </div>
  </div>
</div>

<div class="register-account ptb-50 ptb-sm-60">
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <div class="register-title">
          <h3 class="mb-10 text-center title-name  title-search">Thông tin tài khoản</h3>
        </div>
      </div>
    </div>
    <!-- Row End -->
    <div class="row">
      <div class="col-sm-12">
        <form class="form-register" action="" method="POST" enctype="multipart/form-data">
          <?php
          $getInfo = $cus->getInfoUser();
          if ($getInfo) {
            while ($result = $getInfo->fetch_assoc()) {
          ?>
              <fieldset>
                <legend>Chi tiết thông tin cá nhân</legend>
                <div class="form-group d-md-flex align-items-md-center">
                  <label class="control-label col-md-2" for="f-name"><span class="require">*</span>Họ tên</label>
                  <div class="col-md-10">
                    <input type="text" class="form-control" name="userFullName" placeholder="Vui lòng nhập họ tên" value="<?= $result["userFullName"] ?>" required minlength="2">
                  </div>
                </div>
                <div class="form-group d-md-flex align-items-md-center">
                  <label class="control-label col-md-2" for="email"><span class="require">*</span>Email</label>
                  <div class="col-md-10">
                    <input type="email" class="form-control" name="userEmail" placeholder="Vui lòng nhập địa chỉ email" disabled="disabled" value="<?= $result["userEmail"] ?>" required>
                  </div>
                </div>
                <div class="form-group d-md-flex align-items-md-center">
                  <label class="control-label col-md-2" for="number"><span class="require"></span>Điện thoại</label>
                  <div class="col-md-10">
                    <input type="number" class="form-control" name="userPhone" placeholder="Vui lòng nhập số điện thoại" value="<?= $result["userPhone"] ?>">
                  </div>
                </div>
                <div class="form-group d-md-flex align-items-md-center">
                  <label class="control-label col-md-2" for="number"><span class="require"></span>Trạng thái</label>
                  <div class="col-md-10">
                    <input type="text" class="form-control" name="userStatus" placeholder="Vui lòng nhập trạng thái của bạn" value="<?= $result["userStatus"] ?>">
                  </div>
                </div>
              </fieldset>

              <fieldset class="newsletter-input">
                <legend>Hình ảnh</legend>
                <div class="form-group d-md-flex align-items-md-center">
                  <label class="control-label col-md-2" for="number"><span class="require"></span>Ảnh đại diện</label>
                  <div class="col-md-10">
                    <input type="file" class="form-control" name="userImage" id="validatedCustomFile" accept=".PNG, .JPEG, .JPG">
                  </div>
                </div>
              </fieldset>
              <p class="text-center mtb-10">Ảnh đại diện hiện tại, không cần chọn hình ảnh nếu muốn giữ nguyên ảnh đại diện cũ</p>
              <img class="rounded-circle border-circle" src="admin/uploads/avatars/<?php echo $result["userImage"] ?>" alt="">
              <div class="terms">
                <div class="float-md-right">
                  <input type="submit" name="updateUser" value="Cập nhập" class="return-customer-btn">
                </div>
              </div>
              <?php
              if (isset($updateUser)) {
                echo $updateUser;
              }
              ?>
        </form>
    <?php
            }
          }
    ?>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
  document.title = "Cập nhập thông tin tài khoản";
</script>
<?php include_once "inc/footer.php"; ?>