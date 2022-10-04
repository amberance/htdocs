<?php   
$searchUser = '';
$totalProduct = $iN->iN_TotalProducts($userID);
$totalPages = ceil($totalProduct / $paginationLimit); 
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
if(isset($_GET['sr'])){
   $searchUser = mysqli_real_escape_string($db, $_GET['sr']);
}
?>
<div class="i_contents_container">
    <div class="i_general_white_board border_one column flex_ tabing__justify">
        <!---->
        <div class="i_general_title_box">
          <?php echo filter_var($LANG['manage_users'], FILTER_SANITIZE_STRING).'('.$totalProduct.')';?>
        </div>
        <!----> 
        <!---->
        <div class="i_general_row_box column flex_" id="general_conf" style="padding-top:30px;">  
        <!--NewColumns-->
        <!---->
        <div class="i_contents_section flex_ tabing" style="margin-bottom:30px;">
            <!---->
            <div class="row_wrapper">
                <div class="row_item flex_ column border_one cibBoxColorOne_One">
                    <div class="chart_row_box_title one_one flex_ tabing_non_justify"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('159'));?><?php echo filter_var($LANG['scratch'], FILTER_SANITIZE_STRING);?></div>
                    <div class="chart_row_box_sum one_one_text"><span class="count-num"><?php echo filter_var($iN->iN_GetTotalProductByCategory($userID,'scratch'), FILTER_SANITIZE_STRING);?></span></div>
                </div>
            </div>
            <!---->
            <!---->
            <div class="row_wrapper">
                <div class="row_item flex_ column border_one cibBoxColorOne">
                    <div class="chart_row_box_title flex_ tabing_non_justify"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('160'));?><?php echo filter_var($LANG['bookazoom'], FILTER_SANITIZE_STRING);?></div>
                    <div class="chart_row_box_sum"><span class="count-num"><?php echo filter_var($iN->iN_GetTotalProductByCategory($userID,'bookazoom'), FILTER_SANITIZE_STRING);?></span></div>
                </div>
            </div>
            <!---->
            <!---->
            <div class="row_wrapper">
                <div class="row_item flex_ column border_one cibBoxColorTwo">
                    <div class="chart_row_box_title flex_ tabing_non_justify"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('161'));?><?php echo filter_var($LANG['digitaldownload'], FILTER_SANITIZE_STRING);?></div>
                    <div class="chart_row_box_sum"><span class="count-num"><?php echo filter_var($iN->iN_GetTotalProductByCategory($userID,'digitaldownload'), FILTER_SANITIZE_STRING);?></span></div>
                </div>
            </div>
            <!---->
            <!---->
            <div class="row_wrapper">
                <div class="row_item flex_ column border_one cibBoxColorThree">
                    <div class="chart_row_box_title flex_ tabing_non_justify"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('162'));?><?php echo filter_var($LANG['liveeventticket'], FILTER_SANITIZE_STRING);?></div>
                    <div class="chart_row_box_sum"><span class="count-num"><?php echo filter_var($iN->iN_GetTotalProductByCategory($userID,'liveeventticket'), FILTER_SANITIZE_STRING);?></span></div>
                </div>
            </div>
            <!---->
            <!---->
            <div class="row_wrapper">
                <div class="row_item flex_ column border_one cibBoxColorFour">
                    <div class="chart_row_box_title flex_ tabing_non_justify"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('163'));?><?php echo filter_var($LANG['artcommission'], FILTER_SANITIZE_STRING);?></div>
                    <div class="chart_row_box_sum"><span class="count-num"><?php echo filter_var($iN->iN_GetTotalProductByCategory($userID,'artcommission'), FILTER_SANITIZE_STRING);?></span></div>
                </div>
            </div>
            <!---->
            <!---->
            <div class="row_wrapper">
                <div class="row_item flex_ column border_one cibBoxColorFive">
                    <div class="chart_row_box_title flex_ tabing_non_justify"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('164'));?><?php echo filter_var($LANG['joininstagramclosefriends'], FILTER_SANITIZE_STRING);?></div>
                    <div class="chart_row_box_sum"><span class="count-num"><?php echo filter_var($iN->iN_GetTotalProductByCategory($userID,'joininstagramclosefriends'), FILTER_SANITIZE_STRING);?></span></div>
                </div>
            </div>
            <!---->
        </div>
        <!---->
        <div class="i_contents_section flex_" style="margin-bottom:30px;">
        
            <div class="irow_box_right" style="width:auto;padding-left:0px;">
                <div class="rec_not" style="padding-left:10px;padding-bottom:10px;"><?php echo filter_var($LANG['search_for_user'], FILTER_SANITIZE_STRING);?></div>
                <input type="text" class="i_input flex_" id="srcMe" value="<?php echo filter_var($searchUser, FILTER_SANITIZE_STRING);?>">
            </div>
            <div class="irow_box_right flex_ tabing" style="width:auto;padding-top: 25px;padding-left: 13px;">
                <div class="i_nex_btn_btn search_vl"><?php echo filter_var($LANG['search'], FILTER_SANITIZE_STRING);?></div>
            </div>
        </div>
        <!--/NewColumns-->

        <div class="warning_"><?php echo filter_var($LANG['noway_desc'], FILTER_SANITIZE_STRING);?></div>
        <?php 
        $allUsers = $iN->iN_AllTypeOfProductList($userID, $paginationLimit, $pagep,$searchUser);
        if($allUsers){ 
        ?> 
        <div style="overflow-x:auto;">
            <table class="border_one">
                <tr>
                    <th><?php echo filter_var($LANG['id'], FILTER_SANITIZE_STRING);?></th>
                    <th><?php echo filter_var($LANG['product_owner'], FILTER_SANITIZE_STRING);?></th>  
                    <th><?php echo filter_var($LANG['product_name'], FILTER_SANITIZE_STRING);?></th> 
                    <th><?php echo filter_var($LANG['share_time'], FILTER_SANITIZE_STRING);?></th>  
                    <th><?php echo filter_var($LANG['product_price'], FILTER_SANITIZE_STRING);?></th>  
                    <th><?php echo filter_var($LANG['product_type'], FILTER_SANITIZE_STRING);?></th>   
                    <th><?php echo filter_var($LANG['pp_sales'], FILTER_SANITIZE_STRING);?></th> 
                    <th><?php echo filter_var($LANG['actions'], FILTER_SANITIZE_STRING);?></th> 
                </tr>
        <?php 
        foreach($allUsers as $oprod){
            $sProductID = $oprod['pr_id'];
            $sProductName = $oprod['pr_name'];
            $sProductPrice = $oprod['pr_price'];
            $sProductFiles = $oprod['pr_files'];  
            $sProductOwnerID = $oprod['iuid_fk']; 
            $sProductSlug = $oprod['pr_name_slug'];
            $sProductType = $oprod['product_type'];
            $sProductCreatedTime = $oprod['pr_created_time'];
            $crTime = date('Y-m-d H:i:s',$sProductCreatedTime);  
            $p__style = $sProductType;
            if($sProductType == 'scratch'){
                $sProductType = 'simple_product';
                $p__style = 'scratch';
            }
            $sProductSlotsNumber = $oprod['pr_slots_number']; 
            $sSlugUrl = $base_url.'product/'.$sProductSlug.'_'.$sProductID;   
            $strimValue = rtrim($sProductFiles,','); 
            $snums = preg_split('/\s*,\s*/', $strimValue);
            $slastFileID = end($snums);
            $spfData = $iN->iN_GetUploadedFileDetails($slastFileID);
            if($spfData){
                $sfileUploadID = $spfData['upload_id']; 
                $sfileExtension = $spfData['uploaded_file_ext'];
                $sfilePath = $spfData['uploaded_file_path']; 
                if ($s3Status == 1) { 
                    $sproductDataImage = 'https://' . $s3Bucket . '.s3.' . $s3Region . '.amazonaws.com/' . $sfilePath;
                } else if ($digitalOceanStatus == '1') { 
                    $sproductDataImage = 'https://' . $oceanspace_name . '.' . $oceanregion . '.digitaloceanspaces.com/' . $sfilePath;                   
                } else { 
                    $sproductDataImage = $base_url . $sfilePath;                    
                }
            }
            $userAvatar = $iN->iN_UserAvatar($sProductOwnerID, $base_url); 
            $userUserName = $oprod['i_username'];
            $userUserFullName = $oprod['i_user_fullname'];
        ?>
        <tr class="transition trhover">
            <td><?php echo filter_var($sProductID, FILTER_SANITIZE_STRING);?></td>
            <td> 
                <div class="t_od flex_ c6">
                    <div class="t_owner_avatar border_two tabing flex_"><img src="<?php echo filter_var($userAvatar, FILTER_VALIDATE_URL);?>"></div>
                    <div class="t_owner_user tabing flex_"><a class="truncated" href="<?php echo filter_var($base_url, FILTER_VALIDATE_URL).$userUserName;?>"><?php echo filter_var($userUserFullName, FILTER_SANITIZE_STRING);?></a></div>
                </div> 
            </td>
            <td class="see_post_details"><div class="flex_ tabing_non_justify see_post_details_a"><a href="<?php echo filter_var($sSlugUrl, FILTER_VALIDATE_URL);?>"><?php echo $urlHighlight->highlightUrls($iN->sanitize_output($iN->iN_RemoveYoutubelink($sProductName), $base_url));?>fasdfafdsafaf asd fas fa asdf asf as df dsa fdsaf asdasd fasdf asd fasd fasdf </a></div></td>
            <td class="see_post_details"><div class="flex_ tabing_non_justify"><div class="tim flex_ tabing"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('73')).' '.TimeAgo::ago($crTime , date('Y-m-d H:i:s'));?></div></div></td>
            <td class="see_post_details"><div class="flex_ tabing_non_justify"><div class="tim flex_ tabing"><?php echo filter_var($sProductPrice, FILTER_SANITIZE_STRING).$currencys[$defaultCurrency];?></div></div></td>
            <td class="see_post_details">
                <div class="flex_ tabing_non_justify">
                    <div class="i_sub_not_check_box type_news <?php echo $p__style;?>" style="position:relative;">
                        <?php echo filter_var($LANG[$sProductType], FILTER_SANITIZE_STRING);?>
                    </div>
                </div>
            </td>
            <td class="see_post_details"><div class="flex_ tabing_non_justify"><div class="tim flex_ tabing"><?php echo filter_var($iN->iN_TotalProductSell($sProductID), FILTER_SANITIZE_STRING);?></div></div></td>
            <td class="flex_ tabing_non_justify">
                <div class="flex_ tabing_non_justify"> 
                    <div class="delu del_ProdPopUP border_one transition tabing flex_ delete" id="<?php echo filter_var($sProductID, FILTER_SANITIZE_STRING);?>"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('28')).$LANG['delete'];?></div> 
                </div>
            </td>
        </tr>
        <?php }?>
        </table>
            </div>
        <?php }else{echo '<div class="no_creator_f_wrap flex_ tabing"><div class="no_c_icon">'.$iN->iN_SelectedMenuIcon('54').'</div><div class="n_c_t">'.$LANG['no_user_found'].'</div></div>';}?>
             
        </div>
        <!---->
    <div class="i_become_creator_box_footer tabing">
        
        <?php if (ceil($totalProduct / $paginationLimit) >= 1): ?>
            <ul class="pagination">
                <?php if ($pagep > 1): ?>
                <li class="prev"><a class="transition" href="<?php echo filter_var($base_url, FILTER_VALIDATE_URL);?>admin/manage_users?page-id=<?php echo filter_var($pagep, FILTER_SANITIZE_STRING)-1;?>&sr=<?php echo filter_var($searchUser, FILTER_SANITIZE_STRING);?>"><?php echo filter_var($LANG['preview_page'], FILTER_SANITIZE_STRING);?></a></li>
                <?php endif; ?>

                <?php if ($pagep > 3): ?>
                <li class="start"><a class="transition" href="<?php echo filter_var($base_url, FILTER_VALIDATE_URL);?>admin/manage_users?page-id=1&sr=<?php echo filter_var($searchUser, FILTER_SANITIZE_STRING);?>">1</a></li>
                <li class="dots">...</li>
                <?php endif; ?>

                <?php if ($pagep-2 > 0): ?><li class="page"><a class="transition" href="<?php echo filter_var($base_url, FILTER_VALIDATE_URL);?>admin/manage_users?page-id=<?php echo filter_var($pagep, FILTER_SANITIZE_STRING)-2; ?>&sr=<?php echo filter_var($searchUser, FILTER_SANITIZE_STRING);?>"><?php echo filter_var($pagep, FILTER_SANITIZE_STRING)-2; ?></a></li><?php endif; ?>
                <?php if ($pagep-1 > 0): ?><li class="page"><a href="<?php echo filter_var($base_url, FILTER_VALIDATE_URL);?>admin/manage_users?page-id=<?php echo filter_var($pagep, FILTER_SANITIZE_STRING)-1; ?>&sr=<?php echo filter_var($searchUser, FILTER_SANITIZE_STRING);?>"><?php echo filter_var($pagep, FILTER_SANITIZE_STRING)-1; ?></a></li><?php endif; ?>

                <li class="currentpage active"><a  class="transition" href="<?php echo filter_var($base_url, FILTER_VALIDATE_URL);?>admin/manage_users?page-id=<?php echo filter_var($pagep, FILTER_SANITIZE_STRING);?>&sr=<?php echo filter_var($searchUser, FILTER_SANITIZE_STRING);?>"><?php echo filter_var($pagep, FILTER_SANITIZE_STRING); ?></a></li>

                <?php if ($pagep+1 < ceil($totalProduct / $paginationLimit)+1): ?><li class="page"><a class="transition" href="<?php echo filter_var($base_url, FILTER_VALIDATE_URL);?>admin/manage_users?page-id=<?php echo filter_var($pagep, FILTER_SANITIZE_STRING)+1; ?>&sr=<?php echo filter_var($searchUser, FILTER_SANITIZE_STRING);?>"><?php echo filter_var($pagep, FILTER_SANITIZE_STRING)+1; ?></a></li><?php endif; ?>
                <?php if ($pagep+2 < ceil($totalProduct / $paginationLimit)+1): ?><li class="page"><a class="transition" href="<?php echo filter_var($base_url, FILTER_VALIDATE_URL);?>admin/manage_users?page-id=<?php echo filter_var($pagep, FILTER_SANITIZE_STRING)+2; ?>&sr=<?php echo filter_var($searchUser, FILTER_SANITIZE_STRING);?>"><?php echo filter_var($pagep, FILTER_SANITIZE_STRING)+2; ?></a></li><?php endif; ?>

                <?php if ($pagep < ceil($totalProduct / $paginationLimit)-2): ?>
                <li class="dots">...</li>
                <li class="end"><a class="transition" href="<?php echo filter_var($base_url, FILTER_VALIDATE_URL);?>admin/manage_users?page-id=<?php echo ceil($totalProduct / $paginationLimit); ?>&sr=<?php echo filter_var($searchUser, FILTER_SANITIZE_STRING);?>"><?php echo ceil($totalProduct / $paginationLimit); ?></a></li>
                <?php endif; ?>

                <?php if ($pagep < ceil($totalProduct / $paginationLimit)): ?>
                <li class="next"><a class="transition" href="<?php echo filter_var($base_url, FILTER_VALIDATE_URL);?>admin/manage_users?page-id=<?php echo filter_var($pagep, FILTER_SANITIZE_STRING)+1; ?>&sr=<?php echo filter_var($searchUser, FILTER_SANITIZE_STRING);?>"><?php echo filter_var($LANG['next_page'], FILTER_SANITIZE_STRING);?></a></li>
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
    $(document).on("click", ".search_vl", function() {
         var value = $("#srcMe").val();
         var data = '<?php echo $base_url;?>' +'admin/manage_products?page-id=1'+'&sr='+value;
         window.location = data;
    }); 
})(jQuery);    
</script>