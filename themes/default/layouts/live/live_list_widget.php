<?php 
$lastPostID = isset($_POST['last']) ? $_POST['last'] : '';
$liveListType = 'both';
$pages = 'both';
if(isset($liveListType) && !empty($liveListType)){ 
  $liveListData = $iN->iN_LiveStreaminsListAllTypeSuggested($lastPostID,$userID, $showingNumberOfPost); 
  if($liveListData){
    echo '<div class="i_right_box_header">Suggested Live Streamings</div>';
     foreach($liveListData as $liData){
         $liveID = $liData['live_id'];
         $liveName = $liData['live_name'];
         $liveCredit = isset($liData['live_credit']) ? $liData['live_credit'] : NULL;
         $liveCreatorID = $liData['live_uid_fk'];
         $liveUserAvatar = $iN->iN_UserAvatar($liveCreatorID, $base_url);
         $liveUserCover = $iN->iN_UserCover($liveCreatorID, $base_url);
         $liveCreatorUserName = $liData['i_username'];
         $liveCreatorUserFullName = $liData['i_user_fullname'];
         if($fullnameorusername == 'no'){
          $liveCreatorUserFullName = $liveCreatorUserName;
         }
         $liveFinishTime = $liData['finish_time'];
         $remaining = $liveFinishTime - time();
         $remaminingTime = date('i', $remaining);
         $checkLiveStreamPurchased = '';
         if($logedIn == '1'){
           $checkLiveStreamPurchased = $iN->iN_CheckUserPurchasedThisLiveStream($userID, $liveID);
         }
         if($logedIn != '1'){
            $userID = '1';
         }
?> 
<div class="i_left_menu_box transition">
  <a href="<?php echo filter_var($base_url, FILTER_SANITIZE_STRING) . 'live/' . filter_var($liveCreatorUserName, FILTER_SANITIZE_STRING); ?>"><div class="i_live_user_avatar"><img src="<?php echo $liveUserAvatar;?>"></div><div class="m_tit"><?php echo $liveCreatorUserFullName;?></div></a>
</div>
<?php }
  } 
}
?>