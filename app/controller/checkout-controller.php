<?php
session_start();

include '../model/connectdb.php';

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    echo "User not logged in.";
    exit;
}

// Get user information from session
$user_id = $_SESSION['user_id'];
$full_name = $_SESSION['full_name'];
$email = $_SESSION['email'];
$phone = $_SESSION['phone'];

// Get other information from the checkout form using $_GET
$addressPayment = $_GET['homeAddress'];

$paymentMethod = $_GET['paymentMethod'];

$final_price = $_SESSION['final_price'];

// check a cookie is exist
$cart = isset($_COOKIE['cart']) ? json_decode($_COOKIE['cart'], true) : [];

// generate a array to save a data product
$cartItems = [];

// save to array $cartItems
foreach ($cart as $productID => $productInfo) {
    $cartItems[] = [
        'id' => $productID,
        'quantity' => $productInfo['quantity'],
    ];
}

//  transaction
$conn->begin_transaction();

try {
    // insert into orders
    $order_id = uniqid();
    $insertOrderQuery = "INSERT INTO orders (order_id, user_id, total_price, address_order, status_id, payment_id) 
                         VALUES ('$order_id', $user_id, $final_price, '$addressPayment', 1, $paymentMethod)";
    $conn->query($insertOrderQuery);

    foreach ($cartItems as $item) {
        $productID = $item['id'];
        $quantity = $item['quantity'];

        $getProductPriceQuery = "SELECT price FROM products WHERE product_id = $productID";
        $result = $conn->query($getProductPriceQuery);
        $productPrice = $result->fetch_assoc()['price'];

        $totalAmount = $productPrice * $quantity;

        $insertOrderItemQuery = "INSERT INTO order_items (order_id, product_id, quantity, total_amount) 
                                 VALUES ('$order_id', $productID, $quantity, $totalAmount)";

        

        // $conn->query($insertOrderItemQuery);
    }

    // Commit transaction
    $conn->commit();

    // Delete a cart when check out complete
    setcookie('cart', '', time() - 1, "/");
    exit;
} catch (Exception $e) {
    $conn->rollback();
    echo "Error placing order: " . $e->getMessage();
}

$conn->close();
?>