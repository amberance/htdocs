<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <title><?php echo filter_var($siteTitle, FILTER_SANITIZE_STRING);?></title>
    <?php
       include("layouts/header/meta.php");
       include("layouts/header/css.php");
       include("layouts/header/javascripts.php");
    ?>
</head>
<body>  
<?php include("layouts/header/header.php");?> 
    <div class="wrapper">  
       <div class="settings_wrapper">
          <?php 
            include("settings/settings_menu.php");
            if($pageGet){
               if($pageGet == 'my_profile'){ 
                  include("settings/profile_settings.php");
               }else if($pageGet == 'email_settings'){
                  include("settings/email_settings.php");
               }else if($pageGet == 'payments'){
                  include("settings/payments.php");
               }else if($pageGet == 'payout_methods'){
                  include("settings/payout_methods.php");
               }else if($pageGet == 'fees'){
                  include("settings/subscription_fees.php");
               }else if($pageGet == 'payout_history'){
                  include("settings/payout_history.php");
               }else if($pageGet == 'withdrawal'){
                  include("settings/withdrawal.php");
               }else if($pageGet == 'subscription_payments'){
                  include("settings/subscription_payments.php");
               }else if($pageGet == 'subscribers'){
                  include("settings/subscribers.php");
               }else if($pageGet == 'subscriptions'){
                  include("settings/subscriptions.php");
               }else if($pageGet == 'dashboard'){
                  include("settings/dashboard.php");
               }else if($pageGet == 'blocked'){
                  include("settings/blocked.php");
               }else if($pageGet == 'password'){
                  include("settings/password.php");
               }else if($pageGet == 'preferences'){
                  include("settings/preferences.php");
               }else if($pageGet == 'my_payments'){
                  include("settings/my_payments.php");
               }else if($pageGet == 'block_country'){
                  include("settings/block_country.php");
               }else if($pageGet == 'my_followers'){
                  include("settings/my_followers.php");
               }else if($pageGet == 'im_following'){
                  include("settings/im_following.php");
               }else if($pageGet == 'purchased_points'){
                  include("settings/purchased_points.php");
               }else if($pageGet == 'qrCode'){
                  include("settings/qrCodeGenerator.php");
               }else if($pageGet == 'affiliate'){
                  include("settings/affilateSettings.php"); 
               }else if($pageGet == 'earned_points'){
                  include("settings/earnedPoints.php"); 
               }else if($pageGet == 'stories'){
                  include("settings/stories.php"); 
               }else if($pageGet == 'createaProduct'){
                  include("settings/createaProduct.php"); 
               }else if($pageGet == 'myProducts'){
                  include("settings/myProducts.php");  
               }else if($pageGet == 'mySales'){
                  include("settings/mySales.php"); 
               }else if($pageGet == 'myPurchasedProducts'){
                  include("settings/myPurchasedProducts.php"); 
               }else if($pageGet == 'videoCallSet'){
                  include("settings/videoCallSet.php"); 
               }
            }else{
               include("settings/profile_settings.php");
            }
          ?>
       </div>      
    </div>
</body>
</html>