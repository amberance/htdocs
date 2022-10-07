<div class="i_modal_bg_in videoCalli">
    <!--SHARE-->
   <div class="i_modal_in_in modal_tip"> 
       <div class="i_modal_content">   
            <!---->
            <div class="call_details">
                <div class="caller_user_avatar">
                    <div class="caller_avatar" style="background-image:url(<?php echo $callerUserAvatar;?>);"></div>
                </div>
                <?php  if($userCurrentPoints < $videoCallPrice){?> 
                <div class="current_point_box_video"> 
                   <div class="current_balance_box flex_ tabing_non_justify"><?php echo filter_var($LANG['not_enough_make_video_call'], FILTER_SANITIZE_STRING);?></div>
                   <div class="current_balance_box flex_ tabing_non_justify"><?php echo filter_var($LANG['point_balance'], FILTER_SANITIZE_STRING);?> <span class="crnblnc"><?php echo number_format($userCurrentPoints);?></span> <?php echo html_entity_decode($iN->iN_SelectedMenuIcon('40'));?><a href="<?php echo $base_url.'purchase/purchase_point';?>" target="blank_" class="transitions"><?php echo filter_var($LANG["get_points"], FILTER_SANITIZE_STRING);?></a></div>
                </div> 
                <?php }else{?>
                    <div class="caller_title"><?php echo preg_replace( '/{.*?}/', $callerUserFullName, $LANG['invitation_will_be_send_after_payment']); ?></div>
                <div class="caller_det">
                   <?php echo preg_replace( '/{.*?}/', $videoCallPrice, $LANG['give_point']); ?> 
                </div>
                <div class="current_point_box_video">  
                   <div class="current_balance_box flex_ tabing_non_justify"><?php echo filter_var($LANG['point_balance'], FILTER_SANITIZE_STRING);?> <span class="crnblnc"><?php echo number_format($userCurrentPoints);?></span> <?php echo html_entity_decode($iN->iN_SelectedMenuIcon('40'));?><a href="<?php echo $base_url.'purchase/purchase_point';?>" target="blank_" class="transitions"><?php echo filter_var($LANG["get_points"], FILTER_SANITIZE_STRING);?></a></div>
                </div> 
                <?php } ?>
                <div class="call_buttons flex_ tabing">  
                    <?php if($userCurrentPoints >= $videoCallPrice){?> 
                        <div class="call_btn_item flex_ tabing">
                            <div class="call_btn_item_btn_accept flex_ tabing joinVideoCall"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('151')); ?><?php echo filter_var($LANG['pay'], FILTER_SANITIZE_STRING).' '.$videoCallPrice.' <span>'.filter_var($LANG['point'], FILTER_SANITIZE_STRING).'</span>';?></div>
                        </div>
                    <?php } ?>
                    <div class="call_btn_item flex_ tabing">
                        <div class="call_btn_item_btn_decline flex_ tabing call_decline"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('31')); ?><?php echo filter_var($LANG['cancel'], FILTER_SANITIZE_STRING);?></div>
                    </div>
                </div> 
            </div>
            <!---->
       </div>   
   </div>
   <!--/SHARE-->  
</div>  