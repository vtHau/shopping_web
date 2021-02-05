$(window).scroll(function () {
  if ($(this).scrollTop() > 300) {
    $(".hide-cart-info").addClass("show-cart-info");
  } else {
    $(".hide-cart-info").removeClass("show-cart-info");
  }
});


