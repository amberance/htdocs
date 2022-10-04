<div class="i_profile_container">
   <div class="i_profile_cover_blur" style="background-image:url(<?php echo filter_var($p_profileCover, FILTER_SANITIZE_STRING); ?>);"></div>
   <div class="i_profile_i_container">
       <div class="i_profile_infos_wrapper">
          <!--PROFILE COVER AND AVATAR-->
          <div class="i_profile_cover" style="background-image:url(<?php echo filter_var($p_profileCover, FILTER_SANITIZE_STRING); ?>);">
              <div class="i_profile_avatar_container">
                  <div class="i_profile_avatar_wrp">
                     <div class="i_profile_avatar" style="background-image:url(<?php echo filter_var($p_profileAvatar, FILTER_SANITIZE_STRING); ?>);"><?php echo html_entity_decode($p_is_creator); ?></div>
                  </div>
              </div>
          </div>
          <!--/PROFILE COVER AND AVATAR-->
          <!--USER PROFILE INFO-->
          <div class="i_u_profile_info">
               <div class="i_u_name">
                   <?php echo filter_var($p_userfullname, FILTER_SANITIZE_STRING); ?><?php echo html_entity_decode($pVerifyStatus); ?> <?php echo html_entity_decode($pGender); ?>
               </div>
               <?php echo filter_var($pTime, FILTER_SANITIZE_STRING); ?>
               <div class="i_p_cards">
                  <?php echo html_entity_decode($pCategory); ?>
               </div>
               <?php if ($p_friend_status != 'me') {?>
               <div class="i_p_cards">
                  <?php echo html_entity_decode($sendMessage); ?> 
                  <div class="i_btn_item transition copyUrl tabing ownTooltip" data-label="<?php echo filter_var($LANG['copy_profile_url'], FILTER_SANITIZE_STRING);?>" data-clipboard-text="<?php echo filter_var($profileUrl, FILTER_SANITIZE_STRING); ?>">
                     <?php echo html_entity_decode($iN->iN_SelectedMenuIcon('30')); ?>
                  </div>
                  <div class="i_btn_item <?php echo filter_var($blockBtn, FILTER_SANITIZE_STRING); ?> transition tabing ownTooltip" data-label="<?php echo filter_var($LANG['block_this_user'], FILTER_SANITIZE_STRING);?>" data-u="<?php echo filter_var($p_profileID, FILTER_SANITIZE_STRING); ?>">
                     <?php echo html_entity_decode($iN->iN_SelectedMenuIcon('64')); ?>
                  </div>
                  <?php if ($p_friend_status != 'subscriber') {?> 
                    <div class="i_fw<?php echo filter_var($p_profileID, FILTER_SANITIZE_STRING); ?> transition <?php echo filter_var($flwrBtn, FILTER_SANITIZE_STRING); ?>" id="i_btn_like_item" data-u="<?php echo filter_var($p_profileID, FILTER_SANITIZE_STRING); ?>">
                      <?php echo html_entity_decode($flwBtnIconText); ?> 
                    </div>
                  <?php }?>
               </div> 
               <?php 
               if($pCertificationStatus == '2' && $pValidationStatus == '2' && $feesStatus == '2'){ 
               ?>
               <div class="i_p_items_box">
                    <?php if ($p_friend_status != 'subscriber') {?>
                        <div class="i_btn_become_fun <?php echo filter_var($subscBTN, FILTER_SANITIZE_STRING); ?> transition" data-u="<?php echo filter_var($p_profileID, FILTER_SANITIZE_STRING); ?>">
                            <?php echo html_entity_decode($iN->iN_SelectedMenuIcon('51')) . $LANG['become_a_subscriber']; ?>
                        </div>
                    <?php } else { if($p_subscription_type == 'point'){?>
                        <div class="i_btn_unsubscribe transition unSubUP" data-u="<?php echo filter_var($p_profileID, FILTER_SANITIZE_STRING); ?>">
                            <?php echo html_entity_decode($iN->iN_SelectedMenuIcon('51')) . $LANG['unsubscribe']; ?>
                        </div>
                    <?php }else{?>
                        <div class="i_btn_unsubscribe transition unSubU" data-u="<?php echo filter_var($p_profileID, FILTER_SANITIZE_STRING); ?>">
                            <?php echo html_entity_decode($iN->iN_SelectedMenuIcon('51')) . $LANG['unsubscribe']; ?>
                        </div>
                    <?php }}?> 
                    <div class="i_btn_send_to_point transition sendPoint tabing flex_" data-u="<?php echo filter_var($p_profileID, FILTER_SANITIZE_STRING); ?>">
                        <?php echo html_entity_decode($iN->iN_SelectedMenuIcon('145')) . $LANG['offer_a_tip']; ?>
                    </div>
               </div>
               <?php }?>
               <?php }?> 
                   <?php 
                    $sociallinks = $iN->iN_ShowUserSocialSites($p_profileID);
                   if($sociallinks){
                        echo '<div class="i_profile_menu"><div class="i_profile_menu_middle flex_ tabing">';
                        foreach($sociallinks as $sDa){
                            $sLink = $sDa['s_link'];
                            $sIcon = $sDa['social_icon'];
                            echo '<div class="s_m_link flex_ tabing"><a class="flex_ tabing" href="'.filter_var($sLink, FILTER_VALIDATE_URL).'">'.$sIcon.'</a></div>';
                        }
                        echo '</div></div>';
                   }?>
                <?php if ($p_profileBio) {?>
               <div class="i_p_item_box">
                   <div class="i_p_bio"><?php echo html_entity_decode($p_profileBio); ?></div>
               </div>
               <?php }?>
               <div class="i_profile_menu">
                    <div class="i_profile_menu_middle flex_ tabing">
                        <!----> 
                        <div class="i_profile_menu_item <?php if(!isset($pCat)){echo 'active_page_menu';}?>">
                            <a href="<?php echo filter_var($profileUrl, FILTER_VALIDATE_URL);?>">
                            <div class="i_p_sum"><?php echo filter_var($totalPost, FILTER_SANITIZE_STRING); ?></div>
                            <div class="i_profile_menu_item_con flex_ tabing">
                                <div class="i_profile_menu_icon flex_ tabing"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('67')); ?></div>
                                <div class="i_profile_menu_item_name flex_ tabing"><?php echo filter_var($LANG['profile_posts'], FILTER_SANITIZE_STRING);?></div>
                            </div>
                            </a>
                        </div> 
                        <!---->
                        <!---->
                        <div class="i_profile_menu_item <?php echo filter_var($pCat, FILTER_SANITIZE_STRING) == 'photos' ? "active_page_menu" : ""; ?>">
                            <a href="<?php echo filter_var($base_url.$p_username.'?pcat=photos', FILTER_VALIDATE_URL);?>">
                            <div class="i_p_sum"><?php echo filter_var($totalImagePost, FILTER_SANITIZE_STRING); ?></div>
                            <div class="i_profile_menu_item_con flex_ tabing">
                                <div class="i_profile_menu_icon flex_ tabing"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('68')); ?></div>
                                <div class="i_profile_menu_item_name flex_ tabing"><?php echo filter_var($LANG['profile_post_images'], FILTER_SANITIZE_STRING);?></div>
                            </div>
                            </a>
                        </div>
                        <!---->
                        <!---->
                        <div class="i_profile_menu_item <?php echo filter_var($pCat, FILTER_SANITIZE_STRING) == 'videos' ? "active_page_menu" : ""; ?>">
                            <a href="<?php echo filter_var($base_url.$p_username.'?pcat=videos', FILTER_VALIDATE_URL);?>">
                            <div class="i_p_sum"><?php echo filter_var($totalVideoPosts, FILTER_SANITIZE_STRING); ?></div>
                            <div class="i_profile_menu_item_con flex_ tabing">
                                <div class="i_profile_menu_icon flex_ tabing"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('52')); ?></div>
                                <div class="i_profile_menu_item_name flex_ tabing"><?php echo filter_var($LANG['profile_videos'], FILTER_SANITIZE_STRING);?></div>
                            </div>
                            </a>
                        </div>
                        <!---->
                        <!---->
                        <div class="i_profile_menu_item <?php echo filter_var($pCat, FILTER_SANITIZE_STRING) == 'audios' ? "active_page_menu" : ""; ?>">
                            <a href="<?php echo filter_var($base_url.$p_username.'?pcat=audios', FILTER_VALIDATE_URL);?>">
                            <div class="i_p_sum"><?php echo filter_var($totalAudioPosts, FILTER_SANITIZE_STRING);?></div>
                            <div class="i_profile_menu_item_con flex_ tabing">
                                <div class="i_profile_menu_icon flex_ tabing"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('152')); ?></div>
                                <div class="i_profile_menu_item_name flex_ tabing"><?php echo filter_var($LANG['profile_audios'], FILTER_SANITIZE_STRING);?></div>
                            </div>
                            </a>
                        </div>
                        <!---->
                        <!---->
                        <div class="i_profile_menu_item <?php echo filter_var($pCat, FILTER_SANITIZE_STRING) == 'products' ? "active_page_menu" : ""; ?>">
                            <a href="<?php echo filter_var($base_url.$p_username.'?pcat=products', FILTER_VALIDATE_URL);?>">
                            <div class="i_p_sum"><?php echo filter_var($totalProducts, FILTER_SANITIZE_STRING);?></div>
                            <div class="i_profile_menu_item_con flex_ tabing">
                                <div class="i_profile_menu_icon flex_ tabing"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('158')); ?></div>
                                <div class="i_profile_menu_item_name flex_ tabing"><?php echo filter_var($LANG['profile_products'], FILTER_SANITIZE_STRING);?></div>
                            </div>
                            </a>
                        </div>
                        <!---->
                    </div>
                </div>
          </div>
          <!--/USER PROFILE INFO-->
       </div>
   </div>
</div>
