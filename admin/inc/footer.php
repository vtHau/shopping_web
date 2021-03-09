<div class="app-wrapper-footer">
  <div class="app-footer">
    <div class="app-footer__inner">
      <div class="app-footer-left">
        <ul class="nav">
          <li class="nav-item">
            <a href="javascript:void(0);" class="nav-link">
              Footer Link 1
            </a>
          </li>
          <li class="nav-item">
            <a href="javascript:void(0);" class="nav-link">
              Footer Link 2
            </a>
          </li>
        </ul>
      </div>
      <div class="app-footer-right">
        <ul class="nav">
          <li class="nav-item">
            <a href="javascript:void(0);" class="nav-link">
              Footer Link 3
            </a>
          </li>
          <li class="nav-item">
            <a href="javascript:void(0);" class="nav-link">
              <div class="badge badge-success mr-1 ml-0">
                <small>NEW</small>
              </div>
              Footer Link 4
            </a>
          </li>
        </ul>
      </div>
    </div>
  </div>
</div>
</div>
</body>

</html>

<script src="http://maps.google.com/maps/api/js?sensor=true"></script>
<script type="text/javascript" src="./assets/scripts/main.js"></script>
<script src="..\assets\js\vendor\jquery-3.2.1.min.js"></script>
<script src="..\assets\js\toastr.min.js"></script>

<script>
  toastr.options = {
    closeButton: true,
    debug: false,
    newestOnTop: false,
    progressBar: true,
    positionClass: "toast-top-right",
    preventDuplicates: true,
    onclick: null,
    showDuration: "300",
    hideDuration: "1000",
    timeOut: "3000",
    extendedTimeOut: "1000",
    showEasing: "swing",
    hideEasing: "linear",
    showMethod: "fadeIn",
    hideMethod: "fadeOut",
  }
</script>

<script>
  $(".card-device-title.block-user").click(function() {
    sendFeatureAjax("blockUser");
  });

  $(".card-device-title.unblock-user").click(function() {
    sendFeatureAjax("unBlockUser");
  });

  function sendFeatureAjax(type) {
    var userID = $(".user-id").val();

    $.ajax({
      url: 'morefeature.php',
      method: "POST",
      data: {
        type: type,
        userID: userID,
      },
      success: function(res) {
        location.reload();
      },
      error: function(rep) {
        alert("Thất bại");
      },
    });
  }
</script>

<?php
$toast->showToastify("blockUserSuccess", "Thành công", "Khóa tài khoản thành công");
$toast->showToastify("unBlockUserSuccess", "Thành công", "Mở khóa tài khoản thành công");
?>

<?php
ob_end_flush();
?>