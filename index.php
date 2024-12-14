<?php
// Đảm bảo không có bất kỳ dữ liệu nào xuất ra trước khi gọi header()

// Chuyển hướng người dùng đến trang homepage
header("Location: app/view/homepage.php");
exit;
?>
