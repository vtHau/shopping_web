$(window).scroll(function () {
  if ($(this).scrollTop() > 300) {
    $(".hide-cart-info").addClass("show-cart-info");
  } else {
    $(".hide-cart-info").removeClass("show-cart-info");
  }
});

(function ($) {
  "use Strict";
  $(".btn-signin-show").on("click", function () {
    $(".wrap-signin-form").css({
      visibility: "visible",
    });
    document.body.style.overflow = "hidden"; // ADD THIS LINE
  });

  $(".btn-signin-hide").on("click", function () {
    $(".wrap-signin-form").css({
      visibility: "hidden",
    });
    document.body.style.overflow = "auto"; // ADD THIS LINE
  });

  $(".btn-signup-show").on("click", function () {
    $(".wrap-signup-form").css({
      visibility: "visible",
    });
    document.body.style.overflow = "hidden"; // ADD THIS LINE
  });

  $(".btn-signup-hide").on("click", function () {
    $(".wrap-signup-form").css({
      visibility: "hidden",
    });
    document.body.style.overflow = "auto"; // ADD THIS LINE
  });
})(jQuery);

window.addEventListener("load", function () {
  const loginForm = document.querySelector(".login-form");
  const showPasswordIcon =
    loginForm && loginForm.querySelector(".show-password");
  const inputPassword =
    loginForm && loginForm.querySelector('input[type="password"');
  showPasswordIcon.addEventListener("click", function () {
    const inputPasswordType = inputPassword.getAttribute("type");
    inputPasswordType === "password"
      ? inputPassword.setAttribute("type", "text")
      : inputPassword.setAttribute("type", "password");
  });
});
