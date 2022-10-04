<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <title><?php echo filter_var($siteTitle, FILTER_SANITIZE_STRING); ?></title>
    <?php
include "layouts/header/meta.php";
include "layouts/header/css.php";
include "layouts/header/javascripts.php";
?>
</head>
<body class="chat_p_body">
<?php include "layouts/header/header.php";?>
    <div class="wrapper" style="position:absolute;bottom:0px;">
      <div class="i_chat_wrapper flex_">
        <!--CHAT LEFT CONTAINER-->
        <div class="chat_left_container flex_">
           <!--CHAT LEFT HEADER-->
           <div class="chat_left_header flex_">
              <div class="chat_left_header_title"><?php echo filter_var($LANG['messages'], FILTER_SANITIZE_STRING); ?></div>
              <div class="chat_search_box">
                 <input type="text" id="c_search" class="c_search" placeholder="<?php echo filter_var($LANG['search'], FILTER_SANITIZE_STRING); ?>">
              </div>
           </div>
           <!--/CHAT LEFT HEADER-->
           <!--CHAT SEARCH RESULTS-->
           <div class="chat_users_wrapper_results" style="display:none;"></div>
           <!--/CHAT SERACH RESULTS-->
           <!--CHAT PEOPLES-->
           <div class="chat_users_wrapper">
            <?php
$urlChatID = '';
if (isset($_GET['chat_width'])) {
	$cID = mysqli_real_escape_string($db, $_GET['chat_width']);
	$checkcIDExist = $iN->iN_CheckChatIDExist($cID);
	if ($checkcIDExist) {
		$urlChatID = $cID;
	}
    $chatOwnersStatus = $iN->iN_CheckChatUserOwnersID($userID, $cID);
    if(!$chatOwnersStatus){
        header('Location:'.$base_url.'404');
        exit();
    } 
}
$cList = $iN->iN_ChatUserList($userID, '50');
if ($cList) {
	foreach ($cList as $cData) {
		$chatID = $cData['chat_id'];
		$chatUserIDOne = $cData['user_one'];
		$chatUserIDTwo = $cData['user_two'];
		if ($chatUserIDOne == $userID) {
			$cUID = $chatUserIDTwo;
		} else {
			$cUID = $chatUserIDOne;
		}
		$chatUserAvatar = $iN->iN_UserAvatar($cUID, $base_url);
		$chatUserDetails = $iN->iN_GetUserDetails($cUID);
		$chatUserName = $chatUserDetails['i_username'];
		$chatUserFullName = $chatUserDetails['i_user_fullname'];
		$chatUserGender = $chatUserDetails['user_gender'];
		if ($chatUserGender == 'male') {
			$publisherGender = '<div class="i_plus_g">' . $iN->iN_SelectedMenuIcon('12') . '</div>';
		} else if ($chatUserGender == 'female') {
			$publisherGender = '<div class="i_plus_gf">' . $iN->iN_SelectedMenuIcon('13') . '</div>';
		} else if ($chatUserGender == 'couple') {
			$publisherGender = '<div class="i_plus_g">' . $iN->iN_SelectedMenuIcon('58') . '</div>';
		}
		$latestChatMessage = $iN->iN_GetLatestMessage($chatID);
		$message = isset($latestChatMessage['message']) ? $latestChatMessage['message'] : NULL;
		$messageFile = isset($latestChatMessage['file']) ? $latestChatMessage['file'] : NULL;
		$messageSticker = isset($latestChatMessage['sticker_url']) ? $latestChatMessage['sticker_url'] : NULL;
		$messageGif = isset($latestChatMessage['gifurl']) ? $latestChatMessage['gifurl'] : NULL;
		if ($messageFile) {
			$message = $iN->iN_SelectedMenuIcon('53') . $LANG['isImage'];
		}
		if (!empty($messageSticker)) {
			$message = $iN->iN_SelectedMenuIcon('24') . $LANG['isSticker'];
		}
		if (!empty($messageGif)) {
			$message = $iN->iN_SelectedMenuIcon('23') . $LANG['isGif'];
		}
		?>
            <!--MESSAGE-->
            <div class="i_message_wrpper">
                <a href="<?php echo filter_var($base_url, FILTER_VALIDATE_URL) . 'chat?chat_width=' . $chatID; ?>">
                <div class="i_message_wrapper transition <?php if ($urlChatID == $chatID) {echo 'talking';}?>">
                    <div class="i_message_owner_avatar"><div class="i_message_avatar"><img src="<?php echo filter_var($chatUserAvatar, FILTER_SANITIZE_STRING); ?>" alt="<?php echo filter_var($chatUserFullName, FILTER_SANITIZE_STRING); ?>"></div></div>
                    <div class="i_message_info_container">
                        <div class="i_message_owner_name truncated"><?php echo filter_var($chatUserFullName, FILTER_SANITIZE_STRING); ?><?php echo html_entity_decode($publisherGender); ?></div>
                        <?php if(!empty($message)){?>
                           <div class="i_message_i"><?php echo $urlHighlight->highlightUrls($iN->iN_RemoveYoutubelink($message));?></div>
                        <?php }?>
                    </div>
                </div>
                </a>
                <div class="i_message_setting msg_Set_<?php echo filter_var($chatID, FILTER_SANITIZE_STRING); ?> msg_Set" id="<?php echo filter_var($chatID, FILTER_SANITIZE_STRING); ?>">
                    <div class="i_message_set_icon"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('16')); ?></div>
                    <!--MESSAGE SETTING-->
                    <div class="i_message_set_container msg_Set msg_Set_<?php echo filter_var($chatID, FILTER_SANITIZE_STRING); ?>">
                    <!--MENU ITEM-->
                    <div class="i_post_menu_item_out transition d_conversation" id="<?php echo filter_var($chatID, FILTER_SANITIZE_STRING); ?>">
                        <?php echo html_entity_decode($iN->iN_SelectedMenuIcon('28')); ?> <?php echo filter_var($LANG['delete_message'], FILTER_SANITIZE_STRING); ?>
                    </div>
                    <!--/MENU ITEM-->
                    </div>
                    <!--/MESSAGE SETTING-->
                </div>
            </div>
            <!--/MESSAGE-->
            <?php }}?>
           </div>
           <!--/CHAT PEOPLES-->
        </div>
        <!--/CHAT LEFT CONTAINER-->
        <!---->
        <div class="chat_middle_container flex_">
           <?php
