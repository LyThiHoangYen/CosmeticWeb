<?php
// Get keyword sent from the client
$keyword = '%' . strtolower($_GET["keyword"]) . '%';

$sql = "SELECT * FROM products WHERE product_name LIKE '$keyword';";

include '../model/connectdb.php';

$result = $conn->query($sql);

if (!$result) {
    die("Error in query: " . $conn->error);
}

if ($result->num_rows > 0) {
    // Output data of each row
    echo '<div class="row">';
    while ($row = $result->fetch_assoc()) {
        // Display product information in the template card
        echo '<a href="../../app/view/single-product.php?productID=' . $row['product_id'] . '" class="text-decoration-none col-md-4 col-sm-6 col-xs-12 thumbnail">';
        echo '<img src="' . $row['imgLink'] . '" alt="" class="search__img">';
        echo '<div class="search__info">';
        echo '<span>';
        echo '<p class="product_name">' . $row['product_name'] . '</p>';

        // Format the price as an integer, separated by commas
        $formatted_price = number_format($row['price'], 0, ',', '.');
        echo '<p class="product_price">' . $formatted_price . ' đ</p>';
        echo '</span>';
        echo '<div>';   
        echo '</div>';
        echo '</div>';
        echo '</a>';
    }
    echo '</div>';
} else {
    echo "0 results";
}

// Close the connection
$conn->close();
?>
