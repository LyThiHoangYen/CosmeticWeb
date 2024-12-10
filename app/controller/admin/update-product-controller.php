<?php
// Extract parameters
$productID = $_GET['productID'];
// echo "$productID"; die();
$productName = isset($_GET['productName']) && !empty($_GET['productName']) ? $_GET['productName'] : null;
$price = isset($_GET['price']) && !empty($_GET['price']) ? $_GET['price'] : null;
$stockQuantity = isset($_GET['stockQuantity']) && !empty($_GET['stockQuantity']) ? $_GET['stockQuantity'] : null;
$category = isset($_GET['category']) && !empty($_GET['category']) ? $_GET['category'] : null;
$imgLink = isset($_GET['imgLink']) && !empty($_GET['imgLink']) ? $_GET['imgLink'] : null;
$discountPercentage = isset($_GET['discountPercentage']) && !empty($_GET['discountPercentage']) ? $_GET['discountPercentage'] : null;
$discountStartDate = isset($_GET['discountStartDate']) && !empty($_GET['discountStartDate']) ? $_GET['discountStartDate'] : null;
$discountEndDate = isset($_GET['discountEndDate']) && !empty($_GET['discountEndDate']) ? $_GET['discountEndDate'] : null;
$description = isset($_GET['description']) && !empty($_GET['description']) ? $_GET['description'] : null;
$statusProduct = isset($_GET['statusProduct']) && !empty($_GET['statusProduct']) ? $_GET['statusProduct'] : null;

include '../../model/connectdb.php';

if ($productName != null) {
    $sqlProductName = "UPDATE products SET product_name='" . $productName . "' WHERE product_id= '" . $productID . "' ";
    echo "$sqlProductName";
    if ($conn->query($sqlProductName) === TRUE) {
        echo "Product Name updated successfully<br>";
    } else {
        echo "Error updating Product Name: " . $conn->error . "<br>";
    }
}

if ($price != null) {
    $sqlPrice = "UPDATE products SET price=" . $price . " WHERE product_id= '" . $productID . "' ";

    if ($conn->query($sqlPrice) === TRUE) {
        echo "Price updated successfully<br>";
    } else {
        echo "Error updating Price: " . $conn->error . "<br>";
    }
}

if ($stockQuantity != null) {
    $sqlStockQuantity = "UPDATE products SET stock_quantity=" . $stockQuantity . " WHERE product_id= '" . $productID . "' ";

    if ($conn->query($sqlStockQuantity) === TRUE) {
        echo "Stock Quantity updated successfully<br>";
    } else {
        echo "Error updating Stock Quantity: " . $conn->error . "<br>";
    }
}

if ($category != null) {
    $sqlCategory = "UPDATE products SET category_id=" . $category . " WHERE product_id= '" . $productID . "' ";

    if ($conn->query($sqlCategory) === TRUE) {
        echo "Category updated successfully<br>";
    } else {
        echo "Error updating Category: " . $conn->error . "<br>";
    }
}

if ($imgLink != null) {
    $sqlImgLink = "UPDATE products SET imgLink='" . $imgLink . "' WHERE product_id= '" . $productID . "' ";

    if ($conn->query($sqlImgLink) === TRUE) {
        echo "Image Link updated successfully<br>";
    } else {
        echo "Error updating Image Link: " . $conn->error . "<br>";
    }
}

if ($discountPercentage != null) {
    $sqlDiscountPercentage = "UPDATE products SET discount_percentage=" . $discountPercentage . " WHERE product_id= '" . $productID . "' ";

    if ($conn->query($sqlDiscountPercentage) === TRUE) {
        echo "Discount Percentage updated successfully<br>";
    } else {
        echo "Error updating Discount Percentage: " . $conn->error . "<br>";
    }
}

if ($discountStartDate != null) {
    $sqlDiscountStartDate = "UPDATE products SET discount_start_date='" . $discountStartDate . "' WHERE product_id= '" . $productID . "' ";

    if ($conn->query($sqlDiscountStartDate) === TRUE) {
        echo "Discount Start Date updated successfully<br>";
    } else {
        echo "Error updating Discount Start Date: " . $conn->error . "<br>";
    }
}

if ($discountEndDate != null) {
    $sqlDiscountEndDate = "UPDATE products SET discount_end_date='" . $discountEndDate . "' WHERE product_id= '" . $productID . "' ";

    if ($conn->query($sqlDiscountEndDate) === TRUE) {
        echo "Discount End Date updated successfully<br>";
    } else {
        echo "Error updating Discount End Date: " . $conn->error . "<br>";
    }
}

if ($description != null) {
    $sqlDescription = "UPDATE products SET description='" . $description . "' WHERE product_id= '" . $productID . "' ";

    if ($conn->query($sqlDescription) === TRUE) {
        echo "Description updated successfully<br>";
    } else {
        echo "Error updating Description: " . $conn->error . "<br>";
    }
}

if ($statusProduct != null) {
    $sqlStatusProduct = "UPDATE products SET status_product=" . $statusProduct . " WHERE product_id= '" . $productID . "' ";

    if ($conn->query($sqlStatusProduct) === TRUE) {
        echo "Status Product updated successfully<br>";
    } else {
        echo "Error updating Status Product: " . $conn->error . "<br>";
    }
}


$conn->close();


?>