<div class="stories_wrapper flex_">
    <!---->
    <?php if($iN->iN_ShopData($userID, 1) == 'yes'){?>
        <?php if($feesStatus == '2' && $iN->iN_ShopData($userID, '8') == 'yes'){?>
       	 <!--Show it if they qualify-->
        <div class="story-view-item-fake chsStoryw" style="margin-bottom:0px; background-image:url(<?php echo filter_var($userAvatar, FILTER_SANITIZE_STRING)?>)">
            <div class="newSto">
            <div class="plusSIc">
                <div class="plstr"><?php echo $iN->iN_SelectedMenuIcon('153')?></div>
            </div>
            <?php echo filter_var($LANG['upload_storie_files'], FILTER_SANITIZE_STRING)?>
            </div>
        </div>
         <!--/End showit--> 
        <?php }else if($iN->iN_ShopData($userID, '8') == 'no'){?>
        <!--Show it if they qualify-->
        <div class="story-view-item-fake chsStoryw" style="margin-bottom:0px; background-image:url(<?php echo filter_var($userAvatar, FILTER_SANITIZE_STRING)?>)">
            <div class="newSto">
            <div class="plusSIc">
                <div class="plstr"><?php echo $iN->iN_SelectedMenuIcon('153')?></div>
            </div>
            <?php echo filter_var($LANG['upload_storie_files'], FILTER_SANITIZE_STRING)?>
            </div>
        </div>
        <!--/End showit--> 
        <?php }?>
    <?php }?>
        <!---->
        <div class="my-stories-wrapper flex_ mystoriesstyle" id="story-view">  
            <?php 
                $stories = $iN->iN_FriendStoryPost($userID);
                if($stories){ 
                foreach($stories as $mySData){
                    $SotryUploaded = isset($mySData['pics']) ? $mySData['pics'] : NULL; 
                    $up = explode(",", $SotryUploaded); 
                    $storySharedOwnerID = $mySData['uid_fk'];
                    $storieOwnerUsername = $iN->iN_GetUserName($storySharedOwnerID);
                    $storieOwnerFullName = $iN->iN_UserFullName($storySharedOwnerID);
                    $StorySharedUserAvatar = $iN->iN_UserAvatar($storySharedOwnerID,$base_url);  
                    $lastStorieImage = $iN->iN_GetLastSharedStatus($storySharedOwnerID);
                    if($lastStorieImage){ 
                            if ($s3Status == '1') {
                                $lastStoryUrl = 'https://' . $s3Bucket . '.s3.' . $s3Region . '.amazonaws.com/' . $lastStorieImage; 
                            }else if($digitalOceanStatus == '1'){
                                $lastStoryUrl = 'https://' . $oceanspace_name . '.' . $oceanregion . '.digitaloceanspaces.com/' . $lastStorieImage;
                            }else{
                                $lastStoryUrl = $base_url . $lastStorieImage; 
                            }
                    }
                    $StoryCreatedTime = $mySData['created'];
                    $storieText = $mySData['text'];
                    ?>
                    <!--Storie Started-->
                    <div class="story-view-item" style="margin-bottom:0px; background-image: url(<?php echo $lastStoryUrl;?>)" data-profile-image="<?php echo $StorySharedUserAvatar;?>" data-profile-name="<?php echo $storieOwnerFullName;?>">
                        <span class="name truncate"> <?php echo $storieOwnerFullName;?> </span>
                        <div class="story-view-pr-avatar" style="background-image: url(<?php echo $StorySharedUserAvatar;?>)"></div>
                        <ul class="media">
                    <?php   
                    foreach ($up as $item) { 
                        $stD = $iN->iN_GetUploadedStoriesDataS($item);
                        $final_Image = $stD['uploaded_file_path'];
                        $storieText = $stD['text'];
                        $storieID = $stD['s_id'];
                        $storieTextStyle = isset($stD['text_style']) ? $stD['text_style'] : 'not';
                        $imageExtensions = array("jpg", "png", "gif", "bmp","jpeg","PNG","JPG","JPEG","GIF","BMP");
                        $videoExtensions = array("mp4", "MP4"); 
                        $exts = pathinfo($final_Image, PATHINFO_EXTENSION); 
                        if ($s3Status == '1') {
                            $final_Image = 'https://' . $s3Bucket . '.s3.' . $s3Region . '.amazonaws.com/' . $final_Image; 
                        }else if($digitalOceanStatus == '1'){
                            $final_Image = 'https://' . $oceanspace_name . '.' . $oceanregion . '.digitaloceanspaces.com/' . $final_Image;
                        }else{
                            $final_Image = $base_url . $final_Image; 
                        }
                        if(in_array($exts, $videoExtensions)){
                            echo '<li class="move_'.$storieID.'" data-id="'.$storieID.'" data-sid="'.$storieID.'"  data-duration="" data-time="'.$StoryCreatedTime.'"> <video src="'.$final_Image.'" id="aample'.$storieID.'" alt="'.$storieText.'" data-id="'.$storieID.'" type="video/webm"></video> </li>';
                            echo '<script>$(document).ready(function () { setTimeout(() => { var videoDuration =  document.getElementById("aample'.$storieID.'"); var durationa = Math.round(videoDuration.duration); $(".move_'.$storieID.'").attr("data-duration", durationa); var myVideo = document.getElementById("aample'.$storieID.'"); myVideo.onloadedmetadata = function() { var myDuration = this.duration; $(".move_'.$storieID.'").attr("data-duration", myDuration);  }; }, 1000); });</script>';
                        }else{
                            echo '<li data-duration="7" data-id="'.$storieID.'" data-sid="'.$storieID.'" data-time="'.$StoryCreatedTime.'"> <img src="'.$final_Image.'" data-id="'.$storieID.'" data-ts="'.$storieTextStyle.'" alt="'.$storieText.'"></li>';
                        }
                    }?>
                        </ul>
                    </div>	  
                    <!--Storie Finished--> 
                <?php }
                
                }
            ?>
        </div>
</div>