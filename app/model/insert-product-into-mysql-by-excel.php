<?php
require '../../vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\IOFactory;

include 'connectdb.php';

$spreadsheet = IOFactory::load('../../database/product-database-in-excel.xlsx');
$sheet = $spreadsheet->getActiveSheet();
$data = $sheet->toArray();

for ($i = 1; $i < count($data); $i++) {
    $row = $data[$i];
    $productName = $conn->real_escape_string($row[0]);
    $description = $conn->real_escape_string($row[1]);
    $categoryId = (int) $row[2];
    $price = (float) $row[3];
    $imgLink = $conn->real_escape_string($row[4]);
    $soldQuantity = (int) $row[6];
    $stockQuantity = (int) $row[7];
    $discountPercentage = (float) $row[8];
    $discountStartDate = $row[9]; // Assuming discount_start_date is in a valid date format
    $discountEndDate = $row[10]; // Assuming discount_end_date is in a valid date format
    $statusProduct = (bool) $row[11];

    $sql = "INSERT INTO products (product_name, description, category_id, price, imgLink, sold_quantity, stock_quantity, discount_percentage, discount_start_date, discount_end_date, status_product)
            VALUES ('$productName', '$description', $categoryId, $price, '$imgLink', $soldQuantity, $stockQuantity, $discountPercentage, '$discountStartDate', '$discountEndDate', $statusProduct)";

    $conn->query($sql);
}

$conn->close();
?>