<?php
ob_start();
session_start(); 
include_once "connect.php";
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include_once "functions.php";
include_once "emojis.php";
include_once "linkify/autoload.php";
include_once "_expand.php";
require_once 'stripe/vendor/autoload.php';
use VStelmakh\UrlHighlight\UrlHighlight;
$urlHighlight = new UrlHighlight();
$iN = new iN_UPDATES($db);
$inc = $iN->iN_Configurations(); 
$getPages = $iN->iN_GetPages();
$languages = $iN->iN_Languages();
date_default_timezone_set('UTC');
/*Check Session for Login else Logout*/
$hash = isset($_COOKIE[$cookieName]) ? $_COOKIE[$cookieName] : NULL;
$sessionUserID = isset($_SESSION['iuid']) ? $_SESSION['iuid'] : NULL;
if (!empty($hash)) {
	$thisHash = mysqli_real_escape_string($db, $hash);
	$session_user_id = mysqli_real_escape_string($db, $sessionUserID);
	$checkHashInSession = mysqli_query($db, "SELECT * FROM i_sessions WHERE session_key = '$thisHash'") or die(mysqli_error($db));
	$row = mysqli_fetch_array($checkHashInSession, MYSQLI_ASSOC);
	$sessionUserID = $row['session_uid'];
	if (empty($sessionUserID) || !isset($sessionUserID) || $sessionUserID == '') {
		header("location:" . $base_url . "logout.php");
	} else {
		$_SESSION['iuid'] = $sessionUserID;
	}
}
$userEmailVerificationStatus = '';
$metaBaseUrl = $base_url . 'img/' . isset($inc['meta_image']) ? $inc['meta_image'] : NULL;
$browserLanguage = isset($_SERVER["HTTP_ACCEPT_LANGUAGE"]) ? substr($_SERVER["HTTP_ACCEPT_LANGUAGE"], 0, 2) : '';
$currentTheme = isset($inc['active_theme']) ? $inc['active_theme'] : 'default';
$version = isset($inc['version']) ? $inc['version'] : '1';
$logo = isset($inc['site_logo']) ? $inc['site_logo'] : NULL;
$siteWatermarkLogo = isset($inc['site_watermark_logo']) ? $inc['site_watermark_logo'] : $logo;
$favicon = isset($inc['site_favicon']) ? $inc['site_favicon'] : '1';
$siteTitle = isset($inc['site_title']) ? $inc['site_title'] : NULL;
$siteKeyWords = isset($inc['site_keywords']) ? $inc['site_keywords'] : NULL;
$siteDescription = isset($inc['site_description']) ? $inc['site_description'] : NULL;
$siteCampany = isset($inc['campany']) ? $inc['campany'] : NULL;
$siteCountry = isset($inc['country']) ? $inc['country'] : NULL;
$siteCity = isset($inc['city']) ? $inc['city'] : NULL;
$sitePostCode = isset($inc['post_code']) ? $inc['post_code'] : NULL;
$siteVat = isset($inc['vat']) ? $inc['vat'] : NULL;
$mycd = isset($inc['mycd']) ? $inc['mycd'] : NULL; 
$normalUserCanPost = isset($inc['normal_user_can_post']) ? $inc['normal_user_can_post'] : NULL;
$giphyKey = isset($inc['giphy_api_key']) ? $inc['giphy_api_key'] : NULL;
$freeLiveTime = isset($inc['free_live_time']) ? $inc['free_live_time'] : NULL;
$giphyTrendKey = isset($inc['giphy_first_trend_key']) ? $inc['giphy_first_trend_key'] : NULL;
$agoraStatus = $inc['agora_status'];
$agoraAppID = isset($inc['agora_app_id']) ? $inc['agora_app_id'] : NULL;
$agoraCertificate = isset($inc['agora_certificate']) ? $inc['agora_certificate'] : NULL;
$agoraCustomerID = isset($inc['agora_customer_id']) ? $inc['agora_customer_id'] : NULL;
$landingPageType = $inc['landing_page_type'];
$disallowedUserNames = isset($inc['disallowed_usernames']) ? $inc['disallowed_usernames'] : NULL;
$userCanBlockCountryStatus = isset($inc['user_can_block_country']) ? $inc['user_can_block_country'] : NULL;
$digitalOceanStatus = isset($inc['ocean_status']) ? $inc['ocean_status'] : NULL;
$oceankey = isset($inc['ocean_key']) ? $inc['ocean_key'] : NULL;
$oceansecret = isset($inc['ocean_secret']) ? $inc['ocean_secret'] : NULL;
$oceanspace_name = isset($inc['ocean_space_name']) ? $inc['ocean_space_name'] : NULL;
$mycdStatus = isset($inc['mycd_status']) ? $inc['mycd_status'] : NULL;
$oceanregion = isset($inc['ocean_region']) ? $inc['ocean_region'] : NULL; 
$subscriptionType = isset($inc['subscription_type']) ? $inc['subscription_type'] : NULL;
$dataAffilateData = $iN->iN_GetRegisterAffilateData('register', '1'); 
$ataAffilateAmount = isset($dataAffilateData['i_af_amount']) ? $dataAffilateData['i_af_amount'] : NULL;
$dataNewPostPoint = $iN->iN_GetRegisterAffilateData('new_post', '5');
$ataNewPostPointAmount = isset($dataNewPostPoint['i_af_amount']) ? $dataNewPostPoint['i_af_amount'] : NULL;
$ataNewPostPointSatus = isset($dataNewPostPoint['i_af_status']) ? $dataNewPostPoint['i_af_status'] : 'no';
$dataNewCommentPoint = $iN->iN_GetRegisterAffilateData('comment', '2');
$ataNewCommentPointAmount = isset($dataNewPostPoint['i_af_amount']) ? $dataNewPostPoint['i_af_amount'] : NULL;
$ataNewCommentPointSatus = isset($dataNewPostPoint['i_af_status']) ? $dataNewPostPoint['i_af_status'] : 'no';  
$dataNewPostLikePoint = $iN->iN_GetRegisterAffilateData('post_like', '3');
$ataNewPostLikePointAmount = isset($dataNewPostLikePoint['i_af_amount']) ? $dataNewPostLikePoint['i_af_amount'] : NULL;
$ataNewPostLikePointSatus = isset($dataNewPostLikePoint['i_af_status']) ? $dataNewPostLikePoint['i_af_status'] : 'no';  
$dataNewPostCommentLikePoint = $iN->iN_GetRegisterAffilateData('comment_like', '4');
$ataNewPostCommentLikePointAmount = isset($dataNewPostCommentLikePoint['i_af_amount']) ? $dataNewPostCommentLikePoint['i_af_amount'] : NULL;
$ataNewPostCommentLikePointSatus = isset($dataNewPostCommentLikePoint['i_af_status']) ? $dataNewPostCommentLikePoint['i_af_status'] : 'no'; 
$landingPageFirstImage = isset($inc['landing_first_image']) ? $inc['landing_first_image'] : NULL;
$landingpageFirstImageArrow = isset($inc['landing_first_image_arrow']) ? $inc['landing_first_image_arrow'] : NULL;
$landingpageFirstDesctiptionImage = isset($inc['landing_feature_image_one']) ? $inc['landing_feature_image_one'] : NULL;
$landingpageSecondDesctiptionImage = isset($inc['landing_feature_image_two']) ? $inc['landing_feature_image_two'] : NULL;
$landingpageThirdDesctiptionImage = isset($inc['landing_feature_image_three']) ? $inc['landing_feature_image_three'] : NULL;
$landingpageFourthDesctiptionImage = isset($inc['landing_feature_image_four']) ? $inc['landing_feature_image_four'] : NULL;
$landingpageFifthDesctiptionImage = isset($inc['landing_feature_image_five']) ? $inc['landing_feature_image_five'] : NULL;
$landingPageSectionTwoBG = isset($inc['landing_section_two_bg']) ? $inc['landing_section_two_bg'] : NULL;
$landingSectionFeatureImage = isset($inc['landing_section_feature_image']) ? $inc['landing_section_feature_image'] : NULL;
$autoApprovePostStatus = isset($inc['auto_approve_post']) ? $inc['auto_approve_post'] : 'yes';
$minimumLiveStreamingFee = $inc['minimum_live_streaming_fee'];
$maintenanceMode = $inc['maintenance_mode'];
$defaultLanguage = $inc['default_language'];
$scrollLimit = $inc['load_more_limit'];
$lightDark = $inc['default_style'];
$socialLoginStatus = $inc['social_login_status'];
$maximumPointLimit = $inc['max_point_limit'];
$minimumPointLimit = $inc['min_point_limit'];
$maximumPointAmountLimit = $inc['max_point_amount_limit'];
$minimumPointAmountLimit = $inc['min_point_amount_limit'];
$geoLocationAPIKey = isset($inc['geolocationapikey']) ? $inc['geolocationapikey'] : NULL;
$siteName = $inc['site'];
$adminTheme = $inc['admin_active_theme'];
$customHeaderCSSCode = $iN->iN_GetCustomCodes(1);
$customHeaderJsCode = $iN->iN_GetCustomCodes(2);
$customFooterJsCode = $iN->iN_GetCustomCodes(3);
$allSVGIcons = $iN->iN_AllSVGIcons();
$adminFee = $inc['fee'];
$minimumSubscriptionAmount = $inc['minimum_subscription_amount'];
$maximumSubscriptionAmount = $inc['maximum_subscription_amount'];
$affilateSystemStatus = isset($inc['affilate_status']) ? $inc['affilate_status'] : NULL;
$minimumPointTransferRequest = isset($inc['minimum_point_transfer_request']) ? $inc['minimum_point_transfer_request'] : '0';
$affilateAmount = $inc['affilate_amount'];
$minPointFeeWeekly = $inc['min_point_fee_weekly']; 
$minPointFeeMonthly = $inc['min_point_fee_monthly']; 
$minPointFeeYearly = $inc['min_point_fee_yearly']; 

