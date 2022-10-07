<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo filter_var($siteTitle, FILTER_SANITIZE_STRING);?></title>
    <?php 
       include("header/meta.php");
       include("header/css.php");
       include("header/javascripts.php");
    ?>
</head>
<?php 
if($pageCategory == 'all'){
    $pageIcon = $iN->iN_SelectedMenuIcon('158');
}else if($pageCategory == 'bookazoom'){
    $pageIcon = $iN->iN_SelectedMenuIcon('160');
}else if($pageCategory == 'digitaldownload'){
    $pageIcon = $iN->iN_SelectedMenuIcon('161');
}else if($pageCategory == 'liveeventticket'){
    $pageIcon = $iN->iN_SelectedMenuIcon('162');
}else if($pageCategory == 'artcommission'){
    $pageIcon = $iN->iN_SelectedMenuIcon('163');
}else if($pageCategory == 'joininstagramclosefriends'){
    $pageIcon = $iN->iN_SelectedMenuIcon('164');
}
?>
<body>
<?php if($logedIn == 0){ include('login_form.php'); }?>
<?php include("header/header.php");?> 
    <div class="wrapper shop_menu_wrapper">  
        <!--Market Left Menu-->
         <div class="shopping_left_menu">
             <!---->
             <div class="settings_mobile_ope_menu">
                <div class="settings_mobile_menu_container transition flex_ tabing"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('100')).filter_var($LANG['shop_categories'], FILTER_SANITIZE_STRING);?></div>
             </div> 
             <!---->
             <div class="i_shopping_menu_wrapper">
                 <div class="i_shop_title"><?php echo filter_var($LANG['shop_categories'], FILTER_SANITIZE_STRING);?></div>
                    <div class="i_sh_menus"> 
                        <div class="i_sh_menu_wrapper">
                            <a href="<?php echo filter_var($base_url, FILTER_SANITIZE_STRING);?>marketplace?cat=all">
                                <div class="i_sp_menu_box transition <?php echo filter_var($pageCategory, FILTER_SANITIZE_STRING) == 'all' ? "active_p" : ""; ?>">
                                    <?php echo html_entity_decode($iN->iN_SelectedMenuIcon('158'));?> <?php echo filter_var($LANG['all_products'], FILTER_SANITIZE_STRING);?>
                                </div>
                            </a>
                            <a href="<?php echo filter_var($base_url, FILTER_SANITIZE_STRING);?>marketplace?cat=bookazoom">
                                <div class="i_sp_menu_box transition <?php echo filter_var($pageCategory, FILTER_SANITIZE_STRING) == 'bookazoom' ? "active_p" : ""; ?>">
                                    <?php echo html_entity_decode($iN->iN_SelectedMenuIcon('160'));?> <?php echo filter_var($LANG['bookazoom'], FILTER_SANITIZE_STRING);?>
                                </div>
                            </a>
                            <a href="<?php echo filter_var($base_url, FILTER_SANITIZE_STRING);?>marketplace?cat=digitaldownload">
                                <div class="i_sp_menu_box transition <?php echo filter_var($pageCategory, FILTER_SANITIZE_STRING) == 'digitaldownload' ? "active_p" : ""; ?>">
                                    <?php echo html_entity_decode($iN->iN_SelectedMenuIcon('161'));?> <?php echo filter_var($LANG['digitaldownload'], FILTER_SANITIZE_STRING);?>
                                </div>
                            </a>
                            <a href="<?php echo filter_var($base_url, FILTER_SANITIZE_STRING);?>marketplace?cat=liveeventticket">
                                <div class="i_sp_menu_box transition <?php echo filter_var($pageCategory, FILTER_SANITIZE_STRING) == 'liveeventticket' ? "active_p" : ""; ?>">
                                    <?php echo html_entity_decode($iN->iN_SelectedMenuIcon('162'));?> <?php echo filter_var($LANG['liveeventticket'], FILTER_SANITIZE_STRING);?>
                                </div>
                            </a>
                            <a href="<?php echo filter_var($base_url, FILTER_SANITIZE_STRING);?>marketplace?cat=artcommission">
                                <div class="i_sp_menu_box transition <?php echo filter_var($pageCategory, FILTER_SANITIZE_STRING) == 'artcommission' ? "active_p" : ""; ?>">
                                    <?php echo html_entity_decode($iN->iN_SelectedMenuIcon('163'));?> <?php echo filter_var($LANG['artcommission'], FILTER_SANITIZE_STRING);?>
                                </div>
                            </a>
                            <a href="<?php echo filter_var($base_url, FILTER_SANITIZE_STRING);?>marketplace?cat=joininstagramclosefriends">
                                <div class="i_sp_menu_box transition <?php echo filter_var($pageCategory, FILTER_SANITIZE_STRING) == 'joininstagramclosefriends' ? "active_p" : ""; ?>">
                                    <?php echo html_entity_decode($iN->iN_SelectedMenuIcon('164'));?> <?php echo filter_var($LANG['joininstagramclosefriends'], FILTER_SANITIZE_STRING);?>
                                </div>
                            </a>
                        </div>
                    </div>
             </div>
         </div> 
        <!--/Market Left Menu--> 
        <!--Shopping Container-->
        <div class="shop_main_wrapper">
            <div class="product_category_title flex_ tabing_non_justify"><?php echo html_entity_decode($pageIcon); if($pageCategory == 'all'){echo filter_var($LANG['all_products'], FILTER_SANITIZE_STRING);}else{echo filter_var($LANG[$pageCategory], FILTER_SANITIZE_STRING);}?></div>
            <div class="shop_main_wrapper_container">
                <div class="ishopping_wrapper_in flex_ tabing" id="moreType">
                    <?php 
                    $lastPostID = isset($_POST['last']) ? $_POST['last'] : '';
                    $categoryData = '';
                    if($pageCategory != 'all'){
                        $categoryData = $pageCategory; 
                    }
                    $productData = $iN->iN_AllUserProductPosts($categoryData, $lastPostID, $showingNumberOfPost);
                    if($productData){
                        foreach($productData as $oprod){
                            $sProductID = $oprod['pr_id'];
                            $sProductName = $oprod['pr_name'];
                            $sProductPrice = $oprod['pr_price'];
                            $sProductFiles = $oprod['pr_files'];  
                            $sProductOwnerID = $oprod['iuid_fk']; 
                            $sProductSlug = $oprod['pr_name_slug'];
                            $sProductType = $oprod['product_type'];
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
                    ?>
                    <div class="s_p_product_container mor" data-last="<?php echo filter_var($sProductID, FILTER_SANITIZE_STRING);?>" style="display:inline-block;" id="<?php echo filter_var($sProductID, FILTER_SANITIZE_STRING);?>">
                        <a href="<?php echo $sSlugUrl;?>">
                            <div class="s_p_product_wrapper">
                                <div class="product_image flex_ tabing"><img class="timp" src="<?php echo $sproductDataImage;?>"></div>
                                <div class="s_p_details">
                                    <div class="s_p_title" title="<?php echo filter_var($sProductName, FILTER_SANITIZE_STRING);?>"><?php echo filter_var($sProductName, FILTER_SANITIZE_STRING);?></div>
                                    <div class="s_p_product_type <?php echo $p__style;?>"><?php echo filter_var($LANG[$sProductType], FILTER_SANITIZE_STRING);?></div>
                                    <div class="s_p_price"><?php echo $currencys[$defaultCurrency].$sProductPrice;?></div>
                                </div>
                            </div>  
                        </a>
                    </div> 
                    <?php }
                    }?>
                </div>
            </div>
        </div>
        <!--/Shopping Container-->
    </div> 
