<!-- 
//ử dụng hàm header để thực hiện chuyển hướng
//header("Location: app/view/homepage.php");
//exit; 


//require_once 'app/config.php'; -->
<?php
// Kết nối đến cơ sở dữ liệu
require_once '/CosmeticWeb/config.php'; // Tạo kết nối trong config.php

// Nếu kết nối thành công, chuyển hướng người dùng đến trang homepage
header("Location: app/view/homepage.php");
exit; 
?>