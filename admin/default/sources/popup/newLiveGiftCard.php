<div class="i_modal_bg_in">
    <!--SHARE-->
   <div class="i_modal_in_in"> 
       <div class="i_modal_content">  
            <!--Modal Header-->
            <div class="i_modal_g_header">
                <?php echo filter_var($LANG['creating_new_gift_coin'], FILTER_SANITIZE_STRING);?>
                <div class="shareClose transition"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('5'));?></div>
            </div>  
            <!--/Modal Header-->
            <div class="i_editsvg_code flex_ tabing_non_justify"> 
                <!---->
                <div class="i_general_row_box_item flex_ tabing_non_justify" id="sec_logo"> 
                <div class="irow_box_right" style="padding-left:0px; width:100%">
                    <div class="certification_file_box" style="padding: 25px 0px;padding-bottom: 0px;">
                    <form id="giftImageUploadForm" class="options-form" method="post" enctype="multipart/form-data" action="<?php echo filter_var($base_url, FILTER_SANITIZE_STRING);?>admin/<?php echo filter_var($adminTheme, FILTER_SANITIZE_STRING);?>/request/request.php">
                        <label for="gift_image" style="max-width:320px">
                            <?php echo html_entity_decode($iN->iN_SelectedMenuIcon('79')); echo filter_var($LANG['u_coin_image'], FILTER_SANITIZE_STRING);?>
                            <input type="file" id="gift_image" name="uploading[]" data-id="GiftFile" data-type="adsType" style="display:none; opacity:0;">
                        </label> 
                    </form>
                    <div class="success_tick tabing flex_ adsType"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('69'));?></div>
                    </div> 
                    <div class="rec_not" style="padding-top:8px;"><?php echo filter_var($LANG['i_coin_image_not'], FILTER_SANITIZE_STRING);?></div>
                </div>
                </div>
                <!---->
            </div>
            <div class="i_editsvg_code flex_ tabing_non_justify">
                <!---->
                <div class="i_general_row_box_item flex_ tabing_non_justify" id="sec_logo"> 
                <div class="irow_box_right" style="padding-left:0px;width:100%">
                    <div class="certification_file_box" style="padding: 0px 0px;padding-bottom: 0px;">
                    <form id="giftAnimationImageUploadForm" class="options-form" method="post" enctype="multipart/form-data" action="<?php echo filter_var($base_url, FILTER_SANITIZE_STRING);?>admin/<?php echo filter_var($adminTheme, FILTER_SANITIZE_STRING);?>/request/request.php">
                        <label for="gift_animation_image" style="max-width:320px">
                            <?php echo html_entity_decode($iN->iN_SelectedMenuIcon('79')); echo filter_var($LANG['u_coin_animation'], FILTER_SANITIZE_STRING);?>
                            <input type="file" id="gift_animation_image" name="uploading[]" data-id="GiftAnimationFile" data-type="adsType" style="display:none; opacity:0;">
                        </label> 
                    </form>
                    <div class="success_tick tabing flex_ adsType"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('69'));?></div>
                    </div> 
                    <div class="rec_not" style="padding-top:8px;"><?php echo filter_var($LANG['u_coin_animation_not'], FILTER_SANITIZE_STRING);?></div>
                </div>
                </div> 
                <!---->
            </div>
            <form enctype="multipart/form-data" method="post" id="newGiftCardForm">
            <div class="i_editsvg_code flex_ tabing">
               <!--****************************-->
                <div class="i_p_e_body" style="padding:15px;">
                    <div class="general_warning"><div class="border_one c3 flex_ tabing_non_justify" style="padding:15px;"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('60'));?><?php echo filter_var($LANG['must_contain_all_plan_informations'], FILTER_SANITIZE_STRING);?></div></div>
                    <div class="add_app_not_point"><?php echo isset($LANG['new_gift_not']) ? $LANG['new_gift_not'] : 'NaN';?></div>
                    
                    <div class="add_app_not_point"><?php echo filter_var($LANG['gift_name'], FILTER_SANITIZE_STRING);?></div>
                    <div class="i_plnn_container flex_">    
                        <input type="text" name="gift_name" class="point_input" placeholder="<?php echo filter_var($LANG['ex_gift_name'], FILTER_SANITIZE_STRING);?>">
                    </div>
                    <div class="warning_wrapper pk_wraning"><?php echo filter_var($LANG['please_write_gift_name'], FILTER_SANITIZE_STRING);?></div>
                    <div class="add_app_not_point"><?php echo filter_var($LANG['gift_point'], FILTER_SANITIZE_STRING);?></div>
                    <div class="i_plnn_container flex_">    
                        <?php echo html_entity_decode($iN->iN_SelectedMenuIcon('40'));?>
                        <input type="text" name="giftPoint" class="point_input pnt" style="padding-left:50px;" onkeypress="return event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57)" placeholder="<?php echo filter_var($LANG['plan_point_amount_ex'], FILTER_SANITIZE_STRING);?>">
                    </div> 
                    <div class="warning_wrapper ppk_wraning"><?php echo preg_replace( '/{.*?}/', $minimumPointLimit, $LANG['plan_point_warning']);?></div>
                    
                    <div class="add_app_not_point"><?php echo filter_var($LANG['pay_cost'], FILTER_SANITIZE_STRING);?></div> 
                    <div class="i_plnn_container flex_">   
                        <div class="rec_not"><?php echo $currencys[$defaultCurrency];?><span class="totsm">0</span></div>
                    </div>
                    <div class="warning_wrapper papk_wraning"><?php echo preg_replace( '/{.*?}/', $maximumPointAmountLimit, $LANG['plan_point_amount_warning']);?></div>
                </div> 
               <!--****************************-->
            </div>
            <!--Modal Header-->
            <div class="i_modal_g_footer flex_">  
                <input type="hidden" name="f" value="newGiftCardForm"> 
                <input type="hidden" name="giftFile" id="giftFile" value="">
                <input type="hidden" name="GiftAnimationFile" id="GiftAnimationFilea" value="">
                <div class="popupSaveButton transition"><button type="submit" name="submit" class="i_nex_btn_btn transition" ><?php echo filter_var($LANG['save_edit'], FILTER_SANITIZE_STRING);?></button></div>
                <div class="alertBtnLeft no-del transition"><?php echo filter_var($LANG['no'], FILTER_SANITIZE_STRING);?></div> 
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
    var newGiftCardForm = $("#newGiftCardForm");
    newGiftCardForm.on('submit', function(e) { 
        e.preventDefault();
        jQuery.ajax({
            type: "POST",
            url: siteurl + "request/request.php",
            data: newGiftCardForm.serialize(),
            beforeSend: function() {
                $(".ppk_wraning, .papk_wraning, .pk_wraning, .general_warning").hide();
                $(".i_p_e_body").append(plreLoadingAnimationPlus);
                newGiftCardForm.find(':input[type=submit]').prop('disabled', true);
            },
            success: function(data) {
                setTimeout(() => {
                    newGiftCardForm.find(':input[type=submit]').prop('disabled', false);
                }, 3000);
                if(data == '1'){
                    $(".ppk_wraning").show(); 
                }else if(data == '3'){
                    $(".papk_wraning").show();  
                }else if(data == '4'){
                    $(".pk_wraning").show();
                }else if(data == '5'){
                    $(".general_warning").show();
                }else if (data == '200') {
                    location.reload();
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
    $("body").on("keyup",".pnt", function(){
        var inputPointVal = $(this).val();
        var translatePointToMoney = inputPointVal * '<?php echo $onePointEqual;?>';
        $(".totsm").html(translatePointToMoney);
    });
});
</script>
</div> 