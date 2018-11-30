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
					       <h1><?php echo RESET_PASSWORD;?></h1>
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
                            	
                             
                            	<form class="event-title" name="reset_form" id="reset_form" method="post" action="<?php echo site_url('user/reset_password/'.$forgot_unique_code);?>">
                                
                                 <div class="form-group clearfix pt mt">
                                 
                                    <div class="col-sm-3 col-xs-12 lable-rite">
                                        <label><?php echo PASSWORD;?></label>
                                    </div>
                                    <div class="col-sm-8 col-xs-12">
                                        <input type="password" placeholder="Password" name="password" id="password">
                                    </div>
                                
                        		</div>
                        		
                        		<div class="form-group clearfix pt mt">
                                 
                                    <div class="col-sm-3 col-xs-12 lable-rite">
                                        <label><?php echo RETYPE_PASSWORD;?></label>
                                    </div>
                                    <div class="col-sm-8 col-xs-12">
                                        <input type="password" placeholder="Retype password" name="cpassword" id="cpassword">
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
                    
                    <div class="col-lg-3 col-md-4 col-sm-12 col-xs-12  pb clearfix pdlr" style="display: none;">
                        
                      
                       <div class="">
                               	<div class="btn-common">
                                       <a href="<?php echo site_url('user/social/facebook');?>" class="facebook_icon">
                                       <img src="<?php echo base_url();?>images/iconFB.png" alt=" " height=" " width=" " >
                                       <span><?php echo CONNECT_WITH_FACEBOOK?></span>
                                       </a>
                                   </div>
                                   
                                   <div class="btn-common marB10">
                                       <a href="<?php echo site_url('user/social/Twitteroauth'); ?>" class="twitter_icon">
                                       <img src="<?php echo base_url();?>images/iconTW.png" alt=" " height=" " width=" " />
                                       <span><?php echo CONNECT_WITH_TWITTER?></span>
                                       </a> 
                                   </div>
                                   
                                  
                                   
                                   <div class="btn-common marB10">
                                       <a href="<?php echo site_url('user/social/Linkedin'); ?>" class="linkedin_icon">
                                       <img src="<?php echo base_url();?>images/iconIN.png" alt=" " height=" " width=" " />
                                       <span><?php echo CONNECT_WITH_LINKEDIN?></span>
                                       </a> 
                                   </div>
                                   
                                    <div class="btn-common ">
                                       <a href="<?php echo site_url('user/social/google'); ?>" class="google_icon">
                                       <img src="<?php echo base_url();?>images/iconGP.png" alt=" " height=" " width=" " />
                                       <span><?php echo CONNECT_WITH_GOOGLEPLUS?></span>
                                       </a> 
                                   </div>
                               </div>
                                          
                        
                   
                    
               		</div><!-- End login-fb -->	
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