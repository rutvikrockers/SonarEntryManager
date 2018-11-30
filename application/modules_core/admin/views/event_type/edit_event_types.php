<div id="page-wrapper">
    <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1><?php echo EDIT_EVENT_TYPE; ?></h1>
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
								echo form_open('admin/event_types/edit_event_types/'.$id,$attributes);

				 ?>   
                   
			  <div class="row">
            	<div class="col-lg-12 clearfix">
                	<div class="panel panel-default">
                        <div class="panel-body">
                          
                            <div class="form-group clearfix">
                                	<div class="col-sm-3">
                                    	<label><?php echo EVENT_TYPE_NAME; ?></label>
                                    </div>
                                    <div class="col-sm-9">
                                    	<input class="form-control" type="text" name="event_type_name" value="<?php echo SecureShowData($event_type_name); ?>">
                                    </div>
                                </div>
                                
                                <div class="form-group clearfix">
                                	<div class="col-sm-3">
                                    	<label><?php echo EVENT_TYPE_DESCRIPTION; ?></label>
                                    </div>
                                    <div class="col-sm-9">
                                    	<input class="form-control" type="text" name="event_type_description" value="<?php echo SecureShowData($event_type_description); ?>">
                                    </div>
                                </div>
                                
                                <div class="form-group clearfix">
                                    <div class="col-sm-3">
                                        <label><?php echo EVENT_TYPE_STATUS; ?></label>
                                    </div>
                                    <div class="col-sm-4">
                                        <select class="form-control" name="event_type_status">
                                                <option value="1" <?php if($event_type_status == 1) { echo "selected"; }?>><?php echo ACTIVE; ?></option>
                                                <option value="0" <?php if($event_type_status == 0) { echo "selected"; }?>><?php echo INACTIVE; ?></option>
                                        </select>
                                    </div>
                                </div>
                                
                               <div class="form-group clearfix">
                                	<div class="col-sm-3">
                                    	<label><?php echo EVENT_TYPE_IMAGE; ?></label>
                                    </div>
                                    <div class="col-sm-9">
                                    	<input type="file" name="event_type_image">
                                        <?php 
										if(file_exists('upload/event_type_default/'.$event_type_image))
										 { ?>
                                        <img src="<?php echo base_url();?>upload/event_type_default/<?php echo SecureShowData($event_type_image); ?>" height="100" width="100" type="type" />
                                        <?php }else { ?>
                                        <img src="<?php echo base_url(); ?>upload/event_type_default/no_img.jpg" alt="type" height="100" width="100" >
                                        <?php } ?>
                                    </div>
                                    <input type="hidden" name="event_type_image" value="<?php echo SecureShowData($event_type_image);?>" />
                                    
                                </div> 
                                
                        </div>
                	 </div>
                </div><!-- col-lg-12  -->
            </div>
            <?php if(DEMO_MODE=="0"){ ?>
           		<div class="text-center">
                   <button type="submit" class="btn btn-default btn-lg"><?php echo UPDATE_EVENT_TYPE;?></button>
                    <a href="<?php echo site_url();?>/admin/event_types/list_event_types" class="btn btn-default btn-lg"> <?php echo CANCEL; ?></a>
            	</div>
            <?php } ?>
            </form>
</div>
</div>
        <!-- /#page-wrapper -->
</body>
</html>
