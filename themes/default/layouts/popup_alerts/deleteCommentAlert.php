<div class="i_modal_bg_in">
    <!--SHARE-->
   <div class="i_modal_in_in"> 
       <div class="i_modal_content">  
            <!--Modal Header-->
            <div class="i_modal_g_header">
                <?php echo filter_var($LANG['delete_comment'], FILTER_SANITIZE_STRING);?>
                <div class="shareClose transition"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('5'));?></div>
            </div>
            <!--/Modal Header-->
            <div class="i_delete_post_description">
               <?php echo filter_var($LANG['comment_delete_alert_not'], FILTER_SANITIZE_STRING);?>
            </div>
            <!--Modal Header-->
            <div class="i_modal_g_footer">
                <div class="alertBtnRight dlCm transition" id="<?php echo filter_var($commentID, FILTER_SANITIZE_STRING);?>" data-id="<?php echo filter_var($postID, FILTER_SANITIZE_STRING);?>"><?php echo filter_var($LANG['ok'], FILTER_SANITIZE_STRING);?></div>
                <div class="alertBtnLeft no-del transition"><?php echo filter_var($LANG['no'], FILTER_SANITIZE_STRING);?></div>
            </div>
            <!--/Modal Header-->
       </div>   
   </div>
   <!--/SHARE--> 
</div> 