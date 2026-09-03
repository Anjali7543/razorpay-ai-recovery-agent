<?php
// Razorpay Keys - Test Mode
$key_id = "rzp_test_1234567890";
$key_secret = "test_secret_key";

// Database - XAMPP / Hostinger ke hisab se change karna
$db_host = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "razorpay_recovery";

$conn = new mysqli($db_host, $db_user, $db_pass, $db_name);
if ($conn->connect_error) {
    die("DB Connection failed: " . $conn->connect_error);
}

// AI Logic Function
function getSmartReason($razorpay_reason){
    $map = [
        "insufficient_funds" => "Aapke account me balance kam hai. UPI se try karein.",
        "card_expired" => "Aapka card expire ho gaya hai.",
        "network_error" => "Network issue, 2 min baad retry karein.",
        "authentication_failed" => "OTP galat tha, dobara try karein."
    ];
    return $map[$razorpay_reason] ?? "Payment fail ho gaya: " . $razorpay_reason . ". Dusre method se try karein.";
}
?>
