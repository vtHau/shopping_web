var ratedIndex = 0;

$(document).ready(function () {
  $("#img-zoom").elevateZoom({
    zoomType: "lens",

    lensShape: "round",

    lensSize: 200,
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

  function emailIsValid(email) {
    return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);
  }

  function disableSignIn() {
    $(".sign-btn").attr("disabled", "disabled");
    $(".sign-btn").css({ "background-color": "#ccc", cursor: "context-menu" });
  }

  function enableSignIn() {
    $(".sign-btn").removeAttr("disabled");
    $(".sign-btn").css({
      "background-color": "var(--primary)",
      cursor: "pointer",
    });
  }

  $(".sign-email").blur(function () {
    const email = $(".sign-email").val().trim();
    const checkEmail = emailIsValid(email);
    if (!checkEmail) {
      $(".sign-fail")
        .css({
          display: "block",
        })
        .html("Địa chỉ Email không hợp lệ");
    }
  });

  $(".sign-password").blur(function () {
    const password = $(".sign-password").val().trim();
    if (password.length < 0) {
      $(".sign-fail")
        .css({
          display: "block",
        })
        .html("Mật khẩu quá ngắn");
    }
  });

  $(".sign-btn").click(function () {
    const email = $(".sign-email").val().trim();
    const password = $(".sign-password").val().trim();

    if (email === "" || password === "") {
      $(".sign-fail")
        .css({
          display: "block",
        })
        .html("Vui lòng nhập đủ dữ liệu");

      return;
    }
    if (password.length < 0) {
      $(".sign-fail")
        .css({
          display: "block",
        })
        .html("Mật khẩu quá ngắn");
      return;
    }

    const checkEmail = emailIsValid(email);
    if (!checkEmail) {
      $(".sign-fail")
        .css({
          display: "block",
        })
        .html("Địa chỉ Email không hợp lệ");

      return;
    }

    disableSignIn();

    $.ajax({
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
            window.location = `https://mwstoree.000webhostapp.com/index.php`;
            // window.location = `http://localhost/webshop/index.php`;
            enableSignIn();
            break;

          case "USER_BLOCK":
            window.location = `https://mwstoree.000webhostapp.com/userblock.php`;
            // window.location = `http://localhost/webshop/userblock.php`;
            enableSignIn();
            break;

          case "RECONFIRM":
            window.location = `https://mwstoree.000webhostapp.com/reconfirm.php`;
            // window.location = `http://localhost/webshop/reconfirm.php`;
            enableSignIn();
            break;

          case "INPUT_FILL":
            $(".sign-fail")
              .css({
                display: "block",
              })
              .html("Hãy nhập đủ các trường dữ liệu");
            enableSignIn();
            break;

          case "SIGN_FAIL":
            $(".sign-fail")
              .css({
                display: "block",
              })
              .html("Email hoặc mật khẩu không đúng !!!");
            enableSignIn();
            break;

          default:
            break;
        }
      },
      error: function (rep) {
        console.log("FAIL");
      },
    });
  });
  //change password form

  $(".old-password").focus(function () {
    $(".mess-old-password").css({
      visibility: "hidden",
    });
    $(".change-password-fail").css({
      visibility: "hidden",
    });
  });
  $(".pre-new-password").focus(function () {
    $(".mess-pre-new-password").css({
      visibility: "hidden",
    });
  });
  $(".new-password").focus(function () {
    $(".mess-new-password").css({
      visibility: "hidden",
    });
  });

  $(".old-password").blur(function () {
    const oldPassword = $(".old-password").val().trim();
    if (oldPassword === "") {
      $(".mess-old-password")
        .css({
          visibility: "visible",
        })
        .html("Nhập mật khẩu cũ");
      return;
    }
    if (oldPassword.length < 8) {
      $(".mess-old-password")
        .css({
          visibility: "visible",
        })
        .html("Mật khẩu phải từ 8 số trở lên");
      return;
    }
  });
  $(".new-password").blur(function () {
    const newPassword = $(".new-password").val().trim();
    if (newPassword === "") {
      $(".mess-new-password")
        .css({
          visibility: "visible",
        })
        .html("Nhập mật khẩu mới");
      return;
    }
    if (newPassword.length < 8) {
      $(".mess-new-password")
        .css({
          visibility: "visible",
        })
        .html("Mật khẩu phải từ 8 số trở lên");
      return;
    }
  });
  $(".pre-new-password").blur(function () {
    const newPassword = $(".new-password").val().trim();
    const reNewPassword = $(".pre-new-password").val().trim();
    if (reNewPassword === "") {
      $(".mess-pre-new-password")
        .css({
          visibility: "visible",
        })
        .html("Nhập lại mật khẩu mới");
      return;
    }
    if (reNewPassword.length < 8) {
      $(".mess-pre-new-password")
        .css({
          visibility: "visible",
        })
        .html("Mật khẩu phải từ 8 số trở lên");
      return;
    }
    if (newPassword !== reNewPassword) {
      $(".mess-pre-new-password")
        .css({
          visibility: "visible",
        })
        .html("Mật khẩu không khớp, kiểm tra lại");
      return;
    }
  });

  $(".btn-change-password").click(function () {
    var isTrue = true;

    const oldPassword = $(".old-password").val().trim();
    if (oldPassword === "") {
      $(".mess-old-password")
        .css({
          visibility: "visible",
        })
        .html("Nhập mật khẩu cũ");
      isTrue = false;
    }
    if (oldPassword.length < 8) {
      $(".mess-old-password")
        .css({
          visibility: "visible",
        })
        .html("Mật khẩu phải từ 8 số trở lên");
      isTrue = false;
    }
    const newPassword = $(".new-password").val().trim();
    const reNewPassword = $(".pre-new-password").val().trim();
    if (reNewPassword === "") {
      $(".mess-pre-new-password")
        .css({
          visibility: "visible",
        })
        .html("Nhập lại mật khẩu mới");
      isTrue = false;
    }
    if (reNewPassword.length < 8) {
      $(".mess-pre-new-password")
        .css({
          visibility: "visible",
        })
        .html("Mật khẩu phải từ 8 số trở lên");
      isTrue = false;
    }
    if (newPassword !== reNewPassword) {
      $(".mess-pre-new-password")
        .css({
          visibility: "visible",
        })
        .html("Mật khẩu không khớp, kiểm tra lại");
      isTrue = false;
    }

    if (newPassword === "") {
      $(".mess-new-password")
        .css({
          visibility: "visible",
        })
        .html("Nhập mật khẩu mới");
      return;
    }
    if (newPassword.length < 8) {
      $(".mess-new-password")
        .css({
          visibility: "visible",
        })
        .html("Mật khẩu phải từ 8 số trở lên");
      isTrue = false;
    }
    if (isTrue) {
      $.ajax({
        url: "classes/request.php",
        method: "POST",
        data: {
          type: "CHANGE_PASSWORD",
          oldPassword,
          newPassword,
        },
        success: function (res) {
          switch (res.trim()) {
            case "CHANGE_PASSWORD_SUCCESS":
              $("#modal-change-password").modal("hide");
              toastr["success"]("Đổi mật khẩu thành công !!!", "Thành công");
              break;

            case "PASSWORD_WRONG":
              $(".change-password-fail")
                .css({
                  visibility: "visible",
                })
                .html("Mật khẩu hiện tại không đúng");

              break;

            default:
              break;
          }
        },
        error: function (rep) {
          console.log("FAIL");
        },
      });
    }
  });

  $(".product-quantity-update").on("input", function () {
    const quantity = $(this).val();
    const productID = parseInt($(this).data("productid"));
    if (quantity >= 1) {
      $.ajax({
        url: "classes/request.php",
        method: "POST",
        data: {
          type: "CHANGE_QUANTITY_PRODUCT",
          productID,
          quantity,
        },
        success: function (res) {
          switch (res.trim()) {
            case "UPDATE_QUANTITY_SUCCESS":
              location.reload();
              break;
            default:
              break;
          }
        },
        error: function (rep) {
          console.log("FAIL");
        },
      });
    }
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
