<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <title><?php echo filter_var($siteTitle, FILTER_SANITIZE_STRING);?></title>
    <?php
       include("header/meta.php");
       include("header/css.php");
       include("header/javascripts.php");
    ?>
</head>
<body> 
    <div class="i_admin_container flex_">
        <?php include("menu/leftMenu.php");?>
        <div class="i_admin_right">
            <div class="i_admin_contents_wrapper column flex_">
            <?php 
                include("header/header.php");
                if(isset($_GET['editAds'])){
                    $adID = mysqli_real_escape_string($db, $_GET['editAds']);
                    $checkAdsIDExist = $iN->CheckAdsExist($adID); 
                    if(!empty($checkAdsIDExist)){
                      include("contents/editAds.php");
                    } 
                 }else{
                    include("contents/managa_advertisements.php");
                 } 
            ?>
            </div>
        </div>
    </div>   
</body>
</html>