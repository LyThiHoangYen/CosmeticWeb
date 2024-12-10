<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Style of homepage-->
    <link rel="stylesheet" href="../../public/css/style.css">

    <!-- include config and header -->
    <?php
    include '../../resources/head/head-config.php';

    include '../../resources/head/login-check.php';
    ?>
    
    <title>Home page</title>

</head>

<body>
    <div class="slider-full w-100">
        <div class="slider-item slider-item-1 ">
            <div class="slider-desc slider-desc-1">
                <div class="text-box">
                    <p class="sub-heading" style="font-size: 30px;">MUA 1 TẶNG 2</p>
                    <h1 class="heading" style="font-size: 72px;">Cà phê Đắk Lắk nguyên chất từng hạt</h1>
                    <p class="description" style="font-size: 16px; padding: 20px 0px 40px 0px">Cocoon tự hào là cầu nối
                        đưa những hạt cà phê 100% nguyên chất từ các nông trại Đắk Lắk đến với routine làm đẹp hàng ngày
                        của bạn. Tất cả những hạt cà phê Đắk Lắk được rang thô, xay nhuyễn và sàng lọc cẩn thận để giữ
                        trọn hàm lượng caffeine bên trong chúng nhằm giúp làn da trở nên khỏe khoắn và rạng rỡ. Hãy cùng
                        Cocoon khám phá và cảm nhận sự nguyên chất độc đáo này với ưu đãi Mua 1 Tặng 2 áp dụng từ
                        1-5/12</p>
                    <a href="" class="See-more">
                        <span class="btn_text">Xem thêm</span>
                        <span class="btn_icon fa-solid fa-arrow-right"></span>
                    </a>
                </div>
            </div>
            <div class="slider-img img-1" style="background-image: url('../../public/img/img_slider_1.jpg');"></div>
        </div>
        <div class="slider-item slider-item-2">
            <div class="slider-desc slider-desc-2">
                <div class="text-box">
                    <p class="sub-heading" style="font-size: 30px;">SẢN PHẨM MỚI</p>
                    <h1 class="heading" style="font-size: 72px;">Sữa chống nắng bí đao</h1>
                    <p class="description" style="font-size: 16px; padding: 20px 0px 40px 0px">Bảo vệ da trước tia UVA,
                        UVB và ánh sáng năng lượng cao nhìn thấy được. Với kết cấu không trọng lượng, lướt nhẹ, thấm
                        nhanh vào da mà không để lại vệt trắng và mang đến cảm giác thoải mái khi sử dụng.</p>
                    <a href="" class="See-more">
                        <span class="btn_text">Xem thêm</span>
                        <span class="btn_icon fa-solid fa-arrow-right"></span>
                    </a>
                </div>
            </div>
            <div class="slider-img img-2" style="background-image: url('../../public/img/img_slider_2.jpg');"></div>
        </div>
        <div class="slider-item slider-item-3 ">
            <div class="slider-desc slider-desc-3">
                <div class="text-box">
                    <p class="sub-heading" style="font-size: 30px;">ĐỔI VỎ CHAI ONLINE</p>
                    <h1 class="heading" style="font-size: 72px;">CÙNG THE COSMETIS SCRUPTS SỐNG XANH MỖI NGÀY</h1>
                    <p class="description" style="font-size: 16px; padding: 20px 0px 40px 0px">Cocoon luôn sẵn sàng nhận
                        vỏ chai cũ từ các bạn và trao đi các sản phẩm mới. Dù bạn ở bất cứ nơi đâu tại Việt Nam hãy cùng
                        tham gia đổi vỏ chai với Cocoon nhé.</p>
                    <a href="" class="See-more">
                        <span class="btn_text">XEM THÊM</span>
                        <span class="btn_icon fa-solid fa-arrow-right"></span>
                    </a>
                </div>
            </div>
            <div class="slider-img img-3" style="background-image: url('../../public/img/img_slider_3.jpg');"></div>
        </div>
        <div class="btn-next " style="position:absolute;">
            <div class="ti-angle-right" onclick="nextSlide()" style="color: rgb(241, 216, 216); font-size:30px; "></div>
        </div>
        <div class="btn-pre " onclick="prevSlide()" style="position:absolute;">
            <div class="ti-angle-left" style="color: rgb(241, 216, 216); font-size:30px; "></div>
        </div>
    </div>
    <div class="fit-body" style="--tw-bg-opacity: 1; background-color: rgba(254, 251, 244, var(--tw-bg-opacity));">
        <div class="ads-product animate-on-scroll "
            style="height: 45.0938vw; max-height: calc(100vh - (var(--promo-height) + var(--menu-height)));transition: transform 0.5s ease-out;">
            <div class="title-product">
                <br>
                Sữa chống nắng
                <br>
                Bí đao
            </div>
            <!-- -->
            <img src="../../public/img/index_New_product_1.png" alt=""
                class="product-img-1 product-img animate-on-scroll-milk" style="position: absolute;">
            <img src="../../public/img/index_New_product_2.png" alt=""
                class="product-img-2 product-img animate-on-scroll" style="position: absolute;">
            <img src="../../public/img/index_New_product_3.png" alt=""
                class="product-img-3 product-img animate-on-scroll" style="position: absolute;">
            <div class="product-desc w-100">
                <div class="right-text-box animate-on-scroll"
                    style=" width:30%; height:100%; float:right;font-size: 16px; transition: transform 0.5s ease-out;">

                    <p class="product-txt">Với diện mạo đột phá có hình dáng dẹp dẹp như một lát bí đao, sữa chống nắng
                        bí đao sẽ là món "trang sức" nhỏ gọn, tinh tế và không kém phần thời trang mà bạn sẽ luôn mang
                        theo bên mình, bôi lại bất cứ khi nào cần thiết. Bảo vệ da khỏi tác hại của tia UVB, UVA và HEV
                        với hiệu quả bảo vệ rất cao cùng finish ráo mịn rất tự nhiên, không bóng, không tạo vệt trắng
                        mất thẩm mỹ.</p>
                    <a href="" class="product-detail">
                        MUA NGAY
                        <i class="btn_icon fa-solid fa-arrow-right"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="banner-grand">
        <div class="banner-script">
            <p class="banner-heading" style="font-size: 60px; padding-bottom:30px;">Triết lý thương hiệu</p>
            <p class="banner-desc" style="font-size: 20px; padding-bottom:30px;">
                Là những người yêu thiên nhiên và đam mê khám phá các nguồn nguyên liệu đặc hữu của Việt Nam, chúng tôi
                luôn kiên định với những triết lý trên hành trình tìm vẻ đẹp thật sự của làn da.
            </p>
            <div class="banner-btn">
                <p class="btn-txt" style="margin:0;">TÌM HIỂU THÊM</p>
                <i class="btn_icon fa-solid fa-arrow-right"></i>
            </div>
        </div>
    </div>
    <marquee scrollamount="20" class="slogan">
        <div class="images-slogan">
            <div class="img-slogan">
                <img src="../../public/img/index_home_marquee.svg" alt="" class="slogan-img">
            </div>
            <div class="img-slogan">
                <img src="../../public/img/index_home_marquee.svg" alt="" class="slogan-img">
            </div>
            <div class="img-slogan">
                <img src="../../public/img/index_home_marquee.svg" alt="" class="slogan-img">
            </div>
        </div>
    </marquee>
    <div class="certificate">
        <p class="cer-title">CHỨNG NHẬN BỞI CÁC TỔ CHỨC QUỐC TẾ</p>
        <div class="cer-organs">
            <div class="cer-organs-item">
                <img src="../../public/img/index_cer_rabbit.svg" alt="" class="cer-img">
                <p class="cer-heading">Leaping Bunny</p>
                <p class="cer-subheading" style="font-weight: 600;">CHƯƠNG TRÌNH LEAPING BUNNY</p>
                <p class="cer-text">Chương trình Leaping Bunny của tổ chức Cruelty Free International được xem là "tiêu
                    chuẩn vàng" toàn cầu cho các sản phẩm không thử nghiệm trên động vật.</p>
            </div>
            <div class="cer-organs-item">
                <img src="../../public/img/index_cer_Vegan.svg" alt="" class="cer-img">
                <p class="cer-heading">The Vegan Society</p>
                <p class="cer-subheading" style="font-weight: 600;">HIỆP HỘI THUẦN CHAY QUỐC TẾ</p>
                <p class="cer-text">The Vegan Society (Hiệp hội thuần chay quốc tế) là một trong những chứng nhận uy tín
                    xác thực cho các sản phẩm không có thành phần từ động vật và không thử nghiệm trên động vật.</p>
            </div>
            <div class="cer-organs-item">
                <img src="../../public/img/index_cer_anima.svg" alt="" class="cer-img">
                <p class="cer-heading">PETA</p>
                <p class="cer-subheading" style="font-weight: 600;">ANIMAL TEST-FREE & VEGAN</p>
                <p class="cer-text">Chương trình Beauty Without Bunnies của tổ chức bảo vệ quyền lợi động vật toàn cầu
                    PETA là chương trình bảo vệ và cam kết không có sự tàn ác đối với động vật uy tín trên thế giới.</p>
            </div>
        </div>
    </div>
    <div class="ads-new-product">
        <a href="#" class="link-new">
            <img src="../../public/img/new_product.jpg" alt="" class="ads-new" style="object-fit: cover;">
        </a>
    </div>

    <div class="best-saler" style="padding-top: 150px;">
        <div class="best-saler-script" style="bottom: 0;">
            <p class="best-saler-heading">Sản phẩm</p>
            <p class="best-saler-heading">BÁN CHẠY</p>
            <p class="best-saler-text">Cocoon tự hào khi các sản phẩm mà chúng tôi tạo ra mang đến những thay đổi tuyệt
                vời trên làn da, mái tóc của bạn.</p>
        </div>

        <div class="best-saler-product">
            <div class="best-saler-product-item">
                <a href="#" class="bsl-item-link">
                    <img src="../../public/img/best-saler-11.jpg" alt="" class="bsl-item-img">
                </a>
                <div class="bsl-detail">
                    <div class="bsl-scipts">
                        <p class="bsl-item-heading" style="font-weight: 600; font-size:larger">Nước dưỡng tóc tình dầu
                            bưởi phiên bản nâng cấp 140ml </p>
                        <p class="bsl-item-txt" style="font-weight: 300;">GIẢM GÃY RỤNG VÀ LÀM MỀM TÓC </p>
                        <p class="bsl-item-price" style="font-size: 16px;">165.000 đ </p>
                    </div>
                    <i class="ti-shopping-cart"></i>
                </div>
            </div>
            <div class="best-saler-product-item">
                <a href="#" class="bsl-item-link">
                    <img src="../../public/img/best-saler-11.jpg" alt="" class="bsl-item-img">
                </a>
                <div class="bsl-detail">
                    <div class="bsl-scipts">
                        <p class="bsl-item-heading" style="font-weight: 600; font-size:larger">Nước dưỡng tóc tình dầu
                            bưởi phiên bản nâng cấp 140ml </p>
                        <p class="bsl-item-txt" style="font-weight: 300;">GIẢM GÃY RỤNG VÀ LÀM MỀM TÓC </p>
                        <p class="bsl-item-price" style="font-size: 16px;">165.000 đ </p>
                    </div>
                    <i class="ti-shopping-cart"></i>
                </div>
            </div>
            <div class="best-saler-product-item">
                <a href="#" class="bsl-item-link">
                    <img src="../../public/img/best-saler-11.jpg" alt="" class="bsl-item-img">
                </a>
                <div class="bsl-detail">
                    <div class="bsl-scipts">
                        <p class="bsl-item-heading" style="font-weight: 600; font-size:larger">Nước dưỡng tóc tình dầu
                            bưởi phiên bản nâng cấp 140ml </p>
                        <p class="bsl-item-txt" style="font-weight: 300;">GIẢM GÃY RỤNG VÀ LÀM MỀM TÓC </p>
                        <p class="bsl-item-price" style="font-size: 16px;">165.000 đ </p>
                    </div>
                    <i class="ti-shopping-cart"></i>
                </div>
            </div>

        </div>
    </div>
    <!--còn click slde-->
    <div class="ads-new-product" style="padding: 50px">
        <a href="#" class="link-new">
            <img src="../../public/img/index_banner_doivochai.jpg" alt="" class="ads-new" style="object-fit: cover;">
        </a>
    </div>
    <!--Câu chuyện quanh ta-->
    <div class="made-in">
        <div class="made-in-products">
            <div class="made-in-item">
                <a href="" class="img-made-in-link">
                    <img class="img-made-in" src="../../public/img/index_story_BenTre.jpg" alt="">
                </a>
                <p class="made-in-item-heading">DẦU DỪA BẾN TRE</p>
            </div>
            <div class="made-in-item">
                <a href="" class="img-made-in-link">
                    <img class="img-made-in" src="../../public/img/index_story_Bidao.jpg" alt="">
                </a>
                <p class="made-in-item-heading">BÍ ĐAO</p>
            </div>
            <div class="made-in-item">
                <a href="" class="img-made-in-link">
                    <img class="img-made-in" src="../../public/img/index_story_DakLak.jpg" alt="">
                </a>
                <p class="made-in-item-heading">ĐẮK LẮK</p>
            </div>
        </div>
        <div class="made-in-scripts">
            <div class="made-in-heading">
                <p style="margin: 0;">Câu chuyện</p>
                <p>NGUYÊN LIỆU</p>
            </div>
            <div class="made-in-txt">
                <p style="margin: 0;">"Hồn Việt trong chai"</p>
                <p>Chúng tôi viết nên câu chuyện về hoa trái đặc hữu của Việt Nam, rất gần gũi và quen thuộc từ tên gọi,
                    mùi hương và cả vùng đất sản sinh ra chúng.</p>
            </div>
            <a href="" class="btn-page-made-in">
                <p style="margin: 0;">TÌM HIỂU THÊM</p>
                <i class="ti-arrow-right"></i>
            </a>
        </div>
    </div>

    <!--Tin tứk-->
    <div class="story-telling">
        <div class="story-header">
            <p class="story-heading">Bài viết mới nhất</p>
            <a href="" class="all-story">
                <p style="margin: 0;">TẤT CẢ BÀI VIẾT</p>
                <div class="ti-arrow-right"></div>
            </a>
        </div>
        <div class="stories-select">
            <div class="story-item">
                <div class="img-div">
                    <img src="../../public/img/index_content_1.jpg" alt="" class="story-item-img">
                </div>
                <div class="story-date" style="padding: 10px 0">
                    <p class="poster-story">Cocoon</p>
                    <p class="date-posted">14.09.23</p>
                </div>
                <p class="story-item-heading">Cocoon trao tặng đến quỹ học bổng Viet Pride 50 triệu đồng</p>
                <p class="story-item-txt">Cocoon trân trọng trao tặng đến quỹ học bổng Viet Pride 5 suất học bổng với
                    tổng trị giá 50 triệu đồng. Hy vọng rằng, với chút đóng góp nhỏ bé, các bạn nhận được học</p>

            </div>

            <div class="story-item">
                <div class="img-div">
                    <img src="../../public/img/index_content_2.jpg" alt="" class="story-item-img">
                </div>
                <div class="story-date" style="padding: 10px 0">
                    <p class="poster-story">Cocoon</p>
                    <p class="date-posted">14.09.23</p>
                </div>
                <p class="story-item-heading">Cocoon x Suboi: Love Your Nature - Cứ tự nhiên đi</p>
                <p class="story-item-txt">Chúng tôi tôn trọng sự đa dạng và trân trọng sự khác biệt vì bản chất tự nhiên
                    của mỗi người là điều vô cùng độc đáo và quý giá. Cocoon & Suboi rất tự hào khi đặt</p>

            </div>

            <div class="story-item">
                <div class="img-div">
                    <img src="../../public/img/index_content_3.jpg" alt="" class="story-item-img">
                </div>
                <div class="story-date" style="padding: 10px 0">
                    <p class="poster-story">Cocoon</p>
                    <p class="date-posted">14.09.23</p>
                </div>
                <p class="story-item-heading">Chương trình " Thu hồi pin cũ - Bảo vệ trái đất xanh" năm 2023</p>
                <p class="story-item-txt">Từ ngày 5/5/2023, chương trình "Thu hồi pin cũ - Bảo vệ trái đất xanh" năm
                    2023 sẽ chính thức đi vào hoạt động tại TP.HCM & Hà Nội.</p>
            </div>
        </div>

    </div>

    <div class="achivement ">
        <div class="ACHIVE">
            <a href="" class="achive-1-link">
                “Cocoon Vietnam – Từ mầm xanh làm đẹp đến giải thưởng danh giá tại ELLE Beauty Awards 2021"
            </a>
            <p class="achive-name-paper">ELLE VIETNAM</p>
        </div>
        <div class="ACHIVE" style="display: none;">
            <a href="" class="achive-1-link">
                “Cocoon – Mỹ phẩm thuần chay cho nét đẹp thuần Việt”
            </a>
            <p class="achive-name-paper">ELLE VIETNAM</p>
        </div>
        <!--
               <div class="btn-next "  style="" >
                    <div class="ti-angle-right" onclick="nextSlideachive()"  style="color: rgb(241, 216, 216); font-size:30px; "></div>
                </div>
                <div class="btn-pre "  style="">
                    <div class="ti-angle-left" onclick="prevSlideachive()"style="color: rgb(241, 216, 216); font-size:30px; "></div>
                </div>
           -->

    </div>
    <script>
        let slideIndex = 0;

        function showSlide(index) {
            const slides = document.querySelectorAll('.slider-item');

            if (index >= slides.length) {
                slideIndex = 0;
            } else if (index < 0) {
                slideIndex = slides.length - 1;
            } else {
                slideIndex = index;
            }

            for (let i = 0; i < slides.length; i++) {
                slides[i].style.display = 'none';
            }

            slides[slideIndex].style.display = 'flex';
        }

        function nextSlide() {
            showSlide(slideIndex + 1);
        }

        function prevSlide() {
            showSlide(slideIndex - 1);
        }

        // Auto slide change every 3 seconds
        setInterval(nextSlide, 3000);

        // Show the first slide initially
        showSlide(slideIndex);

    </script>
    <script>
        let slideachieve = 0;

        function showSlideachive(index) {
            const slides = document.querySelectorAll('.ACHIVE');

            if (index >= slides.length) {
                slideachieve = 0;
            } else if (index < 0) {
                slideIndex = slides.length - 1;
            } else {
                slideachieve = index;
            }

            for (let i = 0; i < slides.length; i++) {
                slides[i].style.display = 'none';
            }

            slides[slideachieve].style.display = 'flex';
        }

        function nextSlideachive() {
            showSlideachive(slideachieve + 1);
        }

        function prevSlideachive() {
            showSlideachive(slideachieve + 1);
        }

        // Auto slide change every 3 seconds
        setInterval(nextSlideachive, 3000);

        // Show the first slide initially
        showSlide(slideachieve);
    </script>
    <script>
        let lastScrollTop = 0;

        window.addEventListener('scroll', () => {
            const animatedElement = document.querySelector('.animate-on-scroll');
            const animatedElement_1 = document.querySelector('.animate-on-scroll-milk');
            const st = window.pageYOffset || document.documentElement.scrollTop;

            if (st > lastScrollTop) {
                // Cuộn xuống
                animatedElement.style.transform = 'translateY(50px)';
                animatedElement_1.style.transform = 'translateY(0)';
            } else {
                // Cuộn lên
                animatedElement.style.transform = 'translateY(0)';
                animatedElement_1.style.transform = 'translateY(50px)';

            }

            lastScrollTop = st <= 0 ? 0 : st; // Đảm bảo giá trị không âm
        });
    </script>
</body>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="../../public/js/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<!-- <script src="../../public/js/bootstrap.min.js"></script> -->

<?php include '../../resources/includes/footer.php' ?>

</html>