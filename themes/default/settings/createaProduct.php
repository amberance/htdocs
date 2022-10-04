<div class="settings_main_wrapper"> 
  <div class="i_settings_wrapper_in" style="display:inline-table;">
     <div class="i_settings_wrapper_title">
       <div class="i_settings_wrapper_title_txt flex_"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('159'));?><?php echo filter_var($LANG['createaProduct'], FILTER_SANITIZE_STRING);?></div> 
       <div class="i_moda_header_nt"><?php echo filter_var($LANG['create_your_own_product'], FILTER_SANITIZE_STRING);?></div>
    </div> 
    <div class="i_settings_wrapper_items"> 
       <div class="i_tab_container i_tab_padding">
           <?php 
            $createProof = array('scratch','bookazoom','digitaldownload','liveeventticket','artcommission','joininstagramclosefriends');
              if(isset($_GET['create']) && in_array($_GET['create'], $createProof)){
                    $proof = mysqli_real_escape_string($db, $_GET['create']);
                    include_once("createProduct/".$proof.".php");
            }else{?>
           <div class="crate_a_product_wrapper flex_">
                <?php if($iN->iN_ShopData($userID, 2) == 'yes'){?>
                <!--Product Create Item-->
                <div class="crate_a_product_item">
                    <a href="<?php echo filter_var($base_url, FILTER_VALIDATE_URL);?>settings?tab=createaProduct&create=scratch">
                        <div class="start_from_scratch flex_ tabing"><?php echo filter_var($LANG['scratch'], FILTER_SANITIZE_STRING);?></div>
                    </a>
                </div>
                <!--/Product Create item-->
                <?php }?>
                <?php if($iN->iN_ShopData($userID, 3) == 'yes'){?>
                <!--Product Create Item-->
                <div class="crate_a_product_item">
                    <a href="<?php echo filter_var($base_url, FILTER_VALIDATE_URL);?>settings?tab=createaProduct&create=bookazoom">
                        <div class="cretate_item_box cibBoxColorOne flex_ tabing_non_justify">
                            <div class="cibIcon flex_ tabing"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('160'));?></div>
                            <div class="cibTitle"><?php echo filter_var($LANG['bookazoom'], FILTER_SANITIZE_STRING);?></div>
                        </div>
                    </a>
                </div>
                <!--/Product Create item-->
                <?php }?>
                <?php if($iN->iN_ShopData($userID, 4) == 'yes'){?>
                <!--Product Create Item-->
                <div class="crate_a_product_item">
                    <a href="<?php echo filter_var($base_url, FILTER_VALIDATE_URL);?>settings?tab=createaProduct&create=digitaldownload">
                        <div class="cretate_item_box cibBoxColorTwo flex_ tabing_non_justify">
                            <div class="cibIcon flex_ tabing"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('161'));?></div>
                            <div class="cibTitle"><?php echo filter_var($LANG['digitaldownload'], FILTER_SANITIZE_STRING);?></div>
                        </div>
                    </a>
                </div>
                <!--/Product Create item-->
                <?php }?>
                <?php if($iN->iN_ShopData($userID, 5) == 'yes'){?>
                <!--Product Create Item-->
                <div class="crate_a_product_item">
                    <a href="<?php echo filter_var($base_url, FILTER_VALIDATE_URL);?>settings?tab=createaProduct&create=liveeventticket">
                        <div class="cretate_item_box cibBoxColorThree flex_ tabing_non_justify">
                            <div class="cibIcon flex_ tabing"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('162'));?></div>
                            <div class="cibTitle"><?php echo filter_var($LANG['liveeventticket'], FILTER_SANITIZE_STRING);?></div>
                        </div>
                    </a>
                </div>
                <!--/Product Create item-->
                <?php }?>
                <?php if($iN->iN_ShopData($userID, 6) == 'yes'){?>
                <!--Product Create Item-->
                <div class="crate_a_product_item">
                    <a href="<?php echo filter_var($base_url, FILTER_VALIDATE_URL);?>settings?tab=createaProduct&create=artcommission">
                        <div class="cretate_item_box cibBoxColorFour flex_ tabing_non_justify">
                            <div class="cibIcon flex_ tabing"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('163'));?></div>
                            <div class="cibTitle"><?php echo filter_var($LANG['artcommission'], FILTER_SANITIZE_STRING);?></div>
                        </div>
                    </a>
                </div>
                <!--/Product Create item-->
                <?php }?>
                <?php if($iN->iN_ShopData($userID, 7) == 'yes'){?>
                <!--Product Create Item-->
                <div class="crate_a_product_item">
                    <a href="<?php echo filter_var($base_url, FILTER_VALIDATE_URL);?>settings?tab=createaProduct&create=joininstagramclosefriends">
                        <div class="cretate_item_box cibBoxColorFive flex_ tabing_non_justify">
                            <div class="cibIcon flex_ tabing"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('164'));?></div>
                            <div class="cibTitle"><?php echo filter_var($LANG['joininstagramclosefriends'], FILTER_SANITIZE_STRING);?></div>
                        </div>
                    </a>
                </div>
                <!--/Product Create item-->
                <?php }?>
           </div>
           <?php }?>
       </div>
    </div> 
  </div>
</div>  