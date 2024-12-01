<?php
require __DIR__ . '/gateway-config.php';
require __DIR__ . '/razorpay-php-2.8.7/Razorpay.php';

use Razorpay\Api\Api;

$api = new Api($razorpayApiKey, $razorpayApiSecret);

try {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $amount = $_POST['amount'] * 100; // Amount in paise

        // Create an order
        $order = $api->order->create([
            'amount' => $amount,
            'currency' => 'INR',
        ]);

        $orderId = $order->id;

        // Return the order ID as a response
        echo json_encode(['order_id' => $orderId]);
    }
} catch (\Razorpay\Api\Errors\BadRequestError $e) {
    // Handle the error, log it, or display an appropriate message
    echo 'Razorpay API Error: ' . $e->getMessage();
}
?>
