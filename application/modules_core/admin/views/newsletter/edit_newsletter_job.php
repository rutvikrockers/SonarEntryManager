<link href="<?php echo base_url(); ?>admin_css/datepicker.css" rel="stylesheet">
<div id="page-wrapper">
    <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1><?php echo EDIT_NEWSLETTER_JOB; ?></h1>
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
								echo form_open('admin/newsletter/edit_newsletter_job/'.$id,$attributes);

				 ?>   
                   
			  <div class="row">
            	<div class="col-lg-12 clearfix">
                	<div class="panel panel-default">
                        <div class="panel-body">
                            
                            	<div class="form-group clearfix">
                                	<div class="col-sm-3">
                                    	<label><?php echo NEWSLETTER_SUBJECT; ?></label>
                                    </div>
                                    <div class="col-sm-4">
                                    	<select class="form-control" name="newsletter_id">
                                        <?php 
											foreach($template_data as $template)
												{
													$t_id= $template['id'];
													$select='';
													if($newsletter_id == $t_id) { $select="selected=selected"; }
										?>
                                                <option value="<?php echo $t_id;?>" <?php echo $select; ?>><?php echo SecureShowData($template['subject']);?></option>
                                          <?php } ?>  	
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="form-group clearfix">
                                	<div class="col-sm-3">
                                    	<label><?php echo NEWSLETTER_TYPE; ?></label>
                                    </div>
                                    <div class="col-sm-4">
                                    	<select class="form-control" name="newstype">
                                        	   <option value="updateA" <?php if($newstype == 'updateA') { echo "selected";}?>><?php echo ATTENDING_ANNOUNCEMENTS_AND_UPDATE; ?></option>
                                            	<option value="updateB" <?php if($newstype == 'updateO') { echo "selected";}?>><?php echo ORGANIZING_ANNOUNCEMENTS_AND_UPDATE; ?></option>
                                        </select>
                                    </div>
                                </div>
                                
                                
                            	<div class="form-group clearfix">
                                	<div class="col-sm-3">
                                    	<label><?php echo JOB_SCHEDULE_DATE; ?></label>
                                    </div>
                                    <div class="col-sm-4">
                                    	<input class="form-control" type="text" name="job_start_date" value="<?php echo $job_start_date; ?>" id="datepicker1">
                                        <?php echo "Server Date Time : ".date('Y-m-d H:i:s'); ?>
                                    </div>
                                </div>
                            
                             <!-- added by Rahul-->
                             <div id="attending">
                            <div class="form-group clearfix">
                                	<div class="col-sm-3">
                                    	<label><?php echo 'Updates about new '.SecureShowData($site_setting['site_name']).' features and announcements'; ?></label>
                                    </div>
                                    <div class="col-sm-4">
                                        <input class="" type="checkbox" name="attending_new" id="attending_new" value="1" <?php if($attending_new) { echo 'checked'; }?>>
                                    </div>
                                </div>
                            <div class="form-group clearfix">
                                	<div class="col-sm-3">
                                    	<label><?php echo 'A digest of personalized event recommendations('.SecureShowData($site_setting['site_name']).' Picks)'; ?></label>
                                    </div>
                                    <div class="col-sm-4">
                                    	<input class="" type="checkbox" name="attending_recommend" id="attending_recommend" value="1" <?php if($attending_recommend) { echo 'checked'; } ?>>
                                    </div>
                                </div>
                             </div>
                            
                             <div id="organizing">
                            <div class="form-group clearfix">
                                	<div class="col-sm-3">
                                    	<label><?php echo 'Updates about new '.SecureShowData($site_setting['site_name']).' features and announcements'; ?></label>
                                    </div>
                                    <div class="col-sm-4">
                                    	<input class="" type="checkbox" name="organizing_new" id="organizing_new" value="1" <?php if($organizing_new) { echo 'checked'; } ?>>
                                    </div>
                                </div>
                            <div class="form-group clearfix">
                                	<div class="col-sm-3">
                                    	<label><?php echo 'A digest of personalized event recommendations('.$site_setting['site_name'].' Picks)'; ?></label>
                                    </div>
                                    <div class="col-sm-4">
                                    	<input class="" type="checkbox" name="organizing_recommend" id="organizing_recommend" value="1" <?php if($organizing_recommend) { echo 'checked'; } ?>>
                                    </div>
                                </div>
                             </div>
                            <!-- end added by Rahul-->
                                
                        </div>
                   	
                 </div>
                 
                 
                 	
                </div><!-- col-lg-12  -->
           
            </div>
                <?php if(DEMO_MODE=="0"){ ?>
           		<div class="text-center">
                   <button type="submit" class="btn btn-default btn-lg"><?php echo UPDATE_NEWSLETTER_JOB; ?></button>
                   <a href="<?php echo site_url();?>admin/newsletter/list_newsletter_job" class="btn btn-default btn-lg"> <?php echo CANCEL; ?></a>
            	</div>
                <?php } ?>
            </form>
</div>
</div>
        <!-- /#page-wrapper -->
<script src="<?php echo base_url(); ?>admin_js/bootstrap-datepicker.js"></script>

        
<script type="text/javascript">
            // When the document is ready
            $(document).ready(function () {
                
                $('#attending').hide();
                $('#organizing').hide();
                
                var drop = $('select[name="newstype"]').val();
                if(drop == 'updateA'){
                     $('#attending').show();
                     
                     $('input[name="organizing_new"]').attr('disabled',true);
                     $('input[name="organizing_recommend"]').attr('disabled',true);
                     
                     $('input[name="attending_new"]').removeAttr('disabled');
                     $('input[name="attending_recommend"]').removeAttr('disabled');
                }
                if(drop == 'updateB'){
                     $('#organizing').show();
                      
                     $('input[name="attending_new"]').attr('disabled',true);
                     $('input[name="attending_recommend"]').attr('disabled',true);
                     
                     $('input[name="organizing_new"]').removeAttr('disabled');
                     $('input[name="organizing_recommend"]').removeAttr('disabled');
                }
                
                $('select[name="newstype"]').change(function(){
                    
                    if($(this).val() == 'updateA'){
                        $('#attending').show();
                        $('#organizing').hide();
                        
                        $('input[name="organizing_new"]').attr('disabled',true);
                        $('input[name="organizing_recommend"]').attr('disabled',true);
                     
                        $('input[name="attending_new"]').removeAttr('disabled');
                        $('input[name="attending_recommend"]').removeAttr('disabled');
                    }
                    if($(this).val() == 'updateB'){
                        $('#organizing').show();
                        $('#attending').hide();
                       
                        $('input[name="attending_new"]').attr('disabled',true);
                        $('input[name="attending_recommend"]').attr('disabled',true);
                     
                        $('input[name="organizing_new"]').removeAttr('disabled');
                        $('input[name="organizing_recommend"]').removeAttr('disabled');
                    }
                });
                
                
                $('#datepicker1').datepicker({
                    format: "yyyy-mm-dd",
					orientation: 'top'
                });
				
            });
			
</script>          
</body>

</html>
