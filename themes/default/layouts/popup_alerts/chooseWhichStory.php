<div class="i_modal_bg_in">
    <!--SHARE-->
   <div class="i_modal_in_in"> 
       <div class="i_modal_content">  
            <!--Modal Header-->
            <div class="i_modal_g_header">
             <?php echo filter_var($LANG['choose_your_story_type'], FILTER_SANITIZE_STRING); ?>
             <div class="shareClose transition"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('5'));?></div>
            </div>
            <!--/Modal Header--> 
            <!--Sharing POST DETAILS-->
            <div class="i_block_user_nots_wrapper">
                <div class="i_blck_in"> 
                    <div class="choose_me flex_ tabing">
                        <?php if($iN->iN_StoryData($userID, '2') == 'yes'){?>
                        <!--ChM-->
                        <div class="chsm-item flex_ tabing">
                            <a class="flex_ tabing" href="<?php echo $base_url.'createStory?t=image';?>">
                                <div class="chsm chsm_bg_one tabing">
                                    <div class="chsm_icon flex_ tabing"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('53'));?></div>
                                    <div class="chsm_title flex_ tabing"><?php echo filter_var($LANG['create_photo_story'], FILTER_SANITIZE_STRING);?></div>
                                </div>
                            </a>
                        </div> 
                        <!--/ChM-->
                        <?php }?>
                        <?php if($iN->iN_StoryData($userID, '3') == 'yes'){?>
                        <!--ChM-->
                        <div class="chsm-item flex_ tabing">
                            <a class="flex_ tabing" href="<?php echo $base_url.'createStory?t=text';?>">
                                <div class="chsm chsm_bg_two tabing">
                                    <div class="chsm_icon flex_ tabing"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('168'));?></div>
                                    <div class="chsm_title flex_ tabing"><?php echo filter_var($LANG['create_writing_story'], FILTER_SANITIZE_STRING);?></div>
                                </div>
                            </a>
                        </div>
                        <!--/ChM-->
                        <?php }?>
                    </div>
                </div>
            </div>
            <!--/Sharing POST DETAILS-->  
       </div>   
   </div>
   <!--/SHARE--> 
</div>