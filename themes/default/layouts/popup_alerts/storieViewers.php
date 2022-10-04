<div class="i_modal_bg_in">
    <!--SHARE-->
   <div class="i_modal_in_in i_sf_box"> 
       <div class="i_modal_content">  
           <!--Modal Header-->
            <div class="i_modal_g_header">
             <?php echo filter_var($LANG['who_have_seen_your_storie'], FILTER_SANITIZE_STRING); ?>
             <div class="shareClose transition"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('5'));?></div>
            </div>
            <!--/Modal Header--> 
            <!--LIST-->
            <div class="viewer_list_container">
                <?php 
                if($swData){ 
                  foreach($swData as $swD){
                      $storieViewerUserID = $swD['i_seen_uid_fk'];
                      $storieViewerUserName = $iN->iN_GetUserName($storieViewerUserID);
                      $storieViewerUserFULLName = $iN->iN_UserFullName($storieViewerUserID);
                      $storieViewerAvatar = $iN->iN_UserAvatar($storieViewerUserID, $base_url);;
                ?>
                <div class="i_message_wrapper transition wpr">
                    <a href="<?php echo filter_var($base_url.$storieViewerUserName, FILTER_SANITIZE_STRING);?>" class="flex_ tabing_non_justify">
                        <div class="i_message_owner_avatar">
                            <div class="i_message_avatar"><img src="<?php echo filter_var($storieViewerAvatar, FILTER_SANITIZE_STRING);?>" alt="<?php echo filter_var($storieViewerUserName, FILTER_SANITIZE_STRING);?>"></div>
                        </div>
                        <div class="i_message_info_container">
                            <div class="i_message_owner_name"><?php echo filter_var($storieViewerUserFULLName, FILTER_SANITIZE_STRING);?></div>
                            <div class="i_message_i">@<?php echo filter_var($storieViewerUserName, FILTER_SANITIZE_STRING);?></div>
                        </div>
                    </a>
                </div>
                <?php } }else{?>
                   <div class="no_one_has_viewed flex_ tabing"><?php echo filter_var($LANG['no_one_has_viewed'], FILTER_SANITIZE_STRING);?></div>
                <?php }?> 
            </div>
            <!--/LIST-->
       </div>   
   </div>
   <!--/SHARE--> 
</div> 