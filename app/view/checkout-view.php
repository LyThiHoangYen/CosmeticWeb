<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../../public/css/checkout.css">
    <link rel="stylesheet" href="../../public/css/header.css">
    <!-- <script scr="../../public/js/cart.js"></script> -->
    <?php
    session_start();
    // Check if the user is logged in
    
    // IF not session or not logged in
    if (!isset($_SESSION['user_id'])) {
        header("Location: ../../app/view/login-require.php");
    }
    ?>
</head>


<body>
    <!-- Logo -->
    <div class="div-logo">
        <img src="../../public/img/logo.svg" alt="logo" class="checkout-img-logo">
    </div>

    <!-- Nội dung giỏ hàng -->
    <div class="divCheckout row">
        <div class="cus-info-container col-md-6 p-0 m-0">
            <div class="cus-info">
                <div class="cus-info-detail">
                    <p>Thông tin liên hệ của bạn</p>
                    <p>
                        <?php echo $_SESSION['full_name']; ?>
                    </p>
                    <p>
                        <?php echo $_SESSION['email'] ?>
                    </p>
                    <p>
                        <?php echo $_SESSION['phone'] ?>
                    </p>
                </div>
                <div class="deliveryAddress">
                    <div class="d-flex justify-content- between">
                        <select class="thyanh" id="city">
                            <option value="" selected>Chọn tỉnh thành</option>
                        </select>
                        <select class="thyanh" id="district">
                            <option value="" selected>Chọn quận huyện</option>
                        </select>
                    </div>
                    <div class="d-flex justify-content-between">
                        <select class="thyanh" id="ward">
                            <option value="" selected>Chọn phường xã</option>
                        </select>
                        <input class="thyanh" id="home" type="text" placeholder="Số nhà, đường, khu vực">
                    </div>
                </div>
            </div>

            <div class="cus-payment">
                <p>Phương thức thanh toán</p>
                <input type="radio" id="cod" name="payment" value="1">
                <label for="cod">Thanh toán khi giao hàng (COD)</label><br>
                <input type="radio" id="momo" name="payment" value="2">
                <label for="momo">Thanh toán bằng Ví MoMo</label><br>
                <input type="radio" id="bank" name="payment" value="3">
                <label for="bank">Thanh toán bằng thẻ ATM/VISA/MASTER (Alepay)</label>
            </div>
        </div>

        <div class="cus-info-container col-md-6 p-0 m-0">
            <div class="cus-cart">
                <p>Chi tiết đơn hàng</p>
                <div class="divMainCart">

                </div>
            </div>

            <div class="cus-coupon">
                <div>
                    NHẬP MÃ KHUYẾN MÃI HOẶC THẺ QUÀ TẶNG
                </div>
                <div>
                    <input class="nownib-1" type="text" id="couponCodeInput">
                    <button class="nownib-2" id="btnCoupon">Áp dụng</button>
                </div>
            </div>
            <div class="cus-total d-flex justify-content-between">
                <div>
                    <p>Tổng cộng</p>
                    <h2 id="totalAfter">
                        <?php
                        // Lấy giá từ session
                        $totalPrice = $_SESSION['totalPrice'];

                        // Định dạng giá theo định dạng VND
                        $formattedTotalPrice = number_format($totalPrice, 0, ',', '.') . ' VND';

                        // In giá đã định dạng
                        echo $formattedTotalPrice;
                        ?>
                    </h2>
                </div>
                <div>
                    <a class="btn" href="">
                        <button class="btn-payment" id="btnPayment"><b>Đặt hàng</b></button>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div style="text-align: center">
        <hr style="width: 85%;">
        <div class="container">
            <p>© 2023 Cocoon Vietnam. All rights reserved.</p>
        </div>
    </div>
