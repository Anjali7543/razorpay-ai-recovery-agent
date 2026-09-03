<?php
include 'config.php';
$data = file_get_contents('php://input');
$event = json_decode($data, true);
if(isset($event['event']) && $event['event'] == 'payment.failed'){
  $pay_id = $event['payload']['payment']['entity']['id'];
  $reason = $event['payload']['payment']['entity']['failure_reason'];
  file_put_contents("log.txt", $pay_id." - ".$reason."\n", FILE_APPEND);
  $sql = "INSERT INTO failed_payments (payment_id, reason, status) VALUES ('$pay_id', '$reason', 'pending')";
  $conn->query($sql);
}
echo "Webhook OK";
?>
