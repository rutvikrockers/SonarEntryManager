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
</script>  
<div id="page-wrapper">
	<div class="container-fluid">
            <div class="row">
                <div class="col-lg-8 col-xs-12 clearfix">
                    <h1><?php echo EMAIL_PREFERENCE; ?> - <?php echo SecureShowData($site_setting['site_name']);?> <?php echo ADMIN_PANEL; ?></h1>
                </div>
                 <div class="col-lg-4 col-xs-12 clearfix mt20 text-right">
                	<a href="<?php echo base_url();?>admin/email_preferences/add_email_preference" class="btn btn-primary"><?php echo NEW_EMAIL_PREFERENCE;?></a>
                </div>
                 <div class="page-header border clearfix"></div>
                <!-- /.col-lg-12 -->
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
						
						echo form_open('admin/email_preferences/action_email_preferences/', $attributes);

		 	?>
			<input type="hidden" name="action" id="action" />   
            
            <div class="row">
            	<div class="col-lg-12 clearfix">
                	<div class="panel panel-default">
                    <div class="panel-heading">
                                    <h4 class="panel-title text-right">
                                        
                                         <button type="button" class="btn btn-danger" onclick="setaction('chk[]','delete', '<?php echo ARE_YOU_SURE_YOU_WANT_TO_DELETE_SELECTED_EMAIL_PREFERENCE; ?>', 'frm_listpage')"><?php echo DELETE; ?></button>
                                         
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
                                            <th><?php echo USER; ?></th>
                                            <th><?php echo ATTENDEE_UPDATE; ?></th>
                                            <th><?php echo ORG_UPDATE; ?></th>
                                            <th class="sorting_disabled"><?php echo ACTION; ?></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    	 <?php 
												if($result)
													{
													foreach($result as $row)
														{
															
															$email_id=$row['id'];
															$user_id=$row['user_id'];
															$attendee_update=$row['attendee_update'];
															$attendee_picks=$row['attendee_picks'];
															$attendee_buy_ticket=$row['attendee_buy_ticket'];
															$org_update=$row['org_update'];
															$org_picks=$row['org_picks'];
															$org_next_event=$row['org_next_event'];
															$org_order_confirm=$row['org_order_confirm'];
															
															$user_data=getRecordById('users','id',$user_id);
															$email=$user_data['email'];
											?>
                                        <tr class="odd gradeX">
                                           
                                            <td><input type="checkbox" class="checkbox1" name="chk[]" value="<?php echo $email_id;?>" ></td>
                                            <td><a href=""><?php echo $email; ?></a></td>
                                            <td>
                                            	<?php if($attendee_update == 1)
													{
														echo YES;
													}else
													{
														echo NO;
													}
													
												 ?>
                                            </td>
                                            <td>
                                            	<?php if($org_update == 1)
													{
														echo YES;
													}else
													{
														echo NO;
													}
													
												 ?>
                                            </td>
                                            <td><?php echo anchor('admin/email_preferences/view_email_preference/'.$email_id.'/',VIEW);?> / <?php echo anchor('admin/email_preferences/edit_email_preference/'.$email_id.'/',EDIT);?></td>
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
                </div><!-- col-lg-8  -->
            	
                
            </div>
            <!-- /.row -->
</div>
</div>
        <!-- /#page-wrapper -->

    <!-- /#wrapper -->
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
</body>

</html>
