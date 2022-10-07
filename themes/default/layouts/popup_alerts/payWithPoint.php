<div class="i_modal_bg_in i_subs_modal" style="z-index:5;">
    <!--SHARE-->
   <div class="i_modal_in_in i_payment_pop_box">  
       <div class="i_modal_content bySub">  
           <div class="payClose transition"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('5'));?></div>
           <!--Subscribing Avatar-->
           <div class="i_subscribing" style="background-image:url(<?php echo filter_var($f_profileAvatar, FILTER_SANITIZE_STRING);?>);"></div>
           <!--/Subscribing Avatar-->
           <!---->
           <div class="i_subscribing_note" id="pln" data-p="<?php echo filter_var($planID, FILTER_SANITIZE_STRING);?>">
              <?php echo preg_replace( '/{.*?}/', $f_userfullname, $LANG['subscription_payment']); ?>
           </div>
           <!---->
           <!----> 
           <div class="i_credit_card_form">
                <div id="paymentResponse"></div>
                <div class="pay_form_group point_subs_not"> 
                    <?php
                    if($planType == 'weekly'){
                        echo filter_var($LANG['subscription_point_weekly_payment_not'], FILTER_SANITIZE_STRING);
                    }else if($planType == 'monthly'){
                        echo filter_var($LANG['subscription_point_monthly_payment_not'], FILTER_SANITIZE_STRING);
                    }else if($planType == 'yearly'){
                        echo filter_var($LANG['subscription_point_yearly_payment_not'], FILTER_SANITIZE_STRING);
                    }
                    ?>
                </div> 
           </div> 
           <!---->
           <?php if($userCurrentPoints >= $f_PlanAmount) { ?>
            <div class="pay_form_group">
                <div class="pay_subscription_point transition subMyPoint" id="<?php echo filter_var($planID, FILTER_SANITIZE_STRING);?>" data-u="<?php echo filter_var($iuID, FILTER_SANITIZE_STRING);?>"><?php echo filter_var($LANG['pay'], FILTER_SANITIZE_STRING);?> <?php echo $f_PlanAmount.html_entity_decode($iN->iN_SelectedMenuIcon('40'));?></div>
            </div>
           <?php }else {?>
            <div class="pay_form_group">
                <div class="pay_subscription_point_renew transition"><a href="<?php echo $base_url.'purchase/purchase_point';?>"><?php echo filter_var($LANG['you_dont_have_a_enough_point_to_subscribe'], FILTER_SANITIZE_STRING);?></a></div>
           </div>
           <?php } ?> 
           <!---->
           <div class="pay_form_group cntsub" style="display:none;">
               <?php echo html_entity_decode($LANG['can_not_subscribe']);?>
           </div>
           <div class="pay_from_froup insfsub" style="display:none;">
              <?php echo html_entity_decode($LANG['insufficient_balance']);?>
           </div>
           <!---->
       </div>   
   </div>
   <!--/SHARE--> 
<script> 
    $(document).on("click", ".payClose", function() { 
        $(".i_payment_pop_box").addClass("i_modal_in_in_out");
        setTimeout(() => {
            $(".i_subs_modal").remove(); 
        }, 200);
}); 
</script> 
</div> 