var ratedIndex = 0;

$(document).ready(function () {
  $(window).scroll(function () {
    if ($(this).scrollTop() > 300) {
      $(".hide-cart-info").addClass("show-cart-info");
    } else {
      $(".hide-cart-info").removeClass("show-cart-info");
    }
  });

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

  $("#edit-comment").on("click", function () {
    $(".box-edit").toggle();
  });

  $(".review-list > .review-list-li > i.fa").on("click", function () {
    ratedIndex = parseInt($(this).data("index"));
    resetStar();
    setStar(ratedIndex);
  });

  $(".review-submit").on("click", function (e) {
    e.preventDefault();
    sendReviewAjax("insert");
  });

  $(".review-update").on("click", function (e) {
    e.preventDefault();
    sendReviewAjax("update");
  });

  $("#delete-comment").on("click", function (e) {
    e.preventDefault();
    sendReviewAjax("delete");
  });

  getChat();

  setInterval(() => {
    getChat();
  }, 1000);

  $(".footer-chat-send").on("click", function () {
    var message = $(".message-content").val();

    if (message != "") {
      $.ajax({
        url: "classes/request.php",
        method: "POST",
        data: {
          type: "insertChat",
          message: message,
        },
        success: function (res) {
          $(".message-content").val("");
          getChat();
        },
        error: function (rep) {
          alert("Thất bại");
        },
      });
    }
  });

  function getChat() {
    $.ajax({
      url: "classes/request.php",
      method: "POST",
      data: {
        type: "getChat",
      },
      success: function (res) {
        res = res.trim();
        $(".body-chat").html(res);

        var height = 0;

        $(".body-chat .box-mess").each(function (i, value) {
          height += parseInt($(this).height());
        });

        height += "";
        $(".body-chat").animate({ scrollTop: height });
      },
      error: function (rep) {
        alert("Thất bại");
      },
    });
  }

  function sendReviewAjax(type) {
    var productID = $(".productID").val();
    var comment = $(".review-comment").val();

    $.ajax({
      url: "product.php",
      method: "POST",
      data: {
        type: type,
        productID: productID,
        comment: comment,
        star: ratedIndex,
      },
      success: function (res) {
        location.reload();
      },
      error: function (rep) {
        alert("Thất bại");
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
