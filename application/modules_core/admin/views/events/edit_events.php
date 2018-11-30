<script src="<?php echo base_url();?>ckeditor/ckeditor.js"></script> 
        <div id="page-wrapper">
            <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1><?php echo EDIT_EVENT; ?></h1>
                </div>
                <div class="page-header border"></div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
                
			  <div class="row">
            	<div class="col-lg-12 clearfix">
                	<div class="panel panel-default">
                        <div class="panel-body">
                
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
								echo form_open('admin/events/edit_event/'.$id,$attributes);

				 			 ?>     
                                
                            	<div class="form-group clearfix">
                                	<div class="col-sm-3">
                                    	<label><?php echo EVENT_TITLE; ?></label>
                                    </div>
                                    <div class="col-sm-9">
                                    	<input class="form-control" type="text" name="event_title" value="<?php echo SecureShowData($event_title); ?>">
                                    </div>
                                </div>
                           
                                 <div class="form-group clearfix">
                                    <div class="col-sm-3">
                                        <label><?php echo EVENT_STATUS; ?></label>
                                    </div>
                                    <div class="col-sm-4">
                                        <?php 
                                        if($purchase)
                                        { ?>
                                            <label>
                                                <?php 
                                                    if($active=='1'){
                                                        echo ENABLE;
                                                    }else if($active=='4'){
                                                        echo DISABLE;
                                                    }
                                                ?>
                                            </label>
                                            <input type="hidden" name="active" value="<?php echo $active; ?>" >
                                        <?php }
                                        else{ ?>
                                        <select class="form-control" name="active">
                                                <option value="1" <?php if($active=='1'){ echo "selected"; } ?>><?php echo ENABLE;?></option>
                                                <option value="4" <?php if($active=='4'){ echo "selected"; } ?>><?php echo DISABLE;?></option>
                                        </select>
                                        <?php } ?>
                                    </div>
                                </div>

                                <input name="event_active" id="event_active" type="hidden" value="<?php echo $active; ?>">
                                
                                <div class="form-group clearfix">
                                	<div class="col-sm-3">
                                    	<label><?php echo EVENT_DETAIL; ?></label>
                                    </div>
                                    <div class="col-sm-9">
                                    	<textarea name="event_description" id="update"><?php echo SecureShowData($event_detail); ?></textarea>
											<script type="text/javascript">
                                                CKEDITOR.replace('update');
                                            </script>
                                    </div>
                                </div>
                                
                                
                            
                        </div>
                   	
                 </div>
                 
                 
                 	
                </div><!-- col-lg-12  -->
           
            </div>
           <div class="text-center">
                   <button type="submit" class="btn btn-default btn-lg"><?php echo UPDATE;?></button>
            </div>
            </form>
        </div>
        </div>
        <!-- /#page-wrapper -->

   
</body>

</html>
