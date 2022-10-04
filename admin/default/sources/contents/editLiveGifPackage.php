<?php  
$planData = $iN->GetLivePlanDetails($planID); 
$planID = $planData['gift_id'];
$planNameKey = $planData['gift_name'];
$planPoint = $planData['gift_point'];
$planStatus = $planData['gift_status'];
$planAmount = $planData['gift_money_equal'];
$giftImage = $planData['gift_image'];
$giftAnimationImage = isset($planData['gift_money_animation_image']) ? $planData['gift_money_animation_image'] : NULL;
?>
<div class="i_contents_container">
    <div class="i_general_white_board border_one column flex_ tabing__justify" style="max-width:700px;margin:0px auto;">
        <!---->
        <div class="i_general_title_box">
          <?php echo filter_var($LANG['edit_live_package'], FILTER_SANITIZE_STRING);?>
        </div> 
        <!---->
        <div class="i_general_row_box column flex_" id="general_conf" style="padding-top:30px;">  
        <div class=""></div>
        <div class="i_p_e_body" style="margin-bottom:0px;">
           <!---->
           <div class="i_general_row_box_item flex_ tabing_non_justify" id="sec_logo"> 
              <div class="irow_box_right" style="padding-left:0px;">
                  <div class="add_app_not_point"><?php echo filter_var($LANG['update_gift_avatar'], FILTER_SANITIZE_STRING);?></div>
                  <div class="certification_file_box flex_ tabing_non_justify" style="padding:0px;">
                  <form id="giftImageUploadForm" class="options-form" method="post" enctype="multipart/form-data" action="<?php echo filter_var($base_url, FILTER_SANITIZE_STRING);?>admin/<?php echo filter_var($adminTheme, FILTER_SANITIZE_STRING);?>/request/request.php">
                      <label for="gift_image">
                          <?php echo html_entity_decode($iN->iN_SelectedMenuIcon('79')); echo filter_var($LANG['u_ads_image'], FILTER_SANITIZE_STRING);?>
                          <input type="file" id="gift_image" name="uploading[]" data-id="GiftFile" data-type="adsType" style="display:none; opacity:0;">
                      </label> 
                  </form>
                  <div class="success_tick tabing flex_ adsType"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('69'));?></div>
                  </div> 
              </div>
            </div>
            <!----> 
            <!---->
            <div class="i_general_row_box_item flex_ tabing_non_justify" id="sec_logo"> 
              <!----> 
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
                <!---->
            </div>
            <!----> 
        </div> 
        <form enctype="multipart/form-data" method="post" id="editLivePointPackage">
        <!--*********************************--> 
         <div class="i_p_e_body" style="padding:15px;">
           <div class="warning_wrapper pk_wraning"><?php echo filter_var($LANG['all_fields_must_be_filled'], FILTER_SANITIZE_STRING);?></div>
           <div class="add_app_not_point"><?php echo isset($LANG['gift_name']) ? $LANG['gift_name'] : 'NaN';?></div>
           <div class="i_plnn_container flex_">    
              <input type="text" name="planKey" class="point_input" value="<?php echo filter_var($planNameKey, FILTER_SANITIZE_STRING);?>">
           </div> 
           <div class="add_app_not_point"><?php echo filter_var($LANG['gift_point'], FILTER_SANITIZE_STRING);?></div>
           <div class="i_plnn_container flex_">    
              <?php echo html_entity_decode($iN->iN_SelectedMenuIcon('40'));?>
              <input type="text" name="planPoint" class="point_input pnt" style="padding-left:50px;" onkeypress="return event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57)" value="<?php echo filter_var($planPoint, FILTER_SANITIZE_STRING);?>">
           </div> 
           <div class="add_app_not_point"><?php echo filter_var($LANG['pay_cost'], FILTER_SANITIZE_STRING);?></div>
           <div class="i_plnn_container flex_">   
              <div class="rec_not"><?php echo $currencys[$defaultCurrency];?><span class="totsm"><?php echo filter_var($planAmount, FILTER_SANITIZE_STRING);?></span></div>
           </div>
           <div class="i_become_creator_box_footer">
                <input type="hidden" name="f" value="editLivePlan"> 
                <input type="hidden" name="giftFile" id="giftFile" value="<?php echo filter_var($giftImage, FILTER_SANITIZE_STRING);?>">
                <input type="hidden" name="GiftAnimationFile" id="GiftAnimationFilea" value="<?php echo filter_var($giftAnimationImage, FILTER_SANITIZE_STRING);?>">
                <input type="hidden" name="planid" value="<?php echo filter_var($planID, FILTER_SANITIZE_STRING);?>"> 
                <input type="hidden" name="pointAmount" class="pamnt" value="<?php echo filter_var($planAmount, FILTER_SANITIZE_STRING);?>">
                <button type="submit" name="submit" class="i_nex_btn_btn transition" id="update_myprofile"><?php echo filter_var($LANG['save_edit'], FILTER_SANITIZE_STRING);?></button>
            </div>
        </div> 
        <!--*********************************-->
 
        </form>
    </div>  
<script type="text/javascript">
    $(document).ready(function(){
        $("body").on("keyup",".pnt", function(){
            var inputPointVal = $(this).val();
            var translatePointToMoney = inputPointVal * '<?php echo $onePointEqual;?>';
            $(".totsm").html(translatePointToMoney);
            $("input[name=pointAmount]").val(translatePointToMoney);
        });
    });
</script>    
</div>