$blockedType = '';
if (isset($_GET['chat_width'])) {
	$cID = mysqli_real_escape_string($db, $_GET['chat_width']);
	$checkcIDExist = $iN->iN_CheckChatIDExist($cID);
	if ($checkcIDExist) {
		$getChatUserIDs = $iN->iN_GetChatUserIDs($cID);
		$cuIDOne = $getChatUserIDs['user_one'];
		$cuIDTwo = $getChatUserIDs['user_two'];
		if ($cuIDOne == $userID) {
			$conversationUserID = $cuIDTwo;
		} else {
			$conversationUserID = $cuIDOne;
		}

	}
	if ($checkcIDExist) {
		echo '<div class="conversations_container flex_">';
		$lastMessageID = isset($_POST['lastMessageID']) ? $_POST['lastMessageID'] : NULL;
		$conversationData = $iN->iN_GetChatMessages($userID, $cID, $lastMessageID, $scrollLimit);
		$cuD = $iN->iN_GetUserDetails($conversationUserID);
		$cuserAvatar = $iN->iN_UserAvatar($conversationUserID, $base_url);
		$conversationUserVerifyStatus = $cuD['user_verified_status'];
		$conversationUserName = $cuD['i_username'];
		$conversationUserFullName = $cuD['i_user_fullname'];
		$conversationUserGender = $cuD['user_gender'];
        $conversationUserOnlineOffline = $cuD['last_login_time'];
        $pCertificationStatus = $cuD['certification_status'];
        $pValidationStatus = $cuD['validation_status'];
        $feesStatus = $cuD['fees_status'];
        $lastLoginDateTime = date("c", $conversationUserOnlineOffline);
        $p_crTime = date('Y-m-d H:i:s',$conversationUserOnlineOffline); 
        $lastSeenTreeMinutesAgo = time() - 60; // Tree minutes ago
        $p_friend_status = $iN->iN_GetRelationsipBetweenTwoUsers($userID, $conversationUserID);
		$checkUserinBlockedList = $iN->iN_CheckUserBlocked($userID, $conversationUserID);
		$checkVisitedProfileBlockedVisitor = $iN->iN_CheckUserBlockedVisitor($conversationUserID, $userID);
		if ($checkUserinBlockedList == '1') {
			$blockedType = $iN->iN_GetUserBlockedType($userID, $conversationUserID);
			$blockNote = preg_replace('/{.*?}/', $conversationUserFullName, $LANG['unblock']);
		} else if ($checkVisitedProfileBlockedVisitor == '1') {
			$blockedType = $iN->iN_GetUserBlockedType($conversationUserID, $userID);
			$blockNote = preg_replace('/{.*?}/', $conversationUserFullName, $LANG['unblock_me']);
		}
		if ($conversationUserGender == 'male') {
			$publisherGender = '<div class="i_plus_g">' . $iN->iN_SelectedMenuIcon('12') . '</div>';
		} else if ($conversationUserGender == 'female') {
			$publisherGender = '<div class="i_plus_gf">' . $iN->iN_SelectedMenuIcon('13') . '</div>';
		} else if ($conversationUserGender == 'couple') {
			$publisherGender = '<div class="i_plus_g">' . $iN->iN_SelectedMenuIcon('58') . '</div>';
		}
		$userVerifiedStatus = '';
		if ($conversationUserVerifyStatus == '1') {
			$userVerifiedStatus = '<div class="i_plus_s">' . $iN->iN_SelectedMenuIcon('11') . '</div>';
		}
		?>
            <!--Conversation HEADER-->
            <div class="conversation_box_header flex_">
                <div class="cList flex_ tabing" id="<?php echo filter_var($cID, FILTER_SANITIZE_STRING); ?>"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('102')); ?></div>
                <div class="conversation_avatar">
                   <img src="<?php echo filter_var($cuserAvatar, FILTER_SANITIZE_STRING); ?>">
                </div>
                <div class="conversation_user_d flex_ tabing_non_justify">
                    <div class="conversation_user tabing_non_justify">
                        <div class="c_u_f_nm"><a class="truncated" href="<?php echo filter_var($base_url, FILTER_VALIDATE_URL) . $conversationUserName; ?>"><?php echo filter_var($conversationUserFullName, FILTER_SANITIZE_STRING); ?></a></div>
                        <div class="c_u_time flex_"></div>
                    </div> 
                        <!--AAAA-->
                        <?php  if($videoCallFeatureStatus == 'yes' && $whoCanCreateVideoCall == 'yes' && $conversationUserOnlineOffline > $lastSeenTreeMinutesAgo && $pCertificationStatus == '2' && $pValidationStatus == '2' && $feesStatus == '2'){?>
                            <div class="c_dotdot tabing flex_">
                                <div class="c_set callUser flex_ transition <?php echo filter_var($isVideoCallFree, FILTER_SANITIZE_STRING) == 'yes' ? 'joinVideoCall' : 'crVidCall';?>" ><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('52')); ?></div>
                            </div> 
                            
                        <?php }else if($videoCallFeatureStatus == 'yes' && $whoCanCreateVideoCall == 'no'){?>
                            <div class="c_dotdot tabing flex_">
                                <div class="c_set callUser flex_ transition <?php echo filter_var($isVideoCallFree, FILTER_SANITIZE_STRING) == 'yes' ? 'joinVideoCall' : 'crVidCall';?>"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('52')); ?></div>
                            </div>
                        <?php }?>
                        <!--AAA-->
                    <div class="c_dotdot tabing flex_">
                        <div class="c_set mcSt flex_ transition"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('16')); ?></div>
                        <div class="cSetc">
                            <!--MENU ITEM-->
                            <div class="i_post_menu_item_out transition d_conversation" id="<?php echo filter_var($conversationUserID, FILTER_SANITIZE_STRING); ?>">
                                <?php echo html_entity_decode($iN->iN_SelectedMenuIcon('28')); ?> <?php echo filter_var($LANG['delete_message'], FILTER_SANITIZE_STRING); ?>
                            </div>
                            <!--/MENU ITEM-->
                            <!--MENU ITEM-->
                            <div class="i_post_menu_item_out transition ublknot truncated" data-u="<?php echo filter_var($conversationUserID, FILTER_SANITIZE_STRING); ?>">
                                <?php echo html_entity_decode($iN->iN_SelectedMenuIcon('64')); ?> <?php echo preg_replace('/{.*?}/', $conversationUserFullName, $LANG['restrict']); ?>
                            </div>
                            <!--/MENU ITEM-->
                        </div>
                    </div>
                </div>
            </div>
            <!--/Conversation HEADER-->
            <div class="messages_container flex_">
                <div class="msg_wrapper">
                  <div class="all_messages">
                    <div class="all_messages_container">
                        <?php
