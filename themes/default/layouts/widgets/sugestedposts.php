<div class="i_post_suggests">
  <div class="i_post_suggest_title"><?php echo preg_replace( '/{.*?}/', "<a href='".$base_url.$userPostOwnerUsername."'>".$userPostOwnerUserFullName."</a>", $LANG['suggest_post_title']);?></div>
  <div class="i_posts_suggestions_container">
      <?php 
        $getSuggestedPost = $iN->iN_GetSuggestedPostByUser($userPostOwnerID, $GetThePostIDFromUrl);
        if($getSuggestedPost){ 
            foreach($getSuggestedPost as $suggestedData){
               $userPostID = $suggestedData['post_id'];
               $userPostFile = $suggestedData['post_file'];
               $slugUrl = $base_url.'post/'.$suggestedData['url_slug'].'_'.$userPostID;
               $userPostWhoCanSee = $suggestedData['who_can_see'];
               $trimValue = rtrim($userPostFile,',');
               $explodeFiles = explode(',', $trimValue);
               $explodeFiles = array_unique($explodeFiles);
               $countExplodedFiles = count($explodeFiles); 
               $nums = preg_split('/\s*,\s*/', $trimValue);
               $lastFileID = end($nums); 
            echo '<div class="i_suggested_post_box" id="'.$userPostID.'">';  
                $fileData = $iN->iN_GetUploadedFileDetails($lastFileID);
                if($fileData){   
                    $fileUploadID = $fileData['upload_id'];
                    $fileExtension = $fileData['uploaded_file_ext'];
                    $filePath = $fileData['uploaded_file_path'];
                    $filePathTumbnail = $fileData['upload_tumbnail_file_path'];
                if($filePathTumbnail){
                   $imageTumbnail = $filePathTumbnail;
                }else{
                   $imageTumbnail = $filePath; 
                } 
                if ($userPostWhoCanSee != '1') {
                    if ($getFriendStatusBetweenTwoUser != 'me' && $getFriendStatusBetweenTwoUser != 'subscriber' && $userPostStatus != '2' && $userPostWhoCanSee == '3') {
                        $filePath = $fileData['uploaded_x_file_path'];
                    } else if ($userPostWhoCanSee == '4' && $getFriendStatusBetweenTwoUser != 'me') {
                        if ($checkUserPurchasedThisPost == '0' && $getFriendStatusBetweenTwoUser != 'subscriber') {
                            $filePath = $fileData['uploaded_x_file_path'];
                        } else {
                            $filePath = $fileData['uploaded_file_path'];
                        }
                    } else if ($userPostWhoCanSee == '2' && $getFriendStatusBetweenTwoUser != 'me' && $getFriendStatusBetweenTwoUser != 'flwr' && $getFriendStatusBetweenTwoUser != 'subscriber') {
                        $filePath = $fileData['uploaded_x_file_path'];
                    } else {
                        if ($getFriendStatusBetweenTwoUser == 'me') {
                            $filePath = $fileData['uploaded_file_path']; 
                        } else {
                            if ($getFriendStatusBetweenTwoUser == 'subscriber' && $userPostWhoCanSee == '3') {
                                $filePath = $fileData['upload_tumbnail_file_path'];
                            } else {
                                if ($getFriendStatusBetweenTwoUser == 'flwr' || $getFriendStatusBetweenTwoUser == 'subscriber') {
                                    $filePath = $fileData['upload_tumbnail_file_path'];
                                } else {
                                    $filePath = $fileData['uploaded_x_file_path'];
                                }
                            }
                        }
                    } 
                } else {
                    $filePath = $fileData['uploaded_file_path'];
                }
                $filePathWithoutExt = preg_replace('/\\.[^.\\s]{3,4}$/', '', $filePath);
                if ($s3Status == 1) {
                    if ($filePathTumbnail) {
                        $filePathUrl = 'https://' . $s3Bucket . '.s3.' . $s3Region . '.amazonaws.com/' . $imageTumbnail;
                    } else {
                        $filePathUrl = 'https://' . $s3Bucket . '.s3.' . $s3Region . '.amazonaws.com/' . $imageTumbnail;
                    } 
                } else if ($digitalOceanStatus == '1') {
                    if ($filePathTumbnail) {
                        $filePathUrl = 'https://' . $oceanspace_name . '.' . $oceanregion . '.digitaloceanspaces.com/' . $imageTumbnail;
                    } else {
                        $filePathUrl = 'https://' . $oceanspace_name . '.' . $oceanregion . '.digitaloceanspaces.com/' . $imageTumbnail;
                    }
                } else {
                    if ($filePathTumbnail) {
                        $filePathUrl = $base_url . $imageTumbnail;  
                    } else {
                        $filePathUrl = $base_url . $imageTumbnail;
                    }
                }  
                    if($userPostWhoCanSee == '1'){
                        $onlySubs = '';
                        $subPostTop = ''; 
                     }else if($userPostWhoCanSee == '2'){
                        $subPostTop = '';
                        $wCanSee = '<div class="i_plus_subs" id="ipublic_'.$userPostID.'">'.$iN->iN_SelectedMenuIcon('15').'</div>'; 
                        $onlySubs = '<div class="onlySubsSuggestion"><div class="onlySubsSuggestionWrapper"><div class="onlySubsSuggestion_icon">'.$iN->iN_SelectedMenuIcon('56').'</div></div></div>';
                     }else if($userPostWhoCanSee == '3'){
                        $subPostTop = 'extensionPost';
                        $onlySubs = '<div class="onlySubsSuggestion"><div class="onlySubsSuggestionWrapper"><div class="onlySubsSuggestion_icon">'.$iN->iN_SelectedMenuIcon('56').'</div></div></div>';
                     }else if($userPostWhoCanSee == '4'){
                        $subPostTop = 'extensionPost';
                        $wCanSee = '<div class="i_plus_public" id="ipublic_'.$userPostID.'">'.$iN->iN_SelectedMenuIcon('9').'</div>';
                        $onlySubs = '<div class="onlySubsSuggestion"><div class="onlySubsSuggestionWrapper"><div class="onlySubsSuggestion_icon">'.$iN->iN_SelectedMenuIcon('40').'</div></div></div>';
                     }  
                if($fileExtension == 'mp3'){
                    $filePathUrl = $base_url.'img/audio.png';
                }
      ?>  
         <div class="i_suggested_post_file" style="background-image:url('<?php echo filter_var($filePathUrl, FILTER_VALIDATE_URL);?>');">
            <!---->
            <a href="<?php echo filter_var($slugUrl, FILTER_VALIDATE_URL);?>">
            <?php
            if($getFriendStatusBetweenTwoUser != 'me' && $getFriendStatusBetweenTwoUser != 'subscriber'){
                echo html_entity_decode($onlySubs);
             }
            ?> 
               <img class="i_p_image" src="<?php echo filter_var($filePathUrl, FILTER_VALIDATE_URL);?>">
            </a>
            <!---->            
         </div> 
      <?php }
    echo '</div>';
    }}?> 
  </div>
</div>