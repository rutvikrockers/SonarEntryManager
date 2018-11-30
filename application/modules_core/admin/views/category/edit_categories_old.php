<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1><?php echo EDIT_CATEGORY; ?></h1>
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
								echo form_open('admin/categories/edit_categories/'.$id,$attributes);

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
                                    	<input class="form-control" type="text" name="category_name" value="<?php echo SecureShowData($category_name); ?>">
                                    </div>
                                </div>
                                
                                <div class="form-group clearfix">
                                	<div class="col-sm-3">
                                    	<label><?php echo CATEGORY_DESCRIPTION; ?></label>
                                    </div>
                                    <div class="col-sm-9">
                                    	<input class="form-control" type="text" name="category_description" value="<?php echo SecureShowData($category_description); ?>">
                                    </div>
                                </div>
                                
                                <div class="form-group clearfix">
                                	<div class="col-sm-3">
                                    	<label><?php echo CATEGORY_STATUS; ?></label>
                                    </div>
                                    <div class="col-sm-4">
                                    	<select class="form-control" name="category_status">
                                                <option value="1" <?php if($category_status == 1) { echo "selected"; }?>><?php echo ACTIVE; ?></option>
                                            	<option value="0" <?php if($category_status == 0) { echo "selected"; }?>><?php echo INACTIVE; ?></option>
                                        </select>
                                    </div>
                                </div>
                                
                               <div class="form-group clearfix">
                                	<div class="col-sm-3">
                                    	<label><?php echo CATEGORY_IMAGE; ?></label>
                                    </div>
                                    <div class="col-sm-9">
                                    	<input type="file" name="category_image">
                                        <?php 
										if(file_exists('admin_images/'.$category_image))
										 { ?>
                                        <img src="<?php echo base_url();?>admin_images/<?php echo $category_image; ?>" height="100" width="100"/>
                                        <?php }else { ?>
                                        <img src="<?php echo base_url(); ?>admin_images/no_image.jpg" alt=" " height="100" width="100" >
                                        <?php } ?>
                                    </div>
                                    <input type="hidden" name="category_image" value="<?php echo SecureShowData($category_image);?>" />
                                    
                                </div> 
                                
                        </div>
                	 </div>
                </div><!-- col-lg-12  -->
            </div>
            
           		<div class="text-center">
                   <button type="submit" class="btn btn-default btn-lg"><?php echo UPDATE_CATEGORY;?></button>
            	</div>
            </form>
        </div>
        <!-- /#page-wrapper -->
</body>
</html>
