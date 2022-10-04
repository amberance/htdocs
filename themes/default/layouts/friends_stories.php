<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <title><?php echo filter_var($siteTitle, FILTER_SANITIZE_STRING);?></title>
    <?php
       include("header/meta.php");
       include("header/css.php");
       include("header/javascripts.php");
    ?> 
</head>
<body>
<?php $page = 'moreposts'; if($logedIn == 0){ include('login_form.php'); }?>
<?php include("header/header.php");?> 
    <div class="wrapper <?php if($logedIn == 0){echo 'NotLoginYet';}?>">  
           <?php
              if($logedIn != 0){ include("left_menu.php");} 
              include("friends_stories_list.php");
              include("page_right.php");
           ?>  
    </div>   
<?php if($logedIn != 0){?>
<script type="text/javascript" src="<?php echo filter_var($base_url, FILTER_VALIDATE_URL); ?>themes/<?php echo filter_var($currentTheme, FILTER_SANITIZE_STRING); ?>/js/sw/lib/hammer.min.js"></script>
<script type="text/javascript" src="<?php echo filter_var($base_url, FILTER_VALIDATE_URL); ?>themes/<?php echo filter_var($currentTheme, FILTER_SANITIZE_STRING); ?>/js/sw/story-view.js?v=3<?php echo filter_var($version, FILTER_SANITIZE_STRING); ?>"></script> 
<script type="application/javascript">
$( document ).ready( function() {
	var storyView = new StoryView({
	  container: document.querySelector( '#story-view' ),
	  autoClose: true
	});
});
</script>
<?php }?>   
</body>
</html>