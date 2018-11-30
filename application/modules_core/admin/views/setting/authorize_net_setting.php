<div id="page-wrapper">
    <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1><?php echo "Authorize net setting"; ?></h1>
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
							echo form_open('admin/site_setting/edit_authorize_net_setting/',$attributes);

				 ?>   
                 <input type="hidden" name="id"  value="<?php echo $id;?>"/>
            <div class="row">
            	<div class="col-lg-12 clearfix">
                	<div class="panel panel-default">
                        <div class="panel-heading">
                           <?php echo "Authorize net setting"; ?>
                        </div>
                        <div class="panel-body">
                                <div class="form-group clearfix">
                                    <div class="col-sm-3">
                                        <label><?php echo SITE_STATUS; ?></label>
                                    </div>
                                    <div class="col-sm-4">
                                        <select class="form-control" name="status">
                                                <option value="SANDBOX" <?php if($status == 'SANDBOX') { echo "selected";}?>><?php echo "SANDBOX"; ?></option>
                                                <option value="PRODUCTION" <?php if($status == 'PRODUCTION') { echo "selected";}?>><?php echo 'PRODUCTION'; ?></option>
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
                                    	<label><?php echo "merchant login id"; ?></label>
                                    </div>
                                    <div class="col-sm-9">
                                    	<input class="form-control" type="text" name="merchant_login_id" value="<?php echo $merchant_login_id; ?>">
                                    </div>
                                </div>

                                <div class="form-group clearfix">
                                    <div class="col-sm-3">
                                        <label><?php echo "merchant transaction key"; ?></label>
                                    </div>
                                    <div class="col-sm-9">
                                        <input class="form-control" type="text" name="merchant_transaction_key" value="<?php echo $merchant_transaction_key; ?>">
                                    </div>
                                </div>

                        </div>
                   	
                 </div>
                 
                 <?php if(DEMO_MODE=="0"){ ?>
                 	<div class="text-center">
                 		<button type="submit" class="btn btn-default btn-lg"><?php echo  "Update authorize net setting"; ?></button>
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
