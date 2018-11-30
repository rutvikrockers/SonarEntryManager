<script>

function setaction(elename, actionval, actionmsg, formname) {

    var demo_mode = <?php echo DEMO_MODE; ?>;
    
    if(demo_mode=="0"){
    	vchkcnt=0;
    	elem = document.getElementsByName(elename);

    	for(i=0;i<elem.length;i++){

    		if(elem[i].checked) vchkcnt++;	

    	}

    	if(vchkcnt==0) {

    		alert('<?php echo PLEASE_SELECT_A_RECORD; ?>')

    	} else {

    		if(confirm(actionmsg))

    		{
    			document.getElementById('action').value=actionval;	

    			document.getElementById(formname).submit();
    		}		

    	}
    }else{
        alert('You can not do this action as you are in demo mode');
        return false;
    }
}

function ConfirmDialog(){
    if(confirm('Are you sure want to delete this newsletter job ?')){
        return true;
    }else{ return false; }
}
</script>  
<div id="page-wrapper">
    <div class="container-fluid">
            <div class="row">
               <div class="col-lg-8 col-xs-12 clearfix">
                    <h1><?php echo NEWSLETTER_JOB; ?> - <?php echo SecureShowData($site_setting['site_name']);?> <?php echo ADMIN_PANEL; ?></h1>
                </div>
                <div class="col-lg-4 col-xs-12 clearfix mt20 text-right">
                	<a href="<?php echo base_url();?>admin/newsletter/add_newsletter_job" class="btn btn-primary"><?php echo NEW_NEWSLETTER_JOB; ?></a>
                </div>
                 <div class="page-header border clearfix"></div>
            </div>
            <!-- /.row -->
            <?php 
				if($msg == 'add')
					{	?>
						
                        	<div class="alert alert-success" role="alert">
							<button class="close" data-dismiss="alert">x</button>
							<strong><?php echo SUCCESS; ?>!</strong> <?php echo RECORD_HAS_BEEN_SUCCESSFULLY_ADDED;?>
                            </div>
                            
            <?php 
			} 
				if($msg == 'update')
					{	?>
						
                        	<div class="alert alert-success" role="alert">
							<button class="close" data-dismiss="alert">x</button>
							<strong><?php echo SUCCESS; ?>!</strong> <?php echo RECORD_HAS_BEEN_SUCCESSFULLY_UPDATED;?>
                            </div>
			
			<?php }
				if($msg == 'delete')
					{	?>
						
                        	<div class="alert alert-success" role="alert">
							<button class="close" data-dismiss="alert">x</button>
							<strong><?php echo SUCCESS; ?>!</strong> <?php echo RECORD_HAS_BEEN_SUCCESSFULLY_DELETED;?>
                            </div>
			<?php } ?>
            
            
            
            <?php
		 				$attributes = array('name'=>'frm_listpage','id'=>'frm_listpage');
						
						echo form_open('admin/newsletter/action_newsletter_job/', $attributes);

		 	?>
			<input type="hidden" name="action" id="action" />  
            
            <div class="row">
            	<div class="col-lg-12 clearfix">
                	<div class="panel panel-default">
                    	<div class="panel-heading">
                                    <h4 class="panel-title text-right">
                                        
                                       <button type="button" class="btn btn-danger" onclick="setaction('chk[]','delete', '<?php echo ARE_YOU_SURE_YOU_WANT_TO_DELETE_SELECTED_NEWSLETTER_JOB; ?>', 'frm_listpage')"><?php echo DELETE; ?></button>
                                    </h4>
                        </div>
                        <div id="collapseOne" class="panel-collapse collapse in">
                            <div class="panel-body">
                            <div id="dataTables-example_wrapper" class="dataTables_wrapper form-inline" role="grid">
                            
                            	<div class="table-responsive">
                                
                                  <table class="table table-striped table-bordered table-hover" id="sample_1">
                                    <thead>
                                        <tr>
                                        	<th class="sorting_disabled"><input type="checkbox" id="selecctall"></th>
                                            <th><?php echo NEWSTYPE; ?></th>
                                            <th><?php echo JOB_START_DATE;?></th>
                                            <th><?php echo STATUS; ?></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php 
										if($result)
											{
												foreach($result as $row)
													{
														$news_id = $row['id'];
														$newstype = $row['newstype'];
														$job_start_date = $row['job_start_date'];

                                                        if($row['send_total']==0){
                                                        	
                                                        	$status=PENDING;
                                                                
                                                        }else
                                                        {
                                                             $status=SEND;
                                                        }
									?>
                                        <tr class="odd gradeX">
                                        	<td><input type="checkbox" class="checkbox1" name="chk[]" value="<?php echo $news_id;?>" ></td>
                                           	<td>
                                            	<?php  
											if($newstype == 'updateA')
												{
													echo ATTENDING_ANNOUNCEMENTS_AND_UPDATE;
												}
											if($newstype == 'updateB')
												{
													echo ORGANIZING_ANNOUNCEMENTS_AND_UPDATE;
												}
											
											 ?>
											</td>
                                            <td>
											<?php echo $job_start_date; ?>
                                            
											</td>
                                            <td><?php echo $status; ?></td>
                                            
                                            	<?php //echo anchor('admin/newsletter/edit_newsletter_job/'.$news_id.'/',EDIT)?>  <?php //echo anchor('admin/newsletter/delete_newsletter_job/'.$news_id.'/',DELETE,array('onclick'=>"return ConfirmDialog();"))?>
                                        </tr>
                                    <?php 
													}
											}	
									?>    
                                    </tbody>
                                </table>
                               
                                </div>
                                
                                </div>
                         </div>
                   	</div>
                 </div>
                 <p><?php echo base_url(); ?>admin/newsletter_cron/send<br>
            		(Ex :: curl -s -o /dev/null <?php echo base_url(); ?>admin/newsletter_cron/send)</p>
                </div><!-- col-lg-8  -->
            	
                
            </div>
            <!-- /.row -->
</div>
</div>
        <!-- /#page-wrapper -->

    <!-- /#wrapper -->

</body>
<script>
$(document).ready(function(){
		$('#sample_1').dataTable();
		
	});
</script>
<script>
    $(document).ready(function() {
    
	$('#selecctall').click(function(event) {  //on click 
        if(this.checked) { // check select status
            $('.checkbox1').each(function() { //loop through each checkbox
                this.checked = true;  //select all checkboxes with class "checkbox1"               
            });
        }else{
            $('.checkbox1').each(function() { //loop through each checkbox
                this.checked = false; //deselect all checkboxes with class "checkbox1"                       
            });         
        }
    });
    
});
        
</script>
</html>
