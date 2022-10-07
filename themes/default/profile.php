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
<body>
<?php if($logedIn == 0){ include('login_form.php'); }?>
<?php include("header/header.php");?> 
    <div class="profile_wrapper" id="prw" data-u="<?php echo filter_var($p_profileID, FILTER_SANITIZE_STRING);?>">   
           <?php 
           $page = 'profile';
           include("profile/profile_infos.php");
           if($logedIn == 0 && $p_showHidePosts == '1'){
             echo '<div class="th_middle"><div class="pageMiddle"><div id="moreType" data-type="'.$page.'">'.$LANG['just_loged_in_user'].'</div></div></div>';
           }else{
            include("posts.php"); 
           } 
           ?>  
    </div>
    
<script type="text/javascript" src="<?php echo filter_var($base_url, FILTER_VALIDATE_URL);?>themes/<?php echo filter_var($currentTheme, FILTER_SANITIZE_STRING);?>/js/character_count.js?v=<?php echo filter_var($version, FILTER_SANITIZE_STRING);?>"></script>    
<script type="text/javascript">
$("#newPostT").characterCounter({
  limit: '500'  
});
</script>
<script type="text/javascript">
var message = "Function Disabled!";
function clickIE4() {
  if (event.button == 2) { 
    //alert(message);
    return false;
  }
}
function clickNS4(e) {
  if (document.layers || (document.getElementById && !document.all)) {
    if (e.which == 2 || e.which == 3) {
      //alert(message);
      return false;
    }
  }
}
if (document.layers) {
  document.captureEvents(Event.MOUSEDOWN);
  document.onmousedown = clickNS4;
} else if (document.all && !document.getElementById) {
  document.onmousedown = clickIE4;
}
document.oncontextmenu = new Function("return false");
</script>
</body>
</html>