if ($conversationData) {
			foreach ($conversationData as $conData) {
				$cMessageID = $conData['con_id'];
				$cUserOne = $conData['user_one'];
				$cUserTwo = $conData['user_two'];
				$cMessage = isset($conData['message']) ? $conData['message'] : NULL;
				$cMessageTime = $conData['time'];
                if($userTimeZone){
                    date_default_timezone_set($userTimeZone);
                } 
				$message_time = date("c", $cMessageTime);
				$cFile = isset($conData['file']) ? $conData['file'] : NULL;
				$cStickerUrl = isset($conData['sticker_url']) ? $conData['sticker_url'] : NULL;
				$cGifUrl = isset($conData['gifurl']) ? $conData['gifurl'] : NULL;
				$mSeenStatus = $conData['seen_status'];
				$msgDots = '';
				$imStyle = '';
				$seenStatus = '';
				if ($cUserOne == $userID) {
					$mClass = 'me';
					$msgOwnerID = $cUserOne;
					$lastM = '';
					if (!empty($cFile)) {
						$imStyle = 'mmi_i';
					}
					$timeStyle = 'msg_time_me';
					$seenStatus = '<span class="seenStatus flex_ notSeen">' . $iN->iN_SelectedMenuIcon('94') . '</span>';
					if ($mSeenStatus == '1') {
						$seenStatus = '<span class="seenStatus flex_ seen">' . $iN->iN_SelectedMenuIcon('94') . '</span>';
					}
				} else {
					$mClass = 'friend';
					$msgOwnerID = $cUserOne;
					$lastM = 'mm_' . $msgOwnerID;
					if (!empty($cFile)) {
						$imStyle = 'mmi_if';
					}
					$timeStyle = 'msg_time_fri';
				}
				$msgOwnerAvatar = $iN->iN_UserAvatar($msgOwnerID, $base_url);
				$styleFor = '';
				if ($cStickerUrl) {
					$styleFor = 'msg_with_sticker';
					$cMessage = '<img class="mStick" src="' . $cStickerUrl . '">';
				}
				if ($cGifUrl) {
					$styleFor = 'msg_with_gif';
					$cMessage = '<img class="mGifM" src="' . $cGifUrl . '">';
				}
				$convertMessageTime = strtotime($message_time);
				$netMessageHour = date('H:i', $convertMessageTime);
				?>
                           <!---->
                           <div class="msg <?php echo filter_var($lastM, FILTER_SANITIZE_STRING); ?>" id="msg_<?php echo filter_var($cMessageID, FILTER_SANITIZE_STRING); ?>" data-id="<?php echo filter_var($cMessageID, FILTER_SANITIZE_STRING); ?>">
                               <div class="msg_<?php echo filter_var($mClass, FILTER_SANITIZE_STRING) . ' ' . $styleFor . ' ' . $imStyle; ?>">
                                   <div class="msg_o_avatar"><img src="<?php echo filter_var($msgOwnerAvatar, FILTER_SANITIZE_STRING); ?>"></div>
                                   <?php if ($cMessage) {?>
                                     <div class="msg_txt"><?php echo $urlHighlight->highlightUrls($cMessage); ?></div>
                                   <?php }?>
                                   <?php
if ($cFile) {
					$trimValue = rtrim($cFile, ',');
					$explodeFiles = explode(',', $trimValue);
					$explodeFiles = array_unique($explodeFiles);
					$countExplodedFiles = count($explodeFiles);
					if ($countExplodedFiles == 1) {
						$container = 'i_image_one';
					} else if ($countExplodedFiles == 2) {
						$container = 'i_image_two';
					} else if ($countExplodedFiles == 3) {
						$container = 'i_image_three';
					} else if ($countExplodedFiles == 4) {
						$container = 'i_image_four';
					} else if ($countExplodedFiles >= 5) {
						$container = 'i_image_five';
					}
					foreach ($explodeFiles as $explodeVideoFile) {
						$VideofileData = $iN->iN_GetUploadedMessageFileDetails($explodeVideoFile);
						if ($VideofileData) {
							$VideofileUploadID = $VideofileData['upload_id'];
							$VideofileExtension = $VideofileData['uploaded_file_ext'];
							$VideofilePath = $VideofileData['uploaded_file_path'];
							$VideofilePathWithoutExt = preg_replace('/\\.[^.\\s]{3,4}$/', '', $VideofilePath);
							if ($VideofileExtension == 'mp4') {
								$VideoPathExtension = '.jpg';
								if ($s3Status == 1) {
									$VideofilePathUrl = 'https://' . $s3Bucket . '.s3.' . $s3Region . '.amazonaws.com/' . $VideofilePath;
									$VideofileTumbnailUrl = 'https://' . $s3Bucket . '.s3.' . $s3Region . '.amazonaws.com/' . $VideofilePathWithoutExt . $VideoPathExtension;
								}else if($digitalOceanStatus == '1'){
                                    $VideofilePathUrl = 'https://' . $oceanspace_name . '.' . $oceanregion . '.digitaloceanspaces.com/' . $VideofilePath;
									$VideofileTumbnailUrl = 'https://' . $oceanspace_name . '.' . $oceanregion . '.digitaloceanspaces.com/' . $VideofilePathWithoutExt . $VideoPathExtension;
                                } else {
									$VideofilePathUrl = $base_url . $VideofilePath;
									$VideofileTumbnailUrl = $base_url . $VideofilePathWithoutExt . $VideoPathExtension;
								}
								echo '
                                                    <div style="display:none;" id="video' . $VideofileUploadID . '">
                                                        <video class="lg-video-object lg-html5 video-js vjs-default-skin" controls preload="none" onended="videoEnded()">
                                                            <source src="' . $VideofilePathUrl . '" type="video/mp4">
                                                            Your browser does not support HTML5 video.
                                                        </video>
                                                    </div>
                                                    ';
							}
						}
					}
					echo '<div class="' . $container . '" id="lightgallery' . $cMessageID . '">';
					foreach ($explodeFiles as $dataFile) {
						$fileData = $iN->iN_GetUploadedMessageFileDetails($dataFile);
						if ($fileData) {
							$fileUploadID = $fileData['upload_id'];
							$fileExtension = $fileData['uploaded_file_ext'];
							$filePath = $fileData['uploaded_file_path'];
							$filePathWithoutExt = preg_replace('/\\.[^.\\s]{3,4}$/', '', $filePath);
							if ($s3Status == 1) {
								$filePathUrl = 'https://' . $s3Bucket . '.s3.' . $s3Region . '.amazonaws.com/' . $filePath;
							}else if($digitalOceanStatus == '1'){ 
                                $filePathUrl = 'https://' . $oceanspace_name . '.' . $oceanregion . '.digitaloceanspaces.com/'. $filePath;
                            } else {
								$filePathUrl = $base_url . $filePath;
							}
							$videoPlaybutton = '';
							if ($fileExtension == 'mp4') {
								$videoPlaybutton = '<div class="playbutton">' . $iN->iN_SelectedMenuIcon('55') . '</div>';
								$PathExtension = '.jpg';
								if ($s3Status == 1) {
									$filePathUrl = 'https://' . $s3Bucket . '.s3.' . $s3Region . '.amazonaws.com/' . $filePathWithoutExt . $PathExtension;
                                    $filePathUrlV = 'https://' . $s3Bucket . '.s3.' . $s3Region . '.amazonaws.com/' . $filePath;
								}else if($digitalOceanStatus == '1'){ 
                                    $filePathUrl = 'https://' . $oceanspace_name . '.' . $oceanregion . '.digitaloceanspaces.com/' . $filePathWithoutExt . $PathExtension;
                                    $filePathUrlV = 'https://' . $oceanspace_name . '.' . $oceanregion . '.digitaloceanspaces.com/' . $filePath;
                                } else {
									$filePathUrl = $base_url . $filePathWithoutExt . $PathExtension;
                                    $filePathUrlV = $base_url . $filePath;
								}
								$fileisVideo = 'data-poster="' . $filePathUrlV . '" data-html="#video' . $fileUploadID . '"';
							} else {
								$fileisVideo = 'data-src="' . $filePathUrl . '"';
							}
							?>
                                    <div class="i_post_image_swip_wrapper" style="background-image:url('<?php echo $filePathUrl; ?>');" <?php echo $fileisVideo; ?>>
                                        <?php echo html_entity_decode($videoPlaybutton); ?>
                                        <img class="i_p_image" src="<?php echo filter_var($filePathUrl, FILTER_SANITIZE_STRING); ?>">
                                    </div>
                                   <?php }}
					echo '</div>';}?>
                                   <script type="text/javascript">
                                        $('#lightgallery'+<?php echo filter_var($cMessageID, FILTER_SANITIZE_STRING); ?>).lightGallery({
                                            videojs: true,
                                            mode: 'lg-fade',
                                            cssEasing : 'cubic-bezier(0.25, 0, 0.25, 1)',
                                            download: false,
                                            share: false
                                        });
                                    </script>
                                   <?php if ($mClass == 'me') {?>
                                   <div class="me_btns_cont transition">
                                       <div class="me_btns_cont_icon smscd flex_ tabing" id="<?php echo filter_var($cMessageID, FILTER_SANITIZE_STRING); ?>"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('16')); ?></div>
                                       <div class="me_msg_plus msg_set_plus_<?php echo filter_var($cMessageID, FILTER_SANITIZE_STRING); ?>">
                                            <!--MENU ITEM-->
                                            <div class="i_post_menu_item_out delmes truncated transition" id="<?php echo filter_var($cMessageID, FILTER_SANITIZE_STRING); ?>">
                                                <?php echo html_entity_decode($iN->iN_SelectedMenuIcon('28')); ?> <?php echo filter_var($LANG['delete_message'], FILTER_SANITIZE_STRING); ?>
                                            </div>
                                            <!--/MENU ITEM-->
                                       </div>
                                   </div>
                                   <?php }?>
                                </div>
                                <div class="<?php echo filter_var($timeStyle, FILTER_SANITIZE_STRING); ?>"><?php echo html_entity_decode($seenStatus) . $netMessageHour; ?></div>
                           </div>
                           <!---->
                        <?php }}?>
                    </div>
                  </div>
                </div>
                <!---->
                <?php if (!$blockedType) {?>
                <div class="message_send_form_wrapper"  id="<?php echo filter_var($cID, FILTER_SANITIZE_STRING); ?>">
                    <div class="nanos transition"></div>
                    <div class="tabing_non_justify flex_">
                        <div class="message_form_items flex_">
                            <div class="message_form_plus transition chtBtns" id="<?php echo filter_var($cID, FILTER_SANITIZE_STRING); ?>">
                                <div class="fl_btns"></div>
                                <div class="message_pls flex_ tabing"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('92')); ?></div>
                            </div>
                            <div class="message_form_plus transition getmGifs" id="<?php echo filter_var($cID, FILTER_SANITIZE_STRING); ?>">
                                <div class="message_pls flex_ tabing"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('23')); ?></div>
                            </div>
                            <div class="message_form_plus transition getmStickers" id="<?php echo filter_var($cID, FILTER_SANITIZE_STRING); ?>">
                                <div class="message_pls flex_ tabing"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('24')); ?></div>
                            </div>
                            <!---->
                            <div class="message_send_text flex_ tabing">
                                <div class="message_text_textarea flex_">
                                <textarea class="mSize"></textarea>
                                <!---->
                                <div class="message_smiley getMEmojis">
                                    <div class="message_form_smiley_plus transition">
                                        <div class="message_pls flex_ tabing"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('25')); ?></div>
                                    </div>
                                </div>
                                <!---->
                                <input type="hidden" id="uploadVal">
                                </div>
                            </div>
                            <!---->
                            <div class="message_form_plus transition sendmes">
                                <div class="message_pls flex_ tabing"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('26')); ?></div>
                            </div>
                        </div>
                    </div>
                </div>
                <!---->
                <?php } else {?>
                    <div class="message_send_form_wrapper blocked_not">
                    <div class="tabing_non_justify flex_">
                        <div class="message_form_items flex_">
                            <?php echo html_entity_decode($blockNote); ?>
                        </div>
                    </div>
                </div>
                <!---->
                <?php }?>
            </div>
           <?php }
	if (!$checkcIDExist) {
		echo '<div class="chat_empty flex_ tabing"><div class="chat_empty_logo"></div></div>';
	}
	echo '</div>';} else {?>
           <div class="chat_empty flex_ tabing"><div class="chat_empty_logo"></div></div>
           <?php }?>
        </div>
        <!--chat_middle_container finished-->
        <!--Video Call Camera Container-->
        <div class="live_pp_camera_container" style="display:none;">  
            <div class="friendsCam">
                    <div id="remote-playerlist"></div>
            </div>  
            <div class="myCam flex_ tabing">
                <p id="local-player-name" class="player-name" style="display:none;"></p>
                <div id="local-player" class="player"></div>
            </div>
            <div class="videoCallButtons">
                   <div class="call_footer_buttons flex_ tabing">
                         <div class="footer_call_btn_item flex_ tabing">
                            <div class="call_btn_icon flex_ tabing" id="mute-audio">
                                <?php echo html_entity_decode($iN->iN_SelectedMenuIcon('173')); ?>
                            </div>
                         </div>
                         <div class="footer_call_btn_item flex_ tabing">
                            <div class="call_btn_end_icon flex_ tabing leave">
                                <?php echo html_entity_decode($iN->iN_SelectedMenuIcon('172')); ?>
                            </div>
                         </div>
                         <div class="footer_call_btn_item flex_ tabing">
                            <div class="call_btn_icon flex_ tabing" id="mute-video">
                                <?php echo html_entity_decode($iN->iN_SelectedMenuIcon('174')); ?>
                            </div>
                         </div>
                   </div>
            </div>  
        </div>
        <!--Video Call Camera Container FINISHED-->
        <script src="https://download.agora.io/sdk/release/AgoraRTC_N.js"></script>
