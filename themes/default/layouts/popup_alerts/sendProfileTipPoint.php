<div class="i_modal_bg_in">
    <!--SHARE-->
   <div class="i_modal_in_in modal_tip"> 
       <div class="i_modal_content">  
            <!--Modal Header-->
            <div class="i_modal_g_header">
             <?php echo preg_replace( '/{.*?}/', $f_userfullname, $LANG['send_tip_to']); ?>
             <div class="shareClose transition"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('5'));?></div>
            </div>
            <!--/Modal Header--> 
            <!--Sharing POST DETAILS-->
            <div class="i_more_text_wrapper">
                <!---->
                <div class="i_set_subscription_fee_box">
                    <div class="i_set_subscription_fee" id="<?php echo filter_var($tipingUserID, FILTER_SANITIZE_STRING);?>">
                        <div class="i_subs_currency"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('40'));?></div>
                        <div class="i_subs_price"><input type="text" class="transition aval border-right-radius" id="tipVal" placeholder="<?php echo filter_var($LANG['amount_in_points'], FILTER_SANITIZE_STRING);?>" onkeypress='return event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57)' ></div>
                    </div>
                    <div class="i_tip_not"><?php echo filter_var($LANG['min_tip_amount'], FILTER_SANITIZE_STRING);?></div>
                </div>
                <!---->
            </div>
            <!--/Sharing POST DETAILS--> 
            <!--FOOTER-->
            <div class="i_block_box_footer_container">
                <div class="send_tip_btn_profile"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('40'));?> <?php echo filter_var($LANG['send_your_tip'], FILTER_SANITIZE_STRING);?></div>
            </div>
            <!--/FOOTER-->
       </div>   
   </div>
   <!--/SHARE--> 
</div>