<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate and sanitize user input
    $phone = filter_input(INPUT_POST, 'tel', FILTER_SANITIZE_STRING);
    $full_name = filter_input(INPUT_POST, 'full_name', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $password = filter_input(INPUT_POST, 'pass', FILTER_SANITIZE_STRING);
    $confirm_password = filter_input(INPUT_POST, 'confirm_pass', FILTER_SANITIZE_STRING);

    // Check if passwords match
    if ($password != $confirm_password) {
        $notification = "Tớ nghĩ là mật khẩu bạn nhập không khớp đó. Bạn hãy thử nhập lại nhé!.";
        echo $notification;

    } else {
        // Hash the password using bcrypt
        $hashed_password = password_hash($password, PASSWORD_BCRYPT);

        include '../model/connectdb.php';

        // Check if the phone already exists
        $check_phone_query = $conn->prepare("SELECT id FROM users WHERE phone = ?");
        $check_phone_query->bind_param("s", $phone);

        // Check if prepare() was successful
        if (!$check_phone_query) {
            die("Prepare failed: " . $conn->error);
        }

        $check_phone_query->execute();
        $check_phone_result = $check_phone_query->get_result();

        if ($check_phone_result->num_rows > 0) {
            $notification = "Oh sorry! Đăng ký không thành công mất rùi. Có vẻ như bạn chưa nhập số điện thoại hoặc đã được sử dụng rồi đó, đừng buồn và hãy nhập lại số khác nhé bạn iu <3";
            echo $notification;

        } else {
            // Email is available, proceed with user registration

            // Use prepared statements to prevent SQL injection
            $insert_user_query = $conn->prepare("INSERT INTO users (password, full_name, phone, email, type_id) VALUES (?, ?, ?, ?, 2)");

            // Check if prepare() was successful
            if (!$insert_user_query) {
                die("Prepare failed: " . $conn->error);
            }

            $insert_user_query->bind_param("ssss", $hashed_password, $full_name, $phone, $email);

            // Execute the statement
            if ($insert_user_query->execute()) {
                $notification = "Đăng ký thành công! Chào mừng " . $full_name . " đã đến với thế giới mỹ phẩm The Cosmetic Scrupts kiêm thành viên thứ 7749 của gia đình chúng ta Olala!";
                echo $notification;
            } else {
                echo "Đăng ký không thành công. Vui lòng thử lại.";
                // Optionally, you can output more details about the error for debugging:
                // echo "Error: " . $insert_user_query->error;
            }

            // Close the statement for inserting user
            $insert_user_query->close();
        }

        // Close the statement and connection for checking phone
        $check_phone_query->close();
        $conn->close();
    }
}
?>