<!--Video Call Javascript-->
<script type="text/javascript">

/*
 *  These procedures use Agora Video Call SDK for Web to enable local and remote
 *  users to join and leave a Video Call channel managed by Agora Platform.
 */

/*
 *  Create an {@link https://docs.agora.io/en/Video/API%20Reference/web_ng/interfaces/iagorartcclient.html|AgoraRTCClient} instance.
 *
 * @param {string} mode - The {@link https://docs.agora.io/en/Voice/API%20Reference/web_ng/interfaces/clientconfig.html#mode| streaming algorithm} used by Agora SDK.
 * @param  {string} codec - The {@link https://docs.agora.io/en/Voice/API%20Reference/web_ng/interfaces/clientconfig.html#codec| client codec} used by the browser.
 */
var client = AgoraRTC.createClient({ mode: "rtc", codec: "vp8" });

/*
 * Clear the video and audio tracks used by `client` on initiation.
 */
var localTracks = {
  videoTrack: null,
  audioTrack: null
};

/*
 * On initiation no users are connected.
 */
var remoteUsers = {};

/*
 * On initiation. `client` is not attached to any project or channel for any specific user.
 */
var options = {
  appid: null,
  channel: null,
  uid: null,
  token: null
};

/*
 * When this page is called with parameters in the URL, this procedure
 * attempts to join a Video Call channel using those parameters.
 */
