<div class="settings_main_wrapper"> 
  <div class="i_settings_wrapper_in" style="display:inline-table;">
     <div class="i_settings_wrapper_title">
       <div class="i_settings_wrapper_title_txt flex_"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('35'));?><?php echo filter_var($LANG['dashboard'], FILTER_SANITIZE_STRING);?></div>
       <div class="i_moda_header_nt"><?php echo html_entity_decode($LANG['can_fined_some_data']);?></div>
    </div> 
    <div class="i_settings_wrapper_items"> 
         <div class="payouts_form_container"> 
            <div class="chart_row tabing flex_">
                <div class="chart_row_box">
                   <div class="chart_row_box_item c1">
                        <div class="chart_question">
                            <div class="chart_question_icon flex_ tabing"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('97'));?></div>
                            <div class="qb">
                                <div class="answer_bubble">
                                    <?php echo filter_var($LANG['premium_question_hover_display'], FILTER_SANITIZE_STRING);?>
                                </div>
                            </div>
                        </div>
                        <div class="chart_row_box_title tabing_non_justify flex_">
                            <?php echo html_entity_decode($iN->iN_SelectedMenuIcon('40')).''.filter_var($LANG['pc_ce'], FILTER_SANITIZE_STRING);?>
                        </div>
                        <div class="chart_row_box_sum"> 
                            <?php echo filter_var($currencys[$defaultCurrency].number_format($iN->iN_CalculatePremiumEarnings($userID), 2, '.', ''), FILTER_SANITIZE_STRING);?>
                        </div>
                        <div class="wmore tabing_non_justify flex_"><a href="<?php echo filter_var($base_url, FILTER_VALIDATE_URL);?>settings?tab=payments"><?php echo filter_var($LANG['view_more'], FILTER_SANITIZE_STRING).html_entity_decode($iN->iN_SelectedMenuIcon('98'));?></a></div>
                   </div>
                </div>
                <div class="chart_row_box">
                   <div class="chart_row_box_item c2">
                        <div class="chart_question">
                            <div class="chart_question_icon flex_ tabing"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('97'));?></div>
                            <div class="qb">
                                <div class="answer_bubble">
                                    <?php echo filter_var($LANG['subscribe_question_hover_display'], FILTER_SANITIZE_STRING);?>
                                </div>
                            </div>
                        </div>
                        <div class="chart_row_box_title tabing_non_justify flex_">
                            <?php echo html_entity_decode($iN->iN_SelectedMenuIcon('51')).''.filter_var($LANG['subscription_earnings'], FILTER_SANITIZE_STRING);?>
                        </div>
                        <div class="chart_row_box_sum">
                            <?php echo filter_var($currencys[$defaultCurrency], FILTER_SANITIZE_STRING).$iN->iN_CalculateSubEarnings($userID);?>  
                        </div>
                        <div class="wmore tabing_non_justify flex_"><a href="<?php echo filter_var($base_url, FILTER_VALIDATE_URL);?>settings?tab=subscription_payments"><?php echo filter_var($LANG['view_more'], FILTER_SANITIZE_STRING).html_entity_decode($iN->iN_SelectedMenuIcon('98'));?></a></div>
                   </div>
                </div>
                <div class="chart_row_box">
                   <div class="chart_row_box_item c3">
                        <div class="chart_question">
                            <div class="chart_question_icon flex_ tabing"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('97'));?></div>
                            <div class="qb">
                                <div class="answer_bubble">
                                    <?php echo filter_var($LANG['premium_question_hover_display'], FILTER_SANITIZE_STRING);?>
                                </div>
                            </div>
                        </div>
                        <div class="chart_row_box_title tabing_non_justify flex_">
                            <?php echo html_entity_decode($iN->iN_SelectedMenuIcon('77')).''.filter_var($LANG['balance'], FILTER_SANITIZE_STRING);?>
                        </div>
                        <div class="chart_row_box_sum">
                            <?php echo filter_var($currencys[$defaultCurrency].$userWallet, FILTER_SANITIZE_STRING);?>
                        </div>
                        <div class="wmore tabing_non_justify flex_"><a href="<?php echo filter_var($base_url, FILTER_VALIDATE_URL);?>settings?tab=withdrawal"><?php echo filter_var($LANG['make_withdrawal'], FILTER_SANITIZE_STRING).html_entity_decode($iN->iN_SelectedMenuIcon('98'));?></a></div>
                   </div>
                </div>
            </div>
            <div class="i_sub_not"><?php echo filter_var($LANG['current_month_earning'], FILTER_SANITIZE_STRING);?></div>
            <!--CHART-->
            <div class="chart_wrapper">
                <canvas id="myChart"></canvas>
            </div>
            <!--/CHART-->
            <div class="chart_row tabing flex_">
                <!---->
                <div class="chart_row_box flex_ tabing column">
                       <div class="revenue_sum_u"><?php echo filter_var($currencys[$defaultCurrency], FILTER_SANITIZE_STRING);?><?php echo filter_var(number_format($iN->iN_CurrentDayTotalPremiumEarningUser($userID), 2, '.', ''), FILTER_SANITIZE_STRING);?></div>
                       <div class="revenue_title_u"><?php echo filter_var($LANG['revenue_today'], FILTER_SANITIZE_STRING);?></div>
                </div>
                <!---->
                <!---->
                <div class="chart_row_box flex_ tabing column">
                       <div class="revenue_sum_u"><?php echo filter_var($currencys[$defaultCurrency], FILTER_SANITIZE_STRING);?><?php echo filter_var(number_format($iN->iN_WeeklyTotalPremiumEarningUser($userID), 2, '.', ''), FILTER_SANITIZE_STRING);?></div>
                       <div class="revenue_title_u"><?php echo filter_var($LANG['revenue_this_week'], FILTER_SANITIZE_STRING);?></div>
                </div>
                <!---->
                <!---->
                <div class="chart_row_box flex_ tabing column">
                       <div class="revenue_sum_u"><?php echo filter_var($currencys[$defaultCurrency], FILTER_SANITIZE_STRING);?><?php echo filter_var(number_format($iN->iN_CurrentMonthTotalPremiumEarningUser($userID), 2, '.', ''), FILTER_SANITIZE_STRING);?></div>
                       <div class="revenue_title_u"><?php echo filter_var($LANG['revenue_this_month'], FILTER_SANITIZE_STRING);?></div>
                </div>
                <!---->
                <!---->
                <div class="chart_row_box flex_ tabing column">
                       <div class="revenue_sum_u"><?php echo filter_var($currencys[$defaultCurrency], FILTER_SANITIZE_STRING);?><?php echo filter_var(number_format($iN->iN_CalculatePreviousMonthEarning($userID), 2, '.', ''), FILTER_SANITIZE_STRING);?></div>
                       <div class="revenue_title_u"><?php echo filter_var($LANG['revenue_last_month'], FILTER_SANITIZE_STRING);?></div>
                </div>
                <!---->
            </div>
         </div>
    </div> 
  </div>
