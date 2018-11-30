<div id="page-wrapper">
    <div class="container-fluid">
            <div class="row">
               <div class="col-lg-8 col-xs-12 clearfix">
                    <h1><?php echo TIPS; ?> - <?php echo SecureShowData($site_setting['site_name']);?> <?php echo ADMIN_PANEL; ?></h1>
                </div>
               <div class="col-lg-4 col-xs-12 clearfix mt20 text-right">
                	<a href="<?php echo base_url();?>index.php/admin/tips/add_tips" class="btn btn-primary"><?php echo NEW_TIP; ?></a>
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
			
			<?php } ?>
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
                                            <th><?php echo TIP_TYPE;?></th>
                                            <th><?php echo TITLE;?></th>
                                            <th><?php echo ACTION;?></th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php 
										if($result)
											{
											
												foreach($result as $row)
													{
													
													$id=$row['id'];
													$tip_type=$row['tip_type'];
													$title=$row['title'];
									?>
                                        <tr class="odd gradeX">
                                           	<td><?php echo $tip_type; ?></td>
                                            <td><?php echo SecureShowData($title); ?></td>
                                            <td><?php echo anchor('admin/tips/view_tips/'.$id.'/',VIEW);?>  / <?php echo anchor('admin/tips/edit_tips/'.$id.'/',EDIT);?></td>
                                            
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

</body>
<script>
$(document).ready(function(){
		$('#sample_1').dataTable();
		
	});
</script>
</html>
