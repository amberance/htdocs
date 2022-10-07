<div class="i_modal_bg_in videoCall">
    <!--SHARE-->
   <div class="i_modal_in_in modal_tip"> 
       <div class="i_modal_content">   
            <!---->
            <div class="call_details">
                <div class="caller_user_avatar">
                    <div class="caller_avatar" style="background-image:url(<?php echo $callerUserAvatar;?>);"></div>
                </div>
                <div class="caller_title"><?php echo filter_var($LANG['v_calling'], FILTER_SANITIZE_STRING);?> <?php echo $callerUserFullName;?></div>
                <div class="caller_det">
                   <?php echo filter_var($LANG['please_wait_for_your_friend_answer_video_calling'], FILTER_SANITIZE_STRING); ?> 
                </div>
                <div class="call_declined"> 
                   <?php echo filter_var($LANG['declined_call'], FILTER_SANITIZE_STRING); ?> 
                </div>  
                <div class="call_buttons flex_ tabing"> 
                    <div class="call_btn_item flex_ tabing">
                        <div class="call_btn_item_btn_decline flex_ tabing leave"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('31')); ?><?php echo filter_var($LANG['cancel'], FILTER_SANITIZE_STRING);?></div>
                    </div>
                </div>
            </div>
            <!---->
       </div>   
   </div>
   <!--/SHARE-->  
</div>  