<?php

// Get keyword sent from the client
$page = isset($_GET["page"]) ? (int) $_GET["page"] : 1;

// Assuming you want to fetch 10 rows at a time, starting from (page_-1)*10
$offset = ($page - 1) * 10; // Assuming you want 10 records per page

$sql = "SELECT * FROM products a INNER JOIN categories b 
            ON a.category_id = b.category_id
            ORDER BY product_id ASC
            LIMIT $offset, 9";

$sql_per_page = "SELECT COUNT(*) AS count FROM products";

include 'connectdb.php';

$result = $conn->query($sql);
$result_per_page = $conn->query($sql_per_page);

if ($result_per_page) {
    $row_per_page = $result_per_page->fetch_assoc();
    $total_products = $row_per_page["count"];
    $products_per_page = 10;
    $total_pages = ceil($total_products / $products_per_page);

    echo '    <table class="table table-bordered">';
    echo '        <thead class="thead-light">';
    echo '            <tr>';
    echo '                <th style="width: 10%;">ID</th>';
    echo '                <th style="width: 40%;">Tên sản phẩm</th>';
    echo '                <th style="width: 25%;">Phân loại</th>';
    echo '                <th style="width: 25%;">Hành động</th>';
    echo '            </tr>';
    echo '        </thead>';
    echo '        <tbody';

    if ($result) {
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                // Echo HTML structure based on the fetched data
                echo "<tr>";
                echo "<td>" . $row["product_id"] . "</td>";
                echo "<td>" . $row["product_name"] . "</td>";
                echo "<td>" . $row["category_name"] . "</td>";
                echo "<td class='actions'>";
                echo "<a class='btn' href='../../view/admin/update-product-view.php?id=" . $row["product_id"] . "'>Update</a>";
                echo "<a class='btn' href='../../controller/admin/delete-product-controller.php?id=" . $row["product_id"] . "'>Delete</a>";
                echo "</td>";
                echo "</tr>";
            }
        }

        echo '        </tbody>';
        echo '    </table>';

        $sql_pagination = "SELECT COUNT(*) AS total FROM products"; // Get the total count of products

        include 'take-pagination.php';
    } else {
        throw new Exception("Error: " . $conn->error);
    }
} else {
    throw new Exception("Error: " . $conn->error);
}



$conn->close();

?>