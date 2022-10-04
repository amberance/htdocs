<?php  
$checkUserPurchasedThisLiveStream = '1';
if($userID != $liveCreator){
    $checkUserPurchasedThisLiveStream = $iN->iN_CheckUserPurchasedThisLiveStream($userID, $liveID);
} 
if($checkUserPurchasedThisLiveStream || $userType == '2'){?>
<div class="live_wrapper_tik" id="<?php echo filter_var($liveID, FILTER_SANITIZE_STRING);?>">
    <div class="live_left">
        <!---->
        <div class="live_left_in_wrapper"> 
            <div class="live_left_in_holder">
                <!--Menu-->
                <a href="<?php echo filter_var($base_url, FILTER_VALIDATE_URL);?>">
                 <div class="i_left_menu_box transition">
                    <?php echo html_entity_decode($iN->iN_SelectedMenuIcon('99'));?> <div class="m_tit"><?php echo filter_var($LANG['home_page'], FILTER_SANITIZE_STRING);?></div>
                 </div> 
                 </a>
                 <!--/Menu-->
                 <!--Menu--> 
                 <div class="i_left_menu_box transition g_feed" data-get="friends" data-type="moreposts">
                    <?php echo html_entity_decode($iN->iN_SelectedMenuIcon('7'));?> <div class="m_tit"><?php echo filter_var($LANG['newsfeed'], FILTER_SANITIZE_STRING);?></div>
                 </div> 
                 <!--/Menu-->
                 <!--Menu--> 
                 <div class="i_left_menu_box transition g_feed" data-get="allPosts" data-type="moreexplore">
                    <?php echo html_entity_decode($iN->iN_SelectedMenuIcon('8'));?> <div class="m_tit"><?php echo filter_var($LANG['explore'], FILTER_SANITIZE_STRING);?></div>
                 </div>  
                 <!--/Menu-->
                 <!--Menu--> 
                 <div class="i_left_menu_box transition g_feed" data-get="premiums" data-type="morepremium">
                    <?php echo html_entity_decode($iN->iN_SelectedMenuIcon('9'));?> <div class="m_tit"><?php echo filter_var($LANG['premium'], FILTER_SANITIZE_STRING);?></div>
                 </div> 
                 <!--/Menu-->
                 <!--Menu--> 
                 <a href="<?php echo filter_var($base_url, FILTER_VALIDATE_URL);?>creators">
                  <div class="i_left_menu_box transition">
                     <?php echo html_entity_decode($iN->iN_SelectedMenuIcon('95'));?> <div class="m_tit"><?php echo filter_var($LANG['our_creators'], FILTER_SANITIZE_STRING);?></div>
                  </div> 
                 </a>
                 <!--/Menu-->
                 <!---->
                 <div class="live_suggested_lives_wrapper">
                     <?php include "live_list_widget.php";?>
                 </div>
                 <!---->
            </div>    
        </div>
        <!---->
    </div>
    <div class="live_right">
       <div class="live_right_in_wrapper">
           <!---->
           <div class="live_right_in_left">
               <!---->
               <div class="live_video_header">
                  <div class="live_creator_avatar_live flex_ tabing"><a class="flex_ alignItem" href="<?php echo $base_url.$liveCreatorUserName;?>" target="blank_"><img src="<?php echo filter_var($liveCreatorAvatar, FILTER_SANITIZE_STRING);?>"></a></div>
                  <div class="live_creator_live_name_live_username">
                      <div class="live_creator_live_username"><a class="flex_ alignItem exen loi" href="<?php echo $base_url.$liveCreatorUserName;?>" target="blank_"><?php echo filter_var($liveCreatorFullname, FILTER_SANITIZE_STRING);?></a></div>
                      <div class="live_creator_live_name flex_ tabing"><?php echo $siteTitle;?>  <?php echo html_entity_decode($iN->iN_SelectedMenuIcon('15'));?><span class="sumonline">0</span></div>
                  </div>
                  <div class="live_header_in_right flex_ tabing">
                      <div class="live_owner_flw_btn">
                        <?php if ($p_friend_status != 'subscriber' && $p_friend_status != 'me' && $p_friend_status != 'flwr') {?>
                            <div class="i_fw<?php echo filter_var($liveCreator, FILTER_SANITIZE_STRING); ?> transition <?php echo filter_var($flwrBtn, FILTER_SANITIZE_STRING); ?>" id="i_btn_like_item" data-u="<?php echo filter_var($liveCreator, FILTER_SANITIZE_STRING); ?>">
                            <?php echo html_entity_decode($flwBtnIconText); ?> 
                            </div>
                        <?php }?>
                      </div>
                      <div class="live_mics_cameras flex_ tabing">
                          <?php if($userID == $liveCreator){ ?>
                            <div class="i_header_btn_item topPoints transition cameli">
                              <div class="i_h_in_live camera_chs">
                                 <div class="camList cam-list" id="camera-list"></div>
                                 <?php echo html_entity_decode($iN->iN_SelectedMenuIcon('137'));?>
                              </div>
                            </div>
                            <div class="i_header_btn_item topPoints transition cameli">
                                <div class="i_h_in_live mick_chs">
                                    <div class="micList mic-list" id="camera-list"></div>
                                    <?php echo html_entity_decode($iN->iN_SelectedMenuIcon('152'));?>
                                </div>
                            </div>
                            <div class="i_header_btn_item topPoints transition">
                                <div class="i_h_in_live camcloseCall"> 
                                    <?php echo html_entity_decode($iN->iN_SelectedMenuIcon('172'));?>
                                </div>
                            </div>
                          <?php }?>
                      </div>
                  </div> 
               </div>
               <!---->
               <!---->
               <div class="live__live_video_holder">
                    <div class="live_vide__holder"> 
                       <div class="filtvid flex_ player" id="<?php echo 'local-player';//if($liveCreator == $userID){echo 'main_live_video';}else{echo 'post_live_video';}?>">
                       <?php if($userID != $liveCreator){ ?>
                       <div class="col cola" stlye="display:none;">
                            <p id="local-player-name" class="player-name" style="display:none;"></p> 
                        </div>
                       <div class="w-100" stlye="display:none;"></div>
                        <div class="col">
                            <div id="remote-playerlist"></div>
                        </div>
                        <?php }?>
                    </div>
                       <div class="live_holder_plus_in">
                         <div class="holder_l_in flex_ tabing">
                             <?php if($userID == $liveCreator){ ?>
                             <div class="button-group"> 
                                <button id="mute-audio" type="button" class="flex_ tabing"><?php echo filter_var($LANG['mute_audio'], FILTER_SANITIZE_STRING);?></button>
                                <button id="mute-video" type="button" class="flex_ tabing"><?php echo filter_var($LANG['mute_video'], FILTER_SANITIZE_STRING);?></button>
                             </div>
                             <?php }?>
                             <div class="live_pulse">LIVE</div>
                             <!---->
                             <div class="live_like_t">
                                <div class="like_live flex_ <?php echo filter_var($likeClass, FILTER_SANITIZE_STRING);?>" id="p_l_l_<?php echo filter_var($liveID, FILTER_SANITIZE_STRING);?>" data-id="<?php echo filter_var($liveID, FILTER_SANITIZE_STRING);?>">
                                    <?php echo html_entity_decode($likeIcon);?>
                                </div>
                                <div class="lp_sum_l flex_ tabing" id="lp_sum_l_<?php echo filter_var($liveID, FILTER_SANITIZE_STRING);?>"><?php echo filter_var($likeSum, FILTER_SANITIZE_STRING);?></div>
                             </div>
                             <!---->
                             <?php if($userID != $liveCreator){ ?>
                             <div class="live_gift_call flex_ tabing"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('145'));?></div>
                             <?php }?>
                         </div>
                       </div>
                    </div>
                    <div class="live_footer_holder">
                        <?php  if($p_friend_status != 'me'){?>
                        <?php include "liveCoinList.php";?>
                        <div class="live_coin_current_balance">
                            <div class="current_balance_box flex_ tabing_non_justify"><?php echo filter_var($LANG['point_balance'], FILTER_SANITIZE_STRING);?> <span class="crnblnc"><?php echo number_format($userCurrentPoints);?></span> <?php echo html_entity_decode($iN->iN_SelectedMenuIcon('40'));?><a href="<?php echo $base_url.'purchase/purchase_point';?>" target="blank_" class="transitions"><?php echo filter_var($LANG["get_points"], FILTER_SANITIZE_STRING);?></a></div>
                        </div>
                        <?php }?> 
                        <div class="currentt_live_streamings_list_container tabing">
                            <?php include "sugLiveStreams.php";?>
                        </div>
                    </div>
               </div>
               <!---->
               
           </div>
           <!---->
           <!---->
           <div class="live_right_in_right" style="position:relative;">
                <div class="live_right_in_right_in"> 
                       <?php include "liveChat.php";?> 
                </div>
                <div class="live_send_message_box_wrapper">
                   <div class="nanos transition" style=""></div>
                   <div class="tabing_non_justify flex_" style="width:100%">
                       <div class="message_form_items flex_ tabing">  
                           <div class="message_send_text flex_ tabing">
                               <div class="message_text_textarea flex_">
                                   <textarea class="lmSize"></textarea> 
                                   <!---->
                                    <div class="message_smiley getMEmojisa">
                                        <div class="message_form_smiley_plus transition">
                                            <div class="message_pls flex_ tabing"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('25')); ?></div>
                                        </div>
                                    </div>
                                    <!---->
                               </div>
                           </div>
                           <div class="message_form_plus transition livesendmes">
                               <div class="message_pls flex_ tabing"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('26')); ?></div>
                           </div>
                       </div>
                   </div>
                </div>
           </div>
           <!---->
       </div>
    </div>
