<?php 
$liveMessageList = $iN->iN_LiveChatMessages($liveID, $userID);
if($liveMessageList) {
   foreach($liveMessageList as $lmData){
      $messageID = $lmData['cm_id'];
      $messageLiveID = $lmData['cm_live_id'];
      $messageLiveUserID = $lmData['cm_iuid_fk'];
      $messageLiveTime = $lmData['cm_time'];
      $liveMessage = $lmData['cm_message'];
      $giftSended = isset($lmData['cm_gift_type']) ? $lmData['cm_gift_type'] : NULL;  
      $msgData = $iN->iN_GetUserDetails($messageLiveUserID);
      $msgUserName = $base_url.$msgData['i_username'];
      $msgUserFullName = $msgData['i_user_fullname']; 
      if($fullnameorusername == 'no'){
         $msgUserFullName = $msgUserName;
      }
      $getLiveGiftDataFromID = $iN->GetLivePlanDetails($giftSended); 
      $giftIm = '';
      $giftAtColor = '';
      if($giftSended){  
         $liveAnimationImage = isset($getLiveGiftDataFromID['gift_image']) ? $getLiveGiftDataFromID['gift_image'] : NULL;
         $giftIm = "<span class='gift_attan'>".filter_var($LANG['send_you_a_gift'], FILTER_SANITIZE_STRING)."</span><img src='".$base_url.$liveAnimationImage."'>";
         $giftAtColor = 'style="color:#f65169;"';
      } 
?>
<div class="gElp9 flex_ tabing_non_justify eo2As cUq_<?php echo filter_var($messageID, FILTER_SANITIZE_STRING);?>" id="<?php echo filter_var($messageID, FILTER_SANITIZE_STRING);?>">
   <a href="<?php echo filter_var($msgUserName, FILTER_SANITIZE_STRING);?>" target="_blank" <?php echo $giftAtColor;?>><?php echo filter_var($msgUserFullName, FILTER_SANITIZE_STRING);?></a><?php echo filter_var($liveMessage, FILTER_SANITIZE_STRING); echo html_entity_decode($giftIm);?>
</div>  
<?php }} ?>