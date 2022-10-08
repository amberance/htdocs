<?php

require_once 'includes/inc.php';

$payment_time = time();

$requestData = $_REQUEST;

$json = file_get_contents('php://input');
$data = json_decode($json);
//echo $data;
//echo $json;



$key = $data->key;
echo $key;


$status = $data->transaction->status;
echo $key;
$orderId = $data->transaction->external_reference;
echo $orderId;
$userIdFromOrder = $data->transaction->description;
echo $userIdFromOrder;
$amount_fiat = $data->transaction->amount_fiat;
echo $amount_fiat;
$txnId = $data->transaction->id;
echo $txnId;


//var_dump($requestData);
//var_dump(json_encode($_REQUEST));
//var_dump($json );

$stderr = fopen('php://stderr', 'w');
fwrite($stderr, " The JSON in BITCOIN Product or Points Payment Routine: \n" );
fwrite($stderr, $json);
fwrite($stderr," Amount Fiat:  " );
fwrite($stderr,$amount_fiat);
fwrite($stderr,"  Order ID from Order: " );
fwrite($stderr, $orderId);
fclose($stderr);


//if ($key!='shhhhhh') {
//    echo "key not correct";
//    exit();
//}


if (!isset($userId)) {
    $userID = $userIdFromOrder;
    echo " userid was not set ";
} else {
    echo " userid is:  ";
    echo $userID;
}

if (!isset($adminFee)) {
    $adminFee=10;
    echo " Admin Fee Not Set. Setting it to 10. ";
} else {
    echo " The Admin Fee: ";
    echo $adminFee;
}

// also check to see if amount paid is the amount of the good!
$stderr = fopen('php://stderr', 'w');
fwrite($stderr," THE KEY: ");
fwrite($stderr,$key);
fwrite($stderr," THE USERID: " );
fwrite($stderr,$userID);
fwrite($stderr," THE ORDERID: ");
fwrite($stderr,$orderId);
fwrite($stderr," THE STATUS: " );
fwrite($stderr,$status);
fclose($stderr);


