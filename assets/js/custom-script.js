$(window).scroll(function () {
  if ($(this).scrollTop() > 300) {
    $(".hide-cart-info").addClass("show-cart-info");
  } else {
    $(".hide-cart-info").removeClass("show-cart-info");
  }
});

var ratedIndex = -1;

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

  // tinh nang ajax
  $(document).ready(function () {
    $(".review-list > .review-list-li > i.fa").on("click", function () {
      ratedIndex = parseInt($(this).data("index"));
      resetStar();
      setStar(ratedIndex);
    });

    $(".review-submit").on("click", function (e) {
      console.log("da lcicj");
      saveToDB();
    });

    // resetStar();
    // if (localStorage.getItem("ratedIndex") != null) {
    //   ratedIndex = parseInt(localStorage.getItem("ratedIndex"));
    //   setStar(ratedIndex);
    // }

    // $(".review-list > .review-list-li > i.fa").mouseover(function () {
    //   ratedIndex = parseInt($(this).data("index"));
    //   setStar(ratedIndex);
    //   console.log("Hover Index: " + ratedIndex);
    // });

    // $(".review-list > .review-list-li > i.fa").mouseleave(function () {
    //   resetStar();
    // });
  });

  function insertDatabase() {
    var productID = $(".productID").val();
    var comment = $(".review-comment").val();
    console.log(comment + ratedIndex + productID);

    $.ajax({
      url: "product.php",
      method: "POST",
      data: {
        productID: productID,
        comment: comment,
        star: ratedIndex,
      },
      success: function (res) {},
      error: function (rep) {
        alert("that abi");
      },
    });
  }

  function setStar(star) {
    for (var i = 0; i < star; i++) {
      $(".review-list > .review-list-li > i.fa:eq(" + i + ")").removeClass(
        "fa-star-o"
      );
      $(".review-list > .review-list-li > i.fa:eq(" + i + ")").addClass(
        "fa-star"
      );
    }
  }

  function resetStar() {
    $(".review-list > .review-list-li > i.fa.fa-star")
      .removeClass("fa-star")
      .addClass("fa-star-o");
  }
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