$businessAddress = $inc['business_address'];
$availableFileExtensions = $inc['available_file_extensions'];
$availableVerificationFileExtensions = $inc['available_verification_file_extensions'];
$availableUploadFileSize = $inc['available_file_size'];
$availableLength = isset($inc['available_length']) ? $inc['available_length'] : '500';
$ffmpegPath = isset($inc['ffmpeg_path']) ? $inc['ffmpeg_path'] : NULL;
$ffmpegStatus = $inc['ffmpeg_status'];
$pixelSize = $inc['pixelSize'];
$showingNumberOfPost = $inc['showingNumberOfPost'];
$userType = $payoutMethod = $userWallet = '';
$cEarning = '0';
$userAvatar = $base_url . 'uploads/avatars/no_gender.png';
$defaultCurrency = $inc['default_currency'];
$paginationLimit = $inc['pagination_limit'];
$siteLogoUrl = $base_url . $logo;
$siteFavicon = $base_url . $favicon;
$minimumTipAmount = isset($inc['min_tip_amount']) ? $inc['min_tip_amount'] : NULL;
/*AMAZON S3*/
$s3Status = $inc['s3_status'];
$s3Bucket = isset($inc['s3_bucket']) ? $inc['s3_bucket'] : NULL;
$s3Region = isset($inc['s3_region']) ? $inc['s3_region'] : 'us-west-1';
$s3SecretKey = isset($inc['s3_secret_key']) ? $inc['s3_secret_key'] : NULL;
$s3Key = isset($inc['s3_key']) ? $inc['s3_key'] : NULL;
/*Stripe Details Subscription Feature */
$stripeStatus = $inc['stripe_status'];
$stripeKey = $inc['stripe_secret_key'];
$stripePublicKey = $inc['stripe_public_key'];
$stripeCurrency = $inc['stripe_currency'];

