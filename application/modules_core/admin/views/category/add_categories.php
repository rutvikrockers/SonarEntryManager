<div id="page-wrapper">
    <div class="container-fluid">
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
                                    <option value="<?php echo $category_id;?>" ><?php echo $parent_category ;?></option>
                                    <?php endforeach;?>
                                    </select>
                                   
                                    </div>
                                </div>

                                <!-- end by jaimin -->
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
                                        <label><?php echo "Top Category"; ?></label>
                                    </div>
                                    <div class="col-sm-4">
                                        <select class="form-control" name="top_category" onchange="top_category_details(this);">
                                                <option value="1"><?php echo "Yes"; ?></option>
                                                <option value="0" selected="selected"><?php echo "No"; ?></option>
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
                                <div class="form-group clearfix top_category_details" style="display: none;">
                                    <div class="col-sm-3">
                                        <label><?php echo "Colomn Size"; ?></label>
                                    </div>
                                    <div class="col-sm-4">
                                        <select class="form-control" name="colomn_size">
                                                <option value="1"><?php echo "1"; ?></option>
                                                <option value="2"><?php echo "2"; ?></option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group clearfix top_category_details" style="display: none;">
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
                                    </div>
                                </div> 
                                
                        </div>
                	 </div>
                </div><!-- col-lg-12  -->
            </div>
            <?php if(DEMO_MODE=="0"){ ?>
           		<div class="text-center">
                   <button type="submit" class="btn btn-default btn-lg"><?php echo CREATE_CATEGORY;?></button>
            	</div>
            <?php } ?>
            </form>
</div>
</div>
        <!-- /#page-wrapper -->
</body>
</html>
