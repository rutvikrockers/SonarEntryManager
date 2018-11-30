<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/validation.css"/>
<div id="page-wrapper">
    <div class="container-fluid">
<div class="row">
                <div class="col-lg-12">
                    <h1><?php echo CHANGE_EMAIL_ADDRESS; ?></h1>
                </div>
                <div class="page-header border"></div>
                <!-- /.col-lg-12 -->
            </div>
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
								echo form_open('admin/email_template/change_address/',$attributes);
			?>  
			<div class="row">
				<div class="col-lg-12 clearfix">
					<div class="panel panel-default">
						<div class="panel-body">
							<div class="form-group clearfix">
                                	<div class="col-sm-3">
                                    	<label><?php echo FORM_ADDRESS; ?><em style="color: red">*</em></label>
                                    </div>
                                    <div class="col-sm-9">
                                    	<input class="form-control" type="text" name="from_address">
                                    </div>
                            </div>

                            <div class="form-group clearfix">
                                	<div class="col-sm-3">
                                    	<label><?php echo REPLY_ADDRESS; ?><em style="color: red">*</em></label>
                                    </div>
                                    <div class="col-sm-9">
                                    	<input class="form-control" type="text" name="reply_address">
                                    </div>
                            </div>

						</div>
					</div>
				</div>
			</div>
			<div class="text-center">
                   <button type="submit" class="btn btn-default btn-lg"><?php echo SAVE;?></button>
            	</div>
            </form>
</div>
</div>