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
                    <h1><?php echo EVENT_LAYOUT; ?> <small><?php echo SecureShowData($site_setting['site_name']);?> <?php echo ADMIN_PANEL; ?></small></h1>
                </div>
                <div class="col-lg-4 col-xs-12 clearfix mt20 text-right">
                </div> 
                 <div class="page-header border clearfix"></div>
                 <ol class="breadcrumb">
                    <li>
                        <i class="fa fa-dashboard"></i>  <a href="<?php echo site_url();?>admin/home/dashboard">Dashboard</a>
                    </li>
                    <li class="active">
                        <i class="fa fa-table"></i> <?php echo EVENT_LAYOUT; ?>
                    </li>
                </ol>
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
						
						echo form_open('admin/Event_view_layout/list_event_layout/', $attributes);

		 	?>
			<input type="hidden" name="action" id="action" />   	
            
            <div class="row">
            	<div class="col-lg-12 clearfix">
                	<div class="panel panel-default">
                    	
                            
                   <div class="panel-body">
                            <div id="dataTables-example_wrapper" class="dataTables_wrapper form-inline" role="grid">
                           		<div class="table-responsive">
                                  <table class="table table-striped table-bordered table-hover" id="sample_1">
                                    <thead>
                                        <tr>
                                            <th><?php echo TEMPLATE_NAME; ?></th>
                                            <th><?php echo TEMPLATE_CATEGORY; ?></th>
                                            <th><?php echo TEMPLATE_IMAGE; ?></th>
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
													
													$tem_id=$row['id'];	
													$tem_title=$row['template_name'];	
													$tem_category=$row['category'];	
													$tem_image=$row['template_image'];	
													$active = $row['status'];
														
										?>
                                        <tr class="odd gradeX">
                                            <td><?php echo SecureShowData($tem_title); ?></td>
                                            <td><?php echo SecureShowData($tem_category); ?></td>
                                            <td>
                                            <?php if(file_exists('images/'.$tem_image)) { ?>
                                            <img src="<?php echo base_url(); ?>images/<?php echo SecureShowData($tem_image); ?>" alt="category" height="150" width="190" >
                                            <?php }else { ?>
                                            <img src="<?php echo base_url(); ?>upload/home_banner/no_img.jpg" alt="no_img" height="150" width="190" >
                                            <?php } ?>
                                            </td>
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
                                            <td><?php echo anchor('admin/Event_view_layout/update_event_layout/'.$tem_id.'/',EDIT);?></td>
                                            
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
</html>
