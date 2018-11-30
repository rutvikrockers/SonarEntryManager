<div id="page-wrapper">
    <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1><?php echo NEW_CURRENCY_CODE; ?></h1>
                </div>
                <div class="page-header border"></div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <?php 
				if($error!= '')
				{ ?>
					
                    		<div class="alert alert-danger" role="alert">
							<button class="close" data-dismiss="alert">x</button>
							<strong><?php echo ERRORS; ?>!</strong> <?php echo $error;?>
                            </div> 
				<?php } ?>   
                <?php
								
								$attributes = array('name' => 'frm_listadmin', 'class' => 'site-setting');	
								echo form_open('admin/currency/add_currency/',$attributes);

				 ?>   
			  <div class="row">
            	<div class="col-lg-12 clearfix">
                	<div class="panel panel-default">
                        <div class="panel-body">
                            	<div class="form-group clearfix">
                                	<div class="col-sm-3">
                                    	<label><?php echo CURRENCY_NAME; ?></label>
                                    </div>
                                    <div class="col-sm-9">
                                    	<input class="form-control" type="text" name="currency_name">
                                    </div>
                                </div>
                                
                                <div class="form-group clearfix">
                                	<div class="col-sm-3">
                                    	<label><?php echo CURRENCY_CODE; ?></label>
                                    </div>
                                    <div class="col-sm-9">
                                    	<input class="form-control" type="text" name="currency_code">
                                    </div>
                                </div>
                                
                                <div class="form-group clearfix">
                                	<div class="col-sm-3">
                                    	<label><?php echo CURRENCY_SYMBOL; ?></label>
                                    </div>
                                    <div class="col-sm-9">
                                    	<input class="form-control" type="text" name="currency_symbol">
                                    </div>
                                </div>
                                
                                <div class="form-group clearfix payment_gateway_fee_div">
                                    <div class="col-sm-3">
                                        <label><?php echo "Payment Gateway Fee(%)"; ?></label>
                                    </div>
                                    <div class="col-sm-9">
                                        <input class="form-control" type="text" name="payment_gateway_fee">
                                    </div>  
                                </div>
                                    
                                <div class="form-group clearfix">
                                    <div class="col-sm-3">
                                        <label><?php echo "Payment Gateway Flat Fee"; ?></label>
                                    </div>
                                    <div class="col-sm-9">
                                        <input class="form-control" type="text" name="payment_gateway_flat_fee">
                                    </div>  
                                </div>
                        </div>
                 </div>
                </div><!-- col-lg-12  -->
           
            </div>
            
            
            <?php if(DEMO_MODE=="0"){ ?>
           		<div class="text-center">
                   <button type="submit" class="btn btn-default btn-lg"><?php echo CREATE_CURRENCY_CODE; ?></button>
                   <a href="<?php echo site_url();?>admin/currency/list_currency" class="btn btn-default btn-lg"> <?php echo CANCEL; ?></a>
            	</div>
            <?php } ?>
            </form>
</div>
</div>
        <!-- /#page-wrapper -->
</body>

</html>
