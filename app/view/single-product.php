<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--Style-->
    <link rel="stylesheet" href="../../public/css/productitem.css">

    <!-- include config and header -->
    <?php
    include '../../resources/head/head-config.php';

    include '../../resources/head/login-check.php';
    ?>

    <!-- connect to the database -->
    <?php

    include '../model/connectdb.php';

    $PHP_productID = isset($_GET["productID"]) ? $_GET["productID"] : null;

    // If product ID is null, redirect to 404 page
    if ($PHP_productID === null) {
        include '404.php';
        die();
    }

    if ($PHP_productID) {
        $sql = "SELECT p.*, c.category_name FROM products p JOIN categories c ON p.category_id = c.category_id WHERE product_id = $PHP_productID";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $product_name = $row["product_name"];
            $category_name = $row["category_name"];
            $price = $row["price"];
            $description = $row["description"];
            $imgLink = $row["imgLink"];
        }
    }
    ?>

    <title>
        <?php echo $product_name ?>
    </title>

    <!-- import ajax -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <script>
        $(document).ready(function () {
            // Sử dụng sự kiện delegation trên một phần tử cha tĩnh (thay thế 'body' bằng phần tử cha tĩnh gần nhất)
            $("body").on("click", ".btnAddToCart", function () {
                var productID = <?php echo $PHP_productID ?>
                // alert(productID);

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
        });
    </script>
</head>

<body>
    <div class="body">
        <div class="base-product row" style="padding-top: 50px; padding-bottom:8%">
            <div class="slick-slider-img product-item-base col-md-6">
                <div class="img-item-detail">
                    <img class="img-product-item" src="<?php echo $imgLink; ?>" alt="">
                </div>
            </div>
            <div class="product-summary col-md-6">
                <!-- load catergory -->
                <div class="product-link">
                    <a href="#">
                        <?php echo $category_name; ?>
                    </a>
                </div>
                <!-- load name -->
                <div class="product-heading mt-3">
                    <?php echo $product_name; ?>
                </div>
                <!-- load prive -->
                <div class="product-price">
                    <?php echo number_format($price, 0); ?> đ
                </div>
                <!-- load description -->
                <div class="txt-fuel-1">
                    <div class="clamped-text">
                        <p style="font-size: 15px">
                            <?php echo $description; ?>
                        </p>
                    </div>
                    <button id="readMoreBtn">Xem thêm</button>
                    <button id="readLessBtn">Rút gọn</button>
                </div>
                <!-- load license -->
                <div class="suit-desc">
                    <span class="suit-item">
                        <img src="../../public/img/alcohol_free_94159f7a8c.svg" alt="" class="logo-suit"
                            style="margin-right: 8px;">
                        Không cồn
                    </span>
                    <span class="suit-item">
                        <img src="../../public/img/no_mineral_oil_c74111708f.svg" alt="" class="logo-suit"
                            style="margin-right: 8px;">
                        Không dầu khoáng
                    </span>
                    <span class="suit-item">
                        <img src="../../public/img/no_paraben_7261a22aaf.svg" alt="" class="logo-suit"
                            style="margin-right: 8px;">
                        Không paraben
                    </span>
                    <span class="suit-item">
                        <img src="../../public/img/sultafe_free_6c0a739922.svg" alt="" class="logo-suit"
                            style="margin-right: 8px;">
                        Không sultafe
                    </span>
                </div>
                <!-- fixed infor -->
                <div class="Suit-da" style="border-bottom: 1px solid rgb(244, 231, 172);">
                    <span style="font-weight: 600;">Thích hợp với</span>
                    <p style="margin: 0; line-height:2rem;">Mọi loại da</p>
                </div>
                <div class="Suit-da">
                    <span style="font-weight: 600;">Thành phần chính</span>
                    <p style="margin: 0; line-height:2rem;">Nước cất hoa hồng hữu cơ, Vitamin B5 & Astaxanthin</p>
                </div>
                <div class="logo-summary-brand">
                    <img src="../../public/img/1_Peta_374458c0d4.png" alt="" class="logo-brand">

                    <img src="../../public/img/2_Cruelty_Free_db7966511b.png" alt="" class="logo-brand">

                    <img src="../../public/img/3_Vegan_5995e46a21.png" alt="" class="logo-brand">
                </div>
                <button class="btn-background btnAddToCart">
                    <span class="btn-txt">THÊM VÀO GIỎ</span>
                    <span class="ti-shopping-cart btn-icon"></span>
                </button>
                <div class="share-comment">
                    <div class="share-product">
                        <span class="share-txt" style="margin-right: 4px; ">Chia sẻ</span>
                        <a href="" class="share-link-logo">
                            <img src="../../public/img/—Pngtree—facebook logo facebook icon_3566127.png" alt=""
                                class="logo-share">
                        </a>
                        <a href="" class="share-link-logo">
                            <img src="../../public/img/—Pngtree—instagram icon instagram logo_3584905.png" alt=""
                                class="logo-share">
                        </a>
                    </div>
                    <div class="comment-product">
                        <a href="" class="link-comment" style="color: black;">Viết đánh giá</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Rút gọn văn bản-->
    <script src="../../public/js/clamped.js"></script>
</body>

<?php include '../../resources/includes/footer.php' ?>

</html>