$subscribeWeeklyMinimumAmount = $inc['sub_weekly_minimum_amount'];
$subscribeMonthlyMinimumAmount = $inc['sub_monthly_minimum_amount'];
$subscribeYearlyMinimumAmount = $inc['sub_yearly_minimum_amount'];
$minimumWithdrawalAmount = $inc['minimum_withdrawal_amount'];
$onePointEqual = $inc['one_point'];
$smtpOrMail = $inc['smtp_or_mail'];
$smtpHost = $inc['smtp_host'];
$smtpUserName = $inc['smtp_username'];
$smtpEmail = isset($inc['default_mail']) ? $inc['default_mail'] : NULL;
$smtpPassword = $inc['smtp_password'];
$smtpEncryption = $inc['smtp_encryption'];
$smtpPort = $inc['smtp_port'];
$siteEmail = $inc['siteEmail'];
$emailSendStatus = $inc['emailSendStatus'];
$userCanRegister = $inc['register'];
$ipLimitStatus = $inc['ip_limit'];
$paidLiveStreamingStatus = $inc['paid_live_streaming_status'];
$freeLiveStreamingStatus = $inc['free_live_streaming_status'];
$captchaStatus = $inc['g_recaptcha_status'];
$captcha_site_key = isset($inc['g_recaptcha_site_key']) ? $inc['g_recaptcha_site_key'] : NULL;
$captcha_secret_key = isset($inc['g_recaptcha_secret_key']) ? $inc['g_recaptcha_secret_key'] : NULL;
$oneSignalStatus = isset($inc['one_signal_status']) ? $inc['one_signal_status'] : NULL;
$oneSignalApi = isset($inc['one_signal_api']) ? $inc['one_signal_api'] : NULL;
$oneSignalRestApi = isset($inc['one_signal_rest_api']) ? $inc['one_signal_rest_api'] : NULL;
$subWeekStatus = isset($inc['sub_weekly_status']) ? $inc['sub_weekly_status'] : 'no';
$subMontlyStatus = isset($inc['sub_mountly_status']) ? $inc['sub_mountly_status'] : 'no';
$subYearlyStatus = isset($inc['sub_yearly_status']) ? $inc['sub_yearly_status'] : 'no';
$watermarkStatus = isset($inc['watermark_status']) ? $inc['watermark_status'] : 'no'; 
$LinkWatermarkStatus = isset($inc['watermark_text_status']) ? $inc['watermark_text_status'] : 'no';
$fullnameorusername = isset($inc['use_fullname_or_username']) ? $inc['use_fullname_or_username'] : 'no'; 
$earnPointSystemStatus = isset($inc['earn_point_status']) ? $inc['earn_point_status'] : 'no';
$beaCreatorStatus = isset($inc['be_a_creator_status']) ? $inc['be_a_creator_status'] : NULL;
$videoCallFeatureStatus = isset($inc['video_call_feature_status']) ? $inc['video_call_feature_status'] : NULL;
$whoCanCreateVideoCall = isset($inc['who_can_careate_video_call']) ? $inc['who_can_careate_video_call'] : NULL;
$isVideoCallFree = isset($inc['is_video_call_free']) ? $inc['is_video_call_free'] : NULL;
$maximumPointInADay = isset($inc['max_point_in_a_day']) ? $inc['max_point_in_a_day'] : '1';

