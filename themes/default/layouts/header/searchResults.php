<?php 
if($searchValueFromData){
echo '<div class="r_u_s">'.filter_var($LANG['users_found'], FILTER_SANITIZE_STRING).'</div>';
  foreach($searchValueFromData as $sRData){
      $resultUserID = $sRData['iuid'];
      $resultUserName = $sRData['i_username'];
      $resultUserFullName = $sRData['i_user_fullname'];
      if($fullnameorusername == 'no'){
        $resultUserFullName = $resultUserName; 
      }
      $profileUrl = $base_url.$resultUserName;
      $resultUserAvatar = $iN->iN_UserAvatar($resultUserID, $base_url);
?>
<div class="i_message_wrpper">
<a href="<?php echo filter_var($profileUrl, FILTER_VALIDATE_URL);?>">
<div class="i_message_wrapper transition">
    <div class="i_message_owner_avatar"> 
        <div class="i_message_avatar"><img src="<?php echo filter_var($resultUserAvatar, FILTER_SANITIZE_STRING);?>" alt="<?php echo filter_var($resultUserFullName, FILTER_SANITIZE_STRING);?>"></div>
    </div> 
    <div class="i_message_info_container">
        <div class="i_message_owner_name"><?php echo filter_var($resultUserFullName, FILTER_SANITIZE_STRING);?></div> 
    </div> 
</div>
</a> 
</div>
<?php }
}
?> 

<?php 
if(isset($mentionSearchValueFromData)){
    echo '<div class="r_u_s">'.filter_var($LANG['hashtags_found'], FILTER_SANITIZE_STRING).'</div>';
    $perpage_page = '5';
    $i = 0;
    // Make one string
    $mentionSearchValueFromData = implode(',', $mentionSearchValueFromData[0]);
    // Then explode() it
    $mentionSearchValueFromData = explode(',', $mentionSearchValueFromData[0]);
    $count = array_count_values(array_filter($mentionSearchValueFromData));
    // Sort them by hashtags 
    arsort($count);
    foreach($count as $data => $value) {
    $trendtag = $data;
    //$count= array_flip($count);
    if($i == $perpage_page) break; // Display and break when limited hit hashtags
        if($data) {
            $TrendingTag = $searchValue;
            $TotalUniqTag = $value;
        ?>
           <div class="i_message_wrpper">
                <a href="<?php echo filter_var($base_url.'hashtag/'.$TrendingTag, FILTER_VALIDATE_URL);?>">
                <div class="i_message_wrapper transition"> 
                    <div class="i_message_info_container">
                        <div class="i_message_owner_name">#<?php echo filter_var($searchValue, FILTER_SANITIZE_STRING);?></div> 
                    </div> 
                </div>
                </a> 
            </div>
        <?php } else {?>
            <div class="i_message_wrpper">
                <a href="<?php echo filter_var($base_url.'hashtag/'.$TrendingTag, FILTER_VALIDATE_URL);?>">
                <div class="i_message_wrapper transition"> 
                    <div class="i_message_info_container">
                        <div class="i_message_owner_name">#<?php echo filter_var($searchValue, FILTER_SANITIZE_STRING);?></div> 
                    </div> 
                </div>
                </a> 
            </div>
        <?php }
        $i++;
    }
}
?>
 