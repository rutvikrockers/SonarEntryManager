    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/validation.css"/>
	<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.validate.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>js/additional-methods.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.maskedinput.js"></script>
    
    <script>
    $( document ).ready(function() {
    	$( "#resend_form" ).submit(function(event){ 
    		var email = $('#email').val();
    
    		if(!email){
 			
 				$('#email').closest('.form-group').addClass('has-error');
 				$('#email').closest('label').addClass('control-label');
 				$('#email').addClass('form-control');
 				return false;
 			}
 			
 		
    	});
 		
	});	
    	
    </script>
    
    <section>  
            <div class="container">
            	 <div class="pt pb">
					   <div class="col-lg-12 test-contct test-cntr">
					       <h1><?php echo RESEND_PASSWORD;?></h1>
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
                            	
                            	<form class="event-title" name="resend_form" id="resend_form" method="post" action="<?php echo site_url('user/resend');?>">
                                
                                 <div class="form-group clearfix pt mt">
                                 
                                    <div class="col-sm-3 col-xs-12 lable-rite">
                                        <label><?php echo EMAIL;?></label>
                                    </div>
                                    <div class="col-sm-8 col-xs-12">
                                        <input type="text" placeholder="Enter your Email ID" name="email" id="email">
                                    </div>
                                
                        		</div>
                                
                               
                                
                                <div class="form-group clearfix text-right">
	                                <div class="col-sm-11 browse pb">
                                	<input type="submit" name="submit" value="<?php echo RESEND;?>" class="btn-event">
    	                            </div>
                                </div>
                                
                                
                                </form>
                                
                            </div>
                        </div>
                                
                          
                           </div> 
                       
                	</div><!-- End lucha -->
                    
                    <div class="col-lg-3 col-md-4 col-sm-12 col-xs-12  pb clearfix pdlr">
                        
                  
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