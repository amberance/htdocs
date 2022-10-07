<div class="th_middle">
   <div class="pageMiddle">
    <div class="live_item transition">
       <div class="live_title_page create_stories flex_"><?php echo $iN->iN_SelectedMenuIcon('154');?>Create your stories</div> 
    </div>
    <!---->
    <div class="create_sotry_form_container flex_ tabing">
        <div class="upload_story_image">
            <!--S-->
            <form id="storiesform" method="post" enctype="multipart/form-data" action="<?php echo $base_url;?>requests/request.php">  
                <label class="label_storyUpload" data-id="stories" for="storie_img"> 
                <input type="file" name="storieimg[]" id="storie_img" data-id="stories" multiple="true">
                <div class="story-view-item" style="background-image:url(<?php echo filter_var($userAvatar, FILTER_SANITIZE_STRING);?>); margin-right:0px;">
                    <div class="newSto">
                    <div class="plusSIc"></div>
                        <?php echo filter_var($LANG['upload_storie_files'], FILTER_SANITIZE_STRING);?>
                    </div>
                </div>
              </label>
            </form>
            <!--/S--> 
        </div> 
        <div class="i_uploading_not_story flex_ tabing" style="display:none;"><?php echo filter_var($LANG['uploading_please_wait'], FILTER_SANITIZE_STRING);?></div>
    </div>
    <!---->
    <!---->
      <div class="edit_created_stories">
             
      </div>
    <!---->
    <!--NON Shared Stories-->
    <div class="live_item transition">
           <div class="live_title_page non-shared-title-style create_stories flex_"><?php echo $iN->iN_SelectedMenuIcon('115').filter_var($LANG['non_shared_stories'], FILTER_SANITIZE_STRING);?></div> 
        </div>
    <div class="non-shared-yet"> 
         <?php 
            $nonSharedStoriesData = $iN->iN_GetNonSharedStories($userID);
            if($nonSharedStoriesData){
                foreach($nonSharedStoriesData as $stData){
                    $storieID = $stData['s_id'];
                    $storiOwnerID = $stData['uid_fk'];
                    $storieUploadedFilePath = $stData['uploaded_file_path'];
                    $storieUploadedfileExtension = $stData['uploaded_file_ext'];
                    $storieUploadedFileTumbnail = $stData['upload_tumbnail_file_path'];
                    $storieText = $stData['text'];
                    $createdTime = $stData['created']; 
                    $crTime = date('Y-m-d H:i:s',$createdTime); 
                    if($storieUploadedfileExtension == 'mp4'){
                        if ($s3Status == 1) {
                            if ($storieUploadedFileTumbnail) {
                                $filePathUrl = 'https://' . $s3Bucket . '.s3.' . $s3Region . '.amazonaws.com/' . $storieUploadedFileTumbnail;
                            } else {
                                $filePathUrl = 'https://' . $s3Bucket . '.s3.' . $s3Region . '.amazonaws.com/' . $storieUploadedFilePath;
                            } 
                        } else if ($digitalOceanStatus == '1') {
                            if ($storieUploadedFileTumbnail) {
                                $filePathUrl = 'https://' . $oceanspace_name . '.' . $oceanregion . '.digitaloceanspaces.com/' . $storieUploadedFileTumbnail;
                            } else {
                                $filePathUrl = 'https://' . $oceanspace_name . '.' . $oceanregion . '.digitaloceanspaces.com/' . $storieUploadedFilePath;
                            }
                        } else {
                            if ($storieUploadedFileTumbnail) {
                                $filePathUrl = $base_url . $storieUploadedFilePath;  
                            } else {
                                $filePathUrl = $base_url . $storieUploadedFilePath;
                            }
                        } 
                    }else{
                        if ($s3Status == 1) {
                            if ($storieUploadedFileTumbnail) {
                                $filePathUrl = 'https://' . $s3Bucket . '.s3.' . $s3Region . '.amazonaws.com/' . $storieUploadedFileTumbnail;
                            } else {
                                $filePathUrl = 'https://' . $s3Bucket . '.s3.' . $s3Region . '.amazonaws.com/' . $storieUploadedFilePath;
                            } 
                        } else if ($digitalOceanStatus == '1') {
                            if ($storieUploadedFileTumbnail) {
                                $filePathUrl = 'https://' . $oceanspace_name . '.' . $oceanregion . '.digitaloceanspaces.com/' . $storieUploadedFileTumbnail;
                            } else {
                                $filePathUrl = 'https://' . $oceanspace_name . '.' . $oceanregion . '.digitaloceanspaces.com/' . $storieUploadedFilePath;
                            }
                        } else {
                            if ($storieUploadedFileTumbnail) {
                                $filePathUrl = $base_url . $storieUploadedFilePath;  
                            } else {
                                $filePathUrl = $base_url . $storieUploadedFilePath;
                            }
                        }
                    } 
            ?>

            <?php  if($storieUploadedfileExtension == 'mp4'){?>
                <!--Storie-->
                <div class="uploaded_storie_container body_<?php echo filter_var($storieID, FILTER_SANITIZE_STRING);?>">
                <div class="shared_storie_time flex_"><?php echo $iN->iN_SelectedMenuIcon('115').' '.TimeAgo::ago($crTime, date('Y-m-d H:i:s')); ?></div>
                <div class="dmyStory dmyStory_extra" id="<?php echo filter_var($storieID, FILTER_SANITIZE_STRING);?>"><div class="i_h_in flex_ ownTooltip" data-label="<?php echo filter_var($LANG['delete'], FILTER_SANITIZE_STRING);?>"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('28'));?></div></div>
                <div class="uploaded_storie_image uploaded_storie_before border_one tabing flex_">
                            <video class="lg-video-object" id="v<?php echo filter_var($storieID, FILTER_SANITIZE_STRING);?>" controls preload="none" poster="<?php echo $storieUploadedFileTumbnail;?>">
                                <source src="<?php echo $filePathUrl;?>" preload="metadata" type="video/mp4">  
                            </video>
                    </div>
                    <div class="add_a_text">
                        <textarea class="add_my_text st_txt_<?php echo filter_var($storieID, FILTER_SANITIZE_STRING);?>" placeholder="Do you want to write something about this storie?"></textarea>
                    </div>
                    <div class="share_story_btn_cnt flex_ tabing transition share_this_story" id="<?php echo filter_var($storieID, FILTER_SANITIZE_STRING);?>">
                    <?php echo html_entity_decode($iN->iN_SelectedMenuIcon('26'));?><div class="pbtn"><?php echo filter_var($LANG['publish'], FILTER_SANITIZE_STRING);?></div>
                    </div>
                </div> 
                <!--/Storie-->
            <?php } else { ?>
                <!--Storie-->
                <div class="uploaded_storie_container body_<?php echo filter_var($storieID, FILTER_SANITIZE_STRING);?>">
                <div class="shared_storie_time flex_"><?php echo $iN->iN_SelectedMenuIcon('115').' '.TimeAgo::ago($crTime, date('Y-m-d H:i:s')); ?></div>
                <div class="dmyStory dmyStory_extra" id="<?php echo filter_var($storieID, FILTER_SANITIZE_STRING);?>"><div class="i_h_in flex_ ownTooltip" data-label="<?php echo filter_var($LANG['delete'], FILTER_SANITIZE_STRING);?>"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('28'));?></div></div>
                    <div class="uploaded_storie_image uploaded_storie_before border_one tabing flex_">
                            <img src="<?php echo $filePathUrl;?>" id="img<?php echo filter_var($storieID, FILTER_SANITIZE_STRING);?>">
                    </div>
                    <div class="add_a_text">
                        <textarea class="add_my_text st_txt_<?php echo filter_var($storieID, FILTER_SANITIZE_STRING);?>" placeholder="Do you want to write something about this storie?"></textarea>
                    </div>
                    <div class="share_story_btn_cnt flex_ tabing transition share_this_story" id="<?php echo filter_var($storieID, FILTER_SANITIZE_STRING);?>">
                        <?php echo html_entity_decode($iN->iN_SelectedMenuIcon('26'));?><div class="pbtn"><?php echo filter_var($LANG['publish'], FILTER_SANITIZE_STRING);?></div>
                    </div>
                </div>
                <script type="text/javascript">
                    (function($) {
                    "use strict";
                        setTimeout(() => {
                            var img = document.getElementById("img<?php echo filter_var($storieID, FILTER_SANITIZE_STRING);?>");
                            if(img.height > img.width){
                                $("#img<?php echo filter_var($storieID, FILTER_SANITIZE_STRING);?>").css("height","100%");
                            }else{
                                $("#img<?php echo filter_var($storieID, FILTER_SANITIZE_STRING);?>").css("width","100%");
                            }
                            $(".uploaded_storie_container").show();
                        }, 1); 
                    })(jQuery); 
                </script>
                <!--/Storie-->
            <?php }?>

        <?php    }
            }
         ?>
    </div>
    <!--/NON Shared Stories-->
   </div>
