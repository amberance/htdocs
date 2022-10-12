<div class="hitHeader border_one flex_">
   <div class="tabing flex_ border_two clps"><div class="collapse_left"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('100'));?></div></div>
   <div class="header_right_menu flex_ tabing">
       <div class="header_right_item flex_ tabing"><a href="<?php echo filter_var($base_url, FILTER_VALIDATE_URL);?>"><div class="item_icon border_two flex_ tabing"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('99'));?></div></a></div>
       <div class="header_right_item"><a href="<?php echo filter_var($base_url, FILTER_VALIDATE_URL).$userName;?>"><div class="item_icon border_two flex_ tabing"><img src="<?php echo filter_var($userAvatar, FILTER_VALIDATE_URL);?>"></div></a></div>
   </div>
</div> 
<?php 
//    if($cURL == false){


// This checks for an update, and then if an update is needed, check for the key. If there's no key, it sends you to belegal.

    if(false){
        echo '<div class="hitHeader border_one flex_" style="margin-top:10px;background-color:#f65169;font-size:13px; color:#ffffff;">It looks like the cURL PHP extension is not installed on your server. Please install the cURL php extension.</div>';
    }else{
        //$url = $iN->iN_fetchDataFromURL(base64_decode('aHR0cHM6Ly93d3cuaW15b3VyZnVuLmNvbS9jaGVja21lLnBocA=='));
        $url = '{"data":[{"ID":"1","version":"3.5.1","Content":"Dizzy Content Creator Script", "Message":"header php" }]}';
        $json = json_decode($url); 
        

        
        if($json->data[0]->version != $version && $json->data[0]->version > $version){
            echo '<div class="hitHeader border_one flex_" style="margin-top:10px;background-color:green;font-size:13px; color:#ffffff;">A new update has been detected. You can download the updated files by clicking <a style="margin-left:5px;color:yellow;font-weight:600;" href="https://codecanyon.net/downloads">HERE</a>.</div>';
            //if($cURL == TRUE){
                //$url = $iN->iN_fetchDataFromURL(base64_decode('aHR0cHM6Ly93d3cuaW15b3VyZnVuLmNvbS9jaGVja2Vycy9zaWcucGhwP3ByQ29kZT0=').$mycd); 
                
                
                
                
                //$json = json_decode($url); 
                
                //$getWebsite = isset($json->data[0]->purchase_code) ?  $json->data[0]->purchase_code : NULL;
                //if(!$getWebsite){
                //    mysqli_query($db,"UPDATE i_configurations SET mycd = NULL , mycd_status = '0' WHERE configuration_id = '1'") or die(mysqli_error($db));
                //    header('Location:' . $base_url . base64_decode('YmVsZWdhbA=='));
                //} 
            //}
        }
    }
?> 