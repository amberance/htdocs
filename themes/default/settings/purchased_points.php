<?php   
$totalPages = ceil($totalPurchasedPoints / $paginationLimit); 
if (isset($_GET["page-id"])) { 
    $pagep  = mysqli_real_escape_string($db, $_GET["page-id"]); 
    if(preg_match('/^[0-9]+$/', $pagep)){
        $pagep = $pagep;
    }else{
        $pagep = '1';
    }
}else{
    $pagep = '1';
} 
?>
<div class="settings_main_wrapper"> 
  <div class="i_settings_wrapper_in" style="display:inline-table;">
     <div class="i_settings_wrapper_title">
       <div class="i_settings_wrapper_title_txt flex_"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('42'));?><?php echo filter_var($LANG['purchased_point_list'], FILTER_SANITIZE_STRING);?></div>
       <div class="i_moda_header_nt"><?php echo html_entity_decode($LANG['purchase_point_list_not']);?></div>
    </div> 
    <div class="i_settings_wrapper_items"> 
       <div class="i_tab_container">   
           <!--PAYMENTS TABLE HEADER-->
           <div class="i_tab_header flex_">
               <div class="tab_item"><?php echo filter_var($LANG['id'], FILTER_SANITIZE_STRING);?></div>
               <div class="tab_item"><?php echo filter_var($LANG['type_of_point_purchased'], FILTER_SANITIZE_STRING);?></div>
               <div class="tab_item item_mobile"><?php echo filter_var($LANG['date'], FILTER_SANITIZE_STRING);?></div>
               <div class="tab_item item_mobile"><?php echo filter_var($LANG['amount'], FILTER_SANITIZE_STRING);?></div>  
               <div class="tab_item"><?php echo filter_var($LANG['status'], FILTER_SANITIZE_STRING);?></div> 
           </div>
           <!--/PAYMENTS TABLE HEADER-->
           <!---->
           <div class="i_tab_list_item_container">
            <?php 
               $paymentHistory = $iN->iN_YourPointPaymentsHistoryList($userID, $paginationLimit, $pagep);
               if($paymentHistory){ 
                  foreach($paymentHistory as $pay){ 
                    $paymentDataID = $pay['payment_id'];
                    $paymentDataPayerUserID = $pay['payer_iuid_fk'];  
                    $paymentDataOrderKey = $pay['order_key'];
                    $paymentDataPaymentType = $pay['payment_type'];
                    $paymentDataPaymentOption = $pay['payment_option'];
                    $paymentDataPaymentTime = $pay['payment_time'];
                    $paymentDataPaymentStatus = $pay['payment_status']; 
                    $paymentDataCreditPlanID = $pay['credit_plan_id'];
                    $getPlanData = $iN->GetPlanDetails($paymentDataCreditPlanID);
                    $pointPurchased = $getPlanData['plan_name_key'];
                    $planPointAmount = $getPlanData['plan_amount'];
                    $planAmount = $getPlanData['amount'];
                    if($paymentDataPaymentStatus == 'pending'){
                        $pStatu = $LANG['payment_waiting_to_be_complete'];
                    }else if($paymentDataPaymentStatus == 'declined'){
                        $pStatu = $LANG['point_payment_cancelled'];
                    }else{
                        $pStatu = $LANG['point_payment_complete'];
                    }
            ?>
                <!--ITEM-->
                <div class="i_tab_list_item flex_">
                    <div class="tab_detail_item"><?php echo filter_var($paymentDataID, FILTER_SANITIZE_STRING);?></div>
                    <div class="tab_detail_item truncated"> 
                       <?php echo isset($LANG[$pointPurchased]) ? $LANG[$pointPurchased] : $pointPurchased;?>
                    </div>
                    <div class="tab_detail_item item_mobile"><?php echo gmdate("d/m/Y", $paymentDataPaymentTime);?></div>
                    <div class="tab_detail_item item_mobile"><?php echo filter_var($currencys[$defaultCurrency], FILTER_SANITIZE_STRING).$planAmount;?></div>
                    <div class="tab_detail_item item_mobile"><?php echo filter_var($pStatu, FILTER_SANITIZE_STRING);?></div> 
               </div>
               <!--/ITEM-->
            <?php }
               }else{
                   echo '<div class="no_creator_f_wrap flex_ tabing"><div class="no_c_icon">'.html_entity_decode($iN->iN_SelectedMenuIcon('54')).'</div><div class="n_c_t">'.$LANG['nothing_to_show_about_payment_history'].'</div></div>';
               }
            ?>  
           </div>
           <!---->
        </div>
    </div>
     <div class="i_become_creator_box_footer tabing">
        <?php if (ceil($totalPurchasedPoints / $paginationLimit) > 0): ?>
            <ul class="pagination">
                <?php if ($pagep > 1): ?>
                <li class="prev"><a class="transition" href="<?php echo filter_var($base_url, FILTER_VALIDATE_URL);?>settings?tab=purchased_points&page-id=<?php echo filter_var($pagep, FILTER_SANITIZE_STRING)-1 ?>"><?php echo filter_var($LANG['preview_page'], FILTER_SANITIZE_STRING);?></a></li>
                <?php endif; ?>

                <?php if ($pagep > 3): ?>
                <li class="start"><a class="transition" href="<?php echo filter_var($base_url, FILTER_VALIDATE_URL);?>settings?tab=purchased_points&page-id=1">1</a></li>
                <li class="dots">...</li>
                <?php endif; ?>

                <?php if ($pagep-2 > 0): ?><li class="page"><a class="transition" href="<?php echo filter_var($base_url, FILTER_VALIDATE_URL);?>settings?tab=purchased_points&page-id=<?php echo filter_var($pagep, FILTER_SANITIZE_STRING)-2; ?>"><?php echo filter_var($pagep, FILTER_SANITIZE_STRING)-2; ?></a></li><?php endif; ?>
                <?php if ($pagep-1 > 0): ?><li class="page"><a href="<?php echo filter_var($base_url, FILTER_VALIDATE_URL);?>settings?tab=purchased_points&page-id=<?php echo filter_var($pagep, FILTER_SANITIZE_STRING)-1; ?>"><?php echo filter_var($pagep, FILTER_SANITIZE_STRING)-1; ?></a></li><?php endif; ?>

                <li class="currentpage active"><a  class="transition" href="<?php echo filter_var($base_url, FILTER_VALIDATE_URL);?>settings?tab=purchased_points&page-id=<?php echo filter_var($pagep, FILTER_SANITIZE_STRING); ?>"><?php echo filter_var($pagep, FILTER_SANITIZE_STRING); ?></a></li>

                <?php if ($pagep+1 < ceil($totalPurchasedPoints / $paginationLimit)+1): ?><li class="page"><a class="transition" href="<?php echo filter_var($base_url, FILTER_VALIDATE_URL);?>settings?tab=purchased_points&page-id=<?php echo filter_var($pagep, FILTER_SANITIZE_STRING)+1; ?>"><?php echo filter_var($pagep, FILTER_SANITIZE_STRING)+1; ?></a></li><?php endif; ?>
                <?php if ($pagep+2 < ceil($totalPurchasedPoints / $paginationLimit)+1): ?><li class="page"><a class="transition" href="<?php echo filter_var($base_url, FILTER_VALIDATE_URL);?>settings?tab=purchased_points&page-id=<?php echo filter_var($pagep, FILTER_SANITIZE_STRING)+2; ?>"><?php echo filter_var($pagep, FILTER_SANITIZE_STRING)+2; ?></a></li><?php endif; ?>

                <?php if ($pagep < ceil($totalPurchasedPoints / $paginationLimit)-2): ?>
                <li class="dots">...</li>
                <li class="end"><a class="transition" href="<?php echo filter_var($base_url, FILTER_VALIDATE_URL);?>settings?tab=purchased_points&page-id=<?php echo ceil($totalPurchasedPoints / $paginationLimit); ?>"><?php echo ceil($totalPurchasedPoints / $paginationLimit); ?></a></li>
                <?php endif; ?>

                <?php if ($pagep < ceil($totalPurchasedPoints / $paginationLimit)): ?>
                <li class="next"><a class="transition" href="<?php echo filter_var($base_url, FILTER_VALIDATE_URL);?>settings?tab=purchased_points&page-id=<?php echo filter_var($pagep, FILTER_SANITIZE_STRING)+1; ?>"><?php echo filter_var($LANG['next_page'], FILTER_SANITIZE_STRING);?></a></li>
                <?php endif; ?>
            </ul>
        <?php endif; ?>    
     </div> 
  </div> 
</div> 