 <?php                                
    $attributes = array('name' => 'frm_listadmin', 'class' => 'site-setting', 'enctype' => 'multipart/form-data');  
    echo form_open('admin/Event_view_layout/add_event_layout/'.$id,$attributes);
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
                            
                              
                                
                                <div class="form-group clearfix">
                                    <div class="col-sm-3">
                                        <label><?php echo TEMPLATE_NAME; ?></label>
                                    </div>
                                    <div class="col-sm-9">
                                        <input class="form-control" type="text" name="template_name">
                                    </div>
                                </div>
                                
                                <div class="form-group clearfix">
                                    <div class="col-sm-3">
                                        <label><?php echo TEMPLATE_CATEGORY; ?></label>
                                    </div>
                                    <div class="col-sm-9">
                                        <input class="form-control" type="text" name="category">
                                    </div>
                                </div>
                                <div class="form-group clearfix">
                                    <div class="col-sm-3">
                                        <label><?php echo STATUS; ?></label>
                                    </div>
                                    <div class="col-sm-4">
                                        <select class="form-control" name="status">
                                                <option value="1" ><?php echo ACTIVE; ?></option>
                                                <option value="0" ><?php echo INACTIVE; ?></option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group clearfix">
                                    <div class="col-sm-3">
                                        <label><?php echo TEMPLATE_IMAGE; ?></label>
                                    </div>
                                    <div class="col-sm-9">
                                       <input type="file" name="template_image"> 
                                    </div>
                                </div>
                        </div>
                    
                 </div>
                </div><!-- col-lg-12  -->
           
            </div>
           <div class="text-center">
                   <button type="submit" class="btn btn-default btn-lg"><?php echo ADD_LAYOUT;?></button>
            </div>
            
        </div>
        </div>
        <!-- /#page-wrapper -->
</form>

