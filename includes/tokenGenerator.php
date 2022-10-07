<?php 
include_once "inc.php";
require_once('Agora/RtcTokenBuilder.php');
function agora_token_builder($is_host = true, $channel_name = null, $agoraAppID, $agoraCertificate, $userID) {  
    $channel_name = ($channel_name)? $channel_name : get_hash_token();
    $uid = mt_rand();
    $role = ($is_host)? RtcTokenBuilder::RolePublisher : RtcTokenBuilder::RoleAttendee;
    $expire_time = 3600;
    $current_timestamp = (new DateTime("now", new DateTimeZone('UTC')))->getTimestamp();
    $privilege_expired = $current_timestamp + $expire_time;
    $token = RtcTokenBuilder::buildTokenWithUid($agoraAppID, $agoraCertificate, $channel_name, $userID, $role, $privilege_expired);
    return $token;
}
function get_hash_token() {
    return md5(get_hash_number());
}
function get_hash_number() {
    return time()*rand(1, 99999);
}
?>