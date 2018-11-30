<div id="page-wrapper">
    <div class="container-fluid">
            <div class="row">
              <div class="col-lg-12">
                    <h1><?php echo EDIT_CAPTCHA_SETTING; ?></h1>
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
								
								$attributes = array('name' => 'frm_listadmin', 'class' => 'site-setting' );	
								echo form_open('admin/social_setting/edit_captcha_setting/',$attributes);

				 ?>   
                 <input type="hidden" name="id"  value="<?php echo $id;?>"/>
            <!-- /.row -->
            <div class="row">
            	<div class="col-lg-12 clearfix">
                	<div class="panel panel-default">
                        <div class="panel-heading">
                           <?php echo CAPTCHA_SETTING; ?>
                        </div>
                        <div class="panel-body">
                           
                                                            
                            	<div class="form-group clearfix">
                                	<div class="col-sm-3">
                                    	<label><?php echo CAPTCHA_SITE_KEY; ?></label>
                                    </div>
                                    <div class="col-sm-9">
                                    	<input class="form-control" type="text" name="captcha_site_key" value="<?php echo SecureShowData($captcha_site_key) ?>">
                                    </div>
                                </div>
                                
                                <div class="form-group clearfix">
                                	<div class="col-sm-3">
                                    	<label><?php echo CAPTCHA_SECRET_KEY; ?></label>
                                    </div>
                                    <div class="col-sm-9">
                                    	<input class="form-control" type="text" name="captcha_secret_key" value="<?php echo SecureShowData($captcha_secret_key) ?>">
                                    </div>
                                </div>
                                
                                <div class="form-group clearfix">
                                	<div class="col-sm-3">
                                    	<label><?php echo CAPTCHA_URL; ?></label>
                                    </div>
                                    <div class="col-sm-9">
                                    	<input class="form-control" type="text" name="captcha_url" value="<?php echo $captcha_url ?>">
                                    </div>
                                </div>

                                <div class="form-group clearfix">
                                    <div class="col-sm-3">
                                        <label><?php echo VERIFY_ACCOUNT_ON_SIGN_UP; ?></label>
                                    </div>
                                    <div class="col-sm-4">
                                        <select class="form-control" name="status">
                                                <option value="0" <?php if($status == 0) { echo "selected"; } ?> ><?php echo ENABLE; ?></option>
                                                <option value="1" <?php if($status == 1) { echo "selected"; } ?>><?php echo DISABLE; ?></option>
                                            </select>
                                    </div>
                                </div>
                                
                            
                        </div>
                   	
                 </div>
                 
                 <?php if(DEMO_MODE=="0"){ ?>
                 	<div class="text-center">
                 		<button type="submit" class="btn btn-default btn-lg"><?php echo UPDATE_CAPTCHA_SETTING; ?></button>
                         <a href="<?php echo site_url();?>admin/home/dashboard" class="btn btn-default btn-lg"> <?php echo CANCEL; ?></a>
                    </div>
                 <?php } ?>
                </div><!-- col-lg-12  -->
           
            </div>
            <!-- /.row -->
</div>
</div>
        <!-- /#page-wrapper -->

    <!-- /#wrapper -->

   
</body>

</html>
