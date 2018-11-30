<section class="eventDash-head">
  	<div class="container">
    	<div class="row">              
          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 test-contct test-cntr">
                <h1><?php echo MY_ACCOUNT; ?></h1>
          </div>
         
          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 text-right pt mt10 con-cntr">
        
            <div class="halfacc">
             <p><?php echo SecureShowData($site_setting['site_name']); ?> <?php echo ACCOUNT_SINCE; ?> <span><?php echo datetimeformat($user_data['created_at']);?></span></p>
            </div>
          </div>
        
      </div>
    </div>
  </section>
    
    <section>  
            <div class="container marTB50">
                 <?php if($error!=''){
                        			?>
                        <div class="alert alert-danger mar10"><?php echo $error; ?></div>
               <?php 	
                     }?>
                <div class="row">
                <form name="change_password" class="event-title" id="change_password" method="post" action="<?php echo site_url('user/close_account');?>">
                <div class=" col-lg-8 col-md-8 col-sm-12 col-xs-12">
              
             
              	<div class="row">    
                            
                <div class="event-webpage col-xs-12 col-sm-12">
                	<div class="red-event width100 "><h4><?php echo CLOSE_ACCOUNT; ?></h4></div>
                    <div class="clear"></div>
                </div><!-- End event-webpage -->
                
                	<div class="admin">    
                    </div>
			
                <div class="col-sm-12 clearfix">
                    <div class="event-detail event-detail2 clearfix pd15">
                   
                    <div class="form-group m0 clearfix ">
                    <p><?php echo THANK_YOU_FOR_USING_EVENTTHREE_EVENTS_IF_THERE_IS_ANYTHING_WE_CAN_DO_TO_KEEP_YOU_WITH_US_PLEASE_LET_US_KNOW; ?></p>
                            	<div class="col-sm-12 col-xs-12 pt">
                            		<h3><?php echo PLEASE_TAKE_A_MOMENT_TO_LET_US_KNOW_WHY_YOU_ARE_LEAVING; ?></h3>
                            	</div>
                    </div>
                    <div class="form-group clearfix ">
                            	<div class="col-sm-12 col-xs-12">
                                	<div class="radio">
                                          <label>
                                            <input type="radio" name="optionsRadios" id="optionsRadios1" value="I do not recall signing up for Eventthree" <?php echo ($optionsRadios=="I do not recall signing up for Eventthree")? 'checked="checked"':'' ;?>>
                                            <?php echo I_DO_NOT_RECALL_SIGNING_UP_FOR; ?> <?php echo SecureShowData($site_setting['site_name']);?>
                                          </label>
                                        </div>
                                        
                                     <div class="radio">
                                          <label>
                                            <input type="radio" name="optionsRadios" id="optionsRadios2" value="The product is too difficult to use" <?php echo ($optionsRadios=="The product is too difficult to use")? 'checked="checked"':'' ;?>>
                                            <?php echo THE_PRODUCT_IS_TOO_DIFFICULT_TO_USE; ?>
                                          </label>
                                    </div>
                                    <div class="radio">
                                          <label>
                                            <input type="radio" name="optionsRadios" id="optionsRadios3" value="I chose a different solution" <?php echo ($optionsRadios=="I chose a different solution")? 'checked="checked"':'' ;?> >
                                            <?php echo I_CHOSE_A_DIFFERENT_SOLUTION; ?>
                                          </label>
                                    </div>
                                    <div class="radio">
                                          <label>
                                            <input type="radio" name="optionsRadios" id="optionsRadios4" value="The pricing is too high" <?php echo ($optionsRadios=="The pricing is too high")? 'checked="checked"':'' ;?>>
                                            <?php echo THE_PRICING_IS_TOO_HIGH; ?>
                                          </label>
                                    </div>
                                    <div class="radio">
                                          <label>
                                            <input type="radio" name="optionsRadios" id="optionsRadios5" value="The product lacks the necessary features" <?php echo ($optionsRadios=="The product lacks the necessary features")? 'checked="checked"':'' ;?>>
                                            <?php echo THE_PRODUCT_LACKS_THE_NECESSARY_FEATURES; ?>
                                          </label>
                                    </div>
                                    <div class="radio">
                                          <label>
                                            <input type="radio" name="optionsRadios" id="optionsRadios6" value="The pricing is confusing" <?php echo ($optionsRadios=="The pricing is confusing")? 'checked="checked"':'' ;?>>
                                            <?php echo THE_PRICING_IS_CONFUSING; ?>
                                          </label>
                                    </div>
                                    <div class="radio">
                                          <label>
                                            <input type="radio" name="optionsRadios" id="optionsRadios7" value="I do not host events" <?php echo ($optionsRadios=="I do not host events")? 'checked="checked"':'' ;?>>
                                           <?php echo I_DO_NOT_HOST_EVENTS;?>
                                          </label>
                                    </div>
                                    <div class="radio">
                                          <label>
                                            <input type="radio" name="optionsRadios" id="optionsRadios8" value="other" <?php echo ($optionsRadios=="other")? 'checked="checked"':'' ;?>>
                                            <?php echo OTHER_PLEASE_EXPLAIN; ?>
                                          </label>
                                    </div>
                                    <div class="col-sm-8 col-xs-12">
                            		<input type="text" name="reason" id="reason" value="<?php echo SecureShowData($reason);?>">
                            	</div>
                            	</div>
                                  
                        	</div>
                            
                    <div class="form-group m0 clearfix ">
                    	<div class="col-sm-12 col-xs-12 pt">
                          <h3><?php echo PLEASE_ENTER_CLOSE_AND_YOUR_PASSWORD_BELOW_TO_CONFIRM_THAT_YOU_WISH_TO_CLOSE_YOUR_ACCOUNT; ?></h3>
                        </div>
                    </div>
                    
                    <div class="form-group clearfix">
                            	<div class="col-sm-3 col-xs-12 lable-rite">
                            		<label><?php echo TYPE_CLOSE;?></label>
                            	</div>
                            	<div class="col-sm-8 col-xs-12">
                            		<input type="text" name="close" id="close" value="<?php echo $close;?>">
                            	</div>
                        </div>
                        
                    <div class="form-group clearfix">
                            	<div class="col-sm-3 col-xs-12 lable-rite">
                            		<label><?php echo ENTER_YOUR_PASSWORD; ?></label>
                            	</div>
                            	<div class="col-sm-8 col-xs-12">
                            		<input type="password" name="password" id="password">
                            	</div>
                        </div>
                            
                    
                    
                 	 </div><!-- end event-detail -->
               </div>      
                
              </div><!-- End Row-->
              
              <div class="text-right">
                    <input type="button" value="<?php echo CLOSE_NOW;?>" class="btn-event2 close-account">
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
    
    <script type="text/javascript">
		function hideshow(which){
		if (!document.getElementById)
		return
		if (which.style.display=="block")
		which.style.display="none"
		else
		which.style.display="block"
		}

    $(document).ready(function(){
      $('.close-account').click(function(){
        if(confirm("<?php echo CLOSE_ACCOUNT_MESSAGE_VALIDATION; ?>")){
          $('form[name=change_password]').submit();
        }
      });
    });
	</script>