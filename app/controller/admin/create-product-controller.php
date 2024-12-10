<?php
// Extract parameters
$productName = isset($_GET['productName']) ? $_GET['productName'] : '';
$price = isset($_GET['price']) ? $_GET['price'] : '';
$stockQuantity = isset($_GET['stockQuantity']) ? $_GET['stockQuantity'] : '';
$category = isset($_GET['category']) ? $_GET['category'] : '';
$imgLink = isset($_GET['imgLink']) ? $_GET['imgLink'] : '';
$discountPercentage = isset($_GET['discountPercentage']) ? $_GET['discountPercentage'] : '';
$discountStartDate = isset($_GET['discountStartDate']) ? $_GET['discountStartDate'] : '';
$discountEndDate = isset($_GET['discountEndDate']) ? $_GET['discountEndDate'] : '';
$description = isset($_GET['description']) ? $_GET['description'] : '';
$statusProduct = isset($_GET['statusProduct']) ? $_GET['statusProduct'] : 1; // Default to 1 if not set

include '../../model/connectdb.php';

// Prepare and execute SQL query with prepared statement
$stmt = $conn->prepare("INSERT INTO products (product_name, price, stock_quantity, imgLink, discount_percentage, discount_start_date, discount_end_date, description, category_id, status_product) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("sssssssssi", $productName, $price, $stockQuantity, $imgLink, $discountPercentage, $discountStartDate, $discountEndDate, $description, $category, $statusProduct);

if ($stmt->execute()) {
    echo "New record created successfully";
} else {
    echo "Error: " . $stmt->error;
}

// Close connection
$stmt->close();
$conn->close();
?>