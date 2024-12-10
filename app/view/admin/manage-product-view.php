<?php include '../../../resources/head/admin-check.php' ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../../../public/css/headerAdmin.css">

    <title>Admin - Manage Product</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../../../public/css/adminCSS/adManage.css">

    <style>
        .page-btn {
            margin: 5px;
        }
    </style>

    <script>
        $(document).ready(function () {
            // Initial load
            $.get("../../model/load-product-manage.php?page=1", function (data, status) {
                console.log("Initial Load AJAX Response:", data);
                $(".divResult").html(data);
            });

            // Delegate click event for page buttons
            $("body").on("click", ".page-btn", function () {
                // Get the value of the clicked button
                var pageBtnValue = $(this).val();
                // Send AJAX request to load data for the clicked page
                $.get("../../model/load-product-manage.php?page=" + pageBtnValue, function (data, status) {
                    $(".divResult").html(data);
                });
            });
        });
    </script>
</head>

<?php include '../../../resources/includes/headerAdmin.php'; ?>


<body class="bg-light">
    <img src="../../../public/img/logo.png" alt="" style="width: 15%; height: auto; margin-left: 6%">

    <div class="divResult container mt-5">
        <table class="table table-bordered">
            <thead class="thead-light">
                <tr>
                    <th style="width: 10%;">ID</th>
                    <th style="width: 40%;">Tên sản phẩm</th>
                    <th style="width: 25%;">Phân loại</th>
                    <th style="width: 25%;">Hành động</th>
                </tr>
            </thead>
            <tbody class="divManageProduct">
            </tbody>
        </table>
    </div>

    <!-- TABLE ANNOUNCE -->
    <div class="announce" id="announce">
        <p id="message__announce"></p>
        <button class="btnOK button" id="btnOK">OK</button>
    </div>
</body>

</html>