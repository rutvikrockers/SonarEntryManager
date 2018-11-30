<div id="page-wrapper">
    <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1><?php echo EDIT_PAYPAL_SETTING; ?></h1>
                </div>
                <div class="page-header border"></div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <?php 
                if($msg == 'update')
                    {   ?>
                        
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
                            echo form_open('admin/site_setting/edit_paypal_setting/',$attributes);

                 ?>   
                 <input type="hidden" name="id"  value="<?php echo $id;?>"/>
            <div class="row">
                <div class="col-lg-12 clearfix">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           <?php echo PAYPAL_SETTING; ?>
                        </div>
                        <div class="panel-body">
                                <div class="form-group clearfix">
                                    <div class="col-sm-3">
                                        <label><?php echo SITE_STATUS; ?></label>
                                    </div>
                                    <div class="col-sm-4">
                                        <select class="form-control" name="site_status">
                                                <option value="Sandbox" <?php if($site_status == 'Sandbox') { echo "selected";}?>><?php echo SANDBOX; ?></option>
                                                <option value="Live" <?php if($site_status == 'Live') { echo "selected";}?>><?php echo LIVE; ?></option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group clearfix">
                                    <div class="col-sm-3">
                                        <label><?php echo PAYPAL_EMAIL; ?></label>
                                    </div>
                                    <div class="col-sm-9">
                                        <input class="form-control" type="text" name="paypal_email" value="<?php echo SecureShowData($paypal_email); ?>">
                                    </div>
                                </div>
                                <div class="form-group clearfix">
                                    <div class="col-sm-3">
                                        <label><?php echo PAYPAL_APPLICATION_ID; ?></label>
                                    </div>
                                    <div class="col-sm-9">
                                        <input class="form-control" type="text" name="application_id" value="<?php echo $application_id; ?>">
                                    </div>
                                </div>
                                <div class="form-group clearfix">
                                    <div class="col-sm-3">
                                        <label><?php echo PAYPAL_API_USERNAME; ?></label>
                                    </div>
                                    <div class="col-sm-9">
                                        <input class="form-control" type="text" name="paypal_username" value="<?php echo SecureShowData($paypal_username); ?>">
                                    </div>
                                </div>
                                <div class="form-group clearfix">
                                    <div class="col-sm-3">
                                        <label><?php echo PAYPAL_API_PASSWORD; ?></label>
                                    </div>
                                    <div class="col-sm-9">
                                        <input class="form-control" type="password" name="paypal_password" value="<?php echo $paypal_password; ?>">
                                    </div>
                                </div>
                                
                                <div class="form-group clearfix">
                                    <div class="col-sm-3">
                                        <label><?php echo PAYPAL_API_SIGNATURE; ?></label>
                                    </div>
                                    <div class="col-sm-9">
                                        <input class="form-control" type="text" name="paypal_signature" value="<?php echo $paypal_signature; ?>">
                                    </div>
                                </div>
                                
                                <div class="form-group clearfix">
                                    <div class="col-sm-3">
                                        <label><?php echo "Gateway fee payeer"; ?></label>
                                    </div>
                                    <div class="col-sm-4">
                                        <select class="form-control" name="gateway_fees_payer">
                                                <option value="admin" <?php if($gateway_fees_payer == "admin") { echo "selected";}?>><?php echo "Admin"; ?></option>
                                                <option value="owner" <?php if($gateway_fees_payer == "owner") { echo "selected";}?>><?php echo "Event Owner"; ?></option>
                                         </select>
                                    </div>
                                </div>
                                
                                <div class="form-group clearfix">
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
                 
                 
                    <div class="text-center">
                        <?php if(DEMO_MODE=="0") { ?>
                            <button type="submit" class="btn btn-default btn-lg"><?php echo UPDATE_PAYPAL_SETTING; ?></button>
                             <a href="<?php echo site_url();?>admin/home/dashboard" class="btn btn-default btn-lg"> <?php echo CANCEL; ?></a>
                        <?php } ?>
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
