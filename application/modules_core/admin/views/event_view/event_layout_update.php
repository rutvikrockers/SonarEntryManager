 <?php
    $attributes = array('name' => 'frm_listadmin', 'class' => 'site-setting', 'enctype' => 'multipart/form-data');  
    echo form_open('admin/Event_view_layout/update_event_layout/'.$id,$attributes);
?>
        <div id="page-wrapper">
            <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1><?php echo EVENT_VIEW_LAYOUT; ?></h1>
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
                           <?php echo LAYOUT_DETAILS; ?>
                        </div>
                        <div class="panel-body">
                            
                                
                                <input type="hidden" name="id"  value="<?php echo $id;?>"/>
                                <div class="form-group clearfix">
                                    <div class="col-sm-3">
                                        <label><?php echo TEMPLATE_NAME; ?></label>
                                    </div>
                                    <div class="col-sm-9">
                                        <input class="form-control" type="text" name="template_name" value="<?php echo $template_name;?>">
                                    </div>
                                </div>
                                
                                <div class="form-group clearfix">
                                    <div class="col-sm-3">
                                        <label><?php echo TEMPLATE_CATEGORY; ?></label>
                                    </div>
                                    <div class="col-sm-9">
                                        <input class="form-control" type="text" name="category" value="<?php echo $category;?>" >
                                    </div>
                                </div>
                                <div class="form-group clearfix">
                                    <div class="col-sm-3">
                                        <label><?php echo STATUS; ?></label>
                                    </div>
                                    <div class="col-sm-4">
                                        <select class="form-control" name="status">
                                                <option value="1" <?php if($status == 1) { echo "selected"; }?> ><?php echo ACTIVE; ?></option>
                                                <option value="0" <?php if($status == 0) { echo "selected"; }?> ><?php echo INACTIVE; ?></option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group clearfix">
                                    <div class="col-sm-3">
                                        <label><?php echo TEMPLATE_IMAGE; ?></label>
                                    </div>
                                    <div class="col-sm-9">
                                       <input type="file" name="template_image"> 
                                       <?php 
                                        if(file_exists('images/'.$template_image))
                                         { ?>
                                        <img src="<?php echo base_url();?>images/<?php echo $template_image; ?>" height="100" width="200" alt="template" /></img>
                                        <?php }else { ?>
                                        <img src="<?php echo base_url(); ?>upload/home_banner/no_img.jpg" alt="template" height="100" width="100" >
                                        <?php } ?>
                                    </div>
                                    <input type="hidden" name="template_image" value="<?php echo $template_image;?>" />
                                </div>
                        </div>
                    
                 </div>
                </div><!-- col-lg-12  -->
          
            </div>
            <?php if(DEMO_MODE=="0"){ ?>
           <div class="text-center">
                   <button type="submit" class="btn btn-default btn-lg"><?php echo UPDATE_LAYOUT;?></button>
            </div>
            <?php } ?>
          </div>  
        </div>
        <!-- /#page-wrapper -->
</form>

