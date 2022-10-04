<?php
include("../includes/inc.php");
if(isset($_POST['f']) && $logedIn == '1'){
    $type = mysqli_real_escape_string($db, $_POST['f']);
    if($type == 'live_calcul'){
      if(isset($_POST['lid']) && !empty($_POST['lid'])){
          $liveID = mysqli_real_escape_string($db, $_POST['lid']);
          $checkLiveExist = $iN->iN_CheckLiveIDExist($liveID);
          if(!$checkLiveExist){
            $redirectUrl = $base_url;
            $data = array(
              'likeCount' => "",
              'onlineCount' => "",
              'time' => "",
              'finished' => $redirectUrl
              ); 
           $result =  json_encode( $data , JSON_UNESCAPED_UNICODE);	
           echo preg_replace('/,\s*"[^"]+":null|"[^"]+":null,?/', '', $result);
           exit();
         }
          $liveTime = $iN->iN_GetLastLiveFinishTimeFromID($liveID);
          $liData = $iN->iN_GetLiveStreamingDetailsByID($liveID);
          $liveStreamingType = $liData['live_type'];
          $currentTime = time(); 
          $redirectUrl = '';    
          $liveCredit = isset($liData['live_credit']) ? $liData['live_credit'] : NULL;
          $liveCreatorID = $liData['live_uid_fk'];
          if($liveCredit && $userID == $liveCreatorID){
             $iN->iN_UpdateLiveStreamingTime($liveID);
          }
          $remaining = $liveTime - time();
          $remaminingTime = intval(date('i', $remaining));
          $liveRemainingTime =  html_entity_decode($iN->iN_SelectedMenuIcon('115')).filter_var($remaminingTime, FILTER_SANITIZE_STRING).$LANG['minutes_left'];
          if($checkLiveExist){
            $json = array();
            $data = array(
               'likeCount' => $iN->iN_TotalLiveLiked($liveID),
               'onlineCount' => $iN->iN_OnlineLiveVideoUserCount($userID, $liveID),
               'time' => $liveRemainingTime,
               'finished' => $redirectUrl
               ); 
            $result =  json_encode( $data , JSON_UNESCAPED_UNICODE);	
            echo preg_replace('/,\s*"[^"]+":null|"[^"]+":null,?/', '', $result);
          }
      }
    }
   if($type == 'liveLastMessage'){
     if(isset($_POST['idc']) && !empty($_POST['idc'])){
         $liveID = mysqli_real_escape_string($db, $_POST['idc']);
         $liveLastMessageID = mysqli_real_escape_string($db, $_POST['lc']);
         $liveMessageList = $iN->iN_GetNewLiveMessage($liveID, $liveLastMessageID);
         if($liveMessageList) {
            foreach($liveMessageList as $lmData){
               $messageID = $lmData['cm_id'];
               $messageLiveID = $lmData['cm_live_id'];
               $messageLiveUserID = $lmData['cm_iuid_fk'];
               $messageLiveTime = $lmData['cm_time'];
               $liveMessage = $lmData['cm_message'];
               $msgData = $iN->iN_GetUserDetails($messageLiveUserID);
               $msgUserName = $base_url.$msgData['i_username'];
               $msgUserFullName = $msgData['i_user_fullname'];
               $giftSended = isset($lmData['cm_gift_type']) ? $lmData['cm_gift_type'] : NULL; 
               $giftIm = '';
               $giftAtColor='';
               if($giftSended){
                  $getLiveGiftDataFromID = $iN->GetLivePlanDetails($giftSended); 
	               $liveAnimationImage = isset($getLiveGiftDataFromID['gift_image']) ? $getLiveGiftDataFromID['gift_image'] : NULL;
                  $giftIm = "<span class='gift_attan'>".filter_var($LANG['send_you_a_gift'], FILTER_SANITIZE_STRING)."</span><img src='".$base_url.$liveAnimationImage."'>";
                  $giftAtColor = 'style="color:#f65169;"';
               } 
                echo '
                <div class="gElp9 flex_ tabing_non_justify eo2As mytransition cUq_'.filter_var($messageID, FILTER_SANITIZE_STRING).'" id="'.filter_var($messageID, FILTER_SANITIZE_STRING).'">
                  <a href="'.filter_var($msgUserName, FILTER_SANITIZE_STRING).'" target="_blank" '.$giftAtColor.'>'.filter_var($msgUserFullName, FILTER_SANITIZE_STRING).'</a>'.$liveMessage.$giftIm.'
                </div>
                ';
            }
         }
     }
   }
}
?>