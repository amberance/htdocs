<div class="i_contents_container">
    <div class="i_general_white_board border_one column flex_ tabing__justify">
        <!---->
        <div class="i_general_title_box">
          <?php echo filter_var($LANG['fake_user_generator'], FILTER_SANITIZE_STRING);?>
        </div> 
        <!---->
        <div class="i_general_row_box column flex_" id="general_conf" style="padding-top:30px;">  
        <!--*********************************-->   
        <form enctype="multipart/form-data" method="post" id="generateFakeUser"> 
        <!---->
        <div class="i_general_row_box_item flex_ tabing_non_justify">
            <div class="irow_box_left tabing flex_ "><?php echo filter_var($LANG['how_many_users_you_want_to_generate'], FILTER_SANITIZE_STRING);?></div>
            <div class="irow_box_right">
                <input type="text" name="n" class="i_input flex_" value="10">
                <div class="rec_not" style="padding-top:5px;"><?php echo filter_var($LANG['min_u_r'], FILTER_SANITIZE_STRING);?></div>
            </div>
        </div>
        <!---->
        <!---->
        <div class="i_general_row_box_item flex_ tabing_non_justify">
            <div class="irow_box_left tabing flex_ "><?php echo filter_var($LANG['password'], FILTER_SANITIZE_STRING);?></div>
            <div class="irow_box_right">
                <input type="text" name="p" class="i_input flex_" value="123456789">
                <div class="rec_not" style="padding-top:5px;"><?php echo filter_var($LANG['choose_password'], FILTER_SANITIZE_STRING);?></div>
            </div>
        </div>
        <!---->    
        <div class="i_settings_wrapper_item successNot"><?php echo filter_var($LANG['updated_successfully'], FILTER_SANITIZE_STRING);?></div>
        <div class="admin_approve_post_footer">
            <div class="i_become_creator_box_footer">
                <input type="hidden" name="f" value="fake_generaator"> 
                <button type="submit" name="submit" class="i_nex_btn_btn transition"><?php echo filter_var($LANG['save_edit'], FILTER_SANITIZE_STRING);?></button>
            </div>
        </div>
        </form>
    </div> 
</div>
<script type="text/javascript">
(function($) {
    "use strict";
    var preLoadingAnimation = '<div class="i_loading" style="margin-bottom:20px"><div class="dot-pulse"></div></div>';
    var plreLoadingAnimationPlus = '<div class="loaderWrapper"><div class="loaderContainer"><div class="loader">' + preLoadingAnimation + '</div></div></div>';
    
$(document).on('submit', "#generateFakeUser", function(e) {
        e.preventDefault();
        var generateFakeUser = $("#generateFakeUser");
        jQuery.ajax({
            type: "POST",
            url: siteurl + "request/request.php",
            data: generateFakeUser.serialize(),
            beforeSend: function() {
                $(".successNot , .warning_").hide();
                $("#general_conf").append(plreLoadingAnimationPlus);
                generateFakeUser.find(':input[type=submit]').prop('disabled', true);
            },
            success: function(data) {
                setTimeout(() => {
                    generateFakeUser.find(':input[type=submit]').prop('disabled', false);
                }, 3000);
                if (data == '200') {
                    $(".successNot").show();
                } else if (data == '404') {
                    $(".warning_").show();
                } else {
                    $("body").append('<div class="nnauthority"><div class="no_permis flex_ c3 border_one tabing">' + data + '</div></div>');
                    setTimeout(() => {
                        $(".nnauthority").remove();
                    }, 5000);
                }
                $(".loaderWrapper").remove();
            }
        });
    });
})(jQuery);
</script>