<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- include config and header -->
    <?php
    include '../../resources/head/head-config.php';

    include '../../resources/head/login-check.php';
    ?>

    <link rel="stylesheet" href="../../public/css/search-product.css">

    <title>Search product</title>

    <script>
        $(document).ready(function () {
            // Function to perform search
            function performSearch() {
                var keyword = $("#txtKeyword").val();
                $.ajax({
                    url: "../controller/search-product-controller.php?keyword=" + keyword,
                    method: "GET",
                    success: function (data) {
                        console.log("Response data:", data);
                        $(".divSearchResult").html(data);
                    },
                    error: function (xhr, status, error) {
                        console.error("Error:", error);
                    }
                });
            }

            // Click event for the search button
            $("body").on("click", "#btnSearch", function () {
                performSearch();
            });

            // Keyup event for the Enter key
            $("#txtKeyword").keyup(function (event) {
                if (event.keyCode === 13) {
                    // If Enter key is pressed
                    performSearch();
                }
            });

            // Load event for the page
            $(window).on('load', function () {
                $.ajax({
                    url: "../controller/search-product-controller.php?keyword=",
                    method: "GET",
                    success: function (data) {
                        console.log("Response data:", data);
                        $(".divSearchResult").html(data);
                    },
                    error: function (xhr, status, error) {
                        console.error("Error:", error);
                    }
                });
            });
        });
    </script>
</head>

<body>
    <div class="search">
        <div class="search__container">
            <div>
                <input id="txtKeyword" name="keyword" type="text" class="search__input"
                    placeholder="Nhập sản phẩm bạn muốn tìm kiếm">
            </div>
            <div>
                <button class="btnSearch" id="btnSearch" type="submit"><i data-feather="search"
                        class="search__icon"></i></button>
            </div>
        </div>
        <br />
        <!-- Grid system -->
    </div>
    <div id="divSearchResult" class="divSearchResult">
        <!-- Add other product items here -->
    </div>
</body>
<?php include '../../resources/includes/footer.php' ?>
<script>feather.replace()</script>

</html>