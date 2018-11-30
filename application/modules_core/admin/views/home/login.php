<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src='https://www.google.com/recaptcha/api.js'></script>
</head>

<body>

	<div class="container-fluid">			
        <div class="row">
            <div class="col-md-4 col-md-offset-3">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"><?php echo ADMIN_LOGIN; ?></h3>
                    </div>
                    <div class="panel-body">
                    
                        <form role="form" method="post" action="<?php echo site_url('admin/home/check_login');?>">
                        
                        	<?php

								if($login == '0')
								{
									echo "<span style='color:red;'>".INVALID_USERNAME_OR_PASSWORD."</span>";
								}
                                if($login == 'inactive')
                                {
                                    echo "<span style='color:red;'>".INACTIVE_USER."</span>";
                                }
            
                                if($login == '1')
                                {
            
                                    echo "<span style='color:green;'>".YOU_HAVE_LOGGED_OUT_SUCCESSFULLY."</span>";
                                }
            
                                if($login == '2')
                                {
            
                                    echo "<span style='color:green;'>".INVALID_CAPTCHA."</span>";
                                }
							?>
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Username" name="username" type="text" autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="password" type="password" value="">
                                </div>
                                <?php $result = getRecordById('captcha_settings','id','1');?>
                                <?php if($result['status'] == 1) { ?>
                                <?php } else {?>
                                    <div class="form-group">
                                        <div class="g-recaptcha" data-sitekey="<?php echo SecureShowData($result['captcha_site_key']); ?>"></div> 
                                    </div>
                                <?php } ?>
                                <div class="checkbox">
                                    <label>
                                       <?php /*?> <input name="remember" type="checkbox" value="Remember Me"><?php echo REMEMBER_ME; ?><?php */?>
                                    </label>
                                </div>
                                <!-- Change this to a button or input when using this as a form -->
                                <input type="submit" value="<?php echo LOGIN; ?>"  class="btn btn-lg btn-success btn-block">
                                
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
