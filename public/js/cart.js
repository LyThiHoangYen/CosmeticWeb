$(document).ready(function () {
    // Thực hiện yêu cầu AJAX khi trang được tải
    $.get("../../app/controller/cartController.php?action=load", function (data, status) {
        console.log("Response data:", data);
        $(".divMainCart").html(data);
    });
});

$(document).ready(function () {
    // Sử dụng sự kiện delegation trên một phần tử cha tĩnh
    $(".divMainCart").on("click", ".increase_cart", function () {
        var productID = $(this).data("productid");
        alert(productID);
        $.ajax({
            url: "../../app/controller/cartController.php?action=add&productID=" + productID,
            method: "GET",
            success: function (data) {
                console.log("Response data:", data);
                $(".divMainCart").html(data);
            },
            error: function (xhr, status, error) {
                console.error("Error:", error);
            }
        });
    });

    $(".divMainCart").on("click", ".decrease_cart", function () {
        var productID = $(this).data("productid");
        alert(productID);
        $.ajax({
            url: "../../app/controller/cartController.php?action=decrease&productID=" + productID,
            method: "GET",
            success: function (data) {
                console.log("Response data:", data);
                $(".divMainCart").html(data);
            },
            error: function (xhr, status, error) {
                console.error("Error:", error);
            }
        });
    });

    $(".divMainCart").on("click", ".remove_cart", function () {
        var productID = $(this).data("productid");
        alert(productID);
        $.ajax({
            url: "../../app/controller/cartController.php?action=remove&productID=" + productID,
            method: "GET",
            success: function (data) {
                console.log("Response data:", data);
                $(".divMainCart").html(data);
            },
            error: function (xhr, status, error) {
                console.error("Error:", error);
            }
        });
    });

    $(".divMainCart").on("click", ".clear_cart", function () {
        $.ajax({
            url: "../../app/controller/cartController.php?action=clear",
            method: "GET",
            success: function (data) {
                console.log("Response data:", data);
                $(".divMainCart").html(data);
            },
            error: function (xhr, status, error) {
                console.error("Error:", error);
            }
        });
    });

    $(document).ready(function () {
        $("#btnLogin").on("click", function (e) {
            e.preventDefault();

            var phone = $("#phone").val();
            var password = $("#password").val();

            $.ajax({
                type: "POST",
                url: "../controller/logginController.php",
                data: { phone: phone, password: password },
                success: function (response) {
                    if (response.trim() === "Đăng nhập thành công") {
                        // Đăng nhập thành công, làm thứ gì đó (ví dụ: reload trang)
                        location.reload();
                    } else {
                        // Hiển thị thông báo lỗi
                        alert(response);
                    }
                },
                error: function () {
                    alert("Đã xảy ra lỗi trong quá trình xử lý đăng nhập.");
                }
            });
        });
    });
});