</div>
<?php if($userID != $liveCreator){$iN->iN_InsertMyOnlineStatus($userID, $liveID);}?>
<div id="mic-list"></div> 
<script type="text/javascript">

// use tokens for added security
function generateToken() {
  return null; // TODO: add a token generation
}
navigator.getUserMedia = navigator.getUserMedia || navigator.webkitGetUserMedia || navigator.mozGetUserMedia || navigator.msGetUserMedia;
if (!navigator.getUserMedia) {
  //alert('Sorry, this browser does not support webRTC.');
}
 
if((navigator.mediaDevices && navigator.mediaDevices.getUserMedia)) { 
  //ready();
}else{
    alert('Sorry, this browser does not support webRTC.');
}
</script> 
<script src="https://download.agora.io/sdk/release/AgoraRTC_N.js"></script>
<script type="text/javascript">
  // create Agora client
var client = AgoraRTC.createClient({mode: "live", codec: "vp8"});
var localTracks = {
    videoTrack: null,
    audioTrack: null
};
var localTrackState = {
  videoTrackMuted: false,
  audioTrackMuted: false
}

var remoteUsers = {};
// Agora client options
var options = {
    appid: null,
    channel: null,
    uid: null,
    token: null,
    role: "audience", // host or audience
    audienceLatency: 2
};
var mics = []; // all microphones devices you can use
var cams = []; // all cameras devices you can use
var currentMic; // the microphone you are using
var currentCam; // the camera you are using

