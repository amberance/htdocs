<div class="settings_main_wrapper"> 
  <div class="i_settings_wrapper_in" style="display:inline-table;">
     <div class="i_settings_wrapper_title">
     <div class="i_settings_wrapper_title_txt flex_"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('138'));?><?php echo filter_var($LANG['block_country'], FILTER_SANITIZE_STRING);?></div>
       <div class="i_moda_header_nt"><?php echo filter_var($LANG['block_country_note'], FILTER_SANITIZE_STRING);?></div>
    </div> 
     <div class="i_settings_wrapper_items"> 
       <div style="display:none;">
         <?php  
            $previous = null;
            foreach($COUNTRIES as $value => $o) {
                $firstLetter = substr($iN->url_slugies($o), 0, 1);
                if($previous !== $firstLetter)  
                if($value != '0')  
                echo '</div><div class="i_first_letter"><div class="i_a_body"><div class="i_h_in">'.strtoupper($firstLetter).'</div></div></div><div class="i_b_country_container">';
                $previous = $firstLetter; 
                if($value != '0')
                $cbClass = '';
                if($iN->iN_CheckCountryBlocked($userID, $value) == 1){
                  $cbClass = 'chsed';
                } 
                echo '<div class="i_block_country_item transition bCountry '.$cbClass.'" id="'.$value.'" data-c="'.$value.'">'.$o.'</div>';
            }   
         ?>
         </div>
     </div> 
  </div>
</div>
<script type="text/javascript">
$(document).ready(function(){
  $("body").on("click",".bCountry", function(){
    var ID = $(this).attr("data-c");
    var i = $(this).attr("id");
    var type = 'bCountry';
    var data =  'f='+type+'&c='+ID;
    $.ajax({
      type: 'POST',
      url: siteurl + "requests/request.php",
      data: data,
      cache: false,
      success: function(response) {
         if(response == '1'){
           $("#"+i).addClass('chsed');
         }else{
           $("#"+i).removeClass('chsed');
         }
      } 
    });
  });
});
</script>