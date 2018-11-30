   <section class="eventDash-head">
  	<div class="container">
    	<div class="row">              
          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 test-contct test-cntr">
                <h1><?php echo MY_ACCOUNT; ?></h1>
          </div>
         
          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 text-right pt mt10 con-cntr">
        
            <div class="halfacc">
             <p><?php echo $site_setting['site_name']; ?> <?php echo ACCOUNT_SINCE; ?> <span><?php echo datetimeformat($user_data['created_at']);?> <?php echo timeFormat($user_data['created_at']); ?></span></p>
            <?php 

            if($user_data['ref_id']){
              $admin=getRecordById('users','id',$user_data['ref_id']);

              ?><p><?php echo THE_MAIN_ACCOUNT_HOLDER_IS;?> <span><?php echo SecureShowData($admin['email']) ;?></span></p>
            <?php } ?>
            </div>
          </div>
        
      </div>
    </div>
  </section>
   
   <section>  
            <div class="container marTB50">
                
                 <?php if($msg!=''){
                        			?>
                       <div class="alert alert-success mar10 sucerrcmn"><?php echo SecureShowData($msg); ?></div>
               <?php 	
                     }?>
                     <?php if($error!=''){
                        			?>
                       <div class="alert alert-danger mar10 sucerrcmn"><?php echo $error; ?></div>
               <?php 	
                     }?>
                     <div class="row">
                <form name="change_password" class="event-title" id="change_password" method="post" action="<?php echo site_url('user/change_password');?>">
                
                <div class=" col-lg-8 col-md-8 col-sm-12 col-xs-12">
                
                <div class="row">    
                            
                <div class="event-webpage col-xs-12 col-sm-12">
                	<div class="red-event width100 "><h4><?php echo CHANGE_PASSWORD; ?></h4></div>
                    <div class="clear"></div>
                </div><!-- End event-webpage -->
                
			
                <div class="col-sm-12 clearfix">
                    <div class="event-detail event-detail2 pt pb">
                   	
                    	
                        <div class="form-group clearfix">
                            	<div class="col-sm-3 col-xs-12 lable-rite">
                            		<label><?php echo OLD_PASSWORD; ?></label><span>*</span>
                            	</div>
                            	<div class="col-sm-8 col-xs-12">
                            		<input type="password" name="old_password" id="old_password">
                            	</div>
                        </div>
                        
                        <div class="form-group clearfix">
                            	<div class="col-sm-3 col-xs-12 lable-rite">
                            		<label><?php echo NEW_PASSWORD; ?></label><span>*</span>
                            	</div>
                            	<div class="col-sm-8 col-xs-12">
                            		<input type="password" name="new_password" id="new_password">
                            	</div>
                        </div>
                        
                        <div class="form-group clearfix">
                            	<div class="col-sm-3 col-xs-12 lable-rite">
                            		<label><?php echo CONFIRM_PASSWORD; ?></label><span>*</span>
                            	</div>
                            	<div class="col-sm-8 col-xs-12">
                            		<input type="password" name="confirm_password" id="confirm_password">
                            	</div>
                        </div>
                        
                        
                        
                    
                 	 </div><!-- end event-detail -->
               </div>      
                
              </div><!-- End Row-->  
                             
              	<div class="fr pb">
                    <ul class="save-preview3 clearfix">
                        <li>
                        	<input type="submit" value="<?php echo SAVE;?>" class="btn-event2" />
                        </li>
                    </ul>
                </div>
                             
           </div><!-- End col-sm-8 -->          
           		
           		</form>         
                 
             
                
                <!-- RIGHT CONTENT -->
               <?php echo $this->load->view('default/common/account_sidebar');?>
             </div>
                
            </div><!-- End container -->
    </section>
    <script>
    		$(document).ready(function(){
    		$(".rover_tip").popover();
	});
	</script>
    
    <script>
    		$(document).ready(function(){
    		$(".edit").tooltip();
	});
	</script>