</div> 
<?php  

$yearMonthTotalySubscriptions = $yearMonthTotalPointEarnings = $yearMonthTotalMoneyEarning = array(0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0); 
$monthlyEarningSubscriptions = mysqli_query($db,"SELECT DAY(created) - 1 , SUM(user_net_earning) AS daily_total, COUNT(*) AS ssm FROM `i_user_subscriptions` WHERE MONTH(created) = MONTH(CURDATE()) AND YEAR(created) = YEAR(CURDATE()) AND (status IN('active') OR in_status= '1') AND subscribed_iuid_fk = '$userID' GROUP BY DAY(created) ORDER BY DAY(created)") or die(mysqli_error($db)); 

while ($row = mysqli_fetch_array($monthlyEarningSubscriptions, MYSQLI_NUM)) {   
	$yearMonthTotalySubscriptions[$row[0]] = $row[1];  
}
$monthlyEarnigPointdata = mysqli_query($db,"SELECT DAY(FROM_UNIXTIME(payment_time)) - 1 , SUM(user_earning) AS daily_total, COUNT(*) AS ssm FROM `i_user_payments` WHERE MONTH(FROM_UNIXTIME(payment_time)) = MONTH(CURDATE()) AND YEAR(FROM_UNIXTIME(payment_time)) = YEAR(CURDATE()) AND payment_status = 'ok' AND payment_type IN('post','profile','point','live_stream','tips','live_gift') AND payed_iuid_fk = '$userID' GROUP BY DAY(FROM_UNIXTIME(payment_time)) ORDER BY DAY(FROM_UNIXTIME(payment_time))") or die(mysqli_error($db)); 

