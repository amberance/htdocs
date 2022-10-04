<?php
// Include Header file
require_once 'methods/vendor/autoload.php';
if (!defined('INORA_METHODS_CONFIG')) {
    define('INORA_METHODS_CONFIG', realpath('paymentConfig.php'));
}

/*
 * Use PaytmResponse Class
 * Use PaystackResponse Class
 * Use StripeResponse Class
 * Use RazorpayResponse Class
 * Use InstamojoResponse Class
 * Use IyzicoResponse Class
 * Use PaypalIpnResponse Class
 * Use BitPayResponse Class
 */
use App\Components\Payment\PaytmResponse;
use App\Components\Payment\PaystackResponse;
//use App\Components\Payment\StripeResponse;
use App\Components\Payment\RazorpayResponse;
use App\Components\Payment\InstamojoResponse;
use App\Components\Payment\IyzicoResponse;
use App\Components\Payment\PaypalIpnResponse;
use App\Components\Payment\BitPayResponse;

print_r("Testing");
var_dump("Hey!");

// Get Config Data
$configData = configItem();
// Get Request Data when payment success or failed
$requestData = $_REQUEST;
var_dump($requestData);

// Check payment Method is paytm
if ($requestData['paymentOption'] == 'paypal') {
    // Get instance of paypal
    $paypalIpnResponse  = new PaypalIpnResponse();
    
    // fetch paypal payment data
    $paypalIpnData = $paypalIpnResponse->getPaypalPaymentData();
    $rawData = json_decode($paypalIpnData, true);
    
    // Note : IPN and redirects will come here
    // Check if payment status exist and it is success
    if (isset($requestData['payment_status']) and $requestData['payment_status'] == "Completed") {
        
        // Then create a data for success paypal data
        $paymentResponseData = [
            'status'    => true,
            'rawData'   => (array) $paypalIpnData,
            'data'     => preparePaymentData($rawData['invoice'], $rawData['payment_gross'], $rawData['txn_id'], 'paypal')
        ];
        // Send data to payment response function for further process
        paymentResponse($paymentResponseData);
        // Check if payment not successfull
    } else {
        // Prepare payment failed data
        $paymentResponseData = [
            'status'   => false,
            'rawData'  => [],
            'data'     => preparePaymentData($rawData['invoice'], $rawData['payment_gross'], null, 'paypal')
        ];
        // Send data to payment response function for further process
        paymentResponse($paymentResponseData);
    }
    
    // Check Paystack payment process
}

/*
 * This payment used for get Success / Failed data for any payment method.
 *
 * @param array $paymentResponseData - contains : status and rawData
 *
 */
function paymentResponse($paymentResponseData) {
    // payment status success
    if ($paymentResponseData['status']) {
        
        // Show payment success page or do whatever you want, like send email, notify to user etc
        header('Location: '. getAppUrl('payment-success.php'));
        
    } else {
        // Show payment error page or do whatever you want, like send email, notify to user etc
        header('Location: '. getAppUrl('payment-failed.php'));
    }
}

/*
 * Prepare Payment Data.
 *
 * @param array $paymentData
 *
 */
function preparePaymentData($orderId, $amount, $txnId, $paymentGateway) {
    return [
        'order_id'              => $orderId,
        'amount'                => $amount,
        'payment_reference_id'  => $txnId,
        'payment_gatway'        => $paymentGateway
    ];
}