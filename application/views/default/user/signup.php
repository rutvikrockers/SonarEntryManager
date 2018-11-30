
<?php $facebook_setting=getAllData('facebook_settings');
$twitter_settings=getAllData('twitter_settings');
$google_setting=getAllData('google_setting');
$linkdin_setting=getAllData('linkdin_setting'); ?>
<link rel="stylesheet" type="text/css" href="//maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/validation.css"/>
	<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.validate.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>js/additional-methods.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.maskedinput.js"></script>
  <script src='https://www.google.com/recaptcha/api.js'></script>
    
    <script>
    $( document ).ready(function() {
    	$( "#login_form" ).submit(function(event){ 
    		var email = $('#email').val();
    		var password = $('#password').val();
    
    		if(!email){
 			
 				$('#email').closest('.form-group').addClass('has-error');
 				$('#email').closest('label').addClass('control-label');
 				$('#email').addClass('form-control');
 				return false;
 			}else{
 				var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    			var em =  re.test(email);
    				
    			if(!em){
    				$('#email').closest('.form-group').addClass('has-error');
 					$('#email').closest('label').addClass('control-label');
 					$('#email').addClass('form-control');
 					$('#client_err').css("display", "block");
 					$('#client_err').html('<?php echo ENTER_VALID_EMAIL; ?>');
    				return false;
    			}
    			
 			}
 			
 			if(!password){
 			
 				$('#password').closest('.form-group').addClass('has-error');
 				$('#password').closest('label').addClass('control-label');
 				$('#password').addClass('form-control');
 				return false;
 				
 			}else{
 				var pwd = password.length;
 				if(pwd>16 || pwd<8){
 					$('#password').closest('.form-group').addClass('has-error');
 					$('#password').closest('label').addClass('control-label');
 					$('#password').addClass('form-control');
 					$('#client_err').css("display", "block");
 					$('#client_err').html('<?php echo PASSWORD_MUST_NOT_BE_LESS_THAN_AND_MORE_THAN_CHARACTERS; ?>');
 					return false;
 				}
 				
 			}
 		
    	});
    	
    	$( "#signup_form" ).submit(function(event){ 
    		var email = $('#remail').val();
    		var password = $('#rpassword').val();

        if(!email && !password){
          $('#remail').closest('.form-group').addClass('has-error');
          $('#remail').closest('label').addClass('control-label');
          $('#remail').addClass('form-control');
          $('#rpassword').closest('.form-group').addClass('has-error');
          $('#rpassword').closest('label').addClass('control-label');
          $('#rpassword').addClass('form-control');
          $('#client_err').css("display", "block");
          $('#client_err').html('<?php echo EMAIL_PASSWORD_REQUIRED; ?>');
          return false;

        }
    
    		if(!email){
 			
 				$('#remail').closest('.form-group').addClass('has-error');
 				$('#remail').closest('label').addClass('control-label');
 				$('#remail').addClass('form-control');
          $('#client_err').css("display", "block");
         $('#client_err').html('<?php echo EMAIL_PASSWORD_REQUIRED; ?>');
 				return false;
 			}else{
 				var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    			var em =  re.test(email);
    				
    			if(!em){
    				$('#remail').closest('.form-group').addClass('has-error');
 					$('#remail').closest('label').addClass('control-label');
 					$('#remail').addClass('form-control');
 					$('#client_err').css("display", "block");
 					$('#client_err').html('<?php echo ENTER_VALID_EMAIL; ?>');
    				return false;
    			}
    			
 			}
 			
 			if(!password){
 			
 				$('#rpassword').closest('.form-group').addClass('has-error');
 				$('#rpassword').closest('label').addClass('control-label');
 				$('#rpassword').addClass('form-control');
        $('#client_err').css("display", "block");
        $('#client_err').html('<?php echo PASSWORD_REQUIRED; ?>');
 				return false;
 			}else{
 				var pwd = password.length;
 				if(pwd>16 || pwd<8){
 					$('#rpassword').closest('.form-group').addClass('has-error');
 					$('#rpassword').closest('label').addClass('control-label');
 					$('#rpassword').addClass('form-control');
 					$('#client_err').css("display", "block");
 					$('#client_err').html('<?php echo PASSWORD_MUST_NOT_BE_LESS_THAN_AND_MORE_THAN_CHARACTERS; ?>');
 					return false;
 				}
 				
 			}
 		
    	});
 		
	});	
    	
    </script>
    <section>  
            <div class="container marTB50">
            	<div class="row">
                <div class="col-lg-4 col-lg-offset-4 col-sm-6 col-sm-offset-3">
                    <div class="loginBox">
            			<div class="panel panel-default">
                              <div class="panel-heading">
                                <h3 class="panel-title"><?php echo SIGN_UP; ?></h3>
                                <p><?php echo HAVE_AN_ACCOUNT;?>  <strong><a href="<?php echo site_url('user/login/'.$page); ?>"><?php echo LOGIN; ?></a></strong></p>
                              </div>
                              <div class="panel-body">
                                <?php 
								
								   
								if($error_signup!=''){
                        			?>
                        			<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only"><?php echo CLOSE; ?></span></button>  <?php echo $error_signup; ?></div>
                        		<?php
                        		}?>
                        		<div class="alert alert-danger mar10" id="client_err" style="display:none"></div>                                   
                                    
                                    <form class="event-title" name="signup_form" id="signup_form" method="post" action="<?php echo site_url('user/signup/'.$page);?>">
                                
                                 <div class="form-group">
                                 	<input type="text" placeholder="Email" name="remail" id="remail" value="<?php echo $remail?>" class="form-control">
                        		</div>
                                
                                <div class="form-group">
                                 <input type="password" placeholder="Password" name="rpassword" id="rpassword" class="form-control"> 
                        		</div>
                               
                                <div class="form-group">
                                <?php $result = getRecordById('captcha_settings','id','1');?>
                                  <?php if($result['status'] == 1) { ?>
                                  <?php } else {?>
                                   <div class="g-recaptcha" data-sitekey="<?php echo $result['captcha_site_key']; ?>"></div> 
                                  <?php } ?>
                            </div>
                                <div class="text-right">
	                                <input type="submit" name="submit" value="<?php echo SIGNUP;?>" class="btn-event2">
                                </div>
                                
                                <div class="agree text-center">
                                <p><?php echo SIGNUP_AGREE;?> 
                                  <?php $pages_data = getRecordById('pages','pages_title',TERMS_OF_SERVICE); ?>  
                                  <a href="<?php echo site_url('pages').'/'.$pages_data['slug'];?>"><?php echo TERMS_OF_SERVICE;?></a> and 
                                  <?php $pages_data = getRecordById('pages','pages_title',PRIVACY_POLICY); ?>  
                                  <a href="<?php echo site_url('pages').'/'.$pages_data['slug'];?>"><?php echo PRIVACY_POLICY;?></a> 
                                  </p>
                                </div>
                                
                                </form>
                                    
                                <div class="or-container">
                                	<hr class="no-margin">
                                 <?php 
                                    if($facebook_setting[0]['facebook_login_enable']=="1" || $twitter_settings[0]['twitter_enable']=="1" || $linkdin_setting[0]['linkdin_enable']=="1" || $google_setting[0]['google_enable']=="1"){ ?>
                                    <div class="or">or</div>
                                     <?php } ?>
                                </div>
                                
                                <div class="social-login clearfix">
                                <?php if($facebook_setting[0]['facebook_login_enable']){ ?>
                                                  <div class="btn-common">
                                                         <a href="<?php echo site_url('user/social/facebook');?>" class="facebook_icon">
                                                         <i class="fa fa-facebook"></i>
                                                         <span><?php echo LOGIN_FACEBOOK?></span>
                                                         </a>
                                                     </div>
                                  <?php } ?>
                                                     <?php if($twitter_settings[0]['twitter_enable']){ ?>                   
                                                     <div class="btn-common marB10">
                                                         <a href="<?php echo site_url('user/social/Twitteroauth'); ?>" class="twitter_icon">
                                                         <i class="fa fa-twitter"></i>
                                                         <span><?php echo LOGIN_TWITTER?></span>
                                                         </a> 
                                                     </div>
                                                     
                                             <?php } ?>
                                                    
                                                     <?php if($linkdin_setting[0]['linkdin_enable']){ ?>       
                                                     
                                                     <div class="btn-common marB10">
                                                         <a href="<?php echo site_url('user/social/Linkedin'); ?>" class="linkedin_icon">
                                                         <i class="fa fa-linkedin"></i>
                                                         <span><?php echo LOGIN_LINKEDIN?></span>
                                                         </a> 
                                                     </div>
                                                  <?php } ?>
                                                     <?php if($google_setting[0]['google_enable']){ ?>   
                                                      <div class="btn-common ">
                                                         <a href="<?php echo site_url('user/social/google'); ?>" class="google_icon">
                                                         <i class="fa fa-google-plus"></i>
                                                         <span><?php echo LOGIN_GOOGLEPLUS?></span>
                                                         </a> 
                                                     </div>
                                                     <?php } ?>
                                                 </div>
                                
                              </div>
                            </div>                
                	</div>
                </div>
                </div>
            </div><!-- End container -->
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