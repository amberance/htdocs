<?php 
ob_start();
session_start();
include_once "connect.php";
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL); 
include_once "functions.php";
$iN = new iN_UPDATES($db); 
$inc = $iN->iN_Configurations();
$subscriptionType = isset($inc['subscription_type']) ? $inc['subscription_type'] : NULL;
$query = mysqli_query($db,"SELECT subscription_id,iuid_fk, subscribed_iuid_fk,plan_interval, SUM(user_net_earning) AS calculate FROM i_user_subscriptions WHERE status IN('active','inactive') AND in_status IN('1','0') AND finished = '0' AND plan_interval = 'year' AND DATE_FORMAT(plan_period_start, '%Y-%m-%d') = date_format(curdate() ,'%Y-%m-%d')  GROUP BY subscribed_iuid_fk") or die(mysqli_error($db));
if(mysqli_num_rows($query) > 0){
  while($row = mysqli_fetch_assoc($query)){ 
    $subscriptionID = $row['subscription_id'];
    $iuidFK = $row['subscribed_iuid_fk'];
    $subscriberUidFK = $row['iuid_fk'];
    $amountPayable = $row['calculate']; 
    $time = strtotime('+1 year', time());
    $startNewStart = date("Y-m-d H:i:s", time());
    $startNewEnd = date("Y-m-d H:i:s", $time);
    $userDetail = $iN->iN_GetUserDetails($iuidFK);
    $payoutMethod = $userDetail['payout_method']; 
    $planInterval = $row['plan_interval'];
    if($planInterval == 'week'){
      $pInterval = 'weekly';
    }else if($planInterval == 'month'){
      $pInterval = 'montly';
    }else{
      $pInterval = 'yearly';
    } 
    if($subscriptionType == '2'){ 
        $planData = $iN->iN_GetUserSubscriptionPlanDetails($iuidFK, $pInterval);
        $planAmount = $planData['amount'];
        $uDat = $iN->iN_GetUserDetails($subscriberUidFK);
        $walletPoint = $uDat['wallet_points'];
        if($walletPoint >= $planAmount){
            mysqli_query($db,"UPDATE i_users SET wallet_money = wallet_money + $amountPayable WHERE iuid = '$iuidFK'") or die(mysqli_error($db));
            mysqli_query($db,"UPDATE i_users SET wallet_points = wallet_points - '$planAmount' WHERE iuid = '$subscriberUidFK'") or die(mysqli_error($db)); 
            mysqli_query($db, "UPDATE i_user_subscriptions SET plan_period_start = '$startNewEnd', plan_period_end = '$startNewEnd' WHERE subscription_id = '$subscriptionID'") or die(mysqli_error($db)); 
        }else{
            mysqli_query($db, "UPDATE i_friends SET fr_status = 'flwr' WHERE fr_one = '$subscriberUidFK' AND fr_two='$iuidFK'") or die(mysqli_error($db));
            mysqli_query($db, "UPDATE i_user_subscriptions SET status = 'declined', finished = '1', in_status = '1' WHERE subscription_id = '$subscriptionID'") or die(mysqli_error($db)); 
        } 
        mysqli_query($db, "UPDATE i_user_subscriptions SET finished = '1' WHERE subscription_id = '$subscriptionID' AND status = 'inactive' AND in_status = '1'") or die(mysqli_error($db));
    }else{
      mysqli_query($db, "UPDATE i_user_subscriptions SET plan_period_start = '$startNewEnd', plan_period_end = '$startNewEnd' WHERE subscription_id = '$subscriptionID'") or die(mysqli_error($db)); 
      mysqli_query($db,"UPDATE i_users SET wallet_money = wallet_money + '$amountPayable' WHERE iuid = '$iuidFK'") or die(mysqli_error($db));
    }
    
 } 
}
?>