<?php  
$chatVideoChannelName = $iN->iN_GetVideoCallDetailsBetweenTwoUsersIfExist($urlChatID, $userID);
$chatVideoChannel_Name = isset($chatVideoChannelName['voice_call_name']) ? $chatVideoChannelName['voice_call_name'] : NULL;
$chatCallerUidfk = isset($chatVideoChannelName['caller_uid_fk']) ? $chatVideoChannelName['caller_uid_fk'] : NULL;
?>
$(() => { 
    options.appid = '<?php echo $agoraAppID; ?>';
    options.channel = '<?php echo isset($chatVideoChannel_Name) ? $chatVideoChannel_Name : NULL; ?>';
    //options.token = urlParams.get("token");
    //options.uid = urlParams.get("uid");
    if (options.appid && options.channel) {
        $("#uid").val(options.uid);
        $("#appid").val('<?php echo $agoraAppID; ?>');
        $("#token").val(options.token);
        $("#channel").val('<?php echo isset($chatVideoChannel_Name) ? $chatVideoChannel_Name : NULL; ?>');
        JoinVideoCall(); 
    } 
})

/*
 * When a user clicks Join or Leave in the HTML form, this procedure gathers the information
 * entered in the form and calls join asynchronously. The UI is updated to match the options entered
 * by the user.
 */
