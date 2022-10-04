<?php 
$totalProduct = $iN->iN_UserTotalPurchasedProducts($userID);  
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
       <div class="i_settings_wrapper_title_txt flex_"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('156'));?><?php echo filter_var($LANG['myPurchasedProducts'], FILTER_SANITIZE_STRING);?></div> 
       <div class="i_moda_header_nt"><?php echo filter_var($LANG['all_products_you_sell'], FILTER_SANITIZE_STRING);?></div>
       <div class="i_moda_header_nt"><strong><?php echo filter_var($LANG['all_processing_fee_note'], FILTER_SANITIZE_STRING);?></strong></div>
    </div> 
    <div class="i_settings_wrapper_items"> 
       <div class="i_tab_container">   
           <!--PAYMENTS TABLE HEADER-->
           <div class="i_tab_header flex_">
               <div class="tab_item" style="max-width:50px;"><?php echo filter_var($LANG['id'], FILTER_SANITIZE_STRING);?></div>
               <div class="tab_item"><?php echo filter_var($LANG['buyer_name'], FILTER_SANITIZE_STRING);?></div>
               <div class="tab_item item_mobile"><?php echo filter_var($LANG['product_name'], FILTER_SANITIZE_STRING);?></div>  
               <div class="tab_item item_mobile"><?php echo filter_var($LANG['amount'], FILTER_SANITIZE_STRING);?></div> 
               <div class="tab_item item_mobile"><?php echo filter_var($LANG['payment_processing_fee'], FILTER_SANITIZE_STRING);?></div> 
               <div class="tab_item item_mobile"><?php echo filter_var($LANG['net_earning'], FILTER_SANITIZE_STRING);?></div>  
           </div>
           <!--/PAYMENTS TABLE HEADER-->
           <!---->
           <div class="i_tab_list_item_container">
            <?php 
               $ownProducts = $iN->iN_MyPurchasedProductList($userID, $paginationLimit, $pagep);
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
                      $editProduct = $base_url.'settings?tab=myProducts&editProduct='.$productID;
                      $productUserEarning = $prData['user_earning'];
                      $productAdminEarning = $prData['admin_earning'];
                      $productSalesAmount = $prData['amount'];
                      $payerUserID = $prData['payed_iuid_fk'];
                      $customerData = $iN->iN_GetUserDetails($payerUserID);
                      $customerUsername = isset($customerData['i_username']) ? $customerData['i_username'] : NULL;
                      $customerFullName = isset($customerData['i_user_fullname']) ? $customerData['i_user_fullname'] : NULL;
                      $payerUserAvatar = $iN->iN_UserAvatar($payerUserID, $base_url); 
            ?>
                <!--ITEM-->
                <div class="i_tab_list_item flex_">
                    <div class="tab_detail_item" style="max-width:50px;"><?php echo filter_var($productID, FILTER_SANITIZE_STRING);?></div>
                    <div class="tab_detail_item truncated"> 
                        <a href="<?php echo filter_var($base_url, FILTER_VALIDATE_URL).$customerUsername;?>">
                            <div class="tabing_non_justify flex_"> 
                                <div class="tab_subscriber_avatar">
                                    <img src="<?php echo filter_var($payerUserAvatar, FILTER_SANITIZE_STRING);?>">
                                </div> 
                                <div class="flex_ truncated"><?php echo filter_var($customerFullName, FILTER_SANITIZE_STRING);?></div> 
                            </div>
                        </a>                
                    </div>
                    <div class="tab_detail_item truncated"> 
                        <a href="<?php echo filter_var($base_url.'product/'.$productSlugUrl, FILTER_VALIDATE_URL).'_'.$productID;?>"> 
                            <div class="flex_ truncated"><?php echo filter_var($productName, FILTER_SANITIZE_STRING);?></div>  
                        </a>
                    </div>
                    <div class="tab_detail_item item_mobile"><?php echo filter_var($currencys[$defaultCurrency].$productSalesAmount, FILTER_SANITIZE_STRING);?></div>
                    <div class="tab_detail_item item_mobile" id="pr_s_<?php echo filter_var($productID, FILTER_SANITIZE_STRING);?>">
                        <?php echo filter_var($currencys[$defaultCurrency].$productAdminEarning, FILTER_SANITIZE_STRING);?>
                    </div> 
                    <div class="tab_detail_item item_mobile" id="pr_s_<?php echo filter_var($productID, FILTER_SANITIZE_STRING);?>">
                        <?php echo filter_var($currencys[$defaultCurrency].$productUserEarning, FILTER_SANITIZE_STRING);?>
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