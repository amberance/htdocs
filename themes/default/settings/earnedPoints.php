<div class="settings_main_wrapper"> 
  <div class="i_settings_wrapper_in" style="display:inline-table;">
     <div class="i_settings_wrapper_title">
       <div class="i_settings_wrapper_title_txt flex_"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('151'));?><?php echo filter_var($LANG['earned_points'], FILTER_SANITIZE_STRING);?></div> 
    </div> 
    <div class="i_settings_wrapper_items"> 
    <div class="payouts_form_container"> 
        <!---->
        <div class="next_payout">
            <div class="next_payout_title"><?php echo filter_var($LANG['how_to_earn_points'], FILTER_SANITIZE_STRING);?></div>
            <div class="next_payout_not">
                <?php echo filter_var($LANG['how_to_earn_not'], FILTER_SANITIZE_STRING);?>
                <?php echo html_entity_decode($LANG['how_to_earn_not_list']);?>
            </div>
        </div>
        <!---->
    <div class="point_earn_list_wrapper">  
        <?php 
           $pointFeatures = $iN->iN_GetUserEarnPointList($userID);
           if($pointFeatures){
              foreach($pointFeatures as $pda){
                  $iaType = $pda['i_af_type'];
                  $iaAmount = $pda['i_af_amount'];
                  if($iaType == 'comment'){
                     $tyIcon = $iN->iN_SelectedMenuIcon('20');
                  }else if($iaType == 'post_like'){
                    $tyIcon = $iN->iN_SelectedMenuIcon('18');
                  }else if($iaType == 'comment_like'){
                    $tyIcon = $iN->iN_SelectedMenuIcon('17');
                  }else {
                    $tyIcon = $iN->iN_SelectedMenuIcon('67');
                  }  
                  $theEarnTitle = $iaType.'_earn';
                  $totalPointToday = $iN->iN_TodayEarnedPoint($userID, $iaType);
                  $totalPointAll = $iN->iN_CalculateTotalPointTypeEarningAll($userID, $iaType);
        ?>
            <!---->
            <div class="point_earn_box_cont">
                  <div class="point_earn_box_cont_in">
                      <div class="point_earn_icon_cont flex_ tabing">
                          <div class="point_earn_icon_wrp flex_ tabing"><?php echo html_entity_decode($tyIcon);?></div>
                      </div>
                      <div class="point_earn_footer">
                          <div class="point_earn_title_item"><?php echo filter_var($LANG[$theEarnTitle], FILTER_SANITIZE_STRING);?></div>
                          <div class="point_earn_list_wrp"> 
                              <div class="earn_title_point"><?php echo filter_var($LANG['today_earned_point'], FILTER_SANITIZE_STRING);?> <?php echo filter_var(number_format($totalPointToday, 2, '.', ''), FILTER_SANITIZE_STRING);?></div>
                              <div class="earn_title_point"><?php echo filter_var($LANG['total_earned_point'], FILTER_SANITIZE_STRING);?> <?php echo filter_var(number_format($totalPointAll, 2, '.', ''), FILTER_SANITIZE_STRING);?></div>
                          </div>
                      </div>
                  </div>
            </div>
            <!----> 
        <?php } }?> 
    </div>
    <div class="tabing flex_">
        <div class="iu_affilate_link">
            <div class="move_my_point_to_balance move_my_point"><?php echo filter_var($LANG['move_earnings_to_point_balance'], FILTER_SANITIZE_STRING);?></div>
        </div>
    </div>
    <div class="minimum_amount flex_"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('60'));?><?php echo filter_var($LANG['not_for_point_earn'], FILTER_SANITIZE_STRING);?></div>
    <div class="i_settings_wrapper_item successNot">
       
    </div>    
</div>
    </div>  
  </div>
</div>  
<?php 
  $commentPCount = $iN->iN_CalculateTotalPointTypeEarningAll($userID, 'comment');
  $postPLikeCount = $iN->iN_CalculateTotalPointTypeEarningAll($userID, 'post_like');
  $commentPLikeCount = $iN->iN_CalculateTotalPointTypeEarningAll($userID, 'comment_like');
  $newPostPCount = $iN->iN_CalculateTotalPointTypeEarningAll($userID, 'new_post');
  $allTotalPoint = $commentPCount + $postPLikeCount + $newPostPCount + $commentPLikeCount;
?>
<script type="text/javascript">
 (function($) {
    "use strict";
    $(document).on("click", ".move_my_point", function() {
        var type = 'moveMyEarnedPoints'; 
        var point = '<?php echo $allTotalPoint;?>';
        var data = 'f=' + type + '&myp=' + point;
        $.ajax({
            type: "POST",
            url: siteurl + 'requests/request.php',
            data: data,
            cache: false,
            beforeSend: function() {
                $(".move_my_point").hide().css("pointer-events", "none");
                $(".successNot").text('').hide();
            },
            success: function(response) {
                if (response == 'me') {
                    PopUPAlerts('sRong', 'ialert');
                }else if(response == 'ok'){
                    location.reload();
                } else {
                  $(".successNot").text(response).show();
                }
                setTimeout(() => {
                    $(".move_my_point").show().css("pointer-events", "auto");
                }, 2000);

            }
        });
    });
  })(jQuery);  
 </script>    