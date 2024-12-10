<?php

try {
    // Path to the PHPMailer autoload.php file (if you are using Composer)
    require '../../../vendor/autoload.php';

    $mail = new PHPMailer\PHPMailer\PHPMailer();

    // Set debug mode (0: no output, 2: verbose debug output)
    $mail->SMTPDebug = 0;

    // Use SMTP
    $mail->isSMTP();

    // Set Google's SMTP server
    $mail->Host = 'smtp.gmail.com';

    // Set SMTP port (port 587 is commonly used for TLS)
    $mail->Port = 587;

    // Turn on TLS
    $mail->SMTPSecure = 'tls';

    $mail->SMTPAuth = true;

    // Set the sender's email address
    $mail->Username = '21521517@gm.uit.edu.vn';

   // Set the email account's password
    $mail->Password = '**********';

    // Set sender's name
    $mail->setFrom('21521517@gm.uit.edu.vn', 'ThyAnh');


    // Check if the action and order_id parameters are set
    if (isset($_GET['action']) && isset($_GET['order_id'])) {
        $action = $_GET['action'];
        $order_id = $_GET['order_id'];

        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "web";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
            throw new Exception("Connection failed: " . $conn->connect_error);
        }

        // Perform the action based on the request
        if ($action == 'confirm') {
            // Update order status to 'Confirmed'
            $updateQuery = "UPDATE orders SET status_id = 2 WHERE order_id = '$order_id'";
            $conn->query($updateQuery);

            // Get order details from the database
            $selectOrderQuery = "SELECT orders.*, users.email as customer_email FROM orders
                JOIN users ON orders.user_id = users.id
                WHERE orders.order_id = '$order_id'";
            $result = $conn->query($selectOrderQuery);
            $order = $result->fetch_assoc();

            // Get order items from the database
            $selectOrderItemsQuery = "SELECT * FROM order_items WHERE order_id = '$order_id'";
            $resultItems = $conn->query($selectOrderItemsQuery);

            // Set recipient's email address
            $mail->addAddress('anhthy18072003.tran@gmail.com', 'Daniis Axelor');
            // Set subject
            $mail->Subject = 'Xac nhan don hang';

            // Set content
            $mail->Body = "
                <p>Xin chào</p>
                <p>Cảm ơn bạn đã đặt hàng từ chúng tôi. Dưới đây là xác nhận đơn hàng của bạn:</p>
                
                <h3>Chi tiết đơn hàng:</h3>
            ";

            while ($item = $resultItems->fetch_assoc()) {
                $mail->Body .= "
                    <p>Sản phẩm: {$item['product_id']} - Số lượng: {$item['quantity']}</p>
                ";
            }

            $mail->Body .= "
                <p>Cảm ơn bạn đã lựa chọn chúng tôi. Chúng tôi sẽ thông báo cho bạn khi đơn hàng của bạn đã được gửi đi.</p>
                
                <p>Trân trọng,</p>
            ";

            $mail->isHTML(true);

            // Send email
            if (!$mail->send()) {
                echo 'Message could not be sent. Mailer Error: ' . $mail->ErrorInfo;
            } else {
                echo 'Message has been sent';
            }

            echo "Order confirmed successfully.";
        } else if ($action == 'cancel') {
            // Update order status to 'Canceled'
            $updateQuery = "UPDATE orders SET status_id = 3 WHERE order_id = '$order_id'";
            $conn->query($updateQuery);

            // Get order details from the database
            $selectOrderQuery = "SELECT orders.*, users.full_name as customer_name, users.email as customer_email FROM orders
                JOIN users ON orders.user_id = users.id
                WHERE orders.order_id = '$order_id'";
            $result = $conn->query($selectOrderQuery);
            $order = $result->fetch_assoc();

            // Get order items from the database
            $selectOrderItemsQuery = "SELECT * FROM order_items WHERE order_id = '$order_id'";
            $resultItems = $conn->query($selectOrderItemsQuery);

            // Reciepter's email
            $mail->addAddress('anhthy18072003.tran@gmail.com', 'Daniis Axelor');

            $mail->Subject = 'Huy don hang';

            $mail->Body = "
                <p>Xin chào</p>
                <p>Chúng tôi rất tiếc thông báo rằng đơn hàng của bạn đã bị hủy.</p>
    
                <h3>Thông tin đơn hàng:</h3>
                
                <h3>Chi tiết đơn hàng:</h3>
            ";

            while ($item = $resultItems->fetch_assoc()) {
                $mail->Body .= "
                    <p>Sản phẩm: {$item['product_id']} - Số lượng: {$item['quantity']}</p>
                ";
            }

            $mail->Body .= "
                <p>Nếu có bất kỳ câu hỏi hoặc cần hỗ trợ thêm, vui lòng liên hệ chúng tôi.</p>
                
                <p>Xin lỗi vì sự bất tiện này và chúng tôi hy vọng có cơ hội phục vụ bạn trong tương lai.</p>
                
                <p>Trân trọng,</p>
            ";

            $mail->isHTML(true);

            if (!$mail->send()) {
                echo 'Message could not be sent. Mailer Error: ' . $mail->ErrorInfo;
            } else {
                echo 'Message has been sent';
            }

            echo "Order confirmed successfully.";
        }

        $conn->close();
    } else {
        echo "Action or order_id not provided.";
    }
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
?>