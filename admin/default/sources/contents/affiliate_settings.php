<div class="i_contents_container">
    <div class="i_general_white_board border_one column flex_ tabing__justify">
       <!---->
       <div class="i_general_title_box">
         <?php echo filter_var($LANG['affiliate_settings'], FILTER_SANITIZE_STRING);?>
       </div>
       <!---->
       <!---->
       <div class="i_general_row_box column flex_" id="business_conf">
            <!---->
            <div class="i_general_row_box_item flex_ tabing_non_justify">
                <div class="irow_box_left tabing flex_"><?php echo filter_var($LANG['affilate_status'], FILTER_SANITIZE_STRING);?></div>
                <div class="irow_box_right">
                    <!---->
                    <div class="i_checkbox_wrapper flex_ tabing_non_justify"> 
                            <label class="el-switch el-switch-yellow" for="affilateStatus">
                            <input type="checkbox" name="affilateStatus" class="chmdPost" id="affilateStatus" <?php echo filter_var($affilateSystemStatus, FILTER_SANITIZE_STRING) == 'yes' ? 'value="no" checked="checked"' : 'value="yes"';?>>
                            <span class="el-switch-style"></span>  
                            </label> 
                            <input type="hidden" name="affilateStatus" class="affilateStatus" value="<?php echo filter_var($affilateSystemStatus, FILTER_SANITIZE_STRING);?>"> 
                        <div class="success_tick tabing flex_ sec_one affilateStatus"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('69'));?></div>
                    </div>
                    <!---->  
                </div>
            </div>
            <!----> 
         <form enctype="multipart/form-data" method="post" id="affilateSet">
                <!---->
                <div class="i_general_row_box_item flex_ tabing_non_justify">
                    <div class="irow_box_left tabing flex_"><?php echo filter_var($LANG['minimum_point_transfer'], FILTER_SANITIZE_STRING);?></div>
                    <div class="irow_box_right">
                        <input type="text" name="minpointtransfer" class="i_input flex_" value="<?php echo filter_var($minimumPointTransferRequest, FILTER_SANITIZE_STRING);?>">
                        <div class="rec_not" style="padding-top:5px;"><?php echo filter_var($LANG['minimum_point_transfer_the_user_can_request'], FILTER_SANITIZE_STRING);?></div>
                    </div>
                </div>
                <!---->
                <!---->
                <div class="i_general_row_box_item flex_ tabing_non_justify">
                    <div class="irow_box_left tabing flex_"><?php echo filter_var($LANG['amount'], FILTER_SANITIZE_STRING);?></div>
                    <div class="irow_box_right">
                        <input type="text" name="affilateamount" class="i_input flex_" value="<?php echo filter_var($affilateAmount, FILTER_SANITIZE_STRING);?>">
                        <div class="rec_not" style="padding-top:5px;"><?php echo filter_var($LANG['price_each_new_referred_users'], FILTER_SANITIZE_STRING);?></div>
                    </div>
                </div>
                <!---->

            <div class="i_settings_wrapper_item successNot"><?php echo filter_var($LANG['updated_successfully'], FILTER_SANITIZE_STRING);?></div>
            <div class="i_general_row_box_item flex_ tabing_non_justify"> 
                <input type="hidden" name="f" value="updateAffilate">
                <button type="submit" name="submit" class="i_nex_btn_btn transition"><?php echo filter_var($LANG['save_edit'], FILTER_SANITIZE_STRING);?></button>
            </div>
         </form>
       </div>
       <!---->
    </div>
</div> 