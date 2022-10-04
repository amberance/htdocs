<div class="settings_main_wrapper">
  <div class="i_settings_wrapper_in" style="display:inline-table;">
     <div class="i_settings_wrapper_title">
       <div class="i_settings_wrapper_title_txt flex_"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('154')); ?><?php echo filter_var($LANG['my_stories'], FILTER_SANITIZE_STRING) . ''; ?></div>
       <div class="i_moda_header_nt"><?php echo filter_var($LANG['my_stories_desc'], FILTER_SANITIZE_STRING); ?></div>
    </div>
    <div class="i_settings_wrapper_items">
       <div class="i_tab_container i_tab_padding">
            <!---->
                <div class="exBody ">
                <?php 
                $lastPostID = isset($_POST['last']) ? $_POST['last'] : '';
                $storiePostData = $iN->iN_AllUserStoriePosts($userID, $lastPostID, $showingNumberOfPost);
                if($storiePostData){
                   foreach($storiePostData as $stData){
                       $storieID = $stData['s_id'];
                       $storieImage = $stData['uploaded_file_path'];
                       $storieTumbnail = $stData['upload_tumbnail_file_path'];
                       $storieFileExt = $stData['uploaded_file_ext']; 
                       $createdTime = $stData['created'];
                       $storieStatus = $stData['status'];
                       $videoBtn = $iN->iN_SelectedMenuIcon('27');
                       if($storieFileExt != 'mp4'){
                          $storieTumbnail = $storieImage;
                          $videoBtn = '';
                       }
                        if ($s3Status == 1) {
                            $storieImageURL = 'https://' . $s3Bucket . '.s3.' . $s3Region . '.amazonaws.com/' . $storieTumbnail; 
                        } else if ($digitalOceanStatus == '1') {
                            $storieImageURL = 'https://' . $oceanspace_name . '.' . $oceanregion . '.digitaloceanspaces.com/' . $storieTumbnail; 
                        } else {
                            $storieImageURL = $base_url . $storieTumbnail; 
                        }
                        $storySeenCount = $iN->iN_GetStorySeenCount($userID, $storieID);
                ?>
                    <!---->    
                    <div class="_pbwg8 body_<?php echo filter_var($storieID, FILTER_SANITIZE_STRING);?>">
                        <div class="_jjzlb"> 
                            <!---->
                            <div class="st_det transitions">
                                <div class="set_items">
                                    <div class="set_the_top_right_btns">
                                        <!--<div class="set_btn flex_ tabing"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('27')); ?></div>-->
                                        <div class="set_btn flex_ tabing del_stor ownTooltip" data-label="<?php echo filter_var($LANG['delete'], FILTER_SANITIZE_STRING);?>" id="<?php echo filter_var($storieID, FILTER_SANITIZE_STRING);?>"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('28')); ?> </div>
                                    </div>
                                    <div class="set_ite_footer flex_ tabing">
                                        <div class="set_eye flex_ tabing stViewers" data-viewer="<?php echo filter_var($storieID, FILTER_SANITIZE_STRING);?>">
                                             <?php echo html_entity_decode($iN->iN_SelectedMenuIcon('10')).$storySeenCount; ?> 
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!---->
                            <img src="<?php echo $storieImageURL;?>" class="exPex">
                        </div>
                    </div> 
                <!---->   
                <?php   }
                }else{
                    echo '<div class="no_creator_f_wrap flex_ tabing"><div class="no_c_icon">'.html_entity_decode($iN->iN_SelectedMenuIcon('54')).'</div><div class="n_c_t">'.$LANG['nothing_to_show_about_stories'].'</div></div>';
                }
                ?>         
                </div> 
            <!---->
       </div>
  </div>
</div> 
<script type="text/javascript">
(function($) {
    "use strict"; 
    /*Follow Profile PopUp Call*/
    $(document).on("click", ".del_stor", function() {
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
    /*Credit Card Form Call*/
    $(document).on("click", ".stViewers", function() {
        var type = 'storieViewers';
        var ID = $(this).attr("data-viewer"); 
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