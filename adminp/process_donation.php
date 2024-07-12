<?php
require 'razorpay-php/Razorpay.php';
use Razorpay\Api\Api;

$api = new Api('your_api_key', 'your_secret_key');

// Get the payment ID and other details from the POST request
$payment_id = $_POST['razorpay_payment_id'];
$amount = 100000; // In paisa, corresponding to 1000 INR

try {
    $payment = $api->payment->fetch($payment_id);
    $payment->capture(array('amount' => $amount));
    
    // Payment success, update your database or perform other actions
    echo "Payment successful! Payment ID: " . $payment_id;
} catch (\Exception $e) {
    // Payment failed, handle the error
    echo "Payment failed! Error: " . $e->getMessage();
}
?>
