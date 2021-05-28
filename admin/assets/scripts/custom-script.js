$(document).ready(function () {
  toastr.options = {
    closeButton: true,
    debug: false,
    newestOnTop: false,
    progressBar: true,
    positionClass: "toast-top-right",
    preventDuplicates: true,
    onclick: null,
    showDuration: "300",
    hideDuration: "1000",
    timeOut: "3000",
    extendedTimeOut: "1000",
    showEasing: "swing",
    hideEasing: "linear",
    showMethod: "fadeIn",
    hideMethod: "fadeOut",
  };

  $(document).on("click", ".btn-add", function (e) {
    const brand = $(this).data("brand");
    const name = $(this).data("name");
    const price = $(this).data("price");
    const desc = $(this).data("desc");
    const src = $(this).data("src");

    $.ajax({
      url: "../classes/request.php",
      method: "POST",
      data: {
        type: "ADD_PRODUCT_CRAWL",
        name,
        price,
        desc,
        src,
        brand,
      },
      success: function (res) {
        res = res.trim();
        if (res === "ADD_SUCCESS") {
          toastr["success"]("Thêm sản phầm thành công !!!", "Thành công");
        } else {
          toastr["error"]("Thêm sản phầm thât bại :(", "Thất bại");
        }
      },
      error: function (rep) {
        toastr["error"]("Có lỗi xảy ra :(", "Thất bại");
      },
    });
  });

  $(".get-data").click(function () {
    const brandID = $(".select-brand").val();

    $.ajax({
      url: "../classes/request.php",
      method: "POST",
      data: {
        type: "CRAWL_BRAND",
        brandID,
      },
      success: function (res) {
        $(".product-list").html(res.trim());
      },
      error: function (rep) {
        toastr["error"]("Lấy dữ liệu thất bại !!!", "Thất bại");
      },
    });
  });
});
