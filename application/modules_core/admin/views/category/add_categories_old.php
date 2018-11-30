<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1><?php echo NEW_CATEGORY; ?></h1>
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
								
								$attributes = array('name' => 'frm_listadmin', 'class' => 'site-setting', 'enctype' => 'multipart/form-data');	
								echo form_open('admin/categories/add_categories/',$attributes);

				 ?>   
                   
			  <div class="row">
            	<div class="col-lg-12 clearfix">
                	<div class="panel panel-default">
                        <div class="panel-body">
                            
                            <div class="form-group clearfix">
                                	<div class="col-sm-3">
                                    	<label><?php echo CATEGORY_NAME; ?></label>
                                    </div>
                                    <div class="col-sm-9">
                                    	<input class="form-control" type="text" name="category_name">
                                    </div>
                                </div>
                                
                                <div class="form-group clearfix">
                                	<div class="col-sm-3">
                                    	<label><?php echo CATEGORY_DESCRIPTION; ?></label>
                                    </div>
                                    <div class="col-sm-9">
                                    	<input class="form-control" type="text" name="category_description">
                                    </div>
                                </div>
                                
                                <div class="form-group clearfix">
                                	<div class="col-sm-3">
                                    	<label><?php echo CATEGORY_STATUS; ?></label>
                                    </div>
                                    <div class="col-sm-4">
                                    	<select class="form-control" name="category_status">
                                                <option value="1" ><?php echo ACTIVE; ?></option>
                                            	<option value="0" ><?php echo INACTIVE; ?></option>
                                        </select>
                                    </div>
                                </div>
                                
                               <div class="form-group clearfix">
                                	<div class="col-sm-3">
                                    	<label><?php echo CATEGORY_IMAGE; ?></label>
                                    </div>
                                    <div class="col-sm-9">
                                    	<input type="file" name="category_image">
                                    </div>
                                </div> 
                                
                        </div>
                	 </div>
                </div><!-- col-lg-12  -->
            </div>
            
           		<div class="text-center">
                   <button type="submit" class="btn btn-default btn-lg"><?php echo CREATE_CATEGORY;?></button>
            	</div>
            </form>
        </div>
        <!-- /#page-wrapper -->
</body>
</html>
