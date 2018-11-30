<?php $site_name = $site_setting['site_name']; ?>
<script type="text/javascript">
function goBack() {
    window.history.back();
    }
</script>
<link href="<?php echo base_url(); ?>admin_css/datepicker.css" rel="stylesheet">
<div id="page-wrapper">
    <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1><?php echo NEW_NEWSLETTER_JOB; ?></h1>
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
								echo form_open('admin/newsletter/add_newsletter_job/',$attributes);

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
										?>
                                                <option value="<?php echo $template['id'];?>" ><?php echo SecureShowData($template['subject']);?></option>
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
                                        		
                                                <option value="updateA" ><?php echo ATTENDING_ANNOUNCEMENTS_AND_UPDATE; ?></option>
                                            	<option value="updateB" ><?php echo ORGANIZING_ANNOUNCEMENTS_AND_UPDATE; ?></option>
                                        </select>
                                    </div>
                                </div>
                                
                                <?php 
                                $user_data=getAllData('users');
								?>
                                <div class="form-group clearfix">
                                	<div class="col-sm-3">
                                    	<label><?php echo "All Users"; ?></label>
                                    </div>
                                    <div class="col-sm-4">
                                    	<select class="form-control" name="select_user[]" multiple="multiple">
                                    		<?php foreach($user_data as $user_email) {?>
                                        		
													<option value="<?php echo SecureShowData($user_email['email']);?>"><?php echo SecureShowData($user_email['email']);?></option>
												  <?php } ?>	
                                        </select>
                                      
                                    </div>
                                </div>
                                
                                <div class="form-group clearfix">
                                	<div class="col-sm-3">
                                    	<label><?php echo "Recursive"; ?></label>
                                    </div>
                                    <div class="col-sm-4">
                                    	<select class="form-control" name="recursive" id="recursive" onChange="select_recursive();">
                                        		 <option value="select"><?php echo SELECT; ?></option>
												 <option value="yes"><?php echo YES; ?></option>
												 <option value="no"><?php echo NO; ?></option>
                                        </select>
                                    </div>
                                </div>
                              <div id="yes_recusive" style="display:none;">
                                
                                <div class="form-group clearfix">
                                	<div class="col-sm-3">
                                    	<label><?php echo "Duration"; ?></label>
                                    </div>
                                    <div class="col-sm-4">
                                    	<select class="form-control" name="news_type" id="news_type" onChange="newsletter_type();">
                                        		 <option value=""><?php echo SELECT; ?></option>
                                                 <option value="daily"><?php echo "Daily"; ?></option>
	                                             <option value="weekly"><?php echo "Weekly"; ?></option>
												 <option value="monthly"><?php echo "Monthly"; ?></option>
												 <option value="duration"><?php echo "Duration"; ?></option>
                                        </select>
                                    </div>
                                </div>
                                
                                <div style="display:none;" id="weekly">
	                                <div class="form-group clearfix">
	                                	<div class="col-sm-3">
	                                    	<label><?php echo "Select A Day Of Week"; ?></label>
	                                    </div>
	                                    <div class="col-sm-4">
	                                    	<select class="form-control" name="week_day" id="week_day">
	                                    	
													<?php $orig_date = strtotime( date('Y-m-d') );
														echo '<option value="">Select</option>';
													
														for($i=0;$i<7;$i++)
														{
															$date = strtotime("+".$i." day", $orig_date);
															$dates = date('Y-m-d', $date);
															$timestamp=strtotime($dates);
															$day = date('l', $timestamp);
															echo '<option value='.$dates.'>'.$day.'</option>';
														}
													?>
																		
											</select>
	                                    </div>
	                                </div>
	                             </div>
	                             
	                             <div style="display:none;" id="month">
	                                <div class="form-group clearfix">
	                                	<div class="col-sm-3">
	                                    	<label><?php echo "Select A Day"; ?></label>
	                                    </div>
	                                    <div class="col-sm-4">
	                                    	<select class="form-control" name="month_day" id="month_day">
	                                    		
												<?php $orig_date = strtotime( date('Y-m-01') );
													echo '<option value="">Select a Day</option>';
													
													for($i=0;$i<30;$i++)
													{
														$date = strtotime("+".$i." day", $orig_date);
														$dates = date('Y-m-d', $date);
														echo '<option value='.$dates.'>'.$dates.'</option>';
													}
													?>
																	
											</select>					
											
	                                    </div>
	                                </div>
	                             </div>
	                             
	                             <div id="spec_duration" style="display:none;">
	                             	
	                             	<div class="form-group clearfix">
	                             		<div class="col-sm-3">
                                    	<label><?php echo "Select Start Date"; ?></label>
	                                    </div>
	                                    <div class="col-sm-4">
	                                    	<input class="form-control" type="text" name="start_date" id="datepicker2">
	                                        <?php echo SERVER_DATE_TIME." ".date('Y-m-d H:i:s'); ?>
	                                    </div>
                       				 </div>             
									
                                    <div class="form-group clearfix">
	                             		<div class="col-sm-3">
                                    	<label><?php echo "Select End Date"; ?></label>
	                                    </div>
	                                    <div class="col-sm-4">
	                                    	<input class="form-control" type="text" name="end_date" id="datepicker3">
	                                        <?php echo SERVER_DATE_TIME." ".date('Y-m-d H:i:s'); ?>
	                                    </div>
                       				 </div>     
									
		                          </div>
                                 </div>
	                             
                             <div class="form-group clearfix">
                                	<div class="col-sm-3">
                                    	<label><?php echo JOB_SCHEDULE_DATE; ?></label>
                                    </div>
                                    <div class="col-sm-4">
                                    	<input class="form-control" type="text" name="job_start_date" id="datepicker1">
                                        <?php echo SERVER_DATE_TIME." ".date('Y-m-d H:i:s'); ?>
                                    </div>
                                </div>
                            
                            <!-- added by Rahul-->
                            <div id="attending">
                            <div class="form-group clearfix">
                                	<div class="col-sm-3">
                                    	<label><?php echo 'Updates about new '.SecureShowData($site_name).' features and announcements'; ?></label>
                                    </div>
                                    <div class="col-sm-4">
                                        <input class="" type="checkbox" name="attending_new" id="attending_new" value="1" <?php if($attending_new) { echo 'checked'; } ?>>
                                    </div>
                                </div>
                            </div>
                            
                            <div id="organizing">
                            <div class="form-group clearfix">
                                	<div class="col-sm-3">
                                    	<label><?php echo 'Updates about new '.SecureShowData($site_name).' features and announcements'; ?></label>
                                    </div>
                                    <div class="col-sm-4">
                                    	<input class="" type="checkbox" name="organizing_new" id="organizing_new" value="1" <?php if($organizing_new) { echo 'checked'; } ?>>
                                    </div>
                                </div>
                            </div>
                            <!-- end added by Rahul-->
                            
                            
                            
                                
                        </div>
                   	
                 </div>
                 
                 
                 	
                </div><!-- col-lg-12  -->
           
            </div>
           		<div class="text-center">
                <?php if(DEMO_MODE=="0"){ ?>
                   <button type="submit" class="btn btn-default btn-lg"><?php echo CREATE_NEWSLETTER_JOB; ?></button>
                <?php } ?>
                   <button type="button" class="btn btn-default btn-lg" onclick="goBack()"><?php echo CANCEL; ?></button>
            	</div>
            </form>
