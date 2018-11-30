<script>

function setaction(elename, actionval, actionmsg, formname) {
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
}
</script>  
<div id="page-wrapper">
    <div class="container-fluid">
            <div class="row">
               <div class="col-lg-8 col-xs-12 clearfix">
                    <h1><?php echo FACEBOOK_APPLICATIONS; ?>  <small><?php echo SecureShowData($site_setting['site_name']);?> <?php echo ADMIN_PANEL; ?></small></h1>
                </div>
                <div class="col-lg-4 col-xs-12  mt20 text-right clearfix">
                	<a href="<?php echo base_url();?>admin/fb_applications/add_app" class="btn btn-primary"><?php echo NEW_FACEBOOK_APP; ?></a>
                </div>
                 <div class="page-header border clearfix"></div>
                 <ol class="breadcrumb">
                    <li>
                        <i class="fa fa-dashboard"></i>  <a href="<?php echo site_url();?>admin/home/dashboard">Dashboard</a>
                    </li>
                    <li class="active">
                        <i class="fa fa-facebook-square"></i> <?php echo FACEBOOK_APPLICATIONS; ?>
                    </li>
                </ol>
            </div>
            <!-- /.row -->
            <?php 

            if($msg == 'delete')
                    {   
                        ?>
                        
                            <div class="alert alert-success" role="alert">
                            <button class="close" data-dismiss="alert">x</button>
                            <strong><?php echo SUCCESS; ?>!</strong> <?php echo RECORD_HAS_BEEN_SUCCESSFULLY_DELETED;?>
                            </div>
            <?php
                        }
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
				if($msg == 'active')
					{	?>
						
                        	<div class="alert alert-success" role="alert">
							<button class="close" data-dismiss="alert">x</button>
							<strong><?php echo SUCCESS; ?>!</strong> <?php echo RECORD_HAS_BEEN_SUCCESSFULLY_ACTIVE;?>
                            </div>
			 <?php } 
			 
			 	if($msg == 'deactive')
					{	?>
						
                        	<div class="alert alert-success" role="alert">
							<button class="close" data-dismiss="alert">x</button>
							<strong><?php echo SUCCESS; ?>!</strong> <?php echo RECORD_HAS_BEEN_SUCCESSFULLY_DEACTIVE;?>
                            </div>
			 
			 <?php } ?>
			
             <?php
		 				$attributes = array('name'=>'frm_listpage','id'=>'frm_listpage');
						
						echo form_open('admin/country/action_counry_list/', $attributes);

		 	?>
			<input type="hidden" name="action" id="action" />  
            
            <div class="row">
            	<div class="col-lg-12 clearfix">
                	<div class="panel panel-default">
                    	<div id="collapseOne" class="panel-collapse collapse in">
                            <div class="panel-body">
                            <div id="dataTables-example_wrapper" class="dataTables_wrapper form-inline" role="grid">
                            
                            	<div class="table-responsive">
                                  
                                  <table class="table table-striped table-bordered table-hover" id="sample_1">
                                    <thead>
                                        <tr>
                                            <th><?php echo APP_ID; ?></th>
                                           <th><?php echo APP_SECRET; ?></th>
                                            <th><?php echo TAB_URL; ?></th>
                                            <th><?php echo STATUS; ?></th>
                                            <th class="sorting_disabled"><?php echo ACTION; ?></th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php 
										if($result)
											{
											foreach($result as $row)
												{
													
													$id=$row['id'];
													$app_id = $row['app_id'];
                                                    $app_secret = $row['app_secret'];
                                                    $event_id=$row['event_id'];
                                                     $event_title='';
                                                    if($event_id>0){
                                                        $event_details=getRecordById('event',' id',$event_id);
                                                        $event_title=$event_details['event_title'];
                                                    }
                                                    $event_tab_url=$row['secure_page_tab_url'];
													$active = $row['active'];
														
													
									?>
                                        <tr class="odd gradeX">
                                           	<td><?php echo $app_id; ?></td>
                                            <td><?php echo $app_secret; ?></td>
                                            <td><?php echo $event_tab_url; ?></td>

                                           <td>
                                                <?php 
                                                    if($active == 1)
                                                        { ?>
                                                        <img src="<?php echo base_url(); ?>admin_images/tick1.png" /> &nbsp;
                                                        <?php echo ACTIVE;
                                                        } else{?>
                                                        <img src="<?php echo base_url(); ?>admin_images/eb_close-fc.png" />&nbsp;
                                                        <?php echo INACTIVE;
                                                        }
                                                    ?>
                                            </td>
                                            <td><?php echo anchor('admin/fb_applications/add_app/'.$id.'/',EDIT);?> 
                                            <?php if(DEMO_MODE=="0"){ ?>
                                                /  <a href="<?php echo site_url('admin/fb_applications/delete_app').'/'.$id?>" onclick='return confirm("<?php echo ARE_YOU_SURE_YOU_WANT_TO_DELETE_APPLICATION;?>");'> <?php echo DELETE;?></a>
                                                <?php } ?></td>
                                           
                                         
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
            
            </form>
        </div>
        <!-- /#page-wrapper -->

    </div>
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
