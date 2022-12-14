<div class="i_contents_container">
    <div class="i_general_white_board border_one column flex_ tabing__justify" style="max-width:700px;margin:0px auto;">
        <!---->
        <div class="i_general_title_box">
          <?php echo filter_var($LANG['approve_or_decline'], FILTER_SANITIZE_STRING);?>
        </div> 
        <!---->
        <div class="i_general_row_box column flex_" id="general_conf" style="padding-top:30px;">  
        <form enctype="multipart/form-data" method="post" id="approvePostForm">
<?php  
$postFromData = $iN->iN_GetAllPostDetails($approvePostID);
if($postFromData){ 
        $userPostID = $postFromData['post_id']; 
        $userPostOwnerID = $postFromData['post_owner_id'];
        $userPostText = isset($postFromData['post_text']) ? $postFromData['post_text'] : NULL;
        $userPostFile = $postFromData['post_file'];
        $userPostCreatedTime = $postFromData['post_created_time'];
        $crTime = date('Y-m-d H:i:s',$userPostCreatedTime); 
        $userPostWhoCanSee = $postFromData['who_can_see'];
        $userPostWantStatus = $postFromData['post_want_status'];
        $userPostWantedCredit = $postFromData['post_wanted_credit'];
        $userPostStatus = $postFromData['post_status']; 
        $userPostOwnerUsername = $postFromData['i_username'];
        $userPostOwnerUserFullName = $postFromData['i_user_fullname'];  
        $userPostOwnerUserGender = $postFromData['user_gender']; 
        $userPostCommentAvailableStatus = $postFromData['comment_status'];
        $userPostOwnerUserLastLogin = $postFromData['last_login_time']; 
        $userPostPinStatus = $postFromData['post_pined'];
        $slugUrl = $base_url.'post/'.$postFromData['url_slug'].'_'.$userPostID;
        $userPostSharedID = isset($postFromData['shared_post_id']) ? $postFromData['shared_post_id'] : NULL;
        $userPostOwnerUserAvatar = $iN->iN_UserAvatar($userPostOwnerID, $base_url);
        $userPostUserVerifiedStatus = $postFromData['user_verified_status'];
        if($userPostOwnerUserGender == 'male'){
        $publisherGender = '<div class="i_plus_g">'.$iN->iN_SelectedMenuIcon('12').'</div>';
        }else if($userPostOwnerUserGender == 'female'){
        $publisherGender = '<div class="i_plus_gf">'.$iN->iN_SelectedMenuIcon('13').'</div>';
        }else if($userPostOwnerUserGender == 'couple'){
        $publisherGender = '<div class="i_plus_g">'.$iN->iN_SelectedMenuIcon('58').'</div>';
        }
        $userVerifiedStatus = '';
        if($userPostUserVerifiedStatus == '1'){
        $userVerifiedStatus = '<div class="i_plus_s">'.$iN->iN_SelectedMenuIcon('11').'</div>';
        }
        $postStyle = ''; 
        if($userPostWhoCanSee == '1'){
            $onlySubs = '';
            $subPostTop = '';
            $wCanSee = '<div class="i_plus_public" id="ipublic_'.$userPostID.'">'.$iN->iN_SelectedMenuIcon('50').'</div>';
         }else if($userPostWhoCanSee == '2'){
            $subPostTop = '';
            $wCanSee = '<div class="i_plus_subs" id="ipublic_'.$userPostID.'">'.$iN->iN_SelectedMenuIcon('15').'</div>'; 
            $onlySubs = '<div class="onlySubs"><div class="onlySubsWrapper"><div class="onlySubs_icon">'.$iN->iN_SelectedMenuIcon('15').'</div><div class="onlySubs_note">'.preg_replace( '/{.*?}/', $userPostOwnerUserFullName, $LANG['only_followers']).'</div></div></div>';
         }else if($userPostWhoCanSee == '3'){
            $subPostTop = 'extensionPost';
            $wCanSee = '<div class="i_plus_public" id="ipublic_'.$userPostID.'">'.$iN->iN_SelectedMenuIcon('51').'</div>';
            $onlySubs = '<div class="onlySubs"><div class="onlySubsWrapper"><div class="onlySubs_icon">'.$iN->iN_SelectedMenuIcon('56').'</div><div class="onlySubs_note">'.preg_replace( '/{.*?}/', $userPostOwnerUserFullName, $LANG['only_subscribers']).'</div></div></div>';
         }else if($userPostWhoCanSee == '4'){
           $subPostTop = 'extensionPost';
           $wCanSee = '<div class="i_plus_public" id="ipublic_'.$userPostID.'">'.$iN->iN_SelectedMenuIcon('9').'</div>';
           $onlySubs = '<div class="onlyPremium"><div class="onlySubsWrapper"><div class="premium_locked"><div class="premium_locked_icon">'.$iN->iN_SelectedMenuIcon('56').'</div></div><div class="onlySubs_note"><div class="buyThisPost prcsPost" id="'.$userPostID.'">'.preg_replace( '/{.*?}/', $userPostWantedCredit, $LANG['post_credit']).'</div><div class="buythistext prcsPost" id="'.$userPostID.'">'.$LANG['purchase_post'].'</div></div><div class="fr_subs uSubsModal transition" data-u="'.$userPostOwnerID.'">'.$iN->iN_SelectedMenuIcon('51').$LANG['free_for_subscribers'].'</div></div></div>';
         }
?>
        <!--*********************************-->
        <div class="i_post_body body_<?php echo filter_var($userPostID, FILTER_SANITIZE_STRING);?> <?php echo html_entity_decode($subPostTop);?>" id="<?php echo filter_var($userPostID, FILTER_SANITIZE_STRING);?>" data-last="<?php echo filter_var($userPostID, FILTER_SANITIZE_STRING);?>">
                <!--POST HEADER-->
                <div class="i_post_body_header">
                    <div class="i_post_user_avatar">
                        <img src="<?php echo filter_var($userPostOwnerUserAvatar, FILTER_SANITIZE_STRING);?>"/>
                    </div>
                    <div class="i_post_i">
                        <div class="i_post_username"><a class="truncated" href="<?php echo filter_var($base_url.$userPostOwnerUsername, FILTER_SANITIZE_STRING);?>"><?php echo filter_var($userPostOwnerUserFullName, FILTER_SANITIZE_STRING);?><?php echo html_entity_decode($publisherGender); ?> <?php echo html_entity_decode($userVerifiedStatus);?><?php echo html_entity_decode($wCanSee);?></a></div>
                        <div class="i_post_shared_time"><?php echo TimeAgo::ago($crTime , date('Y-m-d H:i:s'));?></div>
                    </div>
                </div>
                <!--/POST HEADER-->  
                <!--POST CONTAINER-->
                <div class="i_post_container flex_" id="i_post_container_<?php echo filter_var($userPostID, FILTER_SANITIZE_STRING);?>" <?php echo html_entity_decode($postStyle);?>>
                    <!--POST TEXT--> 
                    <textarea class="more_textarea" name="newpostDesc" id="ed_<?php echo filter_var($userPostID, FILTER_SANITIZE_STRING);?>" placeholder="<?php echo filter_var($LANG['write_something_about_the_post'], FILTER_SANITIZE_STRING);?>"><?php if(!empty($userPostText)){ echo filter_var($iN->br2nl($userPostText), FILTER_SANITIZE_STRING); } ?></textarea>
                    <!--/POST TEXT-->
                </div>
                <!--/POST CONTAINER-->  
                <!--POST CONTAINER-->
                <div class="i_post_container flex_" id="i_post_container_<?php echo filter_var($userPostID, FILTER_SANITIZE_STRING);?>" <?php echo html_entity_decode($postStyle);?>>
                    <?php echo html_entity_decode($iN->iN_SelectedMenuIcon('40'));?>
                    <!--POST TEXT--> 
                    <input type="text" name="newPostPoint" class="point_input" id="pointed_<?php echo filter_var($userPostID, FILTER_SANITIZE_STRING);?>" style="padding-left:50px;" placeholder="<?php echo filter_var($LANG['write_something_about_the_post'], FILTER_SANITIZE_STRING);?>" onkeypress="return event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57)" value="<?php if(!empty($userPostWantedCredit)){ echo filter_var($iN->br2nl($userPostWantedCredit), FILTER_SANITIZE_STRING); } ?>">
                    <!--/POST TEXT-->
                </div>
                <!--/POST CONTAINER-->  
                <!--POST IMAGES-->
                <div class="i_post_u_images"> 
                    <?php     
                    $trimValue = rtrim($userPostFile, ',');
                    $explodeFiles = explode(',', $trimValue);
                    $explodeFiles = array_unique($explodeFiles);
                    $countExplodedFiles = $iN->iN_CheckCountFile($userPostFile); 
                        if ($countExplodedFiles == 1) {
                            $container = 'i_image_one';
                        } else if ($countExplodedFiles == 2) {
                            $container = 'i_image_two';
                        } else if ($countExplodedFiles == 3) {
                            $container = 'i_image_three';
                        } else if ($countExplodedFiles == 4) {
                            $container = 'i_image_four';
                        } else if($countExplodedFiles >= 5) {
                            $container = 'i_image_five';
                        }   
                    foreach($explodeFiles as $explodeVideoFile){
                            $VideofileData = $iN->iN_GetUploadedFileDetails($explodeVideoFile);
                            if($VideofileData){
                                $VideofileUploadID = $VideofileData['upload_id'];
                                $VideofileExtension = $VideofileData['uploaded_file_ext'];
                                $VideofilePath = $VideofileData['uploaded_file_path']; 
                                $VideofilePathWithoutExt = preg_replace('/\\.[^.\\s]{3,4}$/', '', $VideofilePath);
                                if($VideofileExtension == 'mp4'){ 
                                    $VideoPathExtension = '.jpg';
                                    if($s3Status == 1){
                                        $VideofilePathUrl = 'https://' . $s3Bucket . '.s3.' . $s3Region . '.amazonaws.com/' . $VideofilePath;
                                        $VideofileTumbnailUrl = 'https://' . $s3Bucket . '.s3.' . $s3Region . '.amazonaws.com/' . $VideofilePathWithoutExt.$VideoPathExtension;
                                    }else if($digitalOceanStatus == '1'){  
                                        $VideofilePathUrl = 'https://'.$oceanspace_name.'.'.$oceanregion.'.digitaloceanspaces.com/'. $VideofilePath;
                                        $VideofileTumbnailUrl = 'https://'.$oceanspace_name.'.'.$oceanregion.'.digitaloceanspaces.com/'. $VideofilePathWithoutExt.$VideoPathExtension;
                                    }else{ 
                                        $VideofilePathUrl = $base_url . $VideofilePath;
                                        $VideofileTumbnailUrl = $base_url . $VideofilePathWithoutExt.$VideoPathExtension;
                                    }
                                    echo '
                                    <div style="display:none;" id="video'.$VideofileUploadID.'">
                                        <video class="lg-video-object lg-html5 video-js vjs-default-skin" controls preload="none" onended="videoEnded()">
                                            <source src="'.$VideofilePathUrl.'" type="video/mp4">
                                            Your browser does not support HTML5 video.
                                        </video>
                                    </div> 
                                    ';
                                } 
                            }
                    }   
                    echo '<div class="'.$container.'" id="lightgallery'.$userPostID.'">';
                        foreach($explodeFiles  as $dataFile){
                            $fileData = $iN->iN_GetUploadedFileDetails($dataFile);
                            if($fileData){
                            $fileUploadID = $fileData['upload_id'];
                            $fileExtension = $fileData['uploaded_file_ext'];
                            $filePath = $fileData['uploaded_file_path'];  
                            $filePathTumbnail = $fileData['upload_tumbnail_file_path'];
                            //$filePathWithoutExt = preg_replace('/\\.[^.\\s]{3,4}$/', '', $filePath);
                            if($s3Status == 1){
                                $filePathUrl = 'https://' . $s3Bucket . '.s3.' . $s3Region . '.amazonaws.com/' . $filePath; 
                            }else if($digitalOceanStatus == '1'){ 
                                $filePathUrl = 'https://'.$oceanspace_name.'.'.$oceanregion.'.digitaloceanspaces.com/'. $filePath; 
                            }else{
                                $filePathUrl = $base_url . $filePath; 
                            }  
                            $videoPlaybutton ='';  
                            if($fileExtension == 'mp4'){
                                $videoPlaybutton = '<div class="playbutton">'.$iN->iN_SelectedMenuIcon('55').'</div>';
                                $PathExtension = '.jpg';
                                if($s3Status == 1){  
                                    if($ffmpegStatus == '1'){
                                        $filePathUrl = 'https://' . $s3Bucket . '.s3.' . $s3Region . '.amazonaws.com/' . $filePathTumbnail; 
                                      }else {
                                          if($s3Status == '1'){
                                            $filePathUrl = 'https://' . $s3Bucket . '.s3.' . $s3Region . '.amazonaws.com/' . $filePathTumbnail;
                                          }else{
                                              $filePathUrl = $base_url . $filePathTumbnail;
                                          } 
                                      }
                                }else if($digitalOceanStatus == '1'){ 
                                    if($ffmpegStatus == '1'){
                                      $filePathUrl = 'https://'.$oceanspace_name.'.'.$oceanregion.'.digitaloceanspaces.com/'. $filePathTumbnail;  
                                    }else {
                                        if($digitalOceanStatus == '1'){
                                            $filePathUrl = 'https://'.$oceanspace_name.'.'.$oceanregion.'.digitaloceanspaces.com/'. $filePathTumbnail;
                                        }else{
                                            $filePathUrl = $base_url . $filePathTumbnail;
                                        } 
                                    }
                                }else{ 
                                    $filePathUrl = $base_url . $filePathTumbnail;
                                }
                                $fileisVideo = 'data-poster="'.$filePathUrl.'" data-html="#video'.$fileUploadID.'"';
                            }else{
                                $fileisVideo = 'data-src="'.$filePathUrl.'"';
                            }  
                        ?>
                        <?php if($fileExtension != 'mp3'){?>
                            <div class="i_post_image_swip_wrapper" style="background-image:url('<?php echo filter_var($filePathUrl, FILTER_SANITIZE_STRING);?>');" <?php echo html_entity_decode($fileisVideo);?>>
                                <?php echo html_entity_decode($videoPlaybutton);?>
                                <img class="i_p_image" src="<?php echo filter_var($filePathUrl, FILTER_SANITIZE_STRING);?>">
                            </div>  
                            <?php }?>
                        <?php }
                        }
                        echo '</div>';
                        ?>   
                        <?php if($logedIn){ ?>
                        <script type="text/javascript">
                            $('#lightgallery'+<?php echo filter_var($userPostID, FILTER_SANITIZE_STRING);?>).lightGallery({
                                videojs: true,
                                mode: 'lg-fade',
                                cssEasing : 'cubic-bezier(0.25, 0, 0.25, 1)',
                                download: false,
                                share: false
                            });
                        </script>
                        <?php }?>
                </div>
                <!--POST IMAGES--> 
                <?php 
echo '<div class="myaudio">';
foreach ($explodeFiles as $dataFile) {
	$fileAudioData = $iN->iN_GetUploadedMp3FileDetails($dataFile);
	if($fileAudioData){ 

		$fileUploadID = $fileAudioData['upload_id'];
		$fileExtension = $fileAudioData['uploaded_file_ext'];
		$filePath = $fileAudioData['uploaded_file_path'];
		$filePathTumbnail = $fileAudioData['upload_tumbnail_file_path'];
        $filePath = $fileAudioData['uploaded_x_file_path'];
		$filePath = $fileAudioData['uploaded_file_path'];
		if($fileExtension == 'mp3'){
			/*mp3 started*/
			if ($s3Status == 1) {
				$filePathUrl = 'https://' . $s3Bucket . '.s3.' . $s3Region . '.amazonaws.com/' . $filePath;
				$filePathTumbnailUrl = 'https://' . $s3Bucket . '.s3.' . $s3Region . '.amazonaws.com/' . $fileAudioData['uploaded_file_path'];
			} else if ($digitalOceanStatus == '1') {
				$filePathUrl = 'https://' . $oceanspace_name . '.' . $oceanregion . '.digitaloceanspaces.com/' . $filePath;
				$filePathTumbnailUrl = 'https://' . $oceanspace_name . '.' . $oceanregion . '.digitaloceanspaces.com/' . $fileAudioData['uploaded_file_path'];
			} else {
				$filePathUrl = $base_url . $filePath;
				$filePathTumbnailUrl = $base_url . $fileAudioData['uploaded_file_path'];  
			}
			$audShowType = '<audio  crossorigin="" preload="none"><source src="'.filter_var($filePathUrl, FILTER_SANITIZE_STRING).'" type="audio/mp3" /></audio>
					    <script> $(function() { new GreenAudioPlayer("#play_po_'.filter_var($fileUploadID, FILTER_SANITIZE_STRING).'", { stopOthersOnPlay: true, showTooltips: true, showDownloadButton: false, enableKeystrokes: true });});</script>';
			if ($s3Status == 1) { 
						$filePathTumbnailUrl = 'https://' . $s3Bucket . '.s3.' . $s3Region . '.amazonaws.com/' . $fileAudioData['uploaded_file_path'];
						$audShowType = '<audio  crossorigin="" preload="none"><source src="'.filter_var($filePathUrl, FILTER_SANITIZE_STRING).'" type="audio/mp3" /></audio>
					    <script> $(function() { new GreenAudioPlayer("#play_po_'.filter_var($fileUploadID, FILTER_SANITIZE_STRING).'", { stopOthersOnPlay: true, showTooltips: true, showDownloadButton: false, enableKeystrokes: true });});</script>';
					 
				} else if ($digitalOceanStatus == '1') { 
						$filePathTumbnailUrl = 'https://' . $oceanspace_name . '.' . $oceanregion . '.digitaloceanspaces.com/' . $fileAudioData['uploaded_file_path'];
						$audShowType = '<audio crossorigin="" preload="none"><source src="'.filter_var($filePathUrl, FILTER_SANITIZE_STRING).'" type="audio/mp3" /></audio>
					    <script> $(function() { new GreenAudioPlayer("#play_po_'.filter_var($fileUploadID, FILTER_SANITIZE_STRING).'", { stopOthersOnPlay: true, showTooltips: true, showDownloadButton: false, enableKeystrokes: true });});</script>';
					 
				} else { 
						$filePathTumbnailUrl = $base_url . $fileAudioData['uploaded_file_path']; 
						$audShowType = '<audio crossorigin="" preload="none"><source src="'.filter_var($filePathUrl, FILTER_SANITIZE_STRING).'" type="audio/mp3" /></audio>
					    <script> $(function() { new GreenAudioPlayer("#play_po_'.filter_var($fileUploadID, FILTER_SANITIZE_STRING).'", { stopOthersOnPlay: true, showTooltips: true, showDownloadButton: false, enableKeystrokes: true });});</script>';
					 
				}  
			$fileisVideo = 'data-src="' . $filePathTumbnailUrl . '"';
			/*mp3 finished*/ 
		}?> 
                <?php if($fileExtension == 'mp3'){?>
					<div class="i_post_image_swip_wrappera" style="background-image:url('<?php echo filter_var($filePathUrl, FILTER_VALIDATE_URL); ?>');" <?php echo html_entity_decode($fileisVideo); ?>>
						<div id="play_po_<?php echo filter_var($fileUploadID, FILTER_SANITIZE_STRING);?>" class="green-audio-player">
							<?php echo html_entity_decode($audShowType);?>
						</div>
				    </div>
				<?php }?>
	<?php } 
}
echo '</div>';
?>     
                <div class="admin_approve_post_footer">
                    <div class="add_app_not"><?php echo filter_var($LANG['add_not_to_the_post_owner'], FILTER_SANITIZE_STRING);?></div>
                    <!--POST CONTAINER-->
                    <div class="i_not_container flex_" id="i_not_container_<?php echo filter_var($userPostID, FILTER_SANITIZE_STRING);?>">
                        <!--POST TEXT--> 
                        <textarea class="more_textarea" name="approve_not" id="ad_not_ed_<?php echo filter_var($userPostID, FILTER_SANITIZE_STRING);?>" placeholder="<?php echo filter_var($LANG['write_your_not'], FILTER_SANITIZE_STRING);?>"></textarea>
                        <!--/POST TEXT-->
                    </div>
                    <!--/POST CONTAINER--> 
                    <!--POST CONTAINER-->
                    <div class="i_not_container flex_ column" id="i_not_container_<?php echo filter_var($userPostID, FILTER_SANITIZE_STRING);?>">
                        <!--****/////****--> 
                        <div class="approve_ch_item flex_ column border_one transition choosed" id="appr_1" data-val="1">
                            <div class="flex_ tabing_non_justify">
                                <div class="approve_icon flex_ tabing"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('112'));?></div>
                                <div class="approve_title flex_ tabing__justify"><?php echo filter_var($LANG['approve'], FILTER_SANITIZE_STRING);?></div>
                            </div>
                            <div class="rec_not" style="padding-left:10px;"><?php echo filter_var($LANG['be_carefuly_check_post'], FILTER_SANITIZE_STRING);?></div>
                        </div>
                        <div class="approve_ch_item flex_ column border_one transition" id="appr_2" data-val="2">
                            <div class="flex_ tabing_non_justify">
                                <div class="reject_icon flex_ tabing"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('113'));?></div>
                                <div class="approve_title flex_ tabing__justify"><?php echo filter_var($LANG['reject'], FILTER_SANITIZE_STRING);?></div>
                            </div>
                            <div class="rec_not" style="padding-left:10px;"><?php echo filter_var($LANG['rejected_not'], FILTER_SANITIZE_STRING);?></div>
                        </div>
                        <div class="approve_ch_item flex_ column border_one transition" id="appr_3" data-val="3">
                            <div class="flex_ tabing_non_justify">
                                <div class="declined_icon flex_ tabing"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('114'));?></div>
                                <div class="approve_title flex_ tabing__justify"><?php echo filter_var($LANG['decline'], FILTER_SANITIZE_STRING);?></div>
                            </div>
                            <div class="rec_not" style="padding-left:10px;"><?php echo filter_var($LANG['decline_not'], FILTER_SANITIZE_STRING);?></div>
                        </div>
                        <!--****/////****-->
                        <input type="hidden" name="postApproveStatus" id="approve_type" value="1">
                    </div>
                    <div class="i_settings_wrapper_item successNot"><?php echo filter_var($LANG['updated_successfully'], FILTER_SANITIZE_STRING);?></div>
                    <!--/POST CONTAINER--> 
                    <div class="i_become_creator_box_footer">
                        <input type="hidden" name="f" value="postApprove">
                        <input type="hidden" name="postOwnerID" value="<?php echo filter_var($userPostOwnerID, FILTER_SANITIZE_STRING);?>">
                        <input type="hidden" name="postID" value="<?php echo filter_var($userPostID, FILTER_SANITIZE_STRING);?>">
                        <button type="submit" name="submit" class="i_nex_btn_btn transition" id="update_myprofile"><?php echo filter_var($LANG['save_edit'], FILTER_SANITIZE_STRING);?></button>
                    </div>
                </div>
            </div>           
        </div>
        <!--*********************************-->
<?php }?> 
        </form>
    </div>    
</div>