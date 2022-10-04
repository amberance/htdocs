<div class="th_middle">
   <div class="pageMiddle">
    <div class="live_item transition">
       <div class="live_title_page create_stories flex_"><?php echo $iN->iN_SelectedMenuIcon('154');?>Create Text Story</div> 
    </div>
    <!---->
    <div class="create_sotry_form_container">
        <div class="create_text_story_bg_wrapper flex_">
            <div class="bgs"><?php echo filter_var($LANG['bgs'], FILTER_SANITIZE_STRING);?></div>
            <?php 
            $bgImages = $iN->iN_GetStoryBgImages();
            if($bgImages){
            foreach($bgImages as $bgData){
                $bgID = $bgData['st_bg_id'];
                $bgImage = $bgData['st_bg_img_url'];
                $choosedStatus = $bgData['choosed_status'];
                    if ($s3Status == 1) {
                        $filePathUrl = 'https://' . $s3Bucket . '.s3.' . $s3Region . '.amazonaws.com/' . $bgImage; 
                    } else if ($digitalOceanStatus == '1') {
                        $filePathUrl = 'https://' . $oceanspace_name . '.' . $oceanregion . '.digitaloceanspaces.com/' . $bgImage;
                    } else {
                        $filePathUrl = $base_url . $bgImage; 
                    } 
                ?>
              <div class="st_bg_cont"><div class="st_img_wrapper <?php echo filter_var($choosedStatus, FILTER_SANITIZE_STRING) == 'ok' ? 'choosed_bg' : '';?>" style="background-image:url(<?php echo filter_var($filePathUrl,FILTER_VALIDATE_URL);?>);" data-img="<?php echo filter_var($filePathUrl,FILTER_VALIDATE_URL);?>" data-iid="<?php echo filter_var($bgID, FILTER_SANITIZE_STRING);?>"></div></div>   
            <?php }
            }
            ?> 
            <div class="typing_textarea" style="margin-top:15px;">
                <textarea class="strt_typing" id="strt_text" placeholder="<?php echo filter_var($LANG['start_typing'], FILTER_SANITIZE_STRING);?>"></textarea>
            </div>
            <div class="choosed_image">
                <div class="choosed_image_or">
                    <div class="text_typed flex_ tabing"><?php echo filter_var($LANG['start_typing'], FILTER_SANITIZE_STRING);?></div>
                    <img id="theBg" src="<?php echo filter_var($base_url.$iN->iN_GetChoosedBgImage(), FILTER_VALIDATE_URL);?>">
                </div>
            </div>
            <div class="share_my_story">
                <div class="share_story_btn_cnt flex_ tabing transition share_text_story">
                    <?php echo html_entity_decode($iN->iN_SelectedMenuIcon('26'));?><div class="pbtn"><?php echo filter_var($LANG['publish'], FILTER_SANITIZE_STRING);?></div>
                </div>
            </div>
        </div>
         
    </div>
    <!---->
    <!---->
      <div class="edit_created_stories">
             
      </div>
    <!---->
    <!--NON Shared Stories-->

    <div class="non-shared-yet"> 
         
    </div>
    <!--/NON Shared Stories-->
   </div>
</div> 
<script type="text/javascript">
(function($) {
"use strict";
    $(document).on("keyup",".strt_typing", function(){
        var theText = $(this).val();
        $(".text_typed").text(theText);
    });
    $(document).on("click", ".st_img_wrapper", function(){
        var bgUrl = $(this).attr("data-img");
        var bgID = $(this).attr("data-iid");
        $(".st_img_wrapper").removeClass("choosed_bg");
        $(this).addClass("choosed_bg");
        $("#theBg").attr("src", bgUrl);
    });
    
})(jQuery);    
</script>