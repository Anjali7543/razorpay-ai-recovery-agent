# Razorpay AI Recovery Agent - Track 03

## Problem
70% online payments fail. Merchants lose revenue.

## Solution
My AI agent catches `payment.failed` webhook, explains failure in simple language, and provides a smart retry link.

## Features (Track 03 Requirements)
- **Graceful Failure Handling:** Logs all failures in DB, never crashes.
- **Audit Trail:** `index.php` shows full history of failed payments.
- **Idempotency:** Checks duplicate payment_id before insert.
- **Mobile Built:** Entire project built on mobile phone.

## Tech: PHP, MySQL, Razorpay Webhooks

## Demo Video Link: [Add your YouTube link here]
