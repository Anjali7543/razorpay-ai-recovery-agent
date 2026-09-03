 <?php
include 'config.php';
$payload = file_get_contents('php://input');
$data = json_decode($payload, true);

// Log everything for Audit Trail
file_put_contents("webhook_log.txt", date('Y-m-d H:i:s')." - ".$payload."\n", FILE_APPEND);

if(isset($data['event']) && $data['event'] == 'payment.failed'){
    $p = $data['payload']['payment']['entity'];
    $pay_id = $p['id'];
    $order_id = $p['order_id'];
    $amount = $p['amount'];
    $reason = $p['error_reason'] ?? $p['failure_reason'] ?? 'unknown';
    
    // Smart AI Message
    $smart_msg = getSmartReason($reason);

    // Idempotency - Duplicate check (Track 03 Requirement)
    $check = $conn->query("SELECT id FROM failed_payments WHERE payment_id = '$pay_id'");
    if($check->num_rows == 0){
        $stmt = $conn->prepare("INSERT INTO failed_payments (payment_id, order_id, amount, failure_reason, smart_message) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("ssiss", $pay_id, $order_id, $amount, $reason, $smart_msg);
        $stmt->execute();
    }
}
http_response_code(200);
echo json_encode(["status"=>"ok", "recovered_by"=>"Anjali-AI-Agent"]);
?>
