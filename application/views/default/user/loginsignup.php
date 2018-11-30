<?php $facebook_setting=getAllData('facebook_settings');
$twitter_settings=getAllData('twitter_settings');
$google_setting=getAllData('google_setting');
$linkdin_setting=getAllData('linkdin_setting');
$site_setting = site_setting();
?>
<link rel="stylesheet" type="text/css" href="//maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/validation.css"/>
	<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.validate.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>js/additional-methods.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.maskedinput.js"></script>
  <script src='https://www.google.com/recaptcha/api.js'></script>
    <style type="text/css">
    .g-recaptcha {
      margin-top: 10px;
    }
    </style>
  <script type="text/javascript">
  function change_remember(){
    if (document.getElementById('remember').checked) {
            document.getElementById('remember').value = '1';
        } else {
            document.getElementById('remember').value = '0';
        }
  }
  </script>  
    <script>

    $( document ).ready(function() {
    	$( "#login_form" ).submit(function(event){ 
    		var email = $('#email').val();
    		var password = $('#password').val();

         if(!email&& !password){

          $('#email').closest('.form-group').addClass('has-error');
          $('#email').closest('label').addClass('control-label');
          $('#email').addClass('form-control');
          $('#password').closest('.form-group').addClass('has-error');
          $('#password').closest('label').addClass('control-label');
          $('#password').addClass('form-control');
          $('#client_err').css("display", "block");
          $('#client_err').html('<?php echo EMAIL_PASSWORD_REQUIRED; ?>');
          return false;

        }    
    		if(!email){
 			
 				$('#email').closest('.form-group').addClass('has-error');
 				$('#email').closest('label').addClass('control-label');
 				$('#email').addClass('form-control');
         $('#client_err').css("display", "block");
        $('#client_err').html('<?php echo EMAIL_REQUIRED; ?>');
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
         $('#client_err').css("display", "block");
        $('#client_err').html('<?php echo PASSWORD_REQUIRED; ?>');
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
    
    		if(!email){
 			
 				$('#remail').closest('.form-group').addClass('has-error');
 				$('#remail').closest('label').addClass('control-label');
 				$('#remail').addClass('form-control');
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
    
   <?php if($success_msg){
             ?>
             <div class="alert alert-success message"><?php echo $success_msg; ?></div>
         <?php }?>
         <?php if($error_msg){
             ?>
             <div class="alert alert-danger message"><?php echo $error_msg; ?></div>
         <?php }
        ?>
   <section>  
            <div class="container marTB50">
            	<div class="row">
                    <div class="col-lg-4 col-lg-offset-4 col-sm-6 col-sm-offset-3">
                    	<div class="loginBox">                        
                        	<div class="panel panel-default">
                              <div class="panel-heading">
                                <h3 class="panel-title"><?php echo LOGIN;?></h3>
                                <p>New to <?php echo SecureShowData($site_setting['site_name']); ?>? <strong><a href="<?php echo site_url('user/signup/'.$redirect_url); ?>"><?php echo SIGNUP; ?>!</a></strong></p>
                              </div>
                               
                              <div class="panel-body">
                                <?php if($error_login!=''){
                                        ?>
                                        <div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button> <?php echo $error_login; ?></div>
                                    <?php 	
                                    }?>
                                    <div class="alert alert-danger" id="client_err" style="display:none"></div>                                   
                                    
                                    <form class="event-title" id="login_form" name="login_form" method="post" action="<?php echo site_url('user/login');?>">
                                    
                                     <div class="form-group">
                               <?php $temp=$this->input->cookie('eventbrite_clone'); if(!empty($temp)){$arr=explode("^",$temp);$email=$arr[0];}?>
                                        <input type="text" placeholder="Email" name="email" id="email" value="<?php echo SecureShowData($email);?>" class="form-control">
                                        <input type="hidden" name="redirect_url" id="redirect_url" value="<?php echo $redirect_url; ?>"  />
                                    
                                    </div>
                                    
                                    <div class="form-group">
                                     
                                        <input type="password" placeholder="Password" name="password" id="password" value="<?php echo $password;?>" class="form-control">                                        
                                    
                                    </div>
                                    <div class="checkbox">
                                              <label>
                                                <input type="checkbox" id="remember" name="remember" value="<?php echo $remember;?>" <?php if($remember=='1'){ echo 'checked="checked"'; } ?> onClick="change_remember();"><?php echo REMEMBER_ME;?>
                                              </label>
                                        </div>
                                        
                                        <div class="acc text-right">
                                        	<a href="<?php echo site_url('user/forget_password');?>"><?php echo CANT_ACCESS_ACCOUNT;?></a>
                                        </div>
                                    
                                    <div class="form-group">
                                    <?php $result = getRecordById('captcha_settings','id','1');?>
                                      <?php if($result['status'] == 1) { ?>
                                      <?php } else {?>
                                        <div class="g-recaptcha" data-sitekey="<?php echo $result['captcha_site_key']; ?>"></div> 
                                      <?php } ?>
                                    </div>
                                    
                                    <div class="text-right">
                                        <input type="submit" name="submit" value="<?php echo LOGIN;?>" class="btn-event2 marT15">
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