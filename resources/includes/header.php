<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php
    include '../../resources/head/head-config.php';
    ?>

    <script>
        $(document).ready(function () {
            // Sử dụng sự kiện delegation trên một phần tử cha tĩnh
            $(".divMainCart").on("click", ".increase_cart", function () {
                var productID = $(this).data("productid");
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

            $(".divMainCart").on("click", ".decrease_cart", function () {
                var productID = $(this).data("productid");
                // alert(productID);
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
                alert(productID);
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
                        url: "../controller/login-controller.php",
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
    </script>

</head>

<body>
    <div class="header" id="header">
        <!-- HEADER PC: START -->
        <header class="header__pc">
            <div class="banner">Tận hưởng giao hàng toàn quốc với hóa đơn 99.000 đ +</div>
            <nav class="navigation">
                <ul class="navigation__list">
                    <li class="navigation__item"><button type="button" onclick="onLeft()"
                            class="navigation__link btn__wb" id="btn-product">Sản
                            phẩm</button></li>
                    <li class="navigation__item"><button type="button" onclick="onLeft()"
                            class="navigation__link btn__wb" id="btn-discount">Khuyến
                            mãi</button></li>
                    <li class="navigation__item"><button type="button" onclick="onLeft()"
                            class="navigation__link btn__wb" id="btn-cosmetic">Cosmetic</button></li>
                    <li class="navigation__item">
                        <a href="" style="font-size: 16px; color: #1f1c17;" class="link__pc--wb">Bài viết</a>
                    </li>
                </ul>
                <div class="navigation__logo"><a href="../../app/view/homepage.php"><img src="../../public/img/logo.png"
                            alt=""></a></div>
                <ul class="navigation__list">
                    <li class="navigation__item"><a href="../../app/view/search-product-view.php" class="search" id="btn-search">
                            <i data-feather="search"></i></a></li>
                    <li class="navigation__item"><button type="button" onclick="onRight()"
                            class="navigation__link btn__wb" id="btn-login">Đăng nhập</button></li>
                    <li class="navigation__item"><button type="button" onclick="onRight()"
                            class="navigation__link btn__wb" id="btn-contact">Liên hệ</button></li>
                    <li class="navigation__item"><button type="button" onclick="onRight()"
                            class="navigation__link btn__wb" id="btn-cart">Giỏ hàng</button></li>
                    <li class="navigation__item"><button type="button" onclick="onRight()"
                            class="navigation__link btn__wb" id="btn-language">EN</button></li>
                </ul>
            </nav>
            <div class="overlay left-sidebar" id="overlay-left" onclick="offLeft()"></div>
            <div class="overlay right-sidebar" id="overlay-right" onclick="offRight()"></div>
            <div class="overlay second-sidebar" id="overlay-sidebar" onclick="hideOverlay()"></div>
            <!-- PRODUCT: START -->
            <div class="product side-bar" id="product">
                <div class="product__menu">
                    <i data-feather="x" class="close__product close-sample" id="close-product"></i>
                    <p class="group__title--p">Sản Phẩm</p>
                    <ul class="product__list" id="product-list">
                        <li class="group__item"><a href="" class="group__link link__pc--wb"
                                onmouseover="showContent('new-product')">Sản Phẩm Mới</a></li>
                        <li class="group__item"><a href="" class="group__link link__pc--wb"
                                onmouseover="showContent('skincare')">Chăm Sóc Da</a></li>
                        <li class="group__item"><a href="" class="group__link link__pc--wb"
                                onmouseover="showContent('haircare')">Chăm Sóc Tóc</a></li>
                        <li class="group__item"><a href="" class="group__link link__pc--wb"
                                onmouseover="showContent('bath-bodycare')">Tắm & Dưỡng Thể</a></li>
                        <li class="group__item"><a href="" class="group__link link__pc--wb"
                                onmouseover="showContent('lip-balm')">Dưỡng Môi</a></li>
                        <li class="group__item"><a href="" class="group__link link__pc--wb"
                                onmouseover="showContent('combo')">Combo / Bộ Sản Phẩm</a></li>
                    </ul>
                </div>

                <div class="product__related">
                    <p class="group__title--p">Có Thể Bạn Quan Tâm</p>
                    <ul id="related-list">
                        <li class="group__item"><a href="" class="group__link link__pc--wb"
                                onmouseover="showContent('skin-problem')">Vấn Đề Về Da</a></li>
                        <li class="group__item"><a href="" class="group__link link__pc--wb"
                                onmouseover="showContent('hair-problem')">Vấn Để Về Tóc</a></li>
                    </ul>
                </div>
                <div class="product__ingredient">
                    <ul id="ingredient">
                        <li class="group__item"><a href="" class="group__link link__pc--wb"
                                onmouseover="showContent('find-ingredient')">Tìm Hiểu Nguyên Liệu</a></li>
                    </ul>
                </div>
            </div>
            <!-- PRODUCT:END -->

            <!-- CATEGORY PRODUCT - SECOND SIDEBAR: START -->
            <div class="group__second--sidebar side-bar-second" id="middle-sidebar">

                <!-- New Product -->
                <i data-feather="x" class="group__close close-sample" id="close-new-product"
                    onclick="closeSidebar()"></i>
                <div class="group__second--content" id="new-product">
                    <p style="margin-left: -12px;" class="group__title--p">Sản phẩm mới</p>
                    <ul class="group__product--list" id="new-product-list">
                        <li class="group__product--item">
                            <a href="" class="group__product--link link__pc--wb">
                                <div class="group__info--product">
                                    <div class="group__name--product">Dầu gội bưởi không sulfate 500ml</div>
                                    <div class="group__describe--product">Giảm gãy rụng và làm mềm tóc</div>
                                    <div class="group__price--product">375.000 đ</div>
                                </div>
                                <img src="../../public/img/daugoibuoi500ml.png" alt="">
                            </a>
                        </li>

                        <li class="group__product--item">
                            <a href="" class="group__product--link link__pc--wb">
                                <div class="group__info--product">
                                    <div class="group__name--product">Gel rửa mặt cà phê Đắk Lắk 140ml</div>
                                    <div class="group__describe--product">Cho làn da mềm mại và rạng rỡ</div>
                                    <div class="group__price--product">195.000 đ</div>
                                </div>
                                <img src="../../public/img/gelruamat140ml.png" alt="">
                            </a>
                        </li>

                        <li class="group__product--item">
                            <a href="" class="group__product--link link__pc--wb">
                                <div class="group__info--product">
                                    <div class="group__name--product">Nước dưỡng tóc tinh dầu bưởi phiên bản nâng cấp
                                        140ml
                                    </div>
                                    <div class="group__describe--product">Giảm gãy rụng và làm mềm tóc</div>
                                    <div class="group__price--product">165.000 đ</div>
                                </div>
                                <img src="../../public/img/nuocduongtoc14ml.png" alt="">
                            </a>
                        </li>
                    </ul>
                </div>

                <!-- SkinCare -->
                <div class="group__second--content" id="skincare">
                    <p class="group__title--p">Chăm Sóc Da</p>
                    <ul class="group__list" id="skincare-list">
                        <li class="group__item"><a href="" class="group__link link__pc--wb"
                                onmousemove="showInfoProduct('skincare-1')">Tất Cả</a></li>
                        <li class="group__item"><a href="" class="group__link link__pc--wb"
                                onmousemove="showInfoProduct('skincare-2')">Chống Nắng</a></li>
                        <li class="group__item"><a href="" class="group__link link__pc--wb"
                                onmousemove="showInfoProduct('skincare-3')">Tẩy Trang</a></li>
                        <li class="group__item"><a href="" class="group__link link__pc--wb"
                                onmousemove="showInfoProduct('skincare-4')">Sữa Rửa Mặt</a></li>
                        <li class="group__item"><a href="" class="group__link link__pc--wb"
                                onmousemove="showInfoProduct('skincare-5')">Tẩy Da Chết Mặt</a></li>
                        <li class="group__item"><a href="" class="group__link link__pc--wb"
                                onmousemove="showInfoProduct('skincare-6')">Mặt Nạ</a></li>
                        <li class="group__item"><a href="" class="group__link link__pc--wb"
                                onmousemove="showInfoProduct()">Nước
                                Cân Bằng</a></li>
                        <li class="group__item"><a href="" class="group__link link__pc--wb"
                                onmousemove="showInfoProduct()">Tinh
                                Chất</a></li>
                        <li class="group__item"><a href="" class="group__link link__pc--wb"
                                onmousemove="showInfoProduct()">Kem
                                Dưỡng</a></li>
                        <li class="group__item"><a href="" class="group__link link__pc--wb"
                                onmousemove="showInfoProduct()">Xịt
                                Khoáng</a></li>
                    </ul>
                </div>

                <!-- Hair Care -->
                <div class="group__second--content" id="haircare">
                    <p class="group__title--p">Chăm Sóc Tóc</p>
                    <ul class="group__list" id="haircare-list">
                        <li class="group__item"><a href="" class="group__link link__pc--wb"
                                onmousemove="showInfoProduct('haircare-1')">Tất Cả</a></li>
                        <li class="group__item"><a href="" class="group__link link__pc--wb"
                                onmousemove="showInfoProduct('haircare-2')">Dầu gội</a></li>
                        <li class="group__item"><a href="" class="group__link link__pc--wb"
                                onmousemove="showInfoProduct('haircare-3')">Kem Ủ</a></li>
                        <li class="group__item"><a href="" class="group__link link__pc--wb"
                                onmousemove="showInfoProduct()">Dầu
                                Xả</a></li>
                        <li class="group__item"><a href="" class="group__link link__pc--wb"
                                onmousemove="showInfoProduct()">Nước
                                Dưỡng Tóc</a></li>
                        <li class="group__item"><a href="" class="group__link link__pc--wb"
                                onmousemove="showInfoProduct()">Tinh
                                Chất Dưỡng Tóc</a></li>
                    </ul>
                </div>

                <!-- Bath & Body Care -->
                <div class="group__second--content" id="bath-bodycare">
                    <p class="group__title--p">Tắm & Dưỡng thể</p>
                    <ul class="group__list" id="bath-bodycare-list">
                        <li class="group__item"><a href="" class="group__link link__pc--wb">Tất Cả</a></li>
                        <li class="group__item"><a href="" class="group__link link__pc--wb">Tẩy Da Chết Cơ Thể</a>
                        </li>
                        <li class="group__item"><a href="" class="group__link link__pc--wb">Sữa Tắm</a></li>
                        <li class="group__item"><a href="" class="group__link link__pc--wb">Xịt Cơ Thể</a></li>
                        <li class="group__item"><a href="" class="group__link link__pc--wb">Dưỡng Thể</a></li>
                    </ul>
                </div>

                <!-- Lip Balm -->
                <div class="group__second--content" id="lip-balm">
                    <p class="group__title--p">Dưỡng môi</p>
                    <ul class="group__list" id="lip-balm-list">
                        <li class="group__item"><a href="" class="group__link link__pc--wb">Tất Cả</a></li>
                        <li class="group__item"><a href="" class="group__link link__pc--wb">Tẩy Da Chết Môi</a></li>
                        <li class="group__item"><a href="" class="group__link link__pc--wb">Dưỡng Ẩm Môi</a></li>
                    </ul>
                </div>

                <!-- ComBo -->
                <div class="group__second--content" id="combo">
                    <p class="group__title--p">Combo</p>
                    <ul class="group__list" id="combo-list">
                        <li class="group__item"><a href="" class="group__link link__pc--wb">Tất Cả</a></li>
                        <li class="group__item"><a href="" class="group__link link__pc--wb">Chăm Sóc Da Mặt</a></li>
                        <li class="group__item"><a href="" class="group__link link__pc--wb">Chăm Sóc Cơ Thể</a></li>
                        <li class="group__item"><a href="" class="group__link link__pc--wb">Chăm Sóc Tóc</a></li>
                        <li class="group__item"><a href="" class="group__link link__pc--wb">Chăm Sóc Môi</a></li>
                    </ul>
                </div>

                <!-- Skin Problem -->
                <div class="group__second--content" id="skin-problem">
                    <p class="group__title--p">Vấn đề về da</p>
                    <ul class="group__list" id="skin-problem-list">
                        <li class="group__item"><a href="" class="group__link link__pc--wb">Tất Cả</a></li>
                        <li class="group__item"><a href="" class="group__link link__pc--wb">Da Khô</a></li>
                        <li class="group__item"><a href="" class="group__link link__pc--wb">Da Dầu Mụn</a></li>
                        <li class="group__item"><a href="" class="group__link link__pc--wb">Da Nhạy Cảm</a></li>
                        <li class="group__item"><a href="" class="group__link link__pc--wb">Da Xỉn Màu</a></li>
                    </ul>
                </div>
                <!-- Hair Problem -->
                <div class="group__second--content" id="hair-problem">
                    <p class="group__title--p">Vấn đề về tóc</p>
                    <ul class="group__list" id="hair-problem-list">
                        <li class="group__item"><a href="" class="group__link link__pc--wb">Tất Cả</a></li>
                        <li class="group__item"><a href="" class="group__link link__pc--wb">Tóc Khô, Xơ</a></li>
                        <li class="group__item"><a href="" class="group__link link__pc--wb">Rụng Tóc</a></li>
                    </ul>
                </div>
                <!-- Find Ingredient -->
                <div class="group__second--content" id="find-ingredient">
                    <p class="group__title--p">Tìm hiểu Nguyên Liệu</p>
                    <ul class="group__list" id="ingredient-list">
                        <li class="group__item"><a href="" class="group__link link__pc--wb">Tất Cả</a></li>
                        <li class="group__item"><a href="" class="group__link link__pc--wb">Bí Đao</a></li>
                        <li class="group__item"><a href="" class="group__link link__pc--wb">Hoa Hồng Cao Bằng</a></li>
                        <li class="group__item"><a href="" class="group__link link__pc--wb">Nghệ Hưng Yên</a></li>
                        <li class="group__item"><a href="" class="group__link link__pc--wb">Cà Phê Đắk Lắk</a></li>
                        <li class="group__item"><a href="" class="group__link link__pc--wb">Vỏ Bưởi</a></li>
                        <li class="group__item"><a href="" class="group__link link__pc--wb">Dầu Dừa Bến Tre</a></li>
                    </ul>
                </div>
            </div>
            <!-- CATEGORY PRODUCT - SECOND SIDEBAR: END -->

            <!-- SHOW PRODUCT - THIRD SIDEBAR: START -->
            <div class="group__third--sidebar side-bar-third" id="third-sidebar">

                <!-- SKINCARE PRODUCT: START-->
                <div class="group__third--content group__background" id="skincare-1">
                    <img src="../../public/img/backgroundda.png" alt="">
                </div>
                <!-- CHONG NANG -->

                <div class="group__third--content" id="skincare-2">
                    <p class="group__title--third">Chống Nắng</p>
                    <ul class="group__product--list" id="skincare-2-list">
                        <li class="group__product--item">
                            <a href="" class="group__product--link link__pc--wb">
                                <div class="group__info--product">
                                    <div class="group__name--product">Sữa chống nắng bí đao 50ml</div>
                                    <div class="group__describe--product">Chống nắng, bảo vệ da trước các tia UV</div>
                                    <div class="group__price--product">395.000 đ</div>
                                </div>
                                <img src="../../public/img/suachongnang50ml.png" alt="">
                            </a>
                        </li>

                        <li class="group__product--item">
                            <a href="" class="group__product--link link__pc--wb">
                                <div class="group__info--product">
                                    <div class="group__name--product">Sữa chống nắng bí đao 50ml</div>
                                    <div class="group__describe--product">Chống nắng, bảo vệ da trước các tia UV</div>
                                    <div class="group__price--product">155.000 đ</div>
                                </div>
                                <img src="../../public/img/suachongnang15ml.png" alt="">
                            </a>
                        </li>

                        <li class="group__product--item">
                            <a href="" class="group__product--link link__pc--wb">
                                <div class="group__info--product">
                                    <div class="group__name--product">Kem chống nắng bí đao 50ml</div>
                                    <div class="group__describe--product">Chống nắng, bảo vệ da trước các tia UV</div>
                                    <div class="group__price--product">395.000 đ</div>
                                </div>
                                <img src="../../public/img/kemchongnang50ml.png" alt="">
                            </a>
                        </li>
                    </ul>
                </div>

                <!-- TAY TRANG -->
                <div class="group__third--content" id="skincare-3">
                    <p class="group__title--third">Tẩy Trang</p>
                    <ul class="group__product--list" id="skincare-3-list">
                        <li class="group__product--item">
                            <a href="" class="group__product--link link__pc--wb">
                                <div class="group__info--product">
                                    <div class="group__name--product">Nước tẩy trang hoa hồng 140ml</div>
                                    <div class="group__describe--product">Làm sạch sâu và cấp ẩm</div>
                                    <div class="group__price--product">155.000 đ</div>
                                </div>
                                <img src="../../public/img/nuocduongtoc14ml.png" alt="">
                            </a>
                        </li>

                        <li class="group__product--item">
                            <a href="" class="group__product--link link__pc--wb">
                                <div class="group__info--product">
                                    <div class="group__name--product">Nước tẩy trang hoa hồng 310ml</div>
                                    <div class="group__describe--product">Làm sạch sâu và cấp ẩm</div>
                                    <div class="group__price--product">245.000 đ</div>
                                </div>
                                <img src="../../public/img/nuoctaytrang310ml.png" alt="">
                            </a>
                        </li>

                        <li class="group__product--item">
                            <a href="" class="group__product--link link__pc--wb">
                                <div class="group__info--product">
                                    <div class="group__name--product">Dầu tẩy trang hoa hồng 140ml</div>
                                    <div class="group__describe--product">Làm sạch sâu và dưỡng ẩm</div>
                                    <div class="group__price--product">180.000 đ</div>
                                </div>
                                <img src="../../public/img/dautaytrang140ml.png" alt="">
                            </a>
                        </li>
                    </ul>
                </div>

                <!-- SUA RUA MAT -->
                <div class="group__third--content" id="skincare-4">
                    <p class="group__title--third">Chống nắng</p>
                    <ul class="group__product--list" id="skincare-4-list">
                        <li class="group__product--item">
                            <a href="" class="group__product--link link__pc--wb">
                                <div class="group__info--product">
                                    <div class="group__name--product">Gel rửa mặt cà phê Đắk Lắk 140ml</div>
                                    <div class="group__describe--product">Cho làn da mềm mại và rạng rỡ</div>
                                    <div class="group__price--product">195.000 đ</div>
                                </div>
                                <img src="../../public/img/gelruamat140ml.png" alt="">
                            </a>
                        </li>

                        <li class="group__product--item">
                            <a href="" class="group__product--link link__pc--wb">
                                <div class="group__info--product">
                                    <div class="group__name--product">Sữa rửa mặt nghệ Hưng Yên 140ml</div>
                                    <div class="group__describe--product">Da sạch mịn và rạng rỡ</div>
                                    <div class="group__price--product">195.000 đ</div>
                                </div>
                                <img src="../../public/img/suaruamatHungYen140ml.png" alt="">
                            </a>
                        </li>

                        <li class="group__product--item">
                            <a href="" class="group__product--link link__pc--wb">
                                <div class="group__info--product">
                                    <div class="group__name--product">Gel rửa mặt hoa hồng 140ml
                                    </div>
                                    <div class="group__describe--product">Làm sạch và cấp ẩm</div>
                                    <div class="group__price--product">195.000 đ</div>
                                </div>
                                <img src="../../public/img/gelruamathoahong140ml.png" alt="">
                            </a>
                        </li>
                    </ul>
                </div>

                <!-- TAY DA CHET MAT -->
                <div class="group__third--content" id="skincare-5">
                    <p class="group__title--third">Tẩy Da Chết Mặt</p>
                    <ul class="group__product--list" id="skincare-5-list">
                        <li class="group__product--item">
                            <a href="../../app/view/single-product.php?productID=21" class="group__product--link link__pc--wb">
                                <div class="group__info--product">
                                    <div class="group__name--product">Cà phê Đắk Lắk làm sạch da chết mặt 150ml</div>
                                    <div class="group__describe--product">Cho làn da mềm mại và rạng rỡ</div>
                                    <div class="group__price--product">165.000 đ</div>
                                </div>
                                <img src="../../public/img/taydachetcapheDakLak150ml.png" alt="">
                            </a>
                        </li>
                    </ul>
                </div>

                <!-- MAT NA -->
                <div class="group__third--content" id="skincare-6">
                    <p class="group__title--third">Mặt Nạ</p>
                    <ul class="group__product--list" id="skincare-6-list">
                        <li class="group__product--item">
                            <a href="" class="group__product--link link__pc--wb">
                                <div class="group__info--product">
                                    <div class="group__name--product">Mặt nạ bí đao 100ml</div>
                                    <div class="group__describe--product">Giảm dầu và mụn</div>
                                    <div class="group__price--product">345.000 đ</div>
                                </div>
                                <img src="../../public/img/matnabidao30ml.png" alt="">
                            </a>
                        </li>

                        <li class="group__product--item">
                            <a href="" class="group__product--link link__pc--wb">
                                <div class="group__info--product">
                                    <div class="group__name--product">Mặt nạ bí đao 30ml</div>
                                    <div class="group__describe--product">Giảm dầu và mụn</div>
                                    <div class="group__price--product">145.000 đ</div>
                                </div>
                                <img src="../../public/img/matnabidao30ml.png" alt="">
                            </a>
                        </li>

                        <li class="group__product--item">
                            <a href="" class="group__product--link link__pc--wb">
                                <div class="group__info--product">
                                    <div class="group__name--product">Mặt nạ hoa hồng 30ml</div>
                                    <div class="group__describe--product">Cấp ẩm và làm mềm da</div>
                                    <div class="group__price--product">145.000 đ</div>
                                </div>
                                <img src="../../public/img/matnahoahong100ml.png" alt="">
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- SKINCARE PRODUCT: END-->

                <!-- HAIRCARE PRODUCT: START-->
                <div class="group__third--content group__background" id="haircare-1">
                    <img src="../../public/img/backgroundtoc.png" alt="">
                </div>
                <!-- DAU GOI -->
                <div class="group__third--content" id="haircare-2">
                    <p class="group__title--third">Dầu Gội</p>
                    <ul class="group__product--list" id="haircare-2-list">
                        <li class="group__product--item">
                            <a href="" class="group__product--link link__pc--wb">
                                <div class="group__info--product">
                                    <div class="group__name--product">Dầu gội bưởi không sulfate 310ml</div>
                                    <div class="group__describe--product">Giảm gãy rụng và làm mềm tóc</div>
                                    <div class="group__price--product"> 245.000 đ</div>
                                </div>
                                <img src="../../public/img/daugoibuoi310ml.png" alt="">
                            </a>
                        </li>

                        <li class="group__product--item">
                            <a href="" class="group__product--link link__pc--wb">
                                <div class="group__info--product">
                                    <div class="group__name--product">Dầu gội bưởi không sulfate 310ml</div>
                                    <div class="group__describe--product">Giảm gãy rụng và làm mềm tóc</div>
                                    <div class="group__price--product"> 245.000 đ</div>
                                </div>
                                <img src="../../public/img/daugoibuoi500ml.png" alt="">
                            </a>
                        </li>

                        <li class="group__product--item">
                            <a href="" class="group__product--link link__pc--wb">
                                <div class="group__info--product">
                                    <div class="group__name--product">Dầu gội bưởi refill không sulfate 500ml</div>
                                    <div class="group__describe--product">Giảm gãy rụng và làm mềm tóc</div>
                                    <div class="group__price--product">355.000 đ</div>
                                </div>
                                <img src="../../public/img/daugoibuoirefill500ml.png" alt="">
                            </a>
                        </li>
                    </ul>
                </div>

                <!-- KEM U -->
                <div class="group__third--content" id="haircare-3">
                    <p class="group__title--third">Kem Ủ</p>
                    <ul class="group__product--list" id="haircare-3-list">
                        <li class="group__product--item">
                            <a href="" class="group__product--link link__pc--wb">
                                <div class="group__info--product">
                                    <div class="group__name--product">Kem ủ tóc bưởi 200ml</div>
                                    <div class="group__describe--product">Giảm gãy rụng và làm mềm tóc</div>
                                    <div class="group__price--product"> 215.000 đ</div>
                                </div>
                                <img src="../../public/img/kemu200ml.png" alt="">
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- HAIRCARE PRODUCT - SIDEBAR THIRD: END-->

            </div>
            <!-- SHOW PRODUCT - THIRD SIDEBAR: END -->

            <!-- DISCOUNT: START -->
            <div class="discount side-bar" id="discount">
                <i data-feather="x" class="close__discount close-sample" id="close-discount"></i>
                <p class="group__title--p">Discount</p>
                <ul class="discount__list" id="discount-list">
                    <li class="discount__item"><a href="" class="discount__link link__pc--wb">Cà phê Đắk Lắk nguyên
                            chất
                            từng hạt</a></li>
                </ul>
            </div>
            <!-- DISCOUNT: END -->

            <!-- COSMETIC: START -->
            <div class="cosmetic side-bar" id="cosmetic">
                <i data-feather="x" class="close__cosmetic close-sample" id="close-cosmetic"></i>
                <p class="group__title--p">Cosmetic</p>
                <ul class="cosmetic__list" id="cosmetic-list">
                    <li class="cosmetic__item"><a href="" class="cosmetic__link link__pc--wb">Câu chuyện thương
                            hiệu</a>
                    </li>
                    <li class="cosmetic__item"><a href="" class="cosmetic__link link__pc--wb">Giá trị cốt lõi</a>
                    </li>
                    <li class="cosmetic__item"><a href="" class="cosmetic__link link__pc--wb">Trách nhiệm cộng
                            đồng</a>
                    </li>
                </ul>
            </div>
            <!-- COSMETIC: END -->

            <!-- CART: END -->
            <div class="cart side-bar-right divMainCart" id="cart" style="margin: 20px; padding: 20px">
                <i data-feather="x" class="close__cart close-sample" id="close-cart"></i>
                <!-- <div class="cart-empty__body">
                    <div class="title link__pc--wb">OOPSS</div>
                    <div class="message link__pc--wb">Giỏ hàng hiện đang trống <br>
                        Không có sản phẩm nào trong <br>
                        giỏ của bạn
                    </div>
                    <a href="" class="button">TIẾP TỤC MUA SẮM</a>
                </div>
                <div>
                    <table class="single-product-cart " style="width:100%;">
                        <thead class="text-muted">
                            <tr>
                                <th scope="col" width="20%"></th>
                                <th scope="col" width="60%"></th>
                                <th scope="col" width="20%" class="text-right"> </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="tr-cart">
                                <td><img class="img-cart" src="../../public/img/daugoibuoi500ml.png"
                                        alt="dau goi dau buoi"></td>
                                <td>
                                    <div class="cart-name">
                                        <p>Nước dưỡng tóc tinh dầu bưởi phiên bản nâng cấp 500ml</p>
                                    </div>
                                    <div class="cart__quantity">
                                        <button class="btn cart-btn" onclick="decreaseQuantity('quantity1')">-</button>
                                        <input class="cart-quantity" type="text" id="quantity1" value="1" readonly>
                                        <button class="btn cart-btn" onclick="increaseQuantity('quantity1')">+</button>
                                    </div>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-block cart-btn" id="btnCreate">X</button>
                                    <div>155.000 đ</div>
                                </td>
                            </tr>
                            <tr class="tr-cart">
                                <td><img class="img-cart" src="../../public/img/daugoibuoi500ml.png"
                                        alt="dau goi dau buoi"></td>
                                <td>
                                    <div class="cart-name">
                                        <p>Nước dưỡng tóc tinh dầu bưởi phiên bản nâng cấp 500ml</p>
                                    </div>
                                    <div class="cart__quantity">
                                        <button class="btn cart-btn" onclick="decreaseQuantity('quantity1')">-</button>
                                        <input class="cart-quantity" type="text" id="quantity1" value="1" readonly>
                                        <button class="btn cart-btn" onclick="increaseQuantity('quantity1')">+</button>
                                    </div>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-block cart-btn" id="btn-cancel">X</button>
                                    <div>155.000 đ</div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>-->
            </div>
            <!-- CART: END -->

        </header>
        <!-- HEADER PC: END -->

        <!-- CONTACT: START -->
        <div class="contact side-bar-center" id="contact">

            <i data-feather="x" class="close__contact close-sample" id="close-contact"></i>
            <div class="contact__container">
                <div class="contact__title">Liên hệ với The Cosmetic Scrupts</div>
                <div class="contact__col">
                    <div>
                        <div>

                            <input type="text" class="contact__name group__input" required="required" name="nameContact"
                                id="nameContact" placeholder="Tên của bạn*" tabindex="1" autocomplete="off">
                        </div>
                        <span data-v-00568c7a class="group__status">Vui lòng nhập tên của bạn!</span>
                    </div>
                    <div>
                        <div>
                            <input type="tel" class="contact__tel group__input" required="required" name="telContact"
                                id="telContact" placeholder="Số điện thoại*" tabindex="1" autocomplete="off">
                        </div>
                        <span data-v-00568c7a class="group__status">Vui lòng nhập số điện thoại hợp lệ!</span>
                    </div>
                </div>
                <div>
                    <div>
                        <input type="email" class="contact__email group__input" required="required" name="emailContact"
                            id="emailContact" placeholder="Địa chỉ Email*" tabindex="1" autocomplete="off">
                    </div>
                    <span data-v-00568c7a class="group__status">Vui lòng nhập email hợp lệ!</span>
                </div>
                <div>
                    <div>
                        <input type="text" class="contact__question group__input" required="required"
                            name="questionContact" id="questionContact" placeholder="Nhập câu hỏi của bạn*"
                            tabindex="1" autocomplete="off">
                    </div>
                    <span data-v-00568c7a class="group__status">Vui lòng nhập câu hỏi!</span>
                </div>
                <div class="sign-up__btn">
                    <button type="submit" class="btnSend button" id="btnSend">GỬI COSMETIC</button>
                </div>

            </div>
        </div>
        <!-- CONTACT: END -->

        <!-- LOGIN: START -->
        <form action="../controller/login-controller.php" method="post" class="login side-bar-center" id="login">
            <i data-feather="x" class="close__login close-sample" id="close-login"></i>
            <div class="login__container">
                <div class="d-flex justify-content-between align-content-center">
                    <p class="group__title">Đăng nhập</p>
                </div>
                <p class="heading">The Cosmetic chào bạn quay trở lại.</p>
                <div class="dk-tai-khoan d-flex">
                    <p style="opacity: 50%; font-size: 14px;">Bạn chưa có tài khoản?</p>
                    <a class="tao-tk" id="btn-sign-up" onclick="onRight()" href="#">Tạo tài khoản</a>
                </div>
                <div class="d-flex login-tai-khoan">
                    <p class="icon ti-user"></p>
                    <input data-v-00568c7a="" name="phone" placeholder="Nhập số điện thoại" type="tel"
                        class="login__input" pattern="((\+84)|0)+(9|3|7|8|5)+([0-9]{8})\b" required="required"
                        tabindex="1" id="phone">
                    <span class="error-message" id="phoneError"></span>
                </div>
                <p class="note-pass mb-5">Vui lòng nhập số điện thoại hợp lệ!</p>

                <!-- <div class="d-flex login-tai-khoan">
                <p class="icon ti-lock"></p>
                <input data-v-00568c7a="" name="password" placeholder="Nhập mật khẩu" type="" class="login__input"
                    pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required="required" minlength="8" tabindex="1"
                    id="login-pass">
                <span class="error-message" id="passError"></span>
            </div> -->

                <div class="d-flex login-tai-khoan">
                    <p class="icon ti-lock"></p>
                    <input data-v-00568c7a="" name="password" placeholder="Nhập mật khẩu" type="password"
                        class="login__input" id="password" tabindex="1">
                    <span class="error-message" id="passError"></span>
                </div>

                <p class="note-pass">Vui lòng nhập mật khẩu có ít nhất 8 ký tự, ít nhất 1 ký tự hoa, 1 ký tự thường và 1
                    số!</p>
                <a href="#" class="quen-mk mb-3">Quên mật khẩu?</a>
                <div class="d-flex ghi-nho-mat-khau ">
                    <input type="checkbox" tabindex="1" class="checkbox bg-primary-yellow border-transparent">
                    <p class="m-0  p-lg-2">Ghi nhớ mật khẩu cho lần sau</p>
                </div>
                <button type="submit" class="dang-nhap">ĐĂNG NHẬP</button>
                <div class="dn-khac mt-4 d-flex justify-content-between">
                    <p style="font-size: 16px; color: #414548" class="">Hoặc đăng nhập bằng</p>
                    <div class="icon-dn-khac">
                        <a href="" class="dn-khac-item ti-facebook ml-2"></a>
                        <a href="" class="dn-khac-item ti-apple ml-2"></a>
                        <a href="" class="dn-khac-item ti-google"></a>
                    </div>
                </div>
            </div>
        </form>
        <!-- LOGIN: END -->

        <!-- SIGN UP: START -->
        <div class="sign-up" id="sign-up">

            <i data-feather="x" class="close__sign-up close-sample" id="close-sign-up"></i>
            <div class="sign-up__container">
                <div class="group__title">Đăng ký tài khoản</div>
                <p>Chào mừng bạn đến với The Cosmetic Scrupts!!! </p>
                <div class="input__container">
                    <i data-feather="user" class="input__icon"></i>
                    <input type="text" class="sign-up__input" required="required" name="full_name" id="full_name"
                        placeholder="Tên của bạn*" tabindex="1">
                </div>

                <div class="input__container">
                    <i data-feather="mail" class="input__icon"></i>
                    <input type="email" class="sign-up__input" required="required" name="email" id="email"
                        placeholder="Email của bạn*" tabindex="1">
                </div>

                <div class="input__container">
                    <i data-feather="phone" class="input__icon"></i>
                    <input type="tel" class="sign-up__input" required="required" name="phone" id="tel"
                        placeholder="Số điện thoại*" tabindex="1">
                </div>

                <div class="input__container">
                    <i data-feather="lock" class="input__icon"></i>
                    <input type="password" class="sign-up__input" required="required" name="password" id="pass"
                        placeholder="Nhập mật khẩu*" tabindex="1">
                </div>

                <div class="input__container">
                    <i data-feather="lock" class="input__icon"></i>
                    <input type="password" class="sign-up__input " required="required" name="confirm_pass"
                        id="confirm_pass" placeholder="Nhập lại mật khẩu*" tabindex="1">
                </div>

                <div class="sign-up__btn">
                    <button type="submit" class="btnSignUp button" id="btnSignUp">ĐĂNG KÝ</button>
                </div>
            </div>
        </div>

        <!-- SIGN UP: END -->

        <!-- TABLE ANNOUNCE -->
        <div class="announce" id="announce">
            <p id="message__announce" style="font-size: 22px; font-family: 'Roboto'; font-weight: 500;"></p>
            <button class="btnOK button" id="btnOK">OK</button>
        </div>
        <!-- HEADER MOBILE: START -->
        <header class="header__mobile">
            <div class="banner">Tận hưởng giao hàng toàn quốc với hóa đơn 99.000 đ +</div>
            <nav class="navigation">
                <div class="nav__list--menu" id="nav-list-menu">
                    <ul id="nav-list-content">
                        <li class="navigation__item"><i data-feather="x" class="close__menu" id="close-menu"></i></li>
                        <li class="navigation__item">
                            <!-- PRODUCT MOBILE: START -->
                            <div class="product__mobile" id="product-mobile">
                                <div class="product__mobile--category">
                                    <p class="group__title--mobile" id="btn-product-mobile">Sản phẩm</p>
                                    <ul class="product-list-mobile" id="product-list-mobile">
                                        <li class="group__item--mobile">
                                            <a class="group__link--mobile btn__wb">Sản Phẩm Mới</a>
                                        </li>
                                        <li class="group__item--mobile">
                                            <a class="group__link--mobile btn__wb">Chăm Sóc Da</a>
                                        </li>
                                        <li class="group__item--mobile">
                                            <a class="group__link--mobile btn__wb">Chăm Sóc Tóc</a>
                                        </li>
                                        <li class="group__item--mobile">
                                            <a class="group__link--mobile btn__wb">Tắm & Dưỡng Thể</a>
                                        </li>
                                        <li class="group__item--mobile">
                                            <a class="group__link--mobile btn__wb">Dưỡng Môi</a>
                                        </li>
                                        <li class="group__item--mobile">
                                            <a class="group__link--mobile btn__wb">Combo / Bộ Sản Phẩm</a>
                                        </li>
                                    </ul>
                                </div>

                                <!-- RELATED PRODUCT MOBILE: START -->
                                <div>
                                    <p class="group__title--mobile" id="btn-product-related">Có thể bạn quan tâm</p>
                                    <ul class="product__related--mobile" id="product-related-mobile">
                                        <li class="group__item--mobile"><button type="button"
                                                class="group__link--mobile btn__wb">Vấn
                                                Đề Về Tóc</button></li>
                                        <li class="group__item--mobile"><button type="button"
                                                class="group__link--mobile btn__wb">Vấn
                                                Đề Về Da</button></li>
                                    </ul>
                                </div>
                                <!-- RELATED PRODUCT MOBILE: END -->
                                <div>
                                    <ul>
                                        <li class="group__item--mobile">
                                            <button type="button" style="margin-left: 2px;"
                                                class="group__title--mobile navigation__link btn__wb">Tìm hiểu nguyên
                                                liệu</button>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <!-- PRODUCT MOBILE:END -->
                        </li>
                        <li class="navigation__item">
                            <div>
                                <p class="group__title--mobile" id="btn-discount-mobile">Khuyến Mãi</p>
                                <ul class="discount__mobile" id="discount-mobile">
                                    <li class="group__item--mobile">
                                        <a href="" class="group__link--mobile btn__wb">
                                            Cà phê Đắk Lắk nguyên chất từng hạt
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="navigation__item">
                            <div>
                                <p class="group__title--mobile" id="btn-cosmetic-mobile">Cosmetic</p>
                                <ul class="cosmetic__mobile" id="cosmetic-mobile">
                                    <li class="group__item--mobile">
                                        <a href="" class="group__link--mobile btn__wb">
                                            Câu chuyện thương hiệu
                                        </a>
                                    </li>
                                    <li class="group__item--mobile">
                                        <a href="" class="group__link--mobile btn__wb">
                                            Giá trị cốt lõi
                                        </a>
                                    </li>
                                    <li class="group__item--mobile">
                                        <a href="" class="group__link--mobile btn__wb">
                                            Trách nhiệm cộng đồng
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="navigation__item"><a href="" class="link-mobile group__title--mobile">Bài viết</a>
                        </li>
                        <li class="navigation__item"><button type="button" onclick="onLeft()"
                                class="navigation__link btn__wb group__title--mobile" id="btn-contact-mobile">Liên hệ
                                <i data-feather="arrow-right" class="contact__icon"></i> </button></li>
                        <li class="navigation__item"><button type="button" onclick="onLeft()"
                                class="navigation__link btn__wb group__title--mobile" id="btn">EN</button></li>
                    </ul>
                    <div><i data-feather="user" class="login__mobile" id="btn-login-mobile"></i></div>
                </div>
                <i data-feather="menu" class="open__menu" id="open-menu"></i>
                <div class="navigation__logo"><img src="../../public/img/logo.png" alt=""></div>

                <ul class="navigation__list--mobile">
                    <li class="navigation__item"><a href="../../app/view/search.php" class="navigation__link btn__wb"><i
                                data-feather="search" id="search-menu"></i></a></li>
                    <li class="navigation__item"><button type="button" class="navigation__link btn__wb" id="btn"><i
                                data-feather="shopping-bag" id="cart-id"></i></button></li>
                </ul>
            </nav>
        </header>
        <!-- HEADER MOBILE: END -->

    </div>
    <div class="empty__header"></div>
</body>
<!-- cart on load -->
<script>
    $(document).ready(function () {
        // Thực hiện yêu cầu AJAX khi trang được tải
        $.get("../../app/controller/cart-controller.php?action=load", function (data, status) {
            console.log("Response data:", data);
            $(".divMainCart").html(data);
        });
    });
</script>
<!-- SCRIPT -->
<!-- AJAX CONTACT: START -->
<script>
    $(document).ready(function () {
        $("#btnSend").click(function () {
            var announce = document.getElementById('announce');
            announce.classList.add('show__announce');
            var contact = document.getElementById('contact');
            contact.classList.remove('show-contact');

            var nameContact = $("#nameContact").val();
            var telContact = $("#telContact").val();
            var emailContact = $("#emailContact").val();
            var questionContact = $("#questionContact").val();

            var requestData = {
                nameContact: nameContact,
                telContact: telContact,
                emailContact: emailContact,
                questionContact: questionContact
            };
            $.ajax({
                method: "POST",
                url: "../../app/controller/insert-contact-controller.php",
                data: requestData,
                success: function (notification) {
                    // Cập nhật thông báo phản hồi
                    $("#message__announce").html(notification);
                }
            });
            $("#btnOK").click(function () {
                announce.classList.remove('show__announce');
                overlayRight.style.display = 'none';
            });
        });

    });
</script>
<!-- AJAX CONTACT: END -->

<!-- AJAX SIGN UP: START -->
<script>
    $(document).ready(function () {
        $("#btnSignUp").click(function () {
            var announce = document.getElementById('announce');
            announce.classList.add('show__announce');
            var signUp = document.getElementById('sign-up');
            signUp.classList.remove('show-sign-up');
            signUp.style.display = 'none';

            var phone = $("#tel").val();
            var password = $("#pass").val();
            var confirm_password = $("#confirm_pass").val();
            var full_name = $("#full_name").val();
            var email = $("#email").val();

            var requestData = {
                tel: phone,
                full_name: full_name,
                email: email,
                pass: password,
                confirm_pass: confirm_password
            };
            $.ajax({
                method: "POST",
                url: "../../app/controller/register-controller.php",
                data: requestData,
                success: function (notification) {
                    // Cập nhật thông báo phản hồi
                    $("#message__announce").html(notification);
                }
            });
            $("#btnOK").click(function () {
                announce.classList.remove('show__announce');
                overlayRight.style.display = 'none';
            });
        });

    });
</script>
<!-- AJAX SIGN UP: END -->

<script>feather.replace()</script>
<script src="../../public/js/header.js"></script>

</html>