</div> 
<script type="text/javascript">
(function($) {
    "use strict";
    $(document).on("change", "#storie_img", function(e) {
        e.preventDefault();
        var values = $("#uploadVal").val();
        var id = $("#storie_img").attr("data-id");
        var data = { f: id };
        $("#storiesform").ajaxForm({
            type: "POST",
            data: data,
            delegation: true,
            cache: false,
            beforeSubmit: function() { 
                $('.create_sotry_form_container').append('<div class="i_upload_progress"></div>'); 
                $(".i_uploading_not_story").show();
            },
            xhr: function(){ 
                var xhr = $.ajaxSettings.xhr();
                if (xhr.upload) {
                    xhr.upload.addEventListener('progress', function(event) {
                        var percent = 0;
                        var position = event.loaded || event.position;
                        var total = event.total;
                        if (event.lengthComputable) {
                            percent = Math.ceil(position / total * 100);
                        } 
                        $(".i_upload_progress").css("width", + percent +"%"); 
                    }, true);
                }
                return xhr;
            },
            success: function(response) {
                 if(response){
                   $(".edit_created_stories").prepend(response);
                   $(".i_upload_progress").remove();
                   $(".i_uploading_not_story").hide();
                 }
            },
            error: function() {}
        }).submit();
    });
    
    $(document).on("click", ".dmyStory", function() {
        var type = 'delete_storie_alert';
        var ID = $(this).attr("id");
        var data = 'f=' + type + '&id=' + ID;
        $.ajax({
            type: "POST",
            url: siteurl + 'requests/request.php',
            data: data,
            cache: false,
            beforeSend: function() {
                /*Do Something*/
            },
            success: function(response) {
                $("body").append(response);
                setTimeout(() => {
                    $(".i_modal_bg_in").addClass('i_modal_display_in');
                }, 200);
            }
        });
    }); 
})(jQuery);    
</script>