while ($row = mysqli_fetch_array($monthlyEarnigPointdata, MYSQLI_NUM)) {   
	$yearMonthTotalPointEarnings[$row[0]] = $row[1];  
}  

$monthlyEarnigMoneydata = mysqli_query($db,"SELECT DAY(FROM_UNIXTIME(payment_time)) - 1 , SUM(user_earning) AS daily_total, COUNT(*) AS ssm FROM `i_user_payments` WHERE MONTH(FROM_UNIXTIME(payment_time)) = MONTH(CURDATE()) AND YEAR(FROM_UNIXTIME(payment_time)) = YEAR(CURDATE()) AND payment_status = 'ok' AND payment_type IN('product') AND payed_iuid_fk = '$userID' GROUP BY DAY(FROM_UNIXTIME(payment_time)) ORDER BY DAY(FROM_UNIXTIME(payment_time))") or die(mysqli_error($db)); 

while ($row = mysqli_fetch_array($monthlyEarnigMoneydata, MYSQLI_NUM)) {   
	$yearMonthTotalMoneyEarning[$row[0]] = $row[1];  
} 
function days_in_month($month, $year){
    // calculate number of days in a month
    return $month == 2 ? ($year % 4 ? 28 : ($year % 100 ? 29 : ($year % 400 ? 28 : 29))) : (($month - 1) % 7 % 2 ? 30 : 31);
} 
?>
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
<script type="text/javascript">
$(document).ready(function(){
    var ctx = document.getElementById('myChart').getContext('2d');
    var chart = new Chart(ctx, {
    // The type of chart we want to create
    type: 'line',

    // The data for our dataset
    data: {
        labels: [<?php for($i = 0; $i < days_in_month(date('m'), date('Y')); $i++) { echo "'".($i+1)."',"; } ?>],
        datasets: [{
            label: '<?php echo filter_var($LANG['subscription_earnings'], FILTER_SANITIZE_STRING);?>',
            backgroundColor: 'rgba(250, 180, 41, 0)',
            borderColor: 'rgb(250, 180, 41)',
            fill: true,
            //lineTension: 0,
            data: <?php echo json_encode(array_values($yearMonthTotalySubscriptions));?>
        },
        {
            label: '<?php echo filter_var($LANG['point_earnings'], FILTER_SANITIZE_STRING);?>',
            backgroundColor: 'rgba(255, 99, 132, 0)',
            borderColor: 'rgb(255, 99, 132)',
            fill: true,
            //lineTension: 0,
            data: <?php echo json_encode(array_values($yearMonthTotalPointEarnings));?>
        }, 
        {
            label: '<?php echo filter_var($LANG['product_earning_t'], FILTER_SANITIZE_STRING);?>',
            backgroundColor: 'rgba(93, 81, 246, 0)',
            borderColor: 'rgb(93, 81, 246)',
            fill: true,
            //lineTension: 0,
            data: <?php echo json_encode(array_values($yearMonthTotalMoneyEarning));?>
        }]
    },

    // Configuration options go here
    options: {
        responsive:true,
        scales: {
              yAxes: [{
                  ticks: {
                      min: 0, // it is for ignoring negative step.
                      beginAtZero: true,
                      callback: function(value, index, values) {
                          return '<?php echo filter_var($currencys[$defaultCurrency], FILTER_SANITIZE_STRING);?>' + value + '';
                      }
                  }
              }]
        },
    }
});
});
</script>