</div>
</div>

        <!-- /#page-wrapper -->
<script>
function select_recursive()
{
	var chk_rec=document.getElementById('recursive').value;
	//alert(chk_rec);
	if(chk_rec=='yes')
	{
		//document.getElementById('job_start').style.display='none';
		document.getElementById('yes_recusive').style.display='block';
		
	}
	else
	{
		//document.getElementById('job_start').style.display='block';
		document.getElementById('yes_recusive').style.display='none';
	}
}

function newsletter_type()
{
	var chk_news=document.getElementById('news_type').value;
	//alert(chk_news);
	if(chk_news)
	{
		document.getElementById('yes_recusive').style.display='block';
		
	}
	if(chk_news=='daily')
	{
		document.getElementById('spec_duration').style.display='none';
		document.getElementById('month').style.display='none';
		document.getElementById('weekly').style.display='none';
		document.getElementById('job_start').style.display='block';

	}
	if(chk_news=='weekly')
	{
		document.getElementById('spec_duration').style.display='none';
		document.getElementById('month').style.display='none';
		document.getElementById('weekly').style.display='block';
		document.getElementById('job_start').style.display='block';
	}
	if(chk_news=='monthly')
	{
		document.getElementById('spec_duration').style.display='none';
		document.getElementById('month').style.display='block';
		document.getElementById('weekly').style.display='none';
		document.getElementById('job_start').style.display='block';
	}
	if(chk_news=='duration')
	{
		document.getElementById('spec_duration').style.display='block';
		document.getElementById('month').style.display='none';
		document.getElementById('weekly').style.display='none';
		document.getElementById('job_start').style.display='none';
	}
	
}
</script>        
        
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
                $('#datepicker2').datepicker({
                    format: "yyyy-mm-dd",
					orientation: 'top'
                });
                $('#datepicker3').datepicker({
                    format: "yyyy-mm-dd",
					orientation: 'top'
                });
				
            });
			
</script>        
</body>

</html>
