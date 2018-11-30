<div id="page-wrapper">
    <div class="container-fluid">
            <div class="row">
               <div class="col-xs-12 clearfix">
                    <h1><?php echo EMAIL_TEMPLATES; ?> - <?php echo SecureShowData($site_setting['site_name']);?> <?php echo ADMIN_PANEL; ?></h1>
                </div>
                
                <div class="page-header border"></div>
            </div>
            <!-- /.row -->
            <?php 
			
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
                        <div class="panel-heading">
                                    <h4 class="panel-title text-right">
                                        <p>You can change "From" & "Reply" address for all Email Templates <?php echo anchor('admin/email_template/change_address',FROM_HERE);?>.</p>
                                    </h4>
                        </div>
                        <div class="panel-heading">
                                    <h4 class="panel-title text-right">
                                        <a href="<?php echo site_url();?>admin/email_template/header_email_template/1" class="btn btn-primary" style="color: white;"><?php echo HEADER_MASTER; ?></a>
                                        <a href="<?php echo site_url();?>admin/email_template/footer_email_template/1" class="btn btn-primary" style="color: white;"><?php echo FOOTER_MASTER; ?></a>
                                    </h4>
                        </div>
                        <div id="collapseOne" class="panel-collapse collapse in">
                            <div class="panel-body">
                            <div id="dataTables-example_wrapper" class="dataTables_wrapper form-inline" role="grid">
                           	 	<div class="table-responsive">
                                  
                                  <table class="table table-striped table-bordered table-hover" id="sample_1">
                                    <thead>
                                        <tr>
                                            <th><?php echo FORM_NAME;?></th>
                                            <th><?php echo TASK;?></th>
                                            <th><?php echo SUBJECT;?></th>
                                            <th><?php echo FORM_ADDRESS;?></th>
                                            <th><?php echo REPLY_ADDRESS;?></th>
                                            <th class="sorting_disabled"><?php echo ACTION;?></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php 
										if($result)
											{
												foreach($result as $row)
												
													{
													$id=$row['id'];
													$from_name=$row['from_name'];
													$task=$row['task'];
													$subject=$row['subject'];
													$from_address=$row['from_address'];
													$reply_address=$row['reply_address'];
									
									?>
                                        <tr class="odd gradeX">
                                            <td><?php echo SecureShowData($from_name);?></td>
                                            <td><?php echo SecureShowData($task);?></td>
                                            <td><?php echo SecureShowData($subject);?></td>
                                            <td><?php echo SecureShowData($from_address);?></td>
                                            <td><?php echo SecureShowData($reply_address);?></td>
                                            <td><?php echo  anchor('admin/email_template/view_email_template/'.$id.'/',VIEW);?> / <?php echo  anchor('admin/email_template/edit_email_template/'.$id.'/',EDIT);?></td>
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

    </div>
    <!-- /#wrapper -->

</body>
<script>
$(document).ready(function(){
		$('#sample_1').dataTable();
		
	});
</script>
</html>
