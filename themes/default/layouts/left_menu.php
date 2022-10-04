<div class="leftSticky mobile_left">
   <div class="i_left_container"> 
        <div class="leftSidebar_in">
            <div class="leftSidebarWrapper">
               <div class="btest">
                 <!--Menu-->
                 <a href="<?php echo filter_var($base_url, FILTER_VALIDATE_URL);?>">
                 <div class="i_left_menu_box transition">
                    <?php echo html_entity_decode($iN->iN_SelectedMenuIcon('99'));?> <div class="m_tit"><?php echo filter_var($LANG['home_page'], FILTER_SANITIZE_STRING);?></div>
                 </div> 
                 </a>
                 <!--/Menu-->
                 <!--Menu-->
                 <a href="<?php echo filter_var($base_url, FILTER_SANITIZE_STRING);?>marketplace?cat=all">
                 <div class="i_left_menu_box transition">
                    <?php echo html_entity_decode($iN->iN_SelectedMenuIcon('158'));?> <div class="m_tit"><?php echo filter_var($LANG['marketplace'], FILTER_SANITIZE_STRING);?></div>
                 </div> 
                 </a>
                 <!--/Menu--> 
                 <?php if($logedIn == '1'){?> 
                 <!--Menu-->
                 <a href="<?php echo filter_var($userProfileUrl, FILTER_VALIDATE_URL);?>">
                 <div class="i_left_menu_box transition">
                    <div class="i_left_menu_profile_avatar"><img src="<?php echo filter_var($userAvatar, FILTER_SANITIZE_STRING);?>" alt="<?php echo filter_var($userFullName, FILTER_SANITIZE_STRING);?>"/></div> <div class="m_tit"><?php echo filter_var($LANG['profile'], FILTER_SANITIZE_STRING);?></div>
                 </div>
                 </a>
                 <!--/Menu--> 
                 <?php if($feesStatus == '2'){?>
                 <!--Menu-->
                 <a href="<?php echo filter_var($base_url, FILTER_VALIDATE_URL);?>settings?tab=dashboard">
                 <div class="i_left_menu_box transition">
                    <?php echo html_entity_decode($iN->iN_SelectedMenuIcon('35'));?> <div class="m_tit"><?php echo filter_var($LANG['dashboard'], FILTER_SANITIZE_STRING);?></div>
                 </div> 
                 </a>
                 <!--/Menu-->
                 <?php }?>
                 <!--Menu--> 
                 <div class="i_left_menu_box transition g_feed" data-get="friends" data-type="moreposts">
                    <?php echo html_entity_decode($iN->iN_SelectedMenuIcon('7'));?> <div class="m_tit"><?php echo filter_var($LANG['newsfeed'], FILTER_SANITIZE_STRING);?></div>
                 </div> 
                 <!--/Menu-->
                 <!--Menu--> 
                 <div class="i_left_menu_box transition g_feed" data-get="allPosts" data-type="moreexplore">
                    <?php echo html_entity_decode($iN->iN_SelectedMenuIcon('8'));?> <div class="m_tit"><?php echo filter_var($LANG['explore'], FILTER_SANITIZE_STRING);?></div>
                 </div> 
                 <!--/Menu-->
                 <!--Menu--> 
                 <div class="i_left_menu_box transition g_feed" data-get="premiums" data-type="morepremium">
                    <?php echo html_entity_decode($iN->iN_SelectedMenuIcon('9'));?> <div class="m_tit"><?php echo filter_var($LANG['premium'], FILTER_SANITIZE_STRING);?></div>
                 </div> 
                 <!--/Menu-->
                 <!--Menu--> 
                 <a href="<?php echo filter_var($base_url, FILTER_VALIDATE_URL);?>creators">
                  <div class="i_left_menu_box transition">
                     <?php echo html_entity_decode($iN->iN_SelectedMenuIcon('95'));?> <div class="m_tit"><?php echo filter_var($LANG['our_creators'], FILTER_SANITIZE_STRING);?></div>
                  </div> 
                 </a>
                 <!--/Menu-->
                 <?php } ?>
                 <?php if($agoraStatus == '1' && $page != 'profile'){?>
                  <!--//--> 
                     <?php if($logedIn == '1' && $paidLiveStreamingStatus == '1' && $feesStatus == '2'){?>
                        <div class="live_item_cont paidLive">
                           <div class="new_s_one new_s_first cNLive" data-type="paidLive"><div class="flex_ alignItem"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('91'));?><?php echo $LANG['start_new_paid_live_stream'];?></div></div>
                           <a href="<?php echo $base_url.'live_streams?live=paid';?>">
                           <div class="live_item transition">
                              <div class="live_title flex_"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('133'));?><?php echo filter_var($LANG['paid_live_streamings'], FILTER_SANITIZE_STRING);?></div> 
                           </div>
                           </a>
                        </div>
                     <?php }?>
                  
                     <?php if($logedIn == '1' && $freeLiveStreamingStatus == '1'){?>
                        <div class="live_item_cont freeLive">
                           <div class="new_s_one new_s_second cNLive" data-type="freeLive"><div class="flex_ alignItem"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('91'));?><?php echo $LANG['start_new_free_live_stream'];?></div></div>
                           <a href="<?php echo $base_url.'live_streams?live=free';?>">
                           <div class="live_item transition">
                              <div class="live_title flex_"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('134'));?><?php echo filter_var($LANG['free_live_streams'], FILTER_SANITIZE_STRING);?></div> 
                           </div>
                           </a>
                        </div>
                     <?php }?>
                     
                  <!--//-->
                  <?php }?>
                 </div>
            </div>
        </div>  
   </div>
</div>