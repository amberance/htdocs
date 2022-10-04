<div class="i_modal_bg_in">
    <!--SHARE-->
   <div class="i_modal_in_in i_sf_box"> 
       <div class="i_modal_content">  
           <!--Modal Header-->
            <div class="i_modal_g_header">
             <?php echo filter_var($LANG['buy_this_product'], FILTER_SANITIZE_STRING); ?>
             <div class="shareClose transition"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('5'));?></div>
            </div>
            <!--/Modal Header--> 
            <!--LIST-->
            <div class="purchase_pp_container">
                <div class="yourWallet flex_ tabing">
                    <div class="your_wallet_icon_cont flex_ tabing">
                        <div class="your_wallet_icon flex_ tabing">
                            <?php echo html_entity_decode($iN->iN_SelectedMenuIcon('40'));?>
                        </div>
                    </div>
                </div>
                <!--w-->
                <div class="p_p_wallet_cont">
                    <div class="h_product_title" style="text-align:center;padding-top:15px;font-size:18px;"><?php echo filter_var($LANG['your_point_balance'], FILTER_SANITIZE_STRING);?></div>
                    <div class="crnt_points" style="text-align:center;font-size: 43px;padding-top: 15px;">
                        <?php echo number_format($userCurrentPoints);?><span>(<?php echo $onePointEqual * $userCurrentPoints; echo $currencys[$defaultCurrency];?>)</span>
                    </div>
                    <?php 
                        $prProductPrice = $prData['pr_price']; 
                        $currentAmount = $onePointEqual * $userCurrentPoints;
                        echo $prProductPrice.'<-ProductAmount, CurrentAmount->'.$currentAmount;
                        if($currentAmount >= $prProductPrice){
                            echo 'It is ok wallet enough for purchase';
                        }else{
                            echo '';
                        } 
                    ?>
                </div>
                <!--/w-->
            </div>
            <!--/LIST-->
       </div>   
   </div>
   <!--/SHARE--> 
</div> 