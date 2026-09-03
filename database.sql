 CREATE DATABASE IF NOT EXISTS razorpay_recovery;
USE razorpay_recovery;

CREATE TABLE IF NOT EXISTS failed_payments (
  id INT AUTO_INCREMENT PRIMARY KEY,
  payment_id VARCHAR(100) UNIQUE,
  order_id VARCHAR(100),
  amount INT,
  failure_reason VARCHAR(255),
  smart_message VARCHAR(255),
  status VARCHAR(20) DEFAULT 'pending',
  retry_count INT DEFAULT 0,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
