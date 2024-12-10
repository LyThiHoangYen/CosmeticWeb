<?php include '../../../resources/head/admin-check.php' ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../../../public/css/headerAdmin.css">

    <title>Admin - Create Coupon</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../../../public/css/adminCSS/adManage.css">



    <style>
        .page-btn {
            margin: 5px;
        }
    </style>
</head>

<?php include '../../../resources/includes/headerAdmin.php'; ?>

<body class="bg-light">
    <img src="../../../public/img/logo.png" alt="" style="width: 15%; height: auto; margin-left: 6%">

    <div class="coupon" style="margin:auto;">
        <div class="container__input">
            <label for="coupon_code">Mã khuyến mãi:</label>
            <input type="text" id="coupon_code" name="coupon_code" required class="group__input">
        </div>
        <div class="container__input">
            <label for="discount_percentage">% khuyến mãi:</label>
            <input type="number" id="discount_percentage" name="discount_percentage" step="0.01" required
                class="group__input">
        </div>
        <div class="container__input">
            <label for="start_date">Ngày bắt đầu:</label>
            <input type="date" id="start_date" name="start_date" required class="group__input">
        </div>
        <div class="container__input">
            <label for="end_date">Ngày kết thúc:</label>
            <input type="date" id="end_date" name="end_date" required class="group__input">
        </div>
        <div class="container__btn">
            <button type="submit" onclick="createCoupon" id="btnCoupon">Tạo Voucher</button>
        </div>
    </div>
    <!-- TABLE ANNOUNCE -->
    <div class="announce" id="announce">
        <p id="message__announce"></p>
        <button class="btnOK button" id="btnOK">OK</button>
    </div>
</body>
<script>
    $(document).ready(function () {
        $("#btnCoupon").click(function () {
            var announce = document.getElementById('announce');
            announce.classList.add('show__announce');

            var couponCode = $("#coupon_code").val();
            var discountPercentage = $("#discount_percentage").val();
            var startDate = $("#start_date").val();
            var endDate = $("#end_date").val();

            var requestData = {
                coupon_code: couponCode,
                discount_percentage: discountPercentage,
                start_date: startDate,
                end_date: endDate
            };
            $.ajax({
                method: "POST",
                url: "../../controller/admin/create-coupon-controller.php",
                data: requestData,
                success: function (data) {
                    // Cập nhật thông báo phản hồi
                    $("#message__announce").html(data);
                }
            });
            $("#btnOK").click(function () {
                announce.classList.remove('show__announce');
            });
        });

    });
</script>

</html>