<?php include 'config.php'; ?>
<!DOCTYPE html>
<html><head><title>Recovery Agent</title>
<style>body{font-family:Arial;padding:15px}table{width:100%;border-collapse:collapse}th,td{border:1px solid #ccc;padding:8px}th{background:#072654;color:white}.badge{background:#ffebe6;color:#d93c0f;padding:3px 8px;border-radius:10px}</style>
</head><body>
<h2>🛡️ Razorpay AI Recovery Agent - Audit Trail</h2>
<p>Built by Anjali | Track 03 | Total Failures: <?php $c=$conn->query("SELECT COUNT(*) as c FROM failed_payments")->fetch_assoc(); echo $c['c']; ?></p>
<table><tr><th>Payment ID</th><th>Reason</th><th>AI Smart Message</th><th>Status</th><th>Retry Link</th></tr>
<?php
$res = $conn->query("SELECT * FROM failed_payments ORDER BY id DESC");
while($r = $res->fetch_assoc()){
    echo "<tr><td>{$r['payment_id']}</td><td><span class='badge'>{$r['failure_reason']}</span></td><td>{$r['smart_message']}</td><td>{$r['status']}</td><td><a href='recover.php?pay_id={$r['payment_id']}'>Retry Now</a></td></tr>";
}
?>
</table>
</body></html>
