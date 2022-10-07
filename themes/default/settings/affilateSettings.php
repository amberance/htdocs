<div class="settings_main_wrapper"> 
  <div class="i_settings_wrapper_in" style="display:inline-table;">
     <div class="i_settings_wrapper_title">
       <div class="i_settings_wrapper_title_txt flex_"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('148'));?><?php echo filter_var($LANG['my_affilate'], FILTER_SANITIZE_STRING);?></div> 
    </div> 
    <div class="i_settings_wrapper_items"> 
    <div class="payouts_form_container"> 
    <div class="i_payout_methods_form_container">  
    <!--SET SUBSCRIPTION FEE BOX-->
    <div class="i_set_subscription_fee_box email_not createQrBox"> 
        <div class="i_sub_not i_preference">
        <?php echo html_entity_decode($iN->iN_SelectedMenuIcon('148'));?> <?php echo filter_var($LANG['my_affilate'], FILTER_SANITIZE_STRING);?> 
        </div>  
        <div class="i_sub_not_check i_pref">
             <div class="i_wrapper_cnt flex_ tabing">
                 <div class="ia_affiliate_wrapper flex_ tabing"></div>
                 <div class="iu_affilate_link">
                    <div class="flex_ tabing your_balance"><?php echo filter_var($LANG['your_af_balance'], FILTER_SANITIZE_STRING);?></div>
                     <div class="flex_ tabing affilate_earnings"><span class="af_total"><?php echo isset($userData['affilate_earnings']) ? $userData['affilate_earnings'] : NULL;?></span><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('40'));?></div>
                    <div class="flex_ tabing affilate_not"><?php echo filter_var($LANG['affilate_not'], FILTER_SANITIZE_STRING);?></div>
                     <input type="text" id="link" class="i_affilate_input" value="<?php echo $base_url.'register?ref='.$userName;?>" autocomplete="off" onclick="this.select();" readonly="">
                     <div class="iu_affilate_link">
                   <div class="move_my_point"><?php echo filter_var($LANG['move_earnings_to_point_balance'], FILTER_SANITIZE_STRING);?></div>
                 </div>
                    </div> 
             </div>
        </div>   
         <?php $shareUrl = $base_url.'register?ref='.base64_encode($userName);?>
         <div class="qrCodeShareButtons flex_ tabing">
            <div class="qrSocialIcon flex_ tabing share_to"><?php echo filter_var($LANG['share_to'], FILTER_SANITIZE_STRING);?></div>
           <div class="qrSocialIcon flex_ tabing" onclick="share('facebook', '<?php echo filter_var($shareUrl, FILTER_VALIDATE_URL); ?>', '<?php echo filter_var($userID, FILTER_SANITIZE_STRING); ?>')"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('90'));?></div>
           <div class="qrSocialIcon flex_ tabing" onclick="share('twitter', '<?php echo filter_var($shareUrl, FILTER_VALIDATE_URL); ?>', '<?php echo filter_var($userID, FILTER_SANITIZE_STRING); ?>')"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('34'));?></div>
           <div class="qrSocialIcon flex_ tabing" onclick="share('linkedin', '<?php echo filter_var($shareUrl, FILTER_VALIDATE_URL); ?>', '<?php echo filter_var($userID, FILTER_SANITIZE_STRING); ?>')"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('89'));?></div>
           <div class="qrSocialIcon flex_ tabing" onclick="share('whatsapp', '<?php echo filter_var($shareUrl, FILTER_VALIDATE_URL); ?>', '<?php echo filter_var($userID, FILTER_SANITIZE_STRING); ?>')"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('147'));?></div>
         </div>  
    </div>
    <!--/SET SUBSCRIPTION FEE BOX-->   
 <script type="text/javascript">
 (function($) {
    "use strict";
    $(document).on("click", ".move_my_point", function() {
        var type = 'moveMyAffilateBalance';
        var point = '<?php echo isset($userData['affilate_earnings']) ? $userData['affilate_earnings'] : NULL;?>';
        var data = 'f=' + type + '&myp=' + point;
        $.ajax({
            type: "POST",
            url: siteurl + 'requests/request.php',
            data: data,
            cache: false,
            beforeSend: function() {
                $(".move_my_point").hide().css("pointer-events", "none");
            },
            success: function(response) {
                if (response == 'me') {
                    PopUPAlerts('sRong', 'ialert');
                } else {
                  location.reload();
                }
                setTimeout(() => {
                    $(".move_my_point").show().css("pointer-events", "auto");
                }, 2000);

            }
        });
    });
  })(jQuery);  
 </script>    
      </div>
    </div>
    </div> 
  </div>
</div>  