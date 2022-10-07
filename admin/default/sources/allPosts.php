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
    <style type="text/css">
        .i_post_image_swip_wrappera , .green-audio-player {
            width:100% !important;
        }
    </style>
    <link rel="stylesheet" type="text/css" href="<?php echo filter_var($base_url, FILTER_VALIDATE_URL); ?>themes/<?php echo filter_var($currentTheme, FILTER_SANITIZE_STRING); ?>/css/audioplayer.css?v=m11"> 
</head>
<body> 
<div class="i_admin_container flex_">
    <?php include("menu/leftMenu.php");?>
    <div class="i_admin_right">
        <div class="i_admin_contents_wrapper column flex_">
            <?php 
                include("header/header.php");
                if(isset($_GET['post'])){
                   $editPostID = mysqli_real_escape_string($db, $_GET['post']);
                   $checkPostIDExist = $iN->iN_CheckPostIDExist($editPostID); 
                   if(!empty($checkPostIDExist)){
                    include("contents/editPost.php");
                   }
                }else{
                   include("contents/allPosts.php");
                }
            ?> 
        </div> 
    </div>
</div>
<script type="text/javascript" src="<?php echo filter_var($base_url, FILTER_VALIDATE_URL); ?>themes/<?php echo filter_var($currentTheme, FILTER_SANITIZE_STRING); ?>/js/audioplayer.js?v=12"></script>
</body>
</html>