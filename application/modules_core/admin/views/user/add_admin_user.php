        <div id="page-wrapper">
            <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1><?php echo ADD_ADMIN_USER; ?></h1>
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
                
			  <div class="row">
            	<div class="col-lg-12 clearfix">
                	<div class="panel panel-default">
                        <div class="panel-heading">
                           <?php echo ADMIN_DETAILS; ?>
                        </div>
                        <div class="panel-body">
                            
                            <?php
								
								$attributes = array('name' => 'frm_listadmin', 'class' => 'site-setting');	
								echo form_open('admin/admin_user/add_admin_user',$attributes);

				 			 ?>     
                                
                            	<div class="form-group clearfix">
                                	<div class="col-sm-3">
                                    	<label><?php echo EMAIL; ?></label>
                                    </div>
                                    <div class="col-sm-9">
                                    	<input class="form-control" type="text" name="email">
                                    </div>
                                </div>
                                
                                <div class="form-group clearfix">
                                	<div class="col-sm-3">
                                    	<label><?php echo USERNAME; ?></label>
                                    </div>
                                    <div class="col-sm-9">
                                    	<input class="form-control" type="text" name="username">
                                    </div>
                                </div>
                                
                                <div class="form-group clearfix">
                                	<div class="col-sm-3">
                                    	<label><?php echo PASSWORD; ?></label>
                                    </div>
                                    <div class="col-sm-9">
                                    	<input class="form-control" type="password" name="password">
                                    </div>
                                </div>
                                
                                <div class="form-group clearfix">
                                	<div class="col-sm-3">
                                    	<label><?php echo ADMIN_TYPE; ?></label>
                                    </div>
                                    <div class="col-sm-4">
                                    	<select class="form-control" name="admin_type">
                                                <option value="1"><?php echo SUPER_ADMIN;?></option>
                                            	<option value="0"><?php echo ADMIN;?></option>
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="form-group clearfix">
                                	<div class="col-sm-3">
                                    	<label><?php echo STATUS; ?></label>
                                    </div>
                                    <div class="col-sm-4">
                                    	<select class="form-control" name="status">
                                                <option value="1"><?php echo ACTIVE;?></option>
                                            	<option value="0"><?php echo INACTIVE;?></option>
                                        </select>
                                    </div>
                                </div>
                                
                                
                            
                        </div>
                   	
                 </div>
                 
                 
                 	
                </div><!-- col-lg-12  -->
           
            </div>
           <div class="text-center">
           <?php if(DEMO_MODE=="0"){ ?>
                   <button type="submit" class="btn btn-default btn-lg"><?php echo ADD_ADMIN_USER;?></button>
            <?php } ?>
            <a href="<?php echo site_url();?>admin/admin_user/list_admin" class="btn btn-default btn-lg"> <?php echo CANCEL; ?></a>
            </div>
            </form>
        </div>
        </div>
        <!-- /#page-wrapper -->

   
</body>

</html>
