<?php

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate and sanitize user input
    $phone = filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_STRING);
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

    include '../model/connectdb.php';

    // Use prepared statements to prevent SQL injection
    $stmt = $conn->prepare("SELECT id, phone, full_name, password, type_id, email FROM users WHERE phone = ?");

    // Check if prepare() was successful
    if (!$stmt) {
        die("Prepare failed: " . $conn->error);
    }

    $stmt->bind_param("s", $phone);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if the phone number exists
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $hashed_password_db = $row["password"];

        // Verify password
        if (password_verify($password, $hashed_password_db)) {
            // Password is correct, user is authenticated

            // Set session variables
            $_SESSION['user_id'] = $row["id"];
            $_SESSION['phone'] = $row["phone"];
            $_SESSION['full_name'] = $row["full_name"];
            $_SESSION['email'] = $row["email"];
            $_SESSION['type_id'] = $row["type_id"];

            // Redirect to the homepage or any other authenticated page
            header("Location: /web/app/view/homepage.php");
            echo "Đăng nhập thành công";
            exit;
        } else {
            echo "Mật khẩu không đúng. Vui lòng thử lại.";
        }
    } else {
        echo "Số điện thoại không tồn tại. Vui lòng đăng ký.";
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
}
?>