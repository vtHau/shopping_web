<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>

  <style>
    .flip-card {
      max-width: 30rem;
      height: 40rem;
      margin: 0px auto;
      /* perspective: 150rem; */
    }

    .flip-card-inner {
      width: 100%;
      height: 100%;
      /* perspective: 1000px; */
      transition: transform 0.6s ease 0s;
      /* position: relative; */
    }

    .flip-card:hover .flip-card-inner {
      transform: rotateY(180deg);
    }

    /* .flip-card .front {
      width: 100%;
      height: 100%;
      position: absolute;
      top: 0px;
      left: 0px;
      backface-visibility: hidden;
    } */

    .flip-card img {
      width: 100%;
      height: 100%;
      object-fit: cover;
    }

    img {
      display: block;
      max-width: 100%;
    }
  </style>
</head>

<body>
  <div class="flip-card">
    <div class="flip-card-inner">
      <div class="front">
        <img src="./admin/assets/images/avatars/11.jpg" alt="" />
      </div>
    </div>
  </div>
</body>

</html>