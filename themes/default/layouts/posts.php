<div class="th_middle">
   <div class="pageMiddle">
       <?php 
          //if($agoraStatus == '1' && $page != 'profile'){include("live/live_streamings.php");}
          if($logedIn == 0){
             include("posts/welcomebox.php");
          }else{
             if($page != 'profile'){
               echo html_entity_decode($verStatus);
               /*Announcement*/
               include("widgets/announcement.php");
               /*Announcement*/
               if($iN->iN_StoryData($userID, '1') == 'yes'){
                  if($iN->iN_StoryData($userID, '4') == 'yes' && $feesStatus == '2'){
                     include("storie/stories.php");
                  }else if($iN->iN_StoryData($userID, '4') == 'no'){
                     include("storie/stories.php");
                  }
               }  
               if($normalUserCanPost == 'yes'){
                  include("posts/postForm.php");
               }else if($feesStatus == '2'){ 
                  include("posts/postForm.php");
               } 
             } 
          } 
          $files = array(
            1 => 'suggestedusers');
            shuffle($files);
      
            for ($i = 0; $i < 1; $i++) {
               include "random_boxs/$files[$i].php";
            }
         if($agoraStatus == '1' && $page != 'profile'){include("live/current_live_streamings.php");}
          $pCat = isset($pCat) ? $pCat : NULL;
          echo '<div id="moreType" data-type="'.$page.'" data-po="'.$pCat.'">';  
          include("posts/htmlPosts.php");
          echo '</div>';
       ?>
   </div>
</div>
<script type="text/javascript">
function videoEnded() {
        //alert('Video Ended');
    }
</script> 