<script type="text/javascript">
(function($) {
    "use strict";

    var preLoadingAnimation = '<div class="i_loading" style="margin-bottom:20px"><div class="dot-pulse"></div></div>';
    var plreLoadingAnimationPlus = '<div class="loaderWrapper"><div class="loaderContainer"><div class="loader">' + preLoadingAnimation + '</div></div></div>';
    var scrollLoad = true;
    $(document).on('touchmove', showMoreProduct); /*For mobile*/
    $(window).on('scroll', showMoreProduct);
    //showMoreData(); 
    function showMoreProduct() {
        if (scrollLoad && $(window).scrollTop() >= $(document).height() - $(window).height() - 500) {
            var moreType = '<?php echo filter_var($categoryData, FILTER_SANITIZE_STRING);?>';
            var profileUserID = '';
            var ID = $('#moreType').children('.mor').last().attr('data-last'); 
            if ($('.i_loading , .nomore , .nmr , .no_creator_f_wrap').length === 0 && !$(".i_loading , .nomore , .nmr , .no_creator_f_wrap")[0] && moreType != undefined) {
                var data = 'f=mrProduct' + '&last=' + ID + '&ty=' + moreType;
                $.ajax({
                    type: "POST",
                    url: siteurl + 'requests/request.php',
                    data: data,
                    cache: false,
                    beforeSend: function() {
                        $(".body_" + ID).after(preLoadingAnimation);
                        scrollLoad = false;
                    },
                    success: function(response) {
                        if (response && !$(".nomore")[0]) {
                            $("#moreType").append(response);
                            scrollLoad = true;
                        } else {
                            /*scrollLoad = false;*/
                        }
                        setTimeout(() => {
                            $(".i_loading").remove();
                        }, 1000);
                    }
                });
            } else {
                /*scrollLoad = false;*/
            }
        }
    }
    $(document).on("click", ".settings_mobile_menu_container", function() {
        if (!$(".settingsMenuDisplay")[0]) {
            $(".i_shopping_menu_wrapper").addClass("settingsMenuDisplay");
        } else {
            $(".i_shopping_menu_wrapper").removeClass("settingsMenuDisplay");
        }
    });
})(jQuery);
</script>
</body>
</html>