let volumeAnimation;
// the demo can auto join channel with params in url
$(async () => {
  //$("#media-device-test").modal("show");
  $(".cam-list").delegate("a", "click", function(e){
    switchCamera(this.text);
  });
  $(".mic-list").delegate("a", "click", function(e){
    switchMicrophone(this.text);
  });

  //var urlParams = new URL(location.href).searchParams;
  options.appid = '<?php echo $agoraAppID; ?>';
  options.channel = '<?php echo $liveChannel; ?>';
  //options.token = urlParams.get("token");
  //options.uid = urlParams.get("uid");
  await mediaDeviceTest();
  //volumeAnimation = requestAnimationFrame(setVolumeWave);
})

// the demo can auto join channel with params in url 
$(() => {
    //var urlParams = new URL(location.href).searchParams;
    options.appid = '<?php echo $agoraAppID; ?>';
    options.channel = '<?php echo $liveChannel; ?>';
    //options.token = urlParams.get("token");
    //options.uid = urlParams.get("uid");
    if (options.appid && options.channel) {
        $("#uid").val(options.uid);
        $("#appid").val('<?php echo $agoraAppID; ?>');
        $("#token").val(options.token);
        $("#channel").val('<?php echo $liveChannel; ?>');
        JoinForm();
    } 
}) 
<?php if ($liveCreator == $userID) {?>
async function jRole() {
    options.role = "host"
}
<?php }else{?>
  async function jRole() {
    options.role = "audience"
  }
<?php }?>

