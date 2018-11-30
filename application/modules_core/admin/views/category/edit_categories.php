<div id="page-wrapper">
    <div class="container-fluid">
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
                          
                          <!-- add by jaimin -->
                         <div class="form-group clearfix">
                                    <div class="col-sm-3">
                                        <label><?php echo PARENT_CATEGORY; ?></label>
                                    </div>
                                    <?php $p_data = getAllRecordById('categories',' category_parent_id',0); ?> 
                                <div class="col-sm-4">
                                     
                                       <select class="form-control" name="parent_category">
                                       <option value="0"><?php echo MAIN_CATEGORY ?></option>
                                    <?php   foreach($p_data as $row):?>
                                    <?php $category_id = $row['id'];$parent_category = $row['category_name'];?>
                                    <option value="<?php echo $category_id;?>" <?php if($category_parent_id == $category_id) { echo "selected"; } ?> ><?php echo $parent_category ;?></option>
                                    <?php endforeach;?>
                                    </select>
                                   
                                    </div>
                                </div>
                                <!-- add by jaimin -->
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
                                        <label><?php echo "Top Category"; ?></label>
                                    </div>
                                    <div class="col-sm-4">
                                        <select class="form-control" name="top_category" onchange="top_category_details(this);">
                                                <option value="1" <?php if($top_category == 1) { echo "selected"; }?>><?php echo "Yes"; ?></option>
                                                <option value="0" <?php if($top_category == 0) { echo "selected"; }?>><?php echo "No"; ?></option>
                                        </select>
                                    </div>
                                </div>
                                <script type="text/javascript">
                                    function top_category_details(me) {
                                        if($(me).val() == 1) {
                                            $('.top_category_details').show();
                                        } else {
                                            $('.top_category_details').hide();
                                        }
                                    }
                                </script>
                                <div class="form-group clearfix top_category_details" style="<?php echo ($top_category == 1) ? 'display: block;' : 'display: none;'; ?>">
                                    <div class="col-sm-3">
                                        <label><?php echo "Colomn Size"; ?></label>
                                    </div>
                                    <div class="col-sm-4">
                                        <select class="form-control" name="colomn_size">
                                                <option value="1" <?php if($colomn_size == 1) { echo "selected"; }?>><?php echo "1"; ?></option>
                                                <option value="2" <?php if($colomn_size == 2) { echo "selected"; }?>><?php echo "2"; ?></option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group clearfix top_category_details" style="<?php echo ($top_category == 1) ? 'display: block;' : 'display: none;'; ?>">
                                    <div class="col-sm-3">
                                        <label><?php echo "Order"; ?></label>
                                    </div>
                                    <div class="col-sm-9">
                                        <input class="form-control" type="text" name="order_no" value="<?php echo $order_no; ?>">
                                    </div>
                                </div>
                                
                               <div class="form-group clearfix">
                                	<div class="col-sm-3">
                                    	<label><?php echo CATEGORY_IMAGE; ?></label>
                                    </div>
                                    <div class="col-sm-9">
                                    	<input type="file" name="category_image">
                                        <?php 
										if(file_exists('upload/category_default/'.$category_image))
										 { ?>
                                        <img src="<?php echo base_url();?>upload/category_default/<?php echo $category_image; ?>" height="100" width="100" alt="category" />
                                        <?php }else { ?>
                                        <img src="<?php echo base_url(); ?>upload/category_default/no_img.jpg" alt="category" height="100" width="100" >
                                        <?php } ?>
                                    </div>
                                    <input type="hidden" name="category_image" value="<?php echo $category_image;?>" />
                                    
                                </div> 
                                
                        </div>
                	 </div>
                </div><!-- col-lg-12  -->
            </div>
            <?php if(DEMO_MODE=="0"){ ?>
           		<div class="text-center">
                   <button type="submit" class="btn btn-default btn-lg"><?php echo UPDATE_CATEGORY;?></button>
                    <a href="<?php echo site_url();?>admin/categories/list_categories" class="btn btn-default btn-lg"> <?php echo CANCEL; ?></a>
            	</div>
            <?php } ?>
            </form>
</div>
</div>
        <!-- /#page-wrapper -->
</body>
</html>
