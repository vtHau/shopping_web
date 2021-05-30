<?php include_once "inc/header.php"; ?>

<div class="breadcrumb-area mt-30">
  <div class="container">
    <div class="breadcrumb">
      <ul class="d-flex align-items-center">
        <li><a href="index.php">Trang chủ</a></li>
        <li class="active"><a href="weather.php">Thời tiết</a></li>
      </ul>
    </div>
  </div>
</div>
<div class="error404-area ptb-60 ptb-sm-60">
  <div class="container">
    <div class="row weather">
      <h2 class="title-weather">Thời tiết</h2>
      <p class="weather-city"></p>
      <div class="weather-content">
        <div class="box-temp">
          <img class="img-temp" src="./assets/img/weather/thermometer.png" alt="">
          <p class="text-temp">00</p>
        </div>
        <div class="box-weather-common">
          <div class="row-weather">
            <div class="col-weather">
              <img class="img-temp" src="./assets/img/weather/humidity.png" alt="">
              <p class="weather-info-text humidity">dsdsds</p>
            </div>
            <View class="col-weather mal">
              <img class="img-temp" src="./assets/img/weather/wind.png" alt="">
              <p class="weather-info-text speed">dsdsds</p>
            </View>
          </div>
          <div class="row-weather">
            <div class="col-weather">
              <img class="img-temp" src="./assets/img/weather/sunrise.png" alt="">
              <p class="weather-info-text sunrise">dsdsds</p>
            </div>
            <View class="col-weather mal">
              <img class="img-temp" src="./assets/img/weather/sunset.png" alt="">
              <p class="weather-info-text sunset">dsdsds</p>
            </View>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
  document.title = "Thời tiết";
</script>
<?php include_once "inc/footer.php"; ?>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script src="https://momentjs.com/downloads/moment.min.js"></script>
<script>
  axios.get('https://api.openweathermap.org/data/2.5/weather?q=Saigon,Vietnam&units=metric&appid=09522e7c1b90d4c879371c025ae95996')
    .then(function(response) {
      const {
        main,
        wind,
        sys,
        name,
        dt
      } = response.data;
      console.log(response.data);
      $(".weather-city").html(name + "    " + moment(
        dt * 1000,
      ).format('DD/MM/YYYY'));
      $(".text-temp").html(main.temp + " °C");
      $(".humidity").html(main.humidity + " %");
      $(".speed").html(wind.speed + "  m/s");
      $(".sunrise").html(moment(
        sys.sunrise * 1000,
      ).format('hh:mm A'));
      $(".sunset").html(moment(
        sys.sunset * 1000,
      ).format('hh:mm A'));
    })
    .catch(function(error) {
      console.log(error);
    });
</script>