<div class="product_wrapper flex_"> 
<?php
    $productData = $iN->iN_GetProductDetailsByID($GetTheProductIDFromUrl);
    if($productData){
        $uProductID = $productData['pr_id'];
        $checkProductPurchasedBefore = '';
        if($logedIn == 1){
            $checkProductPurchasedBefore = $iN->iN_CheckItemPurchasedBefore($userID, $uProductID);
        } 
        $visitorIp = $iN->iN_GetIPAddress();
        if(!empty($visitorIp) && isset($visitorIp) && $visitorIp !== ''){
            $lUserID = isset($userID) ? $userID : NULL;
            $iN->iN_InsertVisitor($visitorIp,$uProductID,$lUserID);
        }
        $uProductName = $productData['pr_name'];
        $uProductPrice = $productData['pr_price'];
        $uProductFiles = $productData['pr_files'];
        $uProductDownloadableFiles = $productData['pr_downlodable_files'];
        $uProductDescription = $productData['pr_desc'];
        $uProductDescriptionInfo = $productData['pr_desc_info'];
        $uProductTime = $productData['pr_created_time'];
        $uProductOwnerID = $productData['iuid_fk'];
        $uProductStatus = $productData['pr_status'];
        $uProductSeenTime = $productData['pr_seen_time']; 
        $uProductNumberOfSales = $productData['pr_number_of_sales'];
        $uProductSlug = $productData['pr_name_slug'];
        $uProductType = $productData['product_type'];
        $p__style = $uProductType;
        $thisProduct = $uProductType;
        if($uProductType == 'scratch'){
            $uProductType = 'simple_product';
            $p__style = 'scratch';
            $thisProduct = 'all';
        } 
        $uProductSlotsNumber = $productData['pr_slots_number'];
        $uPTime = date('Y-m-d H:i:s',$uProductTime); 
        $uSlugUrl = $base_url.'product/'.$uProductSlug.'_'.$uProductID;
        $userProdocutOwnerUsername = $productData['i_username'];
        $userPostOwnerUserFullName = $productData['i_user_fullname'];
        $userPostOwnerUserGender = $productData['user_gender']; 
        if($fullnameorusername == 'no'){
            $userPostOwnerUserFullName = $userProdocutOwnerUsername; 
         }
        $userPostOwnerUserAvatar = $iN->iN_UserAvatar($uProductOwnerID, $base_url);
        $userPostUserVerifiedStatus = $productData['user_verified_status'];
        if($userPostOwnerUserGender == 'male'){
            $publisherGender = '<div class="i_plus_g">'.$iN->iN_SelectedMenuIcon('12').'</div>';
        }else if($userPostOwnerUserGender == 'female'){
            $publisherGender = '<div class="i_plus_gf">'.$iN->iN_SelectedMenuIcon('13').'</div>';
        }else if($userPostOwnerUserGender == 'couple'){
            $publisherGender = '<div class="i_plus_g">'.$iN->iN_SelectedMenuIcon('58').'</div>';
        }
        $userVerifiedStatus = '';
        if($userPostUserVerifiedStatus == '1'){
            $userVerifiedStatus = $iN->iN_SelectedMenuIcon('11');
        }
    ?>
<div class="product_details_left">
    <div class="product_images_container">
        <!----->
        <?php 
            $trimValue = rtrim($uProductFiles, ',');
            $explodeFiles = explode(',', $trimValue);
            $explodeFiles = array_unique($explodeFiles);
            $countExplodedFiles = $iN->iN_CheckCountFile($uProductFiles); 
            foreach ($explodeFiles as $pFile) { 
                $fileData = $iN->iN_GetUploadedFileDetails($pFile);
                if($fileData){ 
                    $fileUploadID = $fileData['upload_id'];
                    $fileExtension = $fileData['uploaded_file_ext'];
                    $filePath = $fileData['uploaded_file_path'];
                    $filePathTumbnail = $fileData['upload_tumbnail_file_path'];
                    if($fileExtension == 'mp4'){
                        if ($s3Status == 1) {
                            $tumbFile =  'https://' . $s3Bucket . '.s3.' . $s3Region . '.amazonaws.com/' . $filePathTumbnail;
                            $filePathUrl = 'https://' . $s3Bucket . '.s3.' . $s3Region . '.amazonaws.com/' . $filePath;
                        } else if ($digitalOceanStatus == '1') { 
                            $tumbFile =  'https://' . $oceanspace_name . '.' . $oceanregion . '.digitaloceanspaces.com/' . $filePathTumbnail;
                            $filePathUrl = 'https://' . $oceanspace_name . '.' . $oceanregion . '.digitaloceanspaces.com/' . $filePath;                   
                        } else { 
                            $tumbFile =  $base_url . $filePathTumbnail;
                            $filePathUrl = $base_url . $filePath;                    
                        } 
                        echo '
                        <div style="display:none;" id="video' . $fileUploadID . '">
                            <video class="lg-video-object lg-html5 video-js vjs-default-skin" controls preload="none" onended="videoEnded()">
                                <source src="' . $filePathUrl . '" type="video/mp4">
                                Your browser does not support HTML5 video.
                            </video>
                        </div>
                        ';
                        $srcPath = 'data-poster="' . $tumbFile . '" data-html="#video' . $fileUploadID . '"';
                    }
                }
            }
        ?>
        <!----->
        <!-- Swiper -->
        <div class="swiper mySwiper">
            <div class="swiper-wrapper">
        <?php 
            $trimValue = rtrim($uProductFiles, ',');
            $explodeFiles = explode(',', $trimValue);
            $explodeFiles = array_unique($explodeFiles);
            $countExplodedFiles = $iN->iN_CheckCountFile($uProductFiles); 
            foreach ($explodeFiles as $pFile) { 
                $fileData = $iN->iN_GetUploadedFileDetails($pFile);
                if($fileData){ 
                    $fileUploadID = $fileData['upload_id'];
                    $fileExtension = $fileData['uploaded_file_ext'];
                    $filePath = $fileData['uploaded_file_path'];
                    $filePathTumbnail = $fileData['upload_tumbnail_file_path'];
                    if($fileExtension == 'mp4'){
                        if ($s3Status == 1) {
                            $tumbFile =  'https://' . $s3Bucket . '.s3.' . $s3Region . '.amazonaws.com/' . $filePathTumbnail;
                            $filePathUrl = 'https://' . $s3Bucket . '.s3.' . $s3Region . '.amazonaws.com/' . $filePath;
                        } else if ($digitalOceanStatus == '1') { 
                            $tumbFile =  'https://' . $oceanspace_name . '.' . $oceanregion . '.digitaloceanspaces.com/' . $filePathTumbnail;
                            $filePathUrl = 'https://' . $oceanspace_name . '.' . $oceanregion . '.digitaloceanspaces.com/' . $filePath;                   
                        } else { 
                            $tumbFile =  $base_url . $filePathTumbnail;
                            $filePathUrl = $base_url . $filePath;                    
                        } 
                         
                        $srcPath = 'data-poster="' . $tumbFile . '" data-html="#video' . $fileUploadID . '"';
                    }else{
                        if ($s3Status == 1) { 
                            $tumbFile =  'https://' . $s3Bucket . '.s3.' . $s3Region . '.amazonaws.com/' . $filePathTumbnail;
                            $filePathUrl = 'https://' . $s3Bucket . '.s3.' . $s3Region . '.amazonaws.com/' . $filePath;
                        } else if ($digitalOceanStatus == '1') { 
                            $tumbFile =  'https://' . $oceanspace_name . '.' . $oceanregion . '.digitaloceanspaces.com/' . $filePathTumbnail;
                            $filePathUrl = 'https://' . $oceanspace_name . '.' . $oceanregion . '.digitaloceanspaces.com/' . $filePath;                   
                        } else { 
                            $tumbFile =  $base_url . $filePathTumbnail;
                            $filePathUrl = $base_url . $filePath;                    
                        } 
                        $srcPath = 'data-src="' . $filePathUrl . '"';
                    }
        ?>   
            <div class="swiper-slide" <?php echo $srcPath;?>>
                <div class="swiper-img flex_ tabing">
                    <img class="timp" src="<?php echo $tumbFile;?>"> 
                </div>
            </div> 
        <?php }}?>
            </div>
            <div class="swiper-pagination"></div>
        </div>
        <!-- /Swiper -->
    </div>
    <script>
      var swiper = new Swiper(".mySwiper", {
        autoplay: {
          delay: 3000,
          disableOnInteraction: false,
        },
        pagination: {
          el: ".swiper-pagination",
          dynamicBullets: true,
        },
      });
    </script>
    <script type="text/javascript">
        $('.swiper-wrapper').lightGallery({
            videojs: true,
            mode: 'lg-fade',
            cssEasing : 'cubic-bezier(0.25, 0, 0.25, 1)',
            download: false,
            share: false
        });
    </script>
    <!--Product Description-->
    <div class="product_p_description">
        <div class="product__description"><?php echo filter_var($LANG['description'], FILTER_SANITIZE_STRING);?></div>
        <div class="product__d_all">
            <?php echo $urlHighlight->highlightUrls($iN->sanitize_output($iN->iN_RemoveYoutubelink($uProductDescription), $base_url));?>
        </div>
    </div>
    <!--/Product Description--> 
</div>
<div class="product_details_right">
    <div class="product_details_right_in">
        <div class="s_p_product_type <?php echo $p__style;?>"><a href="<?php echo filter_var($base_url, FILTER_SANITIZE_STRING);?>marketplace?cat=<?php echo filter_var($thisProduct, FILTER_SANITIZE_STRING);?>"><?php echo filter_var($LANG[$uProductType], FILTER_SANITIZE_STRING);?></a></div>
        <!--Product Title-->
        <h1 class="h_product_title"><?php echo filter_var($uProductName, FILTER_SANITIZE_STRING);?></h1>
        <!--Product Title-->
        <!--Product OWNER-->
        <div class="s_p_owner_cont">
            <!---->
            <div class="i_u_details flex_ transition">
                <a href="<?php echo filter_var($base_url.$userProdocutOwnerUsername, FILTER_SANITIZE_STRING);?>">
                <div class="i_user_profile_avatar">
                    <div class="iu_avatar"><img src="<?php echo filter_var($userPostOwnerUserAvatar, FILTER_VALIDATE_URL);?>" alt="<?php echo filter_var($userPostOwnerUserFullName, FILTER_SANITIZE_STRING);?>"></div>
                </div>
                <div class="i_user_nm">
                    <div class="i_unm_product flex_"><?php echo filter_var($userPostOwnerUserFullName, FILTER_SANITIZE_STRING).$userVerifiedStatus;?></div>
                    <div class="i_see_prof"><?php echo TimeAgo::ago($uPTime, date('Y-m-d H:i:s')); ?></div>
                </div>
                </a>
            </div>
            <!---->
        </div>
        <!--/Product OWNER-->
        <!---->
        <div class="s_p_price"><?php echo $currencys[$defaultCurrency].$uProductPrice;?> <span><?php echo filter_var($defaultCurrency, FILTER_SANITIZE_STRING);?></span></div>
        <!----> 
        <!--BUY PRODUCT-->
        <div class="buy_my_product">
             <div class="buy__myproduct tabing flex_ <?php if($logedIn == 0){echo 'loginForm';};?>" data-id="<?php echo filter_var($uProductID, FILTER_SANITIZE_STRING);?>"><?php echo $iN->iN_SelectedMenuIcon('155').$LANG['buy_now'];?></div>
        </div>
        <!--BUY PRODUCT-->
        <?php if($checkProductPurchasedBefore && $logedIn == 1){?>
        <!--Purchased Not-->
        <div class="s_p_p_before flex_ tabing_non_justify">
           <?php echo html_entity_decode($iN->iN_SelectedMenuIcon('60'));?> <?php echo filter_var($LANG['already_purchased_product'], FILTER_SANITIZE_STRING);?>
        </div>
        <!--/Purchased Not-->
        <?php }?>
        <!---->
        <?php if($checkProductPurchasedBefore && $logedIn == 1 && !empty($uProductDownloadableFiles)){?>
            <div class="s_p_p_p_download flex_ tabing" data-id="<?php echo filter_var($uProductID, FILTER_SANITIZE_STRING);?>">
                <a href="<?php echo $base_url;?>product/<?php echo filter_var($uProductSlug, FILTER_SANITIZE_STRING).'_'.$uProductID.'-'.$uProductID;?>">
                    <?php echo html_entity_decode($iN->iN_SelectedMenuIcon('170')).filter_var($LANG['download_your_file'], FILTER_SANITIZE_STRING);?>
                </a>
                </div> 
        <?php }?>
        <!---->
        <!---->
        <?php if($checkProductPurchasedBefore && $logedIn == 1){?>
        <div class="s_p_live_not">
            <div class="owner_not"><?php echo filter_var($LANG['sellers_note'], FILTER_SANITIZE_STRING);?></div>
            <div class="owner_not_text">
                <?php echo $urlHighlight->highlightUrls($iN->sanitize_output($iN->iN_RemoveYoutubelink($uProductDescriptionInfo), $base_url));?>
            </div>
        </div>
        <?php }?>
        <!---->
        <!---->
        <div class="s_p_s_p flex_ tabing_non_justify">
            <div class="s__p flex_ tabing"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('155'));?> <?php echo filter_var($iN->iN_TotalProductSell($uProductID).' '.$LANG['pp_sales'], FILTER_SANITIZE_STRING);?></div>
            <div class="s__p flex_ tabing"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('10'));?><?php echo filter_var($iN->iN_TotalProductSeen($uProductID), FILTER_SANITIZE_STRING);?></div>
        </div>
        <!---->
        <!---->
        <div class="s_share_on_social flex_">
            <div class="s_social flex_ tabing"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('169')).filter_var($LANG['share_on_social'], FILTER_SANITIZE_STRING);?></div>
            <div class="flex_ tabing" style="margin-left:10px;">
               <div class="on_s flex_ tabing" onclick="share('facebook', '<?php echo filter_var($uSlugUrl, FILTER_VALIDATE_URL);?>', '2')"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('90'));?></div>
               <div class="on_s flex_ tabing" onclick="share('twitter', '<?php echo filter_var($uSlugUrl, FILTER_VALIDATE_URL);?>', '2')"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('34'));?></div>
               <div class="on_s flex_ tabing" onclick="share('whatsapp', '<?php echo filter_var($uSlugUrl, FILTER_VALIDATE_URL);?>', '2')"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('147'));?></div>
            </div>
        </div>
        <!---->
    </div>
    <?php if($logedIn == 1 && $uProductOwnerID == $userID){?>
    <!--Product Page Extra for Creator-->
    <div class="product_details_right_in_top">
        <div class="add_new_product flex_ tabing"><a class="flex_ tabing" href="<?php echo filter_var($base_url, FILTER_VALIDATE_URL);?>settings?tab=createaProduct"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('39'));?><?php echo filter_var($LANG['add_new_product'], FILTER_SANITIZE_STRING);?></a></div>
        <div class="ed_del_prod flex_ tabing_non_justify">
            <div class="edit_prod"><a href="<?php echo filter_var($base_url, FILTER_VALIDATE_URL);?>settings?tab=myProducts&editProduct=<?php echo filter_var($uProductID, FILTER_SANITIZE_STRING);?>"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('27'));?><?php echo filter_var($LANG['edit_product'], FILTER_SANITIZE_STRING);?></a></div>
            <div class="del_prod delmyprod" id="<?php echo filter_var($uProductID, FILTER_SANITIZE_STRING);?>"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('28'));?><?php echo filter_var($LANG['delete_product'], FILTER_SANITIZE_STRING);?></div>
        </div>
    </div>
    <!--/Product Page Extra for Creator-->
<?php }?>
</div> 
<?php if($logedIn == 1 && $uProductOwnerID == $userID){?>
<script type="text/javascript">
(function($) {
    "use strict";    
    var preLoadingAnimation = '<div class="i_loading" style="margin-bottom:20px"><div class="dot-pulse"></div></div>';
    var plreLoadingAnimationPlus = '<div class="loaderWrapper"><div class="loaderContainer"><div class="loader">' + preLoadingAnimation + '</div></div></div>';

    /*Follow Profile PopUp Call*/
    $(document).on("click", ".delmyprod", function() {
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
<?php }else{ ?>
    <div class="i_not_found_page transition" style="justify-content: center; align-items:center;">
        <div class="noPostIcon"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('54'));?></div>
        <h1><?php echo filter_var($LANG['empty_shared_title'], FILTER_SANITIZE_STRING);?></h1>
        <?php echo filter_var($LANG['empty_shared_desc'], FILTER_SANITIZE_STRING);?>
    </div>
<?php } ?>
</div>