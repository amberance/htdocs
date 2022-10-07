<?php 
$aData = $iN->iN_ShowAnnouncement();
if($aData){
    $announcementID = $aData['a_id'];
    $announcementNot = $aData['a_text'];
    $announcementType = $aData['a_who_see'];
    $checkAnnouncementAcceptedBefore = $iN->iN_CheckUserAcceptedAnnouncementBefore($userID, $announcementID);
    if($checkAnnouncementAcceptedBefore){
?>
<div class="announcement_container">
    <div class="announcement_title flex_ tabing_non_justify"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('171'));?> <?php echo filter_var($LANG['announcement_title'], FILTER_SANITIZE_STRING);?></div>
    <div class="announcement_not" id="<?php echo filter_var($announcementID, FILTER_SANITIZE_STRING);?>">
       <?php echo $urlHighlight->highlightUrls($iN->sanitize_output($iN->iN_RemoveYoutubelink($announcementNot), $base_url));?> 
    </div>
    <div class="git">
        <div class="got_it flex_ tabing gotit"><?php echo filter_var($LANG['got_it'], FILTER_SANITIZE_STRING);?></div>
    </div>
</div>
<script type="text/javascript">
 (function($) {
    "use strict";
    $(document).on("click", ".gotit", function() {
        var type = 'gotAnnouncement';
        var ID = $(".announcement_not").attr("id");
        var data = 'f=' + type + '&aid=' + ID;
        $.ajax({
            type: "POST",
            url: siteurl + 'requests/request.php',
            data: data,
            cache: false,
            beforeSend: function() {

            },
            success: function(response) {
                if(response == '200'){
                    $(".announcement_container").remove();
                } 
            }
        });
    });
})(jQuery);   
</script>
<?php } }
?>