/*Coin Payment*/

$creatorTYpes = $iN->iN_CreatorTypes();
/*Get File Extension*/
function getExtension($str) {
	$i = strrpos($str, ".");
	if (!$i) {
		return "";
	}
	$l = strlen($str) - $i;
	$ext = substr($str, $i + 1, $l);
	return $ext;
}
function inSub($mycd, $mycdStatus){
	//$check = preg_match('/(.*)-(.*)-(.*)-(.*)-(.*)/', $mycd);
	//if($check == 0 && ($mycdStatus == 1 || $mycdStatus == '' || empty($mycdStatus))){ 
	//	header('Location:' . $base_url . base64_decode('YmVsZWdhbA=='));
	//	exit();
	//}
}
/*Convert MB*/
function convert_to_mb($size) {
	$mb_size = $size / 1048576;
	$format_size = number_format($mb_size, 2);
	return $format_size;
}
function inSen($mycd, $mycdStatus){
	$check = preg_match('/(.*)-(.*)-(.*)-(.*)-(.*)/', $mycd);
	if($check == 0 && ($mycdStatus == 1 || $mycdStatus == '' || empty($mycdStatus))){ 
		exit();
	}
}
$purchasePointPlanTable = $iN->iN_PremiumPlans();
$planTableList = $iN->iN_PremiumPlansListFromAdmin();
$planLiveGifTableList = $iN->iN_LiveGifPlansListFromAdmin();
$sendCoinList = $iN->iN_LiveGiftSendList();
if (isset($_COOKIE[$cookieName])) {
	$logedIn = '1';
	$sessionKey = isset($_COOKIE[$cookieName]) ? mysqli_real_escape_string($db, $_COOKIE[$cookieName]) : NULL;
	$user_id = $iN->iN_GetUserIDFromSessionKey($sessionKey);
	if ($user_id) {
		$userData = $iN->iN_GetUserDetails($user_id);
		$userFullName = $iN->sanitize_output($userData['i_user_fullname'], $base_url);
		$userName = $userData['i_username'];
		$userEmail = $userData['i_user_email'];
		$userID = $userData['iuid'];
		$userLang = $userData['lang'];
		$userType = $userData['userType']; 
		if($fullnameorusername == 'no'){
			$userFullName = $userName;
		}
		$userBio = isset($userData['u_bio']) ? $userData['u_bio'] : NULL;
		$userBirthDay = isset($userData['birthday']) ? $userData['birthday'] : NULL; 
		$userQrCode = isset($userData['qr_image']) ? $userData['qr_image'] : NULL;
		if ($userBirthDay) {
			$userBirthDay = DateTime::createFromFormat('Y-m-d', $userBirthDay)->format('d/m/Y');
		}
		$verifData = $iN->iN_CheckUserHasVerificationRequest($userID);
		$verStatus = '';
		$userGender = $userData['user_gender'];
		$userWhoCanSeePost = $userData['post_who_can_see'];
		$userProfileCategory = isset($userData['profile_category']) ? $userData['profile_category'] : NULL;
		if(empty($userProfileCategory) || $userProfileCategory == NULL){
           mysqli_query($db,"UPDATE i_users SET profile_category = 'normal_user' WHERE iuid = '$userID'") or die(mysqli_error($db));
		}
		/*Notification Call Functions*/
		$Notifications = $iN->iN_GetAllNotificationList($userID, $scrollLimit);
		$userProfileUrl = $base_url . $userName;
		$userAvatar = $iN->iN_UserAvatar($userID, $base_url);
		$userCover = $iN->iN_UserCover($userID, $base_url);
		$totalSubscribers = $iN->iN_UserTotalSubscribers($userID);
		$totalPointPayments = $iN->iN_UserTotalPointPayments($userID); 
		$totalSubscriptions = $iN->iN_UserTotalSubscribtions($userID);
		$totalFollowingUsers = $iN->iN_UserTotalFollowingUsers($userID);
		$totalFollowerUsers = $iN->iN_UserTotalFollowerUsers($userID);
		$totalBlockedUsers = $iN->iN_UserTotalBlocks($userID);
		$totalPurchasedPoints = $iN->iN_UserTotalPointPurchase($userID);
		$certificationStatus = $userData['certification_status'];
		$validationStatus = $userData['validation_status'];
		$conditionStatus = $userData['condition_status'];
		$feesStatus = $userData['fees_status'];
		$payoutStatus = $userData['payout_status'];
		$lightDark = $userData['light_dark'];
		$deviceKey = isset($userData['device_key']) ? $userData['device_key'] : NULL;
		$lastLoginTime = $userData['last_login_time'];
		$countryCode = isset($userData['countryCode']) ? $userData['countryCode'] : NULL;
		$notificationEmailStatus = $userData['email_notification_status'];
		$showHidePostOnlineOffline = $userData['show_hide_posts'];
		$messageSendStatus = $userData['message_status'];
		$userEmailVerificationStatus = $userData['email_verify_status']; 
		$thanksNOtForTip = isset($userData['thanks_for_tip']) ? $userData['thanks_for_tip'] : NULL;
		$userTimeZone = isset($userData['u_timezone']) ? $userData['u_timezone'] : NULL;
		$myVideoCallPrice = isset($userData['video_call_price']) ? $userData['video_call_price'] : NULL;
		
		if($userTimeZone){
			date_default_timezone_set($userTimeZone);
		}
		$payoutMethod = isset($userData['payout_method']) ? $userData['payout_method'] : NULL;
		$paypalEmail = isset($userData['paypal_email']) ? $userData['paypal_email'] : NULL;
		$bankAccount = isset($userData['bank_account']) ? $userData['bank_account'] : NULL;
		$WeeklySubDetail = $iN->iN_GetUserSubscriptionPlanDetails($userID, 'weekly');
		$MonthlySubDetail = $iN->iN_GetUserSubscriptionPlanDetails($userID, 'monthly');
		$YearlySubDetail = $iN->iN_GetUserSubscriptionPlanDetails($userID, 'yearly'); 
		$calculateCurrentEarning = $iN->iN_CalculateCurrentMonthEarning($userID);
		$cEarning = isset($calculateCurrentEarning['calculate']) ? $calculateCurrentEarning['calculate'] : '0';
		$userCurrentPoints = isset($userData['wallet_points']) ? $userData['wallet_points'] : '0';
		$userWallet = isset($userData['wallet_money']) ? $userData['wallet_money'] : '0';
		function format_number($number,$dec=0,$trim=false){
			if($trim){
			  $parts = explode(".",(round($number,$dec) * 1));
			  $dec = isset($parts[1]) ? strlen($parts[1]) : 0;
			}
			$formatted = number_format($number,$dec); 
			return $formatted;
		  }
		$userWallet = format_number($userWallet, 2);
		include $serverDocumentRoot . '/langs/' . $userLang . '.php';
		if ($userWhoCanSeePost == 1) {
			$activeWhoCanSee = '<div class="form_who_see_icon_set">' . $iN->iN_SelectedMenuIcon('50') . '</div> ' . $LANG['weveryone'];
		} else if ($userWhoCanSeePost == 2) {
			$activeWhoCanSee = '<div class="form_who_see_icon_set">' . $iN->iN_SelectedMenuIcon('15') . '</div> ' . $LANG['wfollowers'];
		} else if ($userWhoCanSeePost == 3) {
			$activeWhoCanSee = '<div class="form_who_see_icon_set">' . $iN->iN_SelectedMenuIcon('51') . '</div> ' . $LANG['wsubscribers'];
		} else if ($userWhoCanSeePost == 4) {
			$activeWhoCanSee = '<div class="form_who_see_icon_set">' . $iN->iN_SelectedMenuIcon('9') . '</div> ' . $LANG['wpremium'];
		}
/*Payment Methods Gateways Details*/
		$method = $iN->iN_PaymentMethods();

		/*CCBILL PAYMENT DETAILS*/
		$ccbill_AccountNumber = $method['ccbill_account_number'];
		$ccbill_SubAccountNumber = $method['ccbill_subaccount_number'];
		$ccbill_FlexID = $method['ccbill_flex_form_id'];
		$ccbill_SaltKey = $method['ccbill_salt_key'];
		$ccbill_Status = $method['ccbill_status'];
		$ccbill_Currency = $method['ccbill_currency'];
		/*PAYPAL PAYMENT GATEWAY DETAILS*/
		$payPalPaymentMode = $method['paypal_payment_mode'];
		$payPalPaymentStatus = $method['paypal_active_pasive'];
		$payPalPaymentSedboxBusinessEmail = $method['paypal_sendbox_business_email'];
		$payPalPaymentProductBusinessEmail = $method['paypal_product_business_email'];
		$payPalCurrency = $method['paypal_crncy'];

		$bitPayPaymentMode = $method['bitpay_payment_mode'];
		$bitPayPaymentStatus = $method['bitpay_active_pasive'];
		$bitPayPaymentNotificationEmail = $method['bitpay_notification_email'];
		$bitPayPaymentPassword = $method['bitpay_password'];
		$bitPayPaymentPairingCode = $method['bitpay_pairing_code'];
		$bitPayPaymentLabel = $method['bitpay_label'];
		$bitPayPaymentCurrency = $method['bitpay_crncy'];

		$stripePaymentMode = $method['stripe_payment_mode'];
		$stripePaymentStatus = $method['stripe_active_pasive'];
		$stripePaymentTestSecretKey = $method['stripe_test_secret_key'];
		$stripePaymentTestPublicKey = $method['stripe_test_public_key'];
		$stripePaymentLiveSecretKey = $method['stripe_live_secret_key'];
		$stripePaymentLivePublicKey = $method['stripe_live_public_key'];
		$stripePaymentCurrency = $method['stripe_crncy']; 
		
		$autHorizePaymentMode = $method['authorize_payment_mode'];
		$autHorizePaymentStatus = $method['authorizenet_active_pasive'];
		$autHorizePaymentTestsApID = $method['authorizenet_test_ap_id'];
		$autHorizePaymentTestTransitionKey = $method['authorizenet_test_transaction_key'];
		$autHorizePaymentLiveApID = $method['authorizenet_live_api_id'];
		$autHorizePaymentLiveTransitionkey = $method['authorizenet_live_transaction_key'];
		$autHorizePaymentCurrency = $method['authorize_crncy'];

		if($autHorizePaymentMode == '0'){
           $autName = $method['authorizenet_test_ap_id'];
		   $autKey = $method['authorizenet_test_transaction_key'];
		} else{
		   $autName = $method['authorizenet_live_api_id'];
		   $autKey = $method['authorizenet_live_transaction_key'];
		}

		$iyziCoPaymentMode = $method['iyzico_payment_mode'];
		$iyziCoPaymentStatus = $method['iyzico_active_pasive'];
		$iyziCoPaymentTestSecretKey = $method['iyzico_testing_secret_key'];
		$iyziCoPaymentTestApiKey = $method['iyzico_testing_api_key'];
		$iyziCoPaymentLiveApiKey = $method['iyzico_live_api_key'];
		$iyziCoPaymentLiveApiSecret = $method['iyzico_live_secret_key'];
		$iyziCoPaymentCurrency = $method['iyzico_crncy'];

		$razorPayPaymentMode = $method['razorpay_payment_mode'];
		$razorPayPaymentStatus = $method['razorpay_active_pasive'];
		$razorPayPaymentTestKeyID = $method['razorpay_testing_key_id'];
		$razorPayPaymentTestSecretKey = $method['razorpay_testing_secret_key'];
		$razorPayPaymentLiveKeyID = $method['razorpay_live_key_id'];
		$razorPayPaymentLiveSecretKey = $method['razorpay_live_secret_key'];
		$razorPayPaymentCurrency = $method['razorpay_crncy'];

		$payStackPaymentMode = $method['paystack_payment_mode'];
		$payStackPaymentStatus = $method['paystack_active_pasive'];
		$payStackPaymentTestSecretKey = $method['paystack_testing_secret_key'];
		$payStackPaymentTestPublicKey = $method['paystack_testing_public_key'];
		$payStackPaymentLiveSecretKey = $method['paystack_live_secret_key'];
		$payStackPaymentLivePublicKey = $method['pay_stack_liive_public_key'];
		$payStackPaymentCurrency = $method['paystack_crncy'];

		/*CoinPayment*/
		$coinPaymentStatus = $method['coinpayments_status'];
		$coinPaymentPrivateKey = isset($method['coinpayments_private_key']) ? $method['coinpayments_private_key'] : NULL;
		$coinPaymentPublicKey = isset($method['coinpayments_public_key']) ? $method['coinpayments_public_key'] : NULL;
		$coinPaymentMerchandID = isset($method['coinpayments_merchand_id']) ? $method['coinpayments_merchand_id'] : NULL;
		$coinPaymentIPNSecret = isset($method['coinpayments_ipn_secret']) ? $method['coinpayments_ipn_secret'] : NULL;
		$coinPaymentDebugEmail = isset($method['coinpayments_debug_email']) ? $method['coinpayments_debug_email'] : NULL;
		$coinPaymentCryptoCurrency = isset($method['cp_cryptocurrencies']) ? $method['cp_cryptocurrencies'] : NULL;

		if ($verifData) {
			$verificationRequestStatus = $verifData['request_status'];
			$userReadStatus = $verifData['user_read_status'];
			if ($verificationRequestStatus == '0' && $userReadStatus != '1') {
				$verStatus = '<div class="i_postFormContainer"><div class="certification_terms">
        <div class="certification_terms_item verirication_timing_bg"></div>
        <div class="certification_terms_item">
            <div class="certificate_terms_item_item pendingTitle">
              ' . $LANG['your_request_is_pending'] . '
            </div>
            <div class="certificate_terms_item_item">
              ' . $LANG['you_will_notififed_when_it_is_processed'] . '
            </div>
        </div>
    </div></div>';
			} else if ($verificationRequestStatus == '1' && $userReadStatus != '1') {
				$verStatus = '<div class="i_postFormContainer"><div class="certification_terms">
    <div class="certification_terms_item verification_approve_bg"></div>
    <div class="certification_terms_item">
        <div class="certificate_terms_item_item pendingTitle">
           ' . $LANG['congratulations_approved'] . '
        </div>
        <div class="certificate_terms_item_item">
          ' . $LANG['congrat_approved_not'] . '
        </div>
    </div>
</div></div>';
			} else if ($verificationRequestStatus == '2' && $userReadStatus != '1') {
				$iN->iN_UpdateVerificationAnswerReadStatus($userID);
				$verStatus = '<div class="i_postFormContainer"><div class="certification_terms">
    <div class="certification_terms_item verification_reject_bg"></div>
    <div class="certification_terms_item">
        <div class="certificate_terms_item_item pendingTitle">
           ' . $LANG['sorry_rejected'] . '
        </div>
        <div class="certificate_terms_item_item">
          ' . $LANG['sorry_you_are_rejected'] . '
        </div>
    </div>
</div></div>';
			}
		}
	} else {
		setcookie($cookieName, '', time() - 31556926, '/');
		unset($_COOKIE[$cookieName]);
		header("Location: index.php");
		exit();
	}
} else {
	$logedIn = '0';
	$certificationStatus = '0';
	$validationStatus = '0';
	$conditionStatus = '0';
	$feesStatus = '0';
	$payoutStatus = '0'; 
	include $serverDocumentRoot . '/langs/' . $defaultLanguage . '.php'; 
	setcookie($cookieName, '', 1);
	setcookie($cookieName, '', time() - 31556926, '/');
}
?>