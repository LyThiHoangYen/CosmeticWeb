<?php
session_start();

include '../model/connectdb.php';

if ($conn->connect_error) {
    throw new Exception("Connection failed: " . $conn->connect_error);
}

$action = isset($_GET['action']) && !empty($_GET['action']) ? $_GET['action'] : null;

// function to print a cart 
function displayCart($cart)
{
    // display a cart
    $totalPrice = 0;
    // compute total price
    foreach ($cart as $productID => $productInfo) {
        $totalPrice += $productInfo['price'] * $productInfo['quantity'];
    }
    $_SESSION['totalPrice'] = $totalPrice;

    echo '<div class="text-right mx-auto" style="margin-right:35px">';
    echo '<button class="btn btn-danger clear_cart">Xoá giỏ hàng</button>';
    echo '</div>';
    echo '<table class="single-product-cart" style="width:100%;">';
    echo '<thead class="text-muted"><tr><th scope="col" width="20%"></th><th scope="col" width="60%"></th><th scope="col" width="20%" class="text-right"> </th></tr></thead>';
    echo '<tbody>';
    foreach ($cart as $productID => $productInfo) {
        echo '<tr class="tr-cart">';
        echo '<td><img class="img-cart" src="' . $productInfo['imgLink'] . '" alt="' . $productInfo['name'] . '"></td>';
        echo '<td>';
        echo '<div class="cart-name"><p>' . $productInfo['name'] . '</p></div>';
        echo '<div class="cart__quantity">';
        echo '<button class="btn cart-btn decrease_cart" data-productid="' . $productID . '" onclick="decreaseQuantity(\'quantity' . $productID . '\')">-</button>';
        echo '<input class="cart-quantity" type="text" id="quantity' . $productID . '" value="' . $productInfo['quantity'] . '" readonly>';
        echo '<button class="btn cart-btn increase_cart" data-productid="' . $productID . '" onclick="increaseQuantity(\'quantity' . $productID . '\')">+</button>';
        echo '</div>';
        echo '</td>';
        echo '<td>';
        echo '<button class="btn btn-block cart-btn remove_cart" data-productid="' . $productID . '">X</button>';
        echo '<div>' . $productInfo['price'] . ' đ</div>';
        echo '</td>';
        echo '</tr>';
    }
    echo '</tbody>';
    echo '</table>';
    echo '<div class="text-right" style="margin-right:35px">';
    echo '<div class="total-price font-weight-bold" style="font-size: 20px">Tổng giá: ' . number_format($totalPrice, 0, ',', '.') . ' vnđ</div>';
    echo '</div>';
    echo "<a href='checkout-view.php'style='font-size:45px; text-decoration: none; color: green; margin-left: 63%'><b>Đặt hàng</b></a>";
}

function displayEmptyCart()
{
    echo '<div class="cart-empty__body mx-auto">';
    echo '<div class="title link__pc--wb">OOPSS</div>';
    echo '<div class="message link__pc--wb">Giỏ hàng hiện đang trống <br>';
    echo 'Không có sản phẩm nào trong <br>';
    echo 'giỏ của bạn</div>';
    echo '<a href="" class="button">TIẾP TỤC MUA SẮM</a>';
    echo '</div>';
}

if ($action == "add") {
    if (isset($_GET['productID'])) {
        $productID = $_GET['productID'];

        // Check $productID is avaiable
        if (!is_numeric($productID)) {
            echo "ID sản phẩm không hợp lệ.";
            exit;
        }

        // Take a cookie (if exist)
        $cart = isset($_COOKIE['cart']) ? json_decode($_COOKIE['cart'], true) : [];

        // Check is product avaiable
        if (isset($cart[$productID]) && is_array($cart[$productID])) {
            // is exist, +1
            $cart[$productID]['quantity'] += 1;
        } else {
            // if not
            $sql = "SELECT * FROM products WHERE product_id = $productID";
            $result = $conn->query($sql);

            if (!$result) {
                throw new Exception("Error in SQL query: " . $conn->error);
            }

            if ($result->num_rows > 0) {
                $productInfo = $result->fetch_assoc();

                $cart[$productID] = [
                    'id' => $productID,
                    'name' => $productInfo['product_name'],
                    'price' => $productInfo['price'],
                    'imgLink' => $productInfo['imgLink'],
                    'quantity' => 1,
                ];
            } else {
                echo "Không tìm thấy thông tin sản phẩm.";
            }
        }

        // Save to cookie
        setcookie('cart', json_encode($cart), time() + (86400 * 30), "/");

        displayCart($cart);

    } else {
        echo "Thiếu ID sản phẩm cho hành động addToCart.";
    }
} else if ($action == "decrease") {
    if (isset($_GET['productID'])) {
        $productID = $_GET['productID'];

        // Check $productID is avaiable
        if (!is_numeric($productID)) {
            echo "ID sản phẩm không hợp lệ.";
            exit;
        }

        $cart = isset($_COOKIE['cart']) ? json_decode($_COOKIE['cart'], true) : [];

        // Check exist in cart
        if (isset($cart[$productID]) && is_array($cart[$productID])) {
            // decrase to 1
            $cart[$productID]['quantity']--;

            // check if the quantity is less than 1, then remove toi cart
            if ($cart[$productID]['quantity'] <= 0) {
                unset($cart[$productID]);
            }

            setcookie('cart', json_encode($cart), time() + (86400 * 30), "/"); // Cookie tồn tại trong 30 ngày

        } else {
            echo "Sản phẩm không tồn tại trong giỏ hàng.";
        }
    } else {
        echo "Thiếu ID sản phẩm cho hành động decrease.";
    }
} else if ($action == "remove") {
    if (isset($_GET['productID'])) {
        $productID = $_GET['productID'];

        // Check $productID is avaiable
        if (!is_numeric($productID)) {
            echo "ID sản phẩm không hợp lệ.";
            exit; 
        }

        $cart = isset($_COOKIE['cart']) ? json_decode($_COOKIE['cart'], true) : [];

        if (isset($cart[$productID]) && is_array($cart[$productID])) {
            // Xóa sản phẩm khỏi giỏ hàng
            unset($cart[$productID]);

            // Lưu giỏ hàng mới vào cookie
            setcookie('cart', json_encode($cart), time() + (86400 * 30), "/");

            displayCart($cart);
        } else {
            echo "Sản phẩm không tồn tại trong giỏ hàng.";
        }
    } else {
        echo "Thiếu ID sản phẩm cho hành động remove.";
    }
} else if ($action == "clear") {
    setcookie('cart', '', time() - 1, "/");

    displayEmptyCart();

} else if ($action == "load") {
    $cart = isset($_COOKIE['cart']) ? json_decode($_COOKIE['cart'], true) : [];

    if (!empty($cart)) {
        displayCart($cart);
    } else {
        displayEmptyCart();
    }
} else {
    echo "Hành động không hợp lệ.";
}

$conn->close();
?>