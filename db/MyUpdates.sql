ALTER TABLE i_user_payments MODIFY COLUMN payment_option ENUM('stripe','paypal','razorpay','iyzico','authorize-net','paystack','bitpay','coinpayment','mercadopago','bitcoin');

ALTER TABLE i_user_payments MODIFY COLUMN payment_status ENUM('pending','payed','declined', 'insufficient');