<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo filter_var($siteTitle, FILTER_SANITIZE_STRING);?></title>
    <?php
       include("layouts/header/meta.php");
       include("layouts/header/css.php");
       include("layouts/header/javascripts.php");
    ?>
    <style type="text/css">
        .header , .mobile_footer_fixed_menu_container{
            display:none;
        }
    </style>
</head>
<body> 
<?php include("layouts/header/header.php");?> 
    <div class="wrapper">   
        <div class="i_not_found_page transition">
            <h1><?php echo filter_var($LANG['please_verify_not'], FILTER_SANITIZE_STRING);?></h1>
            <p style="font-size:13px;"><?php echo html_entity_decode($LANG['to_receive_confirmation_email']);?></p>
            <div class="new_s_one new_s_first tabing" style="position:relative;width:100%;padding:10px 8px;max-width:230px;margin:0px auto;margin-top:15px;">
               <div class="flex_ alignItem tabing sendmeagainconfirm"><?php echo filter_var($LANG['send_confirmation_email'], FILTER_SANITIZE_STRING).html_entity_decode($iN->iN_SelectedMenuIcon('98'));?></div>
            </div>
        </div>
    </div>
<script type="text/javascript">
    $(document).ready(function(){
        $(".header , .sound-controls , .mobile_footer_fixed_menu_container").remove();
        $("body").on("click",".sendmeagainconfirm", function(){
           $.ajax({
                type: "POST",
                url: siteurl + 'requests/request.php',
                data: 'f=sndAgCon',
                cache: false,
                beforeSend: function() {
                    $(".sendmeagainconfirm").css("pointer-events", "none");
                },
                success: function(response) {  
                    if(response == '8'){
                      alert('Check your email address');
                    }else{
                        alert('There seems to be a problem. Please try again later. If your problem persists, please contact management.');
                    }
                    
                    $(".sendmeagainconfirm").css("pointer-events", "auto");
                }
            });
        });
    });
</script>
</body>
</html>