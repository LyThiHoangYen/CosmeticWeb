<?php
// Extract parameters
$productID = $_GET['id'];

include '../../model/connectdb.php';

$sql = "DELETE FROM products WHERE product_id = '" .$productID . "'";

$conn->query($sql);

$conn->close();

echo "Đã xoá sản phẩm có id = " .$productID ;

?>