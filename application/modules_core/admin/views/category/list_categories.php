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
                    <h1><?php echo CATEGORIES; ?> - <?php echo SecureShowData($site_setting['site_name']);?> <?php echo ADMIN_PANEL; ?></h1>
                </div>
                <div class="col-lg-4 col-xs-12  mt20 text-right clearfix">
                	<a href="<?php echo base_url();?>admin/categories/add_categories" class="btn btn-primary"><?php echo NEW_CATEGORY; ?></a>
                </div>
                 <div class="page-header border clearfix"></div>
            </div>
            <!-- /.row -->
            <?php 
            if($msg == 'delete')
                    {   ?>
                        
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
						
						echo form_open('admin/categories/action_categories/', $attributes);

		 	?>
			<input type="hidden" name="action" id="action" />  
            
            <div class="row">
            	<div class="col-lg-12 clearfix">
                	<div class="panel panel-default">
                    <div class="panel-heading">
                                    <h4 class="panel-title text-right">
                                        <button type="button" class="btn btn-success" onclick="setaction('chk[]','active', '<?php echo ARE_YOU_SURE_YOU_WANT_TO_ACTIVE_SELECTED_CATEGORY;?>', 'frm_listpage')"><?php echo ACTIVE; ?></button>
                                        
                                    	<button type="button" class="btn btn-warning" onclick="setaction('chk[]','deactive', '<?php echo ARE_YOU_SURE_YOU_WANT_TO_DEACTIVE_SELECTED_CATEGORY;?>', 'frm_listpage')"><?php echo DEACTIVE; ?></button>
                                        
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
                                            <th><?php echo CATEGORY_NAME; ?></th>
                                            <th><?php echo CATEGORY_DESCRIPTION; ?></th>
                                            <th><?php echo CATEGORY_STATUS; ?></th>
                                            <th><?php echo CATEGORY_IMAGE; ?></th>
                                            <th><?php echo CATEGORY_TYPE; ?></th>
                                            <th><?php echo EVENTS; ?></th>
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
													$category_name = $row['category_name'];
													$category_description = $row['category_description'];
													$active = $row['active'];
													$category_image = $row['category_image'];
													$category_parent_id = $row['category_parent_id'];
													
													if($category_parent_id == 0)
													{
														$events_count =get_parent_category($id);
													}else
													{
														$events_count =get_child_category($id);
													}
														
													
									?>
                                        <tr class="odd gradeX">
                                        	<td><input type="checkbox" class="checkbox1" name="chk[]" value="<?php echo $id;?>" ></td>
                                           	<td><?php echo SecureShowData($category_name); ?></td>
                                            <td><?php echo SecureShowData($category_description); ?></td>
                                            <td>
                                            	<?php 
													if($active == 1)
														{ ?>
                                                        <img src="<?php echo base_url(); ?>admin_images/tick1.png" alt="tick" /> &nbsp;
														<?php echo ACTIVE;
													 	} else{?>
														<img src="<?php echo base_url(); ?>admin_images/eb_close-fc.png" />&nbsp;
														<?php echo INACTIVE;
														}
													?>
                                            </td>
                                            <td>
                                            <?php if(file_exists('upload/category_default/'.$category_image)) { ?>
                                            <img src="<?php echo base_url(); ?>upload/category_default/<?php echo $category_image; ?>" alt=" " height="150" width="190" >
                                            <?php }else { ?>
											<img src="<?php echo base_url(); ?>upload/category_default/no_img.jpg" alt=" " height="150" width="190" >
											<?php } ?>
                                            
                                            </td>
                                            <td>
                                            	<?php 
													if($category_parent_id == 0)
													{
														echo "parent";
													}else{
														echo "child";
													}
												?>
                                            </td>
                                            <td><?php echo $events_count;?></td>
                                            
                                            <td><?php echo anchor('admin/categories/view_categories/'.$id.'/',VIEW);?> / <?php echo anchor('admin/categories/edit_categories/'.$id.'/',EDIT);?> <?php if($events_count >0) {?> <?php } else {?>/ <a href="<?php echo site_url('admin/categories/delete_categories').'/'.$id?>" onclick='return confirm("<?php echo ARE_YOU_SURE_YOU_WANT_TO_DELETE_SELECTED_CATEGORY;?>");'> <?php echo DELETE;?></a><?php }?></td>
                                           
                                         
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
