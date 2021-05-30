﻿<?php include_once "inc/header.php"; ?>

<div class="breadcrumb-area mt-30">
  <div class="container">
    <div class="breadcrumb">
      <ul class="d-flex align-items-center">
        <li><a href="index.php">Trang chủ</a></li>
        <li class="active"><a href="contact.php">Liên hệ</a></li>
      </ul>
    </div>
  </div>
</div>
<div class="contact-area ptb-60 ptb-sm-60">
  <div class="container">
    <div id="map"></div>
    <h3 class="info-info">Thông tin liên hệ</h3>
    <div class="info-contact">
      <div class="item-contact"><i class="fas fa-map-marked-alt"></i> Địa chỉ: 280 An Dương Vương, Quận 5, TP Hồ Chí Minh</div>
      <div class="item-contact"><i class="fas fa-mobile-alt"></i> Số điện thoại: 123.456.7898</div>
      <div class="item-contact"><i class="fas fa-envelope"></i> Email: daihocsupham@hcmue.edu.vn</div>
      <div class="item-contact"><i class="fab fa-facebook-f"></i> Facebook: fb.com/daihocsupham.hcmue</div>
    </div>
  </div>
</div>

<script type="text/javascript">
  document.title = "Thông tin liên hệ";
</script>
<?php include_once "inc/footer.php"; ?>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAUlOcYeXI66r7zBtBQDoqEs6QO4UElJjU&callback=initMap" async defer></script>

<script>
  window.initMap = function() {
    var VietNam = {
      lat: 10.761573058608514,
      lng: 106.68217271221745,
    };
    var map = new google.maps.Map(document.getElementById("map"), {
      zoom: 18,
      center: VietNam,
    });
    new google.maps.Marker({
      position: VietNam,
      map,
      draggable: true,
      animation: google.maps.Animation.DROP,
      title: "Đại học Sư Phạm Thành Phố Hồ Chí Minh",
    });
  }
</script>