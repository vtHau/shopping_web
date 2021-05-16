import * as config from "./../../constants/constants";

var ratedIndex = 0;
$(document).ready(function () {
  $("#zoom-img").elevateZoom({
    scrollZoom: true,
  });
  $(window).scroll(function () {
    if ($(this).scrollTop() > 300) {
      $(".hide-cart-info").addClass("show-cart-info");
    } else {
      $(".hide-cart-info").removeClass("show-cart-info");
    }
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

  $(".message-content").keyup(function (e) {
    if (e.keyCode == 13 || e.which == 13) {
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
    }
  });

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

  $("#btn-chat").click(function () {
    $("#btn-chat").toggle();
    $("#popup-chat").toggle();
    getChat();
    setInterval(() => {
      getChat();
    }, 1000);
  });

  $("#btn-close-chat").click(function () {
    $("#btn-chat").toggle();
    $("#popup-chat").toggle();
  });

  $(".sign-email").focus(function () {
    $(".sign-fail").css({
      display: "none",
    });
  });

  $(".sign-password").focus(function () {
    $(".sign-fail").css({
      display: "none",
    });
  });

  $(".sign-btn").click(async function () {
    const email = $(".sign-email").val().trim();
    const password = $(".sign-password").val().trim();
    $(".sign-btn").attr("disabled", "disabled");
    $(".sign-btn").css({ "background-color": "#ccc", cursor: "context-menu" });
    await $.ajax({
      url: "classes/request.php",
      method: "POST",
      data: {
        type: "SIGN_IN",
        email,
        password,
      },
      success: function (res) {
        switch (res.trim()) {
          case "SIGN_SUCCESS":
            window.location = `${config.HOST_NAME}index.php`;
            break;

          case "USER_BLOCK":
            window.location = `${config.HOST_NAME}userblock.php`;
            break;

          case "RECONFIRM":
            window.location = `${config.HOST_NAME}reconfirm.php`;
            break;

          case "INPUT_FILL":
            $(".sign-fail")
              .css({
                display: "block",
              })
              .html("Hãy nhập đủ các trường dữ liệu");
            break;

          case "SIGN_FAIL":
            $(".sign-fail")
              .css({
                display: "block",
              })
              .html("Email hoặc mật khẩu không đúng !!!");
            break;

          default:
            break;
        }
      },
      error: function (rep) {
        console.log("FAIL");
      },
    });
    $(".sign-btn").removeAttr("disabled");
    $(".sign-btn").css({
      "background-color": "var(--primary)",
      cursor: "pointer",
    });
  });
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
