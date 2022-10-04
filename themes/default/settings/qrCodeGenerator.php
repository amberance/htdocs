<div class="settings_main_wrapper"> 
  <div class="i_settings_wrapper_in" style="display:inline-table;">
     <div class="i_settings_wrapper_title">
       <div class="i_settings_wrapper_title_txt flex_"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('146'));?><?php echo filter_var($LANG['qrCodeGenerator'], FILTER_SANITIZE_STRING);?></div> 
    </div> 
    <div class="i_settings_wrapper_items"> 
    <div class="payouts_form_container"> 
    <div class="i_payout_methods_form_container">  
    <!--SET SUBSCRIPTION FEE BOX-->
    <div class="i_set_subscription_fee_box email_not createQrBox"> 
        <div class="i_sub_not i_preference">
        <?php echo html_entity_decode($iN->iN_SelectedMenuIcon('146'));?> <?php echo filter_var($LANG['create_qr_code'], FILTER_SANITIZE_STRING);?> 
        </div>  
        <div class="i_sub_not_check i_pref">
           <div class="qrCodeImage" id="message<?php echo $userID;?>">
              <?php if($userQrCode){?>
                <img src="<?php echo $base_url.$userQrCode;?>">
              <?php } ?>
           </div>
        </div>  
        <?php if($userQrCode){ $shareUrl = $base_url.'sharer?page='.base64_encode($userName)."&qr=1";?>
         <div class="qrCodeShareButtons flex_ tabing_non_justify">
           <div class="qrSocialIcon flex_ tabing" onclick="share('facebook', '<?php echo filter_var($shareUrl, FILTER_VALIDATE_URL); ?>', '<?php echo filter_var($userID, FILTER_SANITIZE_STRING); ?>')"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('90'));?></div>
           <div class="qrSocialIcon flex_ tabing" onclick="share('twitter', '<?php echo filter_var($shareUrl, FILTER_VALIDATE_URL); ?>', '<?php echo filter_var($userID, FILTER_SANITIZE_STRING); ?>')"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('34'));?></div>
           <div class="qrSocialIcon flex_ tabing" onclick="share('linkedin', '<?php echo filter_var($shareUrl, FILTER_VALIDATE_URL); ?>', '<?php echo filter_var($userID, FILTER_SANITIZE_STRING); ?>')"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('89'));?></div>
           <div class="qrSocialIcon flex_ tabing" onclick="share('whatsapp', '<?php echo filter_var($shareUrl, FILTER_VALIDATE_URL); ?>', '<?php echo filter_var($userID, FILTER_SANITIZE_STRING); ?>')"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('147'));?></div>
         </div>
        <?php }?>
        <div class="qrCodeGenerator flex_ tabing border-right-radius"><?php echo filter_var($LANG['create_qrcode'], FILTER_SANITIZE_STRING);?></div>
        <div class="box_not"><?php echo filter_var($LANG['create_qr_code_not'], FILTER_SANITIZE_STRING);?></div>
    </div>
    <!--/SET SUBSCRIPTION FEE BOX-->  
     
   </div>
</div>
    </div> 
  </div>
</div>  