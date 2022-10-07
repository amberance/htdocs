<?php 
$totalProduct = $iN->iN_UserTotalProducts($userID);  
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
?>
<?php 
    if(isset($_GET['editProduct']) && $_GET['editProduct'] != '' && !empty($_GET['editProduct'])){
       $editProductID = mysqli_real_escape_string($db, $_GET['editProduct']);
       $checkProctExist = $iN->iN_CheckProductIDExist($userID, $editProductID);
       if($checkProctExist){ 
          include_once("editProduct.php");
       }else{
         header("Location: ".$base_url."settings?tab=myProducts");
       }
    }else{?> 
<div class="settings_main_wrapper"> 
  <div class="i_settings_wrapper_in" style="display:inline-table;">
     <div class="i_settings_wrapper_title">
       <div class="i_settings_wrapper_title_txt flex_"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('158'));?><?php echo filter_var($LANG['myProducts'], FILTER_SANITIZE_STRING);?></div> 
       <div class="i_moda_header_nt"><?php echo filter_var($LANG['all_products_you_create'], FILTER_SANITIZE_STRING);?></div>
    </div> 
    <div class="i_settings_wrapper_items"> 
       <div class="i_tab_container">   
           <!--PAYMENTS TABLE HEADER-->
           <div class="i_tab_header flex_">
               <div class="tab_item" style="max-width:50px;"><?php echo filter_var($LANG['id'], FILTER_SANITIZE_STRING);?></div>
               <div class="tab_item"><?php echo filter_var($LANG['product_name'], FILTER_SANITIZE_STRING);?></div>
               <div class="tab_item item_mobile"><?php echo filter_var($LANG['product_image'], FILTER_SANITIZE_STRING);?></div>
               <div class="tab_item item_mobile"><?php echo filter_var($LANG['number_of_sales'], FILTER_SANITIZE_STRING);?></div>
               <div class="tab_item"><?php echo filter_var($LANG['product_views'], FILTER_SANITIZE_STRING);?></div> 
               <div class="tab_item item_mobile"><?php echo filter_var($LANG['amount'], FILTER_SANITIZE_STRING);?></div> 
               <div class="tab_item item_mobile"><?php echo filter_var($LANG['status'], FILTER_SANITIZE_STRING);?></div> 
               <div class="tab_item item_mobile"><?php echo filter_var($LANG['action'], FILTER_SANITIZE_STRING);?></div> 
           </div>
           <!--/PAYMENTS TABLE HEADER-->
           <!---->
           <div class="i_tab_list_item_container">
            <?php 
               $ownProducts = $iN->iN_ProductLists($userID, $paginationLimit, $pagep);
               if($ownProducts){ 
                  foreach($ownProducts as $prData){ 
                      $productID = $prData['pr_id'];
                      $productName = $prData['pr_name'];
                      $productFiles = $prData['pr_files'];
                      $productCreatedTime = $prData['pr_created_time'];
                      $productStatus = $prData['pr_status'];
                      $productSeenTime = $prData['pr_seen_time'];
                      $productSellTime = $prData['pr_number_of_sales'];
                      $productSlugUrl = $prData['pr_name_slug'];
                      $productPrice = $prData['pr_price'];
                      $productType = $prData['product_type'];
                      $p__style = $productType;
                        if($productType == 'scratch'){
                            $productType = 'simple_product';
                            $p__style = 'scratch';
                        }
                      $editProduct = $base_url.'settings?tab=myProducts&editProduct='.$productID;
            ?>
                <!--ITEM-->
                <div class="i_tab_list_item flex_">
                    <div class="tab_detail_item" style="max-width:50px;"><?php echo filter_var($productID, FILTER_SANITIZE_STRING);?></div>
                    <div class="tab_detail_item truncated"> 
                        <a href="<?php echo filter_var($base_url.'product/'.$productSlugUrl, FILTER_VALIDATE_URL).'_'.$productID;?>"> 
                            <div class="flex_ truncated"><?php echo filter_var($productName, FILTER_SANITIZE_STRING);?></div>  
                        </a>
                    </div>
                    <div class="tab_detail_item item_mobile pr_im" style="text-align:left;">
                        <?php 
                        $trimValue = rtrim($productFiles, ',');
                        $explodeFiles = explode(',', $trimValue);
                        $explodeFiles = array_unique($explodeFiles); 
                        foreach ($explodeFiles as $explodeProductFile) {
                            $productFileData = $iN->iN_GetUploadedFileDetails($explodeProductFile);
                            if ($productFileData) {
                                $productUploadID = $productFileData['upload_id'];
                                $productfileExtension = $productFileData['uploaded_file_ext'];
                                $productfilePath = $productFileData['uploaded_file_path'];
                                $productTumbnailfilePath = $productFileData['upload_tumbnail_file_path'];
                                if ($s3Status == 1) {
                                    $productImageUrl = 'https://' . $s3Bucket . '.s3.' . $s3Region . '.amazonaws.com/' . $productTumbnailfilePath; 
                                } else if ($digitalOceanStatus == '1') {
                                    $productImageUrl = 'https://' . $oceanspace_name . '.' . $oceanregion . '.digitaloceanspaces.com/' . $productTumbnailfilePath; 
                                } else {
                                    $productImageUrl = $base_url . $productTumbnailfilePath; 
                                }
                        ?>
                        <img src="<?php echo $productImageUrl;?>"> 
                        <?php } } ?>                      
                    </div>
                    <div class="tab_detail_item item_mobile"><?php echo filter_var($iN->iN_TotalProductSell($productID), FILTER_SANITIZE_STRING);?></div>
                    <div class="tab_detail_item item_mobile"><?php echo filter_var($iN->iN_TotalProductSeen($productID), FILTER_SANITIZE_STRING);?></div>
                    <div class="tab_detail_item item_mobile"><?php echo filter_var($currencys[$defaultCurrency].$productPrice, FILTER_SANITIZE_STRING);?></div>
                    <div class="tab_detail_item item_mobile" id="pr_s_<?php echo filter_var($productID, FILTER_SANITIZE_STRING);?>">
                        <div class="i_sub_not_check_box type_news <?php echo $p__style;?>" style="position:relative;">
                            <?php echo filter_var($LANG[$productType], FILTER_SANITIZE_STRING);?>
                        </div>
                        <div class="i_sub_not_check_box" style="position:relative;">
                            <label class="el-switch el-switch-yellow">
                                <input type="checkbox" name="pr_<?php echo filter_var($productID, FILTER_SANITIZE_STRING);?>" class="chmdProd" id="pr_i_<?php echo filter_var($productID, FILTER_SANITIZE_STRING);?>" data-id="<?php echo filter_var($productID, FILTER_SANITIZE_STRING);?>" <?php echo filter_var($productStatus, FILTER_SANITIZE_STRING) == '1' ? 'value="0" checked="checked"' : 'value="1"';?>>
                                <span class="el-switch-style"></span> 
                            </label> 
                        </div>
                    </div>
                    <div class="tab_detail_item item_mobile">
                        <!---->
                        <div class="tabing_non_justify"> 
                            <div class="delprod border_one transition tabing flex_" style="margin-bottom:3px;" id="<?php echo filter_var($productID, FILTER_SANITIZE_STRING);?>"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('28')).$LANG['delete'];?></div>
                            <div class="edtprod border_one transition tabing flex_" id="<?php echo filter_var($productID, FILTER_SANITIZE_STRING);?>"><a class="tabing flex_" href="<?php echo filter_var($editProduct, FILTER_VALIDATE_URL);?>"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('27')).$LANG['edit_user_infos'];?></a></div> 
                        </div>
                        <!---->
                    </div> 
               </div>
               <!--/ITEM-->
            <?php }
               }else {
                       echo '<div class="no_creator_f_wrap flex_ tabing"><div class="no_c_icon">'.html_entity_decode($iN->iN_SelectedMenuIcon('54')).'</div><div class="n_c_t">'.$LANG['nothing_to_show_about_product'].'</div></div>';
               }
            ?>  
           </div>
           <!---->
        </div>
    </div>
     <div class="i_become_creator_box_footer tabing">
        <?php if (ceil($totalProduct / $paginationLimit) > 1): ?>
            <ul class="pagination">
                <?php if ($pagep > 1): ?>
                <li class="prev"><a class="transition" href="<?php echo filter_var($base_url, FILTER_VALIDATE_URL);?>settings?tab=myProducts&page-id=<?php echo filter_var($pagep, FILTER_SANITIZE_STRING)-1 ?>"><?php echo filter_var($LANG['preview_page'], FILTER_SANITIZE_STRING);?></a></li>
                <?php endif; ?>

                <?php if ($pagep > 3): ?>
                <li class="start"><a class="transition" href="<?php echo filter_var($base_url, FILTER_VALIDATE_URL);?>settings?tab=myProducts&page-id=1">1</a></li>
                <li class="dots">...</li>
                <?php endif; ?>

                <?php if ($pagep-2 > 0): ?><li class="page"><a class="transition" href="<?php echo filter_var($base_url, FILTER_VALIDATE_URL);?>settings?tab=myProducts&page-id=<?php echo filter_var($pagep, FILTER_SANITIZE_STRING)-2; ?>"><?php echo filter_var($pagep, FILTER_SANITIZE_STRING)-2; ?></a></li><?php endif; ?>
                <?php if ($pagep-1 > 0): ?><li class="page"><a href="<?php echo filter_var($base_url, FILTER_VALIDATE_URL);?>settings?tab=myProducts&page-id=<?php echo filter_var($pagep, FILTER_SANITIZE_STRING)-1; ?>"><?php echo filter_var($pagep, FILTER_SANITIZE_STRING)-1; ?></a></li><?php endif; ?>

                <li class="currentpage active"><a  class="transition" href="<?php echo filter_var($base_url, FILTER_VALIDATE_URL);?>settings?tab=myProducts&page-id=<?php echo filter_var($pagep, FILTER_SANITIZE_STRING); ?>"><?php echo filter_var($pagep, FILTER_SANITIZE_STRING); ?></a></li>

                <?php if ($pagep+1 < ceil($totalProduct / $paginationLimit)+1): ?><li class="page"><a class="transition" href="<?php echo filter_var($base_url, FILTER_VALIDATE_URL);?>settings?tab=myProducts&page-id=<?php echo filter_var($pagep, FILTER_SANITIZE_STRING)+1; ?>"><?php echo filter_var($pagep, FILTER_SANITIZE_STRING)+1; ?></a></li><?php endif; ?>
                <?php if ($pagep+2 < ceil($totalProduct / $paginationLimit)+1): ?><li class="page"><a class="transition" href="<?php echo filter_var($base_url, FILTER_VALIDATE_URL);?>settings?tab=myProducts&page-id=<?php echo filter_var($pagep, FILTER_SANITIZE_STRING)+2; ?>"><?php echo filter_var($pagep, FILTER_SANITIZE_STRING)+2; ?></a></li><?php endif; ?>

                <?php if ($pagep < ceil($totalProduct / $paginationLimit)-2): ?>
                <li class="dots">...</li>
                <li class="end"><a class="transition" href="<?php echo filter_var($base_url, FILTER_VALIDATE_URL);?>settings?tab=myProducts&page-id=<?php echo ceil($totalProduct / $paginationLimit); ?>"><?php echo ceil($totalProduct / $paginationLimit); ?></a></li>
                <?php endif; ?>

                <?php if ($pagep < ceil($totalProduct / $paginationLimit)): ?>
                <li class="next"><a class="transition" href="<?php echo filter_var($base_url, FILTER_VALIDATE_URL);?>settings?tab=myProducts&page-id=<?php echo filter_var($pagep, FILTER_SANITIZE_STRING)+1; ?>"><?php echo filter_var($LANG['next_page'], FILTER_SANITIZE_STRING);?></a></li>
                <?php endif; ?>
            </ul>
        <?php endif; ?>    
     </div> 
  </div> 
