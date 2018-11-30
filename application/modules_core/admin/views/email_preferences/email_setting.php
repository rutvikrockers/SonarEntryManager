<div id="page-wrapper">
    <div class="container-fluid">
            <div class="row">
              <div class="col-lg-12">
                    <h1><?php echo EMAIL_SETTING; ?></h1>
                </div>
                <div class="page-header border"></div>
                <!-- /.col-lg-12 -->
            </div>
            <?php 
				if($msg == 'update')
					{	?>
						
                        	<div class="alert alert-success" role="alert">
							<button class="close" data-dismiss="alert">x</button>
							<strong><?php echo SUCCESS; ?>!</strong> <?php echo RECORD_HAS_BEEN_SUCCESSFULLY_UPDATED;?>
                            </div>
			
			<?php } ?>
            <?php 
				if($error!= '')
				{ ?>
					
                    		<div class="alert alert-danger" role="alert">
							<button class="close" data-dismiss="alert">x</button>
							<strong><?php echo ERRORS; ?>!</strong> <?php echo $error;?>
                            </div> 
				<?php } ?>   
                <?php
								
								$attributes = array('name' => 'frm_listadmin', 'class' => 'email-setting' );	
								echo form_open('admin/email_preferences/email_setting/',$attributes);

				 ?>   
                 
            <!-- /.row -->
            <div class="row">
            	<div class="col-lg-12 clearfix">
                	<div class="panel panel-default">
                        <div class="panel-heading">
                           <?php echo EMAIL_SETTING; ?>
                        </div>
                        <div class="panel-body">
                              <div class="form-group clearfix">
                                    <div class="col-sm-3">
                                        <label><?php echo MAILER; ?></label>
                                    </div>
                                    <div class="col-sm-4">
                                        <select class="form-control" name="mailer">
                                        <option
                                                value="mail" <?php if ($mailer == 'mail') { ?> selected="selected" <?php } ?> ><?php echo PHP_MAIL; ?></option>


                                            <option
                                                value="smtp" <?php if ($mailer == 'smtp') { ?> selected="selected" <?php } ?> ><?php echo SMTP; ?></option>


                                            <option
                                                value="sendmail" <?php if ($mailer == 'sendmail') { ?> selected="selected" <?php } ?> ><?php echo SENDMAIL; ?></option>
                                            
                                           
                                        </select>
                                    </div>
                                </div>
                                                            
                            	<div class="form-group clearfix">
                                	<div class="col-sm-3">
                                    	<label><?php echo SMTP_HOST; ?></label>
                                    </div>
                                    <div class="col-sm-9">
                                    	<input class="form-control" type="text" name="smtp_host" value="<?php echo $smtp_host; ?>" >
                                    </div>
                                </div>
                                
                                <div class="form-group clearfix">
                                	<div class="col-sm-3">
                                    	<label><?php echo SENDMAIL_PATH; ?></label>
                                    </div>
                                    <div class="col-sm-9">
                                    	<input class="form-control" type="text" name="sendmail_path" value="<?php echo $sendmail_path; ?>">
                                    </div>
                                </div>
                                
                                <div class="form-group clearfix">
                                	<div class="col-sm-3">
                                    	<label><?php echo SMTP_EMAIL; ?></label>
                                    </div>
                                    <div class="col-sm-9">
                                    	<input class="form-control" type="text" name="smtp_email" value="<?php echo $smtp_email; ?>">
                                    </div>
                                </div>
                                  <div class="form-group clearfix">
                                    <div class="col-sm-3">
                                        <label><?php echo SMTP_PASSWORD; ?></label>
                                    </div>
                                    <div class="col-sm-9">
                                        <input class="form-control" type="text" name="smtp_password" value="<?php echo $smtp_password; ?>">
                                    </div>
                                </div>
                                
                            
                        </div>
                   	
                 </div>
                 
                 
                 	<div class="text-center">
                 		<button type="submit" class="btn btn-default btn-lg">
                        <?php echo UPDATE_EMAIL_SETTING; ?></button>
                           <a href="<?php echo site_url();?>admin/home/dashboard" class="btn btn-default btn-lg"> <?php echo CANCEL; ?></a>
                    </div>
                </div><!-- col-lg-12  -->
           
            </div>
            <!-- /.row -->
</div>
</div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

   
</body>

</html>
