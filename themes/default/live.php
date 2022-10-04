<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <title><?php echo filter_var($siteTitle, FILTER_SANITIZE_STRING); ?></title>
    <?php
include "layouts/header/meta.php";
include "layouts/header/css.php";
include "layouts/header/javascripts.php";
?>
<?php
if ($agoraStatus == '1') {?>
<link href="<?php echo filter_var($base_url, FILTER_VALIDATE_URL); ?>themes/<?php echo filter_var($currentTheme, FILTER_SANITIZE_STRING); ?>/js/video/video-js.css" rel="stylesheet" />
<!-- If you'd like to support IE8 (for Video.js versions prior to v7) -->
<script src="<?php echo filter_var($base_url, FILTER_VALIDATE_URL); ?>themes/<?php echo filter_var($currentTheme, FILTER_SANITIZE_STRING); ?>/js/video/videojs-ie8.min.js"></script>
<script src="<?php echo filter_var($base_url, FILTER_VALIDATE_URL); ?>themes/<?php echo filter_var($currentTheme, FILTER_SANITIZE_STRING); ?>/js/video/videoa.js"></script>
<?php }?>
<style type="text/css">
  .filtvid {
    width:100%;
    height:100%;
  }
  .player .col {
    width:100%;
    height:100%;
    position:relative;
  }
  .player .col div{
    width:100%;
    height:100%;
    position:relative;
  } 
  .player-name {
    display:none;
  }
  .cola {
    display:none !important;
  }
</style>
</head>
<body>
<?php include "layouts/header/header.php";?>
    <?php
if ($liveType == 'free') {
	include "layouts/live/freeLive.php";
} else {
	include "layouts/live/paidLive.php";
}
?> 
</body>
</html>