async function JoinForm(){
    try {
        options.appid = '<?php echo $agoraAppID; ?>';
        //options.token = $("#token").val();
        options.token = '';
        options.channel = '<?php echo $liveChannel; ?>';
        //options.uid = Number($("#uid").val());
        options.uid = '';
        await jRole();
        await join();
        if (options.role === "host") { 
            $("#success-alert a").attr("href", `index.html?appid=${options.appid}&channel=${options.channel}&token=${options.token}`); 
            if (options.token) {
                $("#success-alert-with-token").css("display", "block");
            } else {
                $("#success-alert a").attr("href", `index.html?appid=${options.appid}&channel=${options.channel}&token=${options.token}`);
                $("#success-alert").css("display", "block");
            }
        } 
    } catch (error) { 
        console.error('HATA:'+error);
    } finally {
        $("#leave").attr("disabled", false);
    }
}


$("#leave").click(function (e) {
    leave();
})

$("#mute-audio").click(function (e) {
  if (!localTrackState.audioTrackMuted) {
    muteAudio();
  } else {
    unmuteAudio();
  }
});

$("#mute-video").click(function (e) {
  if (!localTrackState.videoTrackMuted) {
    muteVideo();
  } else {
    unmuteVideo();
  }
})

async function join() {
    // create Agora client

    if (options.role === "audience") {
        client.setClientRole(options.role, {level: options.audienceLatency});
        // add event listener to play remote tracks when remote user publishs.
        client.on("user-published", handleUserPublished);
        client.on("user-unpublished", handleUserUnpublished);
    }
    else{
        client.setClientRole(options.role);
    }

    // join the channel
    options.uid = await client.join(options.appid, options.channel, options.token || null, options.uid || null);

    if (options.role === "host") {
        // create local audio and video tracks
        localTracks.audioTrack = await AgoraRTC.createMicrophoneAudioTrack();
        localTracks.videoTrack = await AgoraRTC.createCameraVideoTrack();
        // play local video track
        localTracks.videoTrack.play("local-player");
        $("#local-player-name").text(`localTrack(${options.uid})`);
        // publish local tracks to channel
        await client.publish(Object.values(localTracks));
        console.log("publish success");
    }
    if (!localTracks.audioTrack || !localTracks.videoTrack) {
      [ localTracks.audioTrack, localTracks.videoTrack ] = await Promise.all([
        // create local tracks, using microphone and camera
        AgoraRTC.createMicrophoneAudioTrack({ microphoneId: currentMic.deviceId }),
        AgoraRTC.createCameraVideoTrack({ cameraId: currentCam.deviceId })
      ]);
    }
}
async function mediaDeviceTest() {
  // create local tracks
  [ localTracks.audioTrack, localTracks.videoTrack ] = await Promise.all([
    // create local tracks, using microphone and camera
    AgoraRTC.createMicrophoneAudioTrack(),
    AgoraRTC.createCameraVideoTrack()
  ]);

  // play local track on device detect dialog
  //localTracks.videoTrack.play("pre-local-player");
  // localTracks.audioTrack.play();

  // get mics
  mics = await AgoraRTC.getMicrophones();
  currentMic = mics[0];
  //$(".mic-input").val(currentMic.label);
  mics.forEach(mic => {
    $(".mic-list").append(`<a class="dropdown-item" href="#">${mic.label}</a>`);
  });

  // get cameras
  cams = await AgoraRTC.getCameras();
  currentCam = cams[0];
  //$(".cam-input").val(currentCam.label);
  cams.forEach(cam => {
    $(".cam-list").append(`<a class="dropdown-item" href="#">${cam.label}</a>`);
  });
}

