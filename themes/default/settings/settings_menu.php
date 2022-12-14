<div class="settings_left_menu">
   <div class="settings_mobile_ope_menu">
      <div class="settings_mobile_menu_container transition flex_ tabing"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('100')).$LANG['menu'];?></div>
   </div> 
  <div class="i_settings_menu_wrapper">
     <div class="i_settings_title"><?php echo filter_var($LANG['settings'], FILTER_SANITIZE_STRING);?></div>
     <div class="i_s_menus">
        <div class="i_s_menus_title"><?php echo filter_var($LANG['menu_arrow_account_title'], FILTER_SANITIZE_STRING);?></div>
        <div class="i_s_menu_wrapper">
        <?php if($feesStatus == '2'){?>
            <a href="<?php echo filter_var($base_url, FILTER_SANITIZE_STRING);?>settings?tab=dashboard">
               <div class="i_s_menu_box transition <?php echo filter_var($pageGet, FILTER_SANITIZE_STRING) == 'dashboard' ? "active_p" : ""; ?>">
                  <?php echo html_entity_decode($iN->iN_SelectedMenuIcon('35'));?> <?php echo filter_var($LANG['dashboard'], FILTER_SANITIZE_STRING);?>
               </div>
            </a>
         <?php }?>
            <a href="<?php echo filter_var($base_url, FILTER_SANITIZE_STRING);?>settings?tab=my_profile">
               <div class="i_s_menu_box transition <?php echo filter_var($pageGet, FILTER_SANITIZE_STRING) == 'my_profile' ? "active_p" : ""; ?>">
                  <?php echo html_entity_decode($iN->iN_SelectedMenuIcon('83'));?> <?php echo filter_var($LANG['my_profile'], FILTER_SANITIZE_STRING);?>
               </div>
            </a>
            <a href="<?php echo filter_var($base_url, FILTER_SANITIZE_STRING);?>settings?tab=my_followers">
               <div class="i_s_menu_box transition <?php echo filter_var($pageGet, FILTER_SANITIZE_STRING) == 'my_followers' ? "active_p" : ""; ?>">
                  <?php echo html_entity_decode($iN->iN_SelectedMenuIcon('140'));?> <?php echo filter_var($LANG['my_followers'], FILTER_SANITIZE_STRING);?>
               </div>
            </a>
            <a href="<?php echo filter_var($base_url, FILTER_SANITIZE_STRING);?>settings?tab=im_following">
               <div class="i_s_menu_box transition <?php echo filter_var($pageGet, FILTER_SANITIZE_STRING) == 'im_following' ? "active_p" : ""; ?>">
                  <?php echo html_entity_decode($iN->iN_SelectedMenuIcon('139'));?> <?php echo filter_var($LANG['im_following'], FILTER_SANITIZE_STRING);?>
               </div>
            </a>
            <a href="<?php echo filter_var($base_url, FILTER_SANITIZE_STRING);?>settings?tab=stories">
               <div class="i_s_menu_box transition <?php echo filter_var($pageGet, FILTER_SANITIZE_STRING) == 'stories' ? "active_p" : ""; ?>">
                  <?php echo html_entity_decode($iN->iN_SelectedMenuIcon('154'));?> <?php echo filter_var($LANG['my_stories'], FILTER_SANITIZE_STRING);?>
               </div>
            </a>
            <a href="<?php echo filter_var($base_url, FILTER_SANITIZE_STRING);?>settings?tab=purchased_points">
               <div class="i_s_menu_box transition <?php echo filter_var($pageGet, FILTER_SANITIZE_STRING) == 'purchased_points' ? "active_p" : ""; ?>">
                  <?php echo html_entity_decode($iN->iN_SelectedMenuIcon('40'));?> <?php echo filter_var($LANG['purchased_points'], FILTER_SANITIZE_STRING);?>
               </div>
            </a>
            <a href="<?php echo filter_var($base_url, FILTER_SANITIZE_STRING);?>settings?tab=qrCode">
               <div class="i_s_menu_box transition <?php echo filter_var($pageGet, FILTER_SANITIZE_STRING) == 'qrCode' ? "active_p" : ""; ?>">
                  <?php echo html_entity_decode($iN->iN_SelectedMenuIcon('146'));?> <?php echo filter_var($LANG['qrCodeGenerator'], FILTER_SANITIZE_STRING);?>
               </div>
            </a>
            <?php if($affilateSystemStatus == 'yes'){?>
            <a href="<?php echo filter_var($base_url, FILTER_SANITIZE_STRING);?>settings?tab=affiliate">
               <div class="i_s_menu_box transition <?php echo filter_var($pageGet, FILTER_SANITIZE_STRING) == 'affiliate' ? "active_p" : ""; ?>">
                  <?php echo html_entity_decode($iN->iN_SelectedMenuIcon('148'));?> <?php echo filter_var($LANG['my_affilate'], FILTER_SANITIZE_STRING);?>
               </div>
            </a>
            <?php }?>
            <?php if($earnPointSystemStatus == 'yes'){?>
            <a href="<?php echo filter_var($base_url, FILTER_SANITIZE_STRING);?>settings?tab=earned_points">
               <div class="i_s_menu_box transition <?php echo filter_var($pageGet, FILTER_SANITIZE_STRING) == 'earned_points' ? "active_p" : ""; ?>">
                  <?php echo html_entity_decode($iN->iN_SelectedMenuIcon('151'));?> <?php echo filter_var($LANG['earned_points'], FILTER_SANITIZE_STRING);?>
               </div>
            </a>
            <?php }?>
            <a href="<?php echo filter_var($base_url, FILTER_SANITIZE_STRING);?>settings?tab=subscriptions">
               <div class="i_s_menu_box transition <?php echo filter_var($pageGet, FILTER_SANITIZE_STRING) == 'subscriptions' ? "active_p" : ""; ?>">
                  <?php echo html_entity_decode($iN->iN_SelectedMenuIcon('43'));?> <?php echo filter_var($LANG['subscriptions'], FILTER_SANITIZE_STRING);?>
               </div>
            </a>
         </div>
         <div class="i_s_menus_title"><?php echo filter_var($LANG['privacy'], FILTER_SANITIZE_STRING);?></div>
         <div class="i_s_menu_wrapper">
            <a href="<?php echo filter_var($base_url, FILTER_SANITIZE_STRING);?>settings?tab=password">
               <div class="i_s_menu_box transition <?php echo filter_var($pageGet, FILTER_SANITIZE_STRING) == 'password' ? "active_p" : ""; ?>">
                  <?php echo html_entity_decode($iN->iN_SelectedMenuIcon('6'));?> <?php echo filter_var($LANG['password'], FILTER_SANITIZE_STRING);?>
               </div>
            </a>
            <a href="<?php echo filter_var($base_url, FILTER_SANITIZE_STRING);?>settings?tab=preferences">
               <div class="i_s_menu_box transition <?php echo filter_var($pageGet, FILTER_SANITIZE_STRING) == 'preferences' ? "active_p" : ""; ?>">
                  <?php echo html_entity_decode($iN->iN_SelectedMenuIcon('105'));?> <?php echo filter_var($LANG['preferences'], FILTER_SANITIZE_STRING);?>
               </div>
            </a>
            <?php if($userCanBlockCountryStatus == 'yes'){?>
            <a href="<?php echo filter_var($base_url, FILTER_SANITIZE_STRING);?>settings?tab=blocked">
               <div class="i_s_menu_box transition <?php echo filter_var($pageGet, FILTER_SANITIZE_STRING) == 'blocked' ? "active_p" : ""; ?>">
                  <?php echo html_entity_decode($iN->iN_SelectedMenuIcon('64'));?> <?php echo filter_var($LANG['blocked'], FILTER_SANITIZE_STRING);?>
               </div>
            </a>
            <?php }?> 
         </div>
         <?php if($iN->iN_ShopData($userID, 1) == 'yes'){?>
            <?php if($feesStatus == '2' && $iN->iN_ShopData($userID, '8') == 'yes'){?>
            <div class="i_s_menus_title"><?php echo filter_var($LANG['shop'], FILTER_SANITIZE_STRING);?></div>
            <div class="i_s_menu_wrapper"> 
               <a href="<?php echo filter_var($base_url, FILTER_SANITIZE_STRING);?>settings?tab=createaProduct">
                  <div class="i_s_menu_box transition <?php echo filter_var($pageGet, FILTER_SANITIZE_STRING) == 'createaProduct' ? "active_p" : ""; ?>">
                     <?php echo html_entity_decode($iN->iN_SelectedMenuIcon('159'));?> <?php echo filter_var($LANG['createaProduct'], FILTER_SANITIZE_STRING);?>
                  </div>
               </a>
               <a href="<?php echo filter_var($base_url, FILTER_SANITIZE_STRING);?>settings?tab=myProducts">
                  <div class="i_s_menu_box transition <?php echo filter_var($pageGet, FILTER_SANITIZE_STRING) == 'myProducts' ? "active_p" : ""; ?>">
                     <?php echo html_entity_decode($iN->iN_SelectedMenuIcon('158'));?> <?php echo filter_var($LANG['myProducts'], FILTER_SANITIZE_STRING);?>
                  </div>
               </a>
               <a href="<?php echo filter_var($base_url, FILTER_SANITIZE_STRING);?>settings?tab=mySales">
                  <div class="i_s_menu_box transition <?php echo filter_var($pageGet, FILTER_SANITIZE_STRING) == 'mySales' ? "active_p" : ""; ?>">
                     <?php echo html_entity_decode($iN->iN_SelectedMenuIcon('155'));?> <?php echo filter_var($LANG['mySales'], FILTER_SANITIZE_STRING);?>
                  </div>
               </a>
               <a href="<?php echo filter_var($base_url, FILTER_SANITIZE_STRING);?>settings?tab=myPurchasedProducts">
                  <div class="i_s_menu_box transition <?php echo filter_var($pageGet, FILTER_SANITIZE_STRING) == 'myPurchasedProducts' ? "active_p" : ""; ?>">
                     <?php echo html_entity_decode($iN->iN_SelectedMenuIcon('156'));?> <?php echo filter_var($LANG['myPurchasedProducts'], FILTER_SANITIZE_STRING);?>
                  </div>
               </a>
            </div>
            <?php }else if($iN->iN_ShopData($userID, '8') == 'no'){?>
               <div class="i_s_menus_title"><?php echo filter_var($LANG['shop'], FILTER_SANITIZE_STRING);?></div>
               <div class="i_s_menu_wrapper"> 
                  <a href="<?php echo filter_var($base_url, FILTER_SANITIZE_STRING);?>settings?tab=createaProduct">
                     <div class="i_s_menu_box transition <?php echo filter_var($pageGet, FILTER_SANITIZE_STRING) == 'createaProduct' ? "active_p" : ""; ?>">
                        <?php echo html_entity_decode($iN->iN_SelectedMenuIcon('159'));?> <?php echo filter_var($LANG['createaProduct'], FILTER_SANITIZE_STRING);?>
                     </div>
                  </a>
                  <a href="<?php echo filter_var($base_url, FILTER_SANITIZE_STRING);?>settings?tab=myProducts">
                     <div class="i_s_menu_box transition <?php echo filter_var($pageGet, FILTER_SANITIZE_STRING) == 'myProducts' ? "active_p" : ""; ?>">
                        <?php echo html_entity_decode($iN->iN_SelectedMenuIcon('158'));?> <?php echo filter_var($LANG['myProducts'], FILTER_SANITIZE_STRING);?>
                     </div>
                  </a>
                  <a href="<?php echo filter_var($base_url, FILTER_SANITIZE_STRING);?>settings?tab=mySales">
                     <div class="i_s_menu_box transition <?php echo filter_var($pageGet, FILTER_SANITIZE_STRING) == 'mySales' ? "active_p" : ""; ?>">
                        <?php echo html_entity_decode($iN->iN_SelectedMenuIcon('155'));?> <?php echo filter_var($LANG['mySales'], FILTER_SANITIZE_STRING);?>
                     </div>
                  </a>
                  <a href="<?php echo filter_var($base_url, FILTER_SANITIZE_STRING);?>settings?tab=myPurchasedProducts">
                     <div class="i_s_menu_box transition <?php echo filter_var($pageGet, FILTER_SANITIZE_STRING) == 'myPurchasedProducts' ? "active_p" : ""; ?>">
                        <?php echo html_entity_decode($iN->iN_SelectedMenuIcon('156'));?> <?php echo filter_var($LANG['myPurchasedProducts'], FILTER_SANITIZE_STRING);?>
                     </div>
                  </a>
               </div> 
            <?php }?>
         <?php }?> 
         <div class="i_s_menus_title"><?php echo filter_var($LANG['payments'], FILTER_SANITIZE_STRING);?></div>
         <div class="i_s_menu_wrapper"> 
            <a href="<?php echo filter_var($base_url, FILTER_SANITIZE_STRING);?>settings?tab=my_payments">
               <div class="i_s_menu_box transition <?php echo filter_var($pageGet, FILTER_SANITIZE_STRING) == 'my_payments' ? "active_p" : ""; ?>">
                  <?php echo html_entity_decode($iN->iN_SelectedMenuIcon('42'));?> <?php echo filter_var($LANG['my_payments'], FILTER_SANITIZE_STRING);?>
               </div>
            </a>
           <?php if($feesStatus == '2'){?>
            <a href="<?php echo filter_var($base_url, FILTER_SANITIZE_STRING);?>settings?tab=payout_methods">
               <div class="i_s_menu_box transition <?php echo filter_var($pageGet, FILTER_SANITIZE_STRING) == 'payout_methods' ? "active_p" : ""; ?>">
                  <?php echo html_entity_decode($iN->iN_SelectedMenuIcon('77'));?> <?php echo filter_var($LANG['payout_methods'], FILTER_SANITIZE_STRING);?>
               </div>
            </a>
            <a href="<?php echo filter_var($base_url, FILTER_SANITIZE_STRING);?>settings?tab=payments">
               <div class="i_s_menu_box transition <?php echo filter_var($pageGet, FILTER_SANITIZE_STRING) == 'payments' ? "active_p" : ""; ?>">
                  <?php echo html_entity_decode($iN->iN_SelectedMenuIcon('42'));?> <?php echo filter_var($LANG['payments'], FILTER_SANITIZE_STRING);?>
               </div>
            </a>
            <a href="<?php echo filter_var($base_url, FILTER_SANITIZE_STRING);?>settings?tab=payout_history">
               <div class="i_s_menu_box transition <?php echo filter_var($pageGet, FILTER_SANITIZE_STRING) == 'payout_history' ? "active_p" : ""; ?>">
                  <?php echo html_entity_decode($iN->iN_SelectedMenuIcon('85'));?> <?php echo filter_var($LANG['payout_history'], FILTER_SANITIZE_STRING);?>
               </div>
            </a>
            <a href="<?php echo filter_var($base_url, FILTER_SANITIZE_STRING);?>settings?tab=withdrawal">
               <div class="i_s_menu_box transition <?php echo filter_var($pageGet, FILTER_SANITIZE_STRING) == 'withdrawal' ? "active_p" : ""; ?>">
                  <?php echo html_entity_decode($iN->iN_SelectedMenuIcon('86'));?> <?php echo filter_var($LANG['withdrawal'], FILTER_SANITIZE_STRING);?>
               </div>
            </a>
            <?php } ?>
        </div>
        <div class="i_s_menus_title"><?php echo filter_var($LANG['premium_zone'], FILTER_SANITIZE_STRING);?></div>
        <div class="i_s_menu_wrapper">
        <?php if($feesStatus == '2'){?>
            <a href="<?php echo filter_var($base_url, FILTER_SANITIZE_STRING);?>settings?tab=subscription_payments">
               <div class="i_s_menu_box transition <?php echo filter_var($pageGet, FILTER_SANITIZE_STRING) == 'subscription_payments' ? "active_p" : ""; ?>">
                  <?php echo html_entity_decode($iN->iN_SelectedMenuIcon('42'));?> <?php echo filter_var($LANG['subscription_payments'], FILTER_SANITIZE_STRING);?>
               </div>
            </a>
            <a href="<?php echo filter_var($base_url, FILTER_SANITIZE_STRING);?>settings?tab=fees">
               <div class="i_s_menu_box transition <?php echo filter_var($pageGet, FILTER_SANITIZE_STRING) == 'fees' ? "active_p" : ""; ?>">
                  <?php echo html_entity_decode($iN->iN_SelectedMenuIcon('76'));?> <?php echo filter_var($LANG['fees'], FILTER_SANITIZE_STRING);?>
               </div>
            </a>
            <a href="<?php echo filter_var($base_url, FILTER_SANITIZE_STRING);?>settings?tab=subscribers"> 
               <div class="i_s_menu_box transition <?php echo filter_var($pageGet, FILTER_SANITIZE_STRING) == 'subscribers' ? "active_p" : ""; ?>">
                  <?php echo html_entity_decode($iN->iN_SelectedMenuIcon('51'));?> <?php echo filter_var($LANG['subscribers'], FILTER_SANITIZE_STRING);?>
               </div>
            </a>
            <?php if($videoCallFeatureStatus == 'yes'){?>
               <a href="<?php echo filter_var($base_url, FILTER_SANITIZE_STRING);?>settings?tab=videoCallSet"> 
               <div class="i_s_menu_box transition <?php echo filter_var($pageGet, FILTER_SANITIZE_STRING) == 'videoCallSet' ? "active_p" : ""; ?>">
                  <?php echo html_entity_decode($iN->iN_SelectedMenuIcon('52'));?> <?php echo filter_var($LANG['videoCallSet'], FILTER_SANITIZE_STRING);?>
               </div>
            </a>
            <?php }?> 
            <?php if($userCanBlockCountryStatus == 'yes'){?>
            <a href="<?php echo filter_var($base_url, FILTER_SANITIZE_STRING);?>settings?tab=block_country">
               <div class="i_s_menu_box transition <?php echo filter_var($pageGet, FILTER_SANITIZE_STRING) == 'block_country' ? "active_p" : ""; ?>">
                  <?php echo html_entity_decode($iN->iN_SelectedMenuIcon('138'));?> <?php echo filter_var($LANG['block_country'], FILTER_SANITIZE_STRING);?>
               </div>
            </a>
            <?php } ?>
         <?php }else{ ?>
            <?php if($beaCreatorStatus == 'request'){?>
            <a href="<?php echo filter_var($base_url, FILTER_SANITIZE_STRING);?>creator/becomeCreator">
               <div class="i_s_menu_box transition become_a_creator active_p">
                  <?php echo html_entity_decode($iN->iN_SelectedMenuIcon('9'));?> <?php echo filter_var($LANG['become_creator'], FILTER_SANITIZE_STRING);?>
               </div>
            </a> 
            <?php }?>
         <?php } ?>
        </div>
     </div>
  </div>
</div>

