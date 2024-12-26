<?php
// Lấy các giá trị từ các biến môi trường được cấu hình trong App Service
$host = getenv('DB_HOST');  // Ví dụ: cosmecticphp.mysql.database.azure.com
$username = getenv('DB_USERNAME');  // Ví dụ: cosmeticphp@cosmecticphp
$password = getenv('DB_PASSWORD');  // Ví dụ: 123456
$dbname = getenv('DB_DATABASE');  // Ví dụ: web
$ssl_ca = getenv('MYSQL_ATTR_SSL_CA');  // Cấu hình SSL nếu có

// Tạo kết nối với MySQL
$conn = new mysqli($host, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Thiết lập bộ mã hóa ký tự (tùy chọn)
$conn->set_charset("utf8");

// Kiểm tra lỗi cơ sở dữ liệu (tùy chọn)
if ($conn->errno) {
    die("Database error: " . $conn->error);
}

// Cấu hình SSL nếu cần (nếu bạn sử dụng SSL trong kết nối MySQL của Azure)
if (!empty($ssl_ca)) {
    $conn->ssl_set(NULL, NULL, $ssl_ca, NULL, NULL);
}

echo "Kết nối thành công!";
?>