$(document).on("click",".joinVideoCall",function (e){
    $(".videoCalli").remove();
    JoinVideoCall();
})

async function JoinVideoCall(){
<?php 
$rand = rand(1111111, 9999999);
$channelName = "stream_" . $userID . "_" . $rand;   
if($chatVideoChannel_Name){
    $channelName = $chatVideoChannel_Name;
} 
?>
  try {
    options.appid = '<?php echo $agoraAppID; ?>';
    //options.token = $("#token").val();
    options.channel = '<?php echo $channelName; ?>';
    //options.uid = Number($("#uid").val());
    await join();
    if(options.token) {
      $(".live_pp_camera_container").show();
      $("#notification-sound-call")[0].pause();  
    } else { 
      //$(".live_pp_camera_container").show(); 
      $("#notification-sound-call")[0].pause();   
    }
  } catch (error) {
    console.error(error);
  } finally {
    $("#leave").attr("disabled", false);
  }
}

/*
 * Called when a user clicks Leave in order to exit a channel.
 */
$(document).on("click",".leave",function () {
  leave();
});

/*
 * Join a channel, then create local video and audio tracks and publish them to the channel.
 */
async function join() {

  // Add an event listener to play remote tracks when remote user publishes.
  client.on("user-published", handleUserPublished);
  client.on("user-unpublished", handleUserUnpublished);

  // Join a channel and create local tracks. Best practice is to use Promise.all and run them concurrently.
  [ options.uid, localTracks.audioTrack, localTracks.videoTrack ] = await Promise.all([
    // Join the channel.
    client.join(options.appid, options.channel, options.token || null, options.uid || null),
    // Create tracks to the local microphone and camera.
    AgoraRTC.createMicrophoneAudioTrack(),
    AgoraRTC.createCameraVideoTrack()
  ]);

  // Play the local video track to the local browser and update the UI with the user ID.
  localTracks.videoTrack.play("local-player");
  $("#local-player-name").text(`localVideo(${options.uid})`);

  // Publish the local video and audio tracks to the channel.
  await client.publish(Object.values(localTracks));
  /*Create a video call*/
  <?php  $checkVideo = $iN->iN_GetVideoCallDetailsBetweenTwoUsersIfExistIM($urlChatID, $userID); 
  if(!$checkVideo){?>
  var data = 'f=createVideoCall&calledID=<?php echo $conversationUserID;?>&callName=<?php echo $channelName;?>';
    $.ajax({
        type: "POST",
        url: siteurl + "requests/request.php", 
        data: data,
        cache: false,
        beforeSend: function() {
        },
        success: function(response) {
            if(response !== '404'){
                $("body").append(response);
                setTimeout(() => {
                    $(".i_modal_bg_in").addClass('i_modal_display_in'); 
                    $('#notification-sound-call')[0].play();
                }, 200);
            }
        }
    }); 
    <?php }?>
  /*Create a video call*/
} 
$(document).on("click",".crVidCall", function(){
    var data = 'f=buyVideoCall&calledID=<?php echo $conversationUserID;?>&callName=<?php echo $channelName;?>';
    $.ajax({
        type: "POST",
        url: siteurl + "requests/request.php", 
        data: data,
        cache: false,
        beforeSend: function() {
        },
        success: function(response) {
            if(response !== '404'){
                $("body").append(response);
                setTimeout(() => {
                    $(".i_modal_bg_in").addClass('i_modal_display_in');  
                }, 200);
            }
        }
    });
});
/*
 * Stop all local and remote tracks then leave the channel.
 */
