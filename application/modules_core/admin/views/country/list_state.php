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
                    <h1><?php echo STATES; ?> - <?php echo SecureShowData($site_setting['site_name']);?> <?php echo ADMIN_PANEL; ?></h1>
                </div>
                <div class="col-lg-4 col-xs-12  mt20 text-right clearfix">
                	<a href="<?php echo base_url();?>admin/country/add_state" class="btn btn-primary"><?php echo NEW_STATE; ?></a>
                </div>
                 <div class="page-header border clearfix"></div>
                 <ol class="breadcrumb">
                    <li>
                        <i class="fa fa-dashboard"></i>  <a href="<?php echo site_url();?>admin/home/dashboard">Dashboard</a>
                    </li>
                    <li class="active">
                        <i class="fa fa-globe"></i> <?php echo STATES;?>
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
						
						echo form_open('admin/country/action_state_list/', $attributes);

		 	?>
			<input type="hidden" name="action" id="action" />  
            
            <div class="row">
            	<div class="col-lg-12 clearfix">
                	<div class="panel panel-default">
                    <div class="panel-heading">
                                    <h4 class="panel-title text-right">
                                        <button type="button" class="btn btn-success" onclick="setaction('chk[]','active', '<?php echo ARE_YOU_SURE_YOU_WANT_TO_ACTIVE_SELECTED_STATE;?>', 'frm_listpage')"><?php echo ACTIVE; ?></button>
                                        
                                    	<button type="button" class="btn btn-warning" onclick="setaction('chk[]','deactive', '<?php echo ARE_YOU_SURE_YOU_WANT_TO_DEACTIVE_SELECTED_STATE;?>', 'frm_listpage')"><?php echo DEACTIVE; ?></button>
                                        
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
                                            <th><?php echo STATE_NAME; ?></th>
                                            <th><?php echo COUNTRY_NAME; ?></th>
                                           <th><?php echo STATE_STATUS; ?></th>
                                           
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
                                                    $state_name=$row['state_name'];
													$country_name = $row['country_name'];
													$active = $row['active'];
														
													
									?>
                                        <tr class="odd gradeX">
                                        	<td><input type="checkbox" class="checkbox1" name="chk[]" value="<?php echo $id;?>" ></td>
                                            <td><?php echo SecureShowData($state_name); ?></td>
                                           	<td><?php echo SecureShowData($country_name); ?></td>
                                           <td>
                                                <?php 
                                                    if($active == 1)
                                                        { ?>
                                                        <img src="<?php echo base_url(); ?>admin_images/tick1.png" alt="tick" /> &nbsp;
                                                        <?php echo ACTIVE;
                                                        } else{?>
                                                        <img src="<?php echo base_url(); ?>admin_images/eb_close-fc.png" alt="close" />&nbsp;
                                                        <?php echo INACTIVE;
                                                        }
                                                    ?>
                                            </td>
                                            <td><?php echo anchor('admin/country/add_state/'.$id.'/',EDIT);?> /  <a href="<?php echo site_url('admin/country/delete_state').'/'.$id?>" onclick='return confirm("<?php echo ARE_YOU_SURE_YOU_WANT_TO_DELETE_STATE;?>");'> <?php echo DELETE;?></a></td>
                                           
                                         
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
