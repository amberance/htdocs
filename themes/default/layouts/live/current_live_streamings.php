<div class="i_created_live_streamings_container">
  <div class="i_list_live_streams flex_">
     <div class="i_l_see_others flex_">
       <a href="<?php echo $base_url . 'live_streams?live=both'; ?>" class="flex_"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('143')); ?> <span class="flex_"><?php echo filter_var($LANG['see_the_otherss'], FILTER_SANITIZE_STRING); ?></span></a>
     </div>
	 <?php if($logedIn == '1' && $paidLiveStreamingStatus == '1' && $feesStatus == '2'){?>
     <div class="c_live_streaming flex_ cNLive" data-type="paidLive">
        <div class="i_live_p_icon flex_"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('40')); ?></div>
        <div class="c_live_plus flex_"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('91')); ?></div>
     </div>
	 <?php }?>
	 <?php if($logedIn == '1' && $freeLiveStreamingStatus == '1'){?>
     <div class="c_live_streaming flex_ cNLive" data-type="freeLive">
        <div class="i_live_p_icon flex_"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('115')); ?></div>
        <div class="c_live_plus flex_"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('91')); ?></div>
     </div>
	 <?php }?>
     <!--/N/-->
     <?php
$LiveStreamingList = $iN->iN_LiveStreamingListWidget($showingNumberOfPost);
if ($LiveStreamingList) {
	foreach ($LiveStreamingList as $liData) {
		$liveID = $liData['live_id'];
		$liveName = $liData['live_name'];
		$live_Status = $liData['live_type'];
		$liveCredit = isset($liData['live_credit']) ? $liData['live_credit'] : NULL;
		$liveCreatorID = $liData['live_uid_fk'];
		$liveUserAvatar = $iN->iN_UserAvatar($liveCreatorID, $base_url);
		$liveCreatorUserName = $liData['i_username'];
		$liveCreatorUserFullName = $liData['i_user_fullname'];
		$liveFinishTime = $liData['finish_time'];
		$remaining = $liveFinishTime - time();
		$remaminingTime = date('i', $remaining);
		$checkLiveStreamPurchased = '';
		if ($logedIn == '1') {
			$checkLiveStreamPurchased = $iN->iN_CheckUserPurchasedThisLiveStream($userID, $liveID);
		}
		if ($logedIn != '1') {
			$userID = '1';
		}
		if ($live_Status == 'free') {
			$lStat = '<div class="i_live_paid flex_">' . $iN->iN_SelectedMenuIcon('115') . '</div>';
		} else {
			$lStat = '<div class="i_live_paid flex_">' . $iN->iN_SelectedMenuIcon('40') . '</div>';
		}
		?>
               <div class="i_list_live_i_c flex_">
                  <?php echo html_entity_decode($lStat); ?>
                  <a href="<?php echo filter_var($base_url, FILTER_SANITIZE_STRING) . 'live/' . filter_var($liveCreatorUserName, FILTER_SANITIZE_STRING); ?>">
                     <div class="i_list_live_owner"><img src="<?php echo filter_var($liveUserAvatar, FILTER_SANITIZE_STRING); ?>"></div>
                  </a>
               </div>
               <?php
}
}
?>

     <!--/N/-->
  </div>
</div> 