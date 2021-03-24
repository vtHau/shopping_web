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

  $("#btn-chat-show").click(function() {
    $("#popup-chat").toggle();
    getChatInAdmin();
    setInterval(() => {
      getChatInAdmin();
    }, 1000);
  });

  $("#btn-close-chat").click(function() {
    $("#popup-chat").toggle();
  });


  $(".footer-chat-send").on("click", function() {
    sendChatFormAdmin();
  });

  $(".message-content").keyup(function(e) {
    if (e.keyCode == 13 || e.which == 13) {
      sendChatFormAdmin();
    }
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

  function getChatInAdmin() {
    var userID = parseInt($(".footer-chat-send").data("userid"));
    var userImage = $(".footer-chat-send").data("userimage");

    $.ajax({
      url: '../classes/request.php',
      method: "POST",
      data: {
        type: "getChatInAdmin",
        userID: userID,
        userImage: userImage,
      },
      success: function(res) {
        res = res.trim();
        console.log(res);
        $(".body-chat").html(res);

        var height = 0;

        $(".body-chat .box-mess").each(function(i, value) {
          height += parseInt($(this).height());
        });

        height += "";
        $(".body-chat").animate({
          scrollTop: height + 1
        });
      },
      error: function(rep) {
        alert("Thất bại");
      },
    });
  }

  function sendChatFormAdmin() {
    var message = $(".message-content").val();
    var userID = parseInt($(".footer-chat-send").data("userid"));

    if (message != "") {
      $.ajax({
        url: '../classes/request.php',
        method: "POST",
        data: {
          type: "insertChatInAdmin",
          message: message,
          userID: userID,
        },
        success: function(res) {
          $(".message-content").val("");
          getChatInAdmin();
        },
        error: function(rep) {
          alert("Thất bại");
        },
      });
    }
  }
</script>

<?php
$toast->showToastify("blockUserSuccess", "Thành công", "Khóa tài khoản thành công");
$toast->showToastify("unBlockUserSuccess", "Thành công", "Mở khóa tài khoản thành công");
?>

<?php
ob_end_flush();
?>