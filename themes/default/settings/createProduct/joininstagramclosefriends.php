<div class="create_product_form">
    <!--Creation Title-->
    <div class="now_creating">
        <?php echo filter_var($LANG[$proof], FILTER_SANITIZE_STRING);?>
    </div>
    <!--/Creation Title-->
    <!---->
    <div class="create_product_form_column flex_">
        <div class="input_title">
            <div class="input_title_title"><?php echo filter_var($LANG['pr_name'], FILTER_SANITIZE_STRING);?></div>
            <input type="text" id="pr_name" class="prc" placeholder="What are you offering?" value="<?php echo filter_var($LANG['joininstagramclosefriends_title_ex'], FILTER_SANITIZE_STRING);?>">
        </div>
        <div class="input_price">
            <div class="input_title_title"><?php echo filter_var($LANG['pr_price'], FILTER_SANITIZE_STRING);?></div>
            <div class="relativePosition">
                <input type="text" id="pr_price" class="prc input_prc_padding" value="150">
                <span class="prc_currency flex_ tabing"><?php echo filter_var($currencys[$defaultCurrency], FILTER_SANITIZE_STRING);?></span>
            </div>
        </div>
    </div>
    <!---->
    <div class="input_title_title"><?php echo filter_var($LANG['pr_images'], FILTER_SANITIZE_STRING);?></div>
    <!---->
    <div class="create_product_form_column flex_">
        <div class="input_file_form"> 
            <div class="relativePosition">
            <form id="uploadprform" class="options-form" method="post" enctype="multipart/form-data" action="<?php echo filter_var($base_url, FILTER_VALIDATE_URL).'requests/request.php';?>">
                <label class="i_pr_file" for="i_pr_file flex_ tabing">
                    <div class="i_pr_btn flex_ tabing" style="height:100%;"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('165'));?></div>
                    <input type="file" id="i_pr_file" class="pr_file_" name="uploading[]" data-id="pr_upload" multiple="true"> 
                </label>
            </form>
            </div>
        </div>
        <div class="input_uploaded_images flex_ tabing">
        <form id="tupprloadform" class="options-form flex_" style="width:100%;display:contents;" method="post" enctype="multipart/form-data" action="<?php echo filter_var($base_url, FILTER_VALIDATE_URL).'requests/request.php';?>">
            <div class="input_uploaded"></div>
        </form>
        </div>
    </div>
    <!---->
    <!---->
    <div class="create_product_form_column">
        <div class="col-tit flex_ tabing_non_justify"><?php echo filter_var($LANG['description'], FILTER_SANITIZE_STRING);?><span class="flex_ tabing_non_justify ownTooltip" data-label="<?php echo filter_var($LANG['pr_description_info'], FILTER_SANITIZE_STRING);?>"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('96'));?></span></div>
        <div class="col-textarea-box">
            <textarea class="col-textarea" id="pr_description" placeholder="<?php echo filter_var($LANG['pr_description_placeholder'], FILTER_SANITIZE_STRING);?>"><?php echo filter_var($LANG['joininstagramclosefriends_desc_ex'],FILTER_SANITIZE_STRING);?></textarea>
        </div>
    </div>
    <!---->
    <!---->
    <div class="create_product_form_column">
        <div class="col-tit flex_ tabing_non_justify"><?php echo filter_var($LANG['pr_conf_message'], FILTER_SANITIZE_STRING);?><span class="flex_ tabing_non_justify ownTooltip" data-label="<?php echo filter_var($LANG['pr_conf_info'], FILTER_SANITIZE_STRING);?>"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('96'));?></span></div>
        <div class="col-textarea-box">
            <textarea class="col-textarea" id="pr_conf"></textarea>
        </div>
    </div>
    <!---->
    <!---->
    <div class="create_product_form_column" style="padding-bottom:0px;">
        <div class="col-tit-advanced-settings flex_ tabing_non_justify"><?php echo filter_var($LANG['advanced_settings_title'], FILTER_SANITIZE_STRING);?></div>
    </div>
    <!---->
    <!---->
    <div class="create_product_form_column" style="padding-bottom:0px;">
        <!--SET SUBSCRIPTION FEE BOX-->
        <div class="i_set_subscription_fee_box" style="padding:0px;">  
            <div class="i_sub_not_check qmark">
            <?php echo filter_var($LANG['ask_a_question_optional'], FILTER_SANITIZE_STRING);?><span class="flex_ tabing_non_justify ownTooltip" data-label="<?php echo filter_var($LANG['additional_information'], FILTER_SANITIZE_STRING);?>"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('96'));?></span>
            <div class="i_sub_not_check_box">
                <label class="el-switch el-switch-yellow">
                    <input type="checkbox" name="askaquestion" class="subfeea" id="askaquestion" data-id="askaquestion" value="not">
                    <span class="el-switch-style"></span> 
                </label>
            </div>
            </div>  
            <div class="i_set_subscription_fee askaquestion" style="display:none;"> 
                <div class="i_subs_price"><input type="text" id="question_ask" class="transition prc" placeholder="<?php echo filter_var($LANG['ask_a_question_placeholder'], FILTER_SANITIZE_STRING);?>"></div>
            </div>
        </div>
        <!--/SET SUBSCRIPTION FEE BOX-->
    </div>
    <!---->
    <!---->
    <div class="create_product_form_column" style="padding-bottom:0px;">
        <!--SET SUBSCRIPTION FEE BOX-->
        <div class="i_set_subscription_fee_box" style="padding:0px;">  
            <div class="i_sub_not_check qmark">
            <?php echo filter_var($LANG['limit_slots'], FILTER_SANITIZE_STRING);?><span class="flex_ tabing_non_justify ownTooltip" data-label="<?php echo filter_var($LANG['limit_slots_desc'], FILTER_SANITIZE_STRING);?>"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('96'));?></span>
            <div class="i_sub_not_check_box">
                <label class="el-switch el-switch-yellow">
                    <input type="checkbox" name="limitslots" class="subfeea" id="limitslots" data-id="limitslots" value="not">
                    <span class="el-switch-style"></span> 
                </label>
            </div>
            </div>  
            <div class="i_set_subscription_fee limitslots" style="display:none;"> 
                <div class="i_subs_price"><input type="text" id="limit_slot" class="transition prc" placeholder="10" onkeypress='return event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57)'></div>
            </div>
        </div>
        <!--/SET SUBSCRIPTION FEE BOX-->
    </div>
    <!---->
    <div class="i_warning"><?php echo filter_var($LANG['please_fill_in_all_informations'], FILTER_SANITIZE_STRING);?></div>    
    <div class="i_settings_wrapper_item successNot">
        <?php echo filter_var($LANG['product_ready_for_the_published'], FILTER_SANITIZE_STRING)?>
    </div>
    <!---->
    <div class="create_product_form_column">
        <input type="hidden" id="uploadPrVal">
         <div class="pr_save_btna"><?php echo filter_var($LANG['create'],FILTER_SANITIZE_STRING);?></div>
    </div>
    <!---->
