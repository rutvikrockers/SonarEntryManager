    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/validation.css"/>
	<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.validate.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>js/additional-methods.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.maskedinput.js"></script>
    
    <script>
    $( document ).ready(function() {
    	$( "#forget_form" ).submit(function(event){ 
    		var email = $('#femail').val();
    
    		if(!email){
 			
 				$('#femail').closest('.form-group').addClass('has-error');
 				$('#femail').closest('label').addClass('control-label');
 				$('#femail').addClass('form-control');
 				return false;
 			}
 			
    	});
 		
	});	
    	
    </script>
    
    <section>  
            <div class="container">
            	 <div class="pt pb">
					   <div class="col-lg-12 test-contct test-cntr">
					       <h1><?php echo SOCIAL_SIGNUP;?></h1>
					   </div>
					   <div class="clearfix"></div>
					   <div class="festival"></div>
					</div>
            	<div class="row">
                  
					
                    <div class="col-lg-9 col-md-8 col-sm-12 col-xs-12  login-sign pdlr">
                    
                    	<div class="open-air">
                    	
                     	<div class="tab-content">
                
                            
                            <div class="" id="forget_pass">
                            	
                            	<?php if($error!=''){
                        			?>
                        			<div class="alert alert-danger mar10"><?php echo $error; ?></div>
                        		<?php 	
                        		}?>
                            	
                            
                            	<form class="event-title" name="social_form" id="social_form" method="post" action="<?php echo site_url('user/social_signup');?>">
                                
                                 <div class="form-group clearfix pt mt">
                                 
                                    <div class="col-sm-3 col-xs-12 lable-rite">
                                        <label><?php echo FIRST_NAME;?></label>
                                    </div>
                                    <div class="col-sm-8 col-xs-12">
                                        <input type="text" placeholder="<?php echo FIRST_NAME;?>" name="first_name" id="first_name" value="<?php echo SecureShowData($first_name);?>">
                                    </div>
                                
                        		</div>
                        		<div class="form-group clearfix pt mt">
                                 
                                    <div class="col-sm-3 col-xs-12 lable-rite">
                                        <label><?php echo LAST_NAME;?></label>
                                    </div>
                                    <div class="col-sm-8 col-xs-12">
                                        <input type="text" placeholder="<?php echo LAST_NAME;?>" name="last_name" id="last_name" value="<?php echo SecureShowData($last_name);?>">
                                    </div>
                                
                        		</div>
                        		<div class="form-group clearfix pt mt">
                                 
                                    <div class="col-sm-3 col-xs-12 lable-rite">
                                        <label><?php echo EMAIL;?></label>
                                    </div>
                                    <div class="col-sm-8 col-xs-12">
                                        <input type="text" placeholder="<?php echo EMAIL;?>" name="email" id="email" value="<?php echo $email;?>">
                                    </div>
                                
                        		</div>
                        		<div class="form-group clearfix pt mt">
                                 
                                    <div class="col-sm-3 col-xs-12 lable-rite">
                                        <label><?php echo PASSWORD;?></label>
                                    </div>
                                    <div class="col-sm-8 col-xs-12">
                                        <input type="password" placeholder="<?php echo PASSWORD;?>" name="password" id="password">
                                    </div>
                                
                        		</div>
                        		 <div class="form-group clearfix">
	                            	<div class="col-sm-3 col-xs-12 lable-rite">
	                            		<label><?php echo GENDER;?></label>
	                            	</div>
	                            	<div class="col-sm-8 col-xs-12">
	                            		<select class="select-pad" name="gender" id="gender">
	                                    	<option value="Female" ><?php echo FEMALE; ?></option>
	                                        <option value="Male" ><?php echo MALE; ?></option>
	                                    </select>
	                            	</div>
                        		</div>
                                
                               
                                
                                <div class="form-group clearfix text-right">
	                                <div class="col-sm-11 browse pb">
	                                	<input type="submit" name="submit" value="<?php echo SUBMIT;?>" class="btn-event">	
    	                            </div>
                                </div>
                                
                                
                                </form>
                                
                            </div>
                        </div>
                                
                          
                           </div> 
                       
                	</div><!-- End lucha -->
                    
                 <!-- End login-fb -->	
				</div>
                
            </div><!-- End container -->
            <div class="pb"></div>
    </section>
     <script src="<?php echo base_url(); ?>js/bootstrap-datepicker.js"></script>
    <script>
    		$(document).ready(function(){
    		$(".rover_tip").popover();
	});
	</script>
	<script type="text/javascript">
            // When the document is ready
            $(document).ready(function () {
                
                $('#datepicker1').datepicker({
                    format: "dd/mm/yyyy",
					orientation: 'top'
                });
				
            });
			
			$(document).ready(function () {
                
                $('#datepicker2').datepicker({
                    format: "dd/mm/yyyy",
					orientation: 'top'
                });
				
            });
        </script>