if (isset($status) && ($status=='C') && isset($key) && ($key=='shhhhhh')) {
    
    
    $stderr = fopen('php://stderr', 'w');
    fwrite($stderr," Boolean condition for bitcoin entered. ");
    fclose($stderr);

    // Then create a data for success paypal data
    $paymentResponseData = [
        'status' => true,
        'rawData' => $json,
        'data' => preparePaymentData($orderId, $amount_fiat, $txnId, 'bitcoin'),
    ];
    
    // Send data to payment response function for further process
    paymentResponse($paymentResponseData);
    //$getPamentData = mysqli_query($db, "SELECT * FROM i_user_payments WHERE payment_type IN('point','product') AND payment_status = 'pending' AND payment_option = 'bitcoin' AND payer_iuid_fk = '$userID'") or die(mysqli_error($db));
    $getPamentData = mysqli_query($db, "SELECT * FROM i_user_payments WHERE order_key = '" . $orderId . "'") or die(mysqli_error($db));
    $pData = mysqli_fetch_array($getPamentData, MYSQLI_ASSOC);
    $userPayedPlanID = isset($pData['credit_plan_id']) ? $pData['credit_plan_id'] : NULL;
    $payerUserID = isset($pData['payer_iuid_fk']) ? $pData['payer_iuid_fk'] : NULL;
    $productID = isset($pData['paymet_product_id']) ? $pData['paymet_product_id'] : NULL;
    if(!empty($userPayedPlanID)){
        $planSQL = "SELECT * FROM i_premium_plans WHERE plan_id = '$userPayedPlanID'";
        
        
        $planDetails = mysqli_query($db, $planSQL) or die(mysqli_error($db));
        $pAData = mysqli_fetch_array($planDetails, MYSQLI_ASSOC);
        $planAmount = $pAData['plan_amount'];
        $planCost = $pAData['amount'];
        
        $stderr = fopen('php://stderr', 'w');
        fwrite($stderr, " PayerUserId:  ");
        fwrite($stderr, $payerUserID);
        fwrite($stderr, " Plan SQL: ");
        fwrite($stderr, $planSQL);
        fwrite($stderr, " Amount fiat:  ");
        fwrite($stderr, $amount_fiat );
        fclose($stderr);
        
        if ($amount_fiat < $planCost) {
            $insufficientSQL = "UPDATE i_user_payments SET payment_status = 'insufficient' WHERE order_key = '" . $orderId . "'";
            $stderr = fopen('php://stderr', 'w');
            fwrite($stderr, $amount_fiat );
            fwrite($stderr," Insufficient Payment for premium plan. ");
            fwrite($stderr, $planCost);
            fwrite($stderr, $insufficientSQL);
            fclose($stderr);
            $insufficientSQL = "UPDATE i_user_payments SET payment_status = 'insufficient' WHERE order_key = '" . $orderId . "'";
            mysqli_query($db, $insufficientSQL) or die(mysqli_error($db));
        } else {

            $walletSqlUpdate = "UPDATE i_users SET wallet_points = wallet_points + $planAmount WHERE iuid = '$userID'";
            $paymentStatusSqlUpdate = "UPDATE i_user_payments SET payment_status = 'payed' WHERE order_key = '" . $orderId . "'";
            $stderr = fopen('php://stderr', 'w');
            fwrite($stderr, $walletSqlUpdate);
            fwrite($stderr," These are the SQL before the bitcoin plan updates... ");
            fwrite($stderr, $paymentStatusSqlUpdate);
            fclose($stderr);
            mysqli_query($db, $walletSqlUpdate) or die(mysqli_error($db));
            mysqli_query($db, $paymentStatusSqlUpdate) or die(mysqli_error($db));
           $stderr = fopen('php://stderr', 'w');
           fwrite($stderr," Bitcoin points payment processed. ");
           fclose($stderr);
        }
    }else if(!empty($productID)){
        $productSelectedSQL = "SELECT * FROM i_user_product_posts WHERE pr_id = '$productID'";
        
        $stderr = fopen('php://stderr', 'w');
        fwrite($stderr," Bitcoin product payment about to be processed. Here is the SQL ");
        fwrite($stderr, $productSelectedSQL);
        fclose($stderr);
        $productDetailsFromID = mysqli_query($db, $productSelectedSQL) or die(mysqli_error($db));
        $stderr = fopen('php://stderr', 'w');
        fwrite($stderr," productDetailsFromID SQL completed.");
        fwrite($stderr, $productSelectedSQL);
        fclose($stderr);
        $productData = mysqli_fetch_array($productDetailsFromID, MYSQLI_ASSOC);
        $productPrice = isset($productData['pr_price']) ? $productData['pr_price'] : NULL;
        $productOwnerID = isset($productData['iuid_fk']) ? $productData['iuid_fk'] : NULL;
        $adminEarning = ($adminFee * $productPrice) / 100;
        $userEarning = $productPrice - $adminEarning;
        
        if ($amount_fiat < $productPrice) {
            $insuffienceProductPaymentSql = "UPDATE i_user_payments SET payment_status = 'insufficient' WHERE order_key = '" . $orderId . "'";
            $stderr = fopen('php://stderr', 'w');
            fwrite($stderr, $amount_fiat );
            fwrite($stderr," Insufficient bitcoin product payment. Product Price:");
            fwrite($stderr, $productPrice);
            fwrite($stderr," Here's the SQL: ");
            fwrite($stderr, $insuffienceProductPaymentSql);
            fclose($stderr);
            mysqli_query($db, $insuffienceProductPaymentSql) or die(mysqli_error($db));
            $stderr = fopen('php://stderr', 'w');

        } else {
            
            $productPaymentAndStatusSql = "UPDATE i_user_payments SET payment_status = ''payed'' , payed_iuid_fk = '$productOwnerID', amount = '$productPrice', fee = '$adminFee', admin_earning = '$adminEarning', user_earning = '$userEarning' WHERE order_key = '" . $orderId . "'";
            $productPaymentEarningsSqlUpdate = "UPDATE i_users SET wallet_money = wallet_money + '$userEarning' WHERE iuid = '$productOwnerID'";
            
            $stderr = fopen('php://stderr', 'w');
            fwrite($stderr, " productPaymentAndStatusSql: " );
            fwrite($stderr, $productPaymentAndStatusSql);
            fwrite($stderr, " productPaymentEarningsSqlUpdate ");
            fwrite($stderr, $productPaymentEarningsSqlUpdate);
            fwrite($stderr, " About to execute these queries...");
            fclose($stderr);
            
            mysqli_query($db, $productPaymentAndStatusSql) or die(mysqli_error($db));
            mysqli_query($db, $productPaymentEarningsSqlUpdate) or die(mysqli_error($db));
            $stderr = fopen('php://stderr', 'w');
            fwrite($stderr," Product payment complete. ");
            fclose($stderr);
        }
    }
    // Check if payment not successfull
} else {
    
    $bitcoinPaymentDeclinedSql = "UPDATE i_user_payments SET payment_status = 'declined' WHERE paymet_product_id = '$productID'";
    
    $stderr = fopen('php://stderr', 'w');
    fwrite($stderr," Bitcoin payment declined. ");
    fwrite($stderr, $bitcoinPaymentDeclinedSql);
    fclose($stderr);
    
    mysqli_query($db, $bitcoinPaymentDeclinedSql) or die(mysqli_error($db));
    
    //mysqli_query($db, "DELETE FROM i_user_payments WHERE payer_iuid_fk = '$userID' AND payment_option = 'bitcoin' AND payment_type  IN('point','product') AND payment_status = 'pending'") or die(mysqli_error($db));
    // Prepare payment failed data
    $paymentResponseData = [
        'status' => false,
        'rawData' => [],
        'data' => preparePaymentData($orderId, $amount_fiat, null, 'bitcoin'),
    ];
    // Send data to payment response function for further process
    paymentResponse($paymentResponseData);
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
        //header('Location: ' . getAppUrl('payment-success.php'));
        //  var_dump($paymentResponseData);
    } else {
        // Show payment error page or do whatever you want, like send email, notify to user etc
        //header('Location: ' . getAppUrl('payment-failed.php'));
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
        'order_id' => $orderId,
        'amount' => $amount,
        'payment_reference_id' => $txnId,
        'payment_gatway' => $paymentGateway,
    ];
}

