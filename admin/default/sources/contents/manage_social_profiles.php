<?php   
$totalSocial = $iN->iN_TotalSocialNetworks();
$totalPages = ceil($totalSocial / $paginationLimit); 
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
          <?php echo filter_var($LANG['manage_social_profiles'], FILTER_SANITIZE_STRING);?>
        </div>
        <!----> 
        <!---->
        <div class="i_general_row_box column flex_" id="general_conf" style="padding-top:30px;">  
            <div class="new_svg_icon_wrapper" style="margin-bottom:15px;">
            <div style="display: inline-block;" class="newpa newstick">
                <div class="flex_ tabing_non_justify newSvgCode newCreate border_one" data-type="newSocialSite"> 
                    <?php echo html_entity_decode($iN->iN_SelectedMenuIcon('126'));?><?php echo filter_var($LANG['add_new_social_site'], FILTER_SANITIZE_STRING);?> 
                </div>
            </div>
        </div>
        <div class="warning_"><?php echo filter_var($LANG['noway_desc'], FILTER_SANITIZE_STRING);?></div>
        <?php 
        $allSocials = $iN->iN_AllSocialNetworkList($userID, $paginationLimit, $pagep);
        if($allSocials){ 
        ?> 
        <div style="overflow-x:auto;">
            <table class="border_one">
                <tr>
                    <th><?php echo filter_var($LANG['id'], FILTER_SANITIZE_STRING);?></th> 
                    <th><?php echo filter_var($LANG['s_icon'], FILTER_SANITIZE_STRING);?></th>  
                    <th><?php echo filter_var($LANG['social_link_ex'], FILTER_SANITIZE_STRING);?></th>
                    <th><?php echo filter_var($LANG['skey'], FILTER_SANITIZE_STRING);?></th>   
                    <th><?php echo filter_var($LANG['status'], FILTER_SANITIZE_STRING);?></th>   
                    <th><?php echo filter_var($LANG['action'], FILTER_SANITIZE_STRING);?></th>   
                </tr>
        <?php 
        foreach($allSocials as $sData){
            $socialID = $sData['id'];
            $socialKey = $sData['skey'];
            $socialLink = $sData['place_holder'];
            $socialStatus = $sData['status'];
            $socialIcon = $sData['social_icon'];
            
        ?>
        <tr class="transition trhover">
            <td><?php echo filter_var($socialID, FILTER_SANITIZE_STRING);?></td> 
            <td class="see_post_details"><div class="site_svg_icon flex_ tabing"><?php echo html_entity_decode($socialIcon);?></div></td> 
            <td class="see_post_details"><div class="flex_ tabing_non_justify sim truncated"><?php echo filter_var($socialLink, FILTER_SANITIZE_STRING);?></div></td>  
            <td class="see_post_details"><div class="flex_ tabing_non_justify sim truncated"><?php echo filter_var($socialKey, FILTER_SANITIZE_STRING);?></div></td> 
            <td class="see_post_details">
               <div class="flex_ tabing_non_justify">
               <label class="el-switch el-switch-yellow" for="upSocial<?php echo filter_var($socialID, FILTER_SANITIZE_STRING);?>">
                   <input type="checkbox" name="stickerStatus" class="upSocial" id="upSocial<?php echo filter_var($socialID, FILTER_SANITIZE_STRING);?>" data-id="<?php echo filter_var($socialID, FILTER_SANITIZE_STRING);?>" data-type="upSocial" <?php echo filter_var($socialStatus, FILTER_SANITIZE_STRING) == 'yes' ? 'value="no" checked="checked"' : 'value="yes"';?>>
                   <span class="el-switch-style"></span>  
                </label>
               <div class="success_tick tabing flex_ sec_one upSocial<?php echo filter_var($socialID, FILTER_SANITIZE_STRING);?>"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('69'));?></div>
               </div>
            </td>
            <td class="flex_ tabing_non_justify">
                <div class="flex_ tabing_non_justify"> 
                    <div class="delu newCreate border_one transition tabing flex_" data-type="deleteSocialSite" id="<?php echo filter_var($socialID, FILTER_SANITIZE_STRING);?>"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('28')).$LANG['delete'];?></div>  
                    <div class="seePost c2 border_one transition tabing flex_ newCreate" data-type="editSocialLink" id="<?php echo filter_var($socialID, FILTER_SANITIZE_STRING);?>"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('27')).$LANG['edit_user_infos'];?></div>
                </div>
            </td> 
        </tr>
        <?php }?>
        </table>
            </div>
        <?php }else{echo '<div class="no_creator_f_wrap flex_ tabing"><div class="no_c_icon">'.html_entity_decode($iN->iN_SelectedMenuIcon('54')).'</div><div class="n_c_t">'.$LANG['no_user_found'].'</div></div>';}?>
             
        </div>
        <!---->
    <div class="i_become_creator_box_footer tabing">
        <?php if (ceil($totalSocial / $paginationLimit) > 1): ?>
            <ul class="pagination">
                <?php if ($pagep > 1): ?>
                <li class="prev"><a class="transition" href="<?php echo filter_var($base_url, FILTER_VALIDATE_URL);?>admin/manage_social_profiles?page-id=<?php echo filter_var($pagep, FILTER_SANITIZE_STRING)-1 ?>"><?php echo filter_var($LANG['preview_page'], FILTER_SANITIZE_STRING);?></a></li>
                <?php endif; ?>

                <?php if ($pagep > 3): ?>
                <li class="start"><a class="transition" href="<?php echo filter_var($base_url, FILTER_VALIDATE_URL);?>admin/manage_social_profiles?page-id=1">1</a></li>
                <li class="dots">...</li>
                <?php endif; ?>

                <?php if ($pagep-2 > 0): ?><li class="page"><a class="transition" href="<?php echo filter_var($base_url, FILTER_VALIDATE_URL);?>admin/manage_social_profiles?page-id=<?php echo filter_var($pagep, FILTER_SANITIZE_STRING)-2; ?>"><?php echo filter_var($pagep, FILTER_SANITIZE_STRING)-2; ?></a></li><?php endif; ?>
                <?php if ($pagep-1 > 0): ?><li class="page"><a href="<?php echo filter_var($base_url, FILTER_VALIDATE_URL);?>admin/manage_social_profiles?page-id=<?php echo filter_var($pagep, FILTER_SANITIZE_STRING)-1; ?>"><?php echo filter_var($pagep, FILTER_SANITIZE_STRING)-1; ?></a></li><?php endif; ?>

                <li class="currentpage active"><a  class="transition" href="<?php echo filter_var($base_url, FILTER_VALIDATE_URL);?>admin/manage_social_profiles?page-id=<?php echo filter_var($pagep, FILTER_SANITIZE_STRING); ?>"><?php echo filter_var($pagep, FILTER_SANITIZE_STRING); ?></a></li>

                <?php if ($pagep+1 < ceil($totalSocial / $paginationLimit)+1): ?><li class="page"><a class="transition" href="<?php echo filter_var($base_url, FILTER_VALIDATE_URL);?>admin/manage_social_profiles?page-id=<?php echo filter_var($pagep, FILTER_SANITIZE_STRING)+1; ?>"><?php echo filter_var($pagep, FILTER_SANITIZE_STRING)+1; ?></a></li><?php endif; ?>
                <?php if ($pagep+2 < ceil($totalSocial / $paginationLimit)+1): ?><li class="page"><a class="transition" href="<?php echo filter_var($base_url, FILTER_VALIDATE_URL);?>admin/manage_social_profiles?page-id=<?php echo filter_var($pagep, FILTER_SANITIZE_STRING)+2; ?>"><?php echo filter_var($pagep, FILTER_SANITIZE_STRING)+2; ?></a></li><?php endif; ?>

                <?php if ($pagep < ceil($totalSocial / $paginationLimit)-2): ?>
                <li class="dots">...</li>
                <li class="end"><a class="transition" href="<?php echo filter_var($base_url, FILTER_VALIDATE_URL);?>admin/manage_social_profiles?page-id=<?php echo ceil($totalSocial / $paginationLimit); ?>"><?php echo ceil($totalSocial / $paginationLimit); ?></a></li>
                <?php endif; ?>

                <?php if ($pagep < ceil($totalSocial / $paginationLimit)): ?>
                <li class="next"><a class="transition" href="<?php echo filter_var($base_url, FILTER_VALIDATE_URL);?>admin/manage_social_profiles?page-id=<?php echo filter_var($pagep, FILTER_SANITIZE_STRING)+1; ?>"><?php echo filter_var($LANG['next_page'], FILTER_SANITIZE_STRING);?></a></li>
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
$(document).on("change", " #id_fav", function(e) {
     
});
})(jQuery);
</script>