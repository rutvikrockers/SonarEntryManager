<style type="text/css">
    .red{
        color: red;
    }
</style>
<div id="page-wrapper">
<div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1><?php echo NEW_USER; ?></h1>
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
					$attributes = array('name' => 'frm_listadmin' , 'class' => 'site-setting');
					echo form_open('admin/admin_user/add_newuser' ,$attributes);
			?>
            <div class="row">
            	<div class="col-lg-12 clearfix">
                	<div class="panel panel-default">
                        <div class="panel-heading">
                          	<?php echo BASIC_INFORMATION; ?>
                        </div>
                        
                        <div class="panel-body">
                            
                                
                            	<div class="form-group clearfix">
                                	<div class="col-sm-3">
                                    	<label><?php echo PREFIX; ?></label>
                                    </div>
                                    <div class="col-sm-9">
                                    	<input class="form-control" type="text" name="prefix">
                                    </div>
                                </div>
                                
                                <div class="form-group clearfix">
                                	<div class="col-sm-3">
                                    	<label><?php echo FIRST_NAME; ?><span class="red">*</span></label>
                                    </div>
                                    <div class="col-sm-9">
                                    	<input class="form-control" type="text" name="first_name">
                                    </div>
                                </div>
                                
                                <div class="form-group clearfix">
                                	<div class="col-sm-3">
                                    	<label><?php echo LAST_NAME; ?><span class="red">*</span></label>
                                    </div>
                                    <div class="col-sm-9">
                                    	<input class="form-control" type="text" name="last_name">
                                    </div>
                                </div>
                                
                                <div class="form-group clearfix">
                                	<div class="col-sm-3">
                                    	<label><?php echo SUFFIX; ?></label>
                                    </div>
                                    <div class="col-sm-9">
                                    	<input class="form-control" type="text" name="suffix">
                                    </div>
                                </div>
                           
                        </div>
                   	
                 </div>
                </div>
           
            </div>
           
            <div class="row">
            	<div class="col-lg-12 clearfix">
                	<div class="panel panel-default">
                        <div class="panel-heading">
                           <?php echo OTHER_INFORMATION; ?>
                        </div>
                        <div class="panel-body">
                                
                            	<div class="form-group clearfix">
                                	<div class="col-sm-3">
                                    	<label><?php echo EMAIL;?><span class="red">*</span></label>
                                    </div>
                                    <div class="col-sm-9">
                                    	<input class="form-control" type="text" name="email">
                                    </div>
                                </div>
                                
                                
                            	<div class="form-group clearfix">
                                	<div class="col-sm-3">
                                    	<label><?php echo PASSWORD;?><span class="red">*</span></label>
                                    </div>
                                    <div class="col-sm-9">
                                    	<input class="form-control" type="password" name="password">
                                    </div>
                                </div>
                                
                                <div class="form-group clearfix">
                                	<div class="col-sm-3">
                                    	<label><?php echo HOME_PHONE;?><span class="red">*</span></label>
                                    </div>
                                    <div class="col-sm-9">
                                    	<input class="form-control" type="text" name="home_phone">
                                    </div>
                                </div>
                                
                                <div class="form-group clearfix">
                                	<div class="col-sm-3">
                                    	<label><?php echo CELL_PHONE;?><span class="red">*</span></label>
                                    </div>
                                    <div class="col-sm-9">
                                    	<input class="form-control" type="text" name="cell_phone">
                                    </div>
                                </div>
                           
                        </div>
                   	
                 </div>
                </div><!-- col-lg-12  -->
           
            </div>
            <!-- /row -->
            <?php if(DEMO_MODE=="0"){ ?>
            	<div class="text-center">
                       <button type="submit" class="btn btn-default btn-lg"><?php echo ADD_USER;?></button>
                </div>
            <?php } ?>
             </form>
</div>
</div>
        <!-- /#page-wrapper -->


</body>

</html>
