<?php



require_once 'includes/inc.php';

$payment_time = time();



$requestData = $_REQUEST;
echo $requestData['PayerID'];
echo $requestData['PayerID'];
print_r('hello');
var_dump($requestData['PayerID']);

var_dump($requestData);
var_dump(json_encode($_REQUEST));
$json = file_get_contents('php://input');

$data = json_decode($json);

var_dump($json );
var_dump($data);

$stderr = fopen('php://stderr', 'w');
fwrite($stderr,$json);
fclose($stderr);



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
    
    if (isset($requestData['PayerID'])) {
        
        // Then create a data for success paypal data
        $paymentResponseData = [
            'status' => true,
            'rawData' => (array) $requestData,
            'data' => preparePaymentData('invoice-101', '10', 'tx_id-123', 'bitcoin'),
            //'data' => preparePaymentData($rawData['invoice'], $rawData['payment_gross'], $rawData['txn_id'], 'paypal'),
        ];
        // Send data to payment response function for further process
        
        /******************* paymentResponse($paymentResponseData); */

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
            mysqli_query($db, "UPDATE i_user_payments SET payment_status = 'ok' WHERE payer_iuid_fk = '$userID' AND payment_type = 'point' AND payment_option = 'bitcoin'") or die(mysqli_error($db));
        }else if(!empty($productID)){
            $productDetailsFromID = mysqli_query($db, "SELECT * FROM i_user_product_posts WHERE pr_id = '$productID'") or die(mysqli_error($db));
            $productData = mysqli_fetch_array($productDetailsFromID, MYSQLI_ASSOC);
            $productPrice = isset($productData['pr_price']) ? $productData['pr_price'] : NULL;
            $productOwnerID = isset($productData['iuid_fk']) ? $productData['iuid_fk'] : NULL;
            $adminEarning = ($adminFee * $productPrice) / 100;
            $userEarning = $productPrice - $adminEarning;
            mysqli_query($db, "UPDATE i_user_payments SET payment_status = 'ok' , payed_iuid_fk = '$productOwnerID', amount = '$productPrice', fee = '$adminFee', admin_earning = '$adminEarning', user_earning = '$userEarning' WHERE payer_iuid_fk = '$payerUserID' AND payment_type = 'product' AND payment_status = 'pending' AND payment_option = 'bitcoin'") or die(mysqli_error($db));
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
        header('Location: ' . getAppUrl('payment-success.php'));
        //  var_dump($paymentResponseData);
    } else {
        // Show payment error page or do whatever you want, like send email, notify to user etc
        header('Location: ' . getAppUrl('payment-failed.php'));
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