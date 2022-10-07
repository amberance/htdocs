<div class="th_middle">
   <div class="pageMiddle">
       <?php   
          $talingAbout = $iN->iN_CaltulateHashFromDatabase($pageFor);
          echo '<div id="moreType" data-type="'.$page.'" data-hash="'.$iN->url_Hash($pageFor).'">'; 
          echo '<div class="i_postSavedHeader isave_svg">
          <span class="isave_svg tabing_non_justify flex_">'.$iN->iN_SelectedMenuIcon('135').$pageFor.'</span>
          <div class="i_postHashHeader tabing_non_justify flex_">'.preg_replace( '/{.*?}/', $talingAbout, $LANG['talking_about']).'</div>
          </div>'; 
          include("posts/htmlPosts.php");
          echo '</div>';
       ?> 
   </div>
</div>
<script type="text/javascript">
function videoEnded() {
        alert('Video Ended');
    }
</script>
