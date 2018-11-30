<div id="page-wrapper">
    <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1><?php echo "Newsletter Setting"; ?></h1>
                </div>
                <div class="page-header border"></div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <?php 
			
				if($msg == 'update')
					{	?>
						
                        	<div class="alert alert-success" role="alert">
							<button class="close" data-dismiss="alert">x</button>
							<strong><?php echo SUCCESS; ?>!</strong> <?php echo RECORD_HAS_BEEN_SUCCESSFULLY_UPDATED;?>
                            </div>
			
			<?php } ?>
                
               <?php
								
								$attributes = array('name' => 'frm_listadmin', 'class' => 'site-setting');	
								echo form_open('admin/newsletter/update_setting/',$attributes);

				 ?>   
              <?php 
					$newsletter_setting_id = $news_setting[0]['newsletter_setting_id'];
					
					$newsletter_from_name = $news_setting[0]['newsletter_from_name'];
					$newsletter_from_address = $news_setting[0]['newsletter_from_address'];
					$newsletter_reply_name = $news_setting[0]['newsletter_reply_name'];
					$newsletter_reply_address = $news_setting[0]['newsletter_reply_address'];
					$mailer = $news_setting[0]['mailer'];
					$sendmail_path = $news_setting[0]['sendmail_path'];
					$smtp_port = $news_setting[0]['smtp_port'];
					$smtp_host = $news_setting[0]['smtp_host'];
					$smtp_email = $news_setting[0]['smtp_email'];
					$smtp_password = $news_setting[0]['smtp_password'];
												
 				?>
 				     
			  <div class="row">
            	<div class="col-lg-12 clearfix">
                	<div class="panel panel-default">
                    <div class="panel-heading">
                          			<?php echo 'Newsletter Setting'; ?>                      
                            </div>
                        <div class="panel-body">
                        	
                        	<div class="form-group clearfix">
                                	<div class="col-sm-3">
                                    	<label><?php echo "From Name"; ?></label>
                                    </div>
                                    <div class="col-sm-6">
                                    	<input type="text" name="newsletter_from_name" value="<?php echo SecureShowData($newsletter_from_name); ?>" class="form-control"/>
                                    </div>
                            </div>
                            <div class="form-group clearfix">
                                	<div class="col-sm-3">
                                    	<label><?php echo "From Email Address"; ?></label>
                                    </div>
                                    <div class="col-sm-6">
                                    	<input type="text" name="newsletter_from_address" value="<?php echo SecureShowData($newsletter_from_address); ?>" class="form-control"/> 
                                    	
                                    </div>
                            </div>
                            <div class="form-group clearfix">
                                	<div class="col-sm-3">
                                    	<label><?php echo "Reply Name"; ?></label>
                                    </div>
                                    <div class="col-sm-6">
                                    	<input type="text" name="newsletter_reply_name" value="<?php echo SecureShowData($newsletter_reply_name); ?>" class="form-control"/>
                                    </div>
                            </div>
                            <div class="form-group clearfix">
                                	<div class="col-sm-3">
                                    	<label><?php echo "Reply Email Address"; ?></label>
                                    </div>
                                    <div class="col-sm-6">
                                    	<input type="text" name="newsletter_reply_address" value="<?php echo SecureShowData($newsletter_reply_address); ?>" class="form-control"/> 
                                    </div>
                            </div>
                            
                            
                        	<div class="form-group clearfix">
                            	<div class="col-sm-3">
                                	<label><?php echo "Mailer"; ?></label>
                                </div>
                                <div class="col-sm-4">
                                	<select class="form-control" name="mailer">
                                		 <option value="mail" <?php if($mailer=='mail') { echo "selected"; } ?>>PHP Mail</option>
										 <option value="smtp" <?php if($mailer=='smtp') { echo "selected"; } ?>>SMTP</option>
										 <option value="sendmail" <?php if($mailer=='sendmail') { echo "selected"; } ?>>Sendmail</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group clearfix">
                                	<div class="col-sm-3">
                                    	<label><?php echo "Send Mail Path"; ?></label>
                                    </div>
                                    <div class="col-sm-6">
                                    	<input type="text" name="sendmail_path" value="<?php echo $sendmail_path;?>" class="form-control">
                                    </div>
                            </div>
                            <div class="form-group clearfix">
                                	<div class="col-sm-3">
                                    	<label><?php echo "SMTP Port"; ?></label>
                                    </div>
                                    <div class="col-sm-6">
                                    	 <input type="text" name="smtp_port" value="<?php echo $smtp_port;?>" class="form-control"/> 
                                    </div>
                            </div>
                             <div class="form-group clearfix">
                                	<div class="col-sm-3">
                                    	<label><?php echo "SMTP Host"; ?></label>
                                    </div>
                                    <div class="col-sm-6">
                                    	<input type="text" name="smtp_host" value="<?php echo $smtp_host;?>" class="form-control"/>
                                    </div>
                            </div>
                            
                             <div class="form-group clearfix">
                                	<div class="col-sm-3">
                                    	<label><?php echo "SMTP Email"; ?></label>
                                    </div>
                                    <div class="col-sm-6">
                                    	<input type="Email" name="smtp_email" value="<?php echo $smtp_email;?>" class="form-control"/>
                                    </div>
                            </div>
                            
                             <div class="form-group clearfix">
                                	<div class="col-sm-3">
                                    	<label><?php echo "SMTP Password"; ?></label>
                                    </div>
                                    <div class="col-sm-6">
                                    	<input type="password" name="smtp_password" value="<?php echo $smtp_password;?>" class="form-control">
                                    </div>
                            </div>
                                
                                
                        </div>
                   	
                 </div>
                 
                 
                 	
                </div><!-- col-lg-12  -->
           
            </div>
           		<div class="text-center">
                   <button type="submit" class="btn btn-default btn-lg"><?php echo SUBMIT;?></button>
                   <a href="<?php echo site_url('admin/newsletter/send_testing_newsetter');?>" class="btn btn-default btn-lg"><?php echo "Send Test Mail";?></a>
                   
            	</div>
            	
            </form>
</div>
</div>
        <!-- /#page-wrapper -->
</body>
<script>

function testmail()

{
	
	window.location.href = '<?php echo site_url('admin/newsletter/send_testing_newsetter');?>';

}
</script>

</html>