</div>
<script type="text/javascript">
(function($) {
    "use strict";
$(document).on("change",".subfeea", function(){
    var type = $(this).attr("data-id");
    var value = $(this).val();   
    if (value == 'ok') {
        $('#' + type).val('not');  
        $('.' + type).hide();  
    } else {
        $('#' + type).val('ok');  
        $('.' + type).show();  
    }
});
/*Uploading Music, Video and Image*/
$(document).on("change", "#i_pr_file", function(e) {
    e.preventDefault();
    var values = $("#uploadPrVal").val();
    var id = $("#i_pr_file").attr("data-id");
    var data = { f: id };
    $("#uploadprform").ajaxForm({
        type: "POST",
        data: data,
        delegation: true,
        cache: false,
        beforeSubmit: function() {
            $(".i_warning_unsupported").hide();
            $(".i_uploaded_iv").show();
            //$('.i_uploaded_iv').append('<div class="i_upload_progress"></div>');
            $(".publish").prop("disabled", true);
            $(".publish").css("pointer-events", "none");
        },
        uploadProgress: function(e, position, total, percentageComplete) {
            $('.i_upload_progress').width(percentageComplete + '%');
            /*$('.i_upload_progress').html(percentageComplete + '%');*/
        },
        success: function(response) {
            if (response != '303') {
                $(".input_uploaded").append(response);
                var K = $('.i_uploaded_item').map(function() { return this.id }).toArray();
                var T = K + "," + values;
                if (T != "undefined,") {
                    $("#uploadPrVal").val(T);
                }
                if ($(".video")[0]) {
                    //alert("video var");
                }
            } else {
                $(".i_uploaded_iv , .i_uploading_not").hide();
                $(".i_warning_unsupported").show();
            }
            $(".i_upload_progress").width('0%');
            $(".i_uploading_not").hide();
            setTimeout(() => {
                $('.publish').prop('disabled', false);
                $(".publish").css("pointer-events", "auto");
            }, 3000);
        },
        error: function() {}
    }).submit();
});
/*Delete Uploaded File Before Publish*/
$(document).on("click", ".i_delete_item_button", function() {
    var type = 'delete_file';
    var ID = $(this).attr('id');
    var input = $('#uploadPrVal');
    var data = 'f=' + type + '&file=' + ID;
    $.ajax({
        type: 'POST',
        url: siteurl + 'requests/request.php',
        data: data,
        beforeSend: function() {
            /*Do Something*/
        },
        success: function(response) {
            if (response != '404') {
                $(".iu_f_" + ID).remove();
                input.val(function(_, value) {
                    return value.split(',').filter(function(val) {
                        return val !== ID;
                    }).join(',');
                });
            } else {
                PopUPAlerts('not_file', 'ialert')
            }
            if (!$(".i_uploaded_item")[0]) {
                $(".i_uploaded_iv").hide();
            }
        }
    });
});
/*Upload Verification Files*/
$(document).on("change", ".cTumb", function(e) {
    e.preventDefault();
    var f = 'vTumbnail';
    var id = $(this).attr("data-id");
    var data = { f: f, id: id };
    $("#tupprloadform").ajaxForm({
        type: "POST",
        data: data,
        delegation: true,
        cache: false,
        beforeSubmit: function() {
            $(".iu_f_" + id).append('<div class="i_upload_progress"></div>');
        },
        uploadProgress: function(e, position, total, percentageComplete) {
            $('.i_upload_progress').width(percentageComplete + '%');
        },
        success: function(response) {
            $("#viTumb" + id).css('background-image', 'url(' + response + ')');
            $("#viTumbi" + id).attr('src', response);
            $(".i_upload_progress").remove();
        },
        error: function() {}
    }).submit();
}); 
$(document).on("click", ".pr_save_btna", function(){
   var f = 'createjoininstagramclosefriends';
   var prName = $("#pr_name").val();
   var prPrice = $("#pr_price").val();
   var prDesc = $("#pr_description").val();
   var prDescInfo = $("#pr_conf").val();
   var prFiles = $("#uploadPrVal").val(); 
   var prLimitSlot = $("#limitslots").val(); 
   var prAskaQuestion = $("#askaquestion").val(); 
   var prQuestionAsk = $("#question_ask").val();
   var prLimitVal = $("#limit_slot").val();
   var data = 'f='+f+'&prnm='+prName+'&prprc='+prPrice+'&prdsc='+prDesc+'&prdscinf='+prDescInfo+'&vals='+prFiles+'&lmSlot='+prLimitSlot+'&askQ='+prAskaQuestion+'&qAsk='+prQuestionAsk+'&lSlot='+prLimitVal;
   $.ajax({
        type: 'POST',
        url: siteurl + 'requests/request.php',
        data: data,
        cache: false,
        beforeSend: function() {
            $(".i_warning , .successNot").hide();
        },
        success: function(response) {
            if(response == '200'){
                $(".successNot").show();
                $("#pr_name").val('');
                $("#pr_price").val('10');
                $("#pr_description").val('');
                $("#pr_conf").val('');
                $("#uploadPrVal").val('');
                $(".input_uploaded").html('');
            } else {
                $(".i_warning").show();
            }
        }
    });
});
})(jQuery);
</script> 