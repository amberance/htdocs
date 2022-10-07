<!--Gif Coin List-->
<div class="live_gif_coins_list">
    <div class="live_gif_coins_list_wrapper">
        <!--SWIPER STARTED-->
        <!-- Swiper -->
        <div class="swiper mySwiper">
        <div class="swiper-wrapper" style="color:black;">
        <?php  
        if($sendCoinList){
        foreach($sendCoinList as $planData){
            $planID = $planData['gift_id'];
            $planName = $planData['gift_name'];
            $planCreditAmount = $planData['gift_point'];
            $planAmount = $planData['gift_money_equal']; 
            $planImage = $base_url.$planData['gift_image'];
        ?> 
          <div class="swiper-slide" style="color:black;">
             <div class="live_gift_coin_container co_<?php echo filter_var($planID, FILTER_SANITIZE_STRING);?>">
                 <div class="live_gift_coin_avatar"><img src="<?php echo filter_var($planImage, FILTER_SANITIZE_URL);?>"></div>
                 <div class="live_gift_hv">
                    <div class="live_gift_coin_name"><?php echo filter_var($planName, FILTER_SANITIZE_STRING);?></div>
                    <div class="live_gift_coin_amount"><?php echo filter_var($planCreditAmount, FILTER_SANITIZE_STRING).' '.$LANG['coins'];?></div> 
                 </div>
                 <div class="live_gift_coin_btn">
                        <div class="live_coin_btn flex_ tabing">
                            <div class="live_coin_send transitions" data-tip="<?php echo filter_var($planID, FILTER_SANITIZE_STRING);?>" data-u="<?php echo filter_var($liveCreator, FILTER_SANITIZE_STRING); ?>">Send</div>
                        </div>
                    </div>
             </div>
          </div>  
        <?php }}?>
        </div>
            <div class="swiper-button-next sw"></div>
            <div class="swiper-button-prev sw"></div> 
        </div> 
        <!-- Initialize Swiper -->
        <script>
        var swiper = new Swiper(".mySwiper", {
            slidesPerView: 1,
            spaceBetween: 10,
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            breakpoints: {
            640: {
                slidesPerView: 2,
                spaceBetween: 20,
            },
            768: {
                slidesPerView: 4,
                spaceBetween: 20,
            },
            1024: {
                slidesPerView: 8,
                spaceBetween: 20,
            },
            },
        });
        </script>
        <!--SWIPER FINISHED-->
    </div>
</div>
<!--/Gif Coin List-->