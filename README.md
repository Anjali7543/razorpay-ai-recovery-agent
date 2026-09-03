# 🛡️ Razorpay AI Recovery Agent - Track 03

> Problem: 70% online transactions fail due to network, balance, authentication issues. Merchants lose crores.

> My Solution: An AI Agent that auto-captures `payment.failed` webhooks, explains failure in simple Hindi/English, and creates a smart retry link.

### ✅ Track 03 Requirements Implemented:
1.  **Graceful Failure Handling:** Webhook never crashes, logs everything in `webhook_log.txt` + DB.
2.  **Audit Trail:** `index.php` is the complete dashboard for all failed payments.
3.  **Idempotency:** `payment_id` is UNIQUE, duplicate webhooks are ignored.
4.  **Smart Recovery:** `config.php` has `getSmartReason()` AI function that converts technical reason to human message.
5.  **Mobile Built:** Entire project coded and pushed via GitHub Mobile App from Patna.

### Tech Stack
PHP, MySQL, Razorpay Webhooks

### How to Test
1. Import `database.sql`
2. Set Razorpay Test Webhook URL to `your-domain.com/webhook.php` for `payment.failed`
3. Fail a test payment, see it appear in `index.php`

### Built By
Anjali Kumari, Patna, Bihar. Built on Mobile.

### Video Demo
[YouTube Link Here]
