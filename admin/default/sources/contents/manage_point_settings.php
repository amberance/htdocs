<div class="i_contents_container">
    <div class="i_general_white_board border_one column flex_ tabing__justify">
       <!---->
       <div class="i_general_title_box">
         <?php echo filter_var($LANG['manage_point_settings'], FILTER_SANITIZE_STRING);?>
       </div>
       <!----> 
       <!---->
       <div class="i_general_row_box column flex_" id="general_conf" style="padding-top:30px;"> 
       <!---->
       <div class="i_general_row_box_item flex_ tabing_non_justify">
            <div class="irow_box_left tabing flex_"><?php echo filter_var($LANG['users_can_earn_point_status'], FILTER_SANITIZE_STRING);?></div>
            <div class="irow_box_right">
                <!---->
                <div class="i_checkbox_wrapper flex_ tabing_non_justify"> 
                    <label class="el-switch el-switch-yellow" for="pointSystemStatus">
                        <input type="checkbox" name="pointSystemStatus" class="chmdPost" id="pointSystemStatus" <?php echo filter_var($earnPointSystemStatus, FILTER_SANITIZE_STRING) == 'yes' ? 'value="no" checked="checked"' : 'value="yes"';?>>
                    <span class="el-switch-style"></span>  
                    </label> 
                    <input type="hidden" name="pointSystemStatus" class="pointSystemStatus" value="<?php echo filter_var($earnPointSystemStatus, FILTER_SANITIZE_STRING);?>"> 
                <div class="success_tick tabing flex_ sec_one pointSystemStatus"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('69'));?></div>
            </div>
                <!---->  
            </div>
        </div>
        <!----> 
       <form enctype="multipart/form-data" method="post" id="epdSettings">
        <!---->
        <div class="i_general_row_box_item">
            <div class="i_general_row_box_item flex_ tabing_non_justify">
                <div class="irow_box_left tabing flex_">How many points can 1 person earn in a day?</div>
                <div class="irow_box_right">
                    <!----> 
                    <div class="irow_box_right">
                        <input type="text" name="max_point_amount" class="i_input flex_" value="<?php echo $iN->iN_Secure($maximumPointInADay);?>"> 
                    </div>
                    <!---->  
                </div>
            </div>
        </div>
        <!---->
            <?php 
               $EarnPointData = $iN->iN_GetUserEarnPointData($userID);
               if($EarnPointData){
                   foreach($EarnPointData as $EPD){
                       $epd_ID = $EPD['i_af_id'];
                       $epd_Type = $EPD['i_af_type'];
                       $epd_amount = $EPD['i_af_amount'];
                       $epd_status = $EPD['i_af_status'];
                       $namType = 'point_'.$epd_Type; 
                       $namAmount = 'point_'.$epd_Type.'_amount';
                       $valueChecked = "value = 'no'";
                       if($epd_status == 'yes'){
                          $valueChecked = 'checked = "checked" value="yes"';
                       }
            ?>
            <!---->
            <div class="i_general_row_box_item" id="<?php echo filter_var($epd_ID, FILTER_SANITIZE_STRING);?>">
                <div class="i_general_row_box_item flex_ tabing_non_justify">
                    <div class="irow_box_left tabing flex_"><?php echo filter_var($LANG[$namType], FILTER_SANITIZE_STRING);?></div>
                    <div class="irow_box_right">
                        <!---->
                        <div class="i_checkbox_wrapper flex_ tabing_non_justify"> 
                                <label class="el-switch el-switch-yellow" for="<?php echo filter_var($epd_Type); ?>SystemStatus">
                                <input type="checkbox" name="<?php echo filter_var($epd_Type); ?>SystemStatus" class="chmdPoint" id="<?php echo filter_var($epd_Type); ?>SystemStatus" <?php echo html_entity_decode($valueChecked);?>>
                                <span class="el-switch-style"></span>  
                                </label>  
                            <div class="success_tick tabing flex_ sec_one <?php echo filter_var($epd_Type); ?>SystemStatus"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('69'));?></div>
                        </div>
                        <!---->  
                    </div>
                </div>
                <div class="i_general_row_box_item flex_ tabing_non_justify">
                    <div class="irow_box_left tabing flex_"><?php echo filter_var($LANG[$namAmount], FILTER_SANITIZE_STRING);?></div>
                    <div class="irow_box_right">
                        <!----> 
                        <div class="irow_box_right">
                            <input type="text" name="<?php echo filter_var($epd_Type); ?>_amount" class="i_input flex_" value="<?php echo filter_var($epd_amount, FILTER_SANITIZE_STRING);?>"> 
                        </div>
                        <!---->  
                    </div>
                </div>
            </div>
            <!---->
            <?php       }
               } 
            ?> 
            <!---->
            <div class="i_general_row_box_item flex_ tabing_non_justify"> 
                <input type="hidden" name="f" value="epdSettings">
                <button type="submit" name="submit" class="i_nex_btn_btn transition"><?php echo filter_var($LANG['save_edit'], FILTER_SANITIZE_STRING);?></button>
            </div>
            <!---->
        </form> 
        <div class="i_settings_wrapper_item successNot"><?php echo filter_var($LANG['updated_successfully'], FILTER_SANITIZE_STRING);?></div>
       </div>
       <!---->       
    </div>
</div> 
<script type="text/javascript">
(function($) {
    "use strict";
    var preLoadingAnimation = '<div class="i_loading" style="margin-bottom:20px"><div class="dot-pulse"></div></div>';
    var plreLoadingAnimationPlus = '<div class="loaderWrapper"><div class="loaderContainer"><div class="loader">' + preLoadingAnimation + '</div></div></div>';
/*Change Module Statuses*/
    $(document).on("change", ".chmdPoint", function() {
        var type = $(this).attr("id");
        var value = $(this).val(); 
        if (value == 'yes') {
            $("#" + type).val('no');
            $("." + type).val('no');
        } else {
            $("." + type).val('yes');
            $("#" + type).val('yes');
        } 
    });
    $(document).on('submit', '#epdSettings', function(e) {
        e.preventDefault();
        var epdSettings = $('#epdSettings');
        jQuery.ajax({
            type: "POST",
            url: siteurl + "request/request.php",
            data: epdSettings.serialize(),
            beforeSend: function() {
                $(".warning_two , .successNot , .warning_one").hide();
                $("#general_conf").append(plreLoadingAnimationPlus);
                epdSettings.find(':input[type=submit]').prop('disabled', true);
            },
            success: function(data) {
                setTimeout(() => {
                    epdSettings.find(':input[type=submit]').prop('disabled', false);
                }, 3000);
                if (data == '200') {
                    $(".successNot").show();
                } else if (data == '1') {
                    $(".warning_two").show();
                } else if (data == '2') {
                    $(".warning_one").show();
                } else if (data == '404') {
                    $(".warning_").show();
                } else {
                    $("body").append('<div class="nnauthority"><div class="no_permis flex_ c3 border_one tabing">' + data + '</div></div>');
                    setTimeout(() => {
                        $(".nnauthority").remove();
                    }, 5000);
                }
                $(".loaderWrapper").remove();
            }
        });
    });
})(jQuery);
</script>