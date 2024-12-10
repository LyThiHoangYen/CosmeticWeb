<?php

include '../../model/connectdb.php';

// get a orders have status = 1 (status_id = 1 mean is waiting check)
$sql = "SELECT * FROM orders WHERE status_id = 1";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["user_id"] . "</td>";
        echo "<td>" . $row["order_id"] . "</td>";
        echo "<td>" . $row["total_price"] . "</td>";
        echo "<td class='actions'>";
        echo "<a class='btn' href='../../controller/admin/sent-result-order.php?action=confirm&order_id=" . $row["order_id"] . "'>Xác nhận đơn hàng</a>";
        echo "<a class='btn' href='../../controller/admin/sent-result-order.php?action=cancel&order_id=" . $row["order_id"] . "'>Hủy đơn hàng</a>";
        echo "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "Không có đơn hàng chờ.";
}

$conn->close();
?>