async function leave() {
    for (trackName in localTracks) {
        var track = localTracks[trackName];
        if (track) {
            track.stop();
            track.close();
            localTracks[trackName] = undefined;
        }
    }

    // remove remote users and player views
    remoteUsers = {};
    $("#remote-playerlist").html("");

    // leave the channel
    await client.leave();

    $("#local-player-name").text("");
    $("#host-join").attr("disabled", false);
    $("#audience-join").attr("disabled", false);
    $("#leave").attr("disabled", true);
    console.log("client leaves channel success");
}

async function subscribe(user, mediaType) {
    const uid = user.uid;
    // subscribe to a remote user
    await client.subscribe(user, mediaType);
    console.log("subscribe success");
    if (mediaType === 'video') {
        const player = $(`
      <div id="player-wrapper-${uid}">
        <p class="player-name">remoteUser(${uid})</p>
        <div id="player-${uid}" class="player"></div>
      </div>
    `);
        $("#remote-playerlist").append(player);
        user.videoTrack.play(`player-${uid}`, {fit:"contain"});
    }
    if (mediaType === 'audio') {
        user.audioTrack.play();
    }
}

function handleUserPublished(user, mediaType) {
    const id = user.uid;
    remoteUsers[id] = user;
    subscribe(user, mediaType);
}

function handleUserUnpublished(user, mediaType) {
    if (mediaType === 'video') {
        const id = user.uid;
        delete remoteUsers[id];
        $(`#player-wrapper-${id}`).remove();
    }
}

async function switchCamera(label) {
  currentCam = cams.find(cam => cam.label === label);
  $(".cam-input").val(currentCam.label);
  // switch device of local video track.
  await localTracks.videoTrack.setDevice(currentCam.deviceId);
}

async function switchMicrophone(label) {
  currentMic = mics.find(mic => mic.label === label);
  $(".mic-input").val(currentMic.label);
  // switch device of local audio track.
  await localTracks.audioTrack.setDevice(currentMic.deviceId);
}
async function muteAudio() {
  if (!localTracks.audioTrack) return;
  /**
   * After calling setMuted to mute an audio or video track, the SDK stops sending the audio or video stream. Users whose tracks are muted are not counted as users sending streams.
   * Calling setEnabled to disable a track, the SDK stops audio or video capture
   */
  await localTracks.audioTrack.setMuted(true);
  localTrackState.audioTrackMuted = true;
  $("#mute-audio").text("<?php echo filter_var($LANG['unmute_audio'], FILTER_SANITIZE_STRING);?>");
}

async function muteVideo() {
  if (!localTracks.videoTrack) return;
  await localTracks.videoTrack.setMuted(true);
  localTrackState.videoTrackMuted = true;
  $("#mute-video").text("<?php echo filter_var($LANG['unmute_video'], FILTER_SANITIZE_STRING);?>");
}

async function unmuteAudio() {
  if (!localTracks.audioTrack) return;
  await localTracks.audioTrack.setMuted(false);
  localTrackState.audioTrackMuted = false;
  $("#mute-audio").text("<?php echo filter_var($LANG['mute_audio'], FILTER_SANITIZE_STRING);?>");
}

