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
                    <h1><?php echo IMAGES; ?> <small><?php echo SecureShowData($site_setting['site_name']); ?> <?php echo ADMIN_PANEL; ?></small></h1>
                </div>
                <div class="col-lg-4 col-xs-12 clearfix mt20 text-right">
                </div> 
                 <div class="page-header border clearfix"></div>
                 <ol class="breadcrumb">
                    <li>
                        <i class="fa fa-dashboard"></i>  <a href="<?php echo site_url();?>admin/home/dashboard">Dashboard</a>
                    </li>
                    <li class="active">
                        <i class="fa fa-camera"></i> <?php echo IMAGES; ?> 
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
			 	if($msg == 'image_regenerate')
					{	?>
						
                        	<div class="alert alert-success" role="alert">
							<button class="close" data-dismiss="alert">x</button>
							<strong><?php echo SUCCESS; ?>!</strong> <?php echo IMAGES_REGENERATE_SUCCESSFULLY;?>
                            </div>
			<?php } 
                if($msg == 'noimage')
                    {   ?>
                        
                            <div class="alert alert-success" role="alert">
                            <button class="close" data-dismiss="alert">x</button>
                            </strong> <?php echo NO_IMAGES_AVAILABLE;?>
                            </div>
            <?php } ?>
			  
             <?php
		 				$attributes = array('name'=>'frm_listpage','id'=>'frm_listpage');
						
						echo form_open('admin/preferences/edit_image_setting/', $attributes);

		 	?>
			<input type="hidden" name="action" id="action" />   	
            
            <div class="row">
            	<div class="col-lg-12 clearfix">
                	<div class="panel panel-default">
                    	<div class="panel-heading">
                                    <h4 class="panel-title text-right">
                                        <a href="<?php echo site_url();?>admin/preferences/image_regenerate" class="btn btn-primary" style="color: white;"><?php echo REGENERATE_THUMBNAILS; ?></a>
                                    </h4>
                        </div>
                            
                   <div class="panel-body">
                            <div id="dataTables-example_wrapper" class="dataTables_wrapper form-inline" role="grid">
                           		<div class="table-responsive">
                                  <table class="table table-striped table-bordered table-hover" id="sample_1">
                                    <thead>
                                        <tr>
                                            <th><?php echo IMAGES_NAME; ?></th>
                                            <th><?php echo IMAGES_WIDTH; ?></th>
                                            <th><?php echo IMAGES_HEIGHT; ?></th>
                                            <th class="sorting_disabled"><?php echo ACTION; ?></th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                    	<?php 
											if($result)
											{
												foreach($result as $row)
													{
													
													$image_id=$row['id'];	
													$image_title=$row['name'];	
													$image_width=$row['image_width'];	
													$image_height=$row['image_height'];	
														
										?>
                                        <tr class="odd gradeX">
                                            <td><?php echo SecureShowData($image_title); ?></td>
                                            <td><?php echo $image_width; ?></td>
                                            <td><?php echo $image_height; ?></td>
                                            <td><?php echo anchor('admin/preferences/edit_image_setting/'.$image_id.'/',EDIT);?></td>
                                            
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

    <!-- /#wrapper -->

  
</body>
<script>
$(document).ready(function(){
		$('#sample_1').dataTable();
		
	});
</script>
</html>
