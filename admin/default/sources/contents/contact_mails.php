<?php   
$totalnApprovedPosts = $iN->iN_CalculateAllQuestions();
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
          <?php echo filter_var($LANG['questions_from_users'], FILTER_SANITIZE_STRING);?>
        </div>
        <!----> 
        <!---->
        <div class="i_general_row_box column flex_" id="general_conf" style="padding-top:30px;">  
        <div class="warning_"><?php echo filter_var($LANG['noway_desc'], FILTER_SANITIZE_STRING);?></div>
        <?php 
        $questionsList = $iN->iN_AllTypeQuestionsList($userID, $paginationLimit, $pagep);
        if($questionsList){ 
        ?> 
        <div style="overflow-x:auto;">
                <table class="border_one">
                    <tr>
                        <th><?php echo filter_var($LANG['id'], FILTER_SANITIZE_STRING);?></th>
                        <th><?php echo filter_var($LANG['the_person_asking'], FILTER_SANITIZE_STRING);?></th> 
                        <th><?php echo filter_var($LANG['u_question'], FILTER_SANITIZE_STRING);?></th> 
                        <th><?php echo filter_var($LANG['date_it_was_asked'], FILTER_SANITIZE_STRING);?></th> 
                        <th><?php echo filter_var($LANG['status'], FILTER_SANITIZE_STRING);?></th>   
                        <th><?php echo filter_var($LANG['actions'], FILTER_SANITIZE_STRING);?></th>   
                    </tr>
        <?php 
        foreach($questionsList as $QData){
            $qID = $QData['contact_id'];
            $qUserFullName = $QData['contact_full_name'];
            $qUserEmail = $QData['contact_email'];
            $qQuestion = $QData['contact_message'];
            $qContacttime = $QData['contact_time'];
            $qContactIP = $QData['contact_ip'];
            $qContactReadStatus = $QData['contact_read_status'];
            $crTime = date('Y-m-d H:i:s',$qContacttime); 
            if($qContactReadStatus == '0'){
                $p_Status = '<div class="p_active flex_ tabing">'.$iN->iN_SelectedMenuIcon('115').$LANG['not_answered'].'</div>';
             }else if($qContactReadStatus == '1'){
                $p_Status = '<div class="pe_active flex_ tabing">'.$iN->iN_SelectedMenuIcon('69').$LANG['q_answered'].'</div>';
             } 
        ?>
        <tr class="transition trhover">
            <td><?php echo filter_var($qID, FILTER_SANITIZE_STRING);?></td>
            <td>
                <div class="t_od flex_ c6"> 
                    <div class="t_owner_user tabing flex_"><?php echo filter_var($qUserFullName, FILTER_SANITIZE_STRING);?></div>
                </div>
            </td> 
            <td class="see_post_details show_question_details" id="<?php echo filter_var($qID, FILTER_SANITIZE_STRING);?>"><div class="flex_ tabing_non_justify"><div class="pe_active flex_ tabing"><?php echo $iN->iN_SelectedMenuIcon('10').$LANG['see_question'];?></div></div></td>
            <td class="see_post_details"><div class="flex_ tabing_non_justify"><div class="tim flex_ tabing"><?php echo filter_var($iN->iN_SelectedMenuIcon('73'), FILTER_SANITIZE_STRING).' '.TimeAgo::ago($crTime , date('Y-m-d H:i:s'));?></div></div></td>
            <td class="see_post_details">
                <!---->
                <div class="i_checkbox_wrapper flex_ tabing_non_justify">
                    <div class="i_chck_text" style="padding-right:15px;"><?php echo filter_var($LANG['not_answered'], FILTER_SANITIZE_STRING);?></div>
                        <label class="el-switch el-switch-yellow" for="questionAnswerStatus<?php echo $qID;?>">
                          <input type="checkbox" name="questionAnswerStatus" class="chmdquestion q<?php echo $qID;?>" id="questionAnswerStatus<?php echo $qID;?>" data-id="<?php echo $qID;?>" <?php echo filter_var($qContactReadStatus, FILTER_SANITIZE_STRING) == '1' ? 'value="0" checked="checked"' : 'value="1"';?>>
                        <span class="el-switch-style"></span>  
                        </label> 
                        <input type="hidden" name="questionAnswerStatus" class="questionAnswerStatus" value="<?php echo filter_var($qContactReadStatus, FILTER_SANITIZE_STRING);?>">
                    <div class="i_chck_text" style="margin-right:15px;"><?php echo filter_var($LANG['q_answered'], FILTER_SANITIZE_STRING);?></div>
                    <div class="success_tick tabing flex_ sec_one questionAnswerStatus"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('69'));?></div>
                </div>
                 <!---->   
            </td>
            <td class="flex_ tabing">
                <div class="flex_ tabing_non_justify">
                    <div class="delq border_one transition" id="<?php echo filter_var($qID, FILTER_SANITIZE_STRING);?>"><?php echo $iN->iN_SelectedMenuIcon('28').$LANG['delete'];?></div>
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