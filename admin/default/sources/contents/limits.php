<div class="i_contents_container">
    <div class="i_general_white_board border_one column flex_ tabing__justify">
        <!---->
        <div class="i_general_title_box">
          <?php echo filter_var($LANG['limits'], FILTER_SANITIZE_STRING);?>
        </div>
        <!----> 
        <!---->
        <div class="i_general_row_box column flex_" id="general_conf" style="padding-top:30px;"> 
            <!---->
            <div class="i_general_row_box_item flex_ tabing_non_justify">
               <div class="irow_box_left flex_"><?php echo filter_var($LANG['video_call_feature_status'], FILTER_SANITIZE_STRING);?></div>
               <div class="irow_box_right">
                 <!---->
                 <div class="i_checkbox_wrapper flex_ tabing_non_justify"> 
                      <label class="el-switch el-switch-yellow" for="videoCallFeatureStatus">
                        <input type="checkbox" name="videoCallFeatureStatus" class="chmdMod" id="videoCallFeatureStatus" <?php echo filter_var($videoCallFeatureStatus, FILTER_SANITIZE_STRING) == 'yes' ? 'value="no" checked="checked"' : 'value="yes"';?>>
                      <span class="el-switch-style"></span>  
                      </label> 
                      <input type="hidden" name="videoCallFeatureStatus" class="videoCallFeatureStatus" value="<?php echo filter_var($videoCallFeatureStatus, FILTER_SANITIZE_STRING);?>"> 
                    <div class="success_tick tabing flex_ sec_one videoCallFeatureStatus"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('69'));?></div>
                </div>
                 <!---->  
               </div>
            </div>
            <!---->
            <!---->
            <div class="i_general_row_box_item flex_ tabing_non_justify">
               <div class="irow_box_left flex_"><?php echo filter_var($LANG['who_can_create_videocall'], FILTER_SANITIZE_STRING);?></div>
               <div class="irow_box_right">
                 <!---->
                 <div class="i_checkbox_wrapper flex_ tabing_non_justify">
                    <div class="i_chck_text" style="padding-right:15px;"><?php echo filter_var($LANG['everyone_can_create_a_videocall'], FILTER_SANITIZE_STRING);?></div>
                        <label class="el-switch el-switch-yellow" for="whoCanCreateVideoCall">
                          <input type="checkbox" name="whoCanCreateVideoCall" class="chmdMod" id="whoCanCreateVideoCall" <?php echo filter_var($whoCanCreateVideoCall, FILTER_SANITIZE_STRING) == 'yes' ? 'value="no" checked="checked"' : 'value="yes"';?>>
                        <span class="el-switch-style"></span>  
                        </label> 
                        <input type="hidden" name="whoCanCreateVideoCall" class="whoCanCreateVideoCall" value="<?php echo filter_var($whoCanCreateVideoCall, FILTER_SANITIZE_STRING);?>">
                    <div class="i_chck_text" style="margin-right:15px;"><?php echo filter_var($LANG['just_creators_can_create_videocall'], FILTER_SANITIZE_STRING);?></div>
                    <div class="success_tick tabing flex_ sec_one whoCanCreateVideoCall"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('69'));?></div>
                </div>
                 <!---->  
               </div>
            </div>
            <!---->
            <div class="i_general_row_box_item flex_ tabing_non_justify">
               <div class="irow_box_left flex_"><?php echo filter_var($LANG['vidoe_call_free_status'], FILTER_SANITIZE_STRING);?></div>
               <div class="irow_box_right">
                 <!---->
                 <div class="i_checkbox_wrapper flex_ tabing_non_justify"> 
                      <label class="el-switch el-switch-yellow" for="isVideoCallFree">
                        <input type="checkbox" name="isVideoCallFree" class="chmdMod" id="isVideoCallFree" <?php echo filter_var($isVideoCallFree, FILTER_SANITIZE_STRING) == 'yes' ? 'value="no" checked="checked"' : 'value="yes"';?>>
                      <span class="el-switch-style"></span>  
                      </label> 
                      <input type="hidden" name="isVideoCallFree" class="isVideoCallFree" value="<?php echo filter_var($isVideoCallFree, FILTER_SANITIZE_STRING);?>"> 
                    <div class="success_tick tabing flex_ sec_one isVideoCallFree"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('69'));?></div>
                </div>
                 <!---->  
               </div>
            </div>
            <!---->
            <!----> 
            <div class="arrow"></div>
            <!---->
            <div class="i_general_row_box_item flex_ tabing_non_justify">
               <div class="irow_box_left flex_"><?php echo filter_var($LANG['story_feature_status'], FILTER_SANITIZE_STRING);?></div>
               <div class="irow_box_right">
                 <!---->
                 <div class="i_checkbox_wrapper flex_ tabing_non_justify"> 
                      <label class="el-switch el-switch-yellow" for="storyFeatureStatus">
                        <input type="checkbox" name="storyFeatureStatus" class="chmdMod" id="storyFeatureStatus" <?php echo filter_var($iN->iN_StoryData($userID, '1'), FILTER_SANITIZE_STRING) == 'yes' ? 'value="no" checked="checked"' : 'value="yes"';?>>
                      <span class="el-switch-style"></span>  
                      </label> 
                      <input type="hidden" name="storyFeatureStatus" class="storyFeatureStatus" value="<?php echo filter_var($iN->iN_StoryData($userID, '1'), FILTER_SANITIZE_STRING);?>"> 
                    <div class="success_tick tabing flex_ sec_one storyFeatureStatus"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('69'));?></div>
                </div>
                 <!---->  
               </div>
            </div>
            <!----> 
            <!---->
            <div class="i_general_row_box_item flex_ tabing_non_justify">
               <div class="irow_box_left flex_"><?php echo filter_var($LANG['who_can_create_story'], FILTER_SANITIZE_STRING);?></div>
               <div class="irow_box_right">
                 <!---->
                 <div class="i_checkbox_wrapper flex_ tabing_non_justify">
                    <div class="i_chck_text" style="padding-right:15px;"><?php echo filter_var($LANG['everyone_can_create_a_story'], FILTER_SANITIZE_STRING);?></div>
                        <label class="el-switch el-switch-yellow" for="whoCanCretaStory">
                          <input type="checkbox" name="whoCanCretaStory" class="chmdMod" id="whoCanCretaStory" <?php echo filter_var($iN->iN_ShopData($userID, '8'), FILTER_SANITIZE_STRING) == 'yes' ? 'value="no" checked="checked"' : 'value="yes"';?>>
                        <span class="el-switch-style"></span>  
                        </label> 
                        <input type="hidden" name="whoCanCretaStory" class="whoCanCretaStory" value="<?php echo filter_var($iN->iN_ShopData($userID, '8'), FILTER_SANITIZE_STRING);?>">
                    <div class="i_chck_text" style="margin-right:15px;"><?php echo filter_var($LANG['just_creators_can_create_story'], FILTER_SANITIZE_STRING);?></div>
                    <div class="success_tick tabing flex_ sec_one whoCanCretaStory"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('69'));?></div>
                </div>
                 <!---->  
               </div>
            </div>
            <!----> 
            <!---->
            <div class="i_general_row_box_item flex_ tabing_non_justify">
               <div class="irow_box_left flex_"><?php echo filter_var($LANG['story_image_feature_status'], FILTER_SANITIZE_STRING);?></div>
               <div class="irow_box_right">
                 <!---->
                 <div class="i_checkbox_wrapper flex_ tabing_non_justify"> 
                      <label class="el-switch el-switch-yellow" for="storyImageFeatureStatus">
                        <input type="checkbox" name="storyImageFeatureStatus" class="chmdMod" id="storyImageFeatureStatus" <?php echo filter_var($iN->iN_StoryData($userID, '2'), FILTER_SANITIZE_STRING) == 'yes' ? 'value="no" checked="checked"' : 'value="yes"';?>>
                      <span class="el-switch-style"></span>  
                      </label> 
                      <input type="hidden" name="storyImageFeatureStatus" class="storyImageFeatureStatus" value="<?php echo filter_var($iN->iN_StoryData($userID, '2'), FILTER_SANITIZE_STRING);?>"> 
                    <div class="success_tick tabing flex_ sec_one storyImageFeatureStatus"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('69'));?></div>
                </div>
                 <!---->  
               </div>
            </div>
            <!---->
            <!---->
            <div class="i_general_row_box_item flex_ tabing_non_justify">
               <div class="irow_box_left flex_"><?php echo filter_var($LANG['story_text_feature_status'], FILTER_SANITIZE_STRING);?></div>
               <div class="irow_box_right">
                 <!---->
                 <div class="i_checkbox_wrapper flex_ tabing_non_justify"> 
                      <label class="el-switch el-switch-yellow" for="storyTextFeatureStatus">
                        <input type="checkbox" name="storyTextFeatureStatus" class="chmdMod" id="storyTextFeatureStatus" <?php echo filter_var($iN->iN_StoryData($userID, '3'), FILTER_SANITIZE_STRING) == 'yes' ? 'value="no" checked="checked"' : 'value="yes"';?>>
                      <span class="el-switch-style"></span>  
                      </label> 
                      <input type="hidden" name="storyTextFeatureStatus" class="storyTextFeatureStatus" value="<?php echo filter_var($iN->iN_StoryData($userID, '3'), FILTER_SANITIZE_STRING);?>"> 
                    <div class="success_tick tabing flex_ sec_one storyTextFeatureStatus"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('69'));?></div>
                </div>
                 <!---->  
               </div>
            </div>
            <!---->
            <div class="arrow"></div>
            <!---->
            <div class="i_general_row_box_item flex_ tabing_non_justify">
               <div class="irow_box_left flex_"><?php echo filter_var($LANG['shop_feature_status'], FILTER_SANITIZE_STRING);?></div>
               <div class="irow_box_right">
                 <!---->
                 <div class="i_checkbox_wrapper flex_ tabing_non_justify"> 
                      <label class="el-switch el-switch-yellow" for="shopFeatureStatus">
                        <input type="checkbox" name="shopFeatureStatus" class="chmdMod" id="shopFeatureStatus" <?php echo filter_var($iN->iN_ShopData($userID, '1'), FILTER_SANITIZE_STRING) == 'yes' ? 'value="no" checked="checked"' : 'value="yes"';?>>
                      <span class="el-switch-style"></span>  
                      </label> 
                      <input type="hidden" name="shopFeatureStatus" class="shopFeatureStatus" value="<?php echo filter_var($iN->iN_ShopData($userID, '1'), FILTER_SANITIZE_STRING);?>"> 
                    <div class="success_tick tabing flex_ sec_one shopFeatureStatus"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('69'));?></div>
                </div>
                 <!---->  
               </div>
            </div>
            <!----> 
            <!--ssss-->
            <!---->
            <div class="i_general_row_box_item flex_ tabing_non_justify">
               <div class="irow_box_left flex_"><?php echo filter_var($LANG['who_can_create_product'], FILTER_SANITIZE_STRING);?></div>
               <div class="irow_box_right">
                 <!---->
                 <div class="i_checkbox_wrapper flex_ tabing_non_justify">
                    <div class="i_chck_text" style="padding-right:15px;"><?php echo filter_var($LANG['everyone_can_create_a_product'], FILTER_SANITIZE_STRING);?></div>
                        <label class="el-switch el-switch-yellow" for="whoCanCretaProduct">
                          <input type="checkbox" name="whoCanCretaProduct" class="chmdMod" id="whoCanCretaProduct" <?php echo filter_var($iN->iN_ShopData($userID, '8'), FILTER_SANITIZE_STRING) == 'yes' ? 'value="no" checked="checked"' : 'value="yes"';?>>
                        <span class="el-switch-style"></span>  
                        </label> 
                        <input type="hidden" name="whoCanCretaProduct" class="whoCanCretaProduct" value="<?php echo filter_var($iN->iN_ShopData($userID, '8'), FILTER_SANITIZE_STRING);?>">
                    <div class="i_chck_text" style="margin-right:15px;"><?php echo filter_var($LANG['just_creators_can_create_product'], FILTER_SANITIZE_STRING);?></div>
                    <div class="success_tick tabing flex_ sec_one whoCanCretaProduct"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('69'));?></div>
                </div>
                 <!---->  
               </div>
            </div>
            <!----> 
            <!--/ssss-->
            <!---->
            <div class="i_general_row_box_item flex_ tabing_non_justify">
               <div class="irow_box_left flex_"><?php echo filter_var($LANG['create_from_scratch_status'], FILTER_SANITIZE_STRING);?></div>
               <div class="irow_box_right">
                 <!---->
                 <div class="i_checkbox_wrapper flex_ tabing_non_justify"> 
                      <label class="el-switch el-switch-yellow" for="shopScratchStatus">
                        <input type="checkbox" name="shopScratchStatus" class="chmdMod" id="shopScratchStatus" <?php echo filter_var($iN->iN_ShopData($userID, '2'), FILTER_SANITIZE_STRING) == 'yes' ? 'value="no" checked="checked"' : 'value="yes"';?>>
                      <span class="el-switch-style"></span>  
                      </label> 
                      <input type="hidden" name="shopScratchStatus" class="shopScratchStatus" value="<?php echo filter_var($iN->iN_ShopData($userID, '2'), FILTER_SANITIZE_STRING);?>"> 
                    <div class="success_tick tabing flex_ sec_one shopScratchStatus"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('69'));?></div>
                </div>
                 <!---->  
               </div>
            </div>
            <!---->
            <!---->
            <div class="i_general_row_box_item flex_ tabing_non_justify">
               <div class="irow_box_left flex_"><?php echo filter_var($LANG['create_a_book_a_zoom_product'], FILTER_SANITIZE_STRING);?></div>
               <div class="irow_box_right">
                 <!---->
                 <div class="i_checkbox_wrapper flex_ tabing_non_justify"> 
                      <label class="el-switch el-switch-yellow" for="shopBookaZoomStatus">
                        <input type="checkbox" name="shopBookaZoomStatus" class="chmdMod" id="shopBookaZoomStatus" <?php echo filter_var($iN->iN_ShopData($userID, '3'), FILTER_SANITIZE_STRING) == 'yes' ? 'value="no" checked="checked"' : 'value="yes"';?>>
                      <span class="el-switch-style"></span>  
                      </label> 
                      <input type="hidden" name="shopBookaZoomStatus" class="shopBookaZoomStatus" value="<?php echo filter_var($iN->iN_ShopData($userID, '3'), FILTER_SANITIZE_STRING);?>"> 
                    <div class="success_tick tabing flex_ sec_one shopBookaZoomStatus"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('69'));?></div>
                </div>
                 <!---->  
               </div>
            </div>
            <!---->
            <!---->
            <div class="i_general_row_box_item flex_ tabing_non_justify">
               <div class="irow_box_left flex_"><?php echo filter_var($LANG['create_a_digital_download_product'], FILTER_SANITIZE_STRING);?></div>
               <div class="irow_box_right">
                 <!---->
                 <div class="i_checkbox_wrapper flex_ tabing_non_justify"> 
                      <label class="el-switch el-switch-yellow" for="shopDigitalDownloadStatus">
                        <input type="checkbox" name="shopDigitalDownloadStatus" class="chmdMod" id="shopDigitalDownloadStatus" <?php echo filter_var($iN->iN_ShopData($userID, '4'), FILTER_SANITIZE_STRING) == 'yes' ? 'value="no" checked="checked"' : 'value="yes"';?>>
                      <span class="el-switch-style"></span>  
                      </label> 
                      <input type="hidden" name="shopDigitalDownloadStatus" class="shopDigitalDownloadStatus" value="<?php echo filter_var($iN->iN_ShopData($userID, '4'), FILTER_SANITIZE_STRING);?>"> 
                    <div class="success_tick tabing flex_ sec_one shopDigitalDownloadStatus"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('69'));?></div>
                </div>
                 <!---->  
               </div>
            </div>
            <!---->
            <!---->
            <div class="i_general_row_box_item flex_ tabing_non_justify">
               <div class="irow_box_left flex_"><?php echo filter_var($LANG['create_a_live_event_ticket_product'], FILTER_SANITIZE_STRING);?></div>
               <div class="irow_box_right">
                 <!---->
                 <div class="i_checkbox_wrapper flex_ tabing_non_justify"> 
                      <label class="el-switch el-switch-yellow" for="shopLiveEventTicketStatus">
                        <input type="checkbox" name="shopLiveEventTicketStatus" class="chmdMod" id="shopLiveEventTicketStatus" <?php echo filter_var($iN->iN_ShopData($userID, '5'), FILTER_SANITIZE_STRING) == 'yes' ? 'value="no" checked="checked"' : 'value="yes"';?>>
                      <span class="el-switch-style"></span>  
                      </label> 
                      <input type="hidden" name="shopLiveEventTicketStatus" class="shopLiveEventTicketStatus" value="<?php echo filter_var($iN->iN_ShopData($userID, '5'), FILTER_SANITIZE_STRING);?>"> 
                    <div class="success_tick tabing flex_ sec_one shopLiveEventTicketStatus"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('69'));?></div>
                </div>
                 <!---->  
               </div>
            </div>
            <!---->
            <!---->
            <div class="i_general_row_box_item flex_ tabing_non_justify">
               <div class="irow_box_left flex_"><?php echo filter_var($LANG['create_a_art_commission_product'], FILTER_SANITIZE_STRING);?></div>
               <div class="irow_box_right">
                 <!---->
                 <div class="i_checkbox_wrapper flex_ tabing_non_justify"> 
                      <label class="el-switch el-switch-yellow" for="shopArtCommissionStatus">
                        <input type="checkbox" name="shopArtCommissionStatus" class="chmdMod" id="shopArtCommissionStatus" <?php echo filter_var($iN->iN_ShopData($userID, '6'), FILTER_SANITIZE_STRING) == 'yes' ? 'value="no" checked="checked"' : 'value="yes"';?>>
                      <span class="el-switch-style"></span>  
                      </label> 
                      <input type="hidden" name="shopArtCommissionStatus" class="shopArtCommissionStatus" value="<?php echo filter_var($iN->iN_ShopData($userID, '6'), FILTER_SANITIZE_STRING);?>"> 
                    <div class="success_tick tabing flex_ sec_one shopArtCommissionStatus"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('69'));?></div>
                </div>
                 <!---->  
               </div>
            </div>
            <!---->
            <!---->
            <div class="i_general_row_box_item flex_ tabing_non_justify">
               <div class="irow_box_left flex_"><?php echo filter_var($LANG['create_a_join_instagram_close_friends_product'], FILTER_SANITIZE_STRING);?></div>
               <div class="irow_box_right">
                 <!---->
                 <div class="i_checkbox_wrapper flex_ tabing_non_justify"> 
                      <label class="el-switch el-switch-yellow" for="shopInstagramGloseFriendsStatus">
                        <input type="checkbox" name="shopInstagramGloseFriendsStatus" class="chmdMod" id="shopInstagramGloseFriendsStatus" <?php echo filter_var($iN->iN_ShopData($userID, '7'), FILTER_SANITIZE_STRING) == 'yes' ? 'value="no" checked="checked"' : 'value="yes"';?>>
                      <span class="el-switch-style"></span>  
                      </label> 
                      <input type="hidden" name="shopInstagramGloseFriendsStatus" class="shopInstagramGloseFriendsStatus" value="<?php echo filter_var($iN->iN_ShopData($userID, '7'), FILTER_SANITIZE_STRING);?>"> 
                    <div class="success_tick tabing flex_ sec_one shopInstagramGloseFriendsStatus"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('69'));?></div>
                </div>
                 <!---->  
               </div>
            </div>
            <!---->
          <div class="arrow"></div>
          <!---->
          <div class="i_general_row_box_item flex_ tabing_non_justify">
              <div class="irow_box_left flex_"><?php echo filter_var($LANG['accept_creator_status'], FILTER_SANITIZE_STRING);?></div>
              <div class="irow_box_right">
                <!---->
                <div class="i_checkbox_wrapper flex_ tabing_non_justify"> 
                  <div class="el-radio el-radio-yellow">
                    <span class="margin-r"><?php echo filter_var($LANG['to_become_content_creator'], FILTER_SANITIZE_STRING);?></span>
                    <input type="radio" name="radio1" class="chmdCrAc" id="request" <?php echo filter_var($beaCreatorStatus, FILTER_SANITIZE_STRING) == 'request' ? 'value="request" checked="checked"' : 'value="request"';?>>
                    <label class="el-radio-style" for="request"></label>
                  </div>
                    <div class="success_tick tabing flex_ sec_one request"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('69'));?></div>
                </div>
                <!---->
                <!---->
                <div class="i_checkbox_wrapper flex_ tabing_non_justify"> 
                  <div class="el-radio el-radio-yellow">
                    <span class="margin-r"><?php echo filter_var($LANG['only_admin_can_set_creator'], FILTER_SANITIZE_STRING);?></span>
                    <input type="radio" name="radio1" class="chmdCrAc" id="admin_accept" <?php echo filter_var($beaCreatorStatus, FILTER_SANITIZE_STRING) == 'admin_accept' ? 'value="admin_accept" checked="checked"' : 'value="admin_accept"';?>>
                    <label class="el-radio-style" for="admin_accept"></label>
                  </div>
                    <div class="success_tick tabing flex_ sec_one admin_accept"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('69'));?></div>
                </div>
                <!---->
                <!---->
                <div class="i_checkbox_wrapper flex_ tabing_non_justify"> 
                  <div class="el-radio el-radio-yellow">
                    <span class="margin-r"><?php echo filter_var($LANG['automatically_make_creator'], FILTER_SANITIZE_STRING);?></span>
                    <input type="radio" name="radio1" class="chmdCrAc" id="auto_approve" <?php echo filter_var($beaCreatorStatus, FILTER_SANITIZE_STRING) == 'auto_approve' ? 'value="auto_approve" checked="checked"' : 'value="auto_approve"';?>>
                    <label class="el-radio-style" for="auto_approve"></label>
                  </div>
                    <div class="success_tick tabing flex_ sec_one auto_approve"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('69'));?></div>
                </div>
                <!---->  
              </div>
          </div>
          <!---->  
          <div class="arrow"></div>
        <form enctype="multipart/form-data" method="post" id="limits">
            <!---->
            <div class="i_general_row_box_item flex_ tabing_non_justify">
               <div class="irow_box_left flex_"><?php echo filter_var($LANG['post_create_status'], FILTER_SANITIZE_STRING);?></div>
               <div class="irow_box_right">
                 <!---->
                 <div class="i_checkbox_wrapper flex_ tabing_non_justify">
                    <div class="i_chck_text" style="padding-right:15px;"><?php echo filter_var($LANG['normal_user_can_create_a_post'], FILTER_SANITIZE_STRING);?></div>
                        <label class="el-switch el-switch-yellow" for="postCreateStatus">
                          <input type="checkbox" name="postCreateStatus" class="chmdPost" id="postCreateStatus" <?php echo filter_var($normalUserCanPost, FILTER_SANITIZE_STRING) == 'yes' ? 'value="no" checked="checked"' : 'value="yes"';?>>
                        <span class="el-switch-style"></span>  
                        </label> 
                        <input type="hidden" name="postCreateStatus" class="postCreateStatus" value="<?php echo filter_var($normalUserCanPost, FILTER_SANITIZE_STRING);?>">
                    <div class="i_chck_text" style="margin-right:15px;"><?php echo filter_var($LANG['just_creators_can_creta_a_post'], FILTER_SANITIZE_STRING);?></div>
                    <div class="success_tick tabing flex_ sec_one postCreateStatus"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('69'));?></div>
                </div>
                 <!---->  
               </div>
            </div>
            <!----> 
            <!---->
            <div class="i_general_row_box_item flex_ tabing_non_justify">
               <div class="irow_box_left flex_"><?php echo filter_var($LANG['block_countries_status'], FILTER_SANITIZE_STRING);?></div>
               <div class="irow_box_right">
                 <!---->
                 <div class="i_checkbox_wrapper flex_ tabing_non_justify">
                    <div class="i_chck_text" style="padding-right:15px;"><?php echo filter_var($LANG['can_block_countries'], FILTER_SANITIZE_STRING);?></div>
                        <label class="el-switch el-switch-yellow" for="blockCountriesStatus">
                          <input type="checkbox" name="blockCountriesStatus" class="chmdBlockCountries" id="blockCountriesStatus" <?php echo filter_var($userCanBlockCountryStatus, FILTER_SANITIZE_STRING) == 'yes' ? 'value="no" checked="checked"' : 'value="yes"';?>>
                        <span class="el-switch-style"></span>  
                        </label> 
                        <input type="hidden" name="blockCountriesStatus" class="blockCountriesStatus" value="<?php echo filter_var($userCanBlockCountryStatus, FILTER_SANITIZE_STRING);?>">
                    <div class="i_chck_text" style="margin-right:15px;"><?php echo filter_var($LANG['can_not_block_countries'], FILTER_SANITIZE_STRING);?></div>
                    <div class="success_tick tabing flex_ sec_one blockCountriesStatus"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('69'));?></div>
                </div>
                 <!---->  
               </div>
            </div>
            <!----> 
            <!---->
            <div class="i_general_row_box_item flex_ tabing_non_justify">
               <div class="irow_box_left flex_"><?php echo filter_var($LANG['auto_approve_post'], FILTER_SANITIZE_STRING);?></div>
               <div class="irow_box_right">
                 <!---->
                 <div class="i_checkbox_wrapper flex_ tabing_non_justify">
                    <div class="i_chck_text" style="padding-right:15px;"><?php echo filter_var($LANG['approve_posts_automatically'], FILTER_SANITIZE_STRING);?></div>
                        <label class="el-switch el-switch-yellow" for="autoApprovePost">
                          <input type="checkbox" name="autoApprovePost" class="chmdAutoApprovePost" id="autoApprovePost" <?php echo filter_var($autoApprovePostStatus, FILTER_SANITIZE_STRING) == 'yes' ? 'value="no" checked="checked"' : 'value="yes"';?>>
                        <span class="el-switch-style"></span>  
                        </label> 
                        <input type="hidden" name="autoApprovePost" class="autoApprovePost" value="<?php echo filter_var($autoApprovePostStatus, FILTER_SANITIZE_STRING);?>"> 
                    <div class="success_tick tabing flex_ sec_one autoApprovePost"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('69'));?></div>
                </div>
                 <!---->  
               </div>
            </div>
            <!----> 
            <!---->
            <div class="i_general_row_box_item flex_ tabing_non_justify">
               <div class="irow_box_left flex_"><?php echo filter_var($LANG['upload_size_limit'], FILTER_SANITIZE_STRING);?></div>
               <div class="irow_box_right">
                   <div class="i_box_limit flex_ column">
                       <div class="i_limit" data-type="fl_limit"><span class="lmt"><?php echo filter_var($MBLIMITS[$availableUploadFileSize], FILTER_SANITIZE_STRING);?></span><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('36'));?></div>
                        <div class="i_limit_list_container">
                            <div class="i_countries_list border_one column flex_">
                            <?php foreach($MBLIMITS as $country => $value){?> 
                              <div class="i_s_limit transition border_one gsearch <?php echo filter_var($availableUploadFileSize, FILTER_SANITIZE_STRING) == '' . $country . '' ? 'choosed' : ''; ?>" id='<?php echo filter_var($country, FILTER_SANITIZE_STRING); ?>' data-c="<?php echo filter_var($value, FILTER_SANITIZE_STRING);?>" data-type="mb_limit"><?php echo filter_var($value, FILTER_SANITIZE_STRING); ?></div>
                            <?php }?>
                            </div>
                            <input type="hidden" name="file_limit" id="upLimit" value="<?php echo filter_var($availableUploadFileSize, FILTER_SANITIZE_STRING);?>">
                        </div>
                        <div class="rec_not" style="padding-top:5px;"><?php echo filter_var($LANG['attantion_server_default_maximum_file_upload_size'], FILTER_SANITIZE_STRING);?></div>
                   </div> 
               </div>
            </div>
            <!---->
            <!---->
            <div class="i_general_row_box_item flex_ tabing_non_justify">
               <div class="irow_box_left flex_"><?php echo filter_var($LANG['post_length'], FILTER_SANITIZE_STRING);?></div>
               <div class="irow_box_right">
                   <div class="i_box_limit flex_ column">
                       <div class="i_limit" data-type="ch_limit"><span class="lct"><?php echo filter_var($availableLength, FILTER_SANITIZE_STRING).' '.$LANG['character'];?></span><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('36'));?></div>
                        <div class="i_limit_list_ch_container">
                            <div class="i_countries_list border_one column flex_">
                            <?php foreach($LIMITLENGTH as $chLimit){?> 
                              <div class="i_s_limit transition border_one gsearch <?php echo filter_var($availableLength, FILTER_SANITIZE_STRING) == '' . $chLimit . '' ? 'choosed' : ''; ?>" id='<?php echo filter_var($chLimit, FILTER_SANITIZE_STRING); ?>' data-c="<?php echo preg_replace( '/{.*?}/', $chLimit, $LANG['limit_character']);?>" data-type="characterLimit"><?php echo filter_var($chLimit, FILTER_SANITIZE_STRING).' '.$LANG['character'];?></div>
                            <?php }?>
                            </div>
                            <input type="hidden" name="length_limit" id="upcLimit" value="<?php echo filter_var($availableLength, FILTER_SANITIZE_STRING);?>">
                        </div>
                        <div class="rec_not" style="padding-top:5px;"><?php echo filter_var($LANG['max_character'], FILTER_SANITIZE_STRING);?></div>
                   </div> 
               </div>
            </div>
            <!---->
            <!---->
            <div class="i_general_row_box_item flex_ tabing_non_justify">
               <div class="irow_box_left flex_"><?php echo filter_var($LANG['show_number_of_post'], FILTER_SANITIZE_STRING);?></div>
               <div class="irow_box_right">
                   <div class="i_box_limit flex_ column">
                       <div class="i_limit" data-type="cp_limit"><span class="lppt"><?php echo filter_var($scrollLimit, FILTER_SANITIZE_STRING);?></span><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('36'));?></div>
                        <div class="i_limit_list_cp_container">
                            <div class="i_countries_list border_one column flex_">
                            <?php foreach($POSTLIMIT as $cpLimit){?> 
                              <div class="i_s_limit transition border_one gsearch <?php echo filter_var($scrollLimit, FILTER_SANITIZE_STRING) == '' . filter_var($cpLimit, FILTER_SANITIZE_STRING) . '' ? 'choosed' : ''; ?>" id='<?php echo filter_var($cpLimit, FILTER_SANITIZE_STRING); ?>' data-c="<?php echo filter_var($cpLimit, FILTER_SANITIZE_STRING);?>" data-type="postLimit"><?php echo filter_var($cpLimit, FILTER_SANITIZE_STRING);?></div>
                            <?php }?>
                            </div>
                            <input type="hidden" name="post_show_limit" id="uppLimit" value="<?php echo filter_var($scrollLimit, FILTER_SANITIZE_STRING);?>">
                        </div>
                        <div class="rec_not" style="padding-top:5px;"><?php echo filter_var($LANG['also_displayed_whe_page_scrolled'], FILTER_SANITIZE_STRING);?></div>
                   </div> 
               </div>
            </div>
            <!---->
            <!---->
            <div class="i_general_row_box_item flex_ tabing_non_justify">
               <div class="irow_box_left flex_"><?php echo filter_var($LANG['show_number_of_paginaton'], FILTER_SANITIZE_STRING);?></div>
               <div class="irow_box_right">
                   <div class="i_box_limit flex_ column">
                       <div class="i_limit" data-type="p_limit"><span class="ppt"><?php echo filter_var($paginationLimit, FILTER_SANITIZE_STRING);?></span><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('36'));?></div>
                        <div class="i_limit_list_p_container">
                            <div class="i_countries_list border_one column flex_">
                            <?php foreach($PAGINATIONLIMIT as $pLimit){?> 
                              <div class="i_s_limit transition border_one gsearch <?php echo filter_var($paginationLimit, FILTER_SANITIZE_STRING) == '' . $pLimit . '' ? 'choosed' : ''; ?>" id='<?php echo filter_var($pLimit, FILTER_SANITIZE_STRING); ?>' data-c="<?php echo filter_var($pLimit, FILTER_SANITIZE_STRING);?>" data-type="pagLimit"><?php echo filter_var($pLimit, FILTER_SANITIZE_STRING);?></div>
                            <?php }?>
                            </div>
                            <input type="hidden" name="pagination_limit" id="ppLimit" value="<?php echo filter_var($paginationLimit, FILTER_SANITIZE_STRING);?>">
                        </div>
                        <div class="rec_not" style="padding-top:5px;"><?php echo filter_var($LANG['also_displayed_whe_page_scrolled'], FILTER_SANITIZE_STRING);?></div>
                   </div> 
               </div>
            </div>
            <!----> 
            <!---->
            <div class="i_general_row_box_item flex_ tabing_non_justify">
               <div class="irow_box_left flex_"><?php echo filter_var($LANG['allowed_file_extension'], FILTER_SANITIZE_STRING);?></div>
               <div class="irow_box_right">
                 <input type="text" name="available_file_extensions" class="i_input flex_" value="<?php echo filter_var($availableFileExtensions, FILTER_SANITIZE_STRING);?>">
                 <div class="rec_not" style="padding-top:5px;"><?php echo filter_var($LANG['separated_with'], FILTER_SANITIZE_STRING);?></div>
               </div>
            </div>
            <!---->
            <div class="warning_wrapper warning_two"><?php echo filter_var($LANG['not_live_file_extensions_blank'], FILTER_SANITIZE_STRING);?></div>
            <!---->
            <div class="i_general_row_box_item flex_ tabing_non_justify">
               <div class="irow_box_left flex_"><?php echo filter_var($LANG['file_extensions_for_approval'], FILTER_SANITIZE_STRING);?></div>
               <div class="irow_box_right">
                 <input type="text" name="available_verification_file_extensions" class="i_input flex_" value="<?php echo filter_var($availableVerificationFileExtensions, FILTER_SANITIZE_STRING);?>">
                 <div class="rec_not" style="padding-top:5px;"><?php echo filter_var($LANG['separated_with'], FILTER_SANITIZE_STRING);?></div>
               </div>
            </div>
            <!---->   
            <div class="i_general_row_box_item flex_ tabing_non_justify">
               <div class="irow_box_left flex_"><?php echo filter_var($LANG['not_allowed_usernames'], FILTER_SANITIZE_STRING);?></div>
               <div class="irow_box_right">
                 <input type="text" name="unavailable_usernames" class="i_input flex_" value="<?php echo filter_var($disallowedUserNames, FILTER_SANITIZE_STRING);?>">
                 <div class="rec_not" style="padding-top:5px;"><?php echo filter_var($LANG['separated_with'], FILTER_SANITIZE_STRING);?></div>
               </div>
            </div>
            <!---->
            <div class="arrow"></div>
            <!---->
            <div class="i_general_row_box_item flex_ tabing_non_justify">
               <div class="irow_box_left flex_"><?php echo filter_var($LANG['ffmpeg_status'], FILTER_SANITIZE_STRING);?></div>
               <div class="irow_box_right">
                 <!---->
                 <div class="i_checkbox_wrapper flex_ tabing_non_justify">
                    <div class="i_chck_text" style="padding-right:15px;"><?php echo filter_var($LANG['use_ffmpeg'], FILTER_SANITIZE_STRING);?></div>
                        <label class="el-switch el-switch-yellow" for="ffmpegMode">
                          <input type="checkbox" name="ffmpegMode" class="chmdPayment" id="ffmpegMode" <?php echo filter_var($ffmpegStatus, FILTER_SANITIZE_STRING) == '1' ? 'value="0" checked="checked"' : 'value="1"';?>>
                        <span class="el-switch-style"></span>  
                        </label> 
                    <div class="i_chck_text" style="margin-right:15px;"><?php echo filter_var($LANG['not_use_ffmpeg'], FILTER_SANITIZE_STRING);?></div>
                    <div class="success_tick tabing flex_ sec_one ffmpegMode"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('69'));?></div>
                </div>
                 <!----> 
                 <div class="rec_not" style="padding-top:5px;"><?php echo filter_var($LANG['make_sure_ffmpeg_activated'], FILTER_SANITIZE_STRING);?></div>
               </div>
            </div>
            <!----> 
            <!---->
            <div class="i_general_row_box_item flex_ tabing_non_justify">
               <div class="irow_box_left flex_"><?php echo filter_var($LANG['ffmpeg_path'], FILTER_SANITIZE_STRING);?></div>
               <div class="irow_box_right">
                 <input type="text" name="ffmpeg_path" class="i_input flex_" value="<?php echo filter_var($ffmpegPath, FILTER_SANITIZE_STRING);?>">
                 <div class="rec_not" style="padding-top:5px;"><?php echo filter_var($LANG['make_sure_ffmpeg_activated'], FILTER_SANITIZE_STRING);?></div>
               </div>
            </div>
            <!---->  
            <div class="arrow"></div>
            <!---->
            <div class="i_general_row_box_item flex_ tabing_non_justify">
               <div class="irow_box_left flex_"><?php echo filter_var($LANG['re_captcha_status'], FILTER_SANITIZE_STRING);?></div>
               <div class="irow_box_right">
                 <!---->
                 <div class="i_checkbox_wrapper flex_ tabing_non_justify">
                    <div class="i_chck_text" style="padding-right:15px;"><?php echo filter_var($LANG['recaptcha_inactive'], FILTER_SANITIZE_STRING);?></div>
                        <label class="el-switch el-switch-yellow" for="reCreateStatus">
                          <input type="checkbox" name="reCreateStatus" class="reCaptchaPost" id="reCreateStatus" <?php echo filter_var($captchaStatus, FILTER_SANITIZE_STRING) == 'yes' ? 'value="yes" checked="checked"' : 'value="no"';?>>
                        <span class="el-switch-style"></span>  
                        </label>  
                    <div class="i_chck_text" style="margin-right:15px;"><?php echo filter_var($LANG['recaptcha_active'], FILTER_SANITIZE_STRING);?></div>
                    <div class="success_tick tabing flex_ sec_one reCreateStatus"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('69'));?></div>
                </div>
                 <!---->  
               </div>
            </div>
            <!---->
            <!---->
            <div class="i_general_row_box_item flex_ tabing_non_justify">
               <div class="irow_box_left flex_"><?php echo filter_var($LANG['recaptcha_site_key'], FILTER_SANITIZE_STRING);?></div>
               <div class="irow_box_right">
                 <input type="text" name="rsitekey" class="i_input flex_" value="<?php echo filter_var($captcha_site_key, FILTER_SANITIZE_STRING);?>"> 
               </div>
            </div>
            <!---->
            <!---->
            <div class="i_general_row_box_item flex_ tabing_non_justify">
               <div class="irow_box_left flex_"><?php echo filter_var($LANG['recaptcha_secret_key'], FILTER_SANITIZE_STRING);?></div>
               <div class="irow_box_right">
                 <input type="text" name="rseckey" class="i_input flex_" value="<?php echo filter_var($captcha_secret_key, FILTER_SANITIZE_STRING);?>"> 
               </div>
            </div>
            <!---->
            <div class="arrow"></div>
            <!---->
            <div class="i_general_row_box_item flex_ tabing_non_justify">
               <div class="irow_box_left flex_"><?php echo filter_var($LANG['one_signal_status'], FILTER_SANITIZE_STRING);?></div>
               <div class="irow_box_right">
                 <!---->
                 <div class="i_checkbox_wrapper flex_ tabing_non_justify">
                    <div class="i_chck_text" style="padding-right:15px;"><?php echo filter_var($LANG['onesignal_inactive'], FILTER_SANITIZE_STRING);?></div>
                        <label class="el-switch el-switch-yellow" for="oneSignalStatus">
                          <input type="checkbox" name="oneSignalStatus" class="oneSignalStatuss" id="oneSignalStatus" <?php echo filter_var($oneSignalStatus, FILTER_SANITIZE_STRING) == 'open' ? 'value="open" checked="checked"' : 'value="close"';?>>
                        <span class="el-switch-style"></span>  
                        </label>  
                    <div class="i_chck_text" style="margin-right:15px;"><?php echo filter_var($LANG['onesignal_active'], FILTER_SANITIZE_STRING);?></div>
                    <div class="success_tick tabing flex_ sec_one oneSignalStatus"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('69'));?></div>
                </div>
                 <!---->  
               </div>
            </div>
            <!----> 
            <!---->
            <div class="i_general_row_box_item flex_ tabing_non_justify">
               <div class="irow_box_left flex_"><?php echo filter_var($LANG['onesignal_api_key'], FILTER_SANITIZE_STRING);?></div>
               <div class="irow_box_right">
                 <input type="text" name="onesignalapikey" class="i_input flex_" value="<?php echo filter_var($oneSignalApi, FILTER_SANITIZE_STRING);?>"> 
               </div>
            </div>
            <!---->
            <!---->
            <div class="i_general_row_box_item flex_ tabing_non_justify">
               <div class="irow_box_left flex_"><?php echo filter_var($LANG['onesignal_restapikey'], FILTER_SANITIZE_STRING);?></div>
               <div class="irow_box_right">
                 <input type="text" name="onesignalrestapikey" class="i_input flex_" value="<?php echo filter_var($oneSignalRestApi, FILTER_SANITIZE_STRING);?>"> 
               </div>
            </div>
            <!---->
            <!------------------->
            <div class="warning_wrapper warning_one"><?php echo filter_var($LANG['not_live_approved_file_extension'], FILTER_SANITIZE_STRING);?></div>
            <div class="i_settings_wrapper_item successNot"><?php echo filter_var($LANG['updated_successfully'], FILTER_SANITIZE_STRING);?></div>
            <!---->
            <div class="i_general_row_box_item flex_ tabing_non_justify"> 
                <input type="hidden" name="f" value="updateLimits">
                <button type="submit" name="submit" class="i_nex_btn_btn transition"><?php echo filter_var($LANG['save_edit'], FILTER_SANITIZE_STRING);?></button>
            </div>
            <!---->
        </form>
        </div>
        <!---->
    </div>
</div>