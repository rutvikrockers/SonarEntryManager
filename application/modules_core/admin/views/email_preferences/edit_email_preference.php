

<div id="page-wrapper">
<div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1><?php echo EDIT_EMAIL_PREFERENCE; ?></h1>
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
								
								$attributes = array('name' => 'frm_listadmin', 'class' => 'site-setting');	
								echo form_open('admin/email_preferences/edit_email_preference/'.$id,$attributes);

				 ?>   
			  <div class="row">
            	<div class="col-lg-12 clearfix">
                	<div class="panel panel-default">
                        <div class="panel-body">
                                
                                <div class="form-group clearfix">
                                	<div class="col-sm-3">
                                    	<label><?php echo USER; ?></label>
                                    </div>
                                    <div class="col-sm-4">
                                    	<select class="form-control" name="user_id">
                                        <?php 
											
											foreach($result as $raw)
											{
												$select='';
												if($raw['id'] == $user_id) { $select="selected=selected"; }
										?>
											<option value="<?php echo $raw['id']; ?>" <?php echo $select; ?> ><?php echo $raw['email']; ?></option>
                                            
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                 
                                 
                             <div class="form-group clearfix">
                                	<div class="col-sm-3">
                                    	<label><?php echo ATTENDEE_UPDATE; ?></label>
                                    </div>
                                    <div class="col-sm-2">
                                    	<select class="form-control" name="attendee_update">
                                                <option value="1" <?php if($attendee_update == 1) { echo "selected";} ?>><?php echo YES; ?></option>
                                            	<option value="0" <?php if($attendee_update == 0) { echo "selected";} ?>><?php echo NO; ?></option>
                                        </select>
                                    </div>
                                </div>
                                
                             <div class="form-group clearfix">
                                	<div class="col-sm-3">
                                    	<label><?php echo ORG_UPDATE; ?></label>
                                    </div>
                                    <div class="col-sm-2">
                                    	<select class="form-control" name="org_update">
                                                 <option value="1" <?php if($org_update == 1) { echo "selected";} ?>><?php echo YES; ?></option>
                                            	<option value="0" <?php if($org_update == 0) { echo "selected";} ?>><?php echo NO; ?></option>
                                        </select>
                                    </div>
                                </div>
                        </div>
                 </div>
                </div><!-- col-lg-12  -->
           
            </div>
            <?php if(DEMO_MODE=="0"){ ?>
           		<div class="text-center">
                   <button type="submit" class="btn btn-default btn-lg"><?php echo UPDATE_EMAIL_PREFERENCE; ?></button>
                    <a href="<?php echo site_url();?>/admin/email_preferences/list_email_preference" class="btn btn-default btn-lg"> <?php echo CANCEL; ?></a>
            	</div>
            <?php } ?>
            </form>
</div>
</div>
        <!-- /#page-wrapper -->
</body>

</html>
