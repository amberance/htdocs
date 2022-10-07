<div class="settings_main_wrapper"> 
  <div class="i_settings_wrapper_in" style="display:inline-table;">
     <div class="i_settings_wrapper_title">
       <div class="i_settings_wrapper_title_txt flex_"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('52'));?><?php echo filter_var($LANG['videoCallSet'], FILTER_SANITIZE_STRING);?></div> 
       <div class="i_moda_header_nt"><strong><?php echo filter_var($LANG['all_processing_fee_note'], FILTER_SANITIZE_STRING);?></strong></div>
    </div> 
    <div class="i_settings_wrapper_items"> 
    <div class="payouts_form_container"> 
    <div class="i_payout_methods_form_container">     
    <!--SET SUBSCRIPTION FEE BOX-->
    <div class="i_set_subscription_fee_box"> 
        <div class="i_sub_not">
        <?php echo filter_var($LANG['video_call_fee'], FILTER_SANITIZE_STRING);?><span class="monthly_success"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('69'));?></span>
        </div>  
        <div class="i_sub_not_check">
        <?php echo filter_var($LANG['video_call_fee_not'], FILTER_SANITIZE_STRING);?>
            
        </div>
        <div class="i_t_warning" id="wmonthly"><?php echo filter_var($LANG['video_call_cost_warning'], FILTER_SANITIZE_STRING);?></div> 
        <div class="i_set_subscription_fee">
           <div class="i_subs_currency"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('40'));?></div>
           <div class="i_subs_price"><input type="text" class="transition aval" id="spmonth" placeholder="<?php echo filter_var($LANG['video_call_cost'], FILTER_SANITIZE_STRING);?>" onkeypress='return event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57)' value="<?php echo isset($myVideoCallPrice) ? $myVideoCallPrice : NULL;?>"></div>
           <div class="i_subs_interval"><?php echo  $currencys[$defaultCurrency].'<span class="pricecal">'.$myVideoCallPrice*$onePointEqual.'</span>';?></div>
        </div>
        <div class="i_t_warning_earning mamonthly_earning"><?php echo filter_var($LANG['potential_gain'], FILTER_SANITIZE_STRING);?> <?php echo filter_var($currencys[$defaultCurrency], FILTER_SANITIZE_STRING);?><span id="mamonthly_earning"></span></div>
    </div>
    <!--/SET SUBSCRIPTION FEE BOX--> 
   </div>
</div>
    </div>
    <div class="i_settings_wrapper_item successNot">
        <?php echo filter_var($LANG['payment_settings_updated_success'], FILTER_SANITIZE_STRING)?>
    </div> 
    <div class="i_become_creator_box_footer tabing">
        <div class="i_nex_btn c_UpdateCostV transition"><?php echo filter_var($LANG['save_edit'], FILTER_SANITIZE_STRING);?></div>
     </div> 
  </div>
</div>  
<script type="text/javascript">
(function($) {
    "use strict";

    $(document).on("keyup", ".aval", function() {
        var copyEmoji = $(this).val();
        $(".i_t_warning").hide();
        if(copyEmoji == '0' || copyEmoji == '' || copyEmoji == 'undefined'){
           $(".i_t_warning").show();
        }
        $(".pricecal").text(copyEmoji * <?php echo filter_var($onePointEqual);?>);
    });
    $(document).on("click", ".c_UpdateCostV", function() {
       var videoCost = $(".aval").val();
       var data = 'f=vCost&vCostFee=' + videoCost;
        $.ajax({
            type: 'POST',
            url: siteurl + 'requests/request.php',
            data: data,
            beforeSend: function() {},
            success: function(response) {
                  if(response == 'not'){
                    $(".i_t_warning").show();
                  }else{
                    $(".successNot").show();
                  }
            }
        });
    });
})(jQuery);
</script>