async function unmuteVideo() {
  if (!localTracks.videoTrack) return;
  await localTracks.videoTrack.setMuted(false);
  localTrackState.videoTrackMuted = false;
  $("#mute-video").text("<?php echo filter_var($LANG['mute_video'], FILTER_SANITIZE_STRING);?>");
}
</script>
<script type="text/javascript">
//RunLiveAgora("<?php echo $liveChannel; ?>","post_live_video");
</script> 
<script type="text/javascript">
$(document).ready(function(){
  $("body").on("click",".camera_chs", function(){
     if(!$(".camListOpen")[0]){
        $(".camList").addClass("camListOpen");
     }else{
        $(".camList").removeClass("camListOpen");
     }
  });
  $("body").on("click",".mick_chs", function(){
     if(!$(".camListOpen")[0]){
        $(".micList").addClass("camListOpen");
     }else{
        $(".micList").removeClass("camListOpen");
     }
  });
  $("body").on("mouseup touchend", function(e) {
        /*e.preventDefault();*/
        var listCont = $('.camList , .micList');
        if (!listCont.is(e.target) && listCont.has(e.target).length === 0) {
            $(listCont).removeClass('camListOpen');
        }
    });
});
</script>
<script type="text/javascript">  
$(document).ready(function(){ 
    var preLoadingAnimation = '<div class="i_loading" style="margin-bottom:20px"><div class="dot-pulse"></div></div>';
    var plreLoadingAnimationPlus = '<div class="loaderWrapper"><div class="loaderContainer"><div class="loader">' + preLoadingAnimation + '</div></div></div>';
    var main_live = setInterval(function(){
	var type ='live_calcul';  
	var data = 'f='+type+'&lid='+<?php echo filter_var($liveID, FILTER_SANITIZE_STRING);?>;
	  $.ajax({
            type: "POST",
            url: siteurl + "requests/live.php",
            dataType: "json",
            data: data,
            cache: false,
            beforeSend: function() {
            },
            success: function(response) {
				  var onlineUserCount = response.onlineCount;
                  var likeCount = response.likeCount;
                  var finished = response.finished;
                  var fTime = response.time;
                  if(onlineUserCount){
                     $(".sumonline").html(onlineUserCount);
                  } 
                  if(fTime){
                    $(".count_time").html(fTime);
                  }
                  if(likeCount){
                     $(".lp_sum_l").html(likeCount);
                  } 
                  if(finished){
                    window.location.href = finished;
                  }
		    }
	}); 
}, 15000);  
var main_lives = setInterval(function(){

	var type ='liveLastMessage'; 
	var liveVideo = <?php echo filter_var($liveID, FILTER_SANITIZE_STRING);?>;
	var lastCom = $(".eo2As:last").attr("id");
    if(lastCom===undefined || lastCom===null || lastCom===''|| lastCom.length===0){
       var lastCom = '';
    }
	var data = 'f='+type+'&idc='+liveVideo+'&lc='+lastCom;
	  $.ajax({
            type: "POST",
            url: siteurl + "requests/live.php", 
            data: data, 
            cache: false,
            beforeSend: function() {
            },
            success: function(response) {
                if($('.gElp9').length === 0){
                    $(".live_right_in_right_in").append(response); 
                }else{
                    $(".cUq_"+lastCom).after(response); 
                } 
		  }
	}); 
}, 6000);
<?php if($userID == $liveCreator){ ?>
    $("body").on("click", ".camcloseCall", function() {
        var type = 'finishLiveStreaming';
        var ID = $(this).attr("id");
        var data = 'f=' + type + '&id=' + ID;
        $.ajax({
            type: "POST",
            url: siteurl + 'requests/request.php',
            data: data,
            cache: false,
            beforeSend: function() {

            },
            success: function(response) {
                if (response != '404') {
                    $("body").append(response);
                    setTimeout(() => {
                        $(".i_modal_bg_in").addClass('i_modal_display_in');
                    }, 200);
                } else {
                    PopUPAlerts('sWrong', 'ialert');
                }
            }
        });
    });
    $("body").on("click",".camclose", function(){
        var type = 'finishLive';
        var liveID = '<?php echo  $liveID;?>';
        var data = 'f='+type+'&lid='+liveID;
        $.ajax({
            type: 'POST',
            url: siteurl + 'requests/request.php',
            data: data,
            beforeSend: function() {},
            success: function(response) {
                leave();
                 if(response == 'finished'){
                    setTimeout(() => {
                       window.location.href = siteurl;
                    }, 2000);
                 } 
            }
        });
    });
<?php } ?>
$("body").on("click", ".getMEmojisa", function() {
        var type = 'memoji';
        var ID = $(this).attr("data-type");
        var data = 'f=' + type + '&id=' + ID;
        if (!$("div").hasClass("Message_stickersContainer")) {
            $.ajax({
                type: 'POST',
                url: siteurl + 'requests/request.php',
                data: data,
                beforeSend: function() {
                    $(".getMEmojisa").css("pointer-events", "none");
                    $(".nanos").append('<div class="preLoadC">' + plreLoadingAnimationPlus + '</div>');
                    $(".nanos").css('height','348px');
                },
                success: function(response) {
                    $(".nanos").append(response);
                    $(".preLoadC").remove();
                    $(".getMEmojisa").css("pointer-events", "auto");
                }
            });
        } else {
            $(".Message_stickersContainer").remove();
            $(".nanos").css('height','0px');
        }
});
$("body").on("click", ".livesendmes", function() {
    var value = $(".lmSize").val();
    var ID = '<?php echo  $liveID;?>';
    LiveMessage(ID, value, 'livemessage');
});
function LiveMessage(ID, value, type) {
    var data = 'f=' + type + '&id=' + ID + '&val=' + encodeURIComponent(value);
    $.ajax({
        type: 'POST',
        url: siteurl + 'requests/request.php',
        data: data,
        cache: false,
        beforeSend: function() {
            //$(".Message_stickersContainer").append(plreLoadingAnimationPlus);
        },
        success: function(response) {
            if (response == '404') {
                PopUPAlerts('sWrong', 'ialert');
            } else {
                $(".live_right_in_right_in").append(response);
                ScrollBottomLiveChat();
            }
            $(".lmSize").val('');
            $(".Message_stickersContainer").remove();
            $(".nanos").css('height','0px');
        }
    });
}
function ScrollBottomLiveChat() {
    if ($("div").hasClass("live_right_in_right_in")) {
        $(".live_right_in_right_in").stop().animate({ scrollTop: $(".live_right_in_right_in")[0].scrollHeight }, 100);
    }
}
ScrollBottomLiveChat();
$(document).on('keydown', ".lmSize", function(e) {
    var key = e.which || e.keyCode || 0;
    if (key == 13) {
        var type = 'livemessage';
        var ID = '<?php echo  $liveID;?>';
        var value = $(this).val(); 
        LiveMessage(ID, value, type);
    }
});
$("body").on("click", ".emoji_item_m", function() {
    var copyEmoji = $(this).attr("data-emoji");
    var getValue = $(".lmSize").val();
    $(".lmSize").val(getValue + ' ' + copyEmoji + ' ');
});
$("body").on("click",".live_gift_call", function(){
   $(".live_footer_holder").addClass("live_footer_holder_show");
   $(".live__live_video_holder").append("<div class='appendBoxLive'></div>");
});
$("body").on("click",".appendBoxLive", function(){
    $(".live_footer_holder").removeClass("live_footer_holder_show");
    $(".appendBoxLive").remove();
});
$(window).on("resize", function() {
    deviceResizeFunction(); 
});
deviceResizeFunction();
function deviceResizeFunction() {  
    var vWidth = $(window).width();
    if (vWidth < 1300) {
        $(".live_left").hide();  
    }else{
        $(".live_left").show();   
    } 
    if (vWidth < 1050) {
        $(".header").hide();
        $(".live_wrapper_tik").css("padding-top","0px");
        $(".live__live_video_holder").addClass("max_height_live_mobile");
        $(".live_video_header").addClass("live_video_header_mobile");
        $(".exen , .sumonline").addClass("loi");
        $(".i_header_btn_item").addClass("i_header_btn_item_live_mobile");
        $(".live_footer_holder").hide();
        $(".live_right_in_right").addClass("live_right_in_right_mobile");
        $(".live_holder_plus_in").addClass("live_plus_mobile");
        $(".live_gift_call").show();
    }else{
        $(".header").show();
        $(".live_wrapper_tik").css("padding-top","72px");
        $(".live__live_video_holder").removeClass("max_height_live_mobile");
        $(".live_video_header").removeClass("live_video_header_mobile");
        $(".exen ,sumonline").removeClass("loi");
        $(".i_header_btn_item").removeClass("i_header_btn_item_live_mobile");
        $(".live_footer_holder").show();
        $(".live_right_in_right").removeClass("live_right_in_right_mobile");
        $(".live_holder_plus_in").removeClass("live_plus_mobile");
        $(".live_gift_call").hide();
        $(".live_footer_holder").removeClass("live_footer_holder_show");
    }
    if(vWidth < 700){ 
      $(".mobile_footer_fixed_menu_container").remove(); 
    }else{ 
    } 
}
});
</script>

