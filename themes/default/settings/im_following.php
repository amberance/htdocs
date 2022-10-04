<?php
$totalPages = ceil($totalFollowingUsers / $paginationLimit);
if (isset($_GET["page-id"])) {
	$pagep = mysqli_real_escape_string($db, $_GET["page-id"]);
	if (preg_match('/^[0-9]+$/', $pagep)) {
		$pagep = $pagep;
	} else {
		$pagep = '1';
	}
} else {
	$pagep = '1';
}
?>
<div class="settings_main_wrapper">
  <div class="i_settings_wrapper_in" style="display:inline-table;">
     <div class="i_settings_wrapper_title">
       <div class="i_settings_wrapper_title_txt flex_"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('139')); ?><?php echo filter_var($LANG['you_are_following'], FILTER_SANITIZE_STRING) . '(' . $totalFollowingUsers . ')'; ?></div>
       <div class="i_moda_header_nt"><?php echo filter_var($LANG['you_are_following_not'], FILTER_SANITIZE_STRING); ?></div>
    </div>
    <div class="i_settings_wrapper_items">
       <div class="i_tab_container i_tab_padding">
       <?php
$followingUsers = $iN->iN_FollowingUsersListPage($userID, $paginationLimit, $pagep);
if ($followingUsers) {
	foreach ($followingUsers as $flU) {
      $followingUserID = $flU['fr_two'];
      $followingUserData = $iN->iN_GetUserDetails($followingUserID);
      $flUUserName = $followingUserData['i_username'];
      $flUUserFullName = $followingUserData['i_user_fullname'];
      $flUUserAvatar = $iN->iN_UserAvatar($followingUserID, $base_url); 
		$getFriendStatusBetweenTwoUser = $iN->iN_GetRelationsipBetweenTwoUsers($userID, $followingUserID);
		if ($getFriendStatusBetweenTwoUser == 'flwr') {
			$flwrBtn = 'i_btn_like_item_flw f_p_follow';
			$flwBtnIconText = $iN->iN_SelectedMenuIcon('66') . $LANG['unfollow'];
		} else {
			$flwrBtn = 'i_btn_like_item free_follow';
			$flwBtnIconText = $iN->iN_SelectedMenuIcon('66') . $LANG['follow'];
		}
		?>
            <!--SUBSCRIBER-->
              <div class="i_sub_box_container">
                 <div class="i_sub_box_wrp flex_">
                    <div class="i_sub_box_avatar">
                        <img class="isubavatar" src="<?php echo filter_var($flUUserAvatar, FILTER_SANITIZE_STRING); ?>">
                    </div>
                       <div class="i_sub_box_name_time">
                        <div class="i_sub_box_name"><a href="<?php echo filter_var($base_url . $flUUserName, FILTER_SANITIZE_STRING); ?>"><?php echo filter_var($flUUserFullName, FILTER_SANITIZE_STRING); ?></a></div>
                        <div class="i_sub_box_unm">@<?php echo filter_var($flUUserName, FILTER_SANITIZE_STRING); ?></div>
                       </div>
                    <div class="i_sub_flw"><div class="i_follow flex_ tabing i_fw<?php echo filter_var($followingUserID, FILTER_SANITIZE_STRING); ?> <?php echo html_entity_decode($flwrBtn); ?> transition unSubU" id="i_btn_like_item" data-u="<?php echo filter_var($followingUserID, FILTER_SANITIZE_STRING); ?>"><?php echo html_entity_decode($flwBtnIconText); ?></div></div>
                 </div>
              </div>
            <!--/SUBSCRIBER-->
        <?php }} else {echo '<div class="no_creator_f_wrap flex_ tabing"><div class="no_c_icon">' . $iN->iN_SelectedMenuIcon('54') . '</div><div class="n_c_t">' . $LANG['no_one_you_subscribed'] . '</div></div>';}?>
        </div>
    </div>
     <div class="i_become_creator_box_footer tabing">
        <?php if (ceil($totalFollowingUsers / $paginationLimit) > 0): ?>
            <ul class="pagination">
                <?php if ($pagep > 1): ?>
                <li class="prev"><a class="transition" href="<?php echo filter_var($base_url, FILTER_SANITIZE_STRING); ?>settings?tab=im_following&page-id=<?php echo filter_var($pagep, FILTER_SANITIZE_STRING) - 1 ?>"><?php echo filter_var($LANG['preview_page'], FILTER_SANITIZE_STRING); ?></a></li>
                <?php endif;?>

                <?php if ($pagep > 3): ?>
                <li class="start"><a class="transition" href="<?php echo filter_var($base_url, FILTER_SANITIZE_STRING); ?>settings?tab=im_following&page-id=1">1</a></li>
                <li class="dots">...</li>
                <?php endif;?>
                <?php if ($pagep - 2 > 0): ?><li class="page"><a class="transition" href="<?php echo filter_var($base_url, FILTER_SANITIZE_STRING); ?>settings?tab=im_following&page-id=<?php echo filter_var($pagep, FILTER_SANITIZE_STRING) - 2; ?>"><?php echo filter_var($pagep, FILTER_SANITIZE_STRING) - 2; ?></a></li><?php endif;?>
                <?php if ($pagep - 1 > 0): ?><li class="page"><a href="<?php echo filter_var($base_url, FILTER_SANITIZE_STRING); ?>settings?tab=im_following&page-id=<?php echo filter_var($pagep, FILTER_SANITIZE_STRING) - 1; ?>"><?php echo filter_var($pagep, FILTER_SANITIZE_STRING) - 1; ?></a></li><?php endif;?>

                <li class="currentpage active"><a  class="transition" href="<?php echo filter_var($base_url, FILTER_SANITIZE_STRING); ?>settings?tab=im_following&page-id=<?php echo filter_var($pagep, FILTER_SANITIZE_STRING); ?>"><?php echo filter_var($pagep, FILTER_SANITIZE_STRING); ?></a></li>

                <?php if ($pagep + 1 < ceil($totalFollowingUsers / $paginationLimit) + 1): ?><li class="page"><a class="transition" href="<?php echo filter_var($base_url, FILTER_SANITIZE_STRING); ?>settings?tab=im_following&page-id=<?php echo filter_var($pagep, FILTER_SANITIZE_STRING) + 1; ?>"><?php echo filter_var($pagep, FILTER_SANITIZE_STRING) + 1; ?></a></li><?php endif;?>
                <?php if ($pagep + 2 < ceil($totalFollowingUsers / $paginationLimit) + 1): ?><li class="page"><a class="transition" href="<?php echo filter_var($base_url, FILTER_SANITIZE_STRING); ?>settings?tab=im_following&page-id=<?php echo filter_var($pagep, FILTER_SANITIZE_STRING) + 2; ?>"><?php echo filter_var($pagep, FILTER_SANITIZE_STRING) + 2; ?></a></li><?php endif;?>

                <?php if ($pagep < ceil($totalFollowingUsers / $paginationLimit) - 2): ?>
                <li class="dots">...</li>
                <li class="end"><a class="transition" href="<?php echo filter_var($base_url, FILTER_SANITIZE_STRING); ?>settings?tab=im_following&page-id=<?php echo ceil($totalFollowingUsers / $paginationLimit); ?>"><?php echo ceil($totalFollowingUsers / $paginationLimit); ?></a></li>
                <?php endif;?>

                <?php if ($pagep < ceil($totalFollowingUsers / $paginationLimit)): ?>
                <li class="next"><a class="transition" href="<?php echo filter_var($base_url, FILTER_SANITIZE_STRING); ?>settings?tab=im_following&page-id=<?php echo filter_var($pagep, FILTER_SANITIZE_STRING) + 1; ?>"><?php echo filter_var($LANG['next_page'], FILTER_SANITIZE_STRING); ?></a></li>
                <?php endif;?>
            </ul>
        <?php endif;?>
     </div>
  </div>
</div>
<script type="text/javascript">
$(document).ready(function(){

});
</script>