async function leave() {
  for (trackName in localTracks) {
    var track = localTracks[trackName];
    if(track) {
      track.stop();
      track.close();
      localTracks[trackName] = undefined;
    }
  }

  // Remove remote users and player views.
  remoteUsers = {};
  $("#remote-playerlist").html("");
  
  // leave the channel
  await client.leave();

  $("#local-player-name").text("");
  $("#join").attr("disabled", false);
  $("#leave").attr("disabled", true);
  var data = 'f=liveEnd&chName=<?php echo $channelName;?>';
  $.ajax({
        type: "POST",
        url: siteurl + "requests/request.php", 
        data: data,
        cache: false,
        beforeSend: function() {
        },
        success: function(response) {
            if(response == '200'){
                $(".i_modal_bg_in").remove();
                $(".live_pp_camera_container").hide();
                $("#notification-sound-call")[0].pause(); 
            } 
        }
    });
}


/*
 * Add the local use to a remote channel.
 *
 * @param  {IAgoraRTCRemoteUser} user - The {@link  https://docs.agora.io/en/Voice/API%20Reference/web_ng/interfaces/iagorartcremoteuser.html| remote user} to add.
 * @param {trackMediaType - The {@link https://docs.agora.io/en/Voice/API%20Reference/web_ng/interfaces/itrack.html#trackmediatype | media type} to add.
 */
async function subscribe(user, mediaType) {
  const uid = user.uid;
  // subscribe to a remote user
  await client.subscribe(user, mediaType);
  console.log("subscribe success");
  if (mediaType === 'video') {
    const player = $(`
      <div id="player-wrapper-${uid}">
        <p class="player-name" style="display:none;">remoteUser(${uid})</p>
        <div id="player-${uid}" class="player_friend"></div>
      </div>
    `);
    $("#remote-playerlist").append(player);
    $(".live_pp_camera_container").show();  

    $("#notification-sound-call")[0].pause(); 
    $(".videoCall").remove();
    user.videoTrack.play(`player-${uid}`);
  }
  if (mediaType === 'audio') {
    user.audioTrack.play();
  }
}

/*
 * Add a user who has subscribed to the live channel to the local interface.
 *
 * @param  {IAgoraRTCRemoteUser} user - The {@link  https://docs.agora.io/en/Voice/API%20Reference/web_ng/interfaces/iagorartcremoteuser.html| remote user} to add.
 * @param {trackMediaType - The {@link https://docs.agora.io/en/Voice/API%20Reference/web_ng/interfaces/itrack.html#trackmediatype | media type} to add.
 */
function handleUserPublished(user, mediaType) {
  const id = user.uid;
  remoteUsers[id] = user;
  subscribe(user, mediaType);
}

/*
 * Remove the user specified from the channel in the local interface.
 *
 * @param  {string} user - The {@link  https://docs.agora.io/en/Voice/API%20Reference/web_ng/interfaces/iagorartcremoteuser.html| remote user} to remove.
 */
function handleUserUnpublished(user, mediaType) {
  if (mediaType === 'video') {
    const id = user.uid;
    delete remoteUsers[id];
    $(`#player-wrapper-${id}`).remove();
    leave();
    $(".live_pp_camera_container").hide();

    $("#notification-sound-call")[0].pause(); 
  }
}

var localTrackState = {
  videoTrackMuted: false,
  audioTrackMuted: false
}

$("#mute-audio").click(function (e) {
  if (!localTrackState.audioTrackMuted) {
    muteAudio();
  } else {
    unmuteAudio();
  }
});

$("#mute-video").click(function (e) {
  if (!localTrackState.videoTrackMuted) {
    muteVideo();
  } else {
    unmuteVideo();
  }
})
async function muteAudio() {
  if (!localTracks.audioTrack) return;
  /**
   * After calling setMuted to mute an audio or video track, the SDK stops sending the audio or video stream. Users whose tracks are muted are not counted as users sending streams.
   * Calling setEnabled to disable a track, the SDK stops audio or video capture
   */
  await localTracks.audioTrack.setMuted(true);
  localTrackState.audioTrackMuted = true;
  $("#mute-audio").addClass('activated_btn');
}

async function muteVideo() {
  if (!localTracks.videoTrack) return;
  await localTracks.videoTrack.setMuted(true);
  localTrackState.videoTrackMuted = true;
  $("#mute-video").addClass('activated_btn');
}

async function unmuteAudio() {
  if (!localTracks.audioTrack) return;
  await localTracks.audioTrack.setMuted(false);
  localTrackState.audioTrackMuted = false;
  $("#mute-audio").removeClass('activated_btn');
}

async function unmuteVideo() {
  if (!localTracks.videoTrack) return;
  await localTracks.videoTrack.setMuted(false);
  localTrackState.videoTrackMuted = false;
  $("#mute-video").removeClass('activated_btn');
}
</script>
<!--Video Call Javascript-->     
     </div>
    </div>