</div> 
<script type="text/javascript">
(function($) {
    "use strict";    
    var preLoadingAnimation = '<div class="i_loading" style="margin-bottom:20px"><div class="dot-pulse"></div></div>';
    var plreLoadingAnimationPlus = '<div class="loaderWrapper"><div class="loaderContainer"><div class="loader">' + preLoadingAnimation + '</div></div></div>';
    
/*Change Module Statuses*/
$(document).on("change", ".chmdProd", function() {
    var type = 'productStatus';
    var value = $(this).val();
    var prID = $(this).attr("data-id");
    var data = 'f=' + type + '&mod=' + value + '&id='+prID;
    $.ajax({
        type: 'POST',
        url: siteurl + 'requests/request.php',
        data: data,
        beforeSend: function() {
            $("#pr_s_"+prID).append(plreLoadingAnimationPlus);
        },
        success: function(response) {
            if (response == '200') {
                if (value == '1') {
                    $("#pr_i_"+prID).val('0');
                } else {
                    $("#pr_i_"+prID).val('1');
                } 
            } else if (response == '404') {
                $(".warning_").show();
            } 
            $(".loaderWrapper").remove();
             
        }
    });
});  
/*Follow Profile PopUp Call*/
$(document).on("click", ".delprod", function() {
    var type = 'delete_product';
    var ID = $(this).attr("id");
    var data = 'f=' + type + '&id=' + ID;
    $.ajax({
        type: "POST",
        url: siteurl + 'requests/request.php',
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
<?php }?>