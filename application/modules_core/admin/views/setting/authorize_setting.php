<div id="page-wrapper">
    <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1><?php echo EDIT_AUTHORIZE_SETTING; ?></h1>
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
				if($error!= '')
				{ ?>
					
                    		<div class="alert alert-danger" role="alert">
							<button class="close" data-dismiss="alert">x</button>
							<strong><?php echo ERRORS; ?>!</strong> <?php echo $error;?>
                            </div> 
				<?php } ?>   
                <?php
								
							$attributes = array('name' => 'frm_listadmin', 'class' => 'site-setting' );	
							echo form_open('admin/site_setting/edit_authorize_setting/',$attributes);

				 ?>   
                 <input type="hidden" name="id"  value="<?php echo $id;?>"/>
                 
            <div class="row">
            	<div class="col-lg-12 clearfix">
                	<div class="panel panel-default">
                        <div class="panel-heading">
                           <?php echo AUTHORIZE_SETTING; ?>
                        </div>
                        <div class="panel-body">
                           
                            	<div class="form-group clearfix">
                                	<div class="col-sm-3">
                                    	<label><?php echo SITE_STATUS; ?></label>
                                    </div>
                                    <div class="col-sm-4">
                                    	<select class="form-control" name="x_site_status">
                                                <option value="Sandbox" <?php if($x_site_status == 'Sandbox') { echo "selected";}?>><?php echo SANDBOX; ?></option>
                                                <option value="Live" <?php if($x_site_status == 'Live') { echo "selected";}?>><?php echo LIVE; ?></option>
                                        </select>
                                    </div>
                                </div>
                                
                            	<div class="form-group clearfix">
                                	<div class="col-sm-3">
                                    	<label><?php echo X_DESCRIPTION; ?></label>
                                    </div>
                                    <div class="col-sm-9">
                                    	<input class="form-control" type="text" name="x_desc" value="<?php echo SecureShowData($x_desc);?>">
                                    </div>
                                </div>
                                
                                <div class="form-group clearfix">
                                	<div class="col-sm-3">
                                    	<label><?php echo X_METHOD; ?></label>
                                    </div>
                                    <div class="col-sm-9">
                                    	<input class="form-control" type="text" name="x_method" value="<?php echo SecureShowData($x_method);?>">
                                    </div>
                                </div>
                                
                                <div class="form-group clearfix">
                                	<div class="col-sm-3">
                                    	<label><?php echo X_TYPE; ?></label>
                                    </div>
                                    <div class="col-sm-9">
                                    	<input class="form-control" type="text" name="x_type" value="<?php echo SecureShowData($x_type);?>">
                                    </div>
                                </div>
                                
                                <div class="form-group clearfix">
                                	<div class="col-sm-3">
                                    	<label><?php echo MERCHANT_UNIQUE_TRANSACTION_KEY; ?></label>
                                    </div>
                                    <div class="col-sm-9">
                                    	<input class="form-control" type="text" name="x_trans_key" value="<?php echo SecureShowData($x_trans_key);?>">
                                    </div>
                                </div>
                                
                                <div class="form-group clearfix">
                                	<div class="col-sm-3">
                                    	<label><?php echo MERCHANT_UNIQUE_API_LOGIN_ID; ?></label>
                                    </div>
                                    <div class="col-sm-9">
                                    	<input class="form-control" type="text" name="x_login" value="<?php echo SecureShowData($x_login);?>">
                                    </div>
                                </div>
                                
                        </div>
                   	
                 </div>
                 <div class="text-center">
                 		<button type="submit" class="btn btn-default btn-lg"><?php echo UPDATE_AUTHORIZE_SETTING; ?></button>
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
