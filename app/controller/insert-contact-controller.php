<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = filter_input(INPUT_POST, 'nameContact', FILTER_SANITIZE_STRING);
    $tel = filter_input(INPUT_POST, 'telContact', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'emailContact', FILTER_SANITIZE_STRING);
    $question = filter_input(INPUT_POST, 'questionContact', FILTER_SANITIZE_STRING);

    include '../model/connectdb.php';
    
    $sql = "INSERT INTO contacts (contact_name, contact_phone, contact_email, question)
            VALUES ('" . $name . "','" . $tel . "','" . $email . "','" . $question . "')";

    if ($conn->query($sql) === TRUE) {
        echo "Câu hỏi của bạn đã được gửi. Chúng tôi sẽ phản hồi cho bạn trong thời gian sớm nhất. Cảm ơn bạn luôn đồng hành cùng The Cosmetic Scrupts nhé!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
$conn->close();
?>