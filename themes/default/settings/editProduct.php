<?php 
$ProductData = $iN->iN_ProductDetails($userID ,$editProductID);
if($ProductData){
   $productID = $ProductData['pr_id'];
   $productName = $ProductData['pr_name'];
   $productPrice = $ProductData['pr_price'];
   $productFiles = $ProductData['pr_files'];
   $productDescription = $ProductData['pr_desc'];
   $productDescriptionInfo = $ProductData['pr_desc_info'];
   $productSlotsNumber = isset($ProductData['pr_slots_number']) ? $ProductData['pr_slots_number'] : NULL;
   $productQuestionAnswer = isset($ProductData['pr_question_answer']) ? $ProductData['pr_question_answer'] : NULL;

?>
<div class="settings_main_wrapper"> 
    <div class="i_settings_wrapper_in" style="display:inline-table;">
            <div class="i_settings_wrapper_title">
                <div class="i_settings_wrapper_title_txt flex_"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('158'));?><?php echo filter_var($LANG['edit_product'], FILTER_SANITIZE_STRING);?></div> 
            </div> 
        <div class="i_settings_wrapper_items"> 
            <div class="i_tab_container i_tab_padding">   
              <!--Edit Product Colums-->
              <div class="create_product_form">
                    <!---->
                    <div class="create_product_form_column flex_">
                        <div class="input_title">
                            <div class="input_title_title"><?php echo filter_var($LANG['pr_name'], FILTER_SANITIZE_STRING);?></div>
                            <input type="text" id="pr_name" class="prc" placeholder="<?php echo filter_var($LANG['what_are_you_offering'], FILTER_SANITIZE_STRING);?>" value="<?php echo filter_var($productName, FILTER_SANITIZE_STRING);?>">
                        </div>
                        <div class="input_price">
                            <div class="input_title_title"><?php echo filter_var($LANG['pr_price'], FILTER_SANITIZE_STRING);?></div>
                            <div class="relativePosition">
                                <input type="text" id="pr_price" class="prc input_prc_padding" value="<?php echo filter_var($productPrice, FILTER_SANITIZE_STRING);?>">
                                <span class="prc_currency flex_ tabing"><?php echo filter_var($currencys[$defaultCurrency], FILTER_SANITIZE_STRING);?></span>
                            </div>
                        </div>
                    </div>
                    <!---->
                    <!---->
                    <div class="create_product_form_column">
                        <div class="col-tit flex_ tabing_non_justify"><?php echo filter_var($LANG['description'], FILTER_SANITIZE_STRING);?><span class="flex_ tabing_non_justify ownTooltip" data-label="<?php echo filter_var($LANG['pr_description_info'], FILTER_SANITIZE_STRING);?>"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('96'));?></span></div>
                        <div class="col-textarea-box">
                            <textarea class="col-textarea" id="pr_description" placeholder="<?php echo filter_var($LANG['pr_description_placeholder'], FILTER_SANITIZE_STRING);?>"><?php echo filter_var($productDescription, FILTER_SANITIZE_STRING);?></textarea>
                        </div>
                    </div>
                    <!---->
                    <!---->
                    <div class="create_product_form_column">
                        <div class="col-tit flex_ tabing_non_justify"><?php echo filter_var($LANG['pr_conf_message'], FILTER_SANITIZE_STRING);?><span class="flex_ tabing_non_justify ownTooltip" data-label="<?php echo filter_var($LANG['pr_conf_info'], FILTER_SANITIZE_STRING);?>"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('96'));?></span></div>
                        <div class="col-textarea-box">
                            <textarea class="col-textarea" id="pr_conf"><?php echo filter_var($productDescriptionInfo, FILTER_SANITIZE_STRING);?></textarea>
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
                    <input type="checkbox" name="askaquestion" class="subfeea" id="askaquestion" data-id="askaquestion" <?php echo filter_var($productQuestionAnswer, FILTER_SANITIZE_STRING) != '' ? 'value="ok" checked="checked"' : 'value="not"';?>>
                    <span class="el-switch-style"></span> 
                </label> 
            </div>
            </div>  
            <div class="i_set_subscription_fee askaquestion" style="<?php echo filter_var($productQuestionAnswer, FILTER_SANITIZE_STRING) != '' ? 'value="'.$productQuestionAnswer.'" display:block;"' : 'display:none;';?>"> 
                <div class="i_subs_price"><input type="text" id="question_ask" class="transition prc" placeholder="<?php echo filter_var($LANG['ask_a_question_placeholder'], FILTER_SANITIZE_STRING);?>" value="<?php echo filter_var($productQuestionAnswer, FILTER_SANITIZE_STRING);?>"></div>
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
                    <input type="checkbox" name="limitslots" class="subfeea" id="limitslots" data-id="limitslots" <?php echo filter_var($productSlotsNumber, FILTER_SANITIZE_STRING) != '' ? 'value="ok" checked="checked"' : 'value="not"';?>>
                    <span class="el-switch-style"></span> 
                </label>
            </div>
            </div>  
            <div class="i_set_subscription_fee limitslots" style="<?php echo filter_var($productSlotsNumber, FILTER_SANITIZE_STRING) != '' ? 'value="'.$productSlotsNumber.'" display:block;"' : 'display:none;';?>"> 
                <div class="i_subs_price"><input type="text" id="limit_slot" class="transition prc" placeholder="10" onkeypress='return event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57)' value="<?php echo filter_var($productSlotsNumber, FILTER_SANITIZE_STRING);?>"></div>
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
                        <div class="pr_save_btna"><?php echo filter_var($LANG['save_edit'],FILTER_SANITIZE_STRING);?></div>
                    </div>
                    <!---->
                </div>
              <!--/Edit Product Columns-->      
            </div>
        </div>
        <div class="i_become_creator_box_footer tabing">
            
        </div> 
    </div> 
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
     $(document).on("click",".pr_save_btna", function(){
        var f = 'saveEditPr';
        var prID = '<?php echo filter_var($productID, FILTER_SANITIZE_STRING);?>';
        var prName = $("#pr_name").val();
        var prPrice = $("#pr_price").val();
        var prDesc = $("#pr_description").val();
        var prDescInfo = $("#pr_conf").val(); 
        var prLimitSlot = $("#limitslots").val(); 
        var prAskaQuestion = $("#askaquestion").val(); 
        var prQuestionAsk = $("#question_ask").val();
        var prLimitVal = $("#limit_slot").val();
        var data = 'f='+f+'&prnm='+prName+'&prprc='+prPrice+'&prdsc='+prDesc+'&prdscinf='+prDescInfo+ '&prid='+prID+'&lmSlot='+prLimitSlot+'&askQ='+prAskaQuestion+'&qAsk='+prQuestionAsk+'&lSlot='+prLimitVal;
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
                } else {
                    $(".i_warning").show();
                }
            }
        });
     });
})(jQuery);  
</script> 
<?php }?>