/*
exit();
print_r('hello');
var_dump($requestData['PayerID']);




var_dump($requestData);
var_dump(json_encode($_REQUEST));
var_dump($json );
var_dump($data);

$json = file_get_contents('php://input');

$data = json_decode($json);

var_dump($json );
var_dump($data);

$stderr = fopen('php://stderr', 'w');
fwrite($stderr,$json);
fclose($stderr);

exit();

$stderr = fopen('php://stderr', 'w');
fwrite($stderr,"in source response" );
fwrite($stderr,$payment_time );
fclose($stderr);


if (!isset($userID)) {
    //print_r('UserId is null or undefined! Using 11');
    $userID = 1;
    echo($userID);
} else {
    echo($userID);
}
// Check payment Method is paytm
// check if payment was successful!!!
if (true) {
//return;
    

    $orderId = $requestData['order_id'];
    
   // if (isset($requestData['PayerID'])) {
   //none had payerID so they were all just deleted!
    if (true) {
        
        // Then create a data for success paypal data
        $paymentResponseData = [
            'status' => true,
            'rawData' => (array) $requestData,
            'data' => preparePaymentData('invoice-101', '10', 'tx_id-123', 'bitcoin'),
            //'data' => preparePaymentData($rawData['invoice'], $rawData['payment_gross'], $rawData['txn_id'], 'paypal'),
        ];
        // Send data to payment response function for further process


        //$getPamentData = mysqli_query($db, "SELECT * FROM i_user_payments WHERE payment_type IN('point','product') AND payment_status = 'pending' AND payment_option = 'paypal' AND payer_iuid_fk = '$userID'") or die(mysqli_error($db));
        $getPamentData = mysqli_query($db, "SELECT * FROM i_user_payments WHERE order_key = '$orderId' AND payment_type IN('point','product') AND payment_status = 'pending' AND payment_option = 'bitcoin' AND payer_iuid_fk = '$userID'") or die(mysqli_error($db));
        
        $pData = mysqli_fetch_array($getPamentData, MYSQLI_ASSOC);
        $userPayedPlanID = isset($pData['credit_plan_id']) ? $pData['credit_plan_id'] : NULL;
        $payerUserID = isset($pData['payer_iuid_fk']) ? $pData['payer_iuid_fk'] : NULL;
        $productID = isset($pData['paymet_product_id']) ? $pData['paymet_product_id'] : NULL;
        
        //var_dump('productid'+$productID)
        var_dump($userPayedPlanID);
        print_r(":::\n");
        var_dump($productID);
        var_dump($getPamentData);
        var_dump($pData);
        
        if(!empty($userPayedPlanID)){
            $planDetails = mysqli_query($db, "SELECT * FROM i_premium_plans WHERE plan_id = '$userPayedPlanID'") or die(mysqli_error($db));
            $pAData = mysqli_fetch_array($planDetails, MYSQLI_ASSOC);
            $planAmount = $pAData['plan_amount'];
            mysqli_query($db, "UPDATE i_users SET wallet_points = wallet_points + $planAmount WHERE iuid = '$userID'") or die(mysqli_error($db));
            mysqli_query($db, "UPDATE i_user_payments SET payment_status = 'payed' WHERE payer_iuid_fk = '$userID' AND payment_type = 'point' AND payment_option = 'bitcoin'") or die(mysqli_error($db));
        }else if(!empty($productID)){
            $productDetailsFromID = mysqli_query($db, "SELECT * FROM i_user_product_posts WHERE pr_id = '$productID'") or die(mysqli_error($db));
            $productData = mysqli_fetch_array($productDetailsFromID, MYSQLI_ASSOC);
            $productPrice = isset($productData['pr_price']) ? $productData['pr_price'] : NULL;
            $productOwnerID = isset($productData['iuid_fk']) ? $productData['iuid_fk'] : NULL;
            $adminEarning = ($adminFee * $productPrice) / 100;
            $userEarning = $productPrice - $adminEarning;
            mysqli_query($db, "UPDATE i_user_payments SET payment_status = 'payed' , payed_iuid_fk = '$productOwnerID', amount = '$productPrice', fee = '$adminFee', admin_earning = '$adminEarning', user_earning = '$userEarning' WHERE payer_iuid_fk = '$payerUserID' AND payment_type = 'product' AND payment_status = 'pending' AND payment_option = 'bitcoin'") or die(mysqli_error($db));
            mysqli_query($db, "UPDATE i_users SET wallet_money = wallet_money + '$userEarning' WHERE iuid = '$productOwnerID'") or die(mysqli_error($db));
        }
        // Check if payment not successfull
    } else {
        mysqli_query($db, "DELETE FROM i_user_payments WHERE payer_iuid_fk = '$userID' AND payment_option = 'bitcoin' AND payment_type  IN('point','product') AND payment_status = 'pending'") or die(mysqli_error($db));
        // Prepare payment failed data
        $paymentResponseData = [
            'status' => false,
            'rawData' => [],
            'data' => preparePaymentData($rawData['invoice'], $rawData['payment_gross'], null, 'bitcoin'),
        ];
        // Send data to payment response function for further process
        paymentResponse($paymentResponseData);
    }
    
    // Check Paystack payment process
}
*/
