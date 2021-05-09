<?php include_once "inc/header.php"; ?>
</div>
<div class="breadcrumb-area mt-30">
  <div class="container">
    <div class="breadcrumb">
      <ul class="d-flex align-items-center">
        <li><a href="index.php">Trang chủ</a></li>
        <li class="active"><a href="contact.php">Liên hệ</a></li>
      </ul>
    </div>
  </div>
  <!-- Container End -->
</div>
<!-- Breadcrumb End -->
<!-- Contact Email Area Start -->
<div class="contact-area ptb-60 ptb-sm-60">
  <div class="container">
    <div id="map"></div>
  </div>
</div>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBnNugn1lBVUCA1UTt6lz-PbrMXIy2mYTw&callback=initMap&libraries=&v=weekly" async></script>
<script>
  function initMap() {
    const VietNam = {
      lat: 10.761573058608514,
      lng: 106.68217271221745,
    };
    const map = new google.maps.Map(document.getElementById("map"), {
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
<!-- Contact Email Area End -->
<?php include_once "inc/footer.php"; ?>