<?php   
$totalnApprovedPosts = $iN->iN_CalculateAllStoriePosts();
$totalPages = ceil($totalnApprovedPosts / $paginationLimit); 
if (isset($_GET["page-id"])) { 
    $pagep  = mysqli_real_escape_string($db, $_GET["page-id"]); 
    if(preg_match('/^[0-9]+$/', $pagep)){
        $pagep = $pagep;
    }else{
        $pagep = '1';
    }
}else{
    $pagep = '1';
} 
?>
<div class="i_contents_container">
    <div class="i_general_white_board border_one column flex_ tabing__justify">
        <!---->
        <div class="i_general_title_box">
          <?php echo filter_var($LANG['manage_storie_posts'], FILTER_SANITIZE_STRING).'('.$totalnApprovedPosts.')';?>
        </div>
        <!----> 
        <!---->
        <div class="i_general_row_box column flex_" id="general_conf" style="padding-top:30px;">  
        <div class="warning_"><?php echo filter_var($LANG['noway_desc'], FILTER_SANITIZE_STRING);?></div>
        <?php 
        $ApprovedPosts = $iN->iN_AllTypeStoriePostsList($userID, $paginationLimit, $pagep);
        if($ApprovedPosts){ 
        ?> 
        <div style="overflow-x:auto;">
                <table class="border_one">
                    <tr>
                        <th><?php echo filter_var($LANG['id'], FILTER_SANITIZE_STRING);?></th>
                        <th><?php echo filter_var($LANG['post_owner'], FILTER_SANITIZE_STRING);?></th>  
                        <th><?php echo filter_var($LANG['post_shared_time'], FILTER_SANITIZE_STRING);?></th> 
                        <th><?php echo filter_var($LANG['see_post'], FILTER_SANITIZE_STRING);?></th>   
                        <th><?php echo filter_var($LANG['status'], FILTER_SANITIZE_STRING);?></th>   
                        <th><?php echo filter_var($LANG['actions'], FILTER_SANITIZE_STRING);?></th>   
                    </tr>
        <?php 
        foreach($ApprovedPosts as $postData){
            $postID = $postData['s_id'];
            $postOwnerID = $postData['uid_fk'];
            $postOwnerAvatar = $iN->iN_UserAvatar($postOwnerID, $base_url);
            $postOwnerUserName = $postData['i_username'];
            $postOwnerUserFullName = $postData['i_user_fullname']; 
            $postCreatedTime = $postData['created'];
            $postStatus = $postData['status'];
            $crTime = date('Y-m-d H:i:s',$postCreatedTime);  
            $dif = time() - $postCreatedTime;
            $bir = date('Y-m-d H:i:s',$dif);   
            $cDate = strtotime(date('Y-m-d H:i:s')); 
            $oldDate = $postCreatedTime + 86400;
             
            if($postStatus == '1'){ 
                $timeTest = $LANG['continues_to_show']; 
                $psClass = 'p_s_none_published';
                $p_Status = '<div class="'.$psClass.' flex_ tabing">'.$iN->iN_SelectedMenuIcon('123').$LANG['not_published_yet'].'</div>';
            }else if($postStatus == '2'){
                if($oldDate > $cDate){
                    $timeTest =  $LANG['continues_to_show'];
                    $statusIcon = $iN->iN_SelectedMenuIcon('154').$LANG['active'];
                    $psClass = 'p_s_active';
                }else{
                    $timeTest = $LANG['story_was_shown'];
                    $statusIcon = $iN->iN_SelectedMenuIcon('115').$timeTest;
                    $psClass = 'p_s_passed';
                }
                $p_Status = '<div class="'.$psClass.' flex_ tabing">'.$statusIcon.'</div>';
            }
            $seePostButton = $base_url.'admin/storiePosts?post='.$postID; 
            $storieUploadedFilePath = $postData['uploaded_file_path'];
            $storieUploadedfileExtension = $postData['uploaded_file_ext'];
            $storieUploadedFileTumbnail = $postData['upload_tumbnail_file_path'];
            $storieText = $postData['text']; 
            if($storieUploadedfileExtension == 'mp4'){
                if ($s3Status == 1) {
                    if ($storieUploadedFileTumbnail) {
                        $filePathUrl = 'https://' . $s3Bucket . '.s3.' . $s3Region . '.amazonaws.com/' . $storieUploadedFileTumbnail;
                    } else {
                        $filePathUrl = 'https://' . $s3Bucket . '.s3.' . $s3Region . '.amazonaws.com/' . $storieUploadedFilePath;
                    } 
                } else if ($digitalOceanStatus == '1') {
                    if ($storieUploadedFileTumbnail) {
                        $filePathUrl = 'https://' . $oceanspace_name . '.' . $oceanregion . '.digitaloceanspaces.com/' . $storieUploadedFileTumbnail;
                    } else {
                        $filePathUrl = 'https://' . $oceanspace_name . '.' . $oceanregion . '.digitaloceanspaces.com/' . $storieUploadedFilePath;
                    }
                } else {
                    if ($storieUploadedFileTumbnail) {
                        $filePathUrl = $base_url . $storieUploadedFilePath;  
                    } else {
                        $filePathUrl = $base_url . $storieUploadedFilePath;
                    }
                } 
            }else{
                if ($s3Status == 1) {
                    if ($storieUploadedFileTumbnail) {
                        $filePathUrl = 'https://' . $s3Bucket . '.s3.' . $s3Region . '.amazonaws.com/' . $storieUploadedFileTumbnail;
                    } else {
                        $filePathUrl = 'https://' . $s3Bucket . '.s3.' . $s3Region . '.amazonaws.com/' . $storieUploadedFilePath;
                    } 
                } else if ($digitalOceanStatus == '1') {
                    if ($storieUploadedFileTumbnail) {
                        $filePathUrl = 'https://' . $oceanspace_name . '.' . $oceanregion . '.digitaloceanspaces.com/' . $storieUploadedFileTumbnail;
                    } else {
                        $filePathUrl = 'https://' . $oceanspace_name . '.' . $oceanregion . '.digitaloceanspaces.com/' . $storieUploadedFilePath;
                    }
                } else {
                    if ($storieUploadedFileTumbnail) {
                        $filePathUrl = $base_url . $storieUploadedFilePath;  
                    } else {
                        $filePathUrl = $base_url . $storieUploadedFilePath;
                    }
                }
            } 
        ?>
        <tr class="transition trhover body_<?php echo filter_var($postID, FILTER_SANITIZE_STRING);?>">
            <td><?php echo filter_var($postID, FILTER_SANITIZE_STRING);?></td>
            <td>
                <div class="t_od flex_ c6">
                    <div class="t_owner_avatar border_two tabing flex_"><img src="<?php echo filter_var($postOwnerAvatar, FILTER_SANITIZE_STRING);?>"></div>
                    <div class="t_owner_user tabing flex_"><a class="truncated" href="<?php echo filter_var($base_url, FILTER_SANITIZE_STRING).$postOwnerUserName;?>"><?php echo filter_var($postOwnerUserFullName, FILTER_SANITIZE_STRING);?></a></div>
                </div>
            </td>  
            <td class="see_post_details"><div class="flex_ tabing_non_justify"><div class="tim flex_ tabing"><?php echo filter_var($iN->iN_SelectedMenuIcon('73'), FILTER_SANITIZE_STRING).' '.TimeAgo::ago($crTime , date('Y-m-d H:i:s'));?></div></div></td>
            <td class="see_post_details"><div class="flex_ tabing_non_justify see_post" id="lightgallery<?php echo filter_var($postID, FILTER_SANITIZE_STRING);?>" data-src="<?php echo $filePathUrl;?>"><img src="<?php echo $filePathUrl;?>" data-src="<?php echo $filePathUrl;?>"></div></td>
            <td class="see_post_details"><div class="flex_ tabing_non_justify"><?php echo html_entity_decode($p_Status);?></div></td>
            <td class="flex_ tabing">
                <div class="flex_ tabing_non_justify">
                    <div class="delps border_one transition" id="<?php echo filter_var($postID, FILTER_SANITIZE_STRING);?>"><?php echo filter_var($iN->iN_SelectedMenuIcon('28'), FILTER_SANITIZE_STRING).$LANG['delete'];?></div> 
                </div>
            </td> 
        </tr>
            <script type="text/javascript">
                $('#lightgallery'+<?php echo filter_var($postID, FILTER_SANITIZE_STRING); ?>).lightGallery({
                    videojs: true,
                    mode: 'lg-fade',
                    cssEasing : 'cubic-bezier(0.25, 0, 0.25, 1)',
                    download: false,
                    share: false
                });
            </script>
        <?php }?>
        </table>
            </div>
        <?php }else{echo '<div class="no_creator_f_wrap flex_ tabing"><div class="no_c_icon">'.html_entity_decode($iN->iN_SelectedMenuIcon('54')).'</div><div class="n_c_t">'.$LANG['no_story_post_yet'].'</div></div>';}?>          
        </div>
        <!---->
    <div class="i_become_creator_box_footer tabing">
        <?php if (ceil($totalnApprovedPosts / $paginationLimit) > 0): ?>
            <ul class="pagination">
                <?php if ($pagep > 1): ?>
                <li class="prev"><a class="transition" href="<?php echo filter_var($base_url);?>admin/allPosts?page-id=<?php echo filter_var($pagep, FILTER_SANITIZE_STRING)-1 ?>"><?php echo filter_var($LANG['preview_page'], FILTER_SANITIZE_STRING);?></a></li>
                <?php endif; ?>

                <?php if (filter_var($pagep, FILTER_SANITIZE_STRING) > 3): ?>
                <li class="start"><a class="transition" href="<?php echo filter_var($base_url, FILTER_SANITIZE_STRING);?>admin/allPosts?page-id=1">1</a></li>
                <li class="dots">...</li>
                <?php endif; ?>

                <?php if (filter_var($pagep, FILTER_SANITIZE_STRING)-2 > 0): ?><li class="page"><a class="transition" href="<?php echo filter_var($base_url, FILTER_SANITIZE_STRING);?>admin/allPosts?page-id=<?php echo filter_var($pagep, FILTER_SANITIZE_STRING)-2; ?>"><?php echo filter_var($pagep, FILTER_SANITIZE_STRING)-2; ?></a></li><?php endif; ?>
                <?php if ($pagep-1 > 0): ?><li class="page"><a href="<?php echo filter_var($base_url, FILTER_SANITIZE_STRING);?>admin/allPosts?page-id=<?php echo filter_var($pagep, FILTER_SANITIZE_STRING)-1; ?>"><?php echo filter_var($pagep, FILTER_SANITIZE_STRING)-1; ?></a></li><?php endif; ?>

                <li class="currentpage active"><a  class="transition" href="<?php echo filter_var($base_url, FILTER_SANITIZE_STRING);?>admin/allPosts?page-id=<?php echo filter_var($pagep, FILTER_SANITIZE_STRING); ?>"><?php echo filter_var($pagep, FILTER_SANITIZE_STRING); ?></a></li>

                <?php if ($pagep+1 < ceil($totalnApprovedPosts / $paginationLimit)+1): ?><li class="page"><a class="transition" href="<?php echo filter_var($base_url, FILTER_SANITIZE_STRING);?>admin/allPosts?page-id=<?php echo filter_var($pagep, FILTER_SANITIZE_STRING)+1; ?>"><?php echo filter_var($pagep, FILTER_SANITIZE_STRING)+1; ?></a></li><?php endif; ?>
                <?php if ($pagep+2 < ceil($totalnApprovedPosts / $paginationLimit)+1): ?><li class="page"><a class="transition" href="<?php echo filter_var($base_url, FILTER_SANITIZE_STRING);?>admin/allPosts?page-id=<?php echo filter_var($pagep, FILTER_SANITIZE_STRING)+2; ?>"><?php echo filter_var($pagep, FILTER_SANITIZE_STRING)+2; ?></a></li><?php endif; ?>

                <?php if ($pagep < ceil($totalnApprovedPosts / $paginationLimit)-2): ?>
                <li class="dots">...</li>
                <li class="end"><a class="transition" href="<?php echo filter_var($base_url, FILTER_SANITIZE_STRING);?>admin/allPosts?page-id=<?php echo ceil($totalnApprovedPosts / $paginationLimit); ?>"><?php echo ceil($totalnApprovedPosts / $paginationLimit); ?></a></li>
                <?php endif; ?>

                <?php if ($pagep < ceil($totalnApprovedPosts / $paginationLimit)): ?>
                <li class="next"><a class="transition" href="<?php echo filter_var($base_url, FILTER_SANITIZE_STRING);?>admin/allPosts?page-id=<?php echo filter_var($pagep, FILTER_SANITIZE_STRING)+1; ?>"><?php echo filter_var($LANG['next_page'], FILTER_SANITIZE_STRING);?></a></li>
                <?php endif; ?>
            </ul>
        <?php endif; ?>    
     </div> 
    <!---->
    </div> 
    
</div>
<script type="text/javascript">
(function($) {
    "use strict"; 
    $(document).on("click", ".delps", function() {
        var type = 'delete_storie_alert';
        var ID = $(this).attr("id");
        var data = 'f=' + type + '&id=' + ID;
        $.ajax({
            type: "POST",
            url: siteurl + 'request/popup.php',
            data: data,
            cache: false,
            beforeSend: function() {
                /*Do Something*/
            },
            success: function(response) {
                $("body").append(response);
                setTimeout(() => {
                    $(".i_modal_bg_in").addClass('i_modal_display_in');
                }, 200);
            }
        });
    });
})(jQuery);    
</script>