<?php } else { ?>  
<div class="live_wrapper">
   <div class="i_liv_stream_video" style="background-color:#000000;position:relative;">
       <!---->
  <div class="i_modal_bg_in i_modal_display_in">
    <!--SHARE-->
   <div class="i_modal_in_in i_sf_box"> 
       <div class="i_modal_content">  
          <div class="purchase_premium_header flex_ tabing border_top_radius"><?php echo filter_var($LANG['join_the_live_broadcast'], FILTER_SANITIZE_STRING) ;?></div>
          <div class="purchase_post_details">
             
            <div class="wallet-debit-confirm-container flex_">
               <div class="owner_avatar" style="background-image:url(<?php echo filter_var($liveCreatorAvatar, FILTER_VALIDATE_URL);?>);"></div>
               <div class="album-details"><?php echo filter_var($LANG['paying_point_for_live_streaming'], FILTER_SANITIZE_STRING);?></div>
                <div class="album-wanted-point">
                  <div><?php echo html_entity_decode($liveCredit);?></div>
                  <span><?php echo filter_var($LANG['points'], FILTER_SANITIZE_STRING);?></span>
                </div>
            </div>
          </div>
          <div class="i_modal_g_footer">
              <div class="alertBtnRight joinLiveStream transition" id="<?php echo filter_var($liveID, FILTER_SANITIZE_STRING) ;?>"><?php echo filter_var($LANG['confirm'], FILTER_SANITIZE_STRING) ;?></div>
              <div class="alertBtnLeft no-del transition"><?php echo filter_var($LANG['cancel'], FILTER_SANITIZE_STRING) ;?></div>
          </div>
       </div>   
   </div>
   <!--/SHARE--> 
   </div> 
   <!---->
    </div>
</div>    

<?php if($userID == $liveCreator){ ?>
<script type="text/javascript">
$(document).ready(function(){
    $("body").on("click",".camera_close", function(){
        var type = 'finishLive';
        var liveID = '<?php echo  $liveID;?>';
        var data = 'f='+type+'&lid='+liveID;
        $.ajax({
            type: 'POST',
            url: siteurl + 'requests/request.php',
            data: data,
            beforeSend: function() {},
            success: function(response) {
                 if(response == 'finished'){
                    window.location.href = siteurl;
                 }
            }
        });
    });
});
</script>
<?php } ?>
<?php }?>

