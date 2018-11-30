<?php
$user_exists = getRecordById('permissions','user_id',$this->session->userdata['user_id']); 
if($user_exists){
   $multi=true;                     
}else{
  $multi=false;  
}
$payment = check_permission_label('account','edit_payment_account');
$site_setting = site_setting();
$affiliate_status = $site_setting['affiliate_status'];

$msg=getUnreadCount();
$unreadMsg=$msg['msgs'];
$unreadMsg_text='('.$unreadMsg.')';

if($unreadMsg<=0){ $unreadMsg_text=''; }

?>
<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 clearfix">
                 <div class="list-group accountSidebar mb0">
         
          <h3 class="eventdash-link"><?php echo MY_ACCOUNT;?></h3>
          
          <div id="accordion" class="panel-group eventdash-link2 mb0">
                  
                    <div class="panel">
                       <a href="<?php echo site_url('user/my_account');?>" class="list-group-item collapsed">
                        <?php echo CONTACT_INFO;?>
                      </a>
                      
                    </div>

                    <div class="panel">
                       <a href="<?php echo site_url('inbox');?>" class="list-group-item collapsed">
                        <?php echo SecureShowData(INBOX.$unreadMsg_text);?>
                      </a>                    
                    </div>
                    
                    <div class="panel">
                      <a href="<?php echo site_url('user/change_password');?>" class="list-group-item collapsed">
                      <?php echo CHANGE_PASSWORD;?>
                      </a>
                      
                    </div>
                    
                    <div class="panel">
                        <a href="<?php echo site_url('email_preference/add_email_preference');?>" class="list-group-item collapsed">
                        <?php echo EMAIL_PREFERENCES; ?>
                      </a>
                      
                    </div>

                    <div class="panel" style="display: none;">
                        <a href="<?php echo site_url('account/find_friends');?>" class="list-group-item collapsed">
                        <?php echo FIND_FRIENDS; ?>
                      </a>
                      
                    </div>

                     <?php if(!$payment){ ?>
                    <div class="panel">
                        <a href="<?php echo site_url('account/payment_account');?>" class="list-group-item collapsed">
                        <?php echo PAYMENT_ACCOUNTS;?>
                      </a>
                           
                    </div> <?php }?>
                    <?php if($multi===false){ ?>
                         <div class="panel">
                            <a href="<?php echo site_url('account/multi_user');?>" class="list-group-item collapsed">
                            <?php echo MULTI_USER_ACCESS;?>
                          </a>
                      
                    </div>
                   <?php }?>
                   
                    
                    <div class="panel">
                        <a href="<?php echo site_url('account/unused_organizers');?>" class="list-group-item collapsed">
                        <?php echo ORGANIZERS;?>
                      </a>
                      
                    </div>
                    <?php
          $referral_setting = referral_setting();
          if($referral_setting['refferal_status'] == 1)
          {
          ?>
                    <div class="panel hide">
                        <a href="<?php echo site_url('account/my_referrals');?>" class="list-group-item collapsed">
                        <?php echo REFERRAL_PROGRAM;?>
                      </a>
                      
                    </div>
          <?php }?>
                     
                    <?php if($affiliate_status == 1)
                    { ?>
                    <div class="panel" style="display: none;">
                        <a href="<?php echo site_url('affiliate/my_affiliates');?>" class="list-group-item collapsed">
                        <?php echo AFFILIATE_PROGRAM;?>
                      </a>
                      
                    </div>
                    <?php } ?>
                    <div class="panel">
                        <a href="<?php echo site_url('account/myearning'); ?>" class="list-group-item collapsed">
                      <?php echo MY_EARNINGS;?>
                      </a>
                      
                    </div>

                     <div class="panel">
                        <a href="<?php echo site_url('venues/my_venues');?>" class="list-group-item collapsed">
                        <?php echo My_Venue; ?>
                      </a>
                      
                    </div>
                    
                    <div class="panel">
                        <a href="<?php echo site_url('account/cancel_order'); ?>" class="list-group-item collapsed">
                        <?php echo CANCELLED_ORDERS;?>
                      </a>
                      
                    </div>
                    
                     <?php  if($multi===false) {
                        $total_event = total_user_active_event($this->session->userdata['user_id']);
                        if($total_event) { ?>
                            <div class="panel">
                                <a href="javascript:void(0);" class="list-group-item collapsed" data-original-title="<?php echo CLOSE_ACCOUNT_MESSAGE; ?>" data-placement="left" data-toggle="tooltip">
                                    <?php echo CLOSE_ACCOUNT;?>
                                </a>
                            </div>
                        <?php } else { ?>
                            <div class="panel">
                                <a href="<?php echo site_url('user/close_account'); ?>" class="list-group-item collapsed">
                                    <?php echo CLOSE_ACCOUNT;?>
                                </a>
                            </div>
                        <?php } ?>
                    <?php } ?>
                    
          </div><!-- inner-link ENDS -->          
        </div>                              
    </div>


<script>
    $(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip();
    });
</script>