</body>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"></script>
<script>
    const host = "https://provinces.open-api.vn/api/";
    var callAPI = (api) => {
        return axios.get(api)
            .then((response) => {
                renderData(response.data, "city");
            });
    }
    callAPI('https://provinces.open-api.vn/api/?depth=1');
    var callApiDistrict = (api) => {
        return axios.get(api)
            .then((response) => {
                renderData(response.data.districts, "district");
            });
    }
    var callApiWard = (api) => {
        return axios.get(api)
            .then((response) => {
                renderData(response.data.wards, "ward");
            });
    }

    var renderData = (array, select) => {
        let row = ' <option disable value="">Chọn</option>';
        array.forEach(element => {
            row += `<option data-id="${element.code}" value="${element.name}">${element.name}</option>`
        });
        document.querySelector("#" + select).innerHTML = row
    }

    $("#city").change(() => {
        callApiDistrict(host + "p/" + $("#city").find(':selected').data('id') + "?depth=2");
        printResult();
    });
    $("#district").change(() => {
        callApiWard(host + "d/" + $("#district").find(':selected').data('id') + "?depth=2");
        printResult();
    });
    $("#ward").change(() => {
        printResult();
    })

    var printResult = () => {
        if ($("#district").find(':selected').data('id') != "" && $("#city").find(':selected').data('id') != "" &&
            $("#ward").find(':selected').data('id') != "") {
            let addressPayment = $("#city option:selected").text() +
                " - " + $("#district option:selected").text() + " - " +
                $("#ward option:selected").text() + " - " + $("#home").val();
            // alert(addressPayment);
        }
    }
</script>


<script>
    $(document).ready(function () {
        // Thực hiện yêu cầu AJAX khi trang được tải
        $.get("../../app/controller/cart-controller.php?action=load", function (data, status) {
            console.log("Response data:", data);
            $(".divMainCart").html(data);
        });
    });

    $(document).ready(function () {
        // Sử dụng sự kiện delegation trên một phần tử cha tĩnh
        $(".divMainCart").on("click", ".increase_cart", function () {
            var productID = $(this).data("productid");
            $.ajax({
                url: "../../app/controller/cart-controller.php?action=add&productID=" + productID,
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
            $.ajax({
                url: "../../app/controller/cart-controller.php?action=decrease&productID=" + productID,
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
            // alert(productID);
            $.ajax({
                url: "../../app/controller/cart-controller.php?action=remove&productID=" + productID,
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
                url: "../../app/controller/cart-controller.php?action=clear",
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

        $(document).ready(function () {
            $("#btnCoupon").on("click", function () {
                // Lấy giá trị mã giảm giá từ input
                var couponCode = $("#couponCodeInput").val();
                console.log(couponCode);

                // Kiểm tra xem mã giảm giá có tồn tại không
                if (couponCode) {
                    $.ajax({
                        // Sử dụng tham số coupon_code để truyền mã giảm giá
                        url: "../../app/controller/add-coupon-controller.php?coupon_code=" + couponCode,
                        method: "GET",
                        success: function (data) {
                            console.log("Response data:", data);
                            // Hiển thị giá mới sau khi áp dụng mã giảm giá
                            $("#totalAfter").html(data);
                        },
                        error: function (xhr, status, error) {
                            console.error("Error:", error);
                        }
                    });
                } else {
                    // Xử lý khi người dùng không nhập mã giảm giá
                    console.log("Vui lòng nhập mã giảm giá.");
                    // Có thể thêm thông báo khác tùy ý
                }
            });
        });

        $(document).ready(function () {
            $("#btnPayment").on("click", function (e) {
                e.preventDefault();

                var homeAddress = $("#home").val();

                var addressPayment = $("#city option:selected").text() +
                    " - " + $("#district option:selected").text() + " - " +
                    $("#ward option:selected").text() + " - " + homeAddress;

                var paymentMethod = $("input[name='payment']:checked").val();

                // console.log(addressPayment);
                // console.log(paymentMethod);


                $.ajax({
                    url: "../../app/controller/checkout-controller.php?homeAddress=" + addressPayment +
                        "&paymentMethod=" + paymentMethod,
                    method: "GET",
                    success: function (data) {
                        console.log("Response data:", data);
                        window.location.href = "../../app/view/homepage.php";

                    },
                    error: function (xhr, status, error) {
                        console.error("Error:", error);
                    }
                });
            });
        });

    })

</script>

</html>