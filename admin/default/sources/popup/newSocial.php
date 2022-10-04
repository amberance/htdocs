<div class="i_modal_bg_in">
    <!--SHARE-->
   <div class="i_modal_in_in"> 
       <div class="i_modal_content general_conf">  
            <!--Modal Header-->
            <div class="i_modal_g_header">
                <?php echo filter_var($LANG['create_new_social_site'], FILTER_SANITIZE_STRING);?>
                <div class="shareClose transition"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('5'));?></div>
            </div> 
            <form enctype="multipart/form-data" method="post" id="newSocialSiteForm">
            <div class="i_plnn_container flex_" style="padding: 20px 20px;padding-top: 10px;">    
                <input type="text" name="social_site" class="point_input" placeholder="<?php echo filter_var($LANG['social_site_link_ex'], FILTER_SANITIZE_STRING);?>">
            </div>
            <div class="i_plnn_container flex_" style="padding: 20px 20px;padding-top: 0px;">    
                <input type="text" name="socail_key" class="point_input" placeholder="<?php echo filter_var($LANG['social_site_key'], FILTER_SANITIZE_STRING);?>">
            </div>
            <!--/Modal Header-->
            <div class="i_editsvg_code flex_ tabing">
               <textarea class="svg_more_textarea" name="socialsvgcode" placeholder="<?php echo filter_var($LANG['social_site_icon_code'], FILTER_SANITIZE_STRING);?>"></textarea>
            </div>
            <!---->
            <div class="i_general_row_box_item flex_ tabing_non_justify"> 
               <div class="irow_box_right">
                 <!---->
                 <div class="i_checkbox_wrapper flex_ tabing_non_justify">
                    <div class="i_chck_text" style="padding-right:15px;"><?php echo filter_var($LANG['status'], FILTER_SANITIZE_STRING);?></div>
                        <label class="el-switch el-switch-yellow" for="socialsitestatus">
                          <input type="checkbox" name="socialsitestatus" class="chmdAnnouncementStatus" id="socialsitestatus" value='yes' checked="checked">
                        <span class="el-switch-style"></span>  
                        </label> 
                        <input type="hidden" name="socialsitestatus" class="socialsitestatus" value="yes"> 
                    <div class="success_tick tabing flex_ sec_one socialsitestatus"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('69'));?></div>
                </div>
                 <!---->  
               </div>
            </div>
            <!----> 
            <div class="warning_wrapper papk_wraning" style="padding-left:25px;"><?php echo filter_var($LANG['please_use_svg_code'], FILTER_SANITIZE_STRING);?></div>
            <div class="warning_wrapper warning_one" style="padding-left:25px;"><?php echo filter_var($LANG['full_for_register'], FILTER_SANITIZE_STRING);?></div>
            <!--Modal Header-->
            <div class="i_modal_g_footer flex_"> 
                <input type="hidden" name="f" value="newSocialSite">
                <div class="popupSaveButton transition"><button type="submit" name="submit" class="i_nex_btn_btn transition" id="updateGeneralSettings"><?php echo filter_var($LANG['save_edit'], FILTER_SANITIZE_STRING);?></button></div>
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
    var newSocialSiteForm = $("#newSocialSiteForm");
    newSocialSiteForm.on('submit', function(e) {
        e.preventDefault();
        jQuery.ajax({
            type: "POST",
            url: siteurl + "request/request.php",
            data: newSocialSiteForm.serialize(),
            beforeSend: function() {
                $(".papk_wraning , .warning_one").hide();
                $(".general_conf").append(plreLoadingAnimationPlus);
                newSocialSiteForm.find(':input[type=submit]').prop('disabled', true);
            },
            success: function(data) {
                setTimeout(() => {
                    newSocialSiteForm.find(':input[type=submit]').prop('disabled', false);
                }, 3000);
                if (data == '200') {
                    location.reload();
                }else if(data == '1'){
                    $(".papk_wraning").show();
                }else if(data == '2'){
                    $(".warning_one").show();
                }else {
                    $("body").append('<div class="nnauthority"><div class="no_permis flex_ c3 border_one tabing">' + data + '</div></div>');
                    setTimeout(() => {
                        $(".nnauthority").remove();
                    }, 5000);
                }
                $(".loaderWrapper").remove();
            }
        });
    });
});
</script>
</div> 