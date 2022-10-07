<?php   
$totalnApprovedPosts = $iN->iN_CalculateAllUnReadReportedComments();
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
          <?php echo filter_var($LANG['reported_posts'], FILTER_SANITIZE_STRING);?>
        </div>
        <!----> 
        <!---->
        <div class="i_general_row_box column flex_" id="general_conf" style="padding-top:30px;">  
        <div class="warning_"><?php echo filter_var($LANG['noway_desc'], FILTER_SANITIZE_STRING);?></div>
        <?php 
        $reportedPostList = $iN->iN_AllTypeReportedCommentList($userID, $paginationLimit, $pagep);
        if($reportedPostList){ 
        ?> 
        <div style="overflow-x:auto;">
                <table class="border_one">
                    <tr>
                        <th><?php echo filter_var($LANG['id'], FILTER_SANITIZE_STRING);?></th>
                        <th><?php echo filter_var($LANG['reporter'], FILTER_SANITIZE_STRING);?></th> 
                        <th><?php echo filter_var($LANG['reported_post'], FILTER_SANITIZE_STRING);?></th> 
                        <th><?php echo filter_var($LANG['report_time'], FILTER_SANITIZE_STRING);?></th>   
                        <th><?php echo filter_var($LANG['report_status'], FILTER_SANITIZE_STRING);?></th> 
                        <th><?php echo filter_var($LANG['actions'], FILTER_SANITIZE_STRING);?></th>   
                    </tr>
        <?php 
        foreach($reportedPostList as $rData){
            $qID = $rData['p_report_id'];
            $reportedPostID = $rData['reported_comment'];
            $reportedPostIDFk = $rData['comment_post_id_fk'];
            $rUserID = $rData['iuid_fk']; 
            $qContacttime = $rData['report_time']; 
            $qContactReadStatus = $rData['report_status'];
            $crTime = date('Y-m-d H:i:s',$qContacttime); 
            if($qContactReadStatus == '0'){
              $p_Status = '<div class="p_active flex_ tabing">'.$iN->iN_SelectedMenuIcon('115').$LANG['not_answered'].'</div>';
            }else if($qContactReadStatus == '1'){
              $p_Status = '<div class="pe_active flex_ tabing">'.$iN->iN_SelectedMenuIcon('69').$LANG['q_answered'].'</div>';
            } 
            $userDetail = $iN->iN_GetUserDetails($rUserID);
            $rPostUserAvatar = $iN->iN_UserAvatar($rUserID, $base_url);
            $rUserName = $userDetail['i_username'];
            $rUserFullName = $userDetail['i_user_fullname'];
            $postDetails = $iN->iN_GetAllPostDetails($reportedPostID);
            
        ?>
        <tr class="transition trhover">
            <td><?php echo filter_var($qID, FILTER_SANITIZE_STRING);?></td>
            <td>
                <div class="t_od flex_ c6">
                    <div class="t_owner_avatar border_two tabing flex_"><img src="<?php echo filter_var($rPostUserAvatar, FILTER_VALIDATE_URL);?>"></div>
                    <div class="t_owner_user tabing flex_"><a class="truncated" href="<?php echo filter_var($base_url, FILTER_VALIDATE_URL).$rUserName;?>"><?php echo filter_var($rUserFullName, FILTER_SANITIZE_STRING);?></a></div>
                </div>
            </td>
            <td class="see_post_details" id="<?php echo filter_var($qID, FILTER_SANITIZE_STRING);?>"><div class="flex_ tabing_non_justify plink_"><a href="<?php echo filter_var($base_url, FILTER_VALIDATE_URL).'post/'.filter_var($reportedPostIDFk, FILTER_SANITIZE_STRING);?>#i_user_comments_<?php echo filter_var($reportedPostID, FILTER_SANITIZE_STRING);?>" target="blank_"><div class="pe_active flex_ tabing"><?php echo $iN->iN_SelectedMenuIcon('10').$LANG['check_reported_comment'];?></div></a></div></td>
            <td class="see_post_details"><div class="flex_ tabing_non_justify"><div class="tim flex_ tabing"><?php echo filter_var($iN->iN_SelectedMenuIcon('73'), FILTER_SANITIZE_STRING).' '.TimeAgo::ago($crTime , date('Y-m-d H:i:s'));?></div></div></td>
            <td class="see_post_details">
                <!---->
                <div class="i_checkbox_wrapper flex_ tabing_non_justify">
                    <div class="i_chck_text" style="padding-right:15px;"><?php echo filter_var($LANG['not_checked'], FILTER_SANITIZE_STRING);?></div>
                        <label class="el-switch el-switch-yellow" for="rcCheckStatus<?php echo $qID;?>">
                          <input type="checkbox" name="rcCheckStatus" class="rcchmdReport q<?php echo $qID;?>" id="rcCheckStatus<?php echo $qID;?>" data-id="<?php echo $qID;?>" <?php echo filter_var($qContactReadStatus, FILTER_SANITIZE_STRING) == '1' ? 'value="0" checked="checked"' : 'value="1"';?>>
                        <span class="el-switch-style"></span>  
                        </label> 
                        <input type="hidden" name="rcCheckStatus" class="rcCheckStatus" value="<?php echo filter_var($qContactReadStatus, FILTER_SANITIZE_STRING);?>">
                    <div class="i_chck_text" style="margin-right:15px;"><?php echo filter_var($LANG['checked'], FILTER_SANITIZE_STRING);?></div>
                    <div class="success_tick tabing flex_ sec_one rcCheckStatus"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('69'));?></div>
                </div>
                 <!---->   
            </td>
            <td class="flex_ tabing">
                <div class="flex_ tabing_non_justify">
                    <div class="delrc border_one transition" id="<?php echo filter_var($qID, FILTER_SANITIZE_STRING);?>"><?php echo $iN->iN_SelectedMenuIcon('28').$LANG['delete'];?></div>
                 </div>
            </td> 
        </tr>
        <?php }?>
        </table>
            </div>
        <?php }else{echo '<div class="no_creator_f_wrap flex_ tabing"><div class="no_c_icon">'.filter_var($iN->iN_SelectedMenuIcon('54'), FILTER_SANITIZE_STRING).'</div><div class="n_c_t">'.$LANG['no_question_pending'].'</div></div>';}?>
             
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