<div class="i_product_post_body i_post_body body_<?php echo filter_var($ProductID, FILTER_SANITIZE_STRING); ?> " id="<?php echo filter_var($ProductID, FILTER_SANITIZE_STRING); ?>" data-last="<?php echo filter_var($ProductID, FILTER_SANITIZE_STRING); ?>">
  <div class="i_product_wrp_p">
      <div class="i_product_wrp_header flex_">
          <div class="i_product_o_avatar">
             <img src="<?php echo filter_var($pprofileAvatar, FILTER_VALIDATE_URL);?>">
          </div>
          <div class="i_post_i_p flex_ tabing">
             <div class="i_post_username_p flex_ tabing"><a href="<?php echo filter_var($base_url.$productOwnerUserName, FILTER_VALIDATE_URL);?>"><?php echo filter_var($productOwnerUserFullName, FILTER_SANITIZE_STRING);?></a></div>
          </div>
      </div>
      <!---->
      <a href="<?php echo $SlugUrl;?>">
      <div class="i_prod_p_i_c flex_ tabing">
          <img class="timp" src="<?php echo $productDataImage;?>">
      </div>
      </a>
      <!---->
      <!---->
      <div class="s_p_details">
          <div class="s_p_title" title="<?php echo filter_var($ProductName, FILTER_SANITIZE_STRING);?>"><a href="<?php echo $SlugUrl;?>"><?php echo filter_var($ProductName, FILTER_SANITIZE_STRING);?></a></div>
          <div class="s_p_product_type <?php echo $p__style;?>"><?php echo filter_var($LANG[$ProductType], FILTER_SANITIZE_STRING);?></div>
          <div class="s_p_price"><?php echo $currencys[$defaultCurrency].$ProductPrice;?></div>
      </div> 
      <!---->
  </div>
</div> 
