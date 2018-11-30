<style type="text/css">
    .welcome_email{
        font-size: 17px;
        text-align: center;
    }
    .welcome_email_msg{
        font-size: 14px;
        text-align: center;
    }
    .welcome_center{
        text-align: center;
    }
</style>    
    <section>  
            <div class="container marTB50">
            	<div class="row">
                    <div class="col-lg-4 col-lg-offset-4 col-sm-6 col-sm-offset-3">
                    	<div class="loginBox">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title welcome_center">
                                        <i class="glyphicon glyphicon-envelope"></i>
                                        <br>
                                        <?php echo WELCOME_BACK;?>
                                    </h3>                                    
                                </div>
                                <div class="panel-body ">                                	                            	                           

                            	<form class="event-title" name="forget_form" id="forget_form" method="post" action="<?php echo site_url('user/forget_password');?>">                                
                                    <div class="form-group">
                                     	 <p class="welcome_email"><?php echo $email;?></p>                                         
                            		</div>
                                    <hr>
                                    <div class="form-group">
                                        <p class="welcome_email_msg"><?php echo WELCOME_BACK_MSG; ?></p>
                                    </div>
                                </form>

                                <div class="backLink"><a href="<?php echo site_url('user/login');?>">Return to Log in</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>                                    	               
            </div><!-- End container -->
    </section>
