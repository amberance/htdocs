<?php 
$lastPostID = isset($_POST['last']) ? $_POST['last'] : '';
$notFoundNot = '';
$postsFromDataProduct = '';
if($logedIn == 0){ 
    if($page == 'moreposts'){
        $postsFromData = $iN->iN_AllFriendsPostsOut($lastPostID, $showingNumberOfPost); 
    }else if($page == 'profile'){
        $postsFromData = $iN->iN_AllUserProfilePosts($p_profileID, $lastPostID, $showingNumberOfPost);
    } else if($page == 'hashtag'){
      $postsFromData = $iN->iN_GetHashTagsSearch($pageFor, $lastPostID, $showingNumberOfPost); 
      $notFoundNot = $LANG['no_post_will_be_shown']; 
   }
   /*If user not login put the call login form button class*/
   $loginFormClass = 'loginForm'; 
}else{
   if($page == 'moreposts' || $page == 'friends'){
      $postsFromData = $iN->iN_AllFriendsPosts($userID, $lastPostID, $showingNumberOfPost);
      $notFoundNot = $LANG['no_post_will_be_shown'];
   }else if($page == 'profile'){ 
      if($pCat == 'audios'){ 
         $postsFromData = $iN->iN_AllUserProfilePostsByChooseAudios($p_profileID, $lastPostID, $showingNumberOfPost);
      }else if($pCat == 'videos'){
         $postsFromData = $iN->iN_AllUserProfilePostsByChooseVideos($p_profileID, $lastPostID, $showingNumberOfPost);
      }else if($pCat == 'photos'){
         $postsFromData = $iN->iN_AllUserProfilePostsByChoosePhotos($p_profileID, $lastPostID, $showingNumberOfPost);
      }else if($pCat == 'products'){
         $postsFromData = ''; 
         $postsFromDataProduct = $iN->iN_AllUserProfileProductPosts($p_profileID, $lastPostID, $showingNumberOfPost);
      }else{
         $postsFromData = $iN->iN_AllUserProfilePosts($p_profileID, $lastPostID, $showingNumberOfPost);
      }
      $notFoundNot = $LANG['no_post_wilbe_shown_in_this_profile'];
   }else if($page == 'allPosts' || $page == 'moreexplore'){
      $postsFromData = $iN->iN_AllUserForExplore($userID, $lastPostID, $showingNumberOfPost);
      $notFoundNot = $LANG['no_post_will_be_shown']; 
   }else if($page == 'premiums' || $page == 'morepremium'){
      $postsFromData = $iN->iN_AllUserForPremium($userID, $lastPostID, $showingNumberOfPost); 
      $notFoundNot = $LANG['no_post_will_be_shown']; 
   }else if($page == 'savedpost'){
      $postsFromData = $iN->iN_SavedPosts($userID, $lastPostID, $showingNumberOfPost); 
      $notFoundNot = $LANG['no_post_will_be_shown']; 
   } else if($page == 'hashtag'){
      $postsFromData = $iN->iN_GetHashTagsSearch($pageFor, $lastPostID, $showingNumberOfPost); 
      $notFoundNot = $LANG['no_post_will_be_shown']; 
   }
   $loginFormClass = '';
}
if($postsFromData){
   foreach($postsFromData as $postFromData){
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
    if($fullnameorusername == 'no'){
       $userPostOwnerUserFullName = $userPostOwnerUsername; 
    }
    $userPostOwnerUserGender = $postFromData['user_gender'];
    $userTextForPostTip = isset($postFromData['thanks_for_tip']) ? $postFromData['thanks_for_tip'] : $LANG['thanks_for_tip'];
    $getUserPaymentMethodStatus = isset($postFromData['payout_method']) ? $postFromData['payout_method'] : NULL;
    $userPostHashTags = isset($postFromData['hashtags']) ? $postFromData['hashtags'] : NULL; 
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
    if(empty($userPostText)){
        $postStyle = 'style="display:none;"';
    }
    /*Comment*/
   $getUserComments = $iN->iN_GetPostComments($userPostID, 0);
   $c = 1;
   $TotallyPostComment = '';
   if ($c) {
      if ($getUserComments > 0) {
         $CountTheUniqComment = count($getUserComments);
         $SecondUniqComment = $CountTheUniqComment - 2; 
         if ($CountTheUniqComment > 2) {  
            $getUserComments = $iN->iN_GetPostComments($userPostID, 2);
            $TotallyPostComment = '<div class="lc_sum_container lc_sum_container_'.$userPostID.'"><div class="comnts transition more_comment" id="od_com_'.$userPostID.'" data-id="'.$userPostID.'">'.preg_replace( '/{.*?}/', $SecondUniqComment, $LANG['t_comments']).'</div></div>';
         }
      }
   }
   $pSaveStatusBtn = $iN->iN_SelectedMenuIcon('22'); 
   if($logedIn == 0){
      $getFriendStatusBetweenTwoUser = '1';
      $checkPostLikedBefore ='';
      $checkPostReportedBefore = ''; 
      $checkUserPurchasedThisPost = '0';
   }else{
      $getFriendStatusBetweenTwoUser = $iN->iN_GetRelationsipBetweenTwoUsers($userID, $userPostOwnerID);
      $checkPostLikedBefore = $iN->iN_CheckPostLikedBefore($userID, $userPostID);
      $checkPostReportedBefore = $iN->iN_CheckPostReportedBefore($userID, $userPostID);
      if($iN->iN_CheckPostSavedBefore($userID, $userPostID) == '1'){
         $pSaveStatusBtn = $iN->iN_SelectedMenuIcon('63'); 
      } 
      $checkUserPurchasedThisPost = $iN->iN_CheckUserPurchasedThisPost($userID, $userPostID);
   }  
   $onlySubs = '';
    if($userPostWhoCanSee == '1'){
       $onlySubs = '';
       $subPostTop = '';
       $wCanSee = '<div class="i_plus_public" id="ipublic_'.$userPostID.'">'.$iN->iN_SelectedMenuIcon('50').'</div>';
    }else if($userPostWhoCanSee == '2'){
       $subPostTop = '';
       $wCanSee = '<div class="i_plus_subs" id="ipublic_'.$userPostID.'">'.$iN->iN_SelectedMenuIcon('15').'</div>'; 
       $onlySubs = '<div style="min-height:365px;"></div><div class="onlySubs"><div class="onlySubsWrapper"><div class="onlySubs_icon">'.$iN->iN_SelectedMenuIcon('15').'</div><div class="onlySubs_note">'.preg_replace( '/{.*?}/', $userPostOwnerUserFullName, $LANG['only_followers']).'</div></div></div>';
    }else if($userPostWhoCanSee == '3'){
       $subPostTop = 'extensionPost';
       $wCanSee = '<div class="i_plus_public" id="ipublic_'.$userPostID.'">'.$iN->iN_SelectedMenuIcon('51').'</div>';
       $onlySubs = '<div style="min-height:365px;"></div><div class="onlySubs"><div class="onlySubsWrapper"><div class="onlySubs_icon">'.$iN->iN_SelectedMenuIcon('56').'</div><div class="onlySubs_note">'.preg_replace( '/{.*?}/', $userPostOwnerUserFullName, $LANG['only_subscribers']).'</div><div class="fr_subs uSubsModal transition" data-u="'.$userPostOwnerID.'">'.$iN->iN_SelectedMenuIcon('51').$LANG['free_for_subscribers'].'</div></div></div>';
    }else if($userPostWhoCanSee == '4'){
      $subPostTop = 'extensionPost';
      $wCanSee = '<div class="i_plus_public" id="ipublic_'.$userPostID.'">'.$iN->iN_SelectedMenuIcon('9').'</div>';
      $onlySubs = '<div style="min-height:365px;"></div><div class="onlyPremium"><div class="onlySubsWrapper"><div class="premium_locked"><div class="premium_locked_icon">'.$iN->iN_SelectedMenuIcon('56').'</div></div><div class="onlySubs_note"><div class="buyThisPost prcsPost" id="'.$userPostID.'">'.preg_replace( '/{.*?}/', $userPostWantedCredit, $LANG['post_credit']).'</div><div class="buythistext prcsPost" id="'.$userPostID.'">'.$LANG['purchase_post'].'</div></div><div class="fr_subs uSubsModal transition" data-u="'.$userPostOwnerID.'">'.$iN->iN_SelectedMenuIcon('51').$LANG['free_for_subscribers'].'</div></div></div>';
    }
   $postReportStatus = $iN->iN_SelectedMenuIcon('32').$LANG['report_this_post'];
   if($checkPostReportedBefore == '1'){
      $postReportStatus = $iN->iN_SelectedMenuIcon('32').$LANG['unreport'];
   }
   if($checkPostLikedBefore){
      $likeIcon = $iN->iN_SelectedMenuIcon('18');
      $likeClass = 'in_unlike';
   }else{
      $likeIcon = $iN->iN_SelectedMenuIcon('17');
      $likeClass = 'in_like';
   }
   if($userPostCommentAvailableStatus == '1'){
      $commentStatusText = $LANG['disable_comment'];
   }else{
      $commentStatusText = $LANG['enable_comments'];
   }
   $pPinStatus = '';
   $pPinStatusBtn = $iN->iN_SelectedMenuIcon('29').$LANG['pin_on_my_profile'];
   if($userPostPinStatus == '1'){
     $pPinStatus = '<div class="i_pined_post" id="i_pined_post_'.$userPostID.'">'.$iN->iN_SelectedMenuIcon('62').'</div>';
     $pPinStatusBtn = $iN->iN_SelectedMenuIcon('29').$LANG['post_pined_on_your_profile'];
   } 
   $waitingApprove = '';
   $likeSum = $iN->iN_TotalPostLiked($userPostID);
   if($likeSum > '0'){
      $likeSum = $likeSum;
   }else{
      $likeSum = '';
   }
   /*Comment*/ 
   if($userPostStatus == '2') {
      $ApproveNot = $iN->iN_GetAdminNot($userPostOwnerID, $userPostID);
      $aprove_status = isset($ApproveNot['approve_status']) ? $ApproveNot['approve_status'] : NULL;
      $a_not = $iN->iN_SelectedMenuIcon('10').$LANG['waiting_for_approve'];
      $theApproveNot = isset($ApproveNot['approve_not']) ? $ApproveNot['approve_not'] : NULL;
      if($aprove_status == '2'){
         $a_not = $iN->iN_SelectedMenuIcon('113').$LANG['request_rejected'].' '.$theApproveNot;
      }else if($aprove_status == '3'){
         $a_not = $iN->iN_SelectedMenuIcon('114').$LANG['declined'].' '.$theApproveNot;
      }
      $waitingApprove = '<div class="waiting_approve flex_">'.$a_not.'</div>';
      if($logedIn == 0){
         echo '<div class="i_post_body body_'.$userPostID.'" id="'.$userPostID.'" data-last="'.$userPostID.'" style="display:none;"></div>';
      }else{
         if($userID == $userPostOwnerID){ 
            if(empty($userPostFile)){
               include("textPost.php");
            }else{
               include("ImagePost.php");
            }
         }else{
            echo '<div class="i_post_body body_'.$userPostID.'" id="'.$userPostID.'" data-last="'.$userPostID.'" style="display:none;"></div>';
         }
      }
   }else{
      if(empty($userPostFile)){
         include("textPost.php");
      }else{
         include("ImagePost.php"); 
      }
   }
   }
}else if($postsFromDataProduct){ 
   foreach($postsFromDataProduct as $oprod){
      $ProductID = $oprod['pr_id'];
      $ProductName = $oprod['pr_name'];
      $ProductPrice = $oprod['pr_price'];
      $ProductFiles = $oprod['pr_files'];  
      $ProductOwnerID = $oprod['iuid_fk']; 
      $productOwnerUserName = $oprod['i_username'];
      $productOwnerUserFullName = $oprod['i_user_fullname'];
      if($fullnameorusername == 'no'){
         $productOwnerUserFullName = $productOwnerUserName; 
      }
      $pprofileAvatar = $iN->iN_UserAvatar($ProductOwnerID, $base_url);
      $ProductSlug = $oprod['pr_name_slug'];
      $ProductType = $oprod['product_type'];
      $p__style = $ProductType;
      if($ProductType == 'scratch'){
          $ProductType = 'simple_product';
          $p__style = 'scratch';
      }
      $ProductSlotsNumber = $oprod['pr_slots_number']; 
      $SlugUrl = $base_url.'product/'.$ProductSlug.'_'.$ProductID;   
      $trimValue = rtrim($ProductFiles,','); 
      $nums = preg_split('/\s*,\s*/', $trimValue);
      $lastFileID = end($nums);
      $pfData = $iN->iN_GetUploadedFileDetails($lastFileID);
      if($pfData){
          $fileUploadID = $pfData['upload_id']; 
          $fileExtension = $pfData['uploaded_file_ext'];
          $filePath = $pfData['uploaded_file_path']; 
          if ($s3Status == 1) { 
              $productDataImage = 'https://' . $s3Bucket . '.s3.' . $s3Region . '.amazonaws.com/' . $filePath;
          } else if ($digitalOceanStatus == '1') { 
              $productDataImage = 'https://' . $oceanspace_name . '.' . $oceanregion . '.digitaloceanspaces.com/' . $filePath;                   
          } else { 
              $productDataImage = $base_url . $filePath;                    
          }
      }
      include("products.php");
   }
} else {
   echo '
    <div class="noPost" style="width:100%;">
        <div class="noPostIcon">'.$iN->iN_SelectedMenuIcon('54').'</div>
        <div class="noPostNote">'.$notFoundNot.'</div>
    </div>
   ';
} 
?>