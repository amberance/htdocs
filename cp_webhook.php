<?php 
include_once "includes/inc.php";   
require_once('includes/coinPayment/vendor/autoload.php');
$txnID = isset($_POST['txn_id']) ? $_POST['txn_id'] : NULL;
$request = "php://input";
$ch = curl_init();
// Return Page contents.
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
// Grab URL and pass it to the variable
curl_setopt($ch, CURLOPT_URL, $request);
$result = curl_exec($ch);
if($request === false || empty($request)){
   exit('Olmadi');
}
// 199.898
$status = intval($_POST['status']); 
if($status >= 100 || $status == 2){
    $query = mysqli_query($db,"SELECT * FROM i_user_payments WHERE order_key = '$txnID'") or die(mysqli_error($db));
    if(mysqli_num_rows($query) == 1){
        $queryData = mysqli_fetch_array($query, MYSQLI_ASSOC);
        $creditPlanID = isset($queryData['credit_plan_id']) ? $queryData['credit_plan_id'] : NULL;
        $payerUserID = isset($queryData['payer_iuid_fk']) ? $queryData['payer_iuid_fk'] : NULL;
        $planData = $iN->GetPlanDetails($creditPlanID);
        $planAmount = isset($planData['plan_amount']) ? $planData['plan_amount'] : NULL;
        mysqli_query($db, "UPDATE i_user_payments SET payment_status = 'ok' WHERE order_key = '$txnID'") or die(mysqli_error($db));
        mysqli_query($db, "UPDATE i_users SET wallet_points = wallet_points + '$planAmount' WHERE iuid = '$payerUserID'") or die(mysqli_error($db));
    }
}else if($status < 0){
    $query = mysqli_query($db,"SELECT * FROM i_user_payments WHERE order_key = '$txnID'") or die(mysqli_error($db));
    if(mysqli_num_rows($query) == 1){
        mysqli_query($db, "UPDATE i_user_payments SET payment_status = 'declined' WHERE order_key = '$txnID'") or die(mysqli_error($db));
    }
}else {
    $query = mysqli_query($db,"SELECT * FROM i_user_payments WHERE order_key = '$txnID'") or die(mysqli_error($db));
    if(mysqli_num_rows($query) == 1){
        mysqli_query($db, "UPDATE i_user_payments SET payment_status = 'pending' WHERE order_key = '$txnID'") or die(mysqli_error($db));
    }  
}
?>