<div id="page-wrapper">
    <div class="container-fluid">
            <div class="row">
              <div class="col-lg-12">
                    <h1><?php echo EDIT_GOOGLE_PLUS_SETTING; ?></h1>
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
								echo form_open('admin/social_setting/edit_google_setting/',$attributes);

				 ?>   
                 <input type="hidden" name="google_setting_id"  value="<?php echo $google_setting_id;?>"/>
            <!-- /.row -->
            <div class="row">
            	<div class="col-lg-12 clearfix">
                	<div class="panel panel-default">
                        <div class="panel-heading">
                           <?php echo GOOGLE_PLUS_SETTING; ?>
                        </div>
                        <div class="panel-body">
                           
                            	<div class="form-group clearfix">
                                	<div class="col-sm-3">
                                    	<label><?php echo GOOGLE_LOGIN_ENABLE; ?></label>
                                    </div>
                                    <div class="col-sm-4">
                                    	<select class="form-control" name="google_enable">
                                                <option value="1" <?php if($google_enable == 1) { echo "selected"; }?>><?php echo ACTIVE;?></option>
                                                <option value="0" <?php if($google_enable == 0) { echo "selected"; }?>><?php echo INACTIVE;?></option>
                                         </select>
                                    </div>
                                </div>
                                
                            	<div class="form-group clearfix">
                                	<div class="col-sm-3">
                                    	<label><?php echo GOOGLE_COUNSUMER_KEY; ?></label>
                                    </div>
                                    <div class="col-sm-9">
                                    	<input class="form-control" type="text" name="consumer_key" value="<?php echo $consumer_key;?>">
                                    </div>
                                </div>
                                
                                
                                
                                <div class="form-group clearfix">
                                	<div class="col-sm-3">
                                    	<label><?php echo GOOGLE_COUNSUMER_SECRET; ?></label>
                                    </div>
                                    <div class="col-sm-9">
                                    	<input class="form-control" type="text" name="consumer_secret" value="<?php echo $consumer_secret;?>">
                                    </div>
                                </div>
                                
                            
                        </div>
                   	
                 </div>
                 
                 
                 	<div class="text-center">
                 		<button type="submit" class="btn btn-default btn-lg"><?php echo UPDATE_GOOGLE_SETTING; ?></button>
                         <a href="<?php echo site_url();?>admin/home/dashboard" class="btn btn-default btn-lg"> <?php echo CANCEL; ?></a>
                    </div>
                </div><!-- col-lg-12  -->
           
            </div>
            <!-- /.row -->
</div>
</div>
        <!-- /#page-wrapper -->

    <!-- /#wrapper -->

   
</body>

</html>
