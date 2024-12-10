<?php

// Function to calculate the total number of pages
function getTotalPages($conn, $sql_pagination) {
    $result = $conn->query($sql_pagination);
    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $totalItems = $row['total'];
        $itemsPerPage = 9; // Number of items per page
        return ceil($totalItems / $itemsPerPage); // Calculate total pages
    } else {
        return 0;
    }
}

$totalPages = getTotalPages($conn, $sql_pagination); // Get the total number of pages

$current_page = isset($_GET['page']) ? (int)$_GET['page'] : 1;

echo "<div class='pagination justify-content-center divPerPage'>";

// First page
echo "<button class='btn btn-secondary page-btn mx-1' value='1'>Trang đầu</button>";

// Previous page
if ($current_page > 1) {
    echo "<button class='btn btn-secondary page-btn mx-1' value='" . ($current_page - 1) . "'>Trở về</button>";
}

// Display pages near the current page
$start_page = max(1, $current_page - 1); // Start page is the maximum of 1 or current page - 1
$end_page = min($totalPages, $current_page + 1); // End page is the minimum of total pages or current page + 1

// Display pages from start_page to end_page, emphasizing the current page
for ($i = $start_page; $i <= $end_page; $i++) {
    $btn_class = ($i == $current_page) ? 'btn-primary' : 'btn-secondary';
    echo "<button class='btn $btn_class page-btn mx-1' value='$i'>$i</button>";
}

// Next page
if ($current_page < $totalPages) {
    echo "<button class='btn btn-secondary page-btn mx-1' value='" . ($current_page + 1) . "'>Kế tiếp</button>";
}

// Last page
echo "<button class='btn btn-secondary page-btn mx-1' value='$totalPages'>Trang cuối</button>";

echo "</div>";

?>