<?php
if (isset($_GET['chat_width'])) {
	$cID = mysqli_real_escape_string($db, $_GET['chat_width']);
	$checkcIDExist = $iN->iN_CheckChatIDExist($cID);
	if ($checkcIDExist) {
		$getChatUserIDs = $iN->iN_GetChatUserIDs($cID);
		$cuIDOne = $getChatUserIDs['user_one'];
		$cuIDTwo = $getChatUserIDs['user_two'];
		if ($cuIDOne == $userID) {
			$conversationUserID = $cuIDTwo;
		} else {
			$conversationUserID = $cuIDOne;
		}
		?>
<script type="text/javascript">
$(document).ready(function(){
    var scrollLoading = true;
    $('.all_messages').scrollTop($('.all_messages')[0].scrollHeight);
    $('.all_messages').on("scroll",function(){
        if (scrollLoading && $('.all_messages').scrollTop() == 0 && !$("div").hasClass("seen_all")){
            var old_height = $(".all_messages")[0].scrollHeight;
            var chatID = '<?php echo filter_var($cID, FILTER_SANITIZE_STRING); ?>';
            var lastMessageID = $(".msg:first-child").attr("data-id");
            var type = 'moreMessage';
            var data = 'f='+type+'&ch='+chatID+'&last='+lastMessageID;
            /** */
            $.ajax({
			  type: "POST",
			  url: siteurl + 'requests/request.php',
			  data: data,
			  cache: false,
			  beforeSend: function(){
                  $(".msg_wrapper").append('<div class="loading_messages"><div class="loading_wrapper tabing flex_"><div class="i_loading" style="padding: 5px 0px"><div class="dot-pulse"></div></div></div></div>');
			  },
			  success: function(response) {
                if(response){
                    $(".all_messages_container").prepend(response);
                    var new_height = $(".all_messages")[0].scrollHeight;
				    $(".all_messages").scrollTop(new_height - old_height);
                }else{
                   $(".all_messages_container").prepend('<div class="seen_all flex_ tabing"><div class="nmore"><?php echo filter_var($LANG['no_more_message'], FILTER_SANITIZE_STRING); ?></div></div>');
                }
                $(".loading_messages").remove();
			  }
			});
            /** */
            return false;
        }
    });
    /*Request Messages*/
    var x = '';
    function getNewMessage(x) {
       var type = 'getNewMessage';
       var cID = '<?php echo filter_var($cID, FILTER_SANITIZE_STRING); ?>';
       var toUser = '<?php echo filter_var($conversationUserID, FILTER_SANITIZE_STRING); ?>';
       var lastMessageIDByUser = $(".mm_<?php echo filter_var($conversationUserID, FILTER_SANITIZE_STRING); ?>:last").attr("data-id");
        if ($.trim(lastMessageIDByUser).length == 0) {
            setTimeout(getNewMessage, 5000);
        } else {
            var data = 'f='+type+'&ci='+cID+'&to='+toUser+'&lm='+lastMessageIDByUser;

            $.ajax({
                type: 'POST',
                url: siteurl + 'requests/request.php',
                data: data,
                cache: false,
                beforeSend: function() {

                },
                success: function(response) {
                    if(response){
                        $(".all_messages").stop().animate({ scrollTop: $(".all_messages")[0].scrollHeight }, 100);
                        $(".all_messages_container").append(response);
                    }
                    if (!x) {
                        setTimeout(getNewMessage, 5000);
                    }
                }
            });
        }
    }
    getNewMessage(x);
    function typing(x){
        var type = 'typing';
        var cID = '<?php echo filter_var($cID, FILTER_SANITIZE_STRING); ?>';
        var toUser = '<?php echo filter_var($conversationUserID, FILTER_SANITIZE_STRING); ?>';
        var data = 'f='+type+'&ci='+cID+'&to='+toUser;
        if ($.trim(toUser).length == 0) {
            setTimeout(typing, 8000);
        } else {
        $.ajax({
            type: 'POST',
            url: siteurl + 'requests/request.php',
            data: data,
            dataType: "json",
            cache: false,
            beforeSend: function() {

            },
            success: function(response) {
                var timeStatus = response.timeStatus;
                var seenStatus = response.seenStatus;
                if(timeStatus){
                    $(".c_u_time").html(timeStatus);
                }
                if(seenStatus == '1'){
                   $(".seenStatus").removeClass('notSeen').addClass('seen');
                }
                if (!x) {
                    setTimeout(typing, 8000);
                }
            }
        });
       }
    }
    typing(x);
    /** */
    //setup before functions
    var typingTimer;                //timer identifier
    var doneTypingInterval = 5000;  //time in ms, 5 second for example
    //on keyup, start the countdown
    $("body").on("focus",".mSize", function () {
    clearTimeout(typingTimer);
    typingTimer = setTimeout(doneTyping, doneTypingInterval);
        var type = 'utyping';
        var cID = '<?php echo filter_var($cID, FILTER_SANITIZE_STRING); ?>';
        var toUser = '<?php echo filter_var($conversationUserID, FILTER_SANITIZE_STRING); ?>';
        var data = 'f='+type+'&ci='+cID+'&to='+toUser;
        $.ajax({
            type: 'POST',
            url: siteurl + 'requests/request.php',
            data: data,
            cache: false,
            beforeSend: function() {

            },
            success: function(response) {

            }
        });
    });
    //on keydown, clear the countdown
    $("body").on('keydown',".mSize", function () {
    clearTimeout(typingTimer);
    });

    //user is "finished typing," do something
    function doneTyping () {
    //do something
    }
});
</script>
<?php }
	?>
<?php }?>
</body>
</html>