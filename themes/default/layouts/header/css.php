<link rel="stylesheet" type="text/css" href="<?php echo filter_var($base_url, FILTER_VALIDATE_URL); ?>themes/<?php echo filter_var($currentTheme, FILTER_SANITIZE_STRING); ?>/css/<?php if ($lightDark == 'light') {echo 'style';} else {echo 'night_style';}?>.css?v=g2111113111411111322111242111111111111111111111111s113121111111111111<?php echo filter_var($version, FILTER_SANITIZE_STRING); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo filter_var($base_url, FILTER_VALIDATE_URL); ?>themes/<?php echo filter_var($currentTheme, FILTER_SANITIZE_STRING); ?>/css/lightGallery/lightgallery.css">
<?php if ($logedIn == 1) {?>
<link rel="stylesheet" type="text/css" href="<?php echo filter_var($base_url, FILTER_VALIDATE_URL); ?>themes/<?php echo filter_var($currentTheme, FILTER_SANITIZE_STRING); ?>/css/videojscss/video-js.css">
<link rel="stylesheet" type="text/css" href="<?php echo filter_var($base_url, FILTER_VALIDATE_URL); ?>themes/<?php echo filter_var($currentTheme, FILTER_SANITIZE_STRING); ?>/css/checkbox/checkbox.css">
<link rel="stylesheet" type="text/css" href="<?php echo filter_var($base_url, FILTER_VALIDATE_URL); ?>themes/<?php echo filter_var($currentTheme, FILTER_SANITIZE_STRING); ?>/css/crop/cropmain.css">
<?php }?>
<link rel="stylesheet" type="text/css" href="<?php echo filter_var($base_url, FILTER_VALIDATE_URL); ?>themes/<?php echo filter_var($currentTheme, FILTER_SANITIZE_STRING); ?>/css/swiper/swiper-bundle.css">
<style rel="stylesheet"  type="text/css">
<?php echo filter_var($customHeaderCSSCode, FILTER_SANITIZE_STRING); ?>
</style>
<link rel="stylesheet" type="text/css" href="<?php echo filter_var($base_url, FILTER_VALIDATE_URL); ?>themes/<?php echo filter_var($currentTheme, FILTER_SANITIZE_STRING); ?>/css/audioplayer.css?v=m11">