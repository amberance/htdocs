<?php 
if($logedIn == '1'){
    include("themes/$currentTheme/layouts/main.php");
}else{
    if($landingPageType == '1'){
        include("themes/$currentTheme/layouts/main.php");
    }else if($landingPageType == '2'){
        include("themes/$currentTheme/landing.php");
    } 
}
?>