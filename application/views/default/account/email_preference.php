<section class="eventDash-head">
  	<div class="container">
    	<div class="row">              
          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 test-contct test-cntr">
                <h1><?php echo MY_ACCOUNT; ?></h1>
          </div>
         
          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 text-right pt mt10 con-cntr">
        
            <div class="halfacc">
             <p><?php echo SecureShowData($site_setting['site_name']); ?> <?php echo ACCOUNT_SINCE; ?> <span><?php echo datetimeformat($user_data['created_at']);?> <?php echo timeFormat($user_data['created_at']); ?></span></p>
            <?php 
            if($user_data['ref_id']){
              $admin=getRecordById('users','id',$user_data['ref_id']);

              ?><p><?php echo THE_MAIN_ACCOUNT_HOLDER_IS;?> <span><?php echo SecureShowData($admin['email']);?></span></p>
            <?php } ?>
            </div>
          </div>
        
      </div>
    </div>
</section>
  
<section>  
            <div class="container marTB50">
                <?php if($success_msg) {?>
            	<div class="alert alert-success" role="alert">
            	<?php
					     echo $success_msg;
				      ?>
                </div>
                <?php } ?>
                <div class="row">
                <form class="event-title" method="post" action="<?php echo site_url('email_preference/add_email_preference');?>">
                <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 mb">
                
                <div class="row">    
                            
                <div class="event-webpage col-xs-12 col-sm-12">
                	<div class="red-event width100 "><h4><?php echo ATTENDING_EVENTS; ?> <span><?php echo NEWS_AND_UPDATES_ABOUT_EVENTS_CREATED_BY_EVENT_ORGANIZERS; ?></span></h4></div>
                    <div class="clear"></div>
                </div><!-- End event-webpage -->
                
			
                <div class="col-sm-12 clearfix mb ">
                    <div class="event-detail event-detail2 pt pb buyer">
                   		
                        <h2><?php echo BUYER_INFORMATION; ?></h2>
                    	 
                         
                    	
                        <div class="form-group clearfix">
                            	<div class="col-sm-3 col-xs-12 lable-rite">
                            		<label><?php echo EMAIL; ?></label>
                            	</div>
                            	<div class="col-sm-8 col-xs-12">
                            		
                                    <div class="checkbox" style="margin-top: 0px;">
                                          <label>
                                            <input type="checkbox" name="attendee_update" value="1" <?php if($attendee_update == 1) { echo "checked"; }?>><?php echo UPDATES_ABOUT_NEW; ?> <?php echo $site_setting['site_name']; ?> <?php echo FEATURES_AND_ANNOUNCEMENTS; ?>
                                          </label>
                                    </div>
                                   
                            	</div>
                        </div>
                       
                 	 </div><!-- end event-detail -->
               </div>      
                
              </div><!-- End Row-->
              
              <div class="row">    
                            
                <div class="event-webpage col-xs-12 col-sm-12">
                	<div class="red-event width100 "><h4><?php echo ORGANIZING_EVENTS; ?> <span></span></h4></div>
                    <div class="clear"></div>
                </div><!-- End event-webpage -->
                
			
                <div class="col-sm-12 clearfix">
                    <div class="event-detail event-detail2 pt pb buyer">
                   		
                        <h2><?php echo FROM; ?> <?php echo SecureShowData($site_setting['site_name']); ?></h2>
                    	
                        <div class="form-group clearfix">
                            	<div class="col-sm-3 col-xs-12 lable-rite">
                            		<label><?php echo EMAIL;?></label>
                            	</div>
                            	<div class="col-sm-8 col-xs-12">
                            		
                                    <div class="checkbox"  style="margin-top: 0px;">
                                          <label>
                                            <input type="checkbox" name="org_update" value="1" <?php if($org_update == 1) { echo "checked"; }?>><?php echo UPDATES_ABOUT_NEW; ?> <?php echo SecureShowData($site_setting['site_name']); ?> <?php echo FEATURES_AND_ANNOUNCEMENTS; ?>
                                          </label>
                                    </div>
                                    
                            	</div>
                        </div>
                 	 </div><!-- end event-detail -->
               </div>      
                
              </div>
              
              <div class="row">    
                            
                <div class="event-webpage col-xs-12 col-sm-12">
                  <div class="red-event width100 "><h4><?php echo NOTIFICATIONS; ?> <span></span></h4></div>
                    <div class="clear"></div>
                </div><!-- End event-webpage -->
                
      
                <div class="col-sm-12 clearfix">
                    <div class="event-detail event-detail2 pt pb buyer">
                                          
                        <div class="form-group clearfix">
                              <div class="col-sm-3 col-xs-12 lable-rite">
                                <label></label>
                              </div>
                              <div class="col-sm-8 col-xs-12">
                                
                                    <div class="checkbox"  style="margin-top: 0px;">
                                          <label>
                                            <input type="checkbox" name="event_owner_notification" value="1" <?php if($user_owner_notif == 1) { echo 'checked="checked"'; }?>><?php echo ORDER_CONFIRMATIONS_FROM_MY_ATTENDEES; ?>
                                          </label>
                                    </div>
                                    
                              </div>
                        </div>
                   </div><!-- end event-detail -->
               </div>      
                
              </div>


                 <div class="text-right">
                   <input type="submit" value="<?php echo SAVE_PREFERENCES; ?>" class="btn-event2" name="submit">
                	</div>
                             
           </div><!-- End col-sm-8 -->          
                    
           </form>      
             
                
                <!-- RIGHT CONTENT -->
                <?php echo $this->load->view('default/common/account_sidebar');?>
                </div>
                
            </div><!-- End container -->
    </section>
  </body>
</html>