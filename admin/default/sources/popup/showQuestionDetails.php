<div class="i_modal_bg_in">
    <!--SHARE-->
   <div class="i_modal_in_in"> 
       <div class="i_modal_content">  
            <!--Modal Header-->
            <div class="i_modal_g_header">
                <?php echo filter_var($LANG['question_det'], FILTER_SANITIZE_STRING);?>
                <div class="shareClose transition"><?php echo html_entity_decode($iN->iN_SelectedMenuIcon('5'));?></div>
            </div>
            <!--/Modal Header-->
            <div class="i_delete_post_description column" style="position:relative;">  
                <!---->
                <div class="purchase_post_details"> 
                    <div class="wallet-debit-confirm-container flex_ column">
                       <div class="contact_u_detail flex_ tabing" style="margin-bottom:15px;">
                          <div class="contact_u_d flex_"><?php echo filter_var($LANG['the_person_asking'], FILTER_SANITIZE_STRING);?></div>
                          <div class="contact_u_d flex_ fw-300"><?php echo $qDet['contact_full_name'];?></div>
                       </div>
                       <div class="contact_u_detail flex_ tabing" style="margin-bottom:15px;">
                          <div class="contact_u_d flex_"><?php echo filter_var($LANG['u_asking_email'], FILTER_SANITIZE_STRING);?></div>
                          <div class="contact_u_d flex_ fw-300"><?php echo $qDet['contact_email'];?></div>
                       </div>
                    </div>
                    <div class="withdraw_other_details border_one flex_ column fw-400">
                           <?php echo $qDet['contact_message'];?>
                    </div>
                </div>
                <!---->
            </div>
            <!--Modal Header-->
            <div class="i_modal_g_footer flex_"> 
                <div class="alertBtnLeft no-del transition"><?php echo filter_var($LANG['close'], FILTER_SANITIZE_STRING) ;?></div>
                <div class="answerMail transition"><a href="mailto:<?php echo $qDet['contact_email'];?>"><?php echo filter_var($LANG['answer_question'], FILTER_SANITIZE_STRING) ;?></a></div>
            </div>
            <!--/Modal Header-->
       </div>   
   </div>
   <!--/SHARE--> 
</div> 