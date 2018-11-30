<div id="page-wrapper">
    <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1><?php echo EDIT_STRIPE_SETTING; ?></h1>
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
							echo form_open('admin/site_setting/edit_stripe_setting/',$attributes);

				 ?>   
                 <input type="hidden" name="id"  value="<?php echo $id;?>"/>
            <div class="row">
            	<div class="col-lg-12 clearfix">
                	<div class="panel panel-default">
                        <div class="panel-heading">
                           <?php echo STRIPE_SETTING; ?>
                        </div>
                        <div class="panel-body">
                            	<div class="form-group clearfix">
                                	<div class="col-sm-3">
                                    	<label><?php echo SITE_STATUS; ?></label>
                                    </div>
                                    <div class="col-sm-4">
                                    	<select class="form-control" name="stripe_test_mode">
                                                <option value="1" <?php if($stripe_test_mode == '1') { echo "selected";}?>><?php echo TEST; ?></option>
                                                <option value="0" <?php if($stripe_test_mode == '0') { echo "selected";}?>><?php echo LIVE; ?></option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group clearfix">
                                    <div class="col-sm-3">
                                        <label><?php echo ACTIVE; ?></label>
                                    </div>
                                    <div class="col-sm-4">
                                        <select class="form-control" name="active">
                                                <option value="1" <?php if($active == 1) { echo "selected";}?>><?php echo "Active"; ?></option>
                                                <option value="0" <?php if($active == 0) { echo "selected";}?>><?php echo 'Inactive'; ?></option>
                                        </select>
                                    </div>
                                </div>
                                
                            	<div class="form-group clearfix">
                                	<div class="col-sm-3">
                                    	<label><?php echo STRIPE_KEY_TEST_PUBLIC; ?></label>
                                    </div>
                                    <div class="col-sm-9">
                                    	<input class="form-control" type="text" name="stripe_key_test_public" value="<?php echo $stripe_key_test_public; ?>">
                                    </div>
                                </div>

                                <div class="form-group clearfix">
                                    <div class="col-sm-3">
                                        <label><?php echo STRIPE_KEY_TEST_SECRET; ?></label>
                                    </div>
                                    <div class="col-sm-9">
                                        <input class="form-control" type="text" name="stripe_key_test_secret" value="<?php echo $stripe_key_test_secret; ?>">
                                    </div>
                                </div>

                                <div class="form-group clearfix">
                                    <div class="col-sm-3">
                                        <label><?php echo STRIPE_KEY_LIVE_PUBLIC; ?></label>
                                    </div>
                                    <div class="col-sm-9">
                                        <input class="form-control" type="text" name="stripe_key_live_public" value="<?php echo $stripe_key_live_public; ?>">
                                    </div>
                                </div>

                                <div class="form-group clearfix">
                                    <div class="col-sm-3">
                                        <label><?php echo STRIPE_KEY_LIVE_SECRET; ?></label>
                                    </div>
                                    <div class="col-sm-9">
                                        <input class="form-control" type="text" name="stripe_key_live_secret" value="<?php echo $stripe_key_live_secret; ?>">
                                    </div>
                                </div>

                                <div class="form-group clearfix hide">
                                    <div class="col-sm-3">
                                        <label><?php echo BANK_ACC_COUNTRY; ?></label>
                                    </div>
                                    <div class="col-sm-4">
                                        <select class="form-control" name="bank_account_country">
                                                <option value="US" >US</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group clearfix hide">
                                    <div class="col-sm-3">
                                        <label><?php echo ROUTING_NUMBER; ?></label>
                                    </div>
                                    <div class="col-sm-9">
                                        <input class="form-control" type="text" name="routing_number" value="<?php echo $routing_number; ?>">
                                    </div>
                                </div>

                                <div class="form-group clearfix hide">
                                    <div class="col-sm-3">
                                        <label><?php echo "Sort Code"; ?></label>
                                    </div>
                                    <div class="col-sm-9">
                                        <input class="form-control" maxlength="4" type="text" name="sort_code" value="<?php echo $sort_code; ?>">
                                    </div>
                                </div>

                                <div class="form-group clearfix hide">
                                    <div class="col-sm-3">
                                        <label><?php echo ACC_NUMBER; ?></label>
                                    </div>
                                    <div class="col-sm-9">
                                        <input class="form-control" type="text" name="account_number" value="<?php echo $account_number; ?>">
                                    </div>
                                </div>

                                <div class="form-group clearfix">
                                    <div class="col-sm-3">
                                        <label><?php echo "Stripe client id development"; ?></label>
                                    </div>
                                    <div class="col-sm-9">
                                        <input class="form-control" type="text" name="stripe_client_id_development" value="<?php echo $stripe_client_id_development; ?>">
                                    </div>
                                </div>

                                <div class="form-group clearfix">
                                    <div class="col-sm-3">
                                        <label><?php echo "Stripe client id production"; ?></label>
                                    </div>
                                    <div class="col-sm-9">
                                        <input class="form-control" type="text" name="stripe_client_id_production" value="<?php echo $stripe_client_id_production; ?>">
                                    </div>
                                </div>
                                
                                <div class="form-group clearfix" style="display: none;">
                                	<div class="col-sm-3">
                                    	<label><?php echo GATEWAY_STATUS; ?></label>
                                    </div>
                                    <div class="col-sm-4">
                                    	<select class="form-control" name="gateway_status">
                                                <option value="1" <?php if($gateway_status == 1) { echo "selected";}?>><?php echo ACTIVE; ?></option>
                                                <option value="0" <?php if($gateway_status == 0) { echo "selected";}?>><?php echo INACTIVE; ?></option>
                                         </select>
                                    </div>
                                </div>
                        </div>
                   	
                 </div>
                 
                 <?php if(DEMO_MODE=="0"){ ?>
                 	<div class="text-center">
                 		<button type="submit" class="btn btn-default btn-lg"><?php echo UPDATE_STRIPE_SETTING; ?></button>
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
