<script type="text/javascript" src="<?php echo filter_var($base_url, FILTER_VALIDATE_URL); ?>themes/<?php echo filter_var($currentTheme, FILTER_SANITIZE_STRING); ?>/js/jquery-v3.5.1.min.js"></script>
<script type="text/javascript" src="<?php echo filter_var($base_url, FILTER_VALIDATE_URL); ?>themes/<?php echo filter_var($currentTheme, FILTER_SANITIZE_STRING); ?>/js/jquery.form.js"></script>
<script type="text/javascript" src="<?php echo filter_var($base_url, FILTER_VALIDATE_URL); ?>themes/<?php echo filter_var($currentTheme, FILTER_SANITIZE_STRING); ?>/js/share.js?v=1<?php echo filter_var($version, FILTER_SANITIZE_STRING); ?>"></script>
<script type="text/javascript" src="<?php echo filter_var($base_url, FILTER_VALIDATE_URL); ?>themes/<?php echo filter_var($currentTheme, FILTER_SANITIZE_STRING); ?>/js/clipboard/clipboard.min.js"></script>
<script type="text/javascript" src="<?php echo filter_var($base_url, FILTER_VALIDATE_URL); ?>themes/<?php echo filter_var($currentTheme, FILTER_SANITIZE_STRING); ?>/js/lightGallery/lightgallery-all.min.js"></script>
<?php if ($logedIn == 1) {?>
<script type="text/javascript" src="<?php echo filter_var($base_url, FILTER_VALIDATE_URL); ?>themes/<?php echo filter_var($currentTheme, FILTER_SANITIZE_STRING); ?>/js/autoresize.min.js"></script>
<script type="text/javascript" src="<?php echo filter_var($base_url, FILTER_VALIDATE_URL); ?>themes/<?php echo filter_var($currentTheme, FILTER_SANITIZE_STRING); ?>/js/videojs/video.js"></script>
<script type="text/javascript" src="<?php echo filter_var($base_url, FILTER_VALIDATE_URL); ?>themes/<?php echo filter_var($currentTheme, FILTER_SANITIZE_STRING); ?>/js/scrollBar/jquery.slimscroll.min.js"></script>
<script type="text/javascript">
var siteurl = '<?php echo filter_var($base_url, FILTER_VALIDATE_URL); ?>';
  $(function() {
    $('.commenta').autoResize();
    var clipboard = new ClipboardJS('.copyUrl');
  });
</script>
<script type="text/javascript" src="<?php echo filter_var($base_url, FILTER_VALIDATE_URL); ?>themes/<?php echo filter_var($currentTheme, FILTER_SANITIZE_STRING); ?>/js/inora.js?v=o5117111<?php echo filter_var($version, FILTER_SANITIZE_STRING); ?>"></script>
<?php if ($page == 'profile') { ?>
<script type="text/javascript" src="https://js.stripe.com/v3/"></script>
<?php }?>
<script type="text/javascript" src="<?php echo filter_var($base_url, FILTER_VALIDATE_URL); ?>themes/<?php echo filter_var($currentTheme, FILTER_SANITIZE_STRING); ?>/js/character_count.js?v=<?php echo filter_var($version, FILTER_SANITIZE_STRING); ?>"></script>
<script type="text/javascript">
$(document).ready(function(){
  $("#newPostT").characterCounter({
  limit: <?php echo filter_var($availableLength, FILTER_SANITIZE_STRING);?>
  });
});
</script>
<?php if($oneSignalStatus == 'open'){?>
  <link rel="manifest" href="<?php echo $base_url; ?>manifestOneSignal.json">
  <script src="https://cdn.onesignal.com/sdks/OneSignalSDK.js" async=""></script>
  <script>
	var push_user_id = "";
	var my_id = "<?php echo $deviceKey; ?>";
	var OneSignal = window.OneSignal || [];
      OneSignal.push([ "init", {
        appId: "<?php echo $oneSignalApi; ?>",
        autoResubscribe: true,
        notifyButton: {
        enable: true
        },
        persistNotification: true
      }
		]);
	OneSignal.push(function() {
	OneSignal.getUserId(function(userId) { 
	push_user_id = userId;
		if (userId != my_id) {$.get("<?php echo $base_url . 'requests/request.php'; ?>", {f: "device_key",id: push_user_id});}
	});
	OneSignal.on("subscriptionChange", function(isSubscribed) {if (isSubscribed == false) {$.get("<?php echo $base_url . 'requests/request.php'; ?>", { f: "remove_device_key"});} else {$.get("<?php echo $base_url . 'requests/request.php'; ?>", {f: "device_key",id: push_user_id});}});
});
</script>
<?php }?>
<?php }?>
<?php if ($logedIn == 0) {?>
<script type="text/javascript">
var siteurl = '<?php echo filter_var($base_url, FILTER_VALIDATE_URL); ?>';
</script>
    <script type="text/javascript" src="<?php echo filter_var($base_url, FILTER_VALIDATE_URL); ?>themes/<?php echo filter_var($currentTheme, FILTER_SANITIZE_STRING); ?>/js/inora_do.js?v=s211<?php echo filter_var($version, FILTER_SANITIZE_STRING); ?>"></script>
<?php }?>
<script type="text/javascript">
<?php echo $customHeaderJsCode; ?>
</script>
<script type="text/javascript" src="<?php echo filter_var($base_url, FILTER_VALIDATE_URL); ?>themes/<?php echo filter_var($currentTheme, FILTER_SANITIZE_STRING); ?>/js/swiper/swiper-bundle.min.js"></script>