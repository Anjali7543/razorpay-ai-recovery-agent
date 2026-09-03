<?php include 'config.php'; ?>
<h2>Revenue Recovery Audit Trail</h2>
<table border=1><tr><th>Payment ID</th><th>Reason</th><th>Status</th></tr>
<?php $res = $conn->query("SELECT * FROM failed_payments ORDER BY id DESC"); while($row = $res->fetch_assoc()){ echo "<tr><td>".$row['payment_id']."</td><td>".$row['reason']."</td><td>".$row['status']."</td></tr>"; } ?>
</table>
