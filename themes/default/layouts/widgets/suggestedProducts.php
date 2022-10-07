<?php 
$sgProduct = $iN->iN_SuggestedProductWidget(1);
   if($sgProduct){
echo '
<div class="sp_wrp">
<div class="suggested_products">
<div class="i_right_box_header">
   '.filter_var($LANG['latest_products'], FILTER_SANITIZE_STRING).'
</div>
<div class="sp_products">
';
      foreach($sgProduct as $sgData){
        $sProductID = $sgData['pr_id'];
        $sProductName = $sgData['pr_name'];
        $sProductPrice = $sgData['pr_price'];
        $sProductFiles = $sgData['pr_files'];  
        $sProductOwnerID = $sgData['iuid_fk']; 
        $sProductSlug = $sgData['pr_name_slug'];
        $sProductType = $sgData['product_type'];
        $p__style = $sProductType; 
        $thisProduct = $sProductType;
        if($sProductType == 'scratch'){
            $sProductType = 'simple_product';
            $p__style = 'scratch';
            $thisProduct = 'all';
        }
        $sProductSlotsNumber = $sgData['pr_slots_number']; 
        $sSlugUrl = $base_url.'product/'.$sProductSlug.'_'.$sProductID;   
        $strimValue = rtrim($sProductFiles,','); 
        $snums = preg_split('/\s*,\s*/', $strimValue);
        $slastFileID = end($snums);
        $spfData = $iN->iN_GetUploadedFileDetails($slastFileID);
        if($spfData){
            $sfileUploadID = $spfData['upload_id']; 
            $sfileExtension = $spfData['uploaded_file_ext'];
            $sfilePath = $spfData['uploaded_file_path']; 
            if($sfileExtension == 'mp4'){
               $sfilePath = $spfData['upload_tumbnail_file_path'];
            }
            if ($s3Status == 1) { 
                $sproductDataImage = 'https://' . $s3Bucket . '.s3.' . $s3Region . '.amazonaws.com/' . $sfilePath;
            } else if ($digitalOceanStatus == '1') { 
                $sproductDataImage = 'https://' . $oceanspace_name . '.' . $oceanregion . '.digitaloceanspaces.com/' . $sfilePath;                   
            } else { 
                $sproductDataImage = $base_url . $sfilePath;                    
            }
        }
?>         
    <div class="sp_product_wrapper">
        <div class="sp_product_container">
            <a href="<?php echo filter_var($base_url.'product/'.$sProductSlug, FILTER_VALIDATE_URL).'_'.$sProductID;?>">
                <div class="sp_product_img">
                    <img src="<?php echo filter_var($sproductDataImage, FILTER_VALIDATE_URL);?>">
                </div>
            </a>
            <div class="sp_product_det">
                <div class="sp_product_name"><a href="<?php echo filter_var($base_url.'product/'.$sProductSlug.'_'.$sProductID, FILTER_VALIDATE_URL);?>"><?php echo filter_var($sProductName, FILTER_SANITIZE_STRING);?></a></div>
                <div class="s_p_product_type <?php echo $p__style;?>"><a href="<?php echo filter_var($base_url, FILTER_SANITIZE_STRING);?>marketplace?cat=<?php echo filter_var($thisProduct, FILTER_SANITIZE_STRING);?>"><?php echo filter_var($LANG[$sProductType], FILTER_SANITIZE_STRING);?></a></div>
                <div class="sp_product_price"><?php echo filter_var($currencys[$defaultCurrency].$sProductPrice, FILTER_SANITIZE_STRING);?></div>
            </div>
        </div>
    </div>
<?php 
 }
echo '</div></div></div>';
   }
?> 
