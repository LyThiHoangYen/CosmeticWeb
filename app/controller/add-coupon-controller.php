<?php
session_start();

class CheckoutController
{
    public function calculateTotalPrice()
    {
        $totalPrice = isset($_SESSION['totalPrice']) ? floatval($_SESSION['totalPrice']) : 0.0;

        if (isset($_GET['coupon_code'])) {
            $couponCode = $_GET['coupon_code'];
            $discountPercentage = $this->getDiscountPercentage($couponCode);
            if ($discountPercentage > 0) {
                $totalPrice -= $totalPrice * $discountPercentage / 100;
            }
        }

        return [
            'discount_percentage' => $discountPercentage,
            'total_price' => $totalPrice,
        ];
    }

    private function getDiscountPercentage($couponCode)
    {
        include '../model/connectdb.php';

        $safeCouponCode = $conn->real_escape_string($couponCode);

        $query = "SELECT discount_percentage FROM coupons WHERE coupon_code = '$safeCouponCode' AND start_date <= CURDATE()";
        $result = $conn->query($query);
        if ($result && $result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $discountPercentage = floatval($row['discount_percentage']);

        } else {
            $discountPercentage = 0.0;
        }

        $conn->close();

        return $discountPercentage;
    }
}

$checkoutController = new CheckoutController();
$result = $checkoutController->calculateTotalPrice();

if ($result['discount_percentage'] > 0) {
    $_SESSION['final_price'] = $result['total_price'];
    echo "Giảm giá " . $result['discount_percentage'] . "% đã được áp dụng.<br>";
}
echo "Giá phải thanh toán: " . number_format($result['total_price'], 0, ',', '.') . ' VND';

?>