<?php
// +------------------------------------------------------------------------+
// | @author Mustafa Öztürk (mstfoztrk)
// | @author_url 1: http://www.duhovit.com
// | @author_url 2: http://codecanyon.net/user/mstfoztrk
// | @author_email: socialmaterial@hotmail.com
// +------------------------------------------------------------------------+
// | dizzy Support Creators Content Script
// | Copyright (c) 2021 mstfoztrk. All rights reserved.
// +------------------------------------------------------------------------+
// Database Configuration
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'radiento_dizzy_spells');
define('DB_PASSWORD', 'GuildB$U@***');
define('DB_DATABASE', 'radiento_dizzy_gillespie');
define('DB2_SERVER', 'localhost');
define('DB2_USERNAME', 'radiento_willy');
define('DB2_PASSWORD', 'PaladinB$U@***');
define('DB2_DATABASE', 'radiento_boxcar');
$db = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE) or die(mysqli_connect_error());
mysqli_query($db, 'set character_set_results="utf8mb4"');
mysqli_query($db, "SET SESSION SQL_MODE=REPLACE(@@SQL_MODE, 'ONLY_FULL_GROUP_BY', '') ");
mysqli_query($db, "SET @@global.sql_mode= 'NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION'; ");
$base_url = 'https://www.radient.one/';
$serverDocumentRoot = $_SERVER['DOCUMENT_ROOT'];
$uploadFile = $serverDocumentRoot . '/uploads/files/';
$xVideos = $serverDocumentRoot . '/uploads/xvideos/';
$xImages = $serverDocumentRoot . '/uploads/pixel/';
$uploadCover = $serverDocumentRoot . '/uploads/covers/';
$uploadAvatar = $serverDocumentRoot . '/uploads/avatars/';
$uploadIconLogo = $serverDocumentRoot . '/img/';
$uploadAdsImage = $serverDocumentRoot . '/uploads/spImages/';
$metaBaseUrl = $base_url;
$cookieName = 'dizzy';
?>