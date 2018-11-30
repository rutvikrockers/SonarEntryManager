<script src="<?php echo base_url();?>ckeditor/ckeditor.js"></script> 
        <div id="page-wrapper">
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
                                    	<label><?php echo EVENT_VENUE; ?></label>
                                    </div>
                                    <div class="col-sm-9">
                                    	<input class="form-control" type="text" name="event_venue" value="<?php echo SecureShowData($vanue_name); ?>">
                                    </div>
                                </div>
                                
                               <div class="form-group clearfix">
                                	<div class="col-sm-3">
                                    	<label><?php echo STREET_ADDRESS; ?></label>
                                    </div>
                                    <div class="col-sm-9">
                                    	<input class="form-control" type="text" name="street_address" value="<?php echo $street_address; ?>">
                                    </div>
                                </div>
                                
                                <div class="form-group clearfix">
                                	<div class="col-sm-3">
                                    	<label><?php echo ONLINE_EVENT_OPTION; ?></label>
                                    </div>
                                    <div class="col-sm-4">
                                    	<select class="form-control" name="online_event_option">
                                                <option value="1" <?php if($online_event_option=='1'){ echo "selected"; } ?>><?php echo YES;?></option>
                                            	<option value="0" <?php if($online_event_option=='0'){ echo "selected"; } ?>><?php echo NO;?></option>
                                        </select>
                                    </div>
                                </div>

                                 <div class="form-group clearfix">
                                    <div class="col-sm-3">
                                        <label><?php echo MAKE_EVENT_LIVE; ?></label>
                                    </div>
                                    <div class="col-sm-4">
                                        <select class="form-control" name="make_event_live">
                                                <option value="1" <?php if($active=='1'){ echo "selected"; } ?>><?php echo YES;?></option>
                                                <option value="0" <?php if($active=='0'){ echo "selected"; } ?>><?php echo NO;?></option>
                                        </select>
                                    </div>
                                </div>

                                <input name="event_active" id="event_active" type="hidden" text="<?php echo $active; ?>">
                                
                                <div class="form-group clearfix">
                                	<div class="col-sm-3">
                                    	<label><?php echo EVENT_DETAIL; ?></label>
                                    </div>
                                    <div class="col-sm-9">
                                    	<textarea name="update" id="update"><?php echo SecureShowData($event_detail); ?></textarea>
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
        <!-- /#page-wrapper -->

   
</body>

</html>
