<?php
include 'connectdb.php';

include 'connectdb.php';

$sql = "SELECT category_name, category_id FROM categories";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo '<div class="form-group">';
    echo '<label for="category">Phân loại:</label>';
    echo '<select id="category" name="category" class="form-control">';
    while ($row = $result->fetch_assoc()) {
        echo '<option value="' . $row["category_id"] . '">' . $row["category_name"] . '</option>';
    }
    echo '</select>';
    echo '</div>';
} else {
    echo "0 results";
}

// close connection
$conn->close();
?>