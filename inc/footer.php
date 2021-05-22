  </div>

  <div class="footer">
    <div class="content-left">
      <a href="index.php"><img src="assets\img\logo\kkk.png" alt="logo-image" style="width: 120px;"></a>
    </div>
    <div class="content-center">
      <div class="info-left">
        <h6 class="title-info">Giới thiệu</h6>
        <p class="footer-info-item"><i class="fas fa-map-marked-alt"></i> Địa chỉ: 280 An Dương Vương, Quận 5, TP Hồ Chí Minh</p>
        <p class="footer-info-item"><i class="fas fa-mobile-alt"></i> Số điện thoại: 123.456.7898</p>

      </div>
      <div class="info-right">
        <h6 class="title-info">Giới thiệu</h6>
        <p class="footer-info-item"><i class="fas fa-envelope"></i> Email: daihocsupham@hcmue.edu.vn</p>
        <p class="footer-info-item"><i class="fab fa-facebook-f"></i> Facebook: fb.com/daihocsupham.hcmue</p>
      </div>

    </div>
    <div class="content-right">
      <div class="fb-page" data-href="https://www.facebook.com/MW-Store-100730118877099/" data-width="340" data-height="140" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="false">
        <blockquote cite="https://www.facebook.com/MW-Store-100730118877099/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/MW-Store-100730118877099/">MW Store</a></blockquote>
      </div>
    </div>
  </div>
  <p class="title-end">MW Store website thương mại điện tử</p>
  <?php
  if (Session::isUserLogin()) {
  ?>
    <div id="btn-chat">
      <i class="far fa-envelope"></i>
    </div>
  <?php } ?>
  <div id="popup-chat">
    <div class="box-chat">
      <div class="header-chat">
        <div class="header-chat-avatar">
          <img src="assets/img/avatars/admin.png" alt="">
        </div>
        <div class="header-chat-info">
          <p class="name">Quản trị viên <i class="fa fa-angle-down"></i></p>
          <p class="status">Chăm sóc khách hàng</p>
        </div>
        <div class="header-chat-feature">
          <svg role="presentation" height="50px" width="50px" viewBox="-5 -5 30 30">
            <path d="M19.492 4.112a.972.972 0 00-1.01.063l-3.052 2.12a.998.998 0 00-.43.822v5.766a1 1 0 00.43.823l3.051 2.12a.978.978 0 001.011.063.936.936 0 00.508-.829V4.94a.936.936 0 00-.508-.828zM10.996 18A3.008 3.008 0 0014 14.996V5.004A3.008 3.008 0 0010.996 2H3.004A3.008 3.008 0 000 5.004v9.992A3.008 3.008 0 003.004 18h7.992z" fill="#bec2c9"></path>
          </svg>
          <svg role="presentation" height="26px" width="26px" viewBox="-5 -5 30 30">
            <path d="M10.952 14.044c.074.044.147.086.22.125a.842.842 0 001.161-.367c.096-.195.167-.185.337-.42.204-.283.552-.689.91-.772.341-.078.686-.105.92-.11.435-.01 1.118.174 1.926.648a15.9 15.9 0 011.713 1.147c.224.175.37.43.393.711.042.494-.034 1.318-.754 2.137-1.135 1.291-2.859 1.772-4.942 1.088a17.47 17.47 0 01-6.855-4.212 17.485 17.485 0 01-4.213-6.855c-.683-2.083-.202-3.808 1.09-4.942.818-.72 1.642-.796 2.136-.754.282.023.536.17.711.392.25.32.663.89 1.146 1.714.475.808.681 1.491.65 1.926-.024.31-.026.647-.112.921-.11.35-.488.705-.77.91-.236.17-.226.24-.42.336a.841.841 0 00-.368 1.161c.04.072.081.146.125.22a14.012 14.012 0 004.996 4.996z" fill="#bec2c9"></path>
            <path d="M10.952 14.044c.074.044.147.086.22.125a.842.842 0 001.161-.367c.096-.195.167-.185.337-.42.204-.283.552-.689.91-.772.341-.078.686-.105.92-.11.435-.01 1.118.174 1.926.648.824.484 1.394.898 1.713 1.147.224.175.37.43.393.711.042.494-.034 1.318-.754 2.137-1.135 1.291-2.859 1.772-4.942 1.088a17.47 17.47 0 01-6.855-4.212 17.485 17.485 0 01-4.213-6.855c-.683-2.083-.202-3.808 1.09-4.942.818-.72 1.642-.796 2.136-.754.282.023.536.17.711.392.25.32.663.89 1.146 1.714.475.808.681 1.491.65 1.926-.024.31-.026.647-.112.921-.11.35-.488.705-.77.91-.236.17-.226.24-.42.336a.841.841 0 00-.368 1.161c.04.072.081.146.125.22a14.012 14.012 0 004.996 4.996z" fill="none" stroke="#bec2c9"></path>
          </svg>

          <svg height="26px" id="btn-close-chat" width="26px" viewBox="-4 -4 24 24">
            <line stroke="#bec2c9" stroke-linecap="round" stroke-width="2" x1="2" x2="14" y1="2" y2="14"></line>
            <line stroke="#bec2c9" stroke-linecap="round" stroke-width="2" x1="2" x2="14" y1="14" y2="2"></line>
          </svg>
        </div>
      </div>

      <div class="body-chat">
      </div>

      <div class="footer-chat">
        <div class="footer-chat-more">
          <svg class="a8c37x1j ms05siws hr662l2t b7h9ocf4 crt8y2ji tftn3vyl" height="20px" width="20px" viewBox="0 0 24 24">
            <g fill-rule="evenodd">
              <polygon fill="none" points="-6,30 30,30 30,-6 -6,-6 "></polygon>
              <path d="m18,11l-5,0l0,-5c0,-0.552 -0.448,-1 -1,-1c-0.5525,0 -1,0.448 -1,1l0,5l-5,0c-0.5525,0 -1,0.448 -1,1c0,0.552 0.4475,1 1,1l5,0l0,5c0,0.552 0.4475,1 1,1c0.552,0 1,-0.448 1,-1l0,-5l5,0c0.552,0 1,-0.448 1,-1c0,-0.552 -0.448,-1 -1,-1m-6,13c-6.6275,0 -12,-5.3725 -12,-12c0,-6.6275 5.3725,-12 12,-12c6.627,0 12,5.3725 12,12c0,6.6275 -5.373,12 -12,12"></path>
            </g>
          </svg>
        </div>
        <div class="footer-chat-message">
          <input type="text" name="" class="message-content" id="" value="" placeholder="Nhập tin nhắn..."></input>
        </div>
        <div class="footer-chat-send" data-userID="<?php echo Session::get("userID") ?>">
          <svg class="crt8y2ji" height="20px" width="20px" viewBox="0 0 24 24">
            <path d="M16.6915026,12.4744748 L3.50612381,13.2599618 C3.19218622,13.2599618 3.03521743,13.4170592 3.03521743,13.5741566 L1.15159189,20.0151496 C0.8376543,20.8006365 0.99,21.89 1.77946707,22.52 C2.41,22.99 3.50612381,23.1 4.13399899,22.8429026 L21.714504,14.0454487 C22.6563168,13.5741566 23.1272231,12.6315722 22.9702544,11.6889879 C22.8132856,11.0605983 22.3423792,10.4322088 21.714504,10.118014 L4.13399899,1.16346272 C3.34915502,0.9 2.40734225,1.00636533 1.77946707,1.4776575 C0.994623095,2.10604706 0.8376543,3.0486314 1.15159189,3.99121575 L3.03521743,10.4322088 C3.03521743,10.5893061 3.34915502,10.7464035 3.50612381,10.7464035 L16.6915026,11.5318905 C16.6915026,11.5318905 17.1624089,11.5318905 17.1624089,12.0031827 C17.1624089,12.4744748 16.6915026,12.4744748 16.6915026,12.4744748 Z" fill-rule="evenodd" stroke="none"></path>
          </svg>
        </div>
      </div>
    </div>
  </div>
  <!-- Main Wrapper End Here -->
  <!-- Messenger Plugin chat Code -->
  <div id="fb-root"></div>
  <script>
    window.fbAsyncInit = function() {
      FB.init({
        xfbml: true,
        version: 'v10.0'
      });
    };

    (function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s);
      js.id = id;
      js.src = 'https://connect.facebook.net/vi_VN/sdk/xfbml.customerchat.js';
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
  </script>

  <!-- Your Plugin chat code -->
  <div class="fb-customerchat" attribution="biz_inbox" page_id="100730118877099">
  </div>
  </body>
  <script src="assets\js\vendor\modernizr-3.5.0.min.js"></script>

  <!-- jquery 3.2.1 -->
  <script src="assets\js\vendor\jquery-3.2.1.min.js"></script>
  <!-- Countdown js -->
  <script src="assets\js\jquery.countdown.min.js"></script>
  <!-- Mobile menu js -->
  <script src="assets\js\jquery.meanmenu.min.js"></script>
  <!-- ScrollUp js -->
  <script src="assets\js\jquery.scrollUp.js"></script>
  <!-- Nivo slider js -->
  <script src="assets\js\jquery.nivo.slider.js"></script>
  <!-- Fancybox js -->
  <script src="assets\js\jquery.fancybox.min.js"></script>
  <!-- Jquery nice select js -->
  <script src="assets\js\jquery.nice-select.min.js"></script>
  <!-- Jquery ui price slider js -->
  <script src="assets\js\jquery-ui.min.js"></script>
  <!-- Owl carousel -->
  <script src="assets\js\owl.carousel.min.js"></script>
  <!-- Bootstrap popper js -->
  <script src="assets\js\popper.min.js"></script>
  <!-- Bootstrap js -->
  <script src="assets\js\bootstrap.min.js"></script>
  <!-- Plugin js -->
  <script src="assets\js\plugins.js"></script>
  <!-- Main activaion js -->
  <!-- <script src='https://cdnjs.cloudflare.com/ajax/libs/elevatezoom/3.0.8/jquery.elevatezoom.min.js' /> -->
  <script src="assets\js\main.js?v=<?php echo time(); ?>"></script>
  <script src="assets\js\toastr.min.js"></script>
  <script src="assets\js\validate.js?v=<?php echo time(); ?>"></script>

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

  <script src="assets\js\zoom.js?v=<?php echo time(); ?>"></script>
  <script async='async' src='https://cdnjs.cloudflare.com/ajax/libs/elevatezoom/3.0.8/jquery.elevatezoom.min.js'></script>
  <script src="assets\js\custom-script.js?v=<?php echo time(); ?>"></script>


  <script>
    var isBlock;

    function updateUserStatus() {
      $.ajax({
        url: 'classes/request.php',
        method: "POST",
        data: {
          type: "updateStatus"
        },
        success: function() {}
      });
    }

    function sendDevice() {
      $.ajax({
        url: 'classes/request.php',
        method: "POST",
        data: {
          type: "sendDevice"
        },
        success: function() {}
      });
    }

    function isBlockUser() {
      $.ajax({
        url: 'classes/request.php',
        method: "POST",
        data: {
          type: "isBlockUser"
        },
        success: function(result) {
          result = result.trim();
          if (result == "true") {
            isBlock = true;
          }
        }
      });
      if (isBlock) {
        window.location = "userblock.php"
      }
    }
  </script>

  <?php
  if (Session::isUserLogin()) {
    echo '<script>
            setInterval(function() {
              updateUserStatus();
              isBlockUser();
              sendDevice();
            }, 3000);
          </script>';
  }

  $toast->showToastify("thanhcong", "Thành công", "xx");
  $toast->showToastify("loginToast", "Thành công", "Đăng nhập thành công");
  $toast->showToastify("logoutToast", "Thành công", "Đăng xuất thành công");
  $toast->showToastify("insertReview", "Thành công", "Bình luận thành công");
  $toast->showToastify("updateComment", "Thành công", "Cập nhật bình luận thành công");
  $toast->showToastify("deleteReview", "Thành công", "Xóa bình luận thành công");
  ?>

  </html>
  <?php
  $updatevsitor = $visitor->updateVisit();
  ?>
  <?php
  ob_end_flush();
