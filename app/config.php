<!-- /*$servername = getenv('DB_HOST');
$username = getenv('DB_USER');
$password = getenv('DB_PASSWORD');
$dbname = getenv('DB_NAME');

// Tạo kết nối
$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    echo "Kết nối thành công!";
}
?>
*/

<?php
// Lấy thông tin từ connection string đã cấu hình trong App Service
$servername = getenv('cosmeticphp');  // Thay 'MYSQLCONNSTR_web' bằng tên bạn đã đặt trong App Service
$connection_info = parse_url($servername);

// Tạo kết nối MySQL
$conn = new mysqli($connection_info['host'], $connection_info['user'], $connection_info['pass'], substr($connection_info['path'], 1));

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    echo "Kết nối thành công!";
}
?>
