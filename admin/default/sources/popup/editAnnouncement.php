<div class="i_modal_bg_in">
    <!--SHARE-->
   <div class="i_modal_in_in"> 
       <div class="i_modal_content" id="general_conf">  
            <!--Modal Header-->
            <div class="i_modal_g_header">
                <?php echo filter_var($LANG['edit_announcement'], FILTER_SANITIZE_STRING);?>
                <div class="shareClose transition"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('5'));?></div>
            </div> 
            <form enctype="multipart/form-data" method="post" id="announcementEdit">
            <div class="announcement_type_choose">
                <!----> 
                <div class="irow_box_right">
                    <div class="i_box_limit flex_ column">
                        <div class="i_limit" data-type="ch_limit"><span class="lct"><?php if(isset($getaData['a_who_see']) == 'everyone'){echo filter_var($LANG['a_share_with_everyone'], FILTER_SANITIZE_STRING); }else{echo filter_var($LANG['a_share_with_creators'], FILTER_SANITIZE_STRING); }?></span><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('36'));?></div>
                            <div class="i_limit_list_ch_container">
                                <div class="i_countries_list border_one column flex_"> 

                                <div class="i_s_limit transition border_one gsearch creators" id='creators' data-c="Share with creators" data-type="chooseAnnouncementType">Share with creators</div>
                                <div class="i_s_limit transition border_one gsearch everyone" id='everyone' data-c="Share with Everyone" data-type="chooseAnnouncementType">Share with Everyone</div>
                                
                                </div>
                                <input type="hidden" name="announcementType" id="upcLimit" value="<?php echo isset($getaData['a_who_see']) ? $getaData['a_who_see'] : NULL;?>">
                            </div>
                            <div class="rec_not" style="padding-top:10px;padding-left:10px;"><?php echo filter_var($LANG['choose_who_can_see_this_announcement'], FILTER_SANITIZE_STRING);?></div>
                    </div> 
                </div>
                <!---->
            </div>
            <!--/Modal Header-->
            <div class="i_editsvg_code flex_ tabing">
               <textarea class="svg_more_textarea" name="announcementText" placeholder="<?php echo filter_var($LANG['wrire_announcement_description'], FILTER_SANITIZE_STRING);?>"><?php echo $urlHighlight->highlightUrls($iN->sanitize_output($iN->iN_RemoveYoutubelink($getaData['a_text']), $base_url));?></textarea>
            </div>
            <!---->
            <div class="i_general_row_box_item flex_ tabing_non_justify"> 
               <div class="irow_box_right">
                 <!---->
                 <div class="i_checkbox_wrapper flex_ tabing_non_justify">
                    <div class="i_chck_text" style="padding-right:15px;"><?php echo filter_var($LANG['status'], FILTER_SANITIZE_STRING);?></div>
                        <label class="el-switch el-switch-yellow" for="AnnouncementStatus">
                          <input type="checkbox" name="announcementStatusa" class="chmdAnnouncementStatus" id="AnnouncementStatus" <?php echo filter_var($getaData['a_status'], FILTER_SANITIZE_STRING) == 'yes' ? 'value="yes" checked="checked"' : 'value="no"';?>>
                        <span class="el-switch-style"></span>  
                        </label> 
                        <input type="hidden" name="announcementStatus" class="AnnouncementStatus" value="<?php echo filter_var($getaData['a_status'], FILTER_SANITIZE_STRING);?>"> 
                    <div class="success_tick tabing flex_ sec_one AnnouncementStatus"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('69'));?></div>
                </div>
                 <!---->  
               </div>
            </div>
            <!---->  
            <div class="warning_wrapper papk_wraning" style="padding-left:15px;"><?php echo filter_var($LANG['please_write_announcement'], FILTER_SANITIZE_STRING);?></div> 
            <!--Modal Header-->
            <div class="i_modal_g_footer flex_"> 
                <input type="hidden" name="f" value="announcementEdit">
                <input type="hidden" name="aid" value="<?php echo filter_var($getaData['a_id'], FILTER_SANITIZE_STRING);?>">
                <div class="popupSaveButton transition"><button type="submit" name="submit" class="i_nex_btn_btn transition" id="updateGeneralSettings"><?php echo filter_var($LANG['save_announcement'], FILTER_SANITIZE_STRING);?></button></div>
                <div class="alertBtnLeft no-del transition"><?php echo filter_var($LANG['cancel'], FILTER_SANITIZE_STRING);?></div>
            </div>
            <!--/Modal Header-->
            </form>
       </div>   
   </div>
   <!--/SHARE--> 
   <script type="text/javascript">
$(document).ready(function(){ 
    var preLoadingAnimation = '<div class="i_loading" style="margin-bottom:20px"><div class="dot-pulse"></div></div>';
    var plreLoadingAnimationPlus = '<div class="loaderWrapper"><div class="loaderContainer"><div class="loader">' + preLoadingAnimation + '</div></div></div>';
    var announcementEdit = $("#announcementEdit");
    announcementEdit.on('submit', function(e) {
        e.preventDefault();
        jQuery.ajax({
            type: "POST",
            url: siteurl + "request/request.php",
            data: announcementEdit.serialize(),
            beforeSend: function() {
                $(".papk_warning, .ppk_warning").hide();
                $("#general_conf").append(plreLoadingAnimationPlus);
                announcementEdit.find(':input[type=submit]').prop('disabled', true);
            },
            success: function(data) {
                setTimeout(() => {
                    announcementEdit.find(':input[type=submit]').prop('disabled', false);
                }, 3000);
                if (data == '200') {
                    location.reload();
                }else if(data == '2'){
                   $(".papk_wraning").show();
                }else if(data == '1'){
                    $(".ppk_wraning").show();
                }else if(data == '3'){
                    $(".warning_one").show();
                }else{
                    $("body").append('<div class="nnauthority"><div class="no_permis flex_ c3 border_one tabing">' + data + '</div></div>');
                    setTimeout(() => {
                        $(".nnauthority").remove();
                    }, 8000);
                }
                $(".loaderWrapper").remove();
            